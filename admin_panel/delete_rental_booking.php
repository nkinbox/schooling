<?php
include('includes/function.php');
if(isset($_POST['all_models'])&&!empty($_POST['all_models']))
{
	$result=$GFH_Admin->delete_rental_booking($_POST['all_models']);
	if($result)
	{
		header('location:rental_booking_detail.php?msg=Delete successfully');
	}
}else{

	header('location:rental_booking_detail.php?error=Please select rows.');
}


?>