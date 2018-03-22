<?php

include_once('config.php');

if(!empty($_POST['email'])&&!empty($_POST['password']))

{

	$response=array();
	$responsedata=array();

	$email=isset($_POST['email'])?mysqli_real_escape_string($con,$_POST['email']):'';

	$password=isset($_POST['password'])?mysqli_real_escape_string($con,$_POST['password']):'';

	$check=mysqli_query($con,"select * from tbl_register where (email='".$email."' or phone='".$email."')");
	$check1=mysqli_fetch_assoc($check);
	if($check1['password']==$password)
	{
		//$userdata=mysqli_fetch_assoc($check);
			$respdata['id']=$check1['id'];
			$respdata['name']=$check1['name'];
			$respdata['email']=$check1['email'];
			$respdata['phone']=$check1['phone'];
			$resdat['login']=$respdata;
			//array_push($response,$resdat);

	echo json_encode(array('result'=>1,'data'=>$resdat,'msg'=>'success'));

	}else{

	   $response=array(array('result'=>0,'msg'=>'failed'));

	   echo json_encode($response);

	}

}