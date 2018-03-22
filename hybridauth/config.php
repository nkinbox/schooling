<?php
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------
$config =array(
		"base_url" => "https://www.schoolling.com/hybridauth/hybridauth/index.php", 
		"providers" => array ( 

			"Google" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "19411924160-tois44tiph5t59c3f7bvfgu8497r13ua.apps.googleusercontent.com", "secret" => "uo6ZD2xvtxYlYaoyscIWPNf-" ), 
			),

        "LinkedIn"  => array(
          "enabled" => true,
          "keys"    => array("key" => "86wmmp2fynazlz", "secret" => "8GKB4mpv51z1uS7s"),
          "scope"   => array("r_basicprofile", "r_emailaddress", "w_share"), // optional
          "fields"  => array("id", "email-address", "first-name", "last-name"), // optional
        ),
     

			"Facebook" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "170144917051876
", "secret" => "1140e997544249fc42b3b7fb741b9ce1" ), 
			),

			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "7GqJLo2NAgkkKR8M5zDqBQ3ql", "secret" => "JdKArGp567IeM1WmymlJDYku6ULUMAbg58Bf2O0aX2GvtpG9Pp" ) 
			),
		),
		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => false,
		"debug_file" => "",
	);
