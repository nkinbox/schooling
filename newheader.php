<?php ob_start(); 
require_once('admin_panel/includes/function.php');
global $GFH_Admin;
@session_start();
$siteinfo=$GFH_Admin->getSiteinfo();
 ?>

<link href="assets\css\bootstrap.css" rel="stylesheet">
<link href="assets\css\bootstrap-theme.css" rel="stylesheet">
<link href="assets\css\iconmoon.css" rel="stylesheet">
<link href="assets\css\chosen.css" rel="stylesheet">
<link href="assets\css\jquery.mobile-menu.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link href="responsive.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="cs-smartstudy-plugin.css" rel="stylesheet">
<link href="assets\css\color.css" rel="stylesheet">
<link href="assets\css\widget.css" rel="stylesheet">
<link href="assets\css\media.css" rel="stylesheet">
<link href="assets\css\responsive.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css">
<!-- <link href="assets/css/bootstrap-rtl.css" rel="stylesheet"> Uncomment it if needed! -->

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="assets\scripts\jquery.js"></script>
<script src="assets\scripts\modernizr.js"></script>
<script src="assets\scripts\bootstrap.min.js"></script>
<script src="assets\scripts\form.js"></script>
<script src="assets\scripts\countries.js"></script>
<script src="assets\scripts\dob.js"></script>
</head>
<body class="wp-smartstudy">
<div class="wrapper"> 
	<!-- Side Menu Start -->
	<div id="overlay"></div>
    
	<!-- Side Menu End -->
	<!-- Header Start -->
	<header id="header" class=""> 
        <div class="main-header">
            <div class="">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <div class="cs-logo cs-logo-dark">
                            <div class="cs-media cs-media-new">
                                <figure><a href="index.php"><img src="assets\images\new1.png" alt="" ></a></figure>
                            </div>
                        </div>
                        <div class="cs-logo cs-logo-light">
                            <div class="cs-media">
                                <figure><a href="index.htm"><img src="assets\images\cs-logo-light.png" alt=""></a></figure>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
                        <div class="input-group input-group-new" style="width: 70% !important;">
                <div class="input-group-btn search-panel" style="padding: 4px 2px 7px 9px;">
                    <button type="button" class="btn btn-default dropdown-toggle btn-index btn-index-new" data-toggle="dropdown">
                        <span id="search_concept">Delhi</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" id="region" onclick="lang1(event);" role="menu">
                      <?php  $allregions=$GFH_Admin->getRegions();
                      if(mysqli_num_rows($allregions)>0){
                        while($allregion=mysqli_fetch_assoc($allregions)){
                     ?>
                    <li><a href="#contains"><?php echo isset($allregion['name'])?$allregion['name']:'';  ?></a></li>

                    <?php } } ?>
                    <li><a href="#all">All Regions</a></li>
                   <!--    <li><a href="#">North West Delhi</a></li>
                      <li><a href="#its_equal">North East Delhi</a></li>
                      <li><a href="#greather_than">North Delhi</a></li>
                      <li><a href="#less_than">Central Delhi</a></li>
                      <li><a href="#less_than">West Delhi</a></li>
                      <li><a href="#less_than">East Delhi</a></li>
                      <li><a href="#less_than">South West Delhi</a></li>
                      <li><a href="#less_than">South East Delhi</a></li>
                      <li><a href="#less_than">New Delhi</a></li>

                      <li class="divider"> West Delhi</li>
                      <li><a href="#all">All Regions</a></li> -->
                    </ul>
                </div>
              <div class="input-group">
                <span class="input-group-addon input-image" id="basic-addon1" style="width: 45px !important;"><img src="assets/images/search_logo.png" class="img-responsive" width="35px"></span>
                <input type="text" class="form-control search_school" id="search" placeholder="Search By School Name" aria-describedby="basic-addon1 " style="font-size: 20px;    border-radius: 0px 10px 10px 0px;padding: 0;margin: 0;line-height: 1px;height: 40px;padding-left: 10px;">
                <input type="hidden" id="selectedregion" >
                <div id="suggesstion-box"></div>
              </div>
              
                <span class="input-group-btn">
                    <button class="btn btn-default search search-new" id="btnsearch" type="button">Search</button>
                </span>
            </div>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                         <div class="_myclassls-header-right">
                <ul>    
                <!--   <li class="head-dpdn new-li">
                    <a href="#"><i class="fa fa-bell fanotification" aria-hidden="true"></i></a>
                                            <ul class="dropdown-menu">
                                              <li><a href="login.php">Notifications</a></li>
                                          </ul>
               </li> -->
                  <li class="head-dpdn new-li">
                    <?php if(isset($_SESSION['SCH_USERID'])){  ?>
                      <a href="dashboard.php" ><i class="fa fa-user faprofile" aria-hidden="true"></i> <span style="color: #fff;font-size: 14px;    text-transform: none;">Dashboard</span>  </a>
                      
                      <?php }else{ ?>
                    <a href="#"  data-target="#cs-login" data-toggle="modal" style="color:#fff !important;">Login</a>
                    <?php } ?>
                  </li> 

                  <li class="dropdown head-dpdn new-li">
                        <a href="cart.php" target="_blank"><i class="fa fa-cart-arrow-down faprofile" aria-hidden="true"></i><div class="counter1" ><?php echo @count($_SESSION['CART']);  ?></div></a>
                  </li> 
                
                </ul>
            </div>
                    </div>
                </div>
			</div>
		</div>
		
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108901943-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-108901943-1');
</script>
	</header>
	<!-- Header End --> 