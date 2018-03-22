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
      if(isset($_POST['submitsiteinfo']))
      {
        //echo "<pre>";print_r($_POST);die;
        $GFH_Admin->siteinfo();
      }

      // if(isset($_REQUEST['edit_id']))
      // {
        $modelDetails=mysqli_query(GFHConfig::$link,"SELECT `id`, `email`, `phone`, `address`, `total_school`, `location`, `regions`,`years`,`title` FROM `site_info` WHERE id='1'");
        $modelDetail=mysqli_fetch_assoc($modelDetails);
          //echo "<pre>";print_r($menuDetail);die;
      //}
      ?>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3> Site Info </h3>
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

                  <form method="post" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="siteinfo_id" value="<?php echo isset($modelDetail['id'])?$modelDetail['id']:''; ?>">

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                         <label>Email</label>
                            <input type="text" class="form-control" style="width:100%;"  name="email" value="<?php echo isset($modelDetail['email'])?$modelDetail['email']:'' ?>" required >
                        </div>
                      </div>  
                    </div>
            
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                         <label>  Phone</label>
                            <input type="text" class="form-control" style="width:100%;"  name="phone" value="<?php echo isset($modelDetail['phone'])?$modelDetail['phone']:'' ?>" required >
                        </div>
                      </div>  
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                         <label>Address</label>
                            <input type="tex" class="form-control" style="width:100%;"  name="address" value="<?php echo isset($modelDetail['address'])?$modelDetail['address']:''; ?>" >
                        </div>
                      </div>  
                    </div>

                 <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                         <label>Site Title</label>
                            <input type="text" class="form-control" style="width:100%;"  name="title" value="<?php echo isset($modelDetail['title'])?$modelDetail['title']:'' ?>" required >
                        </div>
                      </div>  
                  </div>

                   <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                         <label>Years</label>
                            <input type="text" class="form-control" style="width:100%;"  name="years" value="<?php echo isset($modelDetail['years'])?$modelDetail['years']:'' ?>" required >
                        </div>
                      </div>  
                  </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                         <label>Total Schools</label>
                            <input type="text" class="form-control" style="width:100%;"  name="total_school" value="<?php echo isset($modelDetail['total_school'])?$modelDetail['total_school']:''; ?>" >
                        </div>
                      </div>  
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                         <label>location</label>
                            <input type="text" class="form-control" style="width:100%;"  name="location" value="<?php echo isset($modelDetail['location'])?$modelDetail['location']:''; ?>" >
                        </div>
                      </div>  
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                         <label>Regions</label>
                            <input type="text" class="form-control" style="width:100%;"  name="regions" value="<?php echo isset($modelDetail['regions'])?$modelDetail['regions']:''; ?>" >
                        </div>
                      </div>  
                    </div>

                    <div class="form-group">
                      <input type="submit" class="btn btn-primary" name="submitsiteinfo" value="Save">
                      
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