<?php ob_start(); 
@session_start();
require_once('admin_panel/includes/function.php');
global $GFH_Admin;
$siteinfo=$GFH_Admin->getSiteinfo();
//unset($_SESSION);
// echo "<pre>";print_r($_SESSION);die;
 ?>
<link href="assets\css\bootstrap.css" rel="stylesheet">
<link href="assets\css\bootstrap-theme.css" rel="stylesheet">
<link href="assets\css\iconmoon.css" rel="stylesheet">
<link href="assets\css\chosen.css" rel="stylesheet">
<link href="assets\css\jquery.mobile-menu.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link href="assets\css\media.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="cs-smartstudy-plugin.css" rel="stylesheet">
<link href="assets\css\color.css" rel="stylesheet">
<link href="assets\css\widget.css" rel="stylesheet">
<link href="assets\css\responsive.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
</head>
<body class="wp-smartstudy">
<div class="wrapper"> 
	<!-- Side Menu Start -->
	<div id="overlay"></div>
    
	<!-- Side Menu End -->
	<!-- Header Start -->
    <style type="text/css">
        body{ 

}
.a{
    position: absolute;
    white-space: nowrap;
    animation: floatText 5s infinite alternate ease-in-out;
}

@-webkit-keyframes floatText{
  from {
    left: -5%;
  }

  to {
    /* left: auto; */
    left: 5%;
  }
}
    </style>
	<header id="header" class=""> 
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <div class="cs-logo cs-logo-dark">
                            <div class="cs-media">
                                <figure><a href="index.php"><img src="assets\images\logo_rnd.png" alt="" ></a></figure>
                            </div>
                        </div>
                        <div class="cs-logo cs-logo-light">
                            <div class="cs-media">
                                <figure><a href="#"><img src="assets\images\cs-logo-light.png" alt=""></a></figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-6 col-xs-6">
                        <div class="cs-main-nav">
                            <nav class="main-navigation">
                                <ul>
                                   <!--  <li><a href="about.php">About Us</a></li>
                                    <li><a href="#">Blog</a></li>
                                 
                                    <li class="menu-item-has-children"><a href="#">Mobile App</a>
                                    </li> -->
                                    <li class="menu-item-has-children wiggle" style="background-color: #fff; padding: 15px 11px;border-radius: 10px;">
                                        <a href="apply-to-schools.php" target="_blank" style="color:rgb(11,44,99)!important;padding: 0px;" class="wiggle">Apply To Schools</a>
                                    </li>
                                    <li class="menu-item-has-children"   >
                                        <?php if(isset($_SESSION['SCH_USERID'])){  ?>
                                        <a href="dashboard.php" ><i class="fa fa-user faprofile" style="color: #0b2c59;" aria-hidden="true" ></i> <span style="color: #0b2c59;font-size: 14px;    text-transform: none;">Dashboard</span> </a>
                                        <?php  }else{ ?>
                                        <a href="#"  data-target="#cs-login" data-toggle="modal" style="color:rgb(11,44,99) !important;">Login</a>
                                        <?php } ?>
                                    </li>
                                <li class="menu-item-has-children"><a href="cart.php" target="_blank"><i class="fa fa-cart-arrow-down" aria-hidden="true" style="font-size: 37px;margin-top: -10px;color: rgb(11,44,99) !important;"></i><div class="counter" style="font-size: 20px;margin-top: -12px; color: rgb(11,44,99) !important;"><?php echo @count($_SESSION['CART']);  ?></div></a>
                                    </li>
                                </ul>
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