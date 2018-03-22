<?php  
require_once('includes/function.php');
//global $GFH_Admin;
    if(isset($_POST['uid2'])){
      $fatherdetails=$GFH_Admin->getAllApplicationfather1($_POST['uid2']);
      $fatherdetail=mysqli_fetch_assoc($fatherdetails);
 ?>

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Father's/Guardian's Detail</h4>
      </div>
      <div class="modal-body">
        <div class="row">
                   
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat"> First Name</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['father_first_name'])?$fatherdetail['father_first_name']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat"> Middle Name</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['father_middle_name'])?$fatherdetail['father_middle_name']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat"> Last Name</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['father_last_name'])?$fatherdetail['father_last_name']:'' ?>" placeholder="">
            </div>
          </div>        
        </div>
            
       <div class="row">
              <!-- <div class="col-md-12"><center><h4>Current Address</h4></center></div>  -->     
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Relation with child</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['relation_with_child'])?$fatherdetail['relation_with_child']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Nationality</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['father_nationality'])?$fatherdetail['father_nationality']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">dob</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['father_dob'])?$fatherdetail['father_dob']:'' ?>" placeholder="">
            </div>
          </div> 
           
        </div>
            
         
        <div class="row">        
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Qualification</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['qualification'])?$fatherdetail['qualification']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Qualification other</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['qualification_other'])?$fatherdetail['qualification_other']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Occupation</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['father_occupation'])?$fatherdetail['father_occupation']:'' ?>" placeholder="">
            </div>
          </div>        
        </div>
            
        <div class="row">        
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">father occupation other</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['father_occupation_other'])?$fatherdetail['father_occupation_other']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Organisation</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['father_organisation'])?$fatherdetail['father_organisation']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Office Address</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['father_office_address'])?$fatherdetail['father_office_address']:'' ?>" placeholder="">
            </div>
          </div>        
        </div>
        
        <div class="row">        
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Father Office Phone</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['father_office_phone'])?$fatherdetail['father_office_phone']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat"> Father Annual Salary </label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['father_annual_salary'])?$fatherdetail['father_annual_salary']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Father Designation</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['father_designation'])?$fatherdetail['father_designation']:'' ?>" placeholder="">
            </div>
          </div>        
        </div>

        <div class="row">        
          <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Is Job Transferrable</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['father_job_transferrable'])?$fatherdetail['father_job_transferrable']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat"> Father Mobile </label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['father_mobile'])?$fatherdetail['father_mobile']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Father Email</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['father_email'])?$fatherdetail['father_email']:'' ?>" placeholder="">
            </div>
          </div>  
          <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Details If Sports Background (State/National Level)</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['father_sports_background'])?$fatherdetail['father_sports_background']:'' ?>" placeholder="">
            </div>
          </div>       
        </div>

        <div class="row">        
          <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Father Employed at A School?</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['father_employed_school'])?$fatherdetail['father_employed_school']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat"> If Yes, School Name </label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['father_employed_school_name'])?$fatherdetail['father_employed_school_name']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Role in School</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['father_employed_school_role'])?$fatherdetail['father_employed_school_role']:'' ?>" placeholder="">
            </div>
          </div>  
          <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Last School Attended By Father(XII Standard)</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['last_school_attendent_by_father'])?$fatherdetail['last_school_attendent_by_father']:'' ?>" placeholder="">
            </div>
          </div>       
        </div>


       

         <div class="row">        
          <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Year of Passing(XII)</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($fatherdetail['last_school_attendent_yop'])?$fatherdetail['last_school_attendent_yop']:'' ?>" placeholder="">
            </div>
          </div> 
               
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  <?php } ?>