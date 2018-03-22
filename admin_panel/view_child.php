<?php  
require_once('includes/function.php');
//global $GFH_Admin;
    if(isset($_POST['uid1'])){
    $childdetails=$GFH_Admin->getAllApplicationchild1($_POST['uid1']);
    $childdetail=mysqli_fetch_assoc($childdetails);
      // echo "<pre>";print_r($childdetail);die;
 ?>

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Child Detail</h4>
      </div>
      <div class="modal-body">
        <div class="row">
                   
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Child's First Name</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($childdetail['c_first_name'])?$childdetail['c_first_name']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Child's Middle Name</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($childdetail['c_middle_name'])?$childdetail['c_middle_name']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Child's Last Name</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($childdetail['c_last_name'])?$childdetail['c_last_name']:'' ?>" placeholder="">
            </div>
          </div>        
        </div>
            
       <div class="row">
              <!-- <div class="col-md-12"><center><h4>Current Address</h4></center></div>  -->     
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Category</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($childdetail['c_category'])?$childdetail['c_category']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Nationality</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($childdetail['c_nationality'])?$childdetail['c_nationality']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">DOB</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($childdetail['c_dob'])?$childdetail['c_dob']:'' ?>" placeholder="">
            </div>
          </div> 
           
        </div>
            
         
        <div class="row">        
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat"> Place of birth</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($childdetail['c_place_of_birth'])?$childdetail['c_place_of_birth']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">mother tounge</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($childdetail['c_mother_tounge'])?$childdetail['c_mother_tounge']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Aadhar</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($childdetail['c_aadhar'])?$childdetail['c_aadhar']:'' ?>" placeholder="">
            </div>
          </div>        
        </div>
            
        <div class="row">        
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Religion</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($childdetail['c_religion'])?$childdetail['c_religion']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Other Religion</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($childdetail['other_specifys'])?$childdetail['other_specifys']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Blood Group</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($childdetail['c_blood_group'])?$childdetail['c_blood_group']:'' ?>" placeholder="">
            </div>
          </div>        
        </div>
        
        <div class="row">        
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Any medical condition</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($childdetail['any_medical_condition'])?$childdetail['any_medical_condition']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat"> Is child adopted </label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($childdetail['c_is_child_adopted'])?$childdetail['c_is_child_adopted']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Language at Home</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($childdetail['c_language_at_home'])?$childdetail['c_language_at_home']:'' ?>" placeholder="">
            </div>
          </div>        
        </div>

        <div class="row">        
          
          <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Other Language</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($childdetail['c_language_at_home_other'])?$childdetail['c_language_at_home_other']:'' ?>" placeholder="">
            </div>
          </div>   

          <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Gender</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($childdetail['c_gender'])?$childdetail['c_gender']:'' ?>" placeholder="">
            </div>
          </div>    
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
<?php } ?>