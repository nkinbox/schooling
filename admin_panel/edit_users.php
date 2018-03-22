<?php 
ob_start();
include('header.php');
include('main-sidebar.php');
/*include('includes/function.php');
global $GFH_Admin;
*/
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SCHOOLLING
        <small>it all starts here</small>
      </h1>
   
    </section>

    <!-- Main content -->
    <section class="content">
    <?php


        if(isset($_POST['update_user']))
        {
          //echo "<pre>";print_r($_POST);die;
          $response=$GFH_Admin->registerUsers();
          if(isset($response) && $response['status']=='inserted')
          {
            header('location:users.php?msg='.$response['msg']);
          }

          if(isset($response) && $response['status']=='update')
          {
            header('location:users.php?msg='.$response['msg']);
          }
        }

        if(isset($_REQUEST['edit_id']))
        {
          $userDetails=$GFH_Admin->getRegisterUsers($_REQUEST['edit_id']);
          $userDetail=mysqli_fetch_assoc($userDetails);
          //echo "<pre>";print_r($menuDetail);die;
        }
    ?>
      <!-- Default box -->
      <div class="box">
          <div class="box-header with-border">
          <h3 class="box-title"><?php echo isset($_REQUEST['edit_id'])?'Edit':'Add New'; ?>  User</h3>
              <?php if(isset($GFH_Admin::$msg) && !empty($GFH_Admin::$msg)){ ?>
            <div class="alert alert-success">
              <strong>Success!</strong> <?php echo $GFH_Admin::$msg; ?>
            </div>
            <?php  } ?>
            <?php if(isset($response['error']) && !empty($response['error'])){ ?>
              <div class="alert alert-warning">
                <strong>Failed!</strong> <?php echo $response['error']; ?>
              </div>
              <?php  } ?>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
         <div class="box-body">
    
          <form method="post" role="form">
            <input type="hidden" name="user_id" value="<?php echo isset($userDetail['id'])?$userDetail['id']:''; ?>">
            <div class="form-group">
                <?php  if(isset($userDetail['profile'])){  ?>
                <img src="../images/profile/<?php  echo isset($userDetail['profile'])?$userDetail['profile']:''; ?>" class="img-rounded" width="200" height="200">
                <?php }else{ ?>
                <img src="../images/profile/profile.png" class="img-rounded" width="200" height="200">
                <?php } ?>
            </div>
            <div class="form-group">
             <label>First Name</label>
                <input type="text" class="form-control" required style="width:100%;" name="first_name" value="<?php echo isset($userDetail['first_name'])?$userDetail['first_name']:'' ?>" >
            </div>
            <div class="form-group">
            <label>Last Name</label>
                <input type="text" class="form-control" required style="width:100%;" name="last_name" value="<?php echo isset($userDetail['last_name'])?$userDetail['last_name']:'' ?>" >
            </div>


            <div class="form-group">
              <label>Email</label>
                <input type="email" class="form-control" required style="width:100%;" name="email" value="<?php echo isset($userDetail['email'])?$userDetail['email']:'' ?>" >
            </div>

            <div class="form-group">
              <label>Gender</label>
                <input type="text" class="form-control" required style="width:100%;" name="gender" value="<?php echo isset($userDetail['gender'])?$userDetail['gender']:'' ?>" >
            </div>

            <div class="form-group">
              <label>Phone</label>
                <input type="text" class="form-control" required style="width:100%;" name="phone" value="<?php echo isset($userDetail['phone'])?$userDetail['phone']:'' ?>" >
            </div>

             <div class="form-group">
              <label>Address</label>
                <input type="text" class="form-control" style="width:100%;" name="address" value="<?php echo isset($userDetail['address'])?$userDetail['address']:'' ?>" >
            </div>

            <div class="form-group">
              <label>Password</label>
                <input type="text" class="form-control" required style="width:100%;" name="password" value="<?php echo isset($userDetail['password'])?$userDetail['password']:'' ?>" >
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="update_user" value="Save">
                <a href="users.php" class="btn btn-primary">Back</a>
            </div>
        </form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <div class="box-footer">
         
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
<?php include('footer.php'); ?>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
});
</script>