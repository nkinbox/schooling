<?php

include_once('config.php');

if(!empty($_POST['phone']) && !empty($_POST['password']))
{

	$response=array();

	$phone=isset($_POST['phone'])?mysqli_real_escape_string($con,$_POST['phone']):'';

	$password=isset($_POST['password'])?mysqli_real_escape_string($con,$_POST['password']):'';
	

    $checkuser=mysqli_query($con,"select * from tbl_register where phone='".$phone."'");

	if(mysqli_num_rows($checkuser)>0)
	{

		$response=array('id'=>'already_registered');
		echo json_encode(array('Registration'=>$response));

	}else{
		
		mysqli_query($con,"insert into tbl_register set phone='".$phone."',password='".$password."',created_at=now(),status='1'");

		$id=mysqli_insert_id($con);
		
		echo json_encode(array('result'=>'1','id'=>$id));

	}

	

}

