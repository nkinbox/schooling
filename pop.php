<?php  require_once('Facebook/autoload.php');
require_once ('Google/autoload.php');
@session_start();
 /*     Google login start            */
   //require_once ('Google/autoload.php');
  $client_id = '707617286750-f0n7g3aj5v5ihnfjoi6iihmrus8dgb7q.apps.googleusercontent.com'; 
                $client_secret = '5VPbjUJiQCjqPtjcptOKaGqF';
                $redirect_uri ="https://schoolling.com/index1.php";


                $client = new Google_Client();
                $client->setClientId($client_id);
                $client->setClientSecret($client_secret);
                $client->setRedirectUri($redirect_uri);
                $client->addScope("email");
                $client->addScope("profile");
                $service = new Google_Service_Oauth2($client);
    /*     Google login end            */


 $fb = new Facebook\Facebook([
  'app_id' => '199274320631358', // Replace {app-id} with your app id
  'app_secret' => '46f987ba0dad1edd02edd681d54bfaec',
  'default_graph_version' => 'v2.11',
  ]);
  
  $helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://www.schoolling.com/fb-callback.php', $permissions);
 


    
 /*     facebook login end            */
 
  
              

 ?>
<nav class="social1">
    <ul>
        <li><a href="#">Twitter <i class="fa fa-twitter"></i></a></li>
        <li><a href="#">Facebook <i class="fa fa-facebook"></i></a></li>
        <li><a href="#">Dribbble <i class="fa fa-dribbble"></i></a></li>
        <li><a href="#">Behance <i class="fa fa-behance"></i></a></li>
    </ul>
</nav>
<div class="cs-modal">
    <div class="modal fade" id="cs-signup" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <h4>Create Account</h4>

                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Email-Id</a></li>
                     <!--    <li><a data-toggle="tab" href="#menu1">Mobile Number</a></li> -->

                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="cs-login-form">
                                <form id="frmregister" method="post">

                                    <span id="frmerror"></span>
                                    <div class="input-holder">
                                        <label class="has-error" for="cs-username">
                                            <strong>Email Id</strong>
                                            <i class="icon-add-user"></i>
                                            <input type="text" class="" name="email" id="email" placeholder="Enter Email-Id">
                                            <span id="emailerror"></span>
                                        </label>
                                    </div>
                                    <div class="input-holder">
                                        <label for="cs-login-password">
                                            <strong>Password</strong>
                                            <i class="icon-lock"></i>
                                            <input type="password" name="password" id="password" placeholder="******">
                                             <span id="passworderror"></span>
                                        </label>
                                    </div>
                                    <div class="input-holder">
                                        <label for="cs-confirm-password">
                                            <strong>confirm password</strong>
                                            <i class="icon-lock"></i>
                                            <input type="password" name="cpassword" id="cpassword" placeholder="******">
                                             <span id="cpassworderror"></span>
                                        </label>
                                    </div>
                                    <div class="input-holder">
                                    <input class="cs-color csborder-color rohit" type="button" id="btnsubemail" value="Create Account">
                                    </div>
                                </form>
                            </div>
                        </div>



                            <div id="menu1" class="tab-pane fade">
                                <div class="cs-login-form">

                                    <form>
                                    <span id="mobileerror"></span>
                                        <div class="input-holder">
                                            <label class="has-error" for="cs-username">
                                                <strong>Mobile Number</strong>
                                                <i class="icon-add-user"></i>
                                                <input type="number" class="" style="font-size:14px;" id="mobile" name="mobile" placeholder="Enter Mobile Number">
                                            </label>
                                        </div>
                                        <div class="input-holder">
                                            <label for="cs-login-password">
                                                <strong>Password</strong>
                                                <i class="icon-lock"></i>
                                                <input type="password" id="mpassword" name="mpassword" placeholder="******">
                                            </label> 
                                            <span id="mpassworderror"></span>
                                        </div>
                                        <div class="input-holder">
                                            <label for="cs-confirm-password">
                                                <strong>confirm password</strong>
                                                <i class="icon-lock"></i>
                                                <input type="password" id="mcpassword" placeholder="******">
                                            </label>
                                            <span id="mcpassworderror"></span>
                                        </div>
                                        <div class="input-holder">
                                            <input class="cs-color csborder-color rohit" id="btnsubmobile" type="button" value="Create Account">
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <h3>Menu 2</h3>
                                <p>Some content in menu 2.</p>
                            </div>
                        </div>


                </div>
                <div class="modal-footer">
                    <a data-dismiss="modal" data-target="#cs-login" data-toggle="modal" href="javascript:;" aria-hidden="true">Already Have An Account</a>
                    <!-- <div class="cs-separator"><span>or</span></div> -->
                    <!-- <div class="cs-user-social">
                        <em>LogIn with your Social Networks</em>
                        <ul>
                            <li>
                                 <?php    
                                        if (isset($accessToken)) {
                                            try {
                                             
                                              $response = $fb->get('/me?fields=id,name,email', $accessToken);
                                            } catch(Facebook\Exceptions\FacebookResponseException $e) {
                                             
                                              exit;
                                            } catch(Facebook\Exceptions\FacebookSDKException $e) {
                                             
                                              exit;
                                            }
                                            $user = $response->getGraphUser();
                                            
                                            $GFH_Admin->facebookLogin($user['id'],$user['name'],$user['email']);

                                        }else{
                                           
                                   echo '<a href="'.htmlspecialchars($loginUrl).'" data-original-title="facebook"><i class="icon-facebook-f"></i>facebook</a></a>';
                                        }

                                     ?>

                           

              
                                     <?php 
                if (isset($_GET['code']) && !$fbuser) {
                  $client->authenticate($_GET['code']);
                  $_SESSION['access_token'] = $client->getAccessToken();
                  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
                  exit;
                }

                if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
                  $client->setAccessToken($_SESSION['access_token']);
                } else {
                  $authUrl = $client->createAuthUrl();
                }

                if (isset($authUrl)){
                    
                ?>
              
                     

                <?php } else {  
                    $user = $service->userinfo->get();
                    
                $GFH_Admin->googlePluseLogin($user->id,$user->givenName,$user->email);
                }?>
                                    
                           </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div> 
    <div class="modal fade" id="cs-login" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <h4>User Log in</h4>

                    <div class="">
                        <div class="">
                            <div class="">
                                <ul class="social">
                                    <!-- <li class="facebook">
                                     <?php
                                            
                                        if (isset($accessToken)) {
                                            try {
                                             
                                              $response = $fb->get('/me?fields=id,name,email', $accessToken);
                                            } catch(Facebook\Exceptions\FacebookResponseException $e) {
                                             
                                              exit;
                                            } catch(Facebook\Exceptions\FacebookSDKException $e) {
                                             
                                              exit;
                                            }
                                            $user = $response->getGraphUser();
                                            
                                            $GFH_Admin->facebookLogin($user['id'],$user['name'],$user['email']);

                                        }else{
                                            
                                   echo '<a href="'.htmlspecialchars($loginUrl).'"><i class="fa fa-facebook fa-3x"></i></a>';
                                        }

                                     ?>
                                     </li> -->
                                    
                                   <!-- <li class="twitter"><a href="login.php?provider=Twitter"><i class="fa fa-twitter fa-3x"></i></a></li> -->
                                     
                                    <li class="behance2"><a href="login.php?provider=Google"><i class="fa fa-google-plus fa-3x"></i></a></li>
                                  <!-- <li class="linkedin"><a href="login.php?provider=Linkedin"><i class="fa fa-linkedin fa-3x"></i></a></li> -->  
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="cs-separator"><span>or</span></div>
                    <div class="clearfix"></div>
                    <div class="cs-login-form">
                        <form  id="">
                        <span id="loginerror"></span>
                            <div class="input-holder">
                                <label for="cs-username-1">
                                    <!-- <strong>ENTER EMAIL ID/MOBILE NUMBER</strong> -->
                                    <strong>ENTER EMAIL ID</strong>
                                    <i class="icon-add-user"></i>
                                    <input type="text" class="" name="username" id="username" placeholder="" >
                                </label>
                                <span id="usernameerror"></span>
                            </div>
                            <div class="input-holder">
                                <label for="cs-login-password-1">
                                    <strong>Password</strong>
                                    <i class="icon-lock"></i>
                                    <input type="password" name="lpassword" id="lpassword">
                                </label>
                                <span id="lpassworderror"></span>
                            </div>
                            <div class="input-holder">
                                <a class="btn-forgot-pass" data-dismiss="modal" data-target="#user-forgot-pass" data-toggle="modal" href="javascript:;" aria-hidden="true"><i class=" icon-question-circle"></i> Forgot password?</a>
                            </div>
                            <div class="input-holder">
                                <!-- <input class="cs-color csborder-color" id="btnlogin" type="submit" value="LOGIN"> -->
                                <button class="rohit" id="btnlogin" type="button">LOGIN</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">

<!-- <div class="cs-user-social">
<em>Signin with your Social Networks</em>


<ul>
<li><a href="#" data-original-title="facebook"><i class="icon-facebook-f"></i>facebook</a></li>
<li><a href="#" data-original-title="twitter"><i class="icon-twitter4"></i>twitter</a></li>
<li><a href="#" data-original-title="google-plus"><i class="icon-google4"></i>google</a></li>
</ul>
</div> -->
<div class="cs-user-signup">
    <i class="icon-add-user"></i>
    <strong>Not a Member yet? </strong>
    <a class="cs-color" data-dismiss="modal" data-target="#cs-signup" data-toggle="modal" href="javascript:;" aria-hidden="true">Signup Now</a>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="user-forgot-pass" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <h4>Password Recovery</h4>
                <div class="cs-login-form">
                    <form>
                    <span id="frgpass"></span>
                        <div class="input-holder">
                            <label for="cs-email-1">
                              <!--   <strong>ENTER EMAIL ID/MOBILE NUMBER</strong> -->
                              <strong>ENTER EMAIL ID</strong>
                                <i class="icon-envelope"></i>
                        <input type="text" class="" name="frgEmail" id="forgetemail" placeholder="">
                            </label>
                        </div>
                        <div class="input-holder">
                            <input class="rohit" id="btnfrgemail" type="button" value="Send">
                            <span id="errorrecoveremail"></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <div class="cs-user-signup">
                    <i class="icon-add-user"></i>
                    <strong>Not a Member yet? </strong>
                    <a href="javascript:;" data-toggle="modal" data-target="#cs-signup" data-dismiss="modal" class="cs-color" aria-hidden="true">Signup Now</a>
                </div>
            </div>
        </div>
    </div>
</div> 
</div>

<script>
     function validateEmail($email) {
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      return emailReg.test( $email );
    }
</script>
<script>
    $(document).ready(function(){
        //alert('hello');
$('#btnsubemail').click(function(){
    //$('#frmregister').submit();

    var email=$("#email").val();
    var password=$("#password").val();
    var cpassword=$("#cpassword").val();
    if(email==0) { 
        $('#emailerror').text("Please enter email-Id").css('color','red');
            return false;
    }else if(!validateEmail(email))
    {
        //alert("please enter correct email");
        $('#emailerror').text("Please enter a valid email-Id").css('color','red');
        return false;
    }else{
        $('#emailerror').text(" ");
    } 


    if(password==""){
        
        $('#passworderror').text("Please enter password").css('color','red');
        return false;
    }else{
        $('#passworderror').text(" ");
    } 

    if(cpassword==""){
            
        $('#cpassworderror').text("Please confirm password").css('color','red');
        return false;

    }else{

        $('#cpassworderror').text(" ");
    }

    if(cpassword!=password ){
        
        $('#cpassworderror').text("Passwords do not match").css('color','red');
        return false;
    }else{
       
        $('#cpassworderror').text(" ");

        $.ajax({
            type:'post',
            url:'ajax_register.php',
            data:{email:email,password:password},
            dataType:'json',
            success:function(response){
               // alert(response);
                if(response.status=='success')
                {
                    window.location.href="";
                }else{
                     $('#frmerror').text(response.error).css('color','#E11212');
                }
            }
        });
    }
  
});


$('#btnsubmobile').click(function(){
    //$('#frmregister').submit();btnlogin

    var mobile=$("#mobile").val();
    var mpassword=$("#mpassword").val();
    var mcpassword=$("#mcpassword").val();
    // alert(mpassword);

    if(mobile.length!=10)
    {
        $('#mobileerror').text("Please enter a 10 digit mobile number").css('color','red');
        return false;
    }else{
        $('#mobileerror').text(" ");
    } 

    if(mpassword==""){
        
        $('#mpassworderror').text("Please enter password").css('color','red');
        return false;
    }else{
        $('#mpassworderror').text(" ");
    } 

     if(mcpassword==""){
            
            $('#mcpassworderror').text("Please confirm password").css('color','red');
        return false;

    }else if(mpassword!=mcpassword ){
        
         $('#mcpassworderror').text("Passwords do not match").css('color','red');
        return false;
    }else{
        
        $('#mpassworderror').text(" ");
        $('#mcpassworderror').text(" ");

        $.ajax({
            type:'post',
            url:'ajax_register.php',
            data:{mobile:mobile,mpassword:mpassword},
            dataType:'json',
            success:function(response){
                    // alert(response);
                if(response.status=='success')
                {
                    window.location.href="";
                }else{
                     $('#mobileerror').text(response.error).css('color','#E11212');
                }
            }
        });
    }
  
});



});
</script>

<script>
    $(document).ready(function(){
        $('#btnlogin').click(function(){
        var username=$("#username").val();
        var lpassword=$("#lpassword").val();
      
        //alert(username+" "+lpassword);
        $.ajax({
            type:'post',
            url:'ajax_login.php',
            data:{'username':username,'lpassword':lpassword},
            dataType:'json',
            success:function(resp){
                //alert(resp.status);
                if(resp.status=='success')
                {
                    window.location.href="";

                }else{

                    $('#loginerror').text(resp.error).css('color','#E11212');

                }

            }

        });
        });
    })
    
</script>
<script>
$(document).ready(function(){
    $('#btnfrgemail').click(function(){
        var forgetemail=$('#forgetemail').val();
        // alert(forgetemail);
        if(forgetemail=="")
        {
            $('#errorrecoveremail').text("Please enter the email/ mobile with which you signed up.")
            return false;
        }else{
            $.ajax({
                type:'post',
                url:'ajax_login.php',
                data:{'frgemail':forgetemail},
                dataType:'json',
                success:function(resdata){
                if(resdata.status=='success')
                {
                    $('#frgpass').text(resdata.msg).css('color','#05aa07');
                }else{
                    $('#frgpass').text(resdata.error).css('color','#E11212');
                }

                }
            });
        }
    });
});
</script>

