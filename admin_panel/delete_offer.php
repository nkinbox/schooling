<?php
include('includes/function.php');
if(isset($_POST['all_models'])&&!empty($_POST['all_models']))
{
	$result=$GFH_Admin->delete_offer($_POST['all_models']);
	if($result)
	{
		header('location:offer.php?msg=Delete successfully');
	}
}else{

	header('location:offer.php?error=Please select rows.');
}


?>