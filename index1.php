<?php  ob_start(); 
@session_start();
require_once('admin_panel/includes/function.php');

require_once('Facebook/autoload.php');
require_once ('Google/autoload.php');
 
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
                      echo '<li ><a href="'.htmlspecialchars($authUrl).'"  data-original-title="google-plus" ><i class="icon-google4"></i>google</a></li>';
                ?>
              
                     

                <?php } else {  
                    $user = $service->userinfo->get();
                    
                $GFH_Admin->googlePluseLogin($user->id,$user->givenName,$user->email);
                }
           
echo "<script> window.location.href='https://schoolling.com/index.php';</script>";
?>