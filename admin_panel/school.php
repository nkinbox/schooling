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
              <h3 class="box-title">School List</h3><br><br>
              <a class="btn btn-primary" href="add_school.php">Add School</a>
              <a class="btn btn-danger" id="sendrequest" onclick="return setDeleteAction()" href="#">Delete All</a>
              <?php if(isset($_POST['importSubmit'])){
               
                  $GFH_Admin->bulk_product_upload();

              }?>
              <br>
              <form method="post" enctype="multipart/form-data">
                <!-- <div class="form-group" style="float:left;"> -->
                  <button type="submit" name="importSubmit" class="btn btn-flat btn-primary ink-reaction  pull-right" style="
    margin-top: 10px; float:right;">
                                                            Import CSV 
                                                        </button>
                  <input type="file" multiple name="file" style="
    margin-top: 10px; float:right;"  />
                  
                <!-- </div> -->
                

              </form>
                 
                                
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
                      <th>ID</th>
                      <th>Name</th>
                      <th>School Gender</th>
                      <th>Region</th>
                      <th>Service Fee</th>
                      <th>Date</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php 
                      $rowdata=$GFH_Admin->getSchool();
                      $i=1;
                      if($rowdata->num_rows>0)
                      {
                         while($row=mysqli_fetch_assoc($rowdata))
                         {    
                          //echo "<pre>"; print_r($row);die;
                       ?>
                      <tr>
                        <td><input type="checkbox" class="allmodels" name="all_models[]" value="<?php echo isset($row['id'])?$row['id']:''; ?>"/></td>
                        <td ><?php echo isset($row['id'])?$row['id']:''; ?></td>
                        <td ><?php echo isset($row['name'])?$row['name']:''; ?></td>
                        <td><?php echo isset($row['school_gender'])?$row['school_gender']:''; ?></td>
                        <td><?php echo isset($row['school_region'])?$row['school_region']:''; ?></td>
                        <td><?php echo isset($row['service_fee'])?$row['service_fee']:''; ?></td>
                        <td><?php echo isset($row['created_at'])?$row['created_at']:''; ?></td>
                        <td>
                       
                        <a href="add_school.php?edit_id=<?php echo $row['id']; ?>" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                       

                         
                        
                       
                        </td>
                      </tr>
                      <?php 
                      } } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                      <th> </th>
                      <th>ID</th>
                      <th>Name</th>
                      <th>School Gender</th>
                      <th>Region</th>
                      <th>Service Fee</th>
                      <th>Date</th>
                      <th>Action</th> 
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
  document.donorfrm.action = "delete_school.php";
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