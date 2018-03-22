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
        SCHOOLLING
        <small>it all starts here</small>
      </h1>
     <!--  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
             <?php 

              if(isset($_POST['deleteall']))
              {
                $allid=isset($_POST['all_page'])?$_POST['all_page']:'';
                //echo "<pre>"; print_r($_POST['all_page']);die;
                $GFH_Admin->delete_pages($allid);
              }


             ?>

            <div class="box-header">
              <h3 class="box-title">Pages</h3><br><br>
              <a href="add-page.php" class="btn btn-primary">Add Page</a>
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
                      <th><INPUT type="checkbox" onchange="checkAll(this)" name="pagechkid[]" />&nbsp;&nbsp;<button type="submit" class="btn btn-danger btn-xs" name="deleteall" onclick="return del_prompt(this.form,this.value)" id="delete_selected">Delete All</button></th>
                    <th>Page Title </th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php 
                    $rowdata=$GFH_Admin->getPages();
                    $i=1;
                    if($rowdata->num_rows>0)
                    {
                       while($row=mysqli_fetch_assoc($rowdata)) 
                       {   

                     ?>
                      <tr>
                          <td><input type="checkbox" class="allpage" name="all_page[]" value="<?php echo isset($row['page_id'])?$row['page_id']:''; ?>"/></td>
                           <td><?php echo isset($row['page_name'])?$row['page_name']:''; ?></td>
                          <td><?php echo isset($row['page_order'])?$row['page_order']:''; ?></td>
                          <td><?php echo (isset($row['page_status'])&&$row['page_status']==1)?'Active':'Inactive'; ?></td>
                          <td>
                              <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                  Action
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                  <li><a href="add-page.php?edit_id=<?php echo $row['page_id']; ?>">Edit</a></li>
                                  
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
                    <th>Page Title </th>
                    <th>Order</th>
                    <th>Status</th>
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
         var checkboxes = document.getElementsByClassName('allpage');
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
        

