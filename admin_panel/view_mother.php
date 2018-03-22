<?php  
require_once('includes/function.php');
//global $GFH_Admin;
    if(isset($_POST['uid3'])){
      $motherdetails=$GFH_Admin->getAllApplicationmother1($_POST['uid3']);
      $motherdetail=mysqli_fetch_assoc($motherdetails);
 ?>

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Mother's/Guardian's Details</h4>
      </div>
      <div class="modal-body">
        <div class="row">
                   
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat"> First Name</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_first_name'])?$motherdetail['mother_first_name']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat"> Middle Name</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_middle_name'])?$motherdetail['mother_middle_name']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat"> Last Name</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_last_name'])?$motherdetail['mother_last_name']:'' ?>" placeholder="">
            </div>
          </div>        
        </div>
            
       <div class="row">
              <!-- <div class="col-md-12"><center><h4>Current Address</h4></center></div>  -->     
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Relation with child</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_relation_with_child'])?$motherdetail['mother_relation_with_child']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Nationality</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_nationality'])?$motherdetail['mother_nationality']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">dob</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_dob'])?$motherdetail['mother_dob']:'' ?>" placeholder="">
            </div>
          </div> 
           
        </div>
            
         
        <div class="row">        
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Qualification</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_qualification'])?$motherdetail['mother_qualification']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Qualification other</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_qualification_other'])?$motherdetail['mother_qualification_other']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Occupation</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_occupation'])?$motherdetail['mother_occupation']:'' ?>" placeholder="">
            </div>
          </div>        
        </div>
            
        <div class="row">        
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">occupation other</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_occupation_others'])?$motherdetail['mother_occupation_others']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Organisation</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_organisation_name'])?$motherdetail['mother_organisation_name']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Office Address</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_office_address'])?$motherdetail['mother_office_address']:'' ?>" placeholder="">
            </div>
          </div>        
        </div>
        
        <div class="row">        
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Office Phone</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_office_phone'])?$motherdetail['mother_office_phone']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Annual Salary </label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_annual_salary'])?$motherdetail['mother_annual_salary']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Designation</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_office_designation'])?$motherdetail['mother_office_designation']:'' ?>" placeholder="">
            </div>
          </div>        
        </div>

        <div class="row">        
          <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Is Job Transferrable</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_job_transferrable'])?$motherdetail['mother_job_transferrable']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat"> Mobile </label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_phone'])?$motherdetail['mother_phone']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat"> Email</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_email'])?$motherdetail['mother_email']:'' ?>" placeholder="">
            </div>
          </div>  
          <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Details If Sports Background (State/National Level)</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_sports'])?$motherdetail['mother_sports']:'' ?>" placeholder="">
            </div>
          </div>       
        </div>

        <div class="row">        
          <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Mother Employed at A School?</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_emplyoed_at_school'])?$motherdetail['mother_emplyoed_at_school']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat"> If Yes, School Name </label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_school_name'])?$motherdetail['mother_school_name']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Role in School</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_school_role'])?$motherdetail['mother_school_role']:'' ?>" placeholder="">
            </div>
          </div>  
          <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Last School Attended By Father(XII Standard)</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_last_school_attendent'])?$motherdetail['mother_last_school_attendent']:'' ?>" placeholder="">
            </div>
          </div>       
        </div>


        

        <div class="row">        
          <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Year of Passing(XII)</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($motherdetail['mother_school_yop'])?$motherdetail['mother_school_yop']:'' ?>" placeholder="">
            </div>
          </div>       
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    <?php } ?>