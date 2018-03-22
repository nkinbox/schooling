<?php   ob_start(); 
session_start();
// echo "<pre>";print_r($_SESSION);die;
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>schooling</title>
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
<body class="wp-smartstudy">
<div class="wrapper"> 
   
    <div id="overlay"></div>
    <!-- <div id="mobile-menu">
        <ul>
            <li>
                <div class="mm-search">
                    <form id="search" name="search">
                        <div class="input-group">
                            <input type="text" class="form-control simple" placeholder="Search ..." name="srch-term" id="srch-term">
                       <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            <li><a href="#">Home</a></li>
            <li class="active"><a href="#">Courses</a>
                <ul>
                    <li><a href="#">Courses grid view</a></li>
                    <li><a href="#">Courses Simple view</a></li>
                    <li><a href="#">Courses list view</a></li>
                    <li><a href="#">Courses Detail</a></li>
                </ul>
            </li>
            <li><a href="#">Pages</a>
                <ul>
                    <li><a href="#">Student Dashboard</a></li>
                    <li><a href="instructor-detail#">instructor Dashboard</a></li>
                    <li><a href="affiliations#">Affiliations</a></li>
                    <li><a href="typography#">Typography</a></li>
                    <li><a href="shortcode#">Short code</a>
                        <ul>
                            <li><a href="loop#">Loop</a></li>
                        </ul>
                    </li>
                    <li><a href="about-us#">About Us</a></li>
                    <li><a href="faqs#">FAQ's</a></li>
                    <li><a href="under-construction#">Maintenance Page</a></li>
                    <li><a href="404#">404 Page</a></li>
                    <li><a href="signup#">Signup / Login</a></li>
                    <li><a href="pricing#">Price Table</a></li>
                    <li><a href="#">Team</a>
                        <ul>
                            <li><a href="team-listing#"> Team List</a></li>
                            <li><a href="team-grid#"> Team Grid</a></li>
                            <li><a href="team-detail#"> Team Detail</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="#">Shop</a>
                        <ul>
                            <li><a href="shop#"> Products</a></li>
                            <li><a href="shop-detail#"> Detail</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#">Events</a>
                <ul>
                    <li><a href="events-grid#">Grid View</a></li>
                    <li><a href="events-listing#">List View</a></li>
                    <li><a href="events-detail#">Detail</a></li>
                </ul>
            </li>
            <li><a href="#">Blog</a>
                <ul>
                    <li><a href="blog-medium#">Medium List</a></li>
                    <li><a href="blog-large#">Large List</a></li>
                     <li><a href="blog-grid#">Grid</a></li>
                    <li><a href="blog-detail#">Detail</a></li>
                    <li><a href="blog-2#">Masonry</a></li>
                </ul>
            </li>
            <li><a href="#">Contact</a>
                <ul>
                    <li><a href="contact-us#">Contact us 1</a></li>
                    <li><a href="contact-us-02#">Contact us 2</a></li>
                </ul>
            </li>
            
        </ul>
    </div> -->

 
 


     <?php include('newheader.php');
     $userdetail=$GFH_Admin->getUserProfile();
    // /
      ?>

     <style type="text/css">
         .btn:hover{color: #fff !important}
     </style>
    
<div class="page-section" id="dashboard">
      <div class="page-section" style="margin-top: 84px; height: 150px; background-color: rgb(242,242,242);">
        <img src="assets/images/dash1.png" style="height: 160px;width: 160px;margin-top: 37px;" alt="schoolling">
       <img src="assets/images/dash2.png" style="height: 116px;width: 116px;float: right;margin-right: 20px;margin-top: 42px;" alt="schoolling">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-page-title">

                        <h1 style="color: rgb(11,44,99) !important;text-transform: capitalize !important; font-size: 35px;margin-top:-140px;">Dashboard<img src="assets/images/dashboard.png" style="height: 80px; position: absolute; top: -162px;right: 410px;" alt="schoolling"></h1>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-page-title">
                        <!-- <h1>My Dashboard</h1> -->
                    </div>
                    <div class=" ">
                    <!--    <img src="assets/images/setting.png"> -->
                   <a href="settings.php" style="color: #000;"> <i class="fa fa-cog " aria-hidden="true"></i>
                    <h4 style="position: absolute;top: 40px;right: 44px;" target="_blank">Settings</h4></a>
                    </div>
                </div>
            </div>
        </div>
</div>

<div id="profile-section" class="text-center">
    <div class="row">
        <img src="assets/images/man.png" class="profile-image">
        <h4><?php echo isset($userdetail['first_name'])?$userdetail['first_name']:'';  ?> <?php echo isset($userdetail['last_name'])?$userdetail['last_name']:'';  ?></h4>
        <a href="edit-profile.php" target="_blank">Edit Profile     <i class="fa fa-pencil"></i></a>
    </div>
</div>

<!-- <div class="container-fluid">
    <div class="row">
        <div class="runtext-container">
            <div class="main-runtext">
                <marquee direction="" onmouseover="this.stop();" onmouseout="this.start();">
                    <div class="holder">
                        <div class="text-container">
                            &nbsp; &nbsp;  &nbsp; <a data-fancybox-group="gallery" class="fancybox" href="images/runtext/Electric_Lighting_Act.jpg" title="THE ELECTRIC LIGHTING ACT: section 35">Fill Your Application Form Heere</a>
                        </div>
                    </div>
                </marquee>
            </div>
        </div>
    </div>
</div>
 -->
 <div class="container text-center">
    <a href="images/Document Specifications_Schoolling.pdf" style="color:#fff;" class="btn btn_doc" target="_blank">Documents Required</a>
 </div>
<div id="round">
<div class="container">
    <div class="col-md-8" style="margin-left: 16%;">
         <hr class="dhr">
         <i class="fa fa-chevron-right darrow" aria-hidden="true"></i>
        <div class="col-md-6 col-sm-6">
            <div class="progress green">
                <span class="progress-left">
                    <span class="progress-bar"  ></span>
                </span>
                <span class="progress-right"  >
                    <?php 

                    $orders=$GFH_Admin->getOrder();
                    $totalpercentage=array();
                    $poa=$GFH_Admin->getApplicationAddress();
                    $poa=mysqli_num_rows($poa);
                    $aoc=$GFH_Admin->getApplicationChild();
                    $aoc=mysqli_num_rows($aoc);
                    $aof=$GFH_Admin->getApplicationFather();
                    $aof=mysqli_num_rows($aof);
                    $aom=$GFH_Admin->getApplicationMother();
                    $aom=mysqli_num_rows($aom);
                    $aos=$GFH_Admin->getApplicationMother();
                    $aos=mysqli_num_rows($aos);
                    $aod=$GFH_Admin->getApplicationDocument();
                    $aod=mysqli_num_rows($aod); //getApplicationSibling
                    if($poa>0)
                    {
                        array_push($totalpercentage,16);

                    }
                    if($aoc>0)
                    {
                         array_push($totalpercentage,16);

                    }
                    if($aom>0)
                    {
                         array_push($totalpercentage,16);
                    }
                    if($aof>0)
                    {
                        array_push($totalpercentage,16);
                    }
                    if($aos>0)
                    {
                       array_push($totalpercentage,16);
                    }
                    if($aod>0)
                    {
                        array_push($totalpercentage,20);
                    }

                   ?>
                    <span class="progress-bar" ></span>
                </span>
                <div class="progress-value">

                <?php  echo isset($totalpercentage)?array_sum($totalpercentage):''; ?>%</div>
            </div>
                <div class="text-center progress_font btn_doc" target="_blank"><a href="
                    <?php  if(mysqli_num_rows($orders)>0){
                        echo 'form.php';
                    }else{
                        echo '#';
                    }  ?>
                    
                    " style="color:#fff;" >Fill Common Admission Form</a></div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="progress yellow">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value">
                <?php  if(isset($userdetail['track_id'])&&!empty($userdetail['track_id'])){ 
                    echo $userdetail['track_id']*20;
                 ?>

                            
                <?php }else{
                    echo "0";
                 ?>
                <?php } ?>
                %</div>
            </div>
                <div class="text-center progress_font btn_doc" target="_blank"><a href=" <?php  if(mysqli_num_rows($orders)>0){
                        echo 'track.php';
                    }else{
                        echo '#';
                    }  ?>" style="color:#fff;" >Track Application Status</a></div>
        </div>
    </div>
</div>
</div>

<?php include 'footer.php'; ?>