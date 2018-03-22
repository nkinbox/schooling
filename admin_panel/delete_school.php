<?php
include('includes/function.php');
if(isset($_POST['all_models'])&&!empty($_POST['all_models']))
{
	$result=$GFH_Admin->delete_school($_POST['all_models']);
	if($result)
	{
		header('location:school.php?msg=Delete successfully');
	}
}else{

	header('location:school.php?error=Please select rows.');
}


?>