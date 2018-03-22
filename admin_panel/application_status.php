<?php require_once('includes/function.php');
global $GFH_Admin;
  if(isset($_POST['oid'])&&!empty($_POST['oid'])){
  $regisid=isset($_POST['oid'])?$_POST['oid']:'';
  $orderdtls=$GFH_Admin->getOrderDetail1($regisid);
  $orderdtl=mysqli_fetch_assoc($orderdtls);
  // $row['id']
//{ ?>

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Application</h4>
      </div>
      <div class="modal-body">
        <!-- <form method="post" > -->
         
       <input type="hidden" id="appformid" value="<?php echo isset($orderdtl['sk_id'])?$orderdtl['sk_id']:'';  ?>">
        <input type="hidden" id="frmregisterid" value="<?php echo isset($orderdtl['id'])?$orderdtl['id']:'';  ?>">

       <div class="row">
                   
       

          <div class="col-md-6">
             <div class="form-group">
              <label for="available_seat">Parent's Signature</label>
              <select class="form-control" name="status" id="parent_signature">
                <option value="0">Select</option>
                <option value="1" <?php echo (isset($orderdtl['parent_signature'])&&$orderdtl['parent_signature']=='1')?'selected="selected"':'';  ?>> In Process</option>
                <option value="2" <?php echo (isset($orderdtl['parent_signature'])&&$orderdtl['parent_signature']=='2')?'selected="selected"':'';  ?>>Done</option>
                 <option value="3" <?php echo (isset($orderdtl['parent_signature'])&&$orderdtl['parent_signature']=='3')?'selected="selected"':'';  ?>>Not Required</option>
                
              </select>
            </div>
          </div> 


                   
          <div class="col-md-6">
             <div class="form-group">
              <label for="available_seat">Submission to School</label>
              <select class="form-control" name="status" id="submission_to_school">
                <option value="0">Select</option>
                <option value="1" <?php echo (isset($orderdtl['submission_to_school'])&&$orderdtl['submission_to_school']=='1')?'selected="selected"':'';  ?>>In Process</option>
                <option value="2" <?php echo (isset($orderdtl['submission_to_school'])&&$orderdtl['submission_to_school']=='2')?'selected="selected"':'';  ?>>Done</option>
                
                
              </select>
            </div>
          </div> 
        </div>
        <div class="row">
          <div class="col-md-6">
             <div class="form-group">
              <label for="available_seat">Receipt From School(if any)</label>
              <select class="form-control" name="status" id="receipt_from_school">
                <option value="0">Select</option>
                <option value="1" <?php echo (isset($orderdtl['receipt_from_school'])&&$orderdtl['receipt_from_school']=='1')?'selected="selected"':'';  ?>>None</option>
                <option value="2" <?php echo (isset($orderdtl['receipt_from_school'])&&$orderdtl['receipt_from_school']=='2')?'selected="selected"':'';  ?>>Delivered to parent </option>
                
              </select>
            </div>
          </div>          
          <div class="col-md-6">
             <div class="form-group">
              <label for="available_seat">Parents to Visit For Admission(if selected)</label>
              <select class="form-control" name="status" id="parent_visit_for_admission">
                <option value="0">Select</option>
                <option value="1" <?php echo (isset($orderdtl['parent_visit_for_admission'])&&$orderdtl['parent_visit_for_admission']=='1')?'selected="selected"':'';  ?>>Inactive</option>
                <option value="2" <?php echo (isset($orderdtl['parent_visit_for_admission'])&&$orderdtl['parent_visit_for_admission']=='2')?'selected="selected"':'';  ?>>Active</option>
                
              </select>
            </div>
          </div> 
      </div>
      <div class="row">
         <div class="col-md-6">
        <input type="button" name="submit" class="btn btn-primary" value="submit" onclick=" changepappstatus();">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </div>
    <?php die; } ?>
      <!-- </form> -->