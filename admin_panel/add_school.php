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
        $response=$GFH_Admin->setSchool();
        if(isset($response) && $response['status']=='inserted')
        {
          header('location:school.php?msg='.$response['msg']);
        }

        if(isset($response) && $response['status']=='update')
        {
          header('location:school.php?msg='.$response['msg']);
        }
        //echo "<pre>";print_r($response);die;
      }

      if(isset($_REQUEST['edit_id']))
      {
        $rideDetails=$GFH_Admin->getSchool($_REQUEST['edit_id']);
        $rideDetail=mysqli_fetch_assoc($rideDetails);
          //echo "<pre>";print_r($menuDetail);die;
      }
      ?>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h4><?php echo isset($_GET['edit_id'])?'Edit':'New';  ?> School</h4>
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
                    <input type="hidden" name="school_id" value="<?php echo isset($rideDetail['id'])?$rideDetail['id']:''; ?>">
                    <input type="hidden" name="oldimg" value="<?php echo isset($rideDetail['oldimg'])?$rideDetail['oldimg']:''; ?>">

                  

         

                    <div class="row">
                       
                      <div class="col-md-6">
                         <div class="form-group">
                          <label for="available_seat">School Name</label>
                          <input type="text" class="form-control input-sm" name="name" value="<?php echo isset($rideDetail['name'])?$rideDetail['name']:'' ?>" placeholder="School name">
                        </div>
                      </div> 
                       <div class="col-md-6">
                         <div class="form-group">
                          <label for="available_seat">School Gender</label>
                        
                          <select class="form-control" name="school_gender" id="school_gender">
                            <option value="0">Select</option>
                            <option value="Only Boys" <?php echo (isset($rideDetail['school_gender'])&&$rideDetail['school_gender']=='Only Boys')?'selected="selected"':'';   ?>>Only Boys</option>
                            <option value="Only Girls" <?php echo (isset($rideDetail['school_gender'])&&$rideDetail['school_gender']=='Only Girls')?'selected="selected"':'';   ?>>Only Girls</option>
                            <option value="Co-Ed" <?php echo (isset($rideDetail['school_gender'])&&$rideDetail['school_gender']=='Co-Ed')?'selected="selected"':'';   ?>>Co-Ed</option>
                          </select>
                        </div>
                      </div> 
                     
                    </div>
                    <div class="row">
                       <div class="col-md-6">
                         <div class="form-group">
                          <label for="available_seat">Region</label>
                            <select class="form-control" name="school_region" id="school_region">
                             <option value="0">Select</option>

                             <?php  $regions=$GFH_Admin->getRegions();
                              if(mysqli_num_rows($regions)>0){
                                while($region=mysqli_fetch_assoc($regions)){
                              
                              ?>
                            <option value="<?php echo isset($region['name'])?$region['name']:'';  ?>" <?php echo (isset($rideDetail['school_region'])&&$rideDetail['school_region']==$region['name'])?'selected="selected"':'';   ?>><?php echo isset($region['name'])?$region['name']:'';  ?></option>

                            <?php  } } ?>
                           
                          </select>
                        </div>
                      </div> 
                       <div class="col-md-6">
                         <div class="form-group">
                          <label for="available_seat">Upload Image</label>
                          <input type="file"  name="schoolimg" value="">
                        </div>

                      </div>  
                    </div>


                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                          <label for="available_seat">Service Fee</label>
                          
                          <input type="text" class="form-control input-sm" name="service_fee" value="<?php echo isset($rideDetail['service_fee'])?$rideDetail['service_fee']:'' ?>" placeholder="School name">
                        </div>
                      </div>  

                    
                       <div class="col-md-6">
                         <div class="form-group">
                          <label for="available_seat">SMS/ Email Alert Fee</label>
                           <input type="text" class="form-control input-sm" name="alert_fee" value="<?php echo isset($rideDetail['alert_fee'])?$rideDetail['alert_fee']:'' ?>" placeholder="SMS/ Email Alert Fee">
                        </div>
                      </div>  
                    </div>

                    <div class="row">
                       <div class="col-md-6">
                         <div class="form-group">
                          <label for="available_seat">Status</label>
                        
                          <select class="form-control" name="status" id="status">
                            <option value="1" <?php echo (isset($rideDetail['status'])&&$rideDetail['status']=='1')?'selected="selected"':'';   ?>>Active</option>
                            <option value="0"  <?php echo (isset($rideDetail['status'])&&$rideDetail['status']=='0')?'selected="selected"':'';   ?>>Inactive</option>
                          </select>
                        </div>
                      </div> 

                    
                       <div class="col-md-6">
                         <div class="form-group">
                          <label for="available_seat">Address</label>
                          
                          <textarea class="form-control input-sm" name="address"><?php echo isset($rideDetail['address'])?$rideDetail['address']:'' ?> </textarea>
                        </div>
                      </div>  
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                      <?php  if(isset($rideDetail['schoolimg'])&&!empty($rideDetail['schoolimg'])){ ?>
                        <img src="../images/school/<?php echo $rideDetail['schoolimg'];  ?>" width="180" height="180"> 

                        <?php } ?>  
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <input type="submit" class="btn btn-primary" name="submitrides" value="Save">
                      <a href="school.php" class="btn btn-primary">Back</a>
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
