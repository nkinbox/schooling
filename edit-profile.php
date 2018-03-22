<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Schoolling | Edit Profile</title>
<link href="assets\css\bootstrap.css" rel="stylesheet">
<link href="assets\css\bootstrap-theme.css" rel="stylesheet">
<link href="assets\css\iconmoon.css" rel="stylesheet">
<link href="assets\css\chosen.css" rel="stylesheet">
<link href="assets\css\jquery.mobile-menu.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link href="cs-smartstudy-plugin.css" rel="stylesheet">
<link href="assets/css/jquery.mCustomScrollbar.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="assets\css\color.css" rel="stylesheet">
<link href="assets\css\media.css" rel="stylesheet">
<link href="assets\css\widget.css" rel="stylesheet">
<link href="assets\css\responsive.css" rel="stylesheet">

</head>
<body class="wp-smartstudy">
<div class="wrapper"> 
  <!-- Side Menu Start -->
  <div id="overlay"></div>

  <?php //echo isset($_SESSION);die;  ?>
    <div id="mobile-menu">
        <ul>
            <li><a href="about.php">About Us</a></li>
            <li><a href="#">Blog</a></li>
         
            <li class="menu-item-has-children"><a href="#">Mobile App</a>
            </li>
            <li class="menu-item-has-children"><a href="courses-grid.php">Apply To School</a>
            </li>
            <li class="menu-item-has-children"><a href="#"  data-target="#cs-login" data-toggle="modal">Login</a>
            </li>
            <li class="menu-item-has-children">
              <a href="cart.php"><img src="assets/images/cart.png" width="35px"><div class="counter"><?php echo @count($_SESSION['CART']);  ?></div>cart</a>
            </li>
        </ul>
    </div>
<?php include('newheader.php');
// unset($_SESSION['CART']);
// echo "<pre>";print_r($_SESSION);die;
 ?>

 <div class="page-section" style=" height: 150px; background-color:rgb(242,242,242);margin-top: 84px;">
  <img src="assets/images/edit1.png" style="    height: 120px;
    width: 120px;
    /* padding-top: 10px; */
    margin-top: 35px;
    margin-left: 14px;" alt="schoolling">
       <img src="assets/images/edit2.png" style="    height: 98px;
    width: 135px;
    float: right;
    margin-right: 20px;
    margin-top: 52px;" alt="schoolling">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-page-title">
         
                        <h1 style="color: rgb(11,44,99) !important; text-transform: capitalize !important;margin-top: -96px;">Edit Profile
                          <img src="assets/images/edit-picture.png" style="height: 80px; position: absolute;top: -140px;right: 430px;" alt="schoolling"></h1>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
if(isset($_POST['updateProfile']))
{
  // echo "<pre>";print_r($_FILES);die;

    $result=$GFH_Admin->updateUserProfile();
}

$user=$GFH_Admin->getUserProfile();
?>
<!-- <form method="post"> -->


<div class="box">
    <!-- <img src="assets/images/setting-profile.png" style="height: 56px;position: absolute;right: 10px;top: 10px;"> -->
    
   <form  method="post" enctype="multipart/form-data">
    <?php  if(isset($user['profile'])){  ?>
    <img id="blah" src="images/profile/<?php  echo isset($user['profile'])?$user['profile']:''; ?>" alt="schoolling"  style="height: 56px;width: 56px; position: absolute;right: 10px;top: 10px;border-radius: 50%;" />
    <?php }else{ ?>
    <img id="blah" src="assets/images/setting-profile.png" alt="schoolling"  style="height: 56px;width: 56px; position: absolute;right: 10px;top: 10px;border-radius: 50%;" />
    <?php  } ?>
    <input type="file" class="deepak_input" name="profileimg"  onchange="readURL(this);">
    <h5 class="deepak_head1" style="position: absolute;right: 20px;top: 60px;z-index: 9;"> Edit</h5>
    <?php 
      if(isset($result['status'])&&$result['status']=='success')
      {
        echo "<span style='color:green;'>".$result['msg']."</span>";
      }elseif(isset($result['status'])&&$result['status']=='failed'){
        echo "<span style='color:red;'>".$result['msg']."</span>";
      }
     ?>
    <div class="group" style="margin-top: 50px;">  

      <input class="inputMaterial" type="text" name="first_name" value="<?php echo isset($user['first_name'])?$user['first_name']:'';  ?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>First Name</label>
    </div>

 
    <div class="group">  

      <input class="inputMaterial" type="text" name="last_name" value="<?php echo isset($user['last_name'])?$user['last_name']:'';  ?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Last Name</label>
    </div>

    <div class="group">      
      <input class="inputMaterial" type="number" name="mobile" value="<?php echo isset($user['phone'])?$user['phone']:'';  ?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Mobile Number</label>
    </div>
    <div class="group">      
      <input class="inputMaterial" type="email" name="email" value="<?php echo isset($user['email'])?$user['email']:'';  ?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label> Email Id</label>
    </div>

      <div class="group">      
        <select class="inputMaterial"  type="text" name="gender" value="" required>
          <span class="highlight"></span>
      <span class="bar"></span>
            <option value=""></option>
            <option value="male" <?php echo (isset($user['gender'])&&$user['gender']=='male')?'selected="selected"':'';  ?>>Male</option>
            <option value="female" <?php echo (isset($user['gender'])&&$user['gender']=='female')?'selected="selected"':'';  ?> >Female</option>
            <option value="other" <?php echo (isset($user['gender'])&&$user['gender']=='other')?'selected="selected"':'';  ?>>Other</option>

        </select>
          <label>Gender</label>
      </div>
    <div class="group">      
      <input class="inputMaterial" type="text" name="address" value="<?php echo isset($user['address'])?$user['address']:'';  ?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Address</label>
    </div>
   
 
  <button id="buttonlogintoregister" name="updateProfile" type="submit">Save</button>
   </form>
</div>
  <?php include 'footer.php'; ?>
  <script type="text/javascript">
         function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
  </script>