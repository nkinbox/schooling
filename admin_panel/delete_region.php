<?php
include('includes/function.php');
if(isset($_POST['all_models'])&&!empty($_POST['all_models']))
{
	//echo "<pre>";print_r($_POST);die;
	$result=$GFH_Admin->delete_region($_POST['all_models']);
	//echo "<pre>";print_r($result);die;
	if($result)
	{
		header('location:regions.php?msg=Delete successfully');
	}
}else{

	header('location:regions.php?error=Please select rows.');
}


?>