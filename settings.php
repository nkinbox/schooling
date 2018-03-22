<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Schoolling | Settings </title>
<?php include('newheader.php');
  
 ?>
<style type="text/css">
  .setting-ul .fa{color: #000 !important;}
</style>

 <div class="page-section" style=" height: 150px;    margin-top: 84px; background-color:rgb(242,242,242);">

 	<img src="assets/images/setting1.png" style="    height: 120px;
    width: 120px;
    /* padding-top: 10px; */
    margin-top: 35px;
    margin-left: 14px;" alt="schoolling">
       <img src="assets/images/setting2.png" style="    height: 98px;
    width: 108px;
    float: right;
    margin-right: 20px;
    margin-top: 52px;" alt="schoolling">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-page-title">
             <!--  <img src="assets/images/cart-open.png" style="height: 100px;margin-top:-87px;">  
                   
                    <img src="assets/images/cart-right.png" style="height: 51px;margin-left: -65px;padding-top: 22px;"> -->
                        <h1 style="color: rgb(11,44,99) !important; text-transform: capitalize !important;margin-top: -95px;">Settings<img src="assets/images/rocket.png" style="height: 80px; position: absolute; top: -120px;right: 436px;" alt="schoolling"></h1>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php  



    ?>
<section id="setting">
	<div class="container">
		<div class="row">
			<div class="lineout">
			<!-- 	<div class="profile-img">
					<img src="assets/images/setting-profile.png">
					<h5 class="h3edit"><a href="edit-profile.php" target="_blank">Edit Profile</a></h5>
					<h3 class="h3name">Full Name</h3>
				</div> -->
				<ul class="setting-ul">

					<a href="" data-toggle="modal" data-target="#myModal"><li class="setting-li"><!-- <a href="" data-toggle="modal" data-target="#myModal">Change Password</a> -->Change Password<i class="fa fa-caret-right" aria-hidden="true" style="margin-top: -13px;"></i></li></a>

				<!-- 	<a href="" data-toggle="modal" data-target="#myModal1"><li class="setting-li">Notifications<i class="fa fa-caret-right" aria-hidden="true" style="margin-top: -13px;"></i></li></a> -->

					<!-- <a href="" style="color: rgb(235,121,35) !important;"><li class="setting-li setting-li1">Invite Friends To Join Schoolling<i class="fa fa-caret-right" aria-hidden="true" style="margin-top: -13px;"></i></li></a> -->

					<a href="https://www.google.co.in/search?q=schoolling&rlz=1C1CHBF_enIN771IN771&oq=sch&aqs=chrome.0.69i59j69i60l4j69i57.1342j0j7&sourceid=chrome&ie=UTF-8#lrd=0x390d0274f1d58e73:0x19df3ac38a31242e,1,,," style="color: rgb(235,121,35) !important;" target="_blank"><li class="setting-li">Like Us? Write a Review On Google<i class="fa fa-caret-right" aria-hidden="true" style="margin-top: -13px;"></i></li></a>

					<!-- <li class="setting-li"><a href="" style="color: rgb(235,121,35) !important;">Contact Us</a><i class="fa fa-caret-right" aria-hidden="true" style="margin-top: -13px;"></i></li> -->

					<a href="images/Terms of Service Agreement_Schoolling.pdf" data-toggle="modal" data-target="#myModal2" style="color: rgb(235,121,35) !important;"  target="_blank"><li class="setting-li setting-li2" >Request a Call<i class="fa fa-caret-right" aria-hidden="true" style="margin-top: -13px;"></i></li></a>
           <?php  $pages=$GFH_Admin->getActivePages('5'); 
            if(mysqli_num_rows($pages)>0){
            while($page=mysqli_fetch_assoc($pages)){
           ?>
					<a href="images/page/<?php echo isset($page['page_image'])?$page['page_image']:'';  ?>" target="_blank"><li class="setting-li"><?php echo isset($page['page_name'])?$page['page_name']:'';  ?><i class="fa fa-caret-right" aria-hidden="true" style="margin-top: -13px;"></i></li></a>
          <?php } } ?>
<!-- 
					<a href="images/Terms of Service Agreement_Schoolling.pdf" data-toggle="modal" data-target="#myModal3" target="_blank"><li class="setting-li">Terms Of Service Agreements<i class="fa fa-caret-right" aria-hidden="true" style="margin-top: -13px;"></i></li></a>
					
          <a href="images/Disclaimer_Schoolling.pdf" target="_blank"><li class="setting-li">Disclaimer</a><i class="fa fa-caret-right" aria-hidden="true" style="margin-top: -13px;"></i></li></a>

					<a href="images/About Us_Schoolling.pdf" target="_blank"><li class="setting-li">About Us<i class="fa fa-caret-right" aria-hidden="true" style="margin-top: -13px;"></i></li></a>
					<a href="images/Refund_Cancellation Policy_Schoolling.pdf" target="_blank"><li class="setting-li">Refund/Cancellation Policy<i class="fa fa-caret-right" aria-hidden="true" style="margin-top: -13px;"></i></li></a> -->

          <li class="setting-li setting-li3"><a href="logout.php" style="margin-left: 265px; color: rgb(235,121,35) !important;">Log Out</a></li>
				</ul>


			</div>
		</div>
	</div>
</section>

 		<!-- Change Password POPUP -->

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="row">
		<div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default" style="margin-top: 215px;">
              <div class="panel-body">
              	<div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
                <div class="text-center">
               <!--   <h3><i class="fa fa-lock fa-4x"></i></h3> 
                  <h2 class="text-center">Change Password?</h2> -->
                  <!-- <p>You can reset your password here.</p>  -->
                  <div class="panel-body">
    
                 <form  method="post" id="frmchangepass">
                      <div class="form-group">
                        <div class="input-group">
                          <input  name="oldpassword" id="oldpassword" placeholder="Enter Old Password" class="form-control"  type="password" required="" style="border: 1px solid ;border-radius: 10px;text-align: center;">
                          <br>
                          <span id="errorold"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <input  name="newpassword" id="newpassword" required="" placeholder="Enter New Password" class="form-control"  type="password" style="border: 1px solid ;border-radius: 10px;text-align: center;">
                          <br>
                          <span id="errornew"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <input  name="cnfpassword" id="cnfpassword" required="" placeholder=" Confirm Password" class="form-control"  type="password" style="border: 1px solid ;border-radius: 10px;text-align: center;">
                          <br>
                          <span id="errorcnf"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <input name="recover-submit" name="btnchangepass" id="btnchangepass" class="btn btn-lg btn-primary btn-block btn-set" value="Save" type="button">
                      </div>
                      <style type="text/css">
                        .btn-set{background: rgb(235,121,35);border-color: rgb(235,121,35)}
                        .btn-set:hover{background: rgb(11,44,89);border-color:rgb(11,44,89) }
                      </style>
                      
                      <!-- <input type="hidden" class="hide" name="token" id="token" value="">  -->
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
   
      
    </div>
</div>
		<!-- End Change Password POPUP -->

		<!-- Change Notification popup -->


<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!-- <h4 class="modal-title">Modal Header</h4> -->
      </div>
      <div class="modal-body">
        <p class="text-center">Turn on all notifications
        	<label class="ckb1">
                <input type="checkbox" value="b" /><i></i>
            </label>
        </p>
      </div>
     <!--  <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>

  </div>
</div>
		<!-- End Notifications -->

		<!-- Request a call POPUP -->

<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
        <div class="row">
		<div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default" style="margin-top: 215px;">
              <div class="panel-body">
              	<div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
                <div class="text-center">
               <!--   <h3><i class="fa fa-lock fa-4x"></i></h3> 
                  <h2 class="text-center">Change Password?</h2> -->
                  <!-- <p>You can reset your password here.</p>  -->
                  <div class="panel-body">
    
                    <form  method="post">

                      <div class="form-group">
                        <div class="input-group">
                          <input id="Phone" name="Number" placeholder="Enter Mobile Number" class="form-control"  type="number" style="border: 1px solid ;border-radius: 10px;text-align: center;">
                        </div>
                        <br>
                          <span id="errorphone"></span>

                      </div>

                      <div class="form-group">
                        <input name="recover-submit" id="btnrequestcall" class="btn btn-lg btn-primary btn-block btn-set" value="Request a call" type="button">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
   
      
    </div>
</div>


		<!-- End Request a call -->

		<!-- terms and conditions popup-->

		<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!-- <h4 class="modal-title">Modal Header</h4> -->
      </div>
      <div class="modal-body">
        <p class="text-center">Terms Of Service Agreements</p>
        <p>
        	1)      Users cannot edit the Common Admission Form once submitted to Schoolling & it must be filled and submitted within 72 hours of payment.<br>

2)      Any sort of double registration (through Schoolling or otherwise) / rendering false information on the part of the users will be subject to immediate cancellation from the school.<br>

3)      Registration fee is non-refundable. The service fee that we charge is inclusive of the school specific registration fees i.e. DD submission, registration cost etc. (If/when applicable).<br>

4)      Users are obligated to comply with the process of Schoolling as the team via phone, email or SMS for processing related query may contact them.<br>

5)      Our services do not guarantee admission. If selected, the child's parents must adhere to the rules of admission of the schools that they have applied to.<br>

6)      One email I.D./ Mobile Number can only be used for a single child. User must use a different email I.D./ Mobile for a new applicant.<br>

7)      We are only providing services for admission in nursery, which also means that the child should be 3+ of age as on 31st March 2018. Also In regards to the EWS/DG category, the Govt. of Delhi already has measures in place to assist parents during the admission process of a child. We request you refer to the same.<br>

8)      The process of admission will commence only after the guidelines are provided by the D.O.E.<br>

 

I have acknowledged & accepted all the above conditions before making payment to <a href="www.schoolling.com">Schoolling </a> & its <a href="www.schoolling.com">privacy policy</a>.<br>

Regards<br>
Team Schoolling
        </p>
      </div>
     <!--  <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>

  </div>
</div>

		<!-- end terms and conditions -->

<?php include('footer.php'); ?>
<script>
  $(document).ready(function(){
    $('#btnchangepass').click(function(){
      // var fromdata=$('#frmchangepass').serialize();


        var oldpassword=$('#oldpassword').val();
        var newpassword=$('#newpassword').val();
        var cnfpassword=$('#cnfpassword').val();
        // alert(oldpassword);

        if(oldpassword.length==0)
        {
          $('#errorold').text("Please enter the old password");
          return false;
        }else{
          $('#errorold').text(" ");
        }


         if(newpassword.length==0)
        {
          $('#errornew').text("Please enter the new password");
          return false;
        }else{
          $('#errornew').text(" ");
        }



        if(cnfpassword.length==0)
        {
          $('#errorcnf').text("Please confirm the password");
          return false;
        }else{
          $('#errorcnf').text(" ");
        }

        if(newpassword!==cnfpassword)
        {
          $('#errorcnf').text("Passwords do not match");
          return false;
        
        }else{

           
           $('#errorcnf').text(" ");
             $.ajax({
            type:"POST",
            url:"ajax_change_password.php",
            data:{'oldpassword':oldpassword,'newpassword':newpassword},
            dataType:'json',
            success: function(data1){
             if(data1.status=="sucess")
             {
              alert(data1.msg);
               window.location.href="";
             }else{
              alert(data1.msg);
             }
          
            }
        });
        }
   
      
    });

    $('#btnrequestcall').click(function(){
        var phone=$('#Phone').val();
        if(phone=="")
        {

          $('#errorphone').text("Please Enter Mobile Number");
          return false;
        }else{
           $.ajax({
            type:"POST",
            url:"ajax_change_password.php",
            data:{'phone':phone},
            dataType:'json',
            success: function(resp){
                
             if(resp.status=="sucess")
             {
              alert(resp.msg);
               window.location.href="";
             }else{
              alert(resp.msg);
             }
          
            }
        });
        }
    });
  });
</script>