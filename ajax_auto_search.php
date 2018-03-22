<?php require_once('admin_panel/includes/function.php');


	if(isset($_POST['autusearch'])&&!empty($_POST['autusearch']))
	{
		$selectedregion=isset($_POST['selectedregion'])?$_POST['selectedregion']:'';
		$selectschool=isset($_POST['selectschool'])?$_POST['selectschool']:'';
		$results=$GFH_Admin->autocompleteSearch($_POST['autusearch'],$selectedregion,$selectschool);
		if(mysqli_num_rows($results)>0)
		{
	?>	
		<ul id="country-list">
			<?php
			while($result=mysqli_fetch_assoc($results)){
			?>
			<li onClick="selectSchool('<?php echo $result["name"]; ?>');"><?php echo $result["name"]; ?></li>
			<?php } ?>
		</ul>
	<?php
		
		}else{
			echo "none";
		}
	}
	die();
?>