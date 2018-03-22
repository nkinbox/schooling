<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Schoolling | Online Nursery Admissions</title>
<?php include 'header.php'; 
 //echo "<pre>";print_r($siteinfo);die;
?>
<style type="text/css">
  .social1
  {
    display: none;
  }
  .main-header{background:#dbe5f1;/*position:unset !important;*/}

 .space-nega{padding-right: 0px !important;} 
 .space-nega-6{padding-left: 4px !important;
    margin-top: 4px;
    border-left: 1px solid #000;}

    .input-image img{margin-left: -7px !important;}
</style>
  <div class="color" style="background: #dbe5f1;padding-top: 15px;margin-bottom: -22px;margin-top: 84px;">
    <h2 style="color:  rgb(11,44,89) !important;/* margin-left: 470px;*/text-align: center; text-transform: capitalize !important;" class="indexh2"><?php echo isset($siteinfo['title'])?$siteinfo['title']:'';  ?></h2>
    <h2 style="color: rgb(11,44,89) !important; text-align: center;"><?php echo isset($siteinfo['years'])?$siteinfo['years']:'';  ?></h2>

  <div class="row"> 
        <div class="col-xs-8 col-xs-offset-2">
        <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle btn-index" data-toggle="dropdown">
                      <span id="search_concept"><i class="fa fa-location-arrow" aria-hidden="true"></i>&nbsp;&nbsp;Delhi</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" id="region" onclick="lang1(event);" role="menu">
                    <?php  $allregions=$GFH_Admin->getRegions();
                      if(mysqli_num_rows($allregions)>0){
                        while($allregion=mysqli_fetch_assoc($allregions)){
                     ?>
                    <li><a href="#contains"><?php echo isset($allregion['name'])?$allregion['name']:'';  ?></a></li>

                    <?php } } ?>
                    <li><a href="#all">All Regions</a></li>
                      <!-- <li><a href="#contains">North West Delhi</a></li>
                      <li><a href="#its_equal">North East Delhi</a></li>
                      <li><a href="#greather_than">North Delhi</a></li>
                      <li><a href="#less_than">Central Delhi</a></li>
                      <li><a href="#less_than">West Delhi</a></li>
                      <li><a href="#less_than">East Delhi</a></li>
                      <li><a href="#less_than">South West Delhi</a></li>
                      <li><a href="#less_than">South East Delhi</a></li>
                      <li><a href="#less_than">New Delhi</a></li>
                      <li><a href="#less_than">South Delhi</a></li>
                      <li class="divider"> West Delhi</li>
                      <li><a href="#all">All Regions</a></li> -->
                    </ul>
                </div>

                 <div class="input-group-btn school-panel">
                    <button type="button" class="btn btn-default dropdown-toggle btn-index" data-toggle="dropdown">
                      <span id="school_concept"><i class="fa fa-location-arrow" aria-hidden="true"></i>&nbsp;&nbsp;School Type</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" id="region" onclick="school_type(event);" role="menu">
                   
                    
                      <li><a href="#its_equal">School</a></li>
                      <li><a href="#greather_than">Play School</a></li>
                    
                    </ul>
                </div>

            <div class="row">   
            <div class="col-md-9 space-nega"> 
            <div class="input-group">
  <span class="input-group-addon input-image" id="basic-addon1"><img src="assets/images/search_logo.png" class="img-responsive" width="35px"></span>
  <input type="text" class="form-control search_school" id="search" placeholder="Search by School Name" aria-describedby="basic-addon1" autocomplete="off" style="font-size: 20px; ">
  
  <input type="hidden" id="selectedregion" >
   <input type="hidden" id="select_school" >
 
            <div id="suggesstion-box"></div>
</div>
</div>
<!-- <div class="col-md-3 space-nega-6">
<select class="selectpicker">
    <option>School Type</option>
    <option>School</option>
     <option>Play School</option>
</select>
</div> -->
</div>


                <span class="input-group-btn">
                    <button class="btn btn-default search" id="btnsearch" type="button">Search</button>
                </span>

            </div>
        </div>


    </div>

     <img src="assets/images/image2.png" style="margin:0 auto; margin-top: 89px; " class=" index-img img-responsive">
   </div>
    <hr>


 <div class="color" style="background:rgb(242,242,242); margin-top: -40px;padding-top: 25px;">

<div class="row">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" type="text/javascript"></script>

<h3 class="main-h3">Hear What Parents Have To Say</h3> 

  <!-- Head tags to include FontAwesome -->


<!-- testimonial -->
<div class="container">
  <div class="row">
  </div>
  <div class='row'>
    <div class=''>
      <div class="carousel slide" data-ride="carousel" id="quote-carousel">
        <!-- Bottom Carousel Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
          <li data-target="#quote-carousel" data-slide-to="1"></li>
          <li data-target="#quote-carousel" data-slide-to="2"></li>
        </ol>
        
        <!-- Carousel Slides / Quotes -->
        <div class="carousel-inner">
        
          <!-- Quote 1 -->
          <div class="item active">
            <blockquote>
              <div class="row">
                <div class="col-sm-12 text-center">
                  <img class="img-circle" src="assets/images/summit.png" style="width: 100px;height:100px;"><br>
                </div>
                <div class="col-sm-12">
                  <small><strong style="color: rgb(11,44,89) !important;">Sumit Khanna</strong></small>
                  <small><strong style="color: rgb(11,44,89) !important;">Central Delhi</strong></small><br>
                  <p> Nursery admission process is a hassle in Delhi. In a stipulated time we need to fill forms for all the relevant schools, get DDs from bank & submit verification docs to the schools. Schoolling saves a lot of time and botheration for parents.</p>
                
                </div>
              </div>
            </blockquote>
          </div>
          <!-- Quote 2 -->
          <div class="item">
            <blockquote>
              <div class="row">
                <div class="col-sm-12 text-center">
                  <img class="img-circle" src="assets/images/parent.png" style="width: 100px;height:100px;">
                </div>
                <div class="col-sm-12">
                  <small><strong style="color: rgb(11,44,89) !important;">Sakshi Gupta</strong></small>
                  <small><strong style="color: rgb(11,44,89) !important;">North Delhi</strong></small><br>
                  <p>Both of us are working parents & the visiting hours to schools clashed with our working hours at the time of admissions. We missed the deadlines of most of the schools. Wish someone could help. </p>
               
                </div>
              </div>
            </blockquote>
          </div>
          <!-- Quote 3 -->
          <div class="item">
            <blockquote>
              <div class="row">
                <div class="col-sm-12 text-center">
                  <img class="img-circle" src="assets/images/somya.png" style="width: 100px;height:100px;">
                </div>
                <div class="col-sm-12">
                  <small><strong style="color: rgb(11,44,89) !important;">Somya Jarrel</strong></small>
                  <small><strong style="color: rgb(11,44,89) !important;">East Delhi</strong></small><br>
                  <p>Visiting different school's websites & struggling in long queues for admission information & forms is one hassle no parent wants.
Well, this product help​s​​ in getting rid of queues and all the headache about the important dates, ​f​orms​,​ document submission.</p>
                  
                </div>
              </div>
            </blockquote>
          </div>
        </div>
        
      </div>                          
    </div>
  </div>
</div>
<!-- /testimonial -->
  </div>
</div>



<div class="container">
	<div class="row">
		<h3 class="main-h3">How It Works</h3> 
		
      <img src="assets/images/image1.png" style="margin: 0 auto;" class="img-responsive">

		<div class="row">
			<div class="col-md-4 col-xs-12">
				<div class="work-box">
					<img src="assets/images/work1.png" class="img-responsive">
					<img src="assets/images/work4.png" class="work4 img-responsive">
          <h3 class="search-schools">Search Schools</h3>
          <h4 style="padding-left: 40px; text-align: center;">Search Schools Basis Various Filters & Calculate Distance Of Schools From Home</h4>
				</div>	
			</div>
			<div class="col-md-4 col-xs-12">
				<div class="work-box">
					<img src="assets/images/work2.png" class="img-responsive">
          <h3 class="search-schools">Apply Online</h3>
          <h4 style="padding-left: 40px; text-align: center;">Fill A Single Admission Form For Multiple Schools & Upload Documents Online</h4>
				</div>
			</div>
			<div class="col-md-4 col-xs-12">
				<div class="work-box">
					<img src="assets/images/work3.png" class="img-responsive">
          <h3 class="search-schools">Track Application</h3>
          <h4 style="padding-left: 40px; text-align: center;">Track Your Application Status Online On Real-Time Basis</h4>
				</div>
			</div>
		</div>
	</div>
</div>

 <div class="color" style="background:rgb(220,230,241);">
<div id="slider">
  <div class="row">
    <h3 class="main-h3">How It Helps You</h3> 
  </div>

  
<div class="test1">
<div class="pardeep">
  <h1>Schoolling enables the parents to apply to multiple schools for their child's admissions, sitting at home</h1>
<button id="play-video" href="#"><i class="fa fa-play" aria-hidden="true"></i>&nbsp&nbsp&nbsp Watch Video</button>
<div class="shape1">
<div class="border1"></div>
<div class="circle1"></div>
</div>
</div>
 
<!-- <iframe class="iframe" id="video" src="//www.youtube.com/embed/9B7te184ZpQ?rel=0" frameborder="0" allowfullscreen></iframe> -->
<iframe class="iframe" src="https://www.youtube.com/embed/3wOcddDLPRw" frameborder="0" allowfullscreen></iframe>

  </div>

</div>


    <div class="row">
        <div class="col-md-3 col-xs-12">
          <div class="help-line">
            <h5 class="helph5">Avoid Long Admission Queues</h5>
            <img src="assets/images/man3.png" class="helpimg img-responsive" style="    height: 76px;
    width: 124px;">
          </div>
        </div>
        <div class="col-md-3 col-xs-12">
          <div class="help-line">
            <h5 class="helph5">Do Not Miss Office</h5>
            <img src="assets/images/brief.png" class="helpimg img-responsive">
          </div>
        </div>
        <div class="col-md-3 col-xs-12">
          <div class="help-line">
            <h5 class="helph5" style="    margin-left: -30px;">Save Petrol</h5>
            <img src="assets/images/petrol.png" class="helpimg img-responsive">
          </div>
        </div>
        <div class="col-md-3 col-xs-12">
          <div class="help-line">
            <h5 class="helph5"  style="    margin-left: -30px;">Save Time</h5>
            <img src="assets/images/time.png" class="helpimg img-responsive">
          </div>
        </div>
  </div>  
    </div>




  <div id="count">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-xs-4">
          <div class="count-line">
            <img src="assets/images/count1.png" class="count-img ">
            <div class="counter"><?php echo isset($siteinfo['total_school'])?$siteinfo['total_school']:'';  ?></div>
            <!-- <span style="    display: inline;
    font-size: 40px;
    float: right;
    color: #fff;
    position: absolute;
    left: 280px;
    top: 26px;">+</span> -->
            <h3 style="position: absolute;left: 225px;top: 50px;color: #fff !important;">Schools</h3>


          </div>
        </div>
        <div class="col-md-4 col-xs-4">
          <div class="count-line">
            <img src="assets/images/count2.png" class="count-img ">
            <div class="counter"><?php echo isset($siteinfo['location'])?$siteinfo['location']:'';  ?></div>
            <h3 style="position: absolute;left: 225px;top: 50px;color: #fff !important;">Locations</h3>
          </div>
        </div>
        <div class="col-md-4 col-xs-4">
          <div class="count-line">
            <img src="assets/images/count3.png" class="count-img   ">
            <div class="counter"><?php echo isset($siteinfo['regions'])?$siteinfo['regions']:'';  ?></div>
            <h3 style="position: absolute;left: 225px;top: 50px;color: #fff !important;">Regions</h3>
          </div>
        </div>
      </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <h3 class="main-h3">Our Excellent Team</h3>
        <div class="col-md-4 col-xs-12">
          <div class="team-line">
            <img src="assets/images/team1.png" class="team-img">
            <h3 class="team-name">Aayush Aggarwal</h3>
            <h5 class="desg">Founder & CEO</h5> <br/><br/>
           <!-- <p class="team-text"> Aayush has been involved in conceptualizing, formulating & delivering the schoolling product right from day one when the idea of simplifying the complex admission process struck him by seeing one of his close relatives struggling to get an admission for his daughter. </p> -->
          
          </div>
         <div class="social_icon">
    <!-- <h5 class="text-center"> Link Accounts</h5> -->
    <ul>
      <li><a href="https://www.linkedin.com/in/aayushaggarwalschoolling/" target="_blank"><i class="fa fa-linkedin fa1" aria-hidden="true"></i></a></li>
        <li><a href="https://www.quora.com/profile/Aayush-Aggarwal-16" target="_blank"><i class="fa fa-quora fa1" aria-hidden="true"></i></a></li>
      <li><a href="https://www.facebook.com/aayush.aggarwal.7693" target="_blank"><i class="fa fa-facebook fa1" aria-hidden="true"></i></a></li>
    
      
      <li><a href="https://www.instagram.com/aayush_aggarwal_/?hl=en" target="_blank"><i class="fa fa-instagram fa1" aria-hidden="true"></i></a></li>
      <li><a href="https://twitter.com/iAayushAggarwal" target="_blank"><i class="fa fa-twitter fa1" aria-hidden="true"></i></a></li>
    </ul>
  </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="team-line">
            <img src="assets/images/team2.png" class="team-img">
            <h3 class="team-name" style="left: 134px;">Srishti Garg</h3>
            <h5 class="desg">Operations Head</h5>
            <!-- <p class="team-text">
Srishti is heading the operation related activities & has been conceptualizing our business model. She has also been formulating the efficiency of logistic related services.</p> -->
          </div>
          <div class="social_icon">
    <!-- <h5 class="text-center"> Link Accounts</h5> -->
    <ul>
      <li><a href="https://www.facebook.com/srishti.garg.1" target="_blank"><i class="fa fa-facebook fa1" aria-hidden="true"></i></a></li>
      <li><a href="https://www.instagram.com/srishtigarg9/" target="_blank"><i class="fa fa-instagram fa1" aria-hidden="true"></i></a></li>
      <li><a href="http://www.linkedin.com/in/srishti-garg-b24519108" target="_blank"><i class="fa fa-linkedin fa1" aria-hidden="true"></i></a></li>
     

    </ul>
  </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="team-line">
            <img src="assets/images/team3.png" class="team-img ">
            <h3 class="team-name">Shiwani Agrawal</h3>
            <h5 class="desg">Content Writer</h5>
            <!-- <p class="team-text">Shiwani has been the former member of English Literary Society, SRCC. Presently she is the co-editor of National Service Scheme and PR Head of Connecting Dreams Foundation-SRCC. She is an ardent reader and writing enthusiast & working with Schoolling as a content writer.</p> -->
          </div>
          <div class="social_icon">
    <!-- <h5 class="text-center"> Link Accounts</h5> -->
    <ul>
    
       <li><a href="https://www.linkedin.com/in/shivani-agrawal-17460369" target="_blank"><i class="fa fa-linkedin fa1" aria-hidden="true"></i></a></li>
      <li><a href="https://www.quora.com/profile/Shiwani-Kumari-1?share=a5412142&srid=nDHe" target="_blank"><i class="fa fa-quora fa1" aria-hidden="true"></i></a></li>
       <li><a href="https://www.facebook.com/shivani.agrawal.376695" target="_blank"><i class="fa fa-facebook fa1" aria-hidden="true"></i></a></li>
      <li><a href="https://www.instagram.com/shivani4898/" target="_blank"><i class="fa fa-instagram fa1" aria-hidden="true"></i></a></li>
      <li><a href="https://twitter.com/shivi_elle?s=08" target="_blank"><i class="fa fa-twitter fa1" aria-hidden="true"></i></a></li>
    </ul>
  </div>
        </div>
      </div>

    </div>
<div class="color" style="background:rgb(242,242,242); margin-top: 20px;padding-top: 25px;">
      <div class="row">
        
        
        <div class="col-md-4 app-img">
          <img src="assets/images/mobile.png"  class="img-responsive" alt="schoolling">
        </div>
        <div class="col-md-8 col-xs-12">
          <h3 class="main-h3" style="text-align: left;">Mobile App Launching  Soon</h3>
          <p class="app-text">Apply to over 50+ Schools for Nursery admissions on <br>the go with the Schoolling App</p>
          <!-- <h5 class="apph5">Send A Link Via SMS To Install The App</h5>
          <form class="form-inline" style="margin-top: 50px;">
          
           <div class="input-group" style="width: 40%;">
  <span class="input-group-addon input-image" id="basic-addon1">+91</span>
  <input type="number" class="form-control" aria-describedby="basic-addon1" style="font-size: 20px;    border-radius: 0px 10px 10px 0px;width: 60%;">
   <button type="submit" class="btn btn-primary app-button">Text App Link</button>
</div> -->
       

         
        </form>

        <button style="background: none;border: none;margin-left: -30px;"><img src="assets/images/google-play.png" style="height: 210px;margin-top: -75px;" alt="schoolling"></button>

        </div>
      </div>
</div>
<div class="row" id="offers">
    <h3 class="main-h3">Super Offers</h3>
    <div class="carousel slide fdi_crousel" id="offers" >
        <div class="carousel-inner">
          <?php $offers=$GFH_Admin->getActiveOffer();
          $i=1;
            if(mysqli_num_rows($offers)>0){
              while($offer=mysqli_fetch_assoc($offers)){
             ?>
            <div class="item <?php echo ($i==1)?'active':''; ?>">
                <div class="col-md-6">
                    <a href="#">
                        <div class="special_offer">
                            <div class="head">
                                <h1 style="background: <?php echo isset($offer['bgcolor'])?$offer['bgcolor']:''; ?>;"><?php echo isset($offer['discount_title'])?$offer['discount_title']:''; ?></h1>
                            </div>
                            <div class="body">
                                <img class="img-responsive" src="images/offer/<?php echo isset($offer['image'])?$offer['image']:''; ?>">
                                <h2><?php echo isset($offer['title'])?$offer['title']:''; ?></h2>
                                <small><?php echo isset($offer['promocode'])?'Promo Code: '.$offer['promocode']:'No Promo Code Needed'; ?></small>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <?php $i++; } } ?>
            <!-- <div class="item">
                <div class="col-md-6">
                    <a href="#">
                        <div class="special_offer">
                            <div class="head">
                                <h1  style="background: #FFC000;">FLAT 40% DISCOUNT</h1>
                            </div>
                            <div class="body">
                                <img class="img-responsive" src="assets/images/Schoolling_Bird.png">
                                <h2>Early Bird First 100 Registered Users</h2>
                                <small>No Promo Code Needed</small>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="col-md-6">
                    <a href="#">
                        <div class="special_offer">
                            <div class="head">
                                <h1 style="background: #00B0F0;">FLAT 40% DISCOUNT</h1>
                            </div>
                            <div class="body">
                                <img class="img-responsive" src="assets/images/school.png">
                                <h2>Apply to 5 +  Schools</h2>
                                <small>No Promo Code Needed</small>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="col-md-6">
                    <a href="#">
                        <div class="special_offer">
                            <div class="head">
                                <h1 style="background: #FFC000;">FLAT 40% DISCOUNT</h1>
                            </div>
                            <div class="body">
                                <img class="img-responsive" src="assets/images/Schoolling_Bird.png">
                                <h2>Apply to 5 +  Schools</h2>
                                <small>No Promo Code Needed</small>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="col-md-6">
                    <a href="#">
                        <div class="special_offer">
                            <div class="head">
                                <h1 style="background: green;">FLAT 40% DISCOUNT</h1>
                            </div>
                            <div class="body">
                                <img class="img-responsive" src="assets/images/school.png">
                                <h2>Apply to 5 +  Schools</h2>
                                <small>No Promo Code Needed</small>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="col-md-6">
                    <a href="#">
                        <div class="special_offer">
                            <div class="head">
                                <h1 style="background: red;">FLAT 40% DISCOUNT</h1>
                            </div>
                            <div class="body">
                                <img class="img-responsive" src="assets/images/Schoolling_Bird.png">
                                <h2>Apply to 5 +  Schools</h2>
                                <small>No Promo Code Needed</small>
                            </div>
                        </div>
                    </a>
                </div>
            </div> -->
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
    </div>
</div>
<script>
    $('#offers').carousel({
        interval: 10000
    })

    $('.fdi_crousel .item').each(function(){
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));


    });
</script>
<?php include 'footer.php'; ?>

<script>
/*$(document).ready(function(){
  $("#region").click(function() {

});

  $('#btnsearch').click(function(){
    var selectedregion=$('#selectedregion').val();
    var search=$('#search').val();
    var region="";
    if(search!="")
    {
       window.location.href="courses-grid.php?q="+search;
    }
    
    if(selectedregion!="")
    {
       region="Delhi";
       region=selectedregion;
       window.location.href="courses-grid.php?region="+region+"&q="+search;
    }

   
    
  });
});*/
</script>

<script type="text/javascript">
                $(document).ready(function(e){
          $('.search-panel .dropdown-menu').find('a').click(function(e) {
          e.preventDefault();
          var param = $(this).attr("href").replace("#","");
          var concept = $(this).text();
          $('.search-panel span#search_concept').text(concept);
          $('.input-group #search_param').val(param);
        });

              $(document).ready(function(e){
          $('.school-panel .dropdown-menu').find('a').click(function(e) {
          e.preventDefault();
          var param = $(this).attr("href").replace("#","");
          var concept = $(this).text();
          $('.school-panel span#school_concept').text(concept);
          $('.input-group #search_param').val(param);
        });
      });
</script>

<!-- <script type="text/javascript">
  $(document).ready(function() {
  $('#quote-carousel').carousel({
    pause: true, interval: 5000,
  });
});
</script> -->


<!-- <script type="text/javascript">
  $(document).ready(function(){

  $("#Slider_Content").fadeIn(500);
  $("#1").fadeIn(500);
  
  $("#controle1").click(function(e){
    $("#1").fadeIn();
    $("#2").fadeOut();
    $("#3").fadeOut();
  });
  
  $("#controle2").click(function(e){
    $("#1").fadeOut();
    $("#2").fadeIn();
    $("#3").fadeOut();
  });

  $("#controle3").click(function(e){
    $("#1").fadeOut();
    $("#2").fadeOut();
    $("#3").fadeIn();
  });

});
</script> -->

