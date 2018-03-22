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

<style type="text/css">
 

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 75px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
        right: 0;
}
.dropdown-content .fa{background: rgb(11,44,89);
    color: #fff !important;
    padding-top: 6px !important;
    width: 30px !important;
    height: 30px !important;
    margin-left: 20px !important;}

.dropdown-content a {
    color: black;
    padding: 0px 16px;
    text-decoration: none;
    display: block;
    margin-top: 5px;
    margin-bottom: 5px;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

/*.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}*/
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

<div class="container">
            <div class="row">
                 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-tag="paid" style="margin-top: 35px;margin-bottom: 80px;">
                    <div class="cs-courses courses-grid" style="background: rgb(242,242,242);">
                        <div class="grid_btn">

                            <div class="col-md-6 ">
                              <div class="dropdown">
                              <a href="" data-target="#cs-login" data-toggle="modal">  <div class="dropbtn"><img src="assets/images/share.png" class="share1 "></div></a>
                                <div class="dropdown-content">
                                  <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                  <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                  <a href="#"><i class="fa fa-quora" aria-hidden="true"></i></a>
                                </div>
                              </div>   
                            </div>

                            <div class="col-md-6 map">
                            <a href="#"   class="js-show-help">
            
                              </a>
                        
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

                            </div>
                        </div>
                        <div class="">
                            <figure><a href="#"><img src="assets\images\school.png" alt="" class="trackhome"></a></figure>
                        </div>
                        <div class="cs-text cs-text1" style=" background: rgb(242,242,242);">       
                      
                            <span class="cs-caption" style="color: rgb(11,44,99) !important;">Address</span>
                            <div class="cs-post-title">
                              <h5 ><a href="#"  style="color: rgb(11,44,99) !important;">Latest Computer Science and Programming</a></h5>
                            </div>
                        
                        </div>
                        <hr style="border-color: rgb(11,44,99) !important; border: 3px solid;">
                         <div class="tracker">
        <div class="track">
           <a href="#"> <h5 class="track-text">Common Admission Form</h5><p style="padding-top: 20px;padding-left: 40px;color: #ddd;">Verified</p></a>
        </div>
        <div class="track">
            <a href="#"><h5 class="track-text">Parent's Signature</h5></a>
            <i class="fa fa-chevron-down track-arrow" aria-hidden="true"></i>
        </div>
        <div class="track">
            <a href="#"><h5 class="track-text">Submission to School</h5></a>
            <i class="fa fa-chevron-down track-arrow" aria-hidden="true"></i>
        </div>
        <div class="track">
            <a href="#"><h5 class="track-text">Receipt From School(if any)</h5></a>
            <i class="fa fa-chevron-down track-arrow" aria-hidden="true"></i>
        </div>
        <div class="track">
            <a href="#"><h5 class="track-text">Parents to Visit For Admission(if selected)</h5></a>
             <i class="fa fa-chevron-down track-arrow" aria-hidden="true"></i> 
        </div>
        <div class="line">

        </div>
    </div>
                      
                    </div>
                </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-tag="paid">
                    <div class="cs-courses courses-grid">
                        <div class="grid_btn">
                            <div class="col-md-6">
                              <a href="#"   data-target="#cs-login" data-toggle="modal">
                              <img src="assets/images/share.png" class="share1"></a>
                              <!-- <h6 style="margin-left: -23px;margin-top: 3px;">Share</h6> -->
                            </div>
                        <div class="col-md-6 map">
                            <a href="#"   class="js-show-help">
                              <!-- <i class="fa fa-map-marker" aria-hidden="true"></i> -->
                                <img src="assets/images/location.png" class="location-img1">
                                <!-- <h6>Distance</h6> -->
                              </a>
                            <div class="located-content js-help-content">
                                  <p>8Km From Laxmi Nagar, Delhi</p>
                            </div>
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

                        </div>
                        </div>
                        <div class="">
                            <figure><a href="#"><img src="assets\images\school.png" alt="" class="trackhome"></a></figure>
                        </div>
                        <div class="cs-text cs-text1">       
                            <!-- <div class="cs-rating">
                              <div class="cs-rating-star">
                                <span class="rating-box" style="width:100%;"></span>
                              </div>
                            </div> -->
                            <span class="cs-caption" style="color: rgb(11,44,99);">Address</span>
                            <div class="cs-post-title">
                              <h5  style="color: rgb(11,44,99) !important;"><a href="#" >Latest Computer Science and Programming</a></h5>
                            </div>
                            <!-- <span class="cs-courses-price"><em> Services Fee : <i class="fa fa-inr" aria-hidden="true"></i> </em>289.99</span> -->
                            
                        </div>
                        <hr>
                         <div class="tracker">
        <div class="track">
           <a href="#"> <h3 class="track-text">Common Admission Form</h3></a>

        </div>
        <div class="track">
            <a href="#"><h3 class="track-text">Parents Signature</h3></a>
        </div>
        <div class="track">
            <a href="#"><h3 class="track-text">Parents Signature</h3></a>
        </div>
        <div class="track">
            <a href="#"><h3 class="track-text">Parents Signature</h3></a>
        </div>
        <div class="line">
        </div>
    </div>
                      
                    </div>
                </div>

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

                              <script>
                                $(document).ready(function(){
                                    $('[data-toggle="tooltip"]').tooltip();   
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