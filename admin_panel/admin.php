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
         OSRTSINDIA
        <small>it all starts here</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
    <?php


        if(isset($_POST['update_admin']))
        {
          //echo "<pre>";print_r($_POST);die;
          $GFH_Admin->update_admin();
        }

       
          $userDetails=$GFH_Admin->getAdmin();
          $userDetail=mysqli_fetch_assoc($userDetails);
   
    ?>
      <!-- Default box -->
      <div class="box">
          <div class="box-header with-border">
          <h3 class="box-title"> Update Admin</h3>
              <?php if(isset($_REQUEST['msg']) && !empty($_REQUEST['msg'])){ ?>
            <div class="alert alert-success">
              <strong>Success!</strong> <?php echo $_REQUEST['msg']; ?>
            </div>
            <?php  } ?>
            <?php if(isset($_REQUEST['error']) && !empty($_REQUEST['error'])){ ?>
            <div class="alert alert-warning">
              <strong>Failed!</strong> <?php echo $_REQUEST['error']; ?>
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
            <input type="hidden" name="admin_id" value="<?php echo isset($userDetail['id'])?$userDetail['id']:''; ?>">

            <div class="form-group">
             <label>Username</label>
                <input type="text" class="form-control" required style="width:100%;" name="username" value="<?php echo isset($userDetail['username'])?$userDetail['username']:'' ?>" >
            </div>

            <div class="form-group">
              <label>Email</label>
                <input type="text" class="form-control" required style="width:100%;" name="email" value="<?php echo isset($userDetail['email'])?$userDetail['email']:'' ?>" >
            </div>

            <div class="form-group">
              <label>Password</label>
                <input type="text" class="form-control" required style="width:100%;" name="password" value="<?php echo isset($userDetail['password'])?$userDetail['password']:'' ?>" >
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="update_admin" value="Save">
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