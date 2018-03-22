<?php
require_once('admin_panel/includes/function.php');
global $GFH_Admin;
session_start();
//echo "hello";
	if(isset($_POST['oldpassword'])&&!empty($_POST['oldpassword'])){
		$res=$GFH_Admin->changePassword();
	echo json_encode($res);
	die;
	}
	
	if(isset($_POST['phone'])&&!empty($_POST['phone']))
	{
		$res1=$GFH_Admin->requestForCall();
		echo json_encode($res1);
		die;
	}

	

?>