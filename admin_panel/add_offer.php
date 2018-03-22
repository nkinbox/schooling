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
        $response=$GFH_Admin->offer();
        if(isset($response) && $response['status']=='inserted')
        {
          header('location:offer.php?msg='.$response['msg']);
        }

        if(isset($response) && $response['status']=='update')
        {
          header('location:offer.php?msg='.$response['msg']);
        }
        //echo "<pre>";print_r($response);die;
      }

      if(isset($_REQUEST['edit_id']))
      {
        $rideDetails=$GFH_Admin->getOffer($_REQUEST['edit_id']);
        $rideDetail=mysqli_fetch_assoc($rideDetails);
         
      }
       // echo "<pre>";print_r($rideDetail);die;
      ?>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h4><?php echo isset($_GET['edit_id'])?'Edit':'New';  ?> Offer</h4>
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
                    <input type="hidden" name="offer_id" value="<?php echo isset($rideDetail['id'])?$rideDetail['id']:''; ?>">
                    <input type="hidden" name="oldimg" value="<?php echo isset($rideDetail['image'])?$rideDetail['image']:''; ?>">

                  

         

                    <div class="row">
                       
                      <div class="col-md-6">
                         <div class="form-group">
                          <label for="available_seat">Title</label>
                          <input type="text" class="form-control input-sm" name="title" value="<?php echo isset($rideDetail['title'])?$rideDetail['title']:'' ?>" placeholder=" title">
                        </div>
                      </div> 
                       <div class="col-md-6">
                         <div class="form-group">
                          <label for="available_seat">Discount Title</label>
                        
                           <input type="text" class="form-control input-sm" name="discount_title" value="<?php echo isset($rideDetail['discount_title'])?$rideDetail['discount_title']:'' ?>" placeholder=" discount title">
                        </div>
                      </div> 
                     
                    </div>
                    <div class="row">
                       <div class="col-md-6">
                         <div class="form-group">
                          <label for="available_seat">Percent</label>
                          <input type="text" class="form-control input-sm" name="discount_percent" value="<?php echo isset($rideDetail['discount_percent'])?$rideDetail['discount_percent']:'' ?>" placeholder="discount percent">
                        </div>
                      </div> 
                       <div class="col-md-6">
                         <div class="form-group">
                          <label for="available_seat">Upload Image</label>
                          <input type="file"  name="image" value="">
                        </div>

                      </div>  
                    </div>


                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                          <label for="available_seat">Promocode</label>
                          
                          <input type="text" class="form-control input-sm" name="promocode" value="<?php echo isset($rideDetail['promocode'])?$rideDetail['promocode']:'' ?>" placeholder="promocode">
                        </div>
                      </div>  
                      <div class="col-md-6">
                         <div class="form-group">
                          <label for="available_seat">Status</label>
                        
                          <select class="form-control" name="status" id="status">
                            <option value="1" <?php echo (isset($rideDetail['status'])&&$rideDetail['status']=='1')?'selected="selected"':'';   ?>>Active</option>
                            <option value="0"  <?php echo (isset($rideDetail['status'])&&$rideDetail['status']=='0')?'selected="selected"':'';   ?>>Inactive</option>
                          </select>
                        </div>
                      </div> 
                    
                       
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                          <label for="available_seat">Background Color</label>
                          
                          <input type="text" class="form-control input-sm my-colorpicker1" name="bgcolor" value="<?php echo isset($rideDetail['bgcolor'])?$rideDetail['bgcolor']:'' ?>" placeholder="Background Color">
                        </div>
                      </div> 
                    </div>

                    
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                      <?php  if(isset($rideDetail['image'])&&!empty($rideDetail['image'])){ ?>
                        <img src="../images/offer/<?php echo $rideDetail['image'];  ?>" width="180" height="180"> 

                        <?php } ?>  
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <input type="submit" class="btn btn-primary" name="submitrides" value="Save">
                      <a href="offer.php" class="btn btn-primary">Back</a>
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
