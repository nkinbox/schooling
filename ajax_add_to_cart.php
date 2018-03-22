<?php
require_once('admin_panel/includes/function.php');
global $GFH_Admin;
if(isset($_POST['prodid'])&&!empty($_POST['prodid']))
{
	session_start();
	$prodid=$_POST['prodid'];
	$qty=$_POST['qty'];
	$price=$_POST['price'];
	$schools=mysqli_query(GFHConfig::$link,"SELECT * FROM `tbl_school` WHERE `id`='".$_POST['prodid']."'");
	if(mysqli_num_rows($schools)>0)
	{
		$school=mysqli_fetch_assoc($schools);
		

		if (isset( $_SESSION['CART'][$prodid])){
		     
		     // /$_SESSION['CART'][$prodid]['quantity']++;
		     echo "already";

		} else {
		    $data=array(
				'prod_name'=>$school['name'],
				'quantity'=>$qty,
				'price'=>round($price),
				// 'image'=>$product['thumb'],
			);

			$_SESSION['CART'][$school['id']]=$data;
			echo "success";
		}
		
	}
	die;
}
?>