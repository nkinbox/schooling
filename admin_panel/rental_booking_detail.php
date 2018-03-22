<?php 
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

      <!-- Default box -->
      <div class="box">

             <?php 
             if(isset($_REQUEST['delete_id'])&&!empty($_REQUEST['delete_id']))
              {
                $result=$GFH_Admin->single_booking_detail_delete($_REQUEST['delete_id']);
              }
             ?>
              <div class="box-header ">
              <h3 class="box-title">Booking Details</h3><br><br>
             <!--  <a class="btn btn-primary" href="add-one-day-round-trip.php">Add New</a> -->
              <a class="btn btn-danger" id="sendrequest" onclick="return setDeleteAction()" href="#">Delete All</a>
             <!--  <a href="abc.php" class="btn btn-danger" id="sendrequest" >send</a> -->
            
                </div>

              

            <!-- /.box-header -->
            <div class="box-body">
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
              <form method="post"  id="donorfrm" name="donorfrm" >
              <div class="divchange">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>
                      <INPUT type="checkbox" onchange="checkAll(this)" name="donorchkid[]" />
                      <!-- &nbsp;&nbsp;<button type="submit" class="btn btn-danger btn-xs" name="deleteall" onclick="return del_prompt(this.form,this.value)" id="delete_selected">Delete All</button> -->
                      </th>
                    <th>Orderid</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Booking Date</th>
                    <th>Travel Date</th>
                    <th>Total Fare</th>
                    <th>View Travel</th>
                    <th>View Car</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php 
                      $rowdata=$GFH_Admin->getRentalBooking();
                      $i=1;
                      if($rowdata->num_rows>0)
                      {
                         while($row=mysqli_fetch_assoc($rowdata))
                         {    
                         // echo "<pre>";print_r($row);die;
                       ?>
                      <tr>
                        <td><input type="checkbox" class="allmodels" name="all_models[]" value="<?php echo isset($row['id'])?$row['id']:''; ?>"/></td>
                        <td ><?php echo isset($row['id'])?$row['id']:''; ?></td>
                        <td ><?php echo isset($row['name'])?$row['name']:''; ?></td>
                        <td><?php echo isset($row['email'])?$row['email']:''; ?></td>
                        <td><?php echo isset($row['phone'])?$row['phone']:''; ?></td>
                        <td><?php echo isset($row['entry_date'])?$row['entry_date']:''; ?></td>
                        <td><?php echo isset($row['pickupdate'])?$row['pickupdate']:''; ?></td>
                        <td><?php echo isset($row['totalamount'])?$row['totalamount']:''; ?></td>
                        <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">View Customer</button></td>
                        <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal1">View Car Detail</button></td>
                      </tr>
                      <div class="modal fade" id="myModal" role="dialog">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Travel Detail</h4>
                              </div>
                              <div class="modal-body">
                              <p><strong>Pickup Date :</strong> <?php echo isset($row['pickupdate'])?$row['pickupdate']:'';  ?></p>
                              <p><strong>Pickup Time :</strong> <?php echo isset($row['pickuptime'])?$row['pickuptime']:'';  ?></p>
                                <p><strong>Pickup City :</strong><?php echo isset($row['pickupcity'])?$row['pickupcity']:'';  ?></p>
                                <p><strong>Pickup Address :</strong><?php echo isset($row['pickupaddress'])?$row['pickupaddress']:'';  ?></p>
                                
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="modal fade" id="myModal1" role="dialog">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Car Detail</h4>
                              </div>
                              <div class="modal-body">
                              <?php $cardetails=$GFH_Admin->getRentCar($row['carid']);
                                $cardetail=mysqli_fetch_assoc($cardetails);
                               ?>
                                <p><strong>Car type :</strong> <?php echo isset($cardetail['vehicle_type'])?$cardetail['vehicle_type']:'';  ?></p>
                                
                                <p><strong>Package :</strong> <?php echo isset($cardetail['package'])?$cardetail['package']:'';  ?></p>
                                <p><strong>Price:</strong> <?php echo isset($cardetail['reserve_price'])?$cardetail['reserve_price']:'';  ?></p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php 
                      } } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                      <th> </th>
                    <th>Orderid</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Booking Date</th>
                    <th>Travel Date</th>
                    <th>Total Fare</th>
                    <th>View Travel</th>
                    <th>View Car</th>
                  </tr>
                  </tfoot>
                </table>
                </div>
              </form>
            </div>
           </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

<script type="text/javascript"> 
/*function deleteConfirm() { 
var status = confirm("Are you sure you ?");   
  if(status)
  {
  
   return true;
  }else{

    return false;

  }
}*/ 
function setDeleteAction() {
  if(confirm("Are you sure want to delete these rows?")) {
  document.donorfrm.action = "delete_confirm_booking.php";
  document.donorfrm.submit();
  }
}


</script> 
  <SCRIPT language="javascript">
    function checkAll(ele) {
         var checkboxes = document.getElementsByClassName('allmodels');
         if (ele.checked) {
             for (var i = 0; i < checkboxes.length; i++) {
                 if (checkboxes[i].type == 'checkbox') {
                     checkboxes[i].checked = true;
                 }
             }
         } else {
             for (var i = 0; i < checkboxes.length; i++) {
                 console.log(i)
                 if (checkboxes[i].type == 'checkbox') {
                     checkboxes[i].checked = false;
                 }
             }
         }
     }
</SCRIPT>

  <?php include('footer.php'); ?>
<script>
function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to delete")) {
    document.location = delUrl;
  }
}

function confirmBlock(delUrl) {
  if (confirm("Are you sure ")) {
    document.location = delUrl;
  }
}
</script>
        

