<?php 
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

      <!-- Default box -->
      <div class="box">

             <?php 
             if(isset($_REQUEST['delete_id'])&&!empty($_REQUEST['delete_id']))
              {
                $result=$GFH_Admin->single_delete($_REQUEST['delete_id']);
              }
             ?>
              <div class="box-header ">
              <h3 class="box-title">New Ride List</h3><br><br>
              <a class="btn btn-primary" href="add_ride.php">Add New Ride</a>
              <a class="btn btn-danger" id="sendrequest" onclick="return setDeleteAction()" href="#">Delete All</a>
              
                </div>

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
                      <th>Vehicle Type</th>
                      <th>Start From</th>
                      <th>End To</th>
                      <th>Reserve Price</th>
                      <th>Date</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php 
                      $rowdata=$GFH_Admin->getNewrides();
                      $i=1;
                      if($rowdata->num_rows>0)
                      {
                         while($row=mysqli_fetch_assoc($rowdata))
                         {    
                          //echo "<pre>"; print_r($row);die;
                       ?>
                      <tr>
                        <td><input type="checkbox" class="allmodels" name="all_models[]" value="<?php echo isset($row['vehicle_id'])?$row['vehicle_id']:''; ?>"/></td>
                        <td ><?php echo isset($row['vehicle_type'])?$row['vehicle_type']:''; ?></td>
                        <td><?php echo isset($row['start_from'])?$row['start_from']:''; ?></td>
                        <td><?php echo isset($row['end'])?$row['end']:''; ?></td>
                        <td><?php echo isset($row['reserve_price'])?$row['reserve_price']:''; ?></td>
                        
                        <td><?php echo isset($row['entry_date'])?$row['entry_date']:''; ?></td>
                        <td>
                       
                        <a href="add_ride.php?edit_id=<?php echo $row['vehicle_id']; ?>" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                       

                         
                        <a href="javascript:confirmDelete('new_rides.php?delete_id=<?php echo $row['vehicle_id']; ?>')" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;&nbsp;
                       
                        </td>
                      </tr>
                      <?php 
                      } } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                      <th> </th>
                      <th>Vehicle Type</th>
                      <th>Start From</th>
                      <th>End To</th>
                      <th>Reserve Price</th>
                      <th>Date</th>
                      <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
                </div>
              </form>
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
  document.donorfrm.action = "delete_newrides.php";
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
        

