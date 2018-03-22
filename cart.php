<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Schoolling | Cart</title>
<link href="assets\css\bootstrap.css" rel="stylesheet">
<link href="assets\css\bootstrap-theme.css" rel="stylesheet">
<link href="assets\css\iconmoon.css" rel="stylesheet">
<link href="assets\css\chosen.css" rel="stylesheet">
<link href="assets\css\jquery.mobile-menu.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link href="cs-smartstudy-plugin.css" rel="stylesheet">
<link href="assets/css/jquery.mCustomScrollbar.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="assets\css\color.css" rel="stylesheet">
<link href="assets\css\widget.css" rel="stylesheet">
<link href="assets\css\responsive.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
<!-- <script src="assets\scripts\jquery.js"></script>
<script src="assets\scripts\modernizr.js"></script>
<script src="assets\scripts\bootstrap.min.js"></script> -->
</head>
<style type="text/css">
  .wp-smartstudy .courses-grid .cs-post-title{height: auto !important;}
  .wp-smartstudy .courses-grid figure{height: auto !important;}
  .wp-smartstudy .courses-grid .cs-text {padding: 0px 8px 10px !important;}
  .newdcart{border-top:4px solid rgb(11,44,89); border-bottom:4px solid rgb(11,44,89);padding-bottom:40px;}
  .newcimg{height:50px !important;width:50px !important;margin: 0 auto;margin-top: 20px;}
  .newcardiv{height:50px;width:50%;margin:0 auto; background:rgb(235,121,35);position: relative;margin-top: -30px; border-radius: 24px;margin-bottom: 50px;}
  .crth4{margin: 0 auto;text-align: center;padding-top: 18px;}
  .newtxt{padding-left: 25px;padding-right: 25px;text-align: center;padding-top: 10px;}
</style>
<body class="wp-smartstudy">
<div class="wrapper"> 
  <!-- Side Menu Start -->
  <div id="overlay"></div>
    <div id="mobile-menu">
        <ul>
            <li><a href="about.php">About Us</a></li>
            <li><a href="#">Blog</a></li>
         
            <li class="menu-item-has-children"><a href="#">Mobile App</a>
            </li>
            <li class="menu-item-has-children"><a href="apply-to-schools.php">Apply To School</a>
            </li>
            <li class="menu-item-has-children"><a href="#"  data-target="#cs-login" data-toggle="modal">Login</a>
            </li>
            <li class="menu-item-has-children"><a href="cart.php"><img src="assets/images/cart.png" width="35px"><div class="counter"><?php echo @count($_SESSION['CART']);  ?></div>cart</a>
            </li>
        </ul>
    </div>

<?php include 'newheader.php'; ?>
   <div class="page-section" style="/*background:url(assets/images/cat_3.png) no-repeat; background-size: contain;*/ height: 150px; background-color:rgb(242,242,242);margin-bottom: 23px;margin-top: 85px;">
       <img src="assets/images/cart1.png" style="height: 116px;width: 116px;" alt="schoolling">
       <img src="assets/images/cart2.png" style="height: 116px;width: 116px;float: right;margin-right: 20px;margin-top: 13px;" alt="schoolling">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-page-title">
             <!--  <img src="assets/images/cart-open.png" style="height: 100px;margin-top:-87px;">  
                   
                    <img src="assets/images/cart-right.png" style="height: 51px;margin-left: -65px;padding-top: 22px;"> -->
                        <h1 style="color: rgb(11,44,99) !important; text-transform: capitalize !important; font-size: 55px;margin-top:-75px;">Cart <img src="assets/images/header-cart.png" style="height: 74px;position: absolute;top: -77px;" alt="schoolling"> </h1>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
<div id="cart">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12">
        <?php  if(@count($_SESSION['CART'])>0){  ?>
                <div class="h3" style="height: 100px;text-align: left;padding-top: 7px;width: 45%; ">
                    <div class="col-md-12">
                        <h3 style="font-size: 16px;color: #fff !important;padding-bottom: 5px;margin: 0;">Cart Subtotal(<?php echo @count($_SESSION['CART']);  ?> school):Rs.<?php
                $sum=0;
                $total=0;
                $afterdiscount=0;
                if(isset($_SESSION['CART'])&&!empty($_SESSION['CART']))
                {
                  foreach ($_SESSION['CART'] as $key => $value) {
                    //echo "<pre>";print_r($value);die;
   $schools=$GFH_Admin->getSchool($key);
           while($school=mysqli_fetch_assoc($schools))
           {
            if(isset($school['service_fee']) && isset($school['alert_fee']))
            {
            $sum+=$value['price']+$school['alert_fee'];
            }
            else
            {
           $sum+=$value['price'];
            }
           }
                
                   // $sum+=$value['price'];
                  }
                  echo  $sum;

                  //echo @$sum;
                  if(@count($_SESSION['CART'])>=5)
                  {
                     $afterdiscount=round((40*$sum)/100);
                    $total=$sum-$afterdiscount;
                  }else{
                    $total=$sum;
                  }

        
        
                  
                }
                ?></h3>
                    </div>
                    <?php if(@count($_SESSION['CART'])>=5){  ?>
                    <div class="col-md-12">
                        <h3 style="font-size: 16px;color: #fff !important;padding-bottom: 5px;
padding-top: 5px;margin: 0;">Super Offer(40% Off) : Rs -<?php  echo @$afterdiscount;  ?></h3>
                    </div>
                    <?php } ?>
                    <div class="row" style="margin-top: 7px;background: rgb(235,121,35);float: left;width: 100%;margin-left: 0px;vertical-align: middle;height: 42px;">
                        <div class="col-md-8" style="font-size: 30px;padding-top: 5px;">
                            Cart Total: Rs  <?php echo @$total; ?>
                        </div>
                        <div class="col-md-4">
                          <?php if(isset($_SESSION['SCH_USERID'])){  ?>
                            <a href="#" class="btn btn-default" target="_blank" style="margin: 3px 0px 0px 30px;" data-toggle="modal" data-target="#myModal3">Proceed</a>
                            <?php }else{ ?>
                            <a href="#" class="btn btn-default"  style="margin: 3px 0px 0px 30px;" data-target="#cs-login" data-toggle="modal">Proceed</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
              <?php }else{  ?>
        <?php // if(@count($_SESSION['CART'])>0){  ?>
			
        <?php  //}else{ ?>
        <h3 class="h3"> Cart is empty.  <a href="apply-to-schools.php"  class="btn btn-default">Apply to Schools</a></h3>
        <?php } ?>
			</div>
		</div>

		<div class="row">
        <?php

        if(isset($_SESSION['CART']))
        {
          foreach($_SESSION['CART'] as $key => $value) {
            //echo "<pre>";print_r($key);die;
           $schools=$GFH_Admin->getSchool($key);
           $school=mysqli_fetch_assoc($schools);
        ?>
         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-tag="paid">
            <div class="cs-courses courses-grid">
                <div class="grid_btn">
                    <div class="col-md-6">
                    <!--<?php  if(isset($_SESSION['SCH_USERID'])){  ?>
                    <a href="#">
                      <img src="assets/images/share.png" class="share"></a>
                      <?php }else{ ?>
                      <a href="#"   data-target="#cs-login" data-toggle="modal">
                      <img src="assets/images/share.png" class="share"></a>
                      <?php } ?>
                       <h6 style="margin-left: -23px;margin-top: 3px;">Share</h6> -->
                </div>
                <div class="col-md-6 map">
                    <a href="#"  class="js-show-help" onclick='deletecart("<?php echo @$key;  ?>");''>
                      <!-- <i class="fa fa-map-marker" aria-hidden="true"></i> -->
                        <img src="assets/images/delete.png" class="location-img">
                      </a>
                    <!-- <div class="located-content js-help-content">
                          <p>8Km From Laxmi Nagar, Delhi</p>
                    </div> -->
                      

                </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                  <div class="cs-media">
                    <figure><a href="#">
                      <?php if(isset($school['schoolimg'])&&!empty($school['schoolimg'])){  ?>
                      <img class="img-responsive" src="images\school\<?php echo isset($school['schoolimg'])?$school['schoolimg']:'';  ?>" class="trackhome"  alt="">
                      <?php  }else{ ?>
                       <img src="assets\images\school.png" class="trackhome" alt="">
                      <?php  } ?>
                    </a></figure>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="cs-text">       
                    <span class="cs-caption">Address</span>
                    <div class="cs-post-title" style="margin-top:-30px;">
                      <h5><a href="#"><?php echo isset($school['name'])?$school['name']:'';  ?></a></h5>
                       <h5><?php echo isset($school['address'])?$school['address']:'';  ?></h5>
                       <h5>Fee : Rs. <?php echo $school['service_fee']; ?></h5>
                    </div>
                    <!-- <span class="cs-courses-price"><em> Services Fee : <i class="fa fa-inr" aria-hidden="true"></i> </em><?php echo isset($school['service_fee'])?$school['service_fee']:'';  ?></span> -->
                    
                </div>
                  </div>
                </div>
                   <?php if($school['alert_fee']==0) { } else{ ?>
                <div class="newdcart">
               
                    <div class="row">
                        <div class="col-md-6">
                            <img src="assets/images/image68.png" class="newcimg img-responsive">
                        </div>
                        <div class="col-md-6">
                            <img src="assets/images/image67.png" class="newcimg img-responsive">
                        </div>
                    </div>
                    <div class="row">
                        <h5 class="newtxt">Get SMS Email Alerts of all important dates & Documentation required during final admission</h5>
                    </div>
                </div>
                    <div class="newcardiv">
                        <h4 class="crth4">Add for Rs.<?php echo $school['alert_fee']; ?> </h4>
                    </div>
                    <?php } ?>
                <div class="total">
                	<h3 style="color: #fff!important;padding-top: 28px;text-align: center !important;">TOTAL:Rs.<?php if(isset($school['alert_fee'])){ echo $total_amt = $school['service_fee']+$school['alert_fee']; } else { echo $school['service_fee']; } ?></h3>
                </div>
            </div>
        </div>

        <?php } } ?>
           
    </div>
    
		</div>


	
	</div>
</div>
<?php include 'footer.php'; ?>
<script>
  function deletecart(prodid)
  {
    //alert("hello");
      if(confirm("Are you sure?"))
      {
        $.ajax({
            type:'post',
            url:'ajax_update_cart.php',
            data:{'prodid1':prodid,'delete':'delete'},
            success:function(response1){
                
                   window.location.href="";
              
            }

        });
    } 
  }
</script>
<div id="myModal3" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <?php  $pages1=$GFH_Admin->getPages('5'); 
            // if(mysqli_num_rows($pages)>0){
          $page1=mysqli_fetch_assoc($pages1);
           ?>
            <div class="modal-header" style="background: rgb(11,44,89);color: #fff">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p style="text-align: left;" "><?php echo isset($page1['page_name'])?$page1['page_name']:'';  ?></p>
            </div>
            <div class="modal-body">
              <form method="post" id="frmterm">
                <p style="font-family: 'Muli', sans-serif;
line-height: 40px;
letter-spacing: 1px;">
                    <?php echo isset($page1['page_description'])?$page1['page_description']:'';  ?><br><br>



                    <label for="agree"><input type="checkbox"  value="1" required id="agree">&nbsp;&nbsp; I have acknowledged & accepted all the above conditions before making payment to Schoolling.</label> <br>

                    
                </p>
                <div class="row">
                  <div class="col-md-8">
                    Regards<br>
                    Team Schoolling
                  </div>
                  <div class="col-md-4">
                    <button type="button" id="btnproceed" class="pull-right btn btn-warning">Proceed</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- <div class="modal-footer">
              
            </div> -->
        </div>

    </div>
</div>

<?php include 'pop.php'; ?>

<script>
  $('#btnproceed').click(function(){
    var checkterm=$('#agree:checkbox:checked').length;
    if(checkterm>0)
    {
      $.ajax({
          type:'post',
          url:'ajax_check_form.php',
          data:{'checkterm':checkterm},
          success:function(resdata){
            if(resdata=="success")
            {
              window.location.href="billing.php";
            }else{
              alert(resdata);
            }
          }
      });
    }else{
      alert("Please accept the below Terms Of Service Agreement to proceed.");
    }

  });
</script>