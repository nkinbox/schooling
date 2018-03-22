<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Schoolling | Track Application</title>
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
<link href="assets\css\media.css" rel="stylesheet">
<link href="assets\css\widget.css" rel="stylesheet">
<link href="assets\css\responsive.css" rel="stylesheet">
<!-- <script src="assets\scripts\jquery.js"></script>
<script src="assets\scripts\modernizr.js"></script>
<script src="assets\scripts\bootstrap.min.js"></script> -->
</head>

<style type="text/css">
  .wp-smartstudy .courses-grid .cs-post-title{height:auto !important}
  .wp-smartstudy .courses-grid figure{height: auto !important}
  .wp-smartstudy .cs-caption{padding: 0px !important}
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
            <li class="menu-item-has-children"><a href="courses-grid.php">Apply To School</a>
            </li>
            <li class="menu-item-has-children"><a href="#"  data-target="#cs-login" data-toggle="modal">Login</a>
            </li>
            <li class="menu-item-has-children"><a href="cart.php"><img src="assets/images/cart.png" width="35px"><div class="counter">5</div>cart</a>
            </li>
        </ul>
    </div>


<?php include('newheader.php'); ?>
 <div class="page-section" style=" height: 150px;margin-top: 84px; background-color:rgb(242,242,242);">
  <img src="assets/images/track1.png" style="    height: 120px;
    width: 120px;margin-top: 35px;margin-left: 14px;" alt="schoolling">
       <img src="assets/images/track2.png" style="height: 180px;width: 180px;float: right;margin-right: 20px;margin-top: 13px;" alt="schoolling">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-page-title">
        
                        <h1 style="color: rgb(11,44,89) !important; text-transform: capitalize !important;margin-top: -96px;">Track Application <img src="assets/images/arrow.png" style="height: 50px; position: absolute;top: -110px;"> </h1>


                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php  
          // echo "<pre>";print_r($_SESSION['SCH_USERID']);die;
        $trackdetails=$GFH_Admin->trackStatus(@$_SESSION['SCH_USERID']);

          if(mysqli_num_rows($trackdetails)>0){
            $trackdetail=mysqli_fetch_assoc($trackdetails);
            print_r($trackStatus); die;
          }
          ?>
                        <h5 style="text-align: center;padding-left: 190px;font-size: 25px;"><a href="#"  style="color:#F56B06 !important;">APP ID:<?php echo isset($trackdetail['trackid'])?$trackdetail['trackid']:'';  ?></a></h5>

    <div class="container">
      <div class="row">

        <?php  
          // echo "<pre>";print_r($_SESSION['SCH_USERID']);die;
        $trackdetails=$GFH_Admin->trackStatus(@$_SESSION['SCH_USERID']);
        
          if(mysqli_num_rows($trackdetails)>0){
            while($trackdetail=mysqli_fetch_assoc($trackdetails)){
              
              // echo "<pre>";print_r($trackdetail);die;
              $schools=$GFH_Admin->getSchool($trackdetail['sk_id']);
              $school=mysqli_fetch_assoc($schools);

              $users=$GFH_Admin->getRegisterUsers(@$_SESSION['SCH_USERID']);
              $user=mysqli_fetch_assoc($users);
               // echo "<pre>";print_r($user['common_admission_form']);die;
          ?>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-tag="paid" style="margin-top: 35px;margin-bottom: 80px;">
          <div class="cs-courses courses-grid" style="background: #fff;">
            <div class="grid_btn">
              <!--<div class="col-md-6">
                <a href="#"   data-target="#cs-login" data-toggle="modal">
                  <img src="assets/images/share.png" class="share1"></a>

                </div>-->

              </div>
              <div class="row">
                <div class="col-md-5">
                  <figure style="border-bottom:0px;">
                 
                  <a href="#">
                     <?php  if(isset($school['schoolimg'])){ ?>
                    <img src="images\school\<?php echo isset($school['schoolimg'])?$school['schoolimg']:'';  ?>" alt="" class="img-responsive">
                      <?php }else{ ?>
                      <img src="assets\images\school.png" alt="" class="img-responsive">
                      <?php } ?>
                  </a>
                </figure>
                </div>
                <div class="col-md-7">
                  <div class="cs-text cs-text1" style="background: #fff;padding-top: 35px !important">       

                <span class="cs-caption" style="color: rgb(11,44,99) !important;"><?php echo isset($school['name'])?$school['name']:'';  ?></span>
                <div class="cs-post-title">
                  <h5 ><a href="#"  style="color: rgb(11,44,99) !important;"><?php echo isset($school['address'])?$school['address']:'';  ?></a></h5>
                 <!--  <h5 ><a href="#"  style="color: rgb(11,44,99) !important;">Registration ID:<?php echo isset($trackdetail['trackid'])?$trackdetail['trackid']:'';  ?></a></h5> -->
                </div>

              </div>
                </div>
                
              </div>
              

              <?php
                // if(isset($trackdetail['common_admission_form']))
                      $trackname="To be filled";
                      $trackcolor='red';
                if(isset($user['common_admission_form']))
                {
                    if($user['common_admission_form']=='2'){
                      $trackname="Filled";
                      $trackcolor='#F56B06';
                    }elseif($user['common_admission_form']=='3'){
                      $trackname="Verified";
                      $trackcolor='#12C255';
                    }
                }
                // echo $trackname." ".$trackcolor;
                $trackname1="";
                $trackcolor1='red';
                if(isset($trackdetail['parent_signature']))
                {
                   if($trackdetail['parent_signature']=='1')
                    {
                      $trackname1="In Process";
                      $trackcolor1='#F56B06';
                    }elseif($trackdetail['parent_signature']=='2'){
                      $trackname1="Done";
                      $trackcolor1='#12C255';
                    }
                    elseif($trackdetail['parent_signature']=='3'){
                      $trackname1="Not Required";
                      $trackcolor1='#12C255';
                    }
                }
                $trackcolor2='red';
                $trackname2="";
                if(isset($trackdetail['submission_to_school']))
                {
                   if($trackdetail['submission_to_school']=='1')
                    {
                       $trackname2="In Process";
                      $trackcolor2='#F56B06';
                    }elseif($trackdetail['submission_to_school']=='2'){
                     $trackname2="Done";
                      $trackcolor2='#12C255';
                    }
                }
                $trackcolor3='red';
                $trackname3="";

                if(isset($trackdetail['receipt_from_school']))
                {
                   if($trackdetail['receipt_from_school']=='1')
                    {
                      $trackname3="None";
                      $trackcolor3='#12C255';
                    }elseif($trackdetail['receipt_from_school']=='2'){
                      $trackname3="Delivered to parent ";
                      $trackcolor3='#12C255';
                    }
                }
                 $trackcolor4='red';
                 $trackname4="";
                if(isset($trackdetail['parent_visit_for_admission']))
                {
                   if($trackdetail['parent_visit_for_admission']=='1')
                    {
                      $trackname4="";
                      $trackcolor4="red";
                    }elseif($trackdetail['parent_visit_for_admission']=='2')
                    {
                      $trackname4="";
                      $trackcolor4="#12C255";
                    }{
                     
                    }
                }
                // echo $trackname1;die;

              ?>
            <hr style="border-color: rgb(11,44,99) !important; border: 3px solid;">
              <div class="tracker">
                <div class="track" style="background-color:<?php echo isset($trackcolor)?$trackcolor:'red';?>;">
                  <a href="#"> <h5 class="track-text">Common Admission Form</h5>
                    <p style="padding-top: 20px;padding-left: 40px;width: 200px; color:#000;" ><?php echo isset($trackname)?$trackname:'To be Filled';  ?></p></a>
                </div>
                <div class="track" style="background-color:<?php echo isset($trackcolor1)?$trackcolor1.';':'red';?>">
                  <a href="#"><h5 class="track-text">Parent's Signature</h5>
                    <p style="padding-top: 20px;padding-left: 40px;width: 200px; color:#000;" ><?php echo isset($trackname1)?$trackname1:'';  ?></p>
                  </a>
                  <i class="fa fa-chevron-down track-arrow" aria-hidden="true"></i>
                </div>
                <div class="track" style="background-color:<?php echo isset($trackcolor2)?$trackcolor2.';':'red';?>">
                  <a href="#"><h5 class="track-text">Submission to School</h5>
                    <p style="padding-top: 20px;padding-left: 40px;width: 200px; color:#000;" ><?php echo isset($trackname2)?$trackname2:'';  ?></p>
                  </a>
                  <i class="fa fa-chevron-down track-arrow" aria-hidden="true"></i>
                </div>
                <div class="track" style="background-color:<?php echo isset($trackcolor3)?$trackcolor3.';':'red';?>">
                  <a href="#"><h5 class="track-text">Receipt From School(if any)</h5>
                     <p style="padding-top: 20px;padding-left: 40px;width: 200px; color:#000;" ><?php echo isset($trackname3)?$trackname3:'';  ?></p>
                  </a>
                  <i class="fa fa-chevron-down track-arrow" aria-hidden="true"></i>
                </div>
                <div class="track" style="background-color:<?php echo isset($trackcolor4)?$trackcolor4.';':'red';?>">
                  <a href="#"><h5 class="track-text" style="margin-top:-2px;">Parents to Visit For Admissions(if selected)</h5>
                     <p style="padding-top: 20px;padding-left: 40px;width: 200px; color:#000;" ><?php echo isset($trackname4)?$trackname4:'';  ?></p>
                  </a>
                  <i class="fa fa-chevron-down track-arrow" aria-hidden="true"></i> 
                </div>
                <div class="line">

                </div>
              </div>

            </div>
          </div>

        <?php  } } ?>
        </div>

      </div>
<?php include 'footer.php'; ?>

                              <script type="text/javascript">
                                $('.js-help-content').hide();

                              $('.js-show-help').click(function(e){
                                  e.stopPropagation();
                                  $('.js-help-content').fadeToggle(200);
                              });
                              $('.js-help-content').click(function(e){
                                  e.stopPropagation();
                              });
                              $(document).click(function(){
                                   $('.js-help-content').fadeOut(200);
                              });


                              </script>
<script src="assets\scripts\responsive.menu.js"></script> 
<script src="assets\scripts\chosen.select.js"></script> 
<script src="assets\scripts\slick.js"></script> 
<script src="assets\scripts\jquery.mCustomScrollbar.concat.min.js"></script> 
<script src="assets\scripts\jquery.mobile-menu.min.js"></script>
<script src="assets\scripts\fliters.js"></script><!-- Fliters -->
<!-- Put all Functions in functions.js --> 
<script src="assets\scripts\functions.js"></script>
</body>
<?php include 'pop.php'; ?>
</html>