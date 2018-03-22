<?php require_once('admin_panel/includes/function.php');
global $GFH_Admin;

if(isset($_POST['username'])&&!empty($_POST['username']))
{
	$result=$GFH_Admin->frontLogin();
		echo json_encode($result);
	die;
}

if(isset($_POST['frgemail'])&&!empty($_POST['frgemail']))
{
	$result1=$GFH_Admin->forgetPassword();
		echo json_encode($result1);
	die;
}
?>