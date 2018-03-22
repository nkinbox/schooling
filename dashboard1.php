<?php   ob_start(); 
session_start();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>schoolling</title>
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
<script src="assets\scripts\jquery.js"></script>
<script src="assets\scripts\modernizr.js"></script>
<script src="assets\scripts\bootstrap.min.js"></script>
</head>
<body class="wp-smartstudy">
<div class="wrapper"> 
    <div id="overlay"></div>
    <header id="header" class="">
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <div class="cs-logo cs-logo-dark">
                            <div class="cs-media">
                                <figure><a href="index#" ><img src="assets\images\new1.png" alt="" class="logo-img" style="width: 130% !important;
                                    margin-left: -59px !important;margin-top: -62px !important;"></a>
                                </figure>
                            </div>
                        </div>
                        <div class="cs-logo cs-logo-light">
                            <div class="cs-media">
                                <figure><a href="index#"><img src="assets\images\cs-logo-light.png" alt=""></a></figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-6 col-xs-6">
                        <div class="cs-main-nav">
                            <nav class="main-navigation">
                                <div class="col-md-8" style="padding-top: 66px;padding-left: 60px;">
                                    <form class="navbar-form form_nav" role="search">
                                    <div class="new-search-bar">
                               
                                   <div class="input-group">
  <span class="input-group-addon" id="basic-addon1"><img src="assets/images/search_logo.png" class="img-responsive" width="35px"></span>
  <input type="text" class="form-control" placeholder="School Name, Address" aria-describedby="basic-addon1">
</div>
                                    </div>
                                    </form>
                                </div>

                                <div class="col-md-4">
                                   <div class="_myclassls-header-right" style="padding-right: 25px;">
                <ul>    
                      <li class="dropdown head-dpdn">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell fanotification" aria-hidden="true"></i></a>
                                         
                </li>
                    <li class="dropdown head-dpdn">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user faprofile" aria-hidden="true"></i> </a>
                       
                    </li> 
                    <li class="dropdown head-dpdn">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cart-arrow-down faprofile" aria-hidden="true"></i></a>
                    
                    </li> 
                
                </ul>
            </div>
                                </div>
                            </nav>
                            <div class="cs-search-area hidden-md hidden-lg">
                                <div class="cs-menu-slide">
                                    <div class="mm-toggle">
                                        <i class="icon-align-justify"></i>
                                    </div>            
                                </div>
                                <div class="search-area">
                                    <a href="#"><i class="icon-search2"></i></a>
                                    <form>
                                        <div class="input-holder">
                                            <i class="icon-search2"></i>
                                            <input type="text" placeholder="Enter any keyword">
                                            <label class="cs-bgcolor">
                                                <i class="icon-search5"></i>
                                                <input type="submit" value="search">
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
<div class="page-section" id="dashboard">
      <div class="page-section" style="background:url(assets/images/book.png) no-repeat; background-size: contain;margin-top: 84px; height: 150px; background-color: rgb(242,242,242);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-page-title">

                        <h1 style="color: rgb(11,44,99) !important;text-transform: capitalize !important; font-size: 35px;margin-top: 50px;">Dashboard<img src="assets/images/dashboard.png" style="height: 80px; position: absolute; top: 25px;right: 440px;"></h1>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-page-title">
                        <!-- <h1>My Dashboard</h1> -->
                    </div>
                    <div class="pull-right ">
                    <!--    <img src="assets/images/setting.png"> -->
                    <i class="fa fa-cog " aria-hidden="true"></i>
                    <h4 style="position: absolute;top: 40px;right: -13px;">Settings</h4>
                    </div>
                </div>
            </div>
        </div>
</div>

<div id="profile-section" class="text-center">
    <div class="row">
        <img src="assets/images/man.png" class="profile-image">
        <h4>Ayush Aggarwal</h4>
        <a href="edit-profile.php">Edit Profile     <i class="fa fa-pencil"></i></a>
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
    <button class="btn btn_doc">Documents Required</button>
 </div>
<div id="round">
<div class="container">
    <div class="col-md-8" style="margin-left: 16%;">
        <div class="col-md-6 col-sm-6">
            <div class="progress green">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value">90%</div>
            </div>
                <div class="text-center progress_font btn_doc">Fill Common Admission Form</div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="progress yellow">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value">75%</div>
            </div>
                <div class="text-center progress_font btn_doc">Track Application Status</div>
        </div>
    </div>
</div>
</div>

<?php include 'footer.php'; ?>