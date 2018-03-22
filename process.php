<?php
error_reporting(0);
session_start();

$MERCHANT_KEY = "MGpLMtxX";

// Merchant Salt as provided by Payu
$SALT = "Ej7qRqrTHX";

// End point - change to https://secure.payu.in for LIVE mode
//$PAYU_BASE_URL = "https://test.payu.in";
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
   
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
  
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  
  } else {
    //echo "<pre>";print_r($posted);die;
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));

    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
 //echo "<pre>";print_r($hash);die;
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()">
  <style>
          body {background: #fafafa none repeat scroll 0 0;  height: 100%;  margin: 0;  overflow: hidden;  padding: 0;  width: 100%; }
          .wating_box { color: #000; font-size: 19px; margin: 20% auto 0; text-align: center;  width: 275px;}
          .wating_box p { margin: 0; padding: 5px;}

      </style><div class="wating_box"> <p>Do not refresh the page</p><p>Please Wait....</p></div>
    <div style="display:none;">
    <h2>Payment Process</h2>
    <br/>
    <?php if($formError) { ?>
	
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm" id="payuForm">
      <input type="text" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="text" name="hash" value="<?php echo $hash ?>"/>
      <input type="text" name="txnid" value="<?php echo $txnid ?>" />
      <input type="text" name="amount" value="<?php echo isset($_SESSION['BILLING_PRICE'])?$_SESSION['BILLING_PRICE']:''; ?>" />
      <input type="text" name="email" value="<?php echo isset($_SESSION['BILLING_EMAIL'])?$_SESSION['BILLING_EMAIL']:''; ?>" />
      <input type="text" name="firstname" id="firstname" value="<?php echo isset($_SESSION['BILLING_NAME'])?$_SESSION['BILLING_NAME']:''; ?>" />
      <input type="text" name="phone" value="<?php echo isset($_SESSION['BILLING_PHONE'])?$_SESSION['BILLING_PHONE']:''; ?>" />
       <input type="text" name="productinfo" value="SCHOOLLING">
       <input type="text" name="surl" value="https://www.schoolling.com/success.php" size="64" />
       <input type="text" name="furl" value="https://www.schoolling.com/failure.php" size="64" />
       <input type="text" name="service_provider" value="payu_paisa" size="64" />

       <?php if(!$hash) { ?>
            <input type="submit" value="Submit" />
          <?php } ?>
    </form>
    </div>
  </body>
</html>
<script src="assets/scripts/jquery.js"></script> 
<script type="text/javascript">

          $(document).ready(function(){ $("#payuForm").submit(); });
            </script>