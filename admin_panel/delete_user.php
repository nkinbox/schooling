<?php
include('includes/function.php');
if(isset($_POST['all_users'])&&!empty($_POST['all_users']))
{
	$result=$GFH_Admin->delete_users($_POST['all_users']);
	if($result)
	{
		header('location:users.php?msg=Delete successfully');
	}
}else{

	header('location:users.php?error=Please select rows.');
}


?>