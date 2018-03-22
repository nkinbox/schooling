<?php 
ob_start();
include('header.php');
include('main-sidebar.php');
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


      if(isset($_POST['submitrides']))
      {
        $response=$GFH_Admin->setRegions();
        if(isset($response) && $response['status']=='inserted')
        {
          header('location:regions.php?msg='.$response['msg']);
        }

        if(isset($response) && $response['status']=='update')
        {
          header('location:regions.php?msg='.$response['msg']);
        }
        //echo "<pre>";print_r($response);die;
      }

      if(isset($_REQUEST['edit_id']))
      {
        $rideDetails=$GFH_Admin->getRegions($_REQUEST['edit_id']);
        $rideDetail=mysqli_fetch_assoc($rideDetails);
          //echo "<pre>";print_r($menuDetail);die;
      }
      ?>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h4><?php echo isset($_GET['edit_id'])?'Edit':'New';  ?> Region</h4>
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
                    <input type="hidden" name="region_id" value="<?php echo isset($rideDetail['id'])?$rideDetail['id']:''; ?>">
                  

         

                    <div class="row">
                       
                      <div class="col-md-6">
                         <div class="form-group">
                          <label for="available_seat">Region Name</label>
                          <input type="text" class="form-control input-sm" name="name" value="<?php echo isset($rideDetail['name'])?$rideDetail['name']:'' ?>" placeholder="Region Name">
                        </div>
                      </div> 
                      </div>

                    <div class="form-group">
                      <input type="submit" class="btn btn-primary" name="submitrides" value="Save">
                      <a href="regions.php" class="btn btn-primary">Back</a>
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
         
<script>
$(document).ready(function(){
  $('#vehicle_type').change(function(){
    var vehicle=$(this).val();
    $.ajax({
        type:'post',
        url:'ajax_car_category.php',
        data:{'vehicle':vehicle},
        success:function(response){
         $('#carname').html(response);
        }
    });
  });


  $('#start_from').change(function(){
      var startcity=$(this).val();
       $.ajax({
        type:'post',
        url:'ajax_subcity.php',
        data:{'startcity':startcity},
        success:function(response1){
         $('#endcity').html(response1);
        }
    });
  });
});

</script>
