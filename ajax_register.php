<?php require_once('admin_panel/includes/function.php');
global $GFH_Admin;
if(isset($_POST['email'])&&!empty($_POST['email']))
{
	$result=$GFH_Admin->setRegisterByEmail();
		
		echo json_encode($result);
	die;
}

if(isset($_POST['mobile'])&&!empty($_POST['mobile']))
{
	$result1=$GFH_Admin->setRegisterByPhone();
	
		
		echo json_encode($result1);
	die;
}
?>