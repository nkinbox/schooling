<?php require_once ('Google/autoload.php');
      require_once('admin_panel/includes/function.php');
      global $GFH_Admin;
      $client_id = '707617286750-f0n7g3aj5v5ihnfjoi6iihmrus8dgb7q.apps.googleusercontent.com'; 
      $client_secret = '5VPbjUJiQCjqPtjcptOKaGqF';
      $redirect_uri ="https://schoolling.com/gp_callback.php";


      $client = new Google_Client();
      $client->setClientId($client_id);
      $client->setClientSecret($client_secret);
      $client->setRedirectUri($redirect_uri);
      $client->addScope("email");
      $client->addScope("profile");
      $service = new Google_Service_Oauth2($client);

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

       $user = $service->userinfo->get();
                    
      $GFH_Admin->googlePluseLogin($user->id,$user->givenName,$user->email);

