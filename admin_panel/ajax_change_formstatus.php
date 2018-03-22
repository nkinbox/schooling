<?php require_once('includes/function.php');
//global $GFH_Admin;
if(isset($_POST['appformid'])&&!empty($_POST['appformid']))
{
	$parent_signature=isset($_POST['parent_signature'])?$_POST['parent_signature']:'';
	$submission_to_school=isset($_POST['submission_to_school'])?$_POST['submission_to_school']:'';
	$receipt_from_school=isset($_POST['receipt_from_school'])?$_POST['receipt_from_school']:'';
	$parent_visit_for_admission=isset($_POST['parent_visit_for_admission'])?$_POST['parent_visit_for_admission']:'';


	$result=mysqli_query(GFHConfig::$link,"UPDATE `tbl_orderdetail` SET `parent_signature`='".$parent_signature."',`submission_to_school`='".$submission_to_school."',`receipt_from_school`='".$receipt_from_school."',`parent_visit_for_admission`='".$parent_visit_for_admission."' WHERE `id`='".$_POST['orderid']."' and sk_id='".$_POST['appformid']."'");
	if($result)
	{

		echo "success";
	}
	die;
}

if(isset($_POST['frstatus'])&&!empty($_POST['frstatus']))
{
	if($_POST['frstatus']=='1')
	{
	?>
	 <option value="1">To be Filled</option>
     <option value="2">Filled</option>
     <option value="3">Verified</option>
<?php	
	}elseif($_POST['frstatus']=='2')
	{
	?>
	<option value="1">In Process</option>
     <option value="2">Done</option>
     
<?php	
	}elseif($_POST['frstatus']=='3')
	{
		?>
	<option value="1">In Process</option>
     <option value="2">Done</option>
     
<?php
	}elseif($_POST['frstatus']=='4')
	{
?>
	<option value="1">None</option>
     <option value="2">Delivered to parent</option>
     
<?php
	}elseif($_POST['frstatus']=='5')
	{
		?>
	<option value="1">None</option>
<?php
	}

	die();
}
?>