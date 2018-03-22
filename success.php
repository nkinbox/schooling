<?php require_once('admin_panel/includes/function.php');

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
$salt="Ej7qRqrTHX";

if (isset($_POST["additionalCharges"])) {
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
        
         //session_start(); 
              //unset($_SESSION['ORDER_ID']);
               $total=0;
               $sum=0;

               $sql="insert into `tbl_order` SET `userid`='".$_SESSION['SCH_USERID']."',`status`='1',`order_date`=now()";
                $sql2=mysqli_query(GFHConfig::$link,$sql);
                if (!$sql2) {
                    printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                    exit();
                }
                $insertid=mysqli_insert_id(GFHConfig::$link);

                $appid="AP".$inserid;

                foreach($_SESSION['CART'] as $key1 => $value1)
                {
                  $sum+=$value1['price'];
                  mysqli_query(GFHConfig::$link,"insert into `tbl_orderdetail` SET `oid`='".$insertid."',`sk_id`='".$key1."',`amt`='".$value1['price']."'");
                  mysqli_query(GFHConfig::$link,"update `tbl_orderdetail` SET `application_id`='".$appid."' where id='".$insertid."'");
                }

                 if(@count($_SESSION['CART'])>=5)
                  { $afterdiscount=round((40*$sum)/100);
                    $total=$sum-$afterdiscount;
                  }else{
                    $total=$sum;
                  }
                mysqli_query(GFHConfig::$link,"update `tbl_order` SET `amount`='".$total."' where id='".$insertid."'");
                mysqli_query(GFHConfig::$link,"UPDATE `tbl_register` SET `common_admission_form`='1' WHERE `id`='".$_SESSION['SCH_USERID']."'");
                mysqli_query(GFHConfig::$link,"INSERT INTO `tbl_billingdetail` SET `orderid`='".$insertid."',`name`='".$_SESSION['BILLING_NAME']."',`email`='". $_SESSION['BILLING_EMAIL']."',`phone`='". $_SESSION['BILLING_PHONE']."',`status`='1',`created_at`=now()");
                unset($_SESSION['CART']);
          echo "<h3>Thank You. Your order status is ". $status .".</h3>";
          echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
          echo "<h4>We have received a payment of Rs. " . $amount . ".</h4>";
          echo "<a href='https://www.schoolling.com/dashboard.php'>Go To Dashboard </a> & kindly fill the common admission form.<br>
          Kindly ignore if already filled.";
        
           
       }         
     // echo $_SESSION['SCH_USERID']; 
      //print_r($_SESSION);
         
?>  