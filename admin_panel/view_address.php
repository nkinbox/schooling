<?php 
 require_once('includes/function.php');
//global $GFH_Admin;
    if(isset($_POST['uid'])){

      $addressdatils=$GFH_Admin->getAllApplicationAddress1($_POST['uid']);     
       $addressdatil=mysqli_fetch_assoc($addressdatils);
       // echo $_POST['uid'];die;  
 ?>

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Address Detail</h4>
      </div>
      <div class="modal-body">
        <div class="row">
              <div class="col-md-12"><center><h4>Current Address</h4></center></div>      
          <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Address</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($addressdatil['address'])?$addressdatil['address']:'' ?>" placeholder="School name">
            </div>
          </div> 
           <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Locality</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($addressdatil['locality'])?$addressdatil['locality']:'' ?>" placeholder="School name">
            </div>
          </div> 
           <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">State</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($addressdatil['state'])?$addressdatil['state']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">City</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($addressdatil['city'])?$addressdatil['city']:'' ?>" placeholder="">
            </div>
          </div> 
         
        </div>
            <div class="row"> 
        <div class="col-md-6">
             <div class="form-group">
              <label for="available_seat">Pincode</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($addressdatil['pincode'])?$addressdatil['pincode']:'' ?>" placeholder="">
            </div>
          </div>
          <div class="col-md-6">
             <div class="form-group">
              <label for="available_seat"> House Type</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($addressdatil['housetype'])?$addressdatil['housetype']:'' ?>" placeholder="">
            </div>
          </div> 
            
         
        </div>
        <div class="row">
                <div class="col-md-12"><center><h4>Residing Since</h4></center></div>        
          <div class="col-md-6">
             <div class="form-group">
              <label for="available_seat">Years</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($addressdatil['years'])?$addressdatil['years']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-6">
             <div class="form-group">
              <label for="available_seat">Month</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($addressdatil['month'])?$addressdatil['month']:'' ?>" placeholder="">
            </div>
          </div> 
         
        </div>

    
        
        <div class="row">
              <div class="col-md-12"><center><h4>Permanent Address</h4></center></div>      
            <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Address</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($addressdatil['paddress'])?$addressdatil['paddress']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Locality</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($addressdatil['plocality'])?$addressdatil['plocality']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">State</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($addressdatil['pstate'])?$addressdatil['pstate']:'' ?>" placeholder="">
            </div>
          </div> 
           <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">City</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($addressdatil['pcity'])?$addressdatil['pcity']:'' ?>" placeholder="">
            </div>
          </div>
         
        </div>

        <div class="row">
           <div class="col-md-3">
             <div class="form-group">
              <label for="available_seat">Pincode</label>
              <input type="text" class="form-control input-sm" value="<?php echo isset($addressdatil['ppincode'])?$addressdatil['ppincode']:'' ?>" placeholder="">
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    
<?php } ?>