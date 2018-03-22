<?php

include_once('config.php');

if(!empty($_POST['email']) && !empty($_POST['password']))
{

	$response=array();

	$email=isset($_POST['email'])?mysqli_real_escape_string($con,$_POST['email']):'';

	$password=isset($_POST['password'])?mysqli_real_escape_string($con,$_POST['password']):'';
	

    $checkuser=mysqli_query($con,"select * from tbl_register where email='".$email."'");

	if(mysqli_num_rows($checkuser)>0)
	{

		$response=array('id'=>'already_registered');
		echo json_encode(array('Registration'=>$response));

	}else{
		//echo "insert into tbl_register set email='".$email."',password='".$password."',entry_date=now(),status='1'";die;
		
		mysqli_query($con,"insert into tbl_register set email='".$email."',password='".$password."',created_at=now(),status='1'");

		$id=mysqli_insert_id($con);
		
		echo json_encode(array('result'=>'1','id'=>$id));

	}

	

}

