<?php 
include('header.php');
include('main-sidebar.php');
 /*if(isset($_REQUEST['delete_id']))
 {
    $tablename='main_menu';
    $slug='main-menu';
    $biatAdmin->deleteData($tablename,$_REQUEST['delete_id'],$slug);
 }*/
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gather For Help
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
             <?php 

              if(isset($_POST['deleteall']))
              {

                $GFH_Admin->delete_main_menu($_POST['all_menu']);
              }


             ?>

            <div class="box-header">
              <h3 class="box-title">Main Menus</h3><br><br>
              <a href="add-main-menu.php" class="btn btn-primary">Add Menu</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php if(isset($_REQUEST['msg']) && !empty($_REQUEST['msg'])){ ?>
            <div class="alert alert-success">
              <strong>Success!</strong> <?php echo $_REQUEST['msg']; ?>
            </div>
            <?php  } ?>
              <form method="post" onsubmit="return deleteConfirm();" >
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th><INPUT type="checkbox" onchange="checkAll(this)" name="menuchkid[]" />&nbsp;&nbsp;<button type="submit" class="btn btn-danger btn-xs" name="deleteall" onclick="return del_prompt(this.form,this.value)" id="delete_selected">Delete All</button></th>
                      <th>Menu Name</th>
                      <th>Parent</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php 
                      $rowdata=$GFH_Admin->main_menu();
                      $i=1;
                      if($rowdata->num_rows>0)
                      {
                         while($row=mysqli_fetch_assoc($rowdata)) 
                         {    
                          //echo "<pre>"; print_r($row);die;

                       ?>
                      <tr>
                          <td><input type="checkbox" class="allmenu" name="all_menu[]" value="<?php echo isset($row['id'])?$row['id']:''; ?>"/></td>
                          <td><?php echo isset($row['menu_name'])?$row['menu_name']:''; ?></td>
                          <td><?php echo isset($row['parent'])?$row['parent']:''; ?></td>
                          <td><?php echo isset($row['status'])?$row['status']:''; ?></td>
                          <td><?php echo isset($row['entry_date'])?$row['entry_date']:''; ?></td>
                          <td>
                              <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                  Action
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                  <li><a href="add-main-menu.php?edit_id=<?php echo $row['id']; ?>">Edit</a></li>
                                  
                                </ul>
                              </div>
                          </td>
                      </tr>
                      <?php 
                      } } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                      <th>Menu Name</th>
                      <th>Parent</th>
                      <th>Status</th>
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
function deleteConfirm() { 
var status = confirm("Are you sure you want to delete?");   
  if(status)
  {
   //parent.location.replace("parent.location='<?php //echo "delete.php?id=" . $people['id'] ?>'");
   return true;
  }else{

    return false;

  }
} 
</script> 
  <SCRIPT language="javascript">
    function checkAll(ele) {
         var checkboxes = document.getElementsByClassName('allmenu');
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
        

