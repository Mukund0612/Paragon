<?php

$status = '';
$data = "";

if(isset($_REQUEST['flag'])){ $flag = $_REQUEST['flag']; }

if(isset($_REQUEST['status'])){ $status = $_REQUEST['status']; }

if(isset($_REQUEST['statusmenu'])){ $statusmenu = $_REQUEST['statusmenu']; }

if(isset($_REQUEST['show_status'])){ $show_status = $_REQUEST['show_status']; }

if(isset($_REQUEST['id'])){ $id = $_REQUEST['id']; }

if(isset($_REQUEST['pid'])){ $pid = $_REQUEST['pid']; }

if(isset($_REQUEST['flag'])){ $model_type = $_REQUEST['flag']; }

switch($flag)
{

    case 'modeltype':
        $users_arr = array();
        // print_r($_POST);
        $modelType = $_POST['model_type'];
        $brand = $_POST['select_brand'];
        // echo $brand;

        $data = $this->Paramodel->query("SELECT id,model_name FROM models WHERE model_type=$modelType AND brand_id=$brand ");
        

        foreach( $data as $row ){
            $userid = $row->id;
            $name = $row->model_name;
      
            $users_arr[] = array("id" => $userid, "name" => $name);
            
        }
        // echo "<pre>";
        // print_r($users_arr);
        // exit;
        // encoding array to json format
     	echo json_encode($users_arr);

    break;

	case 'delete_pro_image':

		$image_name = $this->db->query("SELECT model_image FROM model_image WHERE id='".$_POST['id']."'")->result()[0]->model_image;
		
			if(@file_exists($image_name) && $image_name!=""){

			   @unlink($image_name);

			}

			$result = $this->db->query("DELETE FROM model_image WHERE id ='".$id."'");
			
			echo json_encode('success'); 

	break;

	

	case 'delete_access_image':
		
		if($_POST['id'] != "" )
		{
		$image_name = $this->Paramodel->query("SELECT a_image FROM access_images WHERE id ='".$_POST['id']."'")[0]->a_image; 

		
			if(@file_exists($image_name) && $image_name!=""){

			   @unlink($image_name);

			}

			$qry = $this->db->query("DELETE FROM access_images WHERE id ='".$_POST['id']."' ");
			

			echo json_encode('success'); 
		}
			
	break;



	

	// case 'displayorder':



	// 	$disval=explode(",",$_REQUEST['disvalue']);

	// 	for($i=0;$i<count($disval);$i++)

	// 	{

	// 		$cat = explode(":",$disval[$i]);

	// 		$qry="UPDATE ".$_REQUEST['table']." SET setord='".$cat[1]."' WHERE id='".$cat[0]."' ";

	// 		mysqli_query($db,$qry);

	// 	}



	// break;

	// case 'select_on_load':



	// 	$brand_id=$_POST['brand_id'];

	// 	$model_type=$_POST['model_type'];

	// 	$models = '';



	// 	$qry = "SELECT * FROM models WHERE brand_id = ".$brand_id." AND model_type = ".$model_type;

	// 	$res = mysqli_query($db,$qry);

	// 	while($row= mysqli_fetch_assoc($res))

	// 	{

	// 		echo '<option value="'.$row['id'].'">'.$row['model_name'].'</option>';

	// 	}

		



	// break;

}

?>