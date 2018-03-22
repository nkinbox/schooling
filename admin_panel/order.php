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
              <h3 class="box-title">Orders</h3><br><br>
              <!-- <a class="btn btn-primary" href="add_school.php">Add School</a> -->
              <!-- <a class="btn btn-danger" id="sendrequest" onclick="return setDeleteAction()" href="#">Delete All</a> -->
              
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
                      <th>Order Id</th>
                      <!-- <th>Txanid</th> -->
                      <th>User</th>
                      <th>School</th>
                      <th>Amount</th>
                      <th>Date</th>
                     <!--  <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody>
                   <?php 
                      $rowdata=$GFH_Admin->order();
                      $i=1;
                      if($rowdata->num_rows>0)
                      {
                         while($row=mysqli_fetch_assoc($rowdata))
                         {    
                          // echo "<pre>"; print_r($row);die;
                          $resusers=$GFH_Admin->getRegisterUsers($row['userid']);
                          $resuser=mysqli_fetch_assoc($resusers);
                       ?>
                      <tr>
                        <td><input type="checkbox" class="allmodels" name="all_models[]" value="<?php echo isset($row['id'])?$row['id']:''; ?>"/></td>
                        <td ><?php echo isset($row['id'])?$row['id']:''; ?></td>
                       <!--  <td ><?php echo isset($row['taxnid'])?$row['taxnid']:''; ?></td> -->
                        <td ><a href="edit_users.php?edit_id=<?php echo isset($row['userid'])?$row['userid']:''; ?>"> View User </a></td>
                        <td ><a href="applied_school.php?id=<?php echo isset($row['id'])?$row['id']:''; ?>">View</a></td>
                        <td><?php echo isset($row['amount'])?$row['amount']:''; ?></td>
                        <td><?php echo isset($row['order_date'])?$row['order_date']:''; ?></td>
                        <!-- <td>
                       <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal5">School Status</button>
                        
                        </td> -->
                      </tr>
                      <?php  //include('application_status.php'); ?>
                      <?php 
                      } } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                      <th> </th>
                      <th>Order Id</th>
                     <!--  <th>Txanid</th> -->
                      <th>User</th>
                      <th>School</th>
                      <th>Amount</th>
                      <th>Date</th>
                      <!-- <th>Action</th> -->
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

function changepappstatus()
{
  var common_admission_form=$('#common_admission_form').val();
  var parent_signature=$('#parent_signature').val();
  var submission_to_school=$('#submission_to_school').val();
  var receipt_from_school=$('#receipt_from_school').val();
  var parent_visit_for_admission=$('#parent_visit_for_admission').val();
  var appformid=$("#appformid").val();
  alert(common_admission_form+" "+parent_signature+" "+submission_to_school);
  $.ajax({
      type:'post',
      url:'ajax_change_formstatus.php',
      data:{appformid:appformid,common_admission_form:common_admission_form,parent_signature:parent_signature,submission_to_school:submission_to_school,receipt_from_school:receipt_from_school,parent_visit_for_admission:parent_visit_for_admission},
      success:function(resp){
      // alert(resp);
        if(resp=='success')
        {
          window.location.href="";
        }
      }
  });
}
</script>
<script>
$('#changestatus').change(function(){
  //alert("hello");
   var frstatus=$(this).val();
   $.ajax({
      type:'post',
      url:'ajax_change_formstatus.php',
      data:{frstatus:frstatus},
      success:function(resp1){
        $('#substatus').html(resp1);
      }
  });
});


</script>