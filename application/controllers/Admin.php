<?php
defined('BASEPATH') OR exit('No direct script access allowed');


include(dirname(__FILE__) . "/MY_Controller.php");

class Admin extends MY_Controller 
{

	public function __construct()
	{
		parent::__construct();
		// echo "<pre>";
		// print_r($this->session->userdata('admin')['type'] === "AdMiN");
		// exit;
	}

	// ADMIN LOGIN PAGE
	public function index()
	{
		$this->after_login();
		$data = array();
		$table = "admin";
		if($this->input->post('login'))
		{
			if($this->form_validation->run('a_login'))
			{
				foreach( $this->input->post() as $key=>$value)
				{
					$$key = trim($value);
				}

				if(isset($admin_user))
				{
					if($this->input->post('admin_password'))
					{
						$wh['a_username'] = $admin_user;
						$record = $this->Paramodel->select($table,'',$wh);
						if(isset($record[0]))
						{
							$d_pass = $record[0]->a_password;

							if($d_pass == $admin_password)
							{
								$ses['admin'] = ['type' => "AdMiN",
												'admin_id' => $record[0]->id,
												'name' => $record[0]->a_username];
								$this->set_session($ses);
								redirect('dashboard');
							}
						}
						else
						{
							$data['Err'] = "Please Enter Valid UserName Or Password.";
						}
					}
					else
					{
						$data['Err'] = "Please Enter Valid UserName Or Password.";
					}	
				}
				else
				{
					$data['Err'] = "Please Enter Valid UserName Or Password.";
				}
			}
			else
			{
				$data['Err'] = "Please Enter Email Or Password.";
			}
		}
		$this->load->view('admin/index',$data);
	}

	// ADMIN DASHBOARD PAGE
	public function dashboard()
	{
		$this->before_login();
		$sess = $this->session->userdata('admin');
		$data['a_name'] = $sess['name'];
		$this->load->view('admin/dashboard',$data);
	}

	// ADMIN LOGOUT PAGE
	public function logout()
	{
		$this->session->sess_destroy('admin');
		redirect('admin');
		
	}

	// AGMIN SETTING PAGE( Change Password )
	public function setting()
	{
		$data = array('');
		$table = "admin";
		$this->before_login();
		
		$sess = $this->session->userdata('admin');
		$data['a_name'] = $sess['name'];
		$data['id'] = $sess['admin_id'];

		if($this->input->post('update'))
		{
			foreach( $this->input->post() as $key=>$value)
			{
				$$key = trim($value);
			}	

			if(isset($old_password))
			{
				$wh['id'] = $data['id'];
				$record = $this->Paramodel->select($table,'',$wh);
				$db_ps = $record[0]->a_password;
				$up['a_password'] = $new_password;
				
				if($old_password == $db_ps)
				{
					$result = $this->Paramodel->update($table,'a_password',$up,$wh);
					if( $result == 1 )
					{
						$data['Msg'] = "Password SuccessFully Change.";
					}
				}
				else
				{
					$data['Err'] = "Password Not Match.";
				}

			}
		}

		$this->load->view('admin/setting',$data);
	}

	public function add_brand()
	{
		$db_name = "para";
		$table = "brand";
		$sess = $this->session->userdata('admin');
		$data['a_name'] = $sess['name'];
		$this->before_login();
		// SUBMIT BUTTON CLICK EVENT
		if($this->input->post('add'))
		{
			$cr_table = $this->Database->add_new_brand($table,$db_name);
			if($cr_table != 1)
			{
				die('Table Already Exist.');
			}

			foreach($_POST as $key=>$value)
			{
				$$key=trim($value);	
			}

			if($this->form_validation->run('brand'))
			{

				if($_FILES['brand_image']['name'] != "")
				{
					$config['upload_path']   = './assets/images/';
					$config['allowed_types'] = 'jpg|jpeg|png';	
					$config['max_size']      = 2048;
	                $config['encrypt_name']  = TRUE;
							// directry Path
	                $this->load->library('upload',$config);

	                if($this->upload->do_upload('brand_image'))
	                {
	                	$result=$this->last_record('brand');

	                	if($result>0){ $last_setord_no = 1; }else{ $last_setord_no = $result[0]['setord']+1; }
	                	
	                		$image_path = './assets/images/'.$this->upload->data('file_name');
	                		// INSERT DATA 
							$ins['brand_name'] = trim(addslashes($brand_name));
							$ins['brand_description'] = trim(addslashes($brand_description));
							$ins['brand_image'] = $image_path;
							$ins['slug'] = trim($brand_name);
							$ins['status'] = $status;
							$ins['setord'] = $last_setord_no;

							// INSERT QUERY
							$insert = $this->Paramodel->insert($table,$ins);
							$this->_create_thumbs($this->upload->data('file_name'));
							// INSERT SUCCESS CONDITION
							if( $insert == 1 )
							{
								// $ses['msg'] = 'insert';
								// $this->session->set_userdata($ses);
								$this->session->set_flashdata('insert', 'Brand insert successfully');
								redirect('manage-brands');
							}
					}
					else
					{

						$data['error'] = array('error' => $this->upload->display_errors());
					}
				}
			}
		}
		$this->load->view('admin/add_brand',$data);
	}

	public function manage_brand()
	{
		$data = array();
		if( $this->session->userdata('msg') )
		{
			if( $this->session->userdata('msg') && $this->session->userdata('msg') == "update" )
			{
				$data['msg'] = "Update Record SuccessFully."; 
				$this->session->unset_userdata('msg');
			}
			else if( $this->session->userdata('msg') && $this->session->userdata('msg') == "delete" )
			{
				$data['msg'] = "Delete Record SuccessFully.";
				$this->session->unset_userdata('msg');
			}
			else
			{
				$data['msg'] = "Insert Record SuccessFully.";
				$this->session->unset_userdata('msg');
			}
		}
		$db_name = "para";
		$table = "brand";
		$sess = $this->session->userdata('admin');
		$data['a_name'] = $sess['name'];
		$this->before_login();

		$data['record'] = $this->Paramodel->select($table,'',NULL,'DESC');
		
		$this->load->view('admin/manage_brands',$data);
	}

	public function delete()
	{
		$data = array();
		$table = $this->uri->segment(2);
        $id = $this->uri->segment(3);
        $this->before_login();
		if( $table == "brand" )
		{
			$wh['id'] = $id;
			$path = $this->Paramodel->select($table,'',$wh)[0]->image_path;
			$record = $this->Paramodel->delete($table,$wh);
			if( $record == 1 )
			{
				unlink("./".$path);
				// $ses['msg'] = 'delete';
				// $this->session->set_userdata($ses);
				$this->session->set_flashdata('delete', 'Brand Delete successfully');
				redirect('manage-brands');
			}
		}
		if( $table == "models")
		{
			$wh['id'] = $id;
			$path = $this->Paramodel->select($table,'',$wh)[0]->model_display_image;
			$record = $this->Paramodel->delete($table,$wh);
			if( $record == 1 )
			{
				unlink("./".$path);

				$wh_image['model_id'] = $id;
				$image = $this->Paramodel->select('model_image','model_image',$wh_image);
				foreach ($image as $imgs) 
				{
					$wh_model['model_image'] = $imgs->model_image;
					$path_model = $imgs->model_image;
					$delete = $this->Paramodel->delete('model_image',$wh_model);
					if( $delete == 1 )
					{
						unlink("./".$path_model);
						$ses['msg_del'] = 'Delete Model SuccessFully.';
						$this->session->set_userdata($ses);
					}
				}
				redirect('manage-models');
			}

		}

		if( $table = "access" )
		{
			// Delete from Access
			$wh_access['id'] = $id;
			$path_access = $this->Paramodel->select($table,'a_picture',$wh_access)[0]->a_picture;
			$record_access = $this->Paramodel->delete($table,$wh_access);
			if( $record_access == 1 )
			{
				unlink('./'.$path_access);
				// Delete from Access_images
				$wh_a_image['a_id'] = $id;
				$path_a_image = $this->Paramodel->select('access_images','a_image',$wh_a_image)[0]->a_image;	
				$record_image = $this->Paramodel->delete('access_images',$wh_a_image);
				if( $record_image == 1 )
				{
					unlink('./'.$path_a_image);
					// Delete form Access_model
					$wh_am['a_id'] = $id;
					$record_model = $this->Paramodel->delete('access-model',$wh_am);
					if( $record_model == 1 )
					{
						$ses['msg_del'] = 'Delete Access SuccessFully.';
						$this->session->set_userdata($ses);
						redirect('manage-access');
					}
				}
			}
		}
	}

	public function edit()
	{
		$data = array();
		$sess = $this->session->userdata('admin');
		$data['a_name'] = $sess['name'];
		$table = $this->uri->segment(2);
        $id = $this->uri->segment(3);
		$this->before_login();

        $wh['id'] = $id;
        // fetch data where id = $id
        $data['record'] = $this->Paramodel->select($table,'',$wh)[0];
        
        if($this->input->post('update'))
        {
        	foreach($_POST as $key=>$value)
			{
				$$key=trim($value);	
			}

				if(strlen($_FILES['brand_image']['name']) > 0 )
				{	
					
					if( $_FILES['brand_image']['name']!="" && file_exists("./".$this->input->post('h_brand_image') ) )
					{
						@unlink("./".$this->input->post('h_brand_image'));
					}
					$config['upload_path']   = FCPATH.'assets/Photo/';
					$config['allowed_types'] = 'jpg|png|jpeg';	
					$config['max_size']      = 2048;
	                $config['encrypt_name']  = TRUE;

	                		// directry Path
	                $this->load->library('upload',$config);
			
			        if($this->upload->do_upload('brand_image'))
	                {
	                	$result=$this->last_record('brand');

	                	$image_path = './assets/Photo/'.$this->upload->data('file_name');
	                		// INSERT DATA 
							$up['brand_name'] = trim(addslashes($brand_name));
							$up['brand_description'] = trim(addslashes($brand_description));
							$up['brand_image'] = $image_path;
							$up['slug'] = trim($brand_name);
							$up['status'] = $status;
							
							$wh['id'] = $id;
							// INSERT QUERY
							$update = $this->Paramodel->update($table,$up,$wh);
							$this->_create_thumbs($this->upload->data('file_name'));
							// INSERT SUCCESS CONDITION
							if( $update == 1 )
							{
								// $ses['msg'] = 'update';
								// $this->session->set_userdata($ses);
								$this->session->set_flashdata('update', 'Brand Update successfully');
								redirect('manage-brands');
							}
					}
					else
					{

						$data['error'] = array('error' => $this->upload->display_errors());
					}
				}
				else
				{
					$up['brand_name'] = trim(addslashes($brand_name));
					$up['brand_description'] = trim(addslashes($brand_description));
					$up['status'] = $status;
						
					$wh['id'] = $id;
					// INSERT QUERY
					$update = $this->Paramodel->update($table,$up,$wh);
							
					// INSERT SUCCESS CONDITION
					if( $update == 1 )
					{
						// $ses['msg_edit'] = 'Update Brand SuccessFully.';
						// $this->session->set_userdata($ses);
						$this->session->set_flashdata('update', 'Brand Update successfully');
						redirect('manage-brands');
					}
				}
		}
		$this->load->view('admin/add_brand',$data);
	}

	public function add_model()
	{
		$this->before_login();
		$data = array();
		$data['mode'] = "ADD";
		$db_name = 'para';
		$table = 'models';
		$sess = $this->session->userdata('admin');
		$data['a_name'] = $sess['name'];

		$data['record'] = $this->Paramodel->select('brand','brand_name,id');

		if($this->input->post('submit'))
		{
			$this->Database->add_new_model($table,$db_name);
			foreach($_POST as $key=>$value)
			{
				$$key=trim($value);	
			}
			// Form Validation Run
			if($this->form_validation->run('add_model'))
			{
				if(strlen($_FILES['model_display_picture']['name']) > 0)
				{
					$config['upload_path']   = './assets/Model/';
					$config['allowed_types'] = 'jpg|jpeg|png';	
					$config['max_size']      = 2048;
					$config['encrypt_name'] = TRUE; 
					
					// directry Path
	                $this->load->library('upload',$config);

	                $slug = $this->clean_url($model_name);
	                
	                $this->upload->initialize($config);
	                if($this->upload->do_upload('model_display_picture'))
	                {
	                	$result=$this->last_record('models')[0]['setord'];
	                	// echo "<pre>";
	                	// print_r($result);
	                	// exit;
	                	if($result == "" ){ $last_setord_no = 1;  }else{ $last_setord_no = $result+1; }

	                		$image_path = './assets/Model/'.$this->upload->data('file_name');
	                		// INSERT DATA 
							$ins['brand_id'] = $brand_id;
							$ins['model_type'] = $model_type;
							$ins['model_name'] = $model_name;
							$ins['model_description'] = $model_description;
							$ins['model_display_image'] = $image_path;
							$ins['status'] = $status;
							$ins['slug'] = $slug;
							$ins['setord'] = $last_setord_no;
							$ins['meta_title'] = addslashes($meta_title);
							$ins['meta_descryption'] = $meta_description;
							$ins['meta_keywords'] = $meta_keywords;
							$ins['u_create_date'] = date('Y-m-d H:i:s');

							// INSERT QUERY
							$insert = $this->Paramodel->insert('models',$ins);
							$insert_id = $this->db->insert_id();
							$this->_create_thumbs($this->upload->data('file_name'));

							// INSERT SUCCESS CONDITION
							if( $insert == 1 )
							{
								$count = count($_FILES['model_images']['name']);
								if( $count > 0)
								{
									
									$this->Database->model_image('model_image');
									for($i = 0 ; $i < $count ; $i++ )
									{
											$_FILES['single']['name'] = $_FILES['model_images']['name'][$i];
											$_FILES['single']['type'] = $_FILES['model_images']['type'][$i];
											$_FILES['single']['tmp_name'] = $_FILES['model_images']['tmp_name'][$i];
											$_FILES['single']['size'] = $_FILES['model_images']['size'][$i];
											$_FILES['single']['error'] = $_FILES['model_images']['error'][$i];
											
											$config1['upload_path']   ='./assets/Model/';
											$config1['allowed_types'] = 'jpg|jpeg|png';	
											$config1['max_size']      = 2048;
											$config1['encrypt_name'] = TRUE; 	
											// echo "<pre>";
											// print_r($config1);

											
											$this->load->library('upload',$config1);
											$this->upload->initialize($config1);

											// echo "<pre>";
											// print_r($_FILES['single']);
											// echo "------------------";
											if($this->upload->do_upload('single'))
											{
												// echo "<pre>";
												// print_r($config1);
												
												$images_path = './assets/Model/'.$this->upload->data('file_name');
												$ins_up['model_id'] = $insert_id;
												$ins_up['model_image'] = $images_path;
												
												$result = $this->Paramodel->insert('model_image',$ins_up);
												$this->_create_thumbs($this->upload->data('file_name'));
												if($result == 1)
												{
													$this->session->set_flashdata('insert','Model Insert SuccessFully.');
													redirect('manage-models');
												}
											}
											else
											{
												$data['error'][$i] = array('error' => $this->upload->display_errors());
											}
										
									}
								}
							}
					}
					else
					{
						$data['error'][$i] = array('error' => $this->upload->display_errors());
					}	
				}	
			}
		}
		$this->load->view('admin/add_model',$data);
	}

	public function manage_model()
	{
		$this->before_login();
		$data = array();
		$table = 'models';
		$sess = $this->session->userdata('admin');
		$data['a_name'] = $sess['name'];

		$data['record'] = $this->Paramodel->select($table,'',NULL,'DESC');
		// echo "<pre>";
		// print_r($data['record'][0]->model_display_image);
		// die();
		/*if(!empty($data['record']))
		{
			$wh['id'] = $data['record'][0]->brand_id;
			$data['get_id'] = $this->Paramodel->select('brand','brand_name',$wh);
			print_r($data['get_id']);
			die();
			$data['brand_name'] =$data['get_id'][0]->brand_name;
		}*/
		$this->load->view('admin/manage_models',$data);
	}

	public function models_edit()
	{
		$data = array();
		$data['mode'] = "Edit";
		// Get Table name and get update record id in manage-models page. using route segment.
		$table = $this->uri->segment(2);
        $id = $this->uri->segment(3);
		
		$sess = $this->session->userdata('admin');
		$data['a_name'] = $sess['name'];

		// fetch record for brand
		$data['record'] = $this->Paramodel->select('brand','brand_name,id');
		// Fetch record form model id
		$wh['id'] = $id;
		$data['record_model'] = $this->Paramodel->select($table,'',$wh);
		// print_r($data['record']);
		// exit;
		// fetch images form model image
		$wh_im['model_id'] = $id;
		$data['model_image'] = $this->Paramodel->wh_select('model_image',$wh_im);
		// print_r($data['model_image']);
		// die();
		$data['img_count'] = count($data['model_image']);
		// echo $img_count;
		// die();
		if($this->input->post('submit'))
		{
			foreach ($this->input->post() as $key => $value) {
				$$key = trim($value);
			}
			// Form Validation Run
			if($this->form_validation->run('add_model'))
			{
				if(strlen($_FILES['model_display_picture']['name']) > 0)
				{

					if( $_FILES['model_display_picture']['name']!="" && file_exists("./".$this->input->post('h_model_display_picture') ) )
					{
						@unlink("./".$this->input->post('h_model_display_picture'));
					}

					$config['upload_path']   = './assets/Model/display/';
					$config['allowed_types'] = 'jpg|png|jpeg';	
					$config['max_size']      = 1024*2;
					$config['encrypt_name'] = TRUE; 
					
					// directry Path
	                $this->load->library('upload',$config);

	                $slug = $this->clean_url($model_name);
	                
	                if($this->upload->do_upload('model_display_picture'))
	                {
	                	$result=$this->last_record('models');

	                	if( $result > 0 )
	                	{ 
	                		$last_setord_no = 1; 
	                	}
	                	else
	                	{ 
	                		$last_setord_no = $result[0]['setord']+1; 
	                	}
	                	
	                		$image_path = './assets/Model/display/'.$this->upload->data('file_name');
	                		// INSERT DATA 
							$ins['brand_id'] = $brand_id;
							$ins['model_type'] = $model_type;
							$ins['model_name'] = $model_name;
							$ins['model_description'] = $model_description;
							$ins['model_display_image'] = $image_path;
							$ins['status'] = $status;
							$ins['slug'] = $slug;
							$ins['setord'] = $last_setord_no;
							$ins['meta_title'] = addslashes($meta_title);
							$ins['meta_descryption'] = $meta_description;
							$ins['meta_keywords'] = $meta_keywords;
							$ins['u_create_date'] = date('Y-m-d H:i:s');

							// INSERT QUERY
							$update = $this->Paramodel->update('models',$ins,$wh);
							// Msg Type
							
					}
					else
					{
						$data['error'] = array('error' => $this->upload->display_errors());
					}
					// after upload code
				}
				else
				{
					$slug = $this->clean_url($model_name);
					// Update DATA 
					$up_data['brand_id'] = $brand_id;
					$up_data['model_type'] = $model_type;
					$up_data['model_name'] = $model_name;
					$up_data['model_description'] = $model_description;
					$up_data['status'] = $status;
					$up_data['slug'] = $slug;
					$up_data['meta_title'] = addslashes($meta_title);
					$up_data['meta_descryption'] = $meta_description;
					$up_data['meta_keywords'] = $meta_keywords;
					$up_data['u_create_date'] = date('Y-m-d H:i:s');

					// INSERT QUERY
					$update = $this->Paramodel->update('models',$up_data,$wh);
					
				}
							// INSERT SUCCESS CONDITION
							if( isset($update) && $update == 1 && strlen($_FILES['model_images']['name'][0]) > 0 )
							{
								$count = count($_FILES['model_images']['name']);
								// echo "<pre>";
								// echo $count;
								// print_r($_FILES['model_images']);
								

								if( $count > 0)
								{
									$wh_images['model_id'] = $id;
									$record = $this->Paramodel->select('model_image','model_image',$wh_images);
									foreach ($record as $img ) 
									{
										$model_img_path = $img->model_image;
										@unlink("./".$model_img_path);
									}

									$this->Paramodel->delete('model_image',$wh_images);
									$this->Database->model_image('model_image');
									for($i = 0 ; $i < $count ; $i++ )
									{
										
											$_FILES['single']['name'] = $_FILES['model_images']['name'][$i];
											$_FILES['single']['type'] = $_FILES['model_images']['type'][$i];
											$_FILES['single']['tmp_name'] = $_FILES['model_images']['tmp_name'][$i];
											$_FILES['single']['size'] = $_FILES['model_images']['size'][$i];
											$_FILES['single']['error'] = $_FILES['model_images']['error'][$i];
											
											$config1['upload_path']   = FCPATH.'assets/Model/model_images/';
											$config1['allowed_types'] = 'jpeg|jpg|png';	
											$config1['max_size']      = 2048;
											$config1['encrypt_name'] = TRUE; 

											$this->load->library('upload',$config1);
											$this->load->initialize($config1);

											if($this->upload->do_upload('single'))
											{
												$images_path = './assets/Model/model_images/'.$this->upload->data('file_name');
												$ins_up['model_id'] = $id;
												$ins_up['model_image'] = $images_path;

												
												$update = $this->Paramodel->insert('model_image',$ins_up);
											}
											else
											{
												$data['error'] = array('error' => $this->upload->display_errors());
											}
										
									}
								}
							}
						if($update == 1 )
						{
							$this->session->set_flashdata('update','Model Update SuccessFully.');
							redirect('manage-models');
						}
			}
				
		}
		$this->load->view('admin/add_model',$data);
	}

	public function add_access()
	{
		$data = array();
		$data['mode'] = "ADD";
		$sess = $this->session->userdata('admin');
		$data['a_name'] = $sess['name'];
		$table = 'access';

		// Select brand table name and id data
		$data['tbl_brand'] = $this->Paramodel->select('brand','brand_name,id');

		// Select models table 
		$data['tbl_model'] = $this->Paramodel->select('models','id,model_name');

		if($this->input->post('submit'))
		{
			unset($_POST['access_images']);
			foreach($_POST as $key=>$value)
			{
				$model_id = $this->input->post('model_id');

				if(is_array($value))
				{
					$$key = array_map('trim', $value);
				}
				else
				{
					$$key=trim($value);	
				}
			}
			
			// Create Table With If Not Exist.
			$this->Database->add_new_access($table);

			//Find max setord form access
			$maxsetord=$this->Paramodel->max($table,'setord');
			$getsetord = $maxsetord[0]->max_ord;
			$setord = $getsetord+1;

			// Form Validation
			if($this->form_validation->run('add_access'))
			{
				// get Brand_name form brand table
				$wh_brand['id'] = $brand_id;
				$brand_name = $this->Paramodel->select('brand','brand_name', $wh_brand)[0]->brand_name;
				
				$slug_text = $brand_name." ".$this->input->post('a_name');
				
				$slug = $this->clean_url($slug_text);
				
				// a_picture is not blank. for Single File 
				if(strlen($_FILES['a_picture']['name']) != "" )
				{

					// configration for image
					$config['upload_path'] = FCPATH.'assets/access/single/';
					$config['allowed_types'] = 'png|jpg|jpeg';
					$config['max_size'] = 2048;
					$config['encrypt_name'] = TRUE;

					$this->load->library('upload',$config);
					$this->upload->initialize($config);
					if($this->upload->do_upload('a_picture'))
					{
						// Image path
						$img_path = './assets/access/single/'.$this->upload->data('file_name');

						// Inster data array
						$ins['brand_id'] = $brand_id;
						$ins['a_type'] = $a_type;
						$ins['a_name'] = $a_name;
						$ins['a_original'] = $a_original;
						$ins['a_price'] = $a_price;
						$ins['a_discount'] = $a_discount;
						$ins['a_description'] = $a_description;
						$ins['a_picture'] = $img_path;
						$ins['a_kit'] = $a_kit;
						$ins['status'] = $status;
						$ins['slug'] = $slug;
						$ins['setord'] = $setord;
						$ins['meta_title'] = $meta_title;
						$ins['meta_description'] = $meta_description;
						$ins['meta_keywords'] = $meta_keywords;

						$insert = $this->Paramodel->insert($table,$ins);
						$a_id = $this->db->insert_id('access');

						if( $insert == 1 )
						{

							// Multi image upload black validation
							if( strlen($_FILES['access_images']['name'][0]) > 0 )
							{
								// create table code
								$this->Database->access_image('access_images');
								// count how many image are select
								$count = count($_FILES['access_images']['name']);
								if( $count > 0)
								{
									
									$this->Database->access_image('access_images');
									for($i = 0 ; $i < $count ; $i++ )
									{
											$_FILES['single']['name'] = $_FILES['access_images']['name'][$i];
											$_FILES['single']['type'] = $_FILES['access_images']['type'][$i];
											$_FILES['single']['tmp_name'] = $_FILES['access_images']['tmp_name'][$i];
											$_FILES['single']['size'] = $_FILES['access_images']['size'][$i];
											$_FILES['single']['error'] = $_FILES['access_images']['error'][$i];
											
											$config1['upload_path']   = FCPATH.'assets/access/multiple/';
											$config1['allowed_types'] = 'jpg|jpeg|png';	
											$config1['max_size']      = 2048;
											$config1['encrypt_name'] = TRUE; 	
											// echo "<pre>";
											// print_r($config1);

											
											$this->load->library('upload',$config1);
											$this->upload->initialize($config1);

											// echo "<pre>";
											// print_r($_FILES['single']);
											// echo "------------------";
											if($this->upload->do_upload('single'))
											{
											// print_r($_FILES['single']);
											// image path for upload
											$access_image = './assets/access/multiple/'.$this->upload->data('file_name');
											$multi_ins['a_id'] = $a_id;
											$multi_ins['a_image'] = $access_image;

											// multi insert
											$multi_insert = $this->Paramodel->insert('access_images',$multi_ins);
											// after insert
											if( $multi_insert == 1 )
											{
												// Create table access-model
												$this->Database->access_model('access-model');
												// delete last insert id is exist in access-model
												$wh_a['a_id'] = $a_id;
												$this->Paramodel->delete('access-model',$wh_a);

												// insert record in access-model
												for( $m = 0 ; $m < count($model_id) ; $m++ )
												{
													if(!empty($model_id[$m]))
													{
														$ins_am['a_id'] = $a_id;
														$ins_am['m_id'] = $model_id[$m];
														// Insert code
														$insert_am = $this->Paramodel->insert('access-model',$ins_am);
													}
												}
											}
										}
										else
										{
											$data['multi_error'] = $this->upload->display_errors(); 
										}
									}
								}
								else
								{
									$data['multi_error'] = "Please Select at least 1 Images.";		
								}
							}
							else
							{
								$data['multi_error'] = "Please Select at least 1 Images.";
							}
						}
					}
					else
					{
						$data['error'] = $this->upload->display_errors();
					}
				}
				else
				{
					$data['error'] = "Please Select Image.";
				}

				// if insert single file and data are insert success after multi file 
				if(isset($insert_am) && $insert_am == 1 )
				{
					$this->session->set_flashdata('insert','Accessories Insert SuccessFully.');
					redirect('manage-access');
				}
			}
		}
		$this->load->view('admin/add_access',$data);
	}

	public function manage_access()
	{
		$data = array(); 
		$table = 'access';
		$sess = $this->session->userdata('admin');
		$data['a_name'] = $sess['name'];

		$data['access_record'] = $this->Paramodel->left_join();
		// echo "<pre>";
		// print_r($data['access_record']);
		// exit;
		
		$this->load->view('admin/manage_access',$data);
	}

	public function edit_access()
	{
		$data = array();
		$data['mode'] = "EDIT";
		$sess = $this->session->userdata('admin');
		$data['a_name'] = $sess['name'];
		$table = $this->uri->segment(2);
		$id = $this->uri->segment(3);
		$data['id'] = $this->uri->segment(3);

		// Select all data from access table
		$wh_access['id'] = $id;
		$data['access'] = $this->Paramodel->select($table,'',$wh_access)[0];
		
		// Select all data from access_images table
		$wh_access_image['a_id'] = $id;
		$data['access_image'] = $this->Paramodel->select('access_images','id,a_image',$wh_access_image);
		// print_r($data['access_image']);
		// exit;
		
		// Select brand table name and id data
		$data['tbl_brand'] = $this->Paramodel->select('brand','brand_name,id');

		// Select models table 
		$data['tbl_model'] = $this->Paramodel->select('models','id,model_name');

		if($this->input->post('submit'))
		{
			unset($_POST['access_images']);
			foreach($_POST as $key=>$value)
			{
				$model_id = $this->input->post('model_id');

				if(is_array($value))
				{
					$$key = array_map('trim', $value);
				}
				else
				{
					$$key=trim($value);	
				}
			}
			
			// Create Table With If Not Exist.
			//$this->Database->add_new_access($table);

			//Find max setord form access
			// $maxsetord=$this->Paramodel->max($table,'setord');
			// $getsetord = $maxsetord[0]->max_ord;
			// $setord = $getsetord+1;

			// Form Validation
			if($this->form_validation->run('add_access'))
			{
				// get Brand_name form brand table
				$wh_brand['id'] = $brand_id;
				$brand_name = $this->Paramodel->select('brand','brand_name', $wh_brand)[0]->brand_name;
				
				$slug_text = $brand_name." ".$this->input->post('a_name');
				
				$slug = $this->clean_url($slug_text);
				
				// a_picture is not blank. for Single File 
				if(strlen($_FILES['a_picture']['name']) != "" )
				{

					// configration for image
					$config['upload_path'] = FCPATH.'assets/access/single/';
					$config['allowed_types'] = 'png|jpg|jpeg';
					$config['max_size'] = 2048;
					$config['encrypt_name'] = TRUE;

					$this->load->library('upload',$config);
					$this->upload->initialize($config);
					if($this->upload->do_upload('a_picture'))
					{
						// Image path
						$img_path = './assets/access/single/'.$this->upload->data('file_name');

						// Inster data array
						$up['brand_id'] = $brand_id;
						$up['a_type'] = $a_type;
						$up['a_name'] = $a_name;
						$up['a_original'] = $a_original;
						$up['a_price'] = $a_price;
						$up['a_discount'] = $a_discount;
						$up['a_description'] = $a_description;
						$up['a_picture'] = $img_path;
						$up['a_kit'] = $a_kit;
						$up['status'] = $status;
						$up['slug'] = $slug;
						$up['meta_title'] = $meta_title;
						$up['meta_description'] = $meta_description;
						$up['meta_keywords'] = $meta_keywords;

						$update = $this->Paramodel->update($table,$up,$wh_access);
						$a_id = $this->db->insert_id('access');

						if( $update == 1 )
						{
							// Create table access-model
							//$this->Database->access_model('access-model');
							// delete last insert id is exist in access-model
							$wh_a['a_id'] = $a_id;
							$this->Paramodel->delete('access-model',$wh_a);

							// insert record in access-model
							for( $m = 0 ; $m < count($model_id) ; $m++ )
							{
								if(!empty($model_id[$m]))
								{
									$up_am['a_id'] = $id;
									$up_am['m_id'] = $model_id[$m];
									// Insert code
									$update_am = $this->Paramodel->insert('access-model',$up_am);

									if( $update_am == 1 )
									{
										$this->session->set_flashdata('update','Accessories Update SuccessFully.');
									}
								}
							}

						}
					}
					else
					{
						$data['error'] = $this->upload->display_errors();
					}
				}
				else
				{
					$up['brand_id'] = $brand_id;
					$up['a_type'] = $a_type;
					$up['a_name'] = $a_name;
					$up['a_original'] = $a_original;
					$up['a_price'] = $a_price;
					$up['a_discount'] = $a_discount;
					$up['a_description'] = $a_description;
					$up['a_kit'] = $a_kit;
					$up['status'] = $status;
					$up['slug'] = $slug;
					$up['meta_title'] = $meta_title;
					$up['meta_description'] = $meta_description;
					$up['meta_keywords'] = $meta_keywords;

					$update = $this->Paramodel->update($table,$up,$wh_access);
					//$a_id = $this->db->insert_id('access');

					if( $update == 1 )
					{
						// Create table access-model
						//$this->Database->access_model('access-model');
						// delete last insert id is exist in access-model
						$wh_a['a_id'] = $id;
						$this->Paramodel->delete('access-model',$wh_a);

						// insert record in access-model
						for( $m = 0 ; $m < count($model_id) ; $m++ )
						{
							if(!empty($model_id[$m]))
							{
								$up_am['a_id'] = $id;
								$up_am['m_id'] = $model_id[$m];
								// Insert code
								$update_am = $this->Paramodel->insert('access-model',$up_am);

								if( $update_am == 1 )
								{
									$this->session->set_flashdata('update','Accessories Update SuccessFully.');
								}
							}
						}
					}
				}

				// if insert single file and data are insert success after multi file 
				if(isset($update_am) && $update_am == 1 )
				{

					// Multi image upload black validation
					if( strlen($_FILES['access_images']['name'][0]) > 0 )
					{
						// create table code
						$this->Database->access_image('access_images');
						// count how many image are select
						$count = count($_FILES['access_images']['name']);
						if( $count > 0)
						{
							
							$wh_images['a_id'] = $id;
							$record = $this->Paramodel->select('access_images','a_image',$wh_images);
							foreach ($record as $img ) 
							{
								$access_img_path = $img->a_image;
								// echo "<pre>".$model_img_path;
								@unlink("./".$access_img_path);
							}

							$this->Paramodel->delete('access_images',$wh_images);

							$this->Database->access_image('access_images');
							for($i = 0 ; $i < $count ; $i++ )
							{
								$_FILES['single']['name'] = $_FILES['access_images']['name'][$i];
								$_FILES['single']['type'] = $_FILES['access_images']['type'][$i];
								$_FILES['single']['tmp_name'] = $_FILES['access_images']['tmp_name'][$i];
								$_FILES['single']['size'] = $_FILES['access_images']['size'][$i];
								$_FILES['single']['error'] = $_FILES['access_images']['error'][$i];
											
								$config1['upload_path']   = FCPATH.'assets/access/multiple/';
								$config1['allowed_types'] = 'jpg|jpeg|png';	
								$config1['max_size']      = 2048;
								$config1['encrypt_name'] = TRUE; 	
								// echo "<pre>";
								// print_r($config1);

											
								$this->load->library('upload',$config1);
								$this->upload->initialize($config1);

								// echo "<pre>";
								// print_r($_FILES['single']);
								// echo "------------------";
								if($this->upload->do_upload('single'))
								{
									// image path for upload
									$access_image = './assets/access/multiple/'.$this->upload->data('file_name');
									$multi_up['a_id'] = $id;
									$multi_up['a_image'] = $access_image;

									// multi insert
									$multi_update = $this->Paramodel->insert('access_images',$multi_up);
									// after insert
									if( $multi_update == 1 )
									{
										$this->session->set_flashdata('update','Accessories Update SuccessFully.');
									}
								}
								else
								{
									$data['multi_error'] = $this->upload->display_errors(); 
								}

							}
						}
						else
						{
							$data['multi_error'] = "Please Select at least 1 Images.";		
						}
					}
					else
					{
						$data['multi_error'] = "Please Select at least 1 Images.";
					}

				}
			}
		}
		if($this->session->flashdata('update'))
		{
			redirect('manage-access');
		}
		$this->load->view('admin/add_access',$data);
	}

	public function update_tax()
	{
		$data = array();
		$data['mode'] = "EDIT";
		$table  = 'tax';

		// create table if not exist
		$this->Database->add_gst($table);
		$sess = $this->session->userdata('admin');
		$data['a_name'] = $sess['name'];

		// Fetch data from Table
		$data['record'] = $this->Paramodel->select($table,'')[0];
		// print_r($data['record']);
		// die();
		$wh['id'] = $data['record']->id;

		if($this->input->post('submit'))
		{
			foreach ($_POST as $key => $value) 
			{
				$$key = $value;
			}

			$up['tax_per'] = $tax_per;
			$up['tax_no']  = $tax_no;

			$update = $this->Paramodel->update($table,$up,$wh);
			if( $update == 1 )
			{
				$data['msg'] = 'Update TAX SuccessFully.';
				header('location:update-tax');
			}
		}
		$this->load->view('admin/update_tax',$data);
	}

	// on working
	public function manage_orders()
	{
		$data = array();
		$sess = $this->session->userdata('admin');
		$data['a_name'] = $sess['name'];
		$this->load->view('admin/manage_orders',$data);
	}

	public function add_user()
	{
		$data = array();
		$data['mode'] = 'ADD';
		$sess = $this->session->userdata('admin');
		$data['a_name'] = $sess['name'];
		$table = 'registration';
		$this->Database->add_user($table);

		if($this->input->post('submit'))
		{
			foreach ($_POST as $key => $value) 
			{
				$$key = $value;
			}

			if($this->form_validation->run('add_user'))
			{
				// insert record data
				$ins['u_name'] = $u_name;
				$ins['u_email'] = $u_email;
				$ins['u_password'] = password_hash($u_password, PASSWORD_DEFAULT);
				$ins['u_phone'] = $u_phone;
				$ins['u_address'] = $u_address;
				$ins['u_city'] = $u_city;
				$ins['u_state'] = $u_state;
				$ins['status'] = $status;

				// insert in database
				$insert = $this->Paramodel->insert($table,$ins);
				if( $insert == 1 )
				{
					$ins_msg['Err'] = 'INSERT Record SuccessFully.';
					redirect('manage-users');
				}
			}
		}
		$this->load->view('admin/add_user',$data);
	}

	public function manage_users()
	{
		$data = array();
		$table = 'user_details';
		$sess = $this->session->userdata('admin');
		$data['a_name'] = $sess['name'];
		$data['record'] = $this->Paramodel->select($table,'');
		// echo "<pre>";
		// print_r($data['record']);
		// exit;




		$this->load->view('admin/manage_users',$data);
	}

	public function edit_user_details()
	{
		$data = array();
		$data['mode'] = 'EDIT';
		$sess = $this->session->userdata('admin');
		$data['a_name'] = $sess['name'];
		$table = $this->uri->segment(2);
		$id = $this->uri->segment(3);


		$wh['id'] = $id;
		// Fetch data From user_details Table
		$data['record'] = $this->Paramodel->select($table,'',$wh)[0];
		// echo "<pre>";
		// print_r($data['record']);
		// exit;
		if($this->input->post('submit'))
		{
			foreach ($_POST as $key => $value) 
			{
				$$key = $value;
			}

			if($this->form_validation->run('edit_user'))
			{
				$new = $u_email;
				$old = $data['record']->u_email;
				// echo $new;
				// exit;
				$email = $this->Paramodel->query("SELECT COUNT(*) AS cc FROM `user_details` WHERE `u_email` = '".$new."' AND `u_email` != '".$old."' ");
				
				if( $email == 0 )
				{
					// insert record data
					$up['u_name'] = $u_name;
					$up['u_email'] = $u_email;
					$up['u_password'] = password_hash($u_password, PASSWORD_DEFAULT);
					$up['u_phone'] = $u_phone;
					$up['u_address'] = $u_address;
					$up['u_city'] = $u_city;
					$up['u_state'] = $u_state;
					$up['status'] = $status;

					// insert in database
					$insert = $this->Paramodel->update($table,$up,$wh);
					if( $insert == 1 )
					{
						$ses = ['suc' => 'Update Record SuccessFully.'];
						$this->session->set_userdata($ses);
						redirect('manage-users');
					}
				}
				else
				{
					die('hii');
				}
			}
		}

		$this->load->view('admin/add_user',$data);
	}

	public function manage_subscribers()
	{
		$data = array();
		$table = 'user_details';
		$sess = $this->session->userdata('admin');
		$data['a_name'] = $sess['name'];

		$this->load->view('admin/manage_subscribers',$data);
	}

	public function admin_ajax()
	{
		$this->load->view('admin/ajax.inc.php');
	}

	function _create_thumbs($file_name)
	{
		// // Image resizing config
		// $config = array(
		// 	// Large Image
		// 	array(
		// 		'image_library' => 'GD2',
		// 		'source_image'  => './assets/images/'.$file_name,
		// 		'maintain_ratio'=> TRUE,
		// 		'height'        => 375,
		// 		'new_image'     => './assets/images/large/'.$file_name
		// 		),
		// 	// Medium Image
		// 	array(
		// 		'image_library' => 'GD2',
		// 		'source_image'  => './assets/images/'.$file_name,
		// 		'maintain_ratio'=> FALSE,
		// 		'width'         => 600,
		// 		'height'        => 400,
		// 		'new_image'     => './assets/images/medium/'.$file_name
		// 		),
		// 	// Small Image
		// 	array(
		// 		'image_library' => 'GD2',
		// 		'source_image'  => './assets/images/'.$file_name,
		// 		'maintain_ratio'=> FALSE,
		// 		'width'         => 100,
		// 		'height'        => 67,
		// 		'new_image'     => './assets/images/small/'.$file_name
		// 	));
	
		// 	$this->load->library('image_lib', $config[0]);
		// 	foreach ($config as $item){
				
		// 		$this->image_lib->initialize($item);
		// 		if(!$this->image_lib->resize()){

		// 		}
		// 		$this->image_lib->clear();
		// 	}

		$image_sizes = array(
			'thumb' => array(150, 100),
			'medium' => array(300, 300),
			'large' => array(800, 600)
		);
		$i= 0;
		$this->load->library('image_lib');
		foreach ($image_sizes as $resize) {
			$i++;
			$config = array(
				'source_image' => './assets/Model/'.$file_name,
				'new_image' => './assets/Model/'.$i.$file_name,
				'maintain_ration' => true,
				'width' => $resize[0],
				'height' => $resize[1]
			);

			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();
		}

	}
}