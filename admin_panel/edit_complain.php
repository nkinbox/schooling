<?php 
ob_start();
include('header.php');
include('main-sidebar.php');
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     OSRTSINDIA
     <small>it all starts here</small>
   </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php


      if(isset($_POST['submitrides']))
      {
        $response=$GFH_Admin->complain();
        if(isset($response) && $response['status']=='inserted')
        {
          header('location:complain.php?msg='.$response['msg']);
        }

        if(isset($response) && $response['status']=='update')
        {
          header('location:complain.php?msg='.$response['msg']);
        }
        //echo "<pre>";print_r($response);die;
      }

      if(isset($_REQUEST['edit_id']))
      {
        $rideDetails=$GFH_Admin->getComplain($_REQUEST['edit_id']);
        $rideDetail=mysqli_fetch_assoc($rideDetails);
          //echo "<pre>";print_r($menuDetail);die;
      }
      ?>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h4><?php echo isset($_GET['edit_id'])?'Edit':'New';  ?> Complain</h4>
          <?php if(isset($_REQUEST['msg']) && !empty($_REQUEST['msg'])){ ?>
            <div class="alert alert-success">
              <strong>Success!</strong> <?php echo $_REQUEST['msg']; ?>
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

                  <form method="post" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="complain_id" value="<?php echo isset($rideDetail['id'])?$rideDetail['id']:''; ?>">

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                         <label>username</label>
                            <input type="text" class="form-control" style="width:100%;"  name="username" value="<?php echo isset($rideDetail['username'])?$rideDetail['username']:'' ?>" placeholder="username">
                        </div>
                      </div> 
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>   phone </label>
                            <input type="text" class="form-control" style="width:100%;" name="phone" value="<?php echo isset($rideDetail['phone'])?$rideDetail['phone']:'' ?>" placeholder="phone">
                        </div>
                      </div> 
                    </div>

                     <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                          <label for="end_to">Email id</label>
                          <input type="text" class="form-control input-sm" name="email_id" value="<?php echo isset($rideDetail['email_id'])?$rideDetail['email_id']:'' ?>" placeholder="  email">
                        </div>
                      </div> 
                     <div class="col-md-6">
                         <div class="form-group">
                          <label for="available_seat">  complain content</label>
                          <textarea class="form-control" name="complain_content"><?php echo isset($rideDetail['complain_content'])?$rideDetail['complain_content']:'';  ?></textarea>
                        </div>
                      </div> 
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                          <label for="available_seat">complain date</label>
                          <input type="text" class="form-control input-sm" name="complain_date" value="<?php echo isset($rideDetail['complain_date'])?$rideDetail['complain_date']:'' ?>" placeholder="complain date">
                        </div>
                      </div> 
                     
                    </div>

                     

                    <div class="form-group">
                      <input type="submit" class="btn btn-primary" name="submitrides" value="Save">
                      <a href="complain.php" class="btn btn-primary">Back</a>
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
         

