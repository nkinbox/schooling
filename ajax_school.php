<?php require_once('admin_panel/includes/function.php');
// if(isset($_POST))
// {
	$region=isset($_POST['alregion'])?implode( "', '",$_POST['alregion']):'';
	$gender=isset($_POST['schoolgender'])?implode( "', '",$_POST['schoolgender']):'';
	
	$sql=array();

	if(isset($region)&&!empty($region))
	{
		$reg="`school_region` IN ('".$region."')";
		array_push($sql,$reg);
	}
	
	if(isset($gender)&&!empty($gender))
	{
		$gen="`school_gender` IN ('".$gender."')";
		array_push($sql,$gen);
	}


	$where=implode(" and ",$sql);
	
	if(!empty($_POST['school']))
	{
		$order=" order by name asc";
		
	}else{
		$order="";
	}

	if(isset($_POST['alldd'])&&!empty($_POST['alldd']))
	{
		$query="SELECT `id`, `school_id`, `name`, `school_gender`, `school_region`, `service_fee`, `schoolimg`, `alert_fee`, `address`, `status` FROM `tbl_school`";

	}else{
		$query="SELECT `id`, `school_id`, `name`, `school_gender`, `school_region`, `service_fee`, `schoolimg`, `alert_fee`, `address`, `status` FROM `tbl_school` WHERE ".$where.$order;
	}

	// echo $query;die;
	
	$allschools=mysqli_query(GFHConfig::$link,$query);
	
	$allschools=$GFH_Admin->search_School($query);
	if(@mysqli_num_rows($allschools)>0){
	while($school=mysqli_fetch_assoc($allschools)){
?>

 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-tag="paid">
    <div class="cs-courses courses-grid">
      <div class="col-md-12">
        <div class="col-md-6">
		
          <?php
		  if(isset($_SESSION['SCH_USERID'])){  ?>
          <a href="#">
            <img src="assets/images/share.png" class="share" style="display: none;"></a>
            
            <?php }else{ ?>
            <a href="#">
            <img src="assets/images/location.png" class="share" ></a>
            <?php } ?>

            <!-- <h6 style="margin-left: -23px;margin-top: 3px;">Share</h6> -->
          </div>
          <div class="col-md-6 map">
            <a href="#"   class="js-show-help" data-id="<?php echo isset($school['id'])?$school['id']:'';  ?>" >
              <!-- <i class="fa fa-map-marker" aria-hidden="true"></i> -->
           <img src="assets/images/location.png" class="location-img " >
              <!-- <h6 class="distanceh6">Distance</h6> -->
            </a>
            <div class="located-content js-help-content<?php echo isset($school['id'])?$school['id']:'';  ?>" style="display:none;">
              <p id="">8Km From Laxmi Nagar, Delhi</p>
            </div>

          </div>
        </div>
        <div class="">
          <figure><a href="#">
             <?php if(isset($school['schoolimg'])&&!empty($school['schoolimg'])){  ?>
           <img class="img-responsive home" src="images\school\<?php echo isset($school['schoolimg'])?$school['schoolimg']:'';  ?>"  alt="schooling">
            <?php  }else{ ?>
            <img  class="img-responsive" src="assets\images\images.jpg" alt="" class="home">
            <?php  } ?>
          </a></figure>
        </div>
        <!-- <hr style="border: 3px solid rgb(11,44,89);">  -->
        <div class="cs-text">       
    <!-- <div class="cs-rating">
      <div class="cs-rating-star">
        <span class="rating-box" style="width:100%;"></span>
      </div>
    </div> -->
   


    <!-- <span class="cs-caption">Address</span> -->
    <div class="cs-post-title">
      <h5><a href="#"><?php echo isset($school['name'])?$school['name']:'';  ?><br>
        </a></h5>
      <h5><?php echo isset($school['address'])?$school['address']:'';  ?></h5>
      <h5><?php echo isset($school['school_gender'])?$school['school_gender']:'';  ?></h5>
    </div>
    <span class="cs-courses-price" style="font-family: nexa_bold !important;font-size: 14px;"><em> Service Fee : <i class="fa fa-inr" aria-hidden="true"></i> </em><?php echo isset($school['service_fee'])?$school['service_fee']:'';  ?></span>
    <div class="cs-post-meta">
       <?php  if($school['name']=='Jaspal Kaur Public School'){  ?>
        <i class="fa fa-info-circle" aria-hidden="true" style="color: #0B2C59;text-align: left;float: left;cursor: pointer;font-size: 20px;" data-toggle="modal" data-target="#myModal"></i>
        <?php } ?>
     <span class="text-center">
        <?php  if($school['status']==1){  ?>
         <button  onclick='add_to_cart("<?php echo isset($school['id'])?$school['id']:'';  ?>","1","<?php echo isset($school['service_fee'])?$school['service_fee']:'';  ?>");'><i class="fa fa-shopping-cart"  aria-hidden="true" ></i>Add To Cart</button>
        <?php }else{ ?>
         <button style="background-color: red;" >Registration Closed</button>
        <?php } ?>
       
      </span>
    </div>
  </div>
  </div>
  </div>
<?php
}
}else{ ?>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-tag="paid">
	<h4>No Schools Found!</h4>
</div>
<?php }
die();
// }
?>