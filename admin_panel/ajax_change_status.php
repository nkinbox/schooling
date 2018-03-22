<?php require_once('includes/function.php');
if(isset($_POST['form_status']))
{
	$result=mysqli_query(GFHConfig::$link,"UPDATE `tbl_register` SET `common_admission_form`='".$_POST['form_status']."' where `id`='".$_POST['order_no']."'");
	if($result)
	{
		echo "success";
	}
	die;
}