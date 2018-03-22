<?php include 'newheader.php'; ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

  <script type= "text/javascript" src = "assets/scripts/countries.js"></script>
  <div class="stepwizard" style="width: 80% !important; font-style: normal;">
    <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
        <a href="#step1" type="button"  class="btn btn-primary btn-circle" >1</a>
        <p style="text-align: center;" > Address</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step2" type="button" class="btn btn-default <?php echo (isset($userdetail['application_phase'])&&$userdetail['application_phase']=='1')?'btn-primary':'';   ?> btn-circle" disabled="disabled">2</a>
        <p>Child </p>
      </div>
      <div class="stepwizard-step">
        <a href="#step3" type="button" class="btn btn-default <?php echo (isset($userdetail['application_phase'])&&$userdetail['application_phase']=='2')?'btn-primary':'';   ?> btn-circle"  disabled="disabled">3</a>
        <p>Father/Guardian</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step4" type="button" class="btn btn-default <?php echo (isset($userdetail['application_phase'])&&$userdetail['application_phase']=='3')?'btn-primary':'';   ?> btn-circle" disabled="disabled">4</a>
        <p>Mother/Guardian </p>
      </div>
      <div class="stepwizard-step">
        <a href="#step5" type="button" class="btn btn-default <?php echo (isset($userdetail['application_phase'])&&$userdetail['application_phase']=='4')?'btn-primary':'';   ?> btn-circle" disabled="disabled">5</a>
        <p>General/Sibling </p>
      </div>
      <div class="stepwizard-step">
        <a href="#step6" type="button" class="btn btn-default <?php echo (isset($userdetail['application_phase'])&&$userdetail['application_phase']=='5')?'btn-primary':'';   ?> btn-circle" disabled="disabled">6</a>
        <p>Upload Document </p>
      </div>

    </div>
  </div>
  <?php 

  // echo "<pre>";print_r($_SESSION);die;  ?>
    <form role="form" id="frmaddress" method="post" enctype="multipart/form-data">
    <input type="hidden" name="addressform" value="addressform">
    <input type="hidden" name="addressid" value="<?php echo isset($addressdetail['id'])?$addressdetail['id']:''; ?>" >
      <div class="row setup-content" id="step1">
        <div class="col-md-8 col-md-offset-2">
          <div class="col-md-12">
            <h3 style="text-align: center;"> Address Details</h3>
            <div class="box">
              <div  style="padding-top: 20px;"></div>
              <p style="font-style: normal"> Residence Address (Present)</p><br>
              <button type="button" class="btn btn-primary wiggle">Locate Yourself</button>
              <div class="group">      
                <input class="inputMaterial" type="text" name="address" value="<?php echo isset($addressdetail['address'])?$addressdetail['address']:''; ?>" required="required">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Address</label>
              </div>

              <div class="row">
                <div style='text-align:center;'>
                  <div class="col-md-3">
                    <div class="group">      
                      <input class="inputMaterial" type="text" value="<?php echo isset($addressdetail['locality'])?$addressdetail['locality']:''; ?>" name="locality" >
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Locality</label>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="group">      
                      <select id="state" name="state" class="inputMaterial" type="text" >
                        <option value=""></option>
                        <option value="Andaman and Nicobar Islands" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Andaman and Nicobar Islands")?'selected="selected"':''; ?>>Andaman and Nicobar Islands</option>
                        <option value="Andhra Pradesh" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Andhra Pradesh")?'selected="selected"':''; ?>>Andhra Pradesh</option>
                        <option value="Arunachal Pradesh" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Arunachal Pradesh")?'selected="selected"':''; ?>>Arunachal Pradesh</option>
                        <option value="Assam" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Assam")?'selected="selected"':''; ?>>Assam</option>
                        <option value="Bihar" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Bihar")?'selected="selected"':''; ?>>Bihar</option>
                        <option value="Chandigarh" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Chandigarh")?'selected="selected"':''; ?>>Chandigarh</option>
                        <option value="Chhattisgarh" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Chhattisgarh")?'selected="selected"':''; ?>>Chhattisgarh</option>
                        <option value="Dadra and Nagar Haveli" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Dadra and Nagar Haveli")?'selected="selected"':''; ?>>Dadra and Nagar Haveli</option>
                        <option value="Daman and Diu" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Daman and Diu")?'selected="selected"':''; ?>>Daman and Diu</option>
                        <option value="Delhi" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Delhi")?'selected="selected"':''; ?>>Delhi</option>
                        <option value="Goa" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Goa")?'selected="selected"':''; ?>>Goa</option>
                        <option value="Gujarat" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Gujarat")?'selected="selected"':''; ?>>Gujarat</option>
                        <option value="Haryana" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Haryana")?'selected="selected"':''; ?>>Haryana</option>
                        <option value="Himachal Pradesh" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Himachal Pradesh")?'selected="selected"':''; ?>>Himachal Pradesh</option>
                        <option value="Jammu and Kashmir" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Jammu and Kashmir")?'selected="selected"':''; ?>>Jammu and Kashmir</option>
                        <option value="Jharkhand" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Jharkhand")?'selected="selected"':''; ?>>Jharkhand</option>
                        <option value="Karnataka" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Karnataka")?'selected="selected"':''; ?>>Karnataka</option>
                        <option value="Kerala" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Kerala")?'selected="selected"':''; ?>>Kerala</option>
                        <option value="Lakshadweep" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Lakshadweep")?'selected="selected"':''; ?>>Lakshadweep</option>
                        <option value="Madhya Pradesh" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Madhya Pradeshs")?'selected="selected"':''; ?>>Madhya Pradesh</option>
                        <option value="Maharashtra" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Maharashtra")?'selected="selected"':''; ?>>Maharashtra</option>
                        <option value="Manipur" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Manipur")?'selected="selected"':''; ?>>Manipur</option>
                        <option value="Meghalaya" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Meghalaya")?'selected="selected"':''; ?>>Meghalaya</option>
                        <option value="Mizoram" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Mizoram")?'selected="selected"':''; ?>>Mizoram</option>
                        <option value="Nagaland" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Nagaland")?'selected="selected"':''; ?>>Nagaland</option>
                        <option value="Orissa" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Orissa")?'selected="selected"':''; ?>>Orissa</option>
                        <option value="Pondicherry" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Pondicherry")?'selected="selected"':''; ?>>Pondicherry</option>
                        <option value="Punjab" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Punjab")?'selected="selected"':''; ?>>Punjab</option>
                        <option value="Rajasthan" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Rajasthan")?'selected="selected"':''; ?>>Rajasthan</option>
                        <option value="Sikkim" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Sikkim")?'selected="selected"':''; ?>>Sikkim</option>
                        <option value="Tamil Nadu" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Tamil Nadu")?'selected="selected"':''; ?>>Tamil Nadu</option>
                        <option value="Tripura" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Tripura")?'selected="selected"':''; ?>>Tripura</option>
                        <option value="Uttar Pradesh" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Uttar Pradesh")?'selected="selected"':''; ?>>Uttar Pradesh</option>
                        <option value="Uttaranchal" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="Uttaranchal")?'selected="selected"':''; ?>>Uttaranchal</option>
                        <option value="West Bengal" <?php echo (isset($addressdetail['state'])&&$addressdetail['state']=="West Bengal")?'selected="selected"':''; ?>>West Bengal</option>
                      </select>
                      <label>State</label>
                    </div>
                  </div>


                  <div class="col-md-3">
                    <div class="group">      
                      <input class="inputMaterial" type="text" name="city" value="<?php echo isset($addressdetail['city'])?$addressdetail['city']:''; ?>" >
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>City</label>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="group">      
                      <input class="inputMaterial" type="Number" name="pincode" value="<?php echo isset($addressdetail['pincode'])?$addressdetail['pincode']:''; ?>" >
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Pin Code</label>
                    </div>
                  </div>
                </div>
              </div><br><br>

              <div class="row">
                <div class="col-md-6">
                  <p style="font-style: normal;margin-top: 20px;"><strong>Since when have you been residing here?</strong></p>
                </div>      


                <div class="col-md-3">
                  <div class="group">      
                    <input class="inputMaterial" type="Number" name="years"  value="<?php echo isset($addressdetail['years'])?$addressdetail['years']:''; ?>">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Years</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="group">      
                    <select class="inputMaterial" type="text" name="month" >
                      <option></option>
                      <option value="0" <?php echo (isset($addressdetail['month'])&&$addressdetail['month']=="0")?'selected="selected"':''; ?>>0</option>
                      <option value="1"<?php echo (isset($addressdetail['month'])&&$addressdetail['month']=="1")?'selected="selected"':''; ?> >1</option>
                      <option value="2" <?php echo (isset($addressdetail['month'])&&$addressdetail['month']=="2")?'selected="selected"':''; ?>>2</option>
                      <option value="3" <?php echo (isset($addressdetail['month'])&&$addressdetail['month']=="3")?'selected="selected"':''; ?>>3</option>
                      <option value="4" <?php echo (isset($addressdetail['month'])&&$addressdetail['month']=="4")?'selected="selected"':''; ?>>4</option>
                      <option value="5" <?php echo (isset($addressdetail['month'])&&$addressdetail['month']=="5")?'selected="selected"':''; ?>>6</option>
                      <option value="6" <?php echo (isset($addressdetail['month'])&&$addressdetail['month']=="6")?'selected="selected"':''; ?>>6</option>
                      <option value="7" <?php echo (isset($addressdetail['month'])&&$addressdetail['month']=="7")?'selected="selected"':''; ?>>7</option>
                      <option value="8" <?php echo (isset($addressdetail['month'])&&$addressdetail['month']=="8")?'selected="selected"':''; ?>>8</option>
                      <option value="9" <?php echo (isset($addressdetail['month'])&&$addressdetail['month']=="9")?'selected="selected"':''; ?>>9</option>
                      <option value="10" <?php echo (isset($addressdetail['month'])&&$addressdetail['month']=="10")?'selected="selected"':''; ?>>10</option>
                      <option value="11" <?php echo (isset($addressdetail['month'])&&$addressdetail['month']=="11")?'selected="selected"':''; ?>>11</option>
                      <option value="12" <?php echo (isset($addressdetail['month'])&&$addressdetail['month']=="12")?'selected="selected"':''; ?>>12</option>
                    </select>
                    <label>Months</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <p style="font-style: normal;margin-top: 20px;"><strong>House Type</strong></p>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <!-- <form> -->
                      <div class="newform" style="margin-left: 100px; margin-top: 20px;">
                        <input type="radio" id="contactChoice1"  name="housetype" value="self owned" style="margin-left: -22px;" <?php echo (isset($addressdetail['housetype'])&&$addressdetail['housetype']=="self owned")?'checked="checked"':''; ?>>Self Owned
                        <label for="contactChoice1" style="padding-left: 30px;">
                        </label>

                        <input type="radio" id="contactChoice2" name="housetype" value="rented" style="margin-left: -22px;" <?php echo (isset($addressdetail['housetype'])&&$addressdetail['housetype']=="rented")?'checked="checked"':''; ?>>Rented
                        <label for="contactChoice2" style="padding-left: 30px;">
                        </label>
                      </div>
                      <!-- </form> -->
                    </div>
                  </div>
                </div>

                <br><br>
                <p style="font-style: normal;margin-top: 30px !important;"> Permanent Address</p>

                <label class="checkbox-inline" style="    float: left;
                width: 100%;
                position: initial;
                margin-left: 24px;">
                <input type="checkbox" value="">Same as Residence Address
              </label><br>


              <div class="group">      
                <input class="inputMaterial" type="text" name="paddress" value="<?php echo isset($addressdetail['paddress'])?$addressdetail['paddress']:''; ?>" >
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Address</label>
              </div>




              <div class="row">
                <div style='text-align:center;'>
                  <div class="col-md-3">
                    <div class="group">      
                      <input class="inputMaterial" type="text" name="plocality" value="<?php echo isset($addressdetail['plocality'])?$addressdetail['plocality']:''; ?>" >
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Locality</label>
                    </div>
                  </div> 
                  <div class="col-md-3" style="">
                    <div class="group">      
                      <select id="state" name="pstate" class="inputMaterial" type="text" >
                      <option value="Andaman and Nicobar Islands" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Andaman and Nicobar Islands")?'selected="selected"':''; ?>>Andaman and Nicobar Islands</option>
                        <option value="Andhra Pradesh" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Andhra Pradesh")?'selected="selected"':''; ?>>Andhra Pradesh</option>
                        <option value="Arunachal Pradesh" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Arunachal Pradesh")?'selected="selected"':''; ?>>Arunachal Pradesh</option>
                        <option value="Assam" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Assam")?'selected="selected"':''; ?>>Assam</option>
                        <option value="Bihar" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Bihar")?'selected="selected"':''; ?>>Bihar</option>
                        <option value="Chandigarh" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Chandigarh")?'selected="selected"':''; ?>>Chandigarh</option>
                        <option value="Chhattisgarh" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Chhattisgarh")?'selected="selected"':''; ?>>Chhattisgarh</option>
                        <option value="Dadra and Nagar Haveli" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Dadra and Nagar Haveli")?'selected="selected"':''; ?>>Dadra and Nagar Haveli</option>
                        <option value="Daman and Diu" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Daman and Diu")?'selected="selected"':''; ?>>Daman and Diu</option>
                        <option value="Delhi" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Delhi")?'selected="selected"':''; ?>>Delhi</option>
                        <option value="Goa" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Goa")?'selected="selected"':''; ?>>Goa</option>
                        <option value="Gujarat" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Gujarat")?'selected="selected"':''; ?>>Gujarat</option>
                        <option value="Haryana" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Haryana")?'selected="selected"':''; ?>>Haryana</option>
                        <option value="Himachal Pradesh" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Himachal Pradesh")?'selected="selected"':''; ?>>Himachal Pradesh</option>
                        <option value="Jammu and Kashmir" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Jammu and Kashmir")?'selected="selected"':''; ?>>Jammu and Kashmir</option>
                        <option value="Jharkhand" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Jharkhand")?'selected="selected"':''; ?>>Jharkhand</option>
                        <option value="Karnataka" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Karnataka")?'selected="selected"':''; ?>>Karnataka</option>
                        <option value="Kerala" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Kerala")?'selected="selected"':''; ?>>Kerala</option>
                        <option value="Lakshadweep" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Lakshadweep")?'selected="selected"':''; ?>>Lakshadweep</option>
                        <option value="Madhya Pradesh" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Madhya Pradeshs")?'selected="selected"':''; ?>>Madhya Pradesh</option>
                        <option value="Maharashtra" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Maharashtra")?'selected="selected"':''; ?>>Maharashtra</option>
                        <option value="Manipur" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Manipur")?'selected="selected"':''; ?>>Manipur</option>
                        <option value="Meghalaya" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Meghalaya")?'selected="selected"':''; ?>>Meghalaya</option>
                        <option value="Mizoram" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Mizoram")?'selected="selected"':''; ?>>Mizoram</option>
                        <option value="Nagaland" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Nagaland")?'selected="selected"':''; ?>>Nagaland</option>
                        <option value="Orissa" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Orissa")?'selected="selected"':''; ?>>Orissa</option>
                        <option value="Pondicherry" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Pondicherry")?'selected="selected"':''; ?>>Pondicherry</option>
                        <option value="Punjab" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Punjab")?'selected="selected"':''; ?>>Punjab</option>
                        <option value="Rajasthan" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Rajasthan")?'selected="selected"':''; ?>>Rajasthan</option>
                        <option value="Sikkim" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Sikkim")?'selected="selected"':''; ?>>Sikkim</option>
                        <option value="Tamil Nadu" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Tamil Nadu")?'selected="selected"':''; ?>>Tamil Nadu</option>
                        <option value="Tripura" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Tripura")?'selected="selected"':''; ?>>Tripura</option>
                        <option value="Uttar Pradesh" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Uttar Pradesh")?'selected="selected"':''; ?>>Uttar Pradesh</option>
                        <option value="Uttaranchal" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="Uttaranchal")?'selected="selected"':''; ?>>Uttaranchal</option>
                        <option value="West Bengal" <?php echo (isset($addressdetail['pstate'])&&$addressdetail['pstate']=="West Bengal")?'selected="selected"':''; ?>>West Bengal</option>
                      </select>
                      <label>Sstate</label>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="group">      
                      <input class="inputMaterial" type="text" name="pcity"  value="<?php echo isset($addressdetail['pcity'])?$addressdetail['pcity']:''  ?>">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>City</label>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="group">      
                      <input class="inputMaterial" type="Number" name="ppincode" value="<?php echo isset($addressdetail['ppincode'])?$addressdetail['ppincode']:''  ?>" >
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Pin Code</label>
                    </div>
                  </div>
                </div>
              </div>
              <div id="btnregisterdata" class="nextBtn">Save & Continue</div>
          </div>
        </div>
      </div>
    </div>
    </form>
  <!-- </form>
  <form id="frmchildsub" method="post" > -->
  <form method="post" id="frmchildapplication">
  <div class="row setup-content " id="step2" >
   <input type="hidden" name="childform" value="childform">
    <input type="hidden" name="childid" value="<?php echo isset($childdetail['id'])?$childdetail['id']:''; ?>" >
    <div class="col-md-8 col-md-offset-2">
      <div class="col-md-12">
        <h3 style="text-align: center;"> Child's Details</h3>
        <div class="box">

          <div class="row">
            <div class="col-md-4">
              <div class="group">      
                <input class="inputMaterial" type="text" value="<?php echo isset($childdetail['c_first_name'])?$childdetail['c_first_name']:'';  ?>" name="c_first_name" >
                <span class="highlight"></span>
                <span class="bar"></span>
                <label> Child's First Name</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="group">      
                <input class="inputMaterial" type="text"  value="<?php echo isset($childdetail['c_middle_name'])?$childdetail['c_middle_name']:'';  ?>" name="c_middle_name" >
                <span class="highlight"></span>
                <span class="bar"></span>
                <label> Child's Middle Name</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="group">      
                <input class="inputMaterial" type="text"  value="<?php echo isset($childdetail['c_last_name'])?$childdetail['c_last_name']:'';  ?>" name="c_last_name" >
                <span class="highlight"></span>
                <span class="bar"></span>
                <label> Child's Last Name</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-4">
                  <p style="font-style: normal;margin-top: 20px;"><strong>Gender</strong></p>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <!-- <form> -->
                      <div class="newform" style="margin-left: 100px; margin-top: 20px;">
                        <input type="radio" id="contactChoice1" <?php echo (isset($childdetail['c_gender'])&&$childdetail['c_gender']=='Boy')?'checked="checked"':'';  ?> name="c_gender" value="Boy" style="margin-left: -22px;">Boy
                        <label for="contactChoice1" style="padding-left: 30px;">
                        </label>

                        <input type="radio" id="contactChoice2" <?php echo (isset($childdetail['c_gender'])&&$childdetail['c_gender']=='Girl')?'checked="checked"':'';  ?> name="c_gender" value="Girl" style="margin-left: -22px;">Girl
                        <label for="contactChoice2" style="padding-left: 30px;">
                        </label>
                      </div>
                      <!-- </form> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="group">      
                  <select class="inputMaterial" type="text" name="c_category" >
                    <option></option>
                    <option value="General" <?php echo (isset($childdetail['c_category'])&&$childdetail['c_category']=='Girl')?'selected="selected"':'';  ?>>General</option>
                    <option value="Economically Weaker Section (EWS)" <?php echo (isset($childdetail['c_category'])&&$childdetail['c_category']=='Economically Weaker Section (EWS)')?'selected="selected"':'';  ?>>Economically Weaker Section (EWS)</option>
                    <option value="Disadvantaged Group (DG): SC/ ST/ OBC/ Physically Challenged/ Orphan/ Transgender" <?php echo (isset($childdetail['c_category'])&&$childdetail['c_category']=='Disadvantaged Group (DG): SC/ ST/ OBC/ Physically Challenged/ Orphan/ Transgender')?'selected="selected"':'';  ?>>Disadvantaged Group (DG): SC/ ST/ OBC/ Physically Challenged/ Orphan/ Transgender</option>

                  </select>
                  <label>Category</label>
                </div>
              </div>

              <div class="col-md-3">
                <div class="group">      
                  <select class="inputMaterial" type="text" name="c_nationality" >
                    <option value="Indian" <?php echo (isset($childdetail['c_nationality'])&&$childdetail['c_nationality']=='Indian')?'selected="selected"':'';  ?>>Indian</option>
                    <option value="NRI" <?php echo (isset($childdetail['c_nationality'])&&$childdetail['c_nationality']=='NRI')?'selected="selected"':'';  ?>>NRI</option>
                  </select>
                  <label>Nationality</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="group">      
                  <input class="inputMaterial" id="date1" value="<?php echo isset($childdetail['c_dob'])?$childdetail['c_dob']:'';  ?>" type="text" name="c_dob" >
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Date Of Birth</label>
                </div>
                <p>Age as on 31 March 2018:</p>
              </div>

              <div class="col-md-4">
                <div class="group">      
                  <input class="inputMaterial" type="text" value="<?php echo isset($childdetail['c_place_of_birth'])?$childdetail['c_place_of_birth']:'';  ?>" name="c_place_of_birth" >
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Place Of Birth</label>
                </div>
              </div>

              <div class="col-md-4">
                <div class="group">      
                  <input class="inputMaterial" type="text"  value="<?php echo isset($childdetail['c_mother_tounge'])?$childdetail['c_mother_tounge']:'';  ?>" name="c_mother_tounge" >
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Mother Tounge</label>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-4">
                <div class="group">      
                  <input class="inputMaterial" id="date1"  value="<?php echo isset($childdetail['c_aadhar'])?$childdetail['c_aadhar']:'';  ?>" type="text" name="c_aadharcard" >
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Aadhar Card Number of Child</label>
                </div>
              </div>

              <div class="col-md-4">
                <div class="group">      
                  <select class="inputMaterial" type="text" name="c_religion" >
                    <option></option>
                    <option value="Hindu" <?php echo (isset($childdetail['c_religion'])&&$childdetail['c_religion']=='Hindu')?'selected="selected"':'';  ?>>Hindu</option>
                    <option value="Muslim" <?php echo (isset($childdetail['c_religion'])&&$childdetail['c_religion']=='Muslim')?'selected="selected"':'';  ?>>Muslim</option>
                    <option value="Sikh" <?php echo (isset($childdetail['c_religion'])&&$childdetail['c_religion']=='Sikh')?'selected="selected"':'';  ?>>Sikh</option>
                    <option value="Christian" <?php echo (isset($childdetail['c_religion'])&&$childdetail['c_religion']=='Christian')?'selected="selected"':'';  ?>>Christian</option>
                    <option value="Catholic" <?php echo (isset($childdetail['c_religion'])&&$childdetail['c_religion']=='Catholic')?'selected="selected"':'';  ?>>Catholic</option>
                    <option value="Jain" <?php echo (isset($childdetail['c_religion'])&&$childdetail['c_religion']=='Jain')?'selected="selected"':'';  ?>>Jain</option>
                    <option value="Buddhist" <?php echo (isset($childdetail['c_religion'])&&$childdetail['c_religion']=='Buddhist')?'selected="selected"':'';  ?>>Buddhist</option>
                    <option value="Others" <?php echo (isset($childdetail['c_religion'])&&$childdetail['c_religion']=='Others')?'selected="selected"':'';  ?>>Others</option>
                  </select>
                  <label>Religion</label>
                </div>

                <div class="group">      
                  <input class="inputMaterial" type="text" value="<?php echo isset($childdetail['other_specifys'])?$childdetail['other_specifys']:'';  ?>" name="other_specifys" >
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Others(Specify)</label>
                </div>
              </div>

              <div class="col-md-4">
                <div class="group">      
                  <select class="inputMaterial" type="text" name="c_blood_group" >
                    <option></option>
                    <option value="O" <?php echo (isset($childdetail['c_blood_group'])&&$childdetail['c_blood_group']=='O')?'selected="selected"':'';  ?>>O</option>
                    <option value="A" <?php echo (isset($childdetail['c_blood_group'])&&$childdetail['c_blood_group']=='A')?'selected="selected"':'';  ?>>A </option>
                    <option value="B" <?php echo (isset($childdetail['c_blood_group'])&&$childdetail['c_blood_group']=='B')?'selected="selected"':'';  ?>>B</option>
                    <option value="AB" <?php echo (isset($childdetail['c_blood_group'])&&$childdetail['c_blood_group']=='AB')?'selected="selected"':'';  ?>>AB</option>
                    <option value="O+" <?php echo (isset($childdetail['c_blood_group'])&&$childdetail['c_blood_group']=='O+')?'selected="selected"':'';  ?>>O+</option>
                    <option value="O-" <?php echo (isset($childdetail['c_blood_group'])&&$childdetail['c_blood_group']=='O-')?'selected="selected"':'';  ?>>O-</option>
                    <option value="A+" <?php echo (isset($childdetail['c_blood_group'])&&$childdetail['c_blood_group']=='A+')?'selected="selected"':'';  ?>>A+</option>
                    <option value="A-" <?php echo (isset($childdetail['c_blood_group'])&&$childdetail['c_blood_group']=='A-')?'selected="selected"':'';  ?>>A-</option>
                    <option value="B+" <?php echo (isset($childdetail['c_blood_group'])&&$childdetail['c_blood_group']=='B+')?'selected="selected"':'';  ?>>B+</option>
                    <option value="B-" <?php echo (isset($childdetail['c_blood_group'])&&$childdetail['c_blood_group']=='B-')?'selected="selected"':'';  ?>>B-</option>
                    <option value="AB+" <?php echo (isset($childdetail['c_blood_group'])&&$childdetail['c_blood_group']=='AB+')?'selected="selected"':'';  ?>>AB+</option>
                    <option value="AB-" <?php echo (isset($childdetail['c_blood_group'])&&$childdetail['c_blood_group']=='AB-')?'selected="selected"':'';  ?>>AB-</option>

                  </select>
                  <label>Blood Group</label>
                </div>
              </div>
            </div>

            <div class="group">      
              <input class="inputMaterial" type="text" value="<?php echo isset($childdetail['any_medical_condition'])?$childdetail['any_medical_condition']:'';  ?>" name="any_medical_condition" >
              <span class="highlight"></span>
              <span class="bar"></span>
              <label> Mention in details if the child has any medical condition? (Chronic Ailment/ Allergy/ Physical Disorder/ Special Needs/ Birth History Complication Etc)</label>
            </div>


            <div class="row">
              <div class="col-md-6">
                <p style="font-style: normal;margin-top: 20px;"><strong>Is Child Adopted?</strong></p>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <!-- <form> -->
                    <div class="newform" style="margin-left: 100px; margin-top: 20px;">
                      <input type="radio" id="contactChoice1" <?php echo (isset($childdetail['c_is_child_adopted'])&&$childdetail['c_is_child_adopted']=='Yes')?'checked="checked"':'';  ?> name="c_is_child_adopted" value="Yes" style="margin-left: -22px;">Yes
                      <label for="contactChoice1" style="padding-left: 30px;">
                      </label>

                      <input type="radio" id="contactChoice2" <?php echo (isset($childdetail['c_is_child_adopted'])&&$childdetail['c_is_child_adopted']=='No')?'checked="checked"':'';  ?>  name="c_is_child_adopted" value="No" style="margin-left: -22px;">No
                      <label for="contactChoice2" style="padding-left: 30px;">
                      </label>
                    </div>
                    <!-- </form> -->
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <p style="font-style: normal;margin-top: 20px;"><strong>Language Spoken </strong></p>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <!-- <form> -->
                      <div class="newform" style="margin-left: 100px; margin-top: 20px;">
                        <input type="checkbox" id="contactChoice1" 
                        <?php if(isset($childdetail['c_language_at_home']))
                              {
                                if(strstr($childdetail['c_language_at_home'],'Hindi'))
                                {
                                  echo 'checked="checked"';
                                }
                              }


                          ?> name="c_language_at_home[]" value="Hindi" style="margin-left: -22px;" >Hindi
                        <label for="contactChoice1" style="padding-left: 30px;">
                        </label>

                        <input type="checkbox" id="contactChoice2" <?php if(isset($childdetail['c_language_at_home']))
                              {
                                if(strstr($childdetail['c_language_at_home'],'English'))
                                {
                                  echo 'checked="checked"';
                                }
                              }


                          ?>name="c_language_at_home[]" value="English" style="margin-left: -22px;">English
                        <label for="contactChoice2" style="padding-left: 30px;">
                        </label>
                      </div>
                      <!-- </form> -->
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="group">      
                      <input class="inputMaterial" type="text" value="<?php echo isset($childdetail['c_language_at_home_other'])?$childdetail['c_language_at_home_other']:'';  ?>" name="c_language_at_home_other" >
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Others(Specify)</label>
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div id="buttonlogintoregister" class="nextBtn">Back</div>
                  </div>
                  <div class="col-md-6">
                    <div id="btnsubmitchild" class="nextBtn">Submit</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
<!-- </form> -->
<form method="post" id="frmfather" >
    <div class="row setup-content " id="step3">
    <input type="hidden" name="fatherform" value="fatherform">
    <input type="hidden" name="fatherid" value="<?php echo isset($fatherdetail['id'])?$fatherdetail['id']:''; ?>" >
    <div class="col-md-10 col-md-offset-1">
    <div class="col-md-12">
    <h3 style="text-align: center;">Father's/Guardian's Details</h3>
    <div class="box">

    <div class="row">
    <div class="col-md-4">
      <div class="group">      
        <input class="inputMaterial" type="text" value="<?php echo isset($fatherdetail['father_first_name'])?$fatherdetail['father_first_name']:''; ?>" name="father_first_name" >
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Father's/Guardian's First Name</label>
      </div>
    </div>
    <div class="col-md-4">
      <div class="group">      
        <input class="inputMaterial" type="text" value="<?php echo isset($fatherdetail['father_middle_name'])?$fatherdetail['father_middle_name']:''; ?>" name="father_middle_name" >
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Father's/Guardian's Middle Name</label>
      </div>
    </div>
    <div class="col-md-4">
      <div class="group">      
        <input class="inputMaterial" type="text" value="<?php echo isset($fatherdetail['father_last_name'])?$fatherdetail['father_last_name']:''; ?>"  name="father_last_name" >
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Father's/Guardian's Last Name</label>
      </div>
    </div>
    </div>

    <div class="row">
    <div class="col-md-4">
      <div class="group">      
        <input class="inputMaterial" type="text" value="<?php echo isset($fatherdetail['relation_with_child'])?$fatherdetail['relation_with_child']:''; ?>" name="relation_with_child" >
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Relationship With Child(if Guardians)</label>
      </div>
    </div>
    <div class="col-md-4">
      <div class="group">      
        <select class="inputMaterial" type="text"  name="father_nationality" >
          <option value="Indian" <?php echo (isset($fatherdetail['father_nationality'])&&$fatherdetail['father_nationality']=='Indian')?'selected="selected"':''; ?> >Indian</option>
          <option value="NRI" <?php echo (isset($fatherdetail['father_nationality'])&&$fatherdetail['father_nationality']=='NRI')?'selected="selected"':''; ?>>NRI</option>
        </select>
        <label>Nationality</label>
      </div>
    </div>
    <div class="col-md-4">
      <div class="group">      
        <input class="inputMaterial" id="date1" type="text" value="<?php echo isset($fatherdetail['father_dob'])?$fatherdetail['father_dob']:''; ?>" name="father_dob" >
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Date Of Birth</label>
      </div>
    </div>
    </div>

    <div class="row">
    <div class="col-md-3">
      <p style="font-style: normal;margin-top: 20px;"><strong>Highest Education Qualification?</strong></p>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <!-- <form> -->
          <div class="newform" style="margin-left: 100px; margin-top: 20px;">
            <input type="radio" id="contactChoice1" name="qualification" value="Graduate" <?php echo (isset($fatherdetail['qualification'])&&$fatherdetail['qualification']=='Graduate')?'selected="selected"':''; ?> style="margin-left: -22px;">Graduate
            <label for="contactChoice1" style="padding-left: 30px;">
            </label>

            <input type="radio" id="contactChoice2" name="qualification" <?php echo (isset($fatherdetail['qualification'])&&$fatherdetail['qualification']=='Post Graduate')?'selected="selected"':''; ?> value="Post Graduate" style="margin-left: -22px;">Post Graduate
            <label for="contactChoice2" style="padding-left: 30px;">
            </label>

            <input type="radio" id="contactChoice3" name="qualification" <?php echo (isset($fatherdetail['qualification'])&&$fatherdetail['qualification']=='Professional Degree')?'selected="selected"':''; ?> value="Professional Degree" style="margin-left: -22px;">Professional Degree
            <label for="contactChoice3" style="padding-left: 30px;">
            </label>

            <input type="radio" id="contactChoice3" name="qualification" <?php echo (isset($fatherdetail['qualification'])&&$fatherdetail['qualification']=='Phd')?'selected="selected"':''; ?> value="Phd" style="margin-left: -22px;">Phd
            <label for="contactChoice3" style="padding-left: 30px;">
            </label>

          </div>
          <!-- </form> -->
        </div>
      </div>
      <div class="col-md-3">
        <div class="group">      
          <input class="inputMaterial" type="text" value="<?php echo isset($fatherdetail['qualification_other'])?$fatherdetail['qualification_other']:''; ?>" name="qualification_other" >
          <span class="highlight"></span>
          <span class="bar"></span>
          <label>Others(specify)</label>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <p style="font-style: normal;margin-top: 20px;"><strong>Occupation?</strong></p>
      </div>
      <div class="col-md-6">
        <div class="form-group">
            <div class="newform" style="margin-left: 100px; margin-top: 20px;">
              <input type="radio" id="contactChoice1" <?php echo (isset($fatherdetail['father_occupation'])&& $fatherdetail['father_occupation']=='Business')?'checked="checked"':''; ?> name="father_occupation" value="Business" style="margin-left: -22px;">Business
              <label for="contactChoice1" style="padding-left: 30px;">
              </label>

              <input type="radio" id="contactChoice2" <?php echo (isset($fatherdetail['father_occupation'])&&$fatherdetail['father_occupation']=='Professional Degree')?'checked="checked"':''; ?> name="father_occupation" value="Profession" style="margin-left: -22px;">Profession
              <label for="contactChoice2" style="padding-left: 30px;">
              </label>

              <input type="radio" id="contactChoice3" <?php echo (isset($fatherdetail['father_occupation'])&&$fatherdetail['father_occupation']=='Service')?'checked="checked"':''; ?>  name="father_occupation" value="Service" style="margin-left: -22px;">Service
              <label for="contactChoice3" style="padding-left: 30px;">
              </label>

              <input type="radio" id="contactChoice3" <?php echo (isset($fatherdetail['father_occupation'])&&$fatherdetail['father_occupation']=='Unemployed')?'checked="checked"':''; ?> name="father_occupation" value="Unemployed" style="margin-left: -22px;">
              Unemployed
              <label for="contactChoice3" style="padding-left: 30px;">
              </label>

            </div>
            <!-- </form> -->
          </div>
        </div>
        <div class="col-md-3">
          <div class="group">      
            <input class="inputMaterial" type="text" value="<?php echo isset($fatherdetail['father_occupation_other'])?$fatherdetail['father_occupation_other']:''; ?>" name="father_occupation_other" >
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Others(specify)</label>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="group">      
            <input class="inputMaterial" type="text" value="<?php echo isset($fatherdetail['father_organisation'])?$fatherdetail['father_organisation']:''; ?>" name="father_organisation" >
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Organisation Name</label>
          </div>
        </div>
        <div class="col-md-4">
          <div class="group">      
            <input class="inputMaterial" type="text" value="<?php echo isset($fatherdetail['father_office_address'])?$fatherdetail['father_office_address']:''; ?>" name="father_office_address" >
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Office Address</label>
          </div>
        </div>
        <div class="col-md-4">
          <div class="group">      
            <input class="inputMaterial" id="date1" value="<?php echo isset($fatherdetail['father_office_phone'])?$fatherdetail['father_office_phone']:''; ?>" type="text" name="father_office_phone" >
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Office Phone Number</label>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-md-4">
          <div class="group">      
            <input class="inputMaterial" type="Number" value="<?php echo isset($fatherdetail['father_annual_salary'])?$fatherdetail['father_annual_salary']:''; ?>" name="father_annual_salary" >
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Father's/Guardian's Annual Salary(Numeric)</label>
          </div>
        </div>
        <div class="col-md-4">
          <div class="group">      
            <input class="inputMaterial" id="date1" value="<?php echo isset($fatherdetail['father_designation'])?$fatherdetail['father_designation']:''; ?>" type="text" name="father_designation" >
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Designation</label>
          </div>
        </div>

        <div class="col-md-4">
          <div class="row">
            <div class="col-md-6">
              <p style="font-style: normal;margin-top: 20px;"><strong>Is Job Transferrable</strong></p>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <!-- <form> -->
                  <div class="newform" style="margin-left: 100px; margin-top: 20px;">
                    <input type="radio" id="contactChoice1" <?php echo (isset($fatherdetail['father_job_transferrable'])&& $fatherdetail['father_job_transferrable']=='yes')?'checked="checked"':''; ?> name="father_job_transferrable" value="yes" style="margin-left: -22px;">Yes
                    <label for="contactChoice1" style="padding-left: 30px;">
                    </label>

                    <input type="radio" id="contactChoice2" <?php echo (isset($fatherdetail['father_job_transferrable'])&& $fatherdetail['father_job_transferrable']=='no')?'checked="checked"':''; ?> name="father_job_transferrable" value="no" style="margin-left: -22px;">No
                    <label for="contactChoice2" style="padding-left: 30px;">
                    </label>


                  </div>
                  <!-- </form> -->
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="group">      
              <input class="inputMaterial" type="text" value="<?php echo isset($fatherdetail['father_mobile'])?$fatherdetail['father_mobile']:''; ?>" name="father_mobile" >
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Father's/Guardian's Mobile Number</label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="group">      
              <input class="inputMaterial" id="date1" value="<?php echo isset($fatherdetail['father_email'])?$fatherdetail['father_email']:''; ?>" type="text" name="father_email"  >
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Father's/Guardian's Email ID</label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="group">      
              <input class="inputMaterial" id="date1" value="<?php echo isset($fatherdetail['father_sports_background'])?$fatherdetail['father_sports_background']:''; ?>" type="text" name="father_sports_background" >
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Give Details If Sports Background (State/National Level)</label>
            </div>

          </div>
        </div>


        <div class="row">
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-6">
                <p style="font-style: normal;margin-top: 20px;"><strong>Father Employed at A School?</strong></p>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <!-- <form> -->
                    <div class="newform" style="margin-left: 100px; margin-top: 20px;">
                      <input type="radio" id="contactChoice1" <?php echo (isset($fatherdetail['father_employed_school'])&& $fatherdetail['father_employed_school']=='no')?'checked="checked"':''; ?> name="father_employed_school" value="yes" style="margin-left: -22px;">Yes
                      <label for="contactChoice1" style="padding-left: 30px;">
                      </label>

                      <input type="radio" id="contactChoice2" <?php echo (isset($fatherdetail['father_employed_school'])&& $fatherdetail['father_employed_school']=='no')?'checked="checked"':''; ?> name="father_employed_school" value="no" style="margin-left: -22px;">No
                      <label for="contactChoice2" style="padding-left: 30px;">
                      </label>


                    </div>
                    <!-- </form> -->
                  </div>
                </div>

              </div>
            </div>
            <div class="col-md-4">
              <div class="group">      
                <input class="inputMaterial" type="text" value="<?php echo isset($fatherdetail['father_employed_school_name'])?$fatherdetail['father_employed_school_name']:''; ?>" name="father_employed_school_name" >
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>If Yes, School Name</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="group">      
                <input class="inputMaterial" type="text" value="<?php echo isset($fatherdetail['father_employed_school_role'])?$fatherdetail['father_employed_school_role']:''; ?>" name="father_employed_school_role" >
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>If Yes,Role in School</label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="group">      
                <input class="inputMaterial" type="text" value="<?php echo isset($fatherdetail['last_school_attendent_by_father'])?$fatherdetail['last_school_attendent_by_father']:''; ?>" name="last_school_attendent_by_father" >
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Last School Attended By Father(XII Standard)</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="group">      
                <input class="inputMaterial" type="text" value="<?php echo isset($fatherdetail['last_school_attendent_yop'])?$fatherdetail['last_school_attendent_yop']:''; ?>" name="last_school_attendent_yop" >
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Year of Passing(XII)</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div id="btnregisteraddressback" class="nextBtn">Back</div>
            </div>
            <div class="col-md-6">
              <div id="btnfatherform" class="nextBtn">Submit</div>
            </div>
          </div>>
        </div>
        <!--  <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button> -->
      </div>
    </div>
    </div>
  </form>
  <form method="post" id="frmmother">
  <input type="hidden" name="motherform" value="motherform">
    <input type="hidden" name="motherid" value="<?php echo isset($motherdetail['id'])?$motherdetail['id']:''; ?>" >
        <div class="row setup-content " id="step4">
          <div class="col-md-10 col-md-offset-1">
            <div class="col-md-12">
              <h3 style="text-align: center;"> Mother's/Guardian's Details</h3>
              <div class="box">

                <div class="row">
                  <div class="col-md-4">
                    <div class="group">      
                      <input class="inputMaterial" type="text" value="<?php echo isset($motherdetail['mother_first_name'])?$motherdetail['mother_first_name']:''; ?>" name="mother_first_name" >
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Mother's/Guardian's First Name</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="group">      
                      <input class="inputMaterial" type="text" value="<?php echo isset($motherdetail['mother_middle_name'])?$motherdetail['mother_middle_name']:''; ?>" name="mother_middle_name" >
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Mother's/Guardian's Middle Name</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="group">      
                      <input class="inputMaterial" type="text" value="<?php echo isset($motherdetail['mother_last_name'])?$motherdetail['mother_last_name']:''; ?>"  name="mother_last_name" >
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Mother's/Guardian's Last Name</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="group">      
                      <input class="inputMaterial" type="text" value="<?php echo isset($motherdetail['mother_relation_with_child'])?$motherdetail['mother_relation_with_child']:''; ?>" name="mother_relation_with_child" >
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Relationship With Child(if Guardians)</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="group">      
                      <select class="inputMaterial" type="text"  name="mother_nationality"  >
                        <option value="Indian" <?php echo (isset($motherdetail['mother_nationality'])&&$motherdetail['mother_nationality']=='Indian')?'selected="selected"':''; ?>>Indian</option>
                        <option value="NRI" <?php echo (isset($motherdetail['mother_nationality'])&&$motherdetail['mother_nationality']=='NRI')?'selected="selected"':''; ?>>NRI</option>
                      </select>
                      <label>Nationality</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="group">      
                      <input class="inputMaterial" id="date1" value="<?php echo isset($motherdetail['mother_dob'])?$motherdetail['mother_dob']:''; ?>" type="text" name="mother_dob" >
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Date Of Birth</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <p style="font-style: normal;margin-top: 20px;"><strong>Highest Education Qualification?</strong></p>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <!-- <form> -->
                        <div class="newform" style="margin-left: 100px; margin-top: 20px;">
                          <input type="radio" id="contactChoice1" <?php echo (isset($motherdetail['mother_qualification'])&&$motherdetail['mother_qualification']=='Graduate')?'checked="checked"':''; ?> name="mother_qualification" value="Graduate" style="margin-left: -22px;">Graduate
                          <label for="contactChoice1" style="padding-left: 30px;">
                          </label>

                          <input type="radio" id="contactChoice2" <?php echo (isset($motherdetail['mother_qualification'])&&$motherdetail['mother_qualification']=='Post Graduate')?'checked="checked"':''; ?> name="mother_qualification" value="Post Graduate" style="margin-left: -22px;">Post Graduate
                          <label for="contactChoice2" style="padding-left: 30px;">
                          </label>

                          <input type="radio" id="contactChoice3" <?php echo (isset($motherdetail['mother_qualification'])&&$motherdetail['mother_qualification']=='Professional Degree')?'checked="checked"':''; ?> name="mother_qualification" value="Professional Degree" style="margin-left: -22px;">Professional Degree
                          <label for="contactChoice3" style="padding-left: 30px;">
                          </label>

                          <input type="radio" id="contactChoice3" <?php echo (isset($motherdetail['mother_qualification'])&&$motherdetail['mother_qualification']=='Phd')?'checked="checked"':''; ?> name="mother_qualification" value="Phd" style="margin-left: -22px;">Phd
                          <label for="contactChoice3" style="padding-left: 30px;">
                          </label>

                        </div>
                        <!-- </form> -->
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="group">      
                        <input class="inputMaterial" type="text" value="<?php echo isset($motherdetail['mother_qualification_other'])?$motherdetail['mother_qualification_other']:''; ?>" name="mother_qualification_other" >
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Others(specify)</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3">
                      <p style="font-style: normal;margin-top: 20px;"><strong>Occupation?</strong></p>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <!-- <form> -->
                          <div class="newform" style="margin-left: 100px; margin-top: 20px;">
                            <input type="radio" id="contactChoice1" <?php echo (isset($motherdetail['mother_occupation'])&&$motherdetail['mother_occupation']=='Business')?'checked="checked"':''; ?> name="mother_occupation" value="Business" style="margin-left: -22px;">Business
                            <label for="contactChoice1" style="padding-left: 30px;">
                            </label>

                            <input type="radio" id="contactChoice2" <?php echo (isset($motherdetail['mother_occupation'])&&$motherdetail['mother_occupation']=='Profession')?'checked="checked"':''; ?> name="mother_occupation" value="Profession" style="margin-left: -22px;">Profession
                            <label for="contactChoice2" style="padding-left: 30px;">
                            </label>

                            <input type="radio" id="contactChoice3" <?php echo (isset($motherdetail['mother_occupation'])&&$motherdetail['mother_occupation']=='Service')?'checked="checked"':''; ?> name="mother_occupation" value="Service" style="margin-left: -22px;">Service
                            <label for="contactChoice3" style="padding-left: 30px;">
                            </label>

                            <input type="radio" id="contactChoice3" <?php echo (isset($motherdetail['mother_occupation'])&&$motherdetail['mother_occupation']=='Unemployed')?'checked="checked"':''; ?>  name="mother_occupation" value="Unemployed" style="margin-left: -22px;">
                            Unemployed
                            <label for="contactChoice3" style="padding-left: 30px;">
                            </label>

                          </div>
                          <!-- </form> -->
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="group">      
                          <input class="inputMaterial" type="text" value="<?php echo isset($motherdetail['mother_occupation_others'])?$motherdetail['mother_occupation_others']:''; ?>" name="mother_occupation_others" >
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Others(specify)</label>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="group">      
                          <input class="inputMaterial" type="text" value="<?php echo isset($motherdetail['mother_organisation_name'])?$motherdetail['mother_organisation_name']:''; ?>" name="mother_organisation_name" >
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Organisation Name</label>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="group">      
                          <input class="inputMaterial" type="text" value="<?php echo isset($motherdetail['mother_office_address'])?$motherdetail['mother_office_address']:''; ?>" name="mother_office_address" >
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Office Address</label>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="group">      
                          <input class="inputMaterial" id="date1" value="<?php echo isset($motherdetail['mother_office_phone'])?$motherdetail['mother_office_phone']:''; ?>" type="text" name="mother_office_phone" >
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Office Phone Number</label>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-4">
                        <div class="group">      
                          <input class="inputMaterial" type="text" value="<?php echo isset($motherdetail['mother_annual_salary'])?$motherdetail['mother_annual_salary']:''; ?>" name="mother_annual_salary" >
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Mother's/Guardian's Annual Salary</label>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="group">      
                          <input class="inputMaterial" id="date1" value="<?php echo isset($motherdetail['mother_office_designation'])?$motherdetail['mother_office_designation']:''; ?>" type="text" name="mother_office_designation" >
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Designation</label>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="row">
                          <div class="col-md-6">
                            <p style="font-style: normal;margin-top: 20px;"><strong>Is Job Transferrable</strong></p>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <!-- <form> -->
                                <div class="newform" style="margin-left: 100px; margin-top: 20px;">
                                  <input type="radio" id="contactChoice1" <?php echo (isset($motherdetail['mother_job_transferrable'])&&$motherdetail['mother_job_transferrable']=='yes')?'checked="checked"':''; ?> name="mother_job_transferrable" value="yes" style="margin-left: -22px;">Yes
                                  <label for="contactChoice1" style="padding-left: 30px;">
                                  </label>

                                  <input type="radio" id="contactChoice2" <?php echo (isset($motherdetail['mother_job_transferrable'])&&$motherdetail['mother_job_transferrable']=='no')?'checked="checked"':''; ?> name="mother_job_transferrable" value="no" style="margin-left: -22px;">No
                                  <label for="contactChoice2" style="padding-left: 30px;">
                                  </label>


                                </div>
                                <!-- </form> -->
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="group">      
                            <input class="inputMaterial" type="text" value="<?php echo isset($motherdetail['mother_phone'])?$motherdetail['mother_phone']:''; ?>" name="mother_phone" >
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Mother's/Guardian's Mobile Number</label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="group">      
                            <input class="inputMaterial" id="date1" value="<?php echo isset($motherdetail['mother_email'])?$motherdetail['mother_email']:''; ?>" type="text" name="mother_email" >
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Mother's/Guardian's Email ID</label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="group">      
                            <input class="inputMaterial" id="date1" value="<?php echo isset($motherdetail['mother_sports'])?$motherdetail['mother_sports']:''; ?>" type="text" name="mother_sports" >
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Give Details If Sports Background (State/National Level)</label>
                          </div>

                        </div>
                      </div>


                      <div class="row">
                        <div class="col-md-4">
                          <div class="row">
                            <div class="col-md-6">
                              <p style="font-style: normal;margin-top: 20px;"><strong>Mother Employed at A School?</strong></p>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <!-- <form> -->
                                  <div class="newform" style="margin-left: 100px; margin-top: 20px;">
                                    <input type="radio" id="contactChoice1" <?php echo (isset($motherdetail['mother_emplyoed_at_school'])&&$motherdetail['mother_emplyoed_at_school']=='yes')?'checked="checked"':''; ?> name="mother_emplyoed_at_school" value="yes" style="margin-left: -22px;">Yes
                                    <label for="contactChoice1" style="padding-left: 30px;">
                                    </label>

                                    <input type="radio" id="contactChoice2" <?php echo (isset($motherdetail['mother_emplyoed_at_school'])&&$motherdetail['mother_emplyoed_at_school']=='no')?'checked="checked"':''; ?> name="mother_emplyoed_at_school" value="no" style="margin-left: -22px;">No
                                    <label for="contactChoice2" style="padding-left: 30px;">
                                    </label>


                                  </div>
                                  <!-- </form> -->
                                </div>
                              </div>

                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="group">      
                              <input class="inputMaterial" type="text" value="<?php echo isset($motherdetail['mother_school_name'])?$motherdetail['mother_school_name']:''; ?>"  name="mother_school_name" >
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label>If Yes, School Name</label>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="group">      
                              <input class="inputMaterial" type="text" value="<?php echo isset($motherdetail['mother_school_role'])?$motherdetail['mother_school_role']:''; ?>" name="mother_school_role" >
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label>If Yes,Role in School</label>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="group">      
                              <input class="inputMaterial" type="text" value="<?php echo isset($motherdetail['mother_last_school_attendent'])?$motherdetail['mother_last_school_attendent']:''; ?>" name="mother_last_school_attendent" >
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label>Last School Attended By Mother(XII Standard)</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="group">      
                              <input class="inputMaterial" type="text" value="<?php echo isset($motherdetail['mother_school_yop'])?$motherdetail['mother_school_yop']:''; ?>" name="mother_school_yop" >
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label>Year of Passing(XII)</label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div id="buttonlogintoregister" class="nextBtn">Back</div>
                          </div>
                          <div class="col-md-6">
                            <div id="btnmothersub" class="nextBtn">Submit</div>
                          </div>
                        </div>
                      </div>
                      <!--  <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button> -->
                    </div>
                  </div>
                </div>
                </form>

                <form method="post" id="frmsibling">
                <div class="row setup-content " id="step5">
                <input type="hidden" name="siblingform" value="siblingform">
                <input type="hidden" name="siblingid" value="<?php echo isset($siblingdetail['id'])?$siblingdetail['id']:''; ?>" >
                  <div class="col-md-10 col-md-offset-1">
                    <div class="col-md-12">
                      <h3 style="text-align: center;">General/Sibling's Details</h3>
                      <div class="box">

                        <div class="row">
                          <div class="col-md-6">
                            <div class="group">      
                              <input class="inputMaterial" type="text" value="<?php echo isset($siblingdetail['sibling_email'])?$siblingdetail['sibling_email']:''; ?>" name="sibling_email" >
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label>Email ID For All Communications</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="group">      
                              <input class="inputMaterial" type="text" value="<?php echo isset($siblingdetail['sibling_mobile'])?$siblingdetail['sibling_mobile']:''; ?>" name="sibling_mobile" >
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label>Mobile No For All Communications</label>
                            </div>
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-md-3">
                            <p style="font-style: normal;margin-top: 20px;"><strong>Parent's Status</strong></p>
                          </div>
                          <div class="col-md-9">
                            <div class="form-group">
                              <!-- <form> -->
                                <div class="newform" style="margin-left: 100px; margin-top: 20px;">
                                  <input type="radio" id="contactChoice1" <?php echo (isset($siblingdetail['sibling_parent_status'])&&$siblingdetail['sibling_parent_status']=="Married")?'checked="checked"':''; ?> name="sibling_parent_status" value="Married" style="margin-left: -22px;">Married
                                  <label for="contactChoice1" style="padding-left: 30px;">
                                  </label>

                                  <input type="radio" id="contactChoice2" <?php echo (isset($siblingdetail['sibling_parent_status'])&&$siblingdetail['sibling_parent_status']=="Divorced")?'checked="checked"':''; ?> name="sibling_parent_status" value="Divorced" style="margin-left: -22px;">Divorced
                                  <label for="contactChoice2" style="padding-left: 30px;">
                                  </label>

                                  <input type="radio" id="contactChoice3" <?php echo (isset($siblingdetail['sibling_parent_status'])&&$siblingdetail['sibling_parent_status']=="Separated")?'checked="checked"':''; ?> name="sibling_parent_status" value="Separated" style="margin-left: -22px;">Separated
                                  <label for="contactChoice3" style="padding-left: 30px;">
                                  </label>

                                  <input type="radio" id="contactChoice3" <?php echo (isset($siblingdetail['sibling_parent_status'])&&$siblingdetail['sibling_parent_status']=="Widow")?'checked="checked"':''; ?> name="sibling_parent_status" value="Widow" style="margin-left: -22px;">Widow
                                  <label for="contactChoice3" style="padding-left: 30px;">
                                  </label>

                                  <input type="radio" id="contactChoice3" <?php echo (isset($siblingdetail['sibling_parent_status'])&&$siblingdetail['sibling_parent_status']=="Widower")?'checked="checked"':''; ?> name="sibling_parent_status" value="Widower" style="margin-left: -22px;">Widower
                                  <label for="contactChoice3" style="padding-left: 30px;">
                                  </label>

                                </div>
                                <!-- </form> -->
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-3">
                              <p style="font-style: normal;margin-top: 20px;"><strong>Mode of Transportation</strong></p>
                            </div>
                            <div class="col-md-9">
                              <div class="form-group">
                                <!-- <form> -->
                                  <div class="newform" style="margin-left: 100px; margin-top: 20px;">
                                    <input type="radio" id="contactChoice1" <?php echo (isset($siblingdetail['mode_of_transport'])&&$siblingdetail['mode_of_transport']=="School Transport(Select if )")?'checked="checked"':''; ?> name="mode_of_transport" value="School Transport(Select if )" style="margin-left: -22px;">School Transport(Select if )
                                    <label for="contactChoice1" style="padding-left: 30px;">
                                    </label>

                                    <input type="radio" id="contactChoice2" <?php echo (isset($siblingdetail['mode_of_transport'])&&$siblingdetail['mode_of_transport']=="Personel Vehicle")?'checked="checked"':''; ?> name="mode_of_transport" value="Personel Vehicle" style="margin-left: -22px;">Personel Vehicle
                                    <label for="contactChoice2" style="padding-left: 30px;">
                                    </label>

                                    <input type="radio" id="contactChoice3" <?php echo (isset($siblingdetail['mode_of_transport'])&&$siblingdetail['mode_of_transport']=="Private Van")?'checked="checked"':''; ?> name="mode_of_transport" value="Private Van" style="margin-left: -22px;">Private Van
                                    <label for="contactChoice3" style="padding-left: 30px;">
                                    </label>

                                    <input type="radio" id="contactChoice3" <?php echo (isset($siblingdetail['mode_of_transport'])&&$siblingdetail['mode_of_transport']=="On Footer")?'checked="checked"':''; ?> name="mode_of_transport" value="On Footer" style="margin-left: -22px;">On Footer
                                    <label for="contactChoice3" style="padding-left: 30px;">
                                    </label>
                                  </div>
                                  <!-- </form> -->
                                </div>
                              </div>
                            </div>





                            <div class="row">
                              <div class="col-md-6">
                                <div class="row">
                                  <div class="col-md-6">
                                    <p style="font-style: normal;margin-top: 20px;"><strong>Transferred From Other State/country</strong></p>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <!-- <form> -->
                                        <div class="newform" style="margin-left: 100px; margin-top: 20px;">
                                          <input type="radio" id="contactChoice1" name="tranferred_from_other_state" value="Yes" <?php echo (isset($siblingdetail['tranferred_from_other_state'])&&$siblingdetail['tranferred_from_other_state']=="Yes")?'checked="checked"':''; ?> style="margin-left: -22px;">Yes
                                          <label for="contactChoice1" style="padding-left: 30px;">
                                          </label>

                                          <input type="radio" id="contactChoice2" name="tranferred_from_other_state" value="no" <?php echo (isset($siblingdetail['tranferred_from_other_state'])&&$siblingdetail['tranferred_from_other_state']=="no")?'checked="checked"':''; ?> style="margin-left: -22px;">No
                                          <label for="contactChoice2" style="padding-left: 30px;">
                                          </label>

                                        </div>
                                        <!-- </form> -->
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="group">      
                                    <input class="inputMaterial" type="text" value="<?php echo isset($siblingdetail['tranferred_from_other_state_time'])?$siblingdetail['tranferred_from_other_state_time']:''; ?>" name="tranferred_from_other_state_time">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>If Yes,Then When?</label>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="group">      
                                    <input class="inputMaterial" type="text" value="<?php echo isset($siblingdetail['tranferred_from_other_state_place'])?$siblingdetail['tranferred_from_other_state_place']:''; ?>" name="tranferred_from_other_state_place" >
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>If Yes,Which State/country</label>
                                  </div>
                                </div>
                              </div>


                              <div class="row">
                                <div class="col-md-6">
                                  <div class="group">      
                                    <input class="inputMaterial" type="text" value="<?php echo isset($siblingdetail['previous_school'])?$siblingdetail['previous_school']:''; ?>" name="previous_school">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Name of Previous School(if any)/Play School Attended By The Child?</label>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="group">      
                                    <input class="inputMaterial" type="text" value="<?php echo isset($siblingdetail['previous_school_address'])?$siblingdetail['previous_school_address']:''; ?>" name="previous_school_address" >
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Address of the School/Play School</label>
                                  </div>
                                </div>

                              </div>

                              <div class="row">
                                <div class="col-md-3">
                                  <p style="font-style: normal;margin-top: 20px;"><strong>Child Living With Whom</strong></p>
                                </div>
                                <div class="col-md-9">
                                  <div class="form-group">
                                    <!-- <form> -->
                                      <div class="newform" style="margin-left: 100px; margin-top: 20px;">
                                        <input type="radio" id="contactChoice1" <?php echo (isset($siblingdetail['child_living_with'])&&$siblingdetail['child_living_with']=="Both Parents")?'checked="checked"':''; ?> name="child_living_with" value="Both Parents" style="margin-left: -22px;">Both Parents
                                        <label for="contactChoice1" style="padding-left: 30px;">
                                        </label>

                                        <input type="radio" id="contactChoice2" <?php echo (isset($siblingdetail['child_living_with'])&&$siblingdetail['child_living_with']=="Father")?'checked="checked"':''; ?> name="child_living_with" value="Father" style="margin-left: -22px;">Father
                                        <label for="contactChoice2" style="padding-left: 30px;">
                                        </label>

                                        <input type="radio" id="contactChoice3" <?php echo (isset($siblingdetail['child_living_with'])&&$siblingdetail['child_living_with']=="Mother")?'checked="checked"':''; ?> name="child_living_with" value="Mother" style="margin-left: -22px;">Mother
                                        <label for="contactChoice3" style="padding-left: 30px;">
                                        </label>

                                        <input type="radio" id="contactChoice3" <?php echo (isset($siblingdetail['child_living_with'])&&$siblingdetail['child_living_with']=="Guardian")?'checked="checked"':''; ?> name="child_living_with" value="Guardian" style="margin-left: -22px;">Guardian
                                        <label for="contactChoice3" style="padding-left: 30px;">
                                        </label>
                                      </div>
                                      <!-- </form> -->
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-3">
                                    <p style="font-style: normal;margin-top: 20px;"><strong>Is This Your First Child</strong></p>
                                  </div>
                                  <div class="col-md-9">
                                    <div class="form-group">
                                      <!-- <form> -->
                                        <div class="newform" style="margin-left: 100px; margin-top: 20px;">
                                          <input type="radio" id="contactChoice1" <?php echo (isset($siblingdetail['is_first_child'])&&$siblingdetail['is_first_child']=="yes")?'checked="checked"':''; ?> name="is_first_child" value="yes" style="margin-left: -22px;">Yes
                                          <label for="contactChoice1" style="padding-left: 30px;">
                                          </label>

                                          <input type="radio" id="contactChoice2" <?php echo (isset($siblingdetail['is_first_child'])&&$siblingdetail['is_first_child']=="no")?'checked="checked"':''; ?> name="is_first_child" value="no" style="margin-left: -22px;">No
                                          <label for="contactChoice2" style="padding-left: 30px;">
                                          </label>
                                        </div>
                                        <!-- </form> -->
                                      </div>
                                    </div>
                                  </div>

                    <div class="multi-field-wrapper">
                  <div class="row">
                    <a href="#" class="add-field" style="padding-left: 45px; font-size: 25px; text-decoration: none;"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp&nbsp&nbsp Add Siblings</a>
                  </div>
                       <?php if(mysqli_num_rows($multisiblings)>0){ 
                            while($multisibling=mysqli_fetch_assoc($multisiblings)){
                           ?>
                    <div class="multi-fields">
                      <div class="multi-field">

                                  <div class="row">
                                    <div class="col-md-4">
                                      <div class="group">      
                                        <input class="inputMaterial" value="<?php echo isset($multisibling['sibling_name'])?$multisibling['sibling_name']:''; ?>" name="sibling_name[]" type="text" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Full Name of Sibling</label>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p style="font-style: normal;margin-top: 20px;"><strong>Gender</strong></p>
                                        </div>
                                        <div class="col-md-9">
                                          <div class="form-group">
                                            <!-- <form> -->
                                              <div class="newform" style="margin-left: 100px; margin-top: 20px;">
                                                <input type="radio" id="contactChoice1" <?php echo (isset($multisibling['sibling_gender'])&&$multisibling['sibling_gender']=="Boy")?'checked="checked"':''; ?> name="sibling_gender[]" value="Boy" style="margin-left: -22px;">Boy
                                                <label for="contactChoice1" style="padding-left: 30px;">
                                                </label>

                                                <input type="radio" id="contactChoice2" name="sibling_gender[]" value="Girl" <?php echo (isset($multisibling['sibling_gender'])&&$multisibling['sibling_gender']=="Girl")?'checked="checked"':''; ?> style="margin-left: -22px;">Girl
                                                <label for="contactChoice2" style="padding-left: 30px;">
                                                </label>
                                              </div>
                                              <!-- </form> -->
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div id="sandbox-container">
                                          <div class="group">      
                                            <input type="text" name="sibling_dob[]"  value="<?php echo isset($multisibling['sibling_dob'])?$multisibling['sibling_dob']:''; ?>" class="inputMaterial" />
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Date of birth</label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="group">      
                                          <input class="inputMaterial" name="school_attending[]" value="<?php echo isset($multisibling['sibling_name'])?$multisibling['sibling_name']:''; ?>" type="text" >
                                          <span class="highlight"></span>
                                          <span class="bar"></span>
                                          <label>School Attending</label>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="group">      
                                          <input class="inputMaterial" name="class[]" value="<?php echo isset($multisibling['sibling_name'])?$multisibling['sibling_name']:''; ?>" type="text" >
                                          <span class="highlight"></span>
                                          <span class="bar"></span>
                                          <label>Class</label>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="group">      
                                          <input class="inputMaterial" name="section[]" value="<?php echo isset($multisibling['section'])?$multisibling['section']:''; ?>" type="text" >
                                          <span class="highlight"></span>
                                          <span class="bar"></span>
                                          <label>Section</label>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="group">      
                                          <input class="inputMaterial" value="<?php echo isset($multisibling['admission_number'])?$multisibling['admission_number']:''; ?>" name="admission_number[]" type="text" required>
                                          <span class="highlight"></span>
                                          <span class="bar"></span>
                                          <label>Admission Number</label>
                                        </div>
                                      </div>
                                    </div>
                                    <button type="button" class="remove-field" style="width: 100px;background: none;color: black;padding-top: -21px;margin-top: -44px;margin-left: 0px;">Remove</button>
                                     </div>
                                    </div>
                                    <?php } }else{ ?>
                                     <div class="multi-fields">
                      <div class="multi-field">

                                  <div class="row">
                                    <div class="col-md-4">
                                      <div class="group">      
                                        <input class="inputMaterial" value="<?php echo isset($multisibling['sibling_name'])?$multisibling['sibling_name']:''; ?>" name="sibling_name[]" type="text" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Full Name of Sibling</label>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p style="font-style: normal;margin-top: 20px;"><strong>Gender</strong></p>
                                        </div>
                                        <div class="col-md-9">
                                          <div class="form-group">
                                            <!-- <form> -->
                                              <div class="newform" style="margin-left: 100px; margin-top: 20px;">
                                                <input type="radio" id="contactChoice1" <?php echo (isset($multisibling['sibling_gender'])&&$multisibling['sibling_gender']=="Boy")?'checked="checked"':''; ?> name="sibling_gender[]" value="Boy" style="margin-left: -22px;">Boy
                                                <label for="contactChoice1" style="padding-left: 30px;">
                                                </label>

                                                <input type="radio" id="contactChoice2" name="sibling_gender[]" value="Girl" <?php echo (isset($multisibling['sibling_gender'])&&$multisibling['sibling_gender']=="Girl")?'checked="checked"':''; ?> style="margin-left: -22px;">Girl
                                                <label for="contactChoice2" style="padding-left: 30px;">
                                                </label>
                                              </div>
                                              <!-- </form> -->
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div id="sandbox-container">
                                          <div class="group">      
                                            <input type="text" name="sibling_dob[]"  value="<?php echo isset($multisibling['sibling_dob'])?$multisibling['sibling_dob']:''; ?>" class="inputMaterial" />
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Date of birth</label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="group">      
                                          <input class="inputMaterial" name="school_attending[]" value="<?php echo isset($multisibling['sibling_name'])?$multisibling['sibling_name']:''; ?>" type="text" >
                                          <span class="highlight"></span>
                                          <span class="bar"></span>
                                          <label>School Attending</label>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="group">      
                                          <input class="inputMaterial" name="class[]" value="<?php echo isset($multisibling['sibling_name'])?$multisibling['sibling_name']:''; ?>" type="text" >
                                          <span class="highlight"></span>
                                          <span class="bar"></span>
                                          <label>Class</label>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="group">      
                                          <input class="inputMaterial" name="section[]" value="<?php echo isset($multisibling['sibling_name'])?$multisibling['sibling_name']:''; ?>" type="text" >
                                          <span class="highlight"></span>
                                          <span class="bar"></span>
                                          <label>Section</label>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="group">      
                                          <input class="inputMaterial" value="<?php echo isset($multisibling['admission_number'])?$multisibling['admission_number']:''; ?>" name="admission_number[]" type="text" required>
                                          <span class="highlight"></span>
                                          <span class="bar"></span>
                                          <label>Admission Number</label>
                                        </div>
                                      </div>
                                    </div>
                                    <button type="button" class="remove-field" style="width: 100px;background: none;color: black;padding-top: -21px;margin-top: -44px;margin-left: 0px;">Remove</button>
                                     </div>
                                    </div>
                                    <?php } ?>

                                 <!--rohit-->   
                                </div><hr>
                                <button id="btnsiblingsub" class="nextBtn" type="submit">Submit</button>
                                </div>
                                </div>
                                </div>
                              </div>

                              </form>

                          <form method="post" id="frmdocument" enctype="multipart/form-data">

                            <input type="hidden" name="formdocument" value="formdocument">
                            <div class="row setup-content " id="step6">
                              <div class="col-md-8 col-md-offset-2">
                                <div class="col-md-12">
                                  <h3 style="text-align: center;"> Upload Documents</h3>
                                  <div class="box">

                                    <div class="row">
                                      <div class="col-md-2">
                                        <div class="from1" >
                                          <input type="file" name="child_photo">
                                          <p>Child's Photograph</p>
                                          <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                          <!--  <button type="submit">Upload</button> -->
                                        </div>  
                                      </div>
                                      <div class="col-md-2">
                                        <div class="from1" >
                                          <input type="file" name="father_photo" >
                                          <p>Father's/Guardian's Photograph</p>
                                          <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                          <!--  <button type="submit">Upload</button> -->
                                        </div>  
                                      </div>
                                      <div class="col-md-2">
                                        <div class="from1" >
                                          <input type="file" name="mother_photo" >
                                          <p>Mother's/Guardian's Photograph</p>
                                          <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                          <!--  <button type="submit">Upload</button> -->
                                        </div>  
                                      </div>
                                      <div class="col-md-2">
                                        <div class="from1" >
                                          <input type="file" name="family_photograph" >
                                          <p>Family Photograph</p>
                                          <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                          <!--  <button type="submit">Upload</button> -->
                                        </div>  
                                      </div>
                                      <div class="col-md-2">
                                        <div class="from1" >
                                          <input type="file" name="address_proof[]" multiple>
                                          <p>Address Proof</p>
                                          <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                          <!--  <button type="submit">Upload</button> -->
                                        </div>  
                                      </div>
                                      <div class="col-md-2">
                                        <div class="from1" >
                                          <input type="file" name="child_birth_certificate[]" multiple>
                                          <p>Birth Certificate of Child</p>
                                          <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                          <!--  <button type="submit">Upload</button> -->
                                        </div>  
                                      </div>

                                    </div> 

                                    <div class="row">

                                      <div class="col-md-2">
                                        <div class="from1" >
                                          <input type="file" name="child_medical_certificate[]" multiple>
                                          <p>Medical Certificate of child</p>
                                          <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                          <!--  <button type="submit">Upload</button> -->
                                        </div>  
                                      </div>
                                      <div class="col-md-2">
                                        <div class="from1" >
                                          <input type="file" name="child_adhar_card[]" multiple>
                                          <p>Child's Aadhar Card</p>
                                          <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                          <!--  <button type="submit">Upload</button> -->
                                        </div>  
                                      </div>
                                      <div class="col-md-2">
                                        <div class="from1" >
                                          <input type="file" name="father_adhar_card[]" multiple>
                                          <p>Father's Aadhar Card</p>
                                          <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                          <!--  <button type="submit">Upload</button> -->
                                        </div>  
                                      </div>
                                      <div class="col-md-2">
                                        <div class="from1" >
                                          <input type="file" name="mother_adhar_card[]" multiple>
                                          <p>Mother's Aadhar Card</p>
                                          <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                          <!--  <button type="submit">Upload</button> -->
                                        </div>  
                                      </div>
                                    </div><hr style="border-color:rgb(11,44,89);">




                                    <div class="col-md-12">

                                      <div class="col-md-6">
                                        <div class="row">
                                          <h3 class="text-center">Alumni Father</h3>
                                        </div>
                                        <table class="document1"> 
                                          <tr>
                                            <td> 
                                              <div class="from1" >
                                                <input type="file" name="alumni_father_cbse_12_passing[]" multiple>
                                                <p> CBSE XII Passing Certificate</p>
                                                <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                <!--  <button type="submit">Upload</button> -->
                                              </div>
                                            </td>
                                            <td>
                                              <div class="from1" >
                                                <input type="file" name="alumni_father_cbse_12_marksheet[]" multiple>
                                                <p> CBSE XII Marksheet </p>
                                                <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                <!--  <button type="submit">Upload</button> -->
                                              </div>
                                            </td>

                                          </tr>
                                        </table>
                                      </div>

                                      <div class="col-md-6">
                                        <div class="row">
                                          <h3 class="text-center">Alumni Mother</h3>
                                        </div>
                                        <table class="document1"> 
                                          <tr>
                                            <td> 
                                              <div class="from1" >
                                                <input type="file" name="alumni_mother_cbse_12_passing[]" multiple>
                                                <p>CBSE XII Passing Certificate</p>
                                                <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                <!--  <button type="submit">Upload</button> -->
                                              </div>
                                            </td>
                                            <td>
                                              <div class="from1" >
                                                <input type="file" name="alumni_mother_cbse_12_marksheet[]" multiple>
                                                <p>CBSE XII Marksheet</p>
                                                <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                <!--  <button type="submit">Upload</button> -->
                                              </div>
                                            </td>

                                          </tr>
                                        </table>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="col-md-6">
                                        <div class="row">
                                          <h3 class="text-center">Sibling</h3>
                                        </div>
                                        <table class="document1"> 
                                          <tr>
                                            <td> 
                                              <div class="from1" >
                                                <input type="file" name="latest_school_id_card[]" multiple="" >
                                                <p>Latest School ID Card</p>
                                                <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                <!--  <button type="submit">Upload</button> -->
                                              </div>
                                            </td>
                                            <td>
                                              <div class="from1" >
                                                <input type="file" name="latest_fee_receipt[]" multiple="">
                                                <p>Latest Fee Receipt</p>
                                                <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                <!--  <button type="submit">Upload</button> -->
                                              </div>
                                            </td>

                                          </tr>
                                        </table>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="row">
                                          <h3 class="text-center">Single Parent</h3>
                                        </div>
                                        <table class="document1"> 
                                          <tr>
                                            <td> 
                                              <div class="from1" >
                                                <input type="file" name="death_certificate" >
                                                <p>Death Certificate (issued by MCD or equivalent authority)/ Divorce Decree</p>
                                                <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                <!--  <button type="submit">Upload</button> -->
                                              </div>
                                            </td>
                                          </tr>
                                        </table>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="col-md-6">
                                        <div class="row">
                                          <h3 class="text-center">Christain/ Catholic</h3>
                                        </div>
                                        <table class="document1"> 
                                          <tr>
                                            <td> 
                                              <div class="from1" >
                                                <input type="file" name="letter_of_parish_priest" >
                                                <p>Letter of the Parish Priest/ Pastor</p>
                                                <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                <!--  <button type="submit">Upload</button> -->
                                              </div>
                                            </td>
                                            <td>
                                              <div class="from1" >
                                                <input type="file" name="baptism_certificate" multiple>
                                                <p>Baptism Certificate/ Dedication Certificate</p>
                                                <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                <!--  <button type="submit">Upload</button> -->
                                              </div>
                                            </td>

                                          </tr>
                                        </table>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="row">
                                          <h3 class="text-center">Defence/ Martyr</h3>
                                        </div>
                                        <table class="document1"> 
                                          <tr>
                                            <td> 
                                              <div class="from1" >
                                                <input type="file" name="certificate_of_department" multiple>
                                                <p>I- Card or Certificate of Department</p>
                                                <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                <!--  <button type="submit">Upload</button> -->
                                              </div>
                                            </td>
                                          </tr>
                                        </table>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="col-md-6">
                                        <div class="row">
                                          <h3 class="text-center">Staff Mother </h3>
                                        </div>
                                        <table class="document1"> 
                                          <tr>
                                            <td> 
                                              <div class="from1" >
                                                <input type="file" name="staff_mother_id_card" multiple>
                                                <p>ID Card</p>
                                                <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                <!--  <button type="submit">Upload</button> -->
                                              </div>
                                            </td>
                                          </tr>
                                        </table>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="row">
                                          <h3 class="text-center"> Staff Father</h3>
                                        </div>
                                        <table class="document1"> 
                                          <tr>
                                            <td> 
                                              <div class="from1" >
                                                <input type="file" name="staff_father_id_card" multiple>
                                                <p>ID Card</p>
                                                <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                <!--  <button type="submit">Upload</button> -->
                                              </div>
                                            </td>
                                          </tr>
                                        </table>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="col-md-6">

                                        <table class="document1"> 
                                          <tr>
                                            <td> 
                                              <div class="from1" >
                                                <input type="file" name="transfer_certificate_previous_school" multiple>
                                                <p> Transfer Certificate (Previous School)</p>
                                                <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                <!--  <button type="submit">Upload</button> -->
                                              </div>
                                            </td>
                                          </tr>
                                        </table>
                                      </div>
                                      <div class="col-md-6">

                                        <table class="document1"> 
                                          <tr>
                                            <td> 
                                              <div class="from1" >
                                                <input type="file" name="transfercertificate" multiple>
                                                <p>Transfer Certificate (State/ Country)</p>
                                                <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                <!--  <button type="submit">Upload</button> -->
                                              </div>
                                            </td>
                                          </tr>
                                        </table>
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <script type="text/javascript">
                                      $(document).ready(function(){
                                        $('.from1 input').change(function () {
                                          $('.from1 p').text(this.files.length + " file(s) selected");
                                        });
                                      });
                                    </script>



                                    <button id="btnuploaddoc" class="nextBtn" name="btnsubform" type="submit">Submit</button>
                                  </div>
                                  <!--  <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button> -->
                                </div>
                              </div>
                            </div> 
                          </form>
                          </div>

                          <script language="javascript">
populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
populateCountries("country2");
populateCountries("country2");
</script>

<?php include 'footer.php'; ?>
<script>
$(document).ready(function(){
  $('#btnregisterdata').click(function(){
    //$('#frmaddress').submit();
    // alert("dsds");
    if($("#frmaddress").valid())
    {
      $('#frmaddress').submit();
    }else{
      alert("please fill the required filled");
    }
  });

  $('#btnsubmitchild').click(function(){
    //$('#frmaddress').submit();
    // alert("dsds");
    if($("#frmchildapplication").valid())
    {
      $('#frmchildapplication').submit();
    }else{
      alert("please fill the required filled");
    }
  });

  $('#btnfatherform').click(function(){
    //$('#frmaddress').submit();
    // alert("dsds");
    if($("#frmfather").valid())
    {
      $('#frmfather').submit();
    }else{
      alert("please fill the required filled");
    }
  });

   $('#btnmothersub').click(function(){
    //$('#frmaddress').submit();
    // alert("dsds");
    if($("#frmmother").valid())
    {
      $('#frmmother').submit();
    }else{
      alert("please fill the required filled");
    }
  });

    $('#btnsiblingsub').click(function(){
    //$('#frmaddress').submit();
    // alert("dsds");
    if($("#frmsibling").valid())
    {
      $('#frmsibling').submit();
    }else{
      alert("please fill the required filled");
    }
  });

  $('#btnuploaddoc').click(function(){
    if(confirm("If you submit this form then you cann't update further.")){
      if($("#frmdocument").valid())
      {
        $('#frmdocument').submit();
      }else{
        alert("please fill the required filled");
      }
    }
    
  });
  /*$('#btnregisterdata').click(function(){ btnuploaddoc
    //$('#step-1').hide();
    var addressform=$('#frmaddress').serialize();
    //alert(addressform);
    $.ajax({
        type:'post',
        url:'ajax_address_form.php',
        data:addressform,
        dataType:'json',
        success:function(res){
          alert(res.data);
          if(res.status=="success")
          {
           
            jQuery('#step-2').removeClass('displayform');
            jQuery('#step-1').addClass('displayform');

          }
        }
    });
  });*/

});
</script>
<script type="text/javascript">
$(function() {

  // Dynamically add/remove inputs for any field[]'s
  $('.multi-field-wrapper').each(function() {
    var $wrapper = $('.multi-fields', this);
    // Add button
    $(".add-field", $(this)).click(function(e) {
      $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('input').val('').focus();
    });
    // Remove buttons
    $('.multi-field .remove-field', $wrapper).click(function() {
      if ($('.multi-field', $wrapper).length > 1)
        $(this).parent('.multi-field').remove();
    });
  });

});
</script>