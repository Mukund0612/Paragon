<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(dirname(__FILE__) . "/MY_Controller.php");

class Paragon extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data= array();
		// echo "<pre>";
		// print_r($this->session->userdata());
		// exit;
		$data['brands_view'] = $this->Paramodel->select('brand','');
		// print_r($data['brands_view']);exit; 
		// Fetch record in 2 table access and access-model for view file
		// $column = "access.*, access-model.m_id";
		// $match_column = "access.id = access-model.a_id";
		// $ord = "DESC";
		// $limit = '4';
		// $wh = "brand_id = 1 AND access.status = 'Y'";
		// $data['access_left'] = $this->Paramodel->left_join_where($column,'access-model','access',$match_column,$ord,$limit,$wh);
		// echo "<pre>";
		// print_r($data['access']);
		// exit;
		$column_four = "access.*, access-model.m_id";
		$match_column_four = "access.id = access-model.a_id";
		$ord_four = "DESC";
		$limit_four = '4';
		$wh_four = "brand_id = 2 AND access.status = 'Y'";
		$data['access_left_four'] = $this->Paramodel->left_join_where($column_four,'access-model','access',$match_column_four,$ord_four,$limit_four,$wh_four);

		// echo "<pre>";
		// print_r($data['access_left_four']);
		// exit;
		

		$this->load->view('index',$data);	
	}

	public function ip_track()
	{
		// $HideCountry = array('Bangladesh','Nepal','Sri Lanka');

		// if(!$this->session->userdata('valid_country')
		// {
		// 	$data_sess['valid_country'] = ip_info("Visitor", "Country");
		// 	$this->session->set_session('valid_country',ip_info("Visitor", "Country"));
		// }

		// if(!in_array($this->session->set_session($session), $HideCountry))
		// {
		// 	echo 'Show';
		// }
		// else
		// {
		// 	echo 'Hide';
		// }
	}

	public function register()
	{
		$db_name = "para";
		$table = "registration";
		$data = array();
		if($this->input->post('submit'))
		{
			$cr_table = $this->Database->registration($table,$db_name);
			if($cr_table != 1)
			{
				echo "Table Already Exist.";
			}
			foreach( $this->input->post() as $key=>$value)
			{
				$$key = trim($value);
			}
			if($this->form_validation->run('register'))
			{
				// Data Input type post
				$data['u_name'] = $this->input->post('u_name');
				$data['u_email'] = $this->input->post('u_email');
				$data['u_password'] = password_hash($this->input->post('u_password'), PASSWORD_DEFAULT);
				$data['u_phone'] = $this->input->post('u_phone');
				$data['u_address'] = addslashes($this->input->post('u_address'));
				$data['u_pincode'] = $this->input->post('u_pincode');
				$data['u_status'] = 'Y';
				$date['u_create_date'] = date('Y-m-d H:i:s');

				$insert = $this->Paramodel->insert($table,$data);

				if( $insert == 1 )
				{
					redirect('login');
				}
			}
		}
		$this->load->view('register');
	}

	public function login()
	{
		$data = array();
		$table = "registration";
		$this->after_login_user();
		if($this->input->post('u_login'))
		{
			if($this->form_validation->run('u_login'))
			{
				foreach( $this->input->post() as $key=>$value)
				{
					$$key = trim($value);
				}
				if(isset($u_email))
				{
					if($this->input->post('u_password'))
					{
						$wh['u_email'] = $u_email;
						$record = $this->Paramodel->select($table,'',$wh);
						if(isset($record[0]))
						{
							$d_pass = $record[0]->u_password;
							if(password_verify($u_password, $d_pass))
							{
								$ses['user'] = ['type' => "UsEr",
												'user_id' => $record[0]->id,
												'email' => $record[0]->u_email,
												'name' => $record[0]->u_name];
								$this->set_session($ses);
								// echo "<pre>";
								// print_r();die();
								redirect('paragon');
							}
							else
							{
								$data['Err'] = "Please Enter Email Or Password.";
							}
						}
						else
						{
							$data['Err'] = "Please Enter Email Or Password.";
						}
					}
					else
					{
						$data['Err'] = "Please Enter Email Or Password.";
					}	
				}
				else
				{
					$data['Err'] = "Please Enter Email Or Password.";
				}
			}
			else
			{
				$data['Err'] = "Please Enter Email Or Password.";
			}
		}
		$this->load->view('login',$data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('paragon');
	}

	public function brand()
	{
		$data['brands_all'] = $this->Paramodel->select('brand','');
		// echo "<pre>";
		// print_r($brands);
		// exit;
		$this->load->view('brands-new',$data);
	}

	public function all_brand()
	{
		$slug = $this->uri->segment(2);
		$wh['slug'] = $slug;
		$data['brands_slug'] = $this->Paramodel->select('brand','',$wh,'ACE');
		$data['brands_slug2'] = $this->Paramodel->select('brand','',$wh,'ACE');
		
		$this->load->view('brands-company',$data);
	}

	public function product()
	{
		$slug = $this->uri->segment('2');

		// Fetch all data from access where slug is match
		$wh_slug['slug'] = $slug; 
		$data['get_access'] = $this->Paramodel->select('access','',$wh_slug);


		// Fetch all data from brand where access table brand_id is match brand table
		$wh_brand_fetch['id'] = $data['get_access'][0]->brand_id;
		$data['brand_list'] = $this->Paramodel->select('brand','',$wh_brand_fetch);

		// Fetch all data from access-model where access table id is match access-model table
		$wh_access_model['a_id'] = $data['get_access'][0]->id;
		$data['access-model'] = $this->Paramodel->select('access-model','',$wh_access_model);

		// Fetch all data from models where access-model m_id is match model table
		$wh_model_id_get['id'] = $data['access-model'][0]->m_id;
		$data['model_fetch'] = $this->Paramodel->select('models','',$wh_model_id_get);

		// Fetch all data from access_image where access id is match a_id form access-image
		$wh_acc_img['a_id'] = $data['get_access'][0]->id;
		$data['access_image'] = $this->Paramodel->select('access_images','',$wh_acc_img);

		// Fetch data useing left join
		$column = "access.*, access-model.m_id";
		$match_column = "access.id = access-model.a_id";
		$ord = "DESC";
		$limit = '50';
		$wh = "m_id = '".$data['access-model'][0]->m_id."' AND access.status = 'Y' AND access.id != '".$data['get_access'][0]->id."'";
		$data['access_left_join'] = $this->Paramodel->left_join_where($column,'access-model','access',$match_column,$ord,$limit,$wh);

		
		// echo "<pre>";
		// print_r($data['access_left_join']);
		// exit;
		$this->load->view('products_details',$data);
	}

	public function ajax()
	{	
		$this->load->view('ajax.inc.php');
	}

	public function cart()
	{
		$data = array();
		$this->before_login_user();

		$data['cart']  = $this->session->userdata('cart');

		$data['sub_total']  = 0;
		$wh_id['id'] = 1;
		$data['GST_per'] = $this->Paramodel->get_one('tax','tax_per',$wh_id);

		// echo "<pre>";
		// print_r($this->session->userdata('cart')['item_id'][0]);
		// exit;

		$this->load->view('cart',$data);
	}

	public function brands_new()
	{
		$slug = $this->uri->segment(2);

		// Fetch all record from models where slug
		$wh_model_slug['slug'] = $slug;
		$data['all_models'] = $this->Paramodel->select('models','',$wh_model_slug,'ASC')[0];

		// Fetch all record from brand where brand_id is id
		$wh_model_brandId['id'] = $data['all_models']->brand_id;
		$data['brandsId'] = $this->Paramodel->select('brand','',$wh_model_brandId,'ASC')[0];

		// Fetch all record from model_image where model_id is id
		$wh_model_images['model_id'] = $data['all_models']->id;
		$data['all_model_images'] = $this->Paramodel->select('model_image','',$wh_model_images,'ASC');

		// Fetch data useing left join
		$column = "access.*, access-model.m_id";
		$match_column = "access.id = access-model.a_id";
		$ord = "DESC";
		$limit = '50';
		$wh_acces_model_joins['m_id'] = $data['all_models']->id;
		$wh_acces_model_joins['access.status'] = 'Y';
		$data['access_left_join'] = $this->Paramodel->left_join_where($column,'access-model','access',$match_column,$ord,$limit,$wh_acces_model_joins);

		// Fetch all record from models where slug
		$wh_model_brand['brand_id'] = $data['all_models']->brand_id;
		$wh_model_brand['status'] = 'Y';
		$data['all_model'] = $this->Paramodel->select('models','',$wh_model_brand,'ASC','4');		
		// echo "<pre>";
		// print_r($data['all_model']);
		// exit;

		$this->load->view('brands_details_new',$data);
	}

	public function search()
	{
		$data= array();
		$searchText = $this->input->post('s');
		 
		$data['SearchRecords'] = $this->Paramodel->query(" SELECT * FROM access WHERE status = 'Y' AND a_name LIKE '%".$searchText."%' ORDER BY id DESC");
		// echo "<pre>";
		// print_r($data['SearchRecords']);
		// exit;

		$this->load->view('search',$data);
	}

	public function about_us()
	{
		$this->load->view('about-us');
	}

	public function faq()
	{
		$this->load->view('faq');
	}

	public function contact_us()
	{
		$data = array();
		if($this->input->post('submit_btn'))
		{
			foreach( $this->input->post() as $key=>$value)
			{
				$$key = trim($value);
			}

			// create table in database
			$this->Database->contact_us('contact_us');

			// form validation run
			if($this->form_validation->run('contact_us'))
			{
				// insert information
				$ins_contact_us['c_name'] = $c_name;
				$ins_contact_us['cc_name'] = $cc_name;
				$ins_contact_us['c_email'] = $c_email;
				$ins_contact_us['c_mobile'] = $c_mobile;
				$ins_contact_us['c_phone'] = $c_phone;
				$ins_contact_us['c_subject'] = $c_subject;
				$ins_contact_us['country'] = $country;
				$ins_contact_us['state'] = $state;
				$ins_contact_us['city'] = $city;
				$ins_contact_us['zip_pincode'] = $zip_pincode;
				$ins_contact_us['message'] = $message;

				$insert_contact_us = $this->Paramodel->insert('contact_us',$ins_contact_us);

				if( $insert_contact_us == 1 )
				{
					//echo json_encode($insert_contact_us);
					$data['insert'] = "Thank You For Contact With Us.";
				}
			}
		}
		$this->load->view('contact-us',$data);
	}

	public function profile()
	{
		$data = array();
		$this->before_login_user();
		$user_id = $this->session->userdata('user')['user_id'];
		$whUserDetail['id'] = $user_id;
		$data['userDetail'] = $this->Paramodel->select('registration','',$whUserDetail)[0];
		$hash = $data['userDetail']->u_password;

		if($this->input->post('submit_details'))
		{
			foreach( $this->input->post() as $key=>$value)
			{
				$$key = trim($value);
			}

			if($this->form_validation->run('profile_detail'))
			{
				$up_profileDetail['u_name'] = $u_name;
				$up_profileDetail['u_phone'] = $u_phone;
				$up_profileDetail['u_email'] = $u_email;
				$up_profileDetail['u_address'] = $u_address;
				$up_profileDetail['u_email'] = $u_email;
				$up_profileDetail['country'] = $country;
				$up_profileDetail['state'] = $state;
				$up_profileDetail['city'] = $city;

				$updateDetaili = $this->Paramodel->update( 'registration' , $up_profileDetail , $whUserDetail );
				
				if( $updateDetaili == 1 )
				{
					$data['update'] = "update";
				}

			}

		}

		if($this->input->post('submit_new_pass'))
		{
			foreach( $this->input->post() as $key=>$value)
			{
				$$key = trim($value);
			}

			$match = password_verify($c_pass,$hash);
			
			if( $match == 1 )
			{
				if($this->form_validation->run('profile_password'))
				{
					$up_profilePassword['u_password'] = password_hash($r_pass, PASSWORD_DEFAULT);
					$update = $this->Paramodel->update('registration',$up_profilePassword,$whUserDetail);

					if( $update == 1 )
					{
						$data['update'] = "success";
					}
				}
			}
		}
		
		$this->load->view('profile',$data);
	}

	public function checkout()
	{
		$data = array();
		$data['cart'] = $this->session->userdata('cart');
		$data['sub_total'] = 0;
		
		// Fetch tax
		$whTAX['id'] = 1;
		$data['GST_per'] = $this->Paramodel->get_one('tax','tax_per',$whTAX);
		
		$whUserDetail['id'] = $this->session->userdata('user')['user_id'][0];
		$data['fetchRecord'] = $this->Paramodel->select('registration','',$whUserDetail)[0];
		
		$data['OrderId'] = $this->session->userdata('order_id');

		$this->load->view('checkout',$data);
	}

	public function ccavResponseHandler()
	{
		$this->load->view('ccavResponseHandler');
	}

	public function do_payment()
	{
		// echo "<pre>";
		// print_r($this->input->post());
		// exit;
		$data = array();
		$data['cart'] = $this->session->userdata('cart');
		$data['sub_total'] = 0;
		
		// Fetch tax
		$whTAX['id'] = 1;
		$data['GST_per'] = $this->Paramodel->get_one('tax','tax_per',$whTAX);

		$this->load->view('do-payment',$data);
	}

	public function ccavRequestHandler()
	{
		$this->load->view('ccavRequestHandler');
	}

	public function setOrder()
	{
		$CRtable = $this->Database->order('order');
		if($CRtable)
		{
			foreach ($_POST as $key => $value) {
				$$key = trim($value);
			}

			$insertOrderDetails['billing_name'] 	= $billing_name;
			$insertOrderDetails['billing_email'] 	= $billing_email;
			$insertOrderDetails['billing_tel'] 		= $billing_tel;
			$insertOrderDetails['billing_address'] 	= $billing_address;
			$insertOrderDetails['billing_city'] 	= $billing_city;
			$insertOrderDetails['billing_state'] 	= $billing_state;
			$insertOrderDetails['billing_zip'] 		= $billing_zip;
			$insertOrderDetails['billing_country'] 	= $billing_country;
			$insertOrderDetails['delivery_name'] 	= $delivery_name;
			$insertOrderDetails['delivery_tel'] 	= $delivery_tel;
			$insertOrderDetails['delivery_address'] = $delivery_address;
			$insertOrderDetails['delivery_city']	= $delivery_city;
			$insertOrderDetails['delivery_state']	= $delivery_state;
			$insertOrderDetails['delivery_zip'] 	= $delivery_zip;
			$insertOrderDetails['delivery_country'] = $delivery_country;
			$insertOrderDetails['user_id'] 			= $this->session->userdata('user')['user_id'];
			$insertOrderDetails['tid'] 				= $tid;
			$insertOrderDetails['order_id'] 		= $order_id;
			$insertOrderDetails['amount'] 			= $amount;
			$insertOrderDetails['currency'] 		= $currency;
			$insertOrderDetails['order_gst_per'] 	= $this->session->userdata('order_gst_per');
			$insertOrderDetails['order_gst_charges']= $this->session->userdata('order_gst_charges');
			$insertOrderDetails['order_sub_total'] 	= $this->session->userdata('order_sub_total');
			$insertOrderDetails['order_total'] 		= $this->session->userdata('order_total');
			
			$insertOrd = $this->Paramodel->insert('order',$insertOrderDetails);
			if($insertOrd)
			{
				$this->session->unset_userdata('cart');
				$this->session->unset_userdata('order_id');
				$wh_temp['order_id'] = $order_id;
				$selectTmp = $this->Paramodel->select('temp_order_item');
				$this->Database->order_item('order_item');
				foreach( $selectTmp as $tMP )
				{
					$insert_tmp['order_id'] = $tMP->order_id;
					$insert_tmp['item_id'] = $tMP->item_id;
					$insert_tmp['item_name'] = $tMP->item_name;
					$insert_tmp['item_price'] = $tMP->item_price;
					$insert_tmp['item_qty'] = $tMP->item_qty;
					
					$insert_tmp_order = $this->Paramodel->insert('order_item',$insert_tmp);
				}

				if($this->Paramodel->delete('temp_order_item',$wh_temp))
				{
					$data['success'] = $tid;
					$this->load->view('thank-you',$data);
				}
			}
		}
	}

	public function order_history()
	{
		$data = array();
		$this->before_login_user();

		$whFetch['user_id'] = $this->session->userdata('user')['user_id'];
		$fetchRecord = $this->Paramodel->select('order','',$whFetch);
		$data['record'] = $fetchRecord;
		
		
		$this->load->view('order-history',$data);
	}

	public function invoices()
	{
		$orderID = substr($this->uri->segment(2),0,14);
		
		$whorder['order_id'] = $orderID;
		$orderDetail['order'] = $this->Paramodel->select('order','*',$whorder);
		$this->session->set_userdata($orderDetail);
		// echo "<pre>";
		// print_r($data['selectOrder']->);
		// exit;
		
		$OrderItem['order_item'] = $this->Paramodel->select('order_item','',$whorder);
		$this->session->set_userdata($OrderItem);

        $html = $this->load->view('invoices', [], true);
        $this->pdf->createPDF($html, 'mypdf', false);
	}

	public function shipping_delivery()
	{
		$this->load->view('shipping-delivery');
	}

	public function payment()
	{
		$this->load->view('payments');
	}

	public function terms()
	{
		$this->load->view('terms');
	}
}
