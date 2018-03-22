<?php

include_once('config.php');

if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password']))
{

	$response=array();

	$name=isset($_POST['name'])?mysqli_real_escape_string($con,$_POST['name']):'';

	$email=isset($_POST['email'])?mysqli_real_escape_string($con,$_POST['email']):'';

	$phone=isset($_POST['phone'])?mysqli_real_escape_string($con,$_POST['phone']):'';

	$password=isset($_POST['password'])?mysqli_real_escape_string($con,$_POST['password']):'';
	

    $checkuser=mysqli_query($con,"select * from users where (email='".$email."' or phone='".$phone."')");

	if(mysqli_num_rows($checkuser)>0)
	{

		$response=array('id'=>'already_registered');
		echo json_encode(array('Registration'=>$response));

	}else{
		$string = '0123456789';
       	$string_shuffled = str_shuffle($string);
       	$otp = substr($string_shuffled, 1,5);
       	//echo "insert into users set name='".$name."',email='".$email."',phone='".$phone."',password='".$password."',entry_date=now(),status='0',otp='".$otp."'";die;
		mysqli_query($con,"insert into users set name='".$name."',email='".$email."',phone='".$phone."',password='".$password."',entry_date=now(),status='0',otp='".$otp."'");

		$id=mysqli_insert_id($con);
		$otpmsg="Your otp is:".$otp;

		
	
		// session_start();
		// $_SESSION['LA_OTP']=$otp;
		// $_SESSION['LA_ID']=$id;
		

			//$url="uid=77696e6b6c6978696e7465726e6574&pin=3adeb605a478028da7f2eddf4f757160&sender=winklixinternet&route=0&mobile=".$phone."&message=".$otpmsg."&pushid=1";
			$url="uid=77696e6b6c6978696e7465726e6574&pin=e2f0db1c94074d69324e739f817009c1&sender=winklix&route=4&mobile=".$phone."&message=".$otpmsg."&pushid=1";
	    $ch=curl_init("http://smsalertbox.com/api/sms.php?");
		    curl_setopt($ch,CURLOPT_POST,true);
		    curl_setopt($ch,CURLOPT_POSTFIELDS,$url);
		    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		    $result=curl_exec($ch);
		    curl_close($ch);

		echo json_encode(array('status'=>'otp sent on mobile','id'=>$id,'otp'=>$otp));

	}

	

}

