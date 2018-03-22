<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Schoolling | Apply To Schools</title>
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

</head>
<style type="text/css">
     .page-sidebar
    {
        margin-bottom: 150px !important;

    }

.fom-p-lab p{padding-left: 20px;
    padding-top: 9px;}


    .input-apply-form-bord input{border: 1px solid #00000038 !important;}

</style>
<body class="wp-smartstudy">
<div class="wrapper"> 
  <!-- Side Menu Start -->
  <div id="overlay"></div>

  <?php //echo isset($_SESSION);die;  ?>
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
            <li class="menu-item-has-children">
              <a href="cart.php"><img src="assets/images/cart.png" width="35px"><div class="counter"><?php echo @count($_SESSION['CART']);  ?></div>cart</a>
            </li>
        </ul>
    </div>
<?php include('newheader.php');
// unset($_SESSION['CART']);
// echo "<pre>";print_r($_SESSION);die;
 ?>
     <div class="page-section">
        <div class="">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-page-title">
         
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- comment end -->
    <!-- Main Start -->
    <div class="main-section">
      <div class="page-section">
        <div class="container-fluid">
          <div class="row">


<!-- rohit3 -->
            <div class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top: 110px;">

              <div class="region-filter">
                <div class="filter-text">
                  <h2 class="h3filter">Filters</h2>
<!-- <div class="filter-img"> 
<img src="assets/images/3.png" class="img-responsive filter-image">
</div> -->
</div>
<div class="cs-listing-filters">
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="margin-top: 58px;">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h6 class="panel-title">
          <a role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="regions">
            Regions
          </a>
        </h6>
      </div>
      <label class="ckb">
        <input type="checkbox"  id="selectallregion" value="b" />
        <i></i>&nbsp&nbsp&nbsp&nbsp All Regions
      </label>
      <div id="collapseOne" class="panel-collapse collapse in fade" role="tabpanel" aria-labelledby="headingOne" style="border:5px solid rgb(11,44,89);margin-top: 2px;">
        <!-- <div class="row"> -->
<!--                      <style type="text/css">


._checkbox label:nth-child {  
background: #000;
}
</style> -->
<div class="_checkbox">
<?php  $allregions=$GFH_Admin->getRegions();
      if(mysqli_num_rows($allregions)>0){
        $i=1;
        while($allregion=mysqli_fetch_assoc($allregions)){
     ?>
  <div class="col-md-6">
    <input name="region[]" id="chk<?php echo $i; ?>" class="schoolregion" type="checkbox" <?php echo (isset($_GET['region'])&&($_GET['region']==$allregion['name']  or $_GET['region']=='All Regions'))?'checked':'';  ?> value="<?php echo isset($allregion['name'])?$allregion['name']:'';  ?>" />
    <label for="chk<?php echo $i; ?>" class="test"><?php echo isset($allregion['name'])?$allregion['name']:'';  ?></label>
  </div>
    <?php $i++;} } ?>
  
</div>
<div class="clearfix"></div>

</div> 
</div>
</div>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h6 class="panel-title">
        <a role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" class="gender">
          Gender
        </a>
      </h6>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in fade" role="tabpanel" aria-labelledby="headingTwo" style="border:5px solid rgb(11,44,89);margin-top: 2px;">

      <div class="row testing">
        <div class="col-md-4 col-xs-4">
          <div class="checkbox">

           
           <input name="gender[]" id="boy" class="schoolgender" type="checkbox" value="Only Boys" />
           <label for="boy"><img src="assets/images/boy.png" class="gender-img"><h5 class="g-h4"> Only Boys</h5></label>
         </div>
        </div>
        <div class="col-md-4 col-xs-4">
          <div class="checkbox">
          
           <input name="gender[]" id="girl" class="schoolgender" type="checkbox" value="Only Girls" />
           <label for="girl"><img src="assets/images/girl.png" class="gender-img"><h5 class="g-h4"> Only Girls</h5></label>
          </div>
        </div>
     <div class="col-md-4 col-xs-4">
      <div class="checkbox">
       
       <input name="gender[]" id="coed" class="schoolgender" type="checkbox" value="Co-Ed" />
       <label for="coed"><img src="assets/images/coed.png" class="gender-img"><h5 class="g-h4">Co-Ed</h5></label>
     </div>
   </div>
 </div>
</div>



</div>
</div>
</div>
</div>
</div>

<!-- /rohit3 -->
<!-- </div> -->
<!-- rohit9 -->
<div class="page-content col-lg-9 col-md-9 col-sm-12 col-xs-12" style="margin-top: 110px;">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="z-index: 2">
      <div class="cs-sorting-list">
        <div class="cs-left-side">
        <?php 
        //echo "<pre>";print_r($_SESSION);die;
         $sum="";
        if(isset($_SESSION['CART'])&&!empty($_SESSION['CART']))
        {  ?>
          <div class="cs-caption-select" style="border-radius: 10px;">
            <span class="cs-caption">Card Subtotal</span>

            <label for="checkboxone">(<?php echo @count($_SESSION['CART']);  ?> School) : 
              <i class="fa fa-inr" aria-hidden="true"></i>
              <?php 
               
                
                  foreach ($_SESSION['CART'] as $key => $value) {
                    //echo "<pre>";print_r($value);die;
                    @$sum+=$value['price'];
                  }

                  echo @$sum;
                
                ?></label>

            <span class="cs-caption"><a href="cart.php" target="_blank">Checkout</a></span>
          </div>
          <?php } ?>
        </div>
        <ul class="cs-list-view" style="margin-right:-11px;">
          <li style="color:rgb(127,127,127) !important;font-weight: bold;padding-top: 9px;font-size: 22px;

        }">SORT BY </li>
       <!-- <li style="margin-left: 89px;"><a href="#" class="bar1">Distance</a></li>-->
        <li ><a href="#" data-id="schoolname" id="schoolname" class="bar1">Name</a></li>
        <!-- <li><a href="#">Popularity</a></li> -->

      </ul>
    </div>
  </div>
<div class="main_container">
    <div class="main_container">
      <div class="row">
      <div class="col-lg-6 col-md-6">
       <!--  <label for="start">Start: </label> -->
      
       <div class="row">
<div class="col-lg-2 col-md-2 fom-p-lab text-center ">
 <p>Start : </p>
     </div>
     <div class="col-lg-10 col-md-10 input-apply-form-bord">
       <input type="text" name="start" id="start"  value="Delhi, India" />
     </div>
 </div>
</div>

      <div class="col-lg-6 col-md-6">
        <div class="row">
<div class="col-lg-2 col-md-2 fom-p-lab">
 <p>End : </p>
     </div>
      <div class="col-lg-10 col-md-10 input-apply-form-bord">
        <input type="text" name="end" id="end" onchange="calcRoute()" />
      </div>
</div>
      </div>

        <!-- <input type="submit" value="Calculate Route" onchange="calcRoute()" /> -->       
      

      </div>
    </div>
     <div id="places">
 </div>
    <div id="map_canvas"></div>
</div>

<br><br><br><br>
<div class="dis_cal">
<label for="distance">Distance (km): </label>
<input type="text" name="distance" id="distance" readonly="true" />
</div>

<div class="dis_cal">
<label for="distance">Distance (km): </label>
<input type="text" name="distance" id="distance" readonly="true" />
</div>
<button  id="hide" onclick="initialize()">Hide</button>

  <div class="admission divchangedata"  style="margin-top: 120px;z-index: 1;">
    
    <div class="">


  <?php  
    $q=isset($_GET['q'])?$_GET['q']:'';
    $region=isset($_GET['region'])?$_GET['region']:'';
    // echo $region;die;
      $schools=$GFH_Admin->searchSchool($region,$q);

      if(mysqli_num_rows($schools)>0){
        while($school=mysqli_fetch_assoc($schools)){
  ?>

  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-tag="paid">

    <div class="cs-courses courses-grid">
      <div class="col-md-12">
      
          <div class="col-md-6 map">
            <a href="#"   class="js-show-help" data-id="<?php echo isset($school['id'])?$school['id']:'';  ?>" >
             <!-- <i class="fa fa-map-marker" aria-hidden="true"></i> 
              <img src="assets/images/location.png" class="location-img " > -->
              <!-- <h6 class="distanceh6">Distance</h6> --> 
            </a>
            <div class="located-content js-help-content<?php echo isset($school['id'])?$school['id']:'';  ?>" style="display:none;">
              <p id="">8Km From Laxmi Nagar, Delhi</p>
            </div>

          </div>

            <div class="col-md-6">
            <?php
            if(isset($_SESSION['SCH_USERID'])){  ?>
            <button  onclick="initialize()">Hide</button>

        
            <a href="#"><img src="assets/images/location.png" class="share"></a>
            
            <?php }else{ ?>
                        <button  onclick="initialize()">Hide</button>

            <a href="#" ><img src="assets/images/location.png" class="share"></a>
            <?php } ?>
  
            <!-- <h6 style="margin-left: -23px;margin-top: 3px;">Share</h6> -->
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
    <span class="cs-courses-price" style="font-family: nexa_bold !important;font-size: 14px;"><em> Service Fee : <i class="fa fa-inr" aria-hidden="true"></i> </em><?php echo isset($school['service_fee'])?$school['service_fee']:'';  ?></span><br>
  
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
<?php } } ?>
</div>
<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="cs-pagination" style="text-align: center;">
    <ul class="pagination">
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li><a href="#">6</a></li>
      <li><a href="#">7</a></li>
      <li><a href="#">8</a></li>
      <li><a href="#"><i class=" icon-dots-three-horizontal"></i></a></li>
      <li><a href="#">10</a></li>
      <li><a href="#">36</a></li>
    </ul>
  </div>
</div> -->

</div>

</div>

</div>
</div>
<!-- /rohit9 -->
</div>
</div> 
</div>
</div>
<div class="container">

  <!-- Trigger the modal with a button -->


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Criteria/Parameters(General Category)</h4>
        </div>
        <div class="modal-body">

          <table >
            <thead>
              <th>SL NO</th>
              <th>DETAILS</th>
              <th>POINTS</th>
            </thead>
            <tbody>
              <tr>
                <td style="border-bottom: 0;">1</td>
                <td>Distance 0-5 km</td>
                <td>50</td>
              </tr>
              <tr>
                <td>1</td>
                <td>Distance 05-07 km</td>
                <td>40</td>
              </tr>
              <tr>
                <td>1</td>
                <td>Distance 07 km and above</td>
                <td>20</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Sikh Community</td>
                <td>20</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Sibling</td>
                <td>15</td>
              </tr>
              <tr>
                <td>4</td>
                <td>School Alumni</td>
                <td>15</td>
              </tr>

             <!--  <tr>
                <td>3</td>
                <td>Distance 0-5 km</td>
                <td>50</td>
              </tr> -->
            </tbody>
          </table>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

</div>
<!-- Footer End --> 
<?php include 'footer.php'; ?>

<script type="text/javascript">
  $('.js-help-content').hide();

$('.js-show-help').click(function(e){
    
    // alert(schoolid);
    e.stopPropagation();
    $('.js-help-content').fadeToggle(200);
   // alert("hello");
   if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showLocation);
    }else{
        $('#location').html('Geolocation is not supported by this browser.');
    }
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

<script>
$(document).ready(function(){
  $('.js-show-help').click(function(){ 

    
    });
});

function showLocation(position){
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    var schoolid=$(this).attr('data-id');
    $.ajax({
        type:'POST',
        url:'ajax_school_distance.php',
        data:'latitude='+latitude+'&longitude='+longitude+'&schoolid='+schoolid,
        success:function(msg){
            if(msg){
               $("#location").html(msg);
            }else{
                $("#location").html('Not Available');
            }
        }
    });
}
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
      });
</script>
<script>
  function add_to_cart(prodid,qty,price)
  {
     //alert("Successfully added in cart.");
      $.ajax({
          type:'post',
          url:'ajax_add_to_cart.php',
          data:{'prodid':prodid,'qty':qty,'price':price},
          success:function(response){
            //alert(response);
            if(response=='success')
            { 
              //alert("Successfully added in cart.");
              window.location.href="";
            }

            if(response=='already')
            {
              alert("Already in cart.");
                  // window.location.href="";
            }

          }
      });
  }
  </script>
  <script>
    $(document).ready(function(){
      $('.schoolregion').click(function(){
        search();
      });

      $("#selectallregion").change(function(){        
          if($(this).is(':checked')==true){
              $('.schoolregion').prop("checked", true);
              search('','all');
          }else{
              $('.schoolregion').prop("checked", false);
              search();
          }

      });

      $('.schoolgender').click(function(){
        search();
      });

      $('#schoolname').click(function(){
        var schoolname="school";
         // alert(schoolname);
        search(schoolname);
      });

    });
  </script>
  <script>
    function search(name="",alldd="")
    {

      var alregion = [];
      var schoolgender = [];
       $("input[name='region[]']:checked").each(function (){
            alregion.push($(this).val());
       });

       $("input[name='gender[]']:checked").each(function (){
            schoolgender.push($(this).val());
       });
       // alert(schoolgender);
      $.ajax({
        type:'post',
        url:'ajax_school.php',
        beforeSend: function(){
          $(".ajaxloader_box").addClass("showloader");
        },
        data:{"alregion":alregion,"schoolgender":schoolgender,"school":name,"alldd":alldd},
        success:function(resp){
         // alert(resp);
          $('.divchangedata').html(resp);
          $(".ajaxloader_box").removeClass("showloader");
        }
      });
    }
  </script>
  <div class="ajaxloader_box "></div>
</body>
<?php include 'pop.php'; ?>
</html>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

</script>
