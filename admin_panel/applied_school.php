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
              <a href="order.php" class="btn btn-primary">Back</a>
              
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
                      <th>Registration Id</th>
                      <th>Name</th>
                      <th>Service Fee</th>
                      <th>Parent's Signature</th>
                      <th>Submission to School</th>
                      <th>Receipt From School</th>
                      <th>Parents to Visit For Admission</th>

                      <th>Change Status</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                   <?php 
                      $rowdata=$GFH_Admin->getOrderDetail($_GET['id']);
                      $i=1;
                      if($rowdata->num_rows>0)
                      {
                         while($row=mysqli_fetch_assoc($rowdata))
                         {    
                          //echo "<pre>"; print_r($row);die;
                          $schools=$GFH_Admin->getSchool($row['sk_id']);
                          $school=mysqli_fetch_assoc($schools);
                          // echo "<pre>"; print_r($row);die;
                          $parentsignature="";$submissionto_school="";$receiptfrom_school="";$parentvisit_for_admission="";
                          if(isset($row['parent_signature'])&&$row['parent_signature']=='1')
                          {
                            $parentsignature="In Process";
                          }elseif($row['parent_signature']=='2'){
                            $parentsignature="Done";
                          }

                          if(isset($row['submission_to_school'])&&$row['submission_to_school']=='1')
                          {
                            $submissionto_school="In Process";
                          }elseif(isset($row['submission_to_school'])&&$row['submission_to_school']=='2'){
                            $submissionto_school="Done";
                          }

                          if(isset($row['receipt_from_school'])&&$row['receipt_from_school']=='1')
                          {
                            $receiptfrom_school="None";
                          }elseif(isset($row['receipt_from_school'])&&$row['receipt_from_school']=='2'){
                            $receiptfrom_school="Delivered to parent";
                          }

                          if(isset($row['parent_visit_for_admission'])&&$row['parent_visit_for_admission']=='1')
                          {
                            $parentvisit_for_admission="Inactive";
                          }elseif(isset($row['parent_visit_for_admission'])&&$row['parent_visit_for_admission']=='2'){
                            $parentvisit_for_admission="Active";
                          }
                           // echo "<pre>"; print_r($parentsignature);die;
                       ?>
                       
                      <tr>
                        <td></td>
                        <td ><?php echo isset($row['id'])?$row['id']:''; ?></td>
                        <td ><?php echo isset($school['name'])?$school['name']:''; ?></td>
                        <td><?php echo isset($school['service_fee'])?$school['service_fee']:''; ?></td>
                        <td ><?php echo isset($parentsignature)?$parentsignature:''; ?></td>
                        <td ><?php echo isset($submissionto_school)?$submissionto_school:''; ?></td>
                        <td ><?php echo isset($receiptfrom_school)?$receiptfrom_school:''; ?></td>
                        <td ><?php echo isset($parentvisit_for_admission)?$parentvisit_for_admission:''; ?></td>
                        <td>
                        
                       <button type="button" class="btn btn-info btn-sm" onclick='changeschoolstatus("<?php echo isset($school['id'])?$school['id']:''; ?>","<?php echo isset($row['id'])?$row['id']:''; ?>");' >School Status</button>

                        <!-- <a href="add_school.php?edit_id=<?php echo $row['id']; ?>" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp; -->
                        </td>
                      </tr>
                   
                      <?php 
                      } } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                      <th> </th>
                     <!--  <th>ID</th> -->
                      <th>Registration Id</th>
                      <th>Name</th>
                      <th>Service Fee</th>
                      <th>Parent's Signature</th>
                      <th>Submission to School</th>
                      <th>Receipt From School</th>
                      <th>Parents to Visit For Admission</th>
                      <th>change status</th>

                  </tr>
                  </tfoot>
                </table>
                </div>
              </form>
            </div>
            </div>
      </div>
      <!-- /.box -->
      <div class="modal fade" id="myModal5" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content" id="statuschangediv">


    </div>
    </div>
    </div>
 <?php  //include('application_status.php'); ?>
    </section>
    <!-- /.content -->
  </div>


  <?php include('footer.php'); ?>
<script>
function changeschoolstatus(scid,oid)
{
  // alert(oid);
  //$('#appformid').val(scid);
  //$('#orderid').val(oid);
  $.ajax({
      type:'post',
      url:'application_status.php',
      data:{'oid':oid},
      success:function(dd){
        $('#statuschangediv').html(dd);
        $('#myModal5').modal('show');
      }
    });

  
}

function changepappstatus()
{
  //var common_admission_form=$('#common_admission_form').val();
  var parent_signature=$('#parent_signature').val();
  var submission_to_school=$('#submission_to_school').val();
  var receipt_from_school=$('#receipt_from_school').val();
  var parent_visit_for_admission=$('#parent_visit_for_admission').val();
  var frmregisterid=$('#frmregisterid').val();
  var appformid=$("#appformid").val();

  // alert(appformid);
  
  $.ajax({
      type:'post',
      url:'ajax_change_formstatus.php',
      data:{orderid:frmregisterid,appformid:appformid,parent_signature:parent_signature,submission_to_school:submission_to_school,receipt_from_school:receipt_from_school,parent_visit_for_admission:parent_visit_for_admission},
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