<?php include_once('config.php');

if(isset($_POST['school']))
{
	$response=array();
	$responsedata=array();
	$check=mysqli_query($con,"SELECT `id`, `school_id`, `name`, `school_gender`, `school_region`, `service_fee`, `schoolimg`, `alert_fee`, `address`, `status`, `created_at`, `updated_at` FROM `tbl_school` WHERE `name`='".$_POST['school']."'");
	
	if(mysqli_num_rows($check)>0)
	{
		while($check1=mysqli_fetch_assoc($check))
		{
			$respdata['school_id']=$check1['school_id'];
			$respdata['name']=$check1['name'];
			$respdata['school_gender']=$check1['school_gender'];
			$respdata['school_region']=$check1['school_region'];
			$respdata['schoolimg']=$check1['schoolimg'];
			$respdata['address']=$check1['address'];
			array_push($response,$respdata);
		}
		
		echo json_encode(array('result'=>1,'data'=>$response,'msg'=>'success'));

	}else{

	   $response=array(array('result'=>0,'msg'=>'failed'));

	   echo json_encode($response);

	}

die;
}