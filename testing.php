<?php ob_start(); 
require_once('admin_panel/includes/function.php');
global $GFH_Admin;
@session_start();
$siteinfo=$GFH_Admin->getSiteinfo();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Schooling</title>

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
<script src="assets\scripts\bootstrap.min.js"></script>
<script>
  $(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>
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
                <span class="input-group-addon input-image" id="basic-addon1"><img src="assets/images/search_logo.png" class="img-responsive" width="35px"></span>
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
                      <a href="dashboard.php" target="_blank"><i class="fa fa-user faprofile" aria-hidden="true"></i> </a>
                      <?php }else{ ?>
                    <a href="#"  data-target="#cs-login" data-toggle="modal" style="color:#fff !important;">Login</a>
                    <?php } ?>
                  </li> 

                  <li class="dropdown head-dpdn new-li">
                        <a href="cart.php"><i class="fa fa-cart-arrow-down faprofile" aria-hidden="true"></i><div class="counter1" ><?php echo @count($_SESSION['CART']);  ?></div></a>
                  </li> 
                
                </ul>
            </div>
                    </div>
                </div>
      </div>
    </div>
  </header>
  <!-- Header End --> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<div class="page-section" style="background:url(assets/images/book.png) no-repeat; background-size: contain; height: 150px; background-color: rgb(242,242,242); margin-top: 84px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="cs-page-title">

  <h1 style="color: rgb(11,44,99) !important;margin-top: 50px; text-transform: capitalize !important;">Form</h1>

</div>
</div>
</div>
</div>
</div>
<style type="text/css">
.stepwizard {
  display: table;
  width: 50%;
  position: relative;
  padding-top: 100px;
  margin: 0 auto;
}
.errorTxt{
/*border: 1px solid red;*/
  min-height: 20px;
}


.box label.error {
    /* margin-bottom: 54px; */
    position: absolute !important;
    top: 45px !important;
    color: #ff0000 !important;
}

.box .nextBtn{
    background: rgb(235,121,35);
    border:0;
    color: #fff;
    padding:10px;
    font-size: 16px;
  font-weight: 300;
    width:330px;
    margin:20px auto;
    display:block;
    cursor:pointer;
    -webkit-transition: all 0.4s;
    transition: all 0.4s;
    border-radius: 2px;
    text-align: center;
}
.box {width: 100%;height: auto;}

.displayform { display:none; }
.super_offers1{display: none;}
</style>

 <div class="super_offers2">
    <a href="" target="_blank" style="text-decoration: none;color: #fff;">Documents Required</a>
</div>         
    <style type="text/css">
        .super_offers2
        {
        height: 38px;
    width: 207px;
    line-height: 30px;
    font-weight: 600;
    color: #fff !important;
    transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -webkit-transform: rotate(-90deg);
    text-align: center;
    border: 2px solid rgb(235,121,35);
    font-size: 17px;
    position: fixed;
    left: -82px;
    top: 45%;
    z-index: 999;
    background: rgb(235,121,35);
    /* padding-top: 10px; */
    /* padding-bottom: 10px; */
    /* color: #fff !important; */
        }
    </style>




<?php
    
    $userdetails=$GFH_Admin->getRegisterUsers(@$_SESSION['SCH_USERID']);
    $userdetail=mysqli_fetch_assoc($userdetails);
  if(isset($_POST['addressform']))
  {
   //echo "<pre>";print_r($_POST);die;
   $adres=$GFH_Admin->ApplicationFormAddress();
   if($adres['status']=='success')
   {
    // header('location:form.php');

    echo "<meta http-equiv='refresh' content='0; url=http://localhost/schooling/form.php'>";
   }
     /*$GFH_Admin->ApplicationFormChild();
   }
    $GFH_Admin->ApplicationFormFather();
    $GFH_Admin->ApplicationFormMother();
    $GFH_Admin->ApplicationFormSibling();*/
    // $GFH_Admin->uploadDocument();
  }
  if(isset($_POST['childform']))
  {
    //echo "<pre>";print_r($_POST);die;
    $childda=$GFH_Admin->ApplicationFormChild();
    if($childda['status']=='success')
     {
      // header('location:form.php');

      echo "<meta http-equiv='refresh' content='0; url=http://localhost/schooling/form.php'>";
     }
  }

  if(isset($_POST['fatherform']))
  {
    // echo "<pre>";print_r($_POST);die;
     $fatherdda=$GFH_Admin->ApplicationFormFather();
    if($fatherdda['status']=='success')
     {
      // header('location:form.php');

      echo "<meta http-equiv='refresh' content='0; url=http://localhost/schooling/form.php'>";
     }
  }

  if(isset($_POST['motherform']))
  {
    
    $GFH_Admin->ApplicationFormMother();
    echo "<meta http-equiv='refresh' content='0; url=http://localhost/schooling/form.php'>";
  }

  if(isset($_POST['siblingform']))
  {
     //echo "<pre>";print_r($_POST);die;
    $GFH_Admin->ApplicationFormSibling();
     echo "<meta http-equiv='refresh' content='0; url=http://localhost/schooling/form.php'>";
  }

  if(isset($_POST['formdocument']))
  {
   
    $res=$GFH_Admin->uploadDocument();
    if($res['status']=='success')
    {
      header('location:dashboard.php');
    }
  }
  

  $addressdetails=$GFH_Admin->getApplicationAddress(); //
  $addressdetail=mysqli_fetch_assoc($addressdetails);

  $childdetails=$GFH_Admin->getApplicationChild();
  $childdetail=mysqli_fetch_assoc($childdetails);

  $fatherdetails=$GFH_Admin->getApplicationFather();
  $fatherdetail=mysqli_fetch_assoc($fatherdetails);

  $motherdetails=$GFH_Admin->getApplicationMother();
  $motherdetail=mysqli_fetch_assoc($motherdetails);

  $siblingdetails=$GFH_Admin->getApplicationSibling();
  $siblingdetail=mysqli_fetch_assoc($siblingdetails);

  $multisiblings= $GFH_Admin->getApplicationSiblingDetail1($siblingdetail['id']);

  // echo "<pre>";print_r($childdetail);die;
  ?>
<div class="row">

  <div class="container">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Step 1</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Step 2</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Step 3</p>
        </div>
    </div>
</div>
<form role="form">
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 1</h3>
                <div class="form-group">
                    <label class="control-label">First Name</label>
                    <input  maxlength="100" type="text" required="required" class="form-control" placeholder="Enter First Name"  />
                </div>
                <div class="form-group">
                    <label class="control-label">Last Name</label>
                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Last Name" />
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 2</h3>
                <div class="form-group">
                    <label class="control-label">Company Name</label>
                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                </div>
                <div class="form-group">
                    <label class="control-label">Company Address</label>
                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address"  />
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 3</h3>
                <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
            </div>
        </div>
    </div>
</form>
</div>
                          </div>

                     

<?php include 'footer.php'; ?>
