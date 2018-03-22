<?php include 'newheader.php'; 
   // echo "<pre>";print_r($_SESSION);die;
  if(isset($_POST['submit']))
  {
    ///echo "<pre>";print_r($_POST['name']);die;
    $sum="";
    foreach ($_SESSION['CART'] as $key => $value) { 
    }

    $total = $_SESSION['total']; 
    $_SESSION['BILLING_NAME']=$_POST['name'];
    $_SESSION['BILLING_EMAIL']=$_POST['email'];
    $_SESSION['BILLING_PHONE']=$_POST['phone'];
    $_SESSION['BILLING_ADDRESS']=$_POST['address'];
    $_SESSION['BILLING_PRICE']=$total;

    header('location:process.php');
   
   }

?>

<div class="row">
  <form role="form"  method="post">
    <div class="row ">
      <div class="col-md-6 col-md-offset-3">
        <div class="col-md-12" style="margin-top: 100px;">
          <h3 style="text-align: center;"> Payment Details</h3>
          <div class="box">
  <div  style="padding-top: 20px;"></div>
  <!-- <p style="font-style: normal; text-align: left;padding-left: 25px; font-size: 20px;" > Residence Address (Present)</p> -->

    <div class="group">      
      <input class="inputMaterial" type="text" name="name" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label> *Name</label>
    </div>
    <div class="group">      
      <input class="inputMaterial" type="email" name="email" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label> *Email</label>
    </div>
    <div class="group">      
      <input class="inputMaterial" type="text" name="phone" required pattern="[789][0-9]{9}">
      <span class="highlight"></span>
      <span class="bar"></span>
      <label> *Phone No</label>
    </div>
    <div class="group">
      <input class="inputMaterial" type="text" name="address" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label> *Address</label>
    </div>
<button id=""  type="submit" name="submit">Submit</button>
</div>
        </div>
      </div>
    </div>
  </form>
 </div>








<?php include 'footer.php'; ?>