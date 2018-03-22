<?php 
error_reporting(0);
ob_start(); 
session_start();
// echo "<pre>";print_r($_SESSION);die;
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Schoolling | Dashboard</title>
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
<style>
.cs-page-title1{background:rgb(205,101,101); color:#fff;}
</style>
<body class="wp-smartstudy">
<div class="wrapper"> 
   
    <div id="overlay"></div>
    
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

        <div class="container-fluid" >
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-page-title cs-page-title1">
                         <marquee>Kindly be ready with the admission documents before filling the form. Click on the link below 'Documents Required' for the doc list</marquee> 
                    </div>
                    <div class=" ">
                    <!--    <img src="assets/images/setting.png"> -->
                   <a href="settings.php" style="color: #000;"> <i class="fa fa-cog " aria-hidden="true"></i>
                    <h4 style="position: absolute;top: 60px;right: 44px;" target="_blank">Settings</h4></a>
                    </div>
                </div>
            </div>
        </div>
</div>

<div id="profile-section" class="text-center">
    <div class="row">
         <?php  if(isset($userdetail['profile'])){  ?>
        <img src="images/profile/<?php  echo isset($userdetail['profile'])?$userdetail['profile']:''; ?>" class="profile-image">
        <?php }else{ ?>
        <img src="images/profile/profile.png" class="profile-image">
        <?php } ?>
        <h4><?php echo isset($userdetail['first_name'])?$userdetail['first_name']:'';  ?> <?php echo isset($userdetail['last_name'])?$userdetail['last_name']:'';  ?></h4>
        <a href="edit-profile.php" >Edit Profile     <i class="fa fa-pencil"></i></a>
    </div>
</div>

 <div class="container text-center wiggle">
   <?php  $pages=$GFH_Admin->getPages('8');
            $pag=mysqli_fetch_assoc($pages);
     ?>
    <a href="images/page/<?php echo isset($pag['page_image'])?$pag['page_image']:'';  ?>" style="color:#fff;" class="btn btn_doc wiggle" target="_blank"><?php echo isset($pag['page_name'])?$pag['page_name']:'';  ?></a>
 </div>
<!--<div id="round">
<div class="container">
    <div class="col-md-8" style="margin-left: 16%;">
         <hr class="dhr">
         <i class="fa fa-chevron-right darrow" aria-hidden="true"></i>
        <div class="col-md-6 col-sm-6">
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
            $aod=@mysqli_num_rows($aod); //getApplicationSibling
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
            <div class="chart" id="graph" data-percent="  <?php  echo isset($totalpercentage)?array_sum($totalpercentage):''; ?>    "></div>
                <?php if(mysqli_num_rows($orders)>0){   ?>
                <div class="text-center progress_font btn_doc"  target="_blank"><a href="javascript:void(0);" onclick="payment_status();" style="color:#fff;" >Fill Common Admission Form</a></div>
                <?php }else{ ?>
                <div class="text-center progress_font btn_doc" style="background-color: grey;" target="_blank"><a  href="javascript:void(0);" onclick="payment_status();" style="color:#fff;" >Fill Common Admission Form</a></div>
                <?php } ?>

        </div>


        <div class="col-md-6 col-sm-6">
            <?php

            $trackapplications=$GFH_Admin->checkFormfilled();
            $trackapplication=mysqli_fetch_assoc($trackapplications);
            // /echo "<pre>";print_r($trackapplication);die;
            $trackdata=array();
            if($trackapplication['common_admission_form']==3)
            {
                array_push($trackdata,'20');
            }

            if($trackapplication['submission_to_school']==2)
            {
                array_push($trackdata,'20');
            }

            if($trackapplication['parent_signature']==2)
            {
                array_push($trackdata,'20');
            }

            if($trackapplication['receipt_from_school']==2 or $trackapplication['receipt_from_school']==1)
            {
                array_push($trackdata,'20');
            }

            if($trackapplication['parent_visit_for_admission']==2)
            {
                array_push($trackdata,'20');
            }
           // echo "<pre>";print_r($trackdata);;die;
            ?>
            <div class="chart" id="graph1" data-percent=" <?php  //echo isset($trackdata)?array_sum($trackdata):''; ?>"></div>


                      <?php if(mysqli_num_rows($orders)>0){   ?>
                <div class="text-center progress_font btn_doc"  target="_blank"><a href="track-application.php"  style="color:#fff;" >Track Application Status</a></div>
                <?php }else{ ?>
                <div class="text-center progress_font btn_doc" style="background-color: grey;" target="_blank"><a  href="javascript:void(0);" onclick="payment_status1();" style="color:#fff;" >Track Application Status</a></div>
                <?php } ?>
        </div>
    </div>
</div>
</div>-->
<br/><br/><br/>

<div class="container">
    <div class="row">
        
        <div class="col-md-6 col-xs-12">
            <div class="dcaf">
                <div class="deskheader">
                    <h3 style="text-align:center;margin-top:0px;color:rgb(11,44,89) !important;padding-top:50px;text-transform:uppercase !important;" class="mediah3">Common Admission Forms</h3>
                </div>
                 <?php $orders=$GFH_Admin->getOrder();
                 if(mysqli_num_rows($orders)>0){   ?>
                <div class="points" style="margin-top:40px;">
                <a href="https://goo.gl/xvTcbN" class="pointhover" target="blank">    <h3 class="point1" style="background: rgb(235,121,35);">Fill Form For <span style="color:rgb(11,44,89);">PLAY SCHOOLS</span></h3></a>
                 <a href="https://goo.gl/H9xKRb" class="pointhover" target="blank">   <h3 class="point1" style="background: rgb(235,121,35);">Fill Form For <span style="color:rgb(11,44,89);">SCHOOLS</span></h3> </a>
                </div>
                <?php } else{  ?>
             <div class="points" style="margin-top:40px;">
                <a href="#" class="pointhover" target="blank">    <h3 class="point1" style="background: gray;">Fill Form For <span style="color:rgb(11,44,89);">PLAY SCHOOLS</span></h3></a>
                 <a href=#"" class="pointhover" target="blank">   <h3 class="point1" style="background: gray;">Fill Form For <span style="color:rgb(11,44,89);">SCHOOLS</span></h3> </a>
                </div>
                <?php } ?>
            </div>
            <div class="dcafimg">
                <img src="assets/images/desk.png" class="deskimg">
            </div>
        </div>

        <div class="col-md-6 col-xs-12">
            <div class="dcaf">
                <div class="deskheader1">
                    <h3 style="text-align:center;margin-top:0px;color:rgb(11,44,89) !important;padding-top:50px;text-transform:uppercase !important;">application status</h3>
                </div>
                <?php  if(mysqli_num_rows($orders)>0){   ?>
                <div class="points" style="margin-top:75px;">
                <a href="track-application.php" class="pointhover">    <h3 class="point1" style="background: rgb(235,121,35);">Track <span style="color:rgb(11,44,89);">HERE</span></h3></a>
                </div>
                <?php } else
                { ?>
                <div class="points" style="margin-top:75px;">
                <a href="#" class="pointhover">    <h3 class="point1" style="background: gray;">Track <span style="color:rgb(11,44,89);">HERE</span></h3></a>
                </div>
                <?php } ?>
            </div>
            <div class="dcafimg">
                <img src="assets/images/desk1.png" class="deskimg">
            </div>
        </div>
        
    </div>
</div>



    <script>
        var el = document.getElementById('graph'); // get canvas

        var options = {
            percent:  el.getAttribute('data-percent') || 25,
            size: el.getAttribute('data-size') || 150,
            lineWidth: el.getAttribute('data-line') || 15,
            rotate: el.getAttribute('data-rotate') || 0
        }

        var canvas = document.createElement('canvas');
        var span = document.createElement('span');
        span.textContent = options.percent + '%';

        if (typeof(G_vmlCanvasManager) !== 'undefined') {
            G_vmlCanvasManager.initElement(canvas);
        }

        var ctx = canvas.getContext('2d');
        canvas.width = canvas.height = options.size;

        el.appendChild(span);
        el.appendChild(canvas);

        ctx.translate(options.size / 2, options.size / 2); // change center
        ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI); // rotate -90 deg

        //imd = ctx.getImageData(0, 0, 240, 240);
        var radius = (options.size - options.lineWidth) / 2;

        var drawCircle = function(color, lineWidth, percent) {
            percent = Math.min(Math.max(0, percent || 1), 1);
            ctx.beginPath();
            ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, false);
            ctx.strokeStyle = color;
            ctx.lineCap = 'round'; // butt, round or square
            ctx.lineWidth = lineWidth
            ctx.stroke();
        };

        drawCircle('#fff', options.lineWidth, 100 / 100);
        drawCircle('#EB7923', options.lineWidth, options.percent / 100);
    </script>


    <script>
        var el = document.getElementById('graph1'); // get canvas

        var options = {
            percent:  el.getAttribute('data-percent') || 25,
            size: el.getAttribute('data-size') || 150,
            lineWidth: el.getAttribute('data-line') || 15,
            rotate: el.getAttribute('data-rotate') || 0
        }

        var canvas = document.createElement('canvas');
        var span = document.createElement('span');
        span.textContent = options.percent + '%';

        if (typeof(G_vmlCanvasManager) !== 'undefined') {
            G_vmlCanvasManager.initElement(canvas);
        }

        var ctx = canvas.getContext('2d');
        canvas.width = canvas.height = options.size;

        el.appendChild(span);
        el.appendChild(canvas);

        ctx.translate(options.size / 2, options.size / 2); // change center
        ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI); // rotate -90 deg

        //imd = ctx.getImageData(0, 0, 240, 240);
        var radius = (options.size - options.lineWidth) / 2;

        var drawCircle = function(color, lineWidth, percent) {
            percent = Math.min(Math.max(0, percent || 1), 1);
            ctx.beginPath();
            ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, false);
            ctx.strokeStyle = color;
            ctx.lineCap = 'round'; // butt, round or square
            ctx.lineWidth = lineWidth
            ctx.stroke();
        };

        drawCircle('#fff', options.lineWidth, 100 / 100);
        drawCircle('#EB7923', options.lineWidth, options.percent / 100);
    </script>
<?php include 'footer.php'; ?>
<script>
function payment_status()
{
    // alert("skjdkjs");
    $.ajax({
        type:'post',
        url:'ajax_check_paymentstatus.php',
        data:{'check':'check'},
        dataType:"json",
        success:function(dd){
            // alert(dd.tt);
            if(dd.status=='success')
            {
                window.location.href="common-admission-form.php";
            }else if(dd.status=='error'){
                alert("You have exceeded the stipulated time for filling the common admission form. For concerns, please contact M:+91 9811831531 or E:contact@schoolling.com");
           
            }else if(dd.status=='read'){
                window.location.href="common-admission-form.php?id=read";
            }else{
                 alert(dd.msg);
                  var win = window.open("apply-to-schools.php", '_blank');
                    win.focus();
          
            }
            
        }
    });
}

</script>
<script>
    function payment_status1()
    {
        alert("Apply to atleast one school");
          var win = window.open("apply-to-schools.php", '_blank');
            win.focus();
    }
</script>