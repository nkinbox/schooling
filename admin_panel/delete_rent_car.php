<?php
include('includes/function.php');
if(isset($_POST['all_models'])&&!empty($_POST['all_models']))
{
	$result=$GFH_Admin->deleteRentCar($_POST['all_models']);
	if($result)
	{
		header('location:rent_car_detail.php?msg=Delete successfully');
	}
}else{

	header('location:rent_car_detail.php?error=Please select rows.');
}


?>