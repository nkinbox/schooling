<?php
require_once('admin_panel/includes/function.php');
  global $GFH_Admin;

$paymentdetail=json_encode($_REQUEST);
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];

$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$userid=$_POST["udf1"];
$orderid=$_POST["udf2"];
$salt="Ej7qRqrTHX";

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
  
       if ($hash != $posted_hash) {
       
	       echo "Invalid Transaction. Please try again";
		   }
	   else {
      // session_start();
              //unset($_SESSION['ORDER_ID']);
               
          echo "<a href='index.php'>Home</a>";
          
		 } 
?>
<!--Please enter your website homepagge URL -->
<p><a href="index.php"> Try Again</a></p>
