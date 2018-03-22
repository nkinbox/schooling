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
           

            <div class="box-header">
              <h3 class="box-title">User List</h3><br><br>
               <a href="exportdata.php" class="btn btn-primary">Export Data</a>
             <!--  <a href="edit_users.php" class="btn btn-primary">Add User</a>
               <a class="btn btn-danger" id="sendrequest" onclick="return setDeleteAction()" href="#">Delete All</a> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php if(isset($_REQUEST['msg']) && !empty($_REQUEST['msg'])){ ?>
            <div class="alert alert-success">
              <strong>Success!</strong> <?php echo $_REQUEST['msg']; ?>
            </div>
            <?php  } ?>
              <form method="post" id="donorfrm" name="donorfrm" >
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th><INPUT type="checkbox" onchange="checkAll(this)" name="userchkid[]" />&nbsp;&nbsp;</th>
                      <th>ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Requested Call</th>
                      <th>Requested Date</th>
                      <th>Date</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php 
                      $rowdata=$GFH_Admin->getUserdata();
                      $i=1;
                      if($rowdata->num_rows>0)
                      {
                         while($row=mysqli_fetch_assoc($rowdata)) 
                         {    
                          //echo "<pre>"; print_r($row['image_order']);die;

                       ?>
                      <tr>
                          <td><input type="checkbox" class="alluser" name="all_users[]" value="<?php echo isset($row['id'])?$row['id']:''; ?>"/></td>
                          <td><?php echo isset($row['id'])?$row['id']:''; ?></td>
                          <td><?php echo isset($row['first_name'])?$row['first_name']:''; ?></td>
                          <td><?php echo isset($row['last_name'])?$row['last_name']:''; ?></td>
                          <td><?php echo isset($row['email'])?$row['email']:''; ?></td>
                          <td><?php echo isset($row['phone'])?$row['phone']:''; ?></td>
                          <td><?php echo isset($row['requestcall'])?$row['requestcall']:''; ?></td>
                          <td><?php echo isset($row['requestdate'])?$row['requestdate']:''; ?></td>
                          <td><?php echo isset($row['entry_date'])?$row['entry_date']:''; ?></td>
                          <td>
                              <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                  Action
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                  <li><a href="edit_users.php?edit_id=<?php echo $row['id']; ?>">Edit</a></li>
                                  
                                </ul>
                              </div>
                          </td>
                      </tr>
                      <?php 
                      } } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th> </th>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Requested Call</th>
                    <th>Requested Date</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </form>
            </div>
            <!-- /.box-body -->
  
        <!-- /.box-body -->
        <div class="box-footer">
         
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

<script type="text/javascript"> 
function setDeleteAction() {
  if(confirm("Are you sure want to delete these rows?")) {
  document.donorfrm.action = "delete_user.php";
  document.donorfrm.submit();
  }
}
</script> 
  <SCRIPT language="javascript">
    function checkAll(ele) {
         var checkboxes = document.getElementsByClassName('alluser');
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
        

