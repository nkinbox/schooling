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
              <h3 class="box-title">Application Form </h3><br><br>
             <!--  <a class="btn btn-primary" href="add_school.php">Add School</a> -->
             <!--  <a class="btn btn-danger" id="sendrequest" onclick="return setDeleteAction()" href="#">Delete All</a> -->
              
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
                      <th>Application ID</th>
                      <th>User</th>
                      <th>Address</th>
                      <th>Child</th>
                      <th>Father</th>
                      <th>Mother</th>
                      <th>Sibling</th>
                      <th>Document</th>
                      <th>Form Status</th>
                      <th>Date</th>
                      
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php 
                      $rowdata=$GFH_Admin->getAllApplicationAddress();
                      $i=1;
                      if($rowdata->num_rows>0)
                      {
                         while($row=mysqli_fetch_assoc($rowdata))
                         {    
                          // echo "<pre>";print_r($row);die;
                            $resusers=$GFH_Admin->getRegisterUsers($row['fk_userid']);
                            $resuser=mysqli_fetch_assoc($resusers);
                          // $GFH_Admin->getApplicationAddress();
                            $fatherdetails=$GFH_Admin->getAllApplicationfather1($row['fk_userid']);
                          //   $fatherdetail=mysqli_fetch_assoc($fatherdetails);
                              
                          // echo "<pre>"; print_r($childdetail);die;

                            if(isset($resuser['common_admission_form']))
                            {
                              if($resuser['common_admission_form']=='1'){
                                $frmstatus="To be filled";
                              }elseif($resuser['common_admission_form']=='2'){
                                $frmstatus="Submitted";
                              }elseif($resuser['common_admission_form']=='3'){
                                $frmstatus="Verified";
                              }else{
                                $frmstatus="To be filled";
                              }
                            }
                       ?>
                      <tr>
                        <td><input type="checkbox" class="allmodels" name="all_models[]" value="<?php echo isset($row['id'])?$row['id']:''; ?>"/></td>
                        <td ><?php echo isset($row['application_id'])?$row['application_id']:''; ?></td>
                        <td ><a href="edit_users.php?edit_id=<?php echo isset($row['fk_userid'])?$row['fk_userid']:''; ?>" target='_blank'>View User</a></td>
                        <td >
                       <button type="button" class="btn btn-info btn-sm" onclick='formaddress("<?php echo isset($row['fk_userid'])?$row['fk_userid']:'';  ?>");' >View</button>
                        </td>
                        <td ><button type="button" onclick='formchild("<?php echo isset($row['fk_userid'])?$row['fk_userid']:'';  ?>");'   class="btn btn-info btn-sm" >View</button></td>
                        <td ><button type="button" onclick='formfather("<?php echo isset($row['fk_userid'])?$row['fk_userid']:'';  ?>");' class="btn btn-info btn-sm" >View</button></td>
                        <td ><button type="button" onclick='formmother("<?php echo isset($row['fk_userid'])?$row['fk_userid']:'';  ?>");' class="btn btn-info btn-sm" >View</button></td>
                        <td ><button type="button" class="btn btn-info btn-sm" onclick='formsiblling("<?php echo isset($row['fk_userid'])?$row['fk_userid']:'';  ?>");'>View</button></td>
                        <td ><button type="button" class="btn btn-info btn-sm" onclick='formdocument("<?php echo isset($row['fk_userid'])?$row['fk_userid']:'';  ?>");'>View</button></td>
                        <td><?php echo isset($frmstatus)?$frmstatus:''; ?></td>
                        <td><?php echo isset($row['created_at'])?$row['created_at']:''; ?></td>
                        <td><div class="btn-group">
                            <button type="button" class="btn btn-default btn-flat">Act</button>
                            <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                
                                <li><a href="#" onclick="change_status('<?php echo $row['fk_userid'];?>','3');">Verified</a></li>
                              
                            </ul>
                          </div>
                      </td>
                        <!-- <td>
                       
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal6">Change Status</button>
                        </td> -->
                      </tr>


                      <?php  //include('view_address.php'); ?>
                      <?php  //include('view_child.php'); ?>
                      <?php  //include('view_father.php'); ?>
                      <?php  //include('view_mother.php'); ?>
                      <?php  //include('view_sibling.php'); ?>
                      <?php  //include('view_document.php'); ?>
                      <?php // include('application_status.php'); ?>
                      <?php 
                      
                      } } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                      <th> </th>
                     <th>Application ID</th>
                      <th>User</th>
                      <th>Address</th>
                      <th>Child</th>
                      <th>Father</th>
                      <th>Mother</th>
                      <th>Sibling</th>
                      <th>Document</th>
                      
                      <th>Date</th>
                      <th>Change Status</th>
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
<div class="modal fade" id="myModal1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
  
    <!-- Modal content-->
    <div class="modal-content" id="appform">

    </div>
    </div>
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
$('#changestatus').change(function(){
  // alert("hjshdjsh");
  var formstatus=$(this).val();
  // alert(formstatus);
  var appformid=$("#appformid").val();
  $.ajax({
      type:'post',
      url:'ajax_change_formstatus.php',
      data:{appformid:appformid,formstatus:formstatus},
      success:function(resp){
       //alert(resp);
        if(resp=='success')
        {
          //alert(resp);
          window.location.href="";
        }
      }
  });
});


</script>
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

function change_status(order_no,status){
  // alert(status);
        $.ajax({
            type: "POST",
            url: "ajax_change_status.php",
            data: "form_status="+status+"&order_no="+order_no ,
           success:function(){
              document.getElementById('dis-'+order_no).innerHTML=status;
              window.location.href="";
            }
        });
    }

function formaddress(uid)
{
  // alert(uid);
  $.ajax({
        type:'post',
        url:'view_address.php',
        data:{'uid':uid},
        success:function(res){
          // alert(res);
          $('#appform').html(res);
          $('#myModal1').modal('show');
        }
  });
}

function formchild(uid1)
{
  //alert(uid1);
  $.ajax({
        type:'post',
        url:'view_child.php',
        data:{'uid1':uid1},
        success:function(res1){
          // alert(res);
          $('#appform').html(res1);
          $('#myModal1').modal('show');
        }
  });
}

function formfather(uid2)
{
  //alert(uid2);
  $.ajax({
        type:'post',
        url:'view_father.php',
        data:{'uid2':uid2},
        success:function(res2){
          // alert(res);
          $('#appform').html(res2);
          $('#myModal1').modal('show');
        }
  });
}

function formmother(uid3)
{
  // alert(uid3);
  $.ajax({
        type:'post',
        url:'view_mother.php',
        data:{'uid3':uid3},
        success:function(res3){
          // alert(res);
          $('#appform').html(res3);
          $('#myModal1').modal('show');
        }
  });
}

function formsiblling(uid3)
{
  // alert(uid3);
  $.ajax({
        type:'post',
        url:'view_sibling.php',
        data:{'uid3':uid3},
        success:function(res3){
          // alert(res);
          $('#appform').html(res3);
          $('#myModal1').modal('show');
        }
  });
}

function formdocument(uid5)
{
  // alert(uid3);
  $.ajax({
        type:'post',
        url:'view_document.php',
        data:{'uid5':uid5},
        success:function(res5){
          // alert(res);
          $('#appform').html(res5);
          $('#myModal1').modal('show');
        }
  });
}
</script>