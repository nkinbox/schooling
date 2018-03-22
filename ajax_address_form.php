<?php
require_once('admin_panel/includes/function.php');
global $GFH_Admin;
if(count($_POST)>0)
{
	$result=$GFH_Admin->ApplicationFormAddress();
	if($result)
	{
		echo json_encode($result);
	}
	
	die;
}