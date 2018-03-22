<?php  
require_once('includes/function.php');
//global $GFH_Admin;
    if(isset($_POST['uid3'])){
      $siblingdetails=$GFH_Admin->getAllApplicationsibling1($_POST['uid3']);
      $siblingdetail=mysqli_fetch_assoc($siblingdetails);
 ?>

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">General/Sibling's Details</h4>
      </div>
      <div class="modal-body">
        <div class="row">
                   
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Parent's Status</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($siblingdetail['sibling_parent_status'])?$siblingdetail['sibling_parent_status']:'' ?>" placeholder="">
            </div>
          </div>        
        </div>
            
       <div class="row">
              <!-- <div class="col-md-12"><center><h4>Current Address</h4></center></div>  -->     
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Mode of Transportation</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($siblingdetail['mode_of_transport'])?$siblingdetail['mode_of_transport']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Transferred From Other State/country</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($siblingdetail['tranferred_from_other_state'])?$siblingdetail['tranferred_from_other_state']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">If Yes,Then When?</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($siblingdetail['tranferred_from_other_state_time'])?$siblingdetail['tranferred_from_other_state_time']:'' ?>" placeholder="">
            </div>
          </div> 
           
        </div>
            
         
        <div class="row">        
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">If Yes,Which State/country</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($siblingdetail['tranferred_from_other_state_place'])?$siblingdetail['tranferred_from_other_state_place']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Name of Previous School(if any)/Play School Attended By The Child?</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($siblingdetail['previous_school'])?$siblingdetail['previous_school']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Address of the School/Play School</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($siblingdetail['previous_school_address'])?$siblingdetail['previous_school_address']:'' ?>" placeholder="">
            </div>
          </div>        
        </div>
            
        <div class="row">        
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Child Living With Whom</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($siblingdetail['child_living_with'])?$siblingdetail['child_living_with']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Is This Your First Child</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($siblingdetail['is_first_child'])?$siblingdetail['is_first_child']:'' ?>" placeholder="">
            </div>
          </div> 
        </div>
        <h4 class="row text-center">Siblings</h4>
        <?php $siblings=$GFH_Admin->getApplicationSiblingDetail($_POST['uid3']);
        
          if(@mysqli_num_rows($siblings)>0)
          {
            while($sibling=mysqli_fetch_assoc($siblings)){
         ?>
        <div class="row">        
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Full Name of Sibling</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($sibling['sibling_name'])?$sibling['sibling_name']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Gender</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($sibling['sibling_gender'])?$sibling['sibling_gender']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Date of birth</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($sibling['sibling_dob'])?$sibling['sibling_dob']:'' ?>" placeholder="">
            </div>
          </div>        
        </div>

        <div class="row">        
          <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">School Attending</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($sibling['school_attending'])?$sibling['school_attending']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Class</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($sibling['class'])?$sibling['class']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Section</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($sibling['section'])?$sibling['section']:'' ?>" placeholder="">
            </div>
          </div>  
          <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Admission number</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($sibling['admission_number'])?$sibling['admission_number']:'' ?>" placeholder="">
            </div>
          </div>       
        </div>
        <hr>
        <?php  }
          }  ?>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  <?php } ?>