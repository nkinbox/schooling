<?php  
require_once('includes/function.php');
//global $GFH_Admin;
    if(isset($_POST['uid5'])){
      $documentdetails=$GFH_Admin->getApplicationDocument1($_POST['uid5']);
      $documentdetail=mysqli_fetch_assoc($documentdetails);
 ?>

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Documents</h4>
      </div>
      <div class="modal-body">
        <div class="row">
                   
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Child's Photograph</label>
              <?php if(isset($documentdetail['child_photo'])&&!empty($documentdetail['child_photo'])){ ?>

              <a href="../images/child/<?php echo isset($documentdetail['child_photo'])?$documentdetail['child_photo']:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
               <?php } else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat"> Father's/Guardian's Photograph</label>
               <?php if(isset($documentdetail['father_photo'])&&!empty($documentdetail['father_photo'])){ ?>
               <a href="../images/father/<?php echo isset($documentdetail['father_photo'])?$documentdetail['father_photo']:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
                <?php } else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat"> Mother's/Guardian's Photograph</label>
                <?php if(isset($documentdetail['mother_photo'])&&!empty($documentdetail['mother_photo'])){ ?>
                <a href="../images/mother/<?php echo isset($documentdetail['mother_photo'])?$documentdetail['mother_photo']:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
                 <?php } else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
          </div>        
        </div>
            
       <div class="row">
              <!-- <div class="col-md-12"><center><h4>Current Address</h4></center></div>  -->     
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Family Photograph</label>
               <?php if(isset($documentdetail['family_photograph'])&&!empty($documentdetail['family_photograph'])){ ?>
               <a href="../images/family/<?php echo isset($documentdetail['family_photograph'])?$documentdetail['family_photograph']:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
               <?php } else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Address Proof</label>
                <?php if(isset($documentdetail['address_proof'])&&!empty($documentdetail['address_proof'])){
                    $arresspoof=explode(',',$documentdetail['address_proof']);
                    foreach($arresspoof as $addre){ 
                  ?>
               <a href="../images/address_proof/<?php echo isset($addre)?$addre:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
               <?php } }else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Birth Certificate of Child</label>
               <?php if(isset($documentdetail['child_birth_certificate'])&&!empty($documentdetail['child_birth_certificate'])){
                    $childbirthcertificates=explode(',',$documentdetail['child_birth_certificate']);
                    foreach($childbirthcertificates as $birthcertificate){ 
                  ?>
               <a href="../images/child_birth_certificate/<?php echo isset($birthcertificate)?$birthcertificate:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
              <?php } }else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
             </div>
          </div> 
           
        </div>
            
         
        <div class="row">        
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Medical Certificate of child</label>
               <?php if(isset($documentdetail['child_medical_certificate'])&&!empty($documentdetail['child_medical_certificate'])){
                     $child_medical_certificates=explode(',',$documentdetail['child_medical_certificate']);
                    foreach($child_medical_certificates as $medicalcerificate){ 
                  ?>
               <a href="../images/child_medical_certificate/<?php echo isset($medicalcerificate)?$medicalcerificate:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
               <?php } }else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Child's Aadhar Card</label>
               <?php if(isset($documentdetail['child_adhar_card'])&&!empty($documentdetail['child_adhar_card'])){
                $childadharcards=explode(',',$documentdetail['child_adhar_card']);
                    foreach($childadharcards as $childadharcard){ 
                  ?>
               <a href="../images/child_adhar_card/<?php echo isset($childadharcard)?$childadharcard:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
              <?php } }else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
            </div>
          </div> 
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Father's Aadhar Card</label>
              <?php if(isset($documentdetail['father_adhar_card'])&&!empty($documentdetail['father_adhar_card'])){
                $fatheradharcards=explode(',',$documentdetail['father_adhar_card']);
                    foreach($fatheradharcards as $fatheradharcard){ 
                  ?>
               <a href="../images/father/<?php echo isset($fatheradharcard)?$fatheradharcard:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
               <?php } }else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
            </div>
          </div>        
        </div>
            
        <div class="row">        
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Mother's Aadhar Card</label>
               <?php if(isset($documentdetail['mother_adhar_card'])&&!empty($documentdetail['mother_adhar_card'])){
                $motheradharcards=explode(',',$documentdetail['mother_adhar_card']);
                    foreach($motheradharcards as $motheradharcard){ 
                  ?>
               <a href="../images/mother_adhar_card/<?php echo isset($motheradharcard)?$motheradharcard:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
               <?php } }else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
            </div>
          </div>  
        </div>

        <div class="row">
          <h3 class="text-center">Alumni Father</h3>
        </div>
        <div class="row">  

          <div class="col-md-6">
             <div class="form-group">
              <label for="available_seat">CBSE XII Passing Certificate</label>
               <?php if(isset($documentdetail['alumni_father_cbse_12_passing'])&&!empty($documentdetail['alumni_father_cbse_12_passing'])){
                 $alumni_father_cbse_12s=explode(',',$documentdetail['alumni_father_cbse_12_passing']);
                    foreach($alumni_father_cbse_12s as $alumni_father_cbse_12){ 
                  ?>
               <a href="../images/alumni_father_cbse_12_passing/<?php echo isset($alumni_father_cbse_12)?$alumni_father_cbse_12:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
               <?php } }else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
            </div>
          </div> 
           <div class="col-md-6">
             <div class="form-group">
              <label for="available_seat">CBSE XII Marksheet </label>
               <?php if(isset($documentdetail['alumni_father_cbse_12_marksheet'])&&!empty($documentdetail['alumni_father_cbse_12_marksheet'])){
                $alumni_father_12_marksheets=explode(',',$documentdetail['alumni_father_cbse_12_marksheet']);
                    foreach($alumni_father_12_marksheets as $alumni_father_12_marksheet){ 
                  ?>
               <a href="../images/alumni_father_cbse_12_marksheet/<?php echo isset($alumni_father_12_marksheet)?$alumni_father_12_marksheet:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
               <?php } }else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
            </div>
          </div>        
        </div>
        <div class="row">
          <h3 class="text-center">Alumni Mother</h3>
        </div>
        <div class="row">        
          <div class="col-md-6">
             <div class="form-group">
              <label for="available_seat">CBSE XII Passing Certificate</label>
              <?php if(isset($documentdetail['cbse_12_passing_certificate'])&&!empty($documentdetail['cbse_12_passing_certificate'])){
                $alumni_mother_12_passings=explode(',',$documentdetail['cbse_12_passing_certificate']);
                    foreach($alumni_mother_12_passings as $alumni_mother_12_passing){ 
                  ?>
               <a href="../images/alumni_mother_cbse_12_passing/<?php echo isset($alumni_mother_12_passing)?$alumni_mother_12_passing:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
               <?php } }else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
            </div>
          </div> 
           <div class="col-md-6">
             <div class="form-group">
              <label for="available_seat"> CBSE XII Marksheet </label>
                <?php if(isset($documentdetail['cbse_12_marksheet'])&&!empty($documentdetail['cbse_12_marksheet'])){
                  $alumni_mother_12_marksheets=explode(',',$documentdetail['cbse_12_marksheet']);
                    foreach($alumni_mother_12_marksheets as $alumni_mother_12_marksheet){ 
                  ?>
               <a href="../images/alumni_mother_cbse_12_marksheet/<?php echo isset($alumni_mother_12_marksheet)?$alumni_mother_12_marksheet:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
              <?php } }else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
                </div>
          </div>        
        </div>
         <div class="row">
          <h3 class="text-center">Sibling Detail</h3>
        </div>
        <div class="row">        
          <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Sibling Latest School ID Card</label>
              <?php if(isset($documentdetail['latest_school_id_card'])&&!empty($documentdetail['latest_school_id_card'])){
                $alumni_mother_12_marksheets=explode(',',$documentdetail['latest_school_id_card']);
                    foreach($alumni_mother_12_marksheets as $alumni_mother_12_marksheet){ 
                  ?>
               <a href="../images/latest_school_id_card/<?php echo isset($alumni_mother_12_marksheet)?$alumni_mother_12_marksheet:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
               <?php } }else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?> 
            </div>
          </div> 
            
           <div class="col-md-4">
             <div class="form-group">
              <label for="available_seat">Latest Fee Receipt</label>
             <?php if(isset($documentdetail['latest_fee_receipt'])&&!empty($documentdetail['latest_fee_receipt'])){ ?>
               <a href="../images/latest_fee_receipt/<?php echo isset($documentdetail['latest_fee_receipt'])?$documentdetail['latest_fee_receipt']:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>

               <?php } else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
                
            </div>
          </div>         
        </div>

        <div class="row">
          <h3 class="text-center">Single Parent</h3>
        </div>
        

        <div class="row">        
          <div class="col-md-6">
             <div class="form-group">
              <label for="available_seat">Death Certificate</label>
              <?php if(isset($documentdetail['death_certificate'])&&!empty($documentdetail['death_certificate'])){ ?>
                <a href="../images/death_certificate/<?php echo isset($documentdetail['death_certificate'])?$documentdetail['death_certificate']:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
                 <?php } else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
            </div>
          </div>  
        </div>

        <div class="row">
          <h3 class="text-center">Christain/ Catholic</h3>
        </div>
        <div class="row">
          <div class="col-md-6">
             <div class="form-group">
              <label for="available_seat">Letter of the Parish Priest/ Pastor</label>
               <?php if(isset($documentdetail['letter_of_parish_priest'])&&!empty($documentdetail['letter_of_parish_priest'])){ ?>
               <a href="../images/letter_of_parish_priest/<?php echo isset($documentdetail['letter_of_parish_priest'])?$documentdetail['letter_of_parish_priest']:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
                <?php } else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
            </div>
          </div>    

            <div class="col-md-6">
             <div class="form-group">
              <label for="available_seat">Baptism Certificate/ Dedication Certificate</label>
               <?php if(isset($documentdetail['baptism_certificate'])&&!empty($documentdetail['baptism_certificate'])){ ?>
               <a href="../images/baptism_certificate/<?php echo isset($documentdetail['baptism_certificate'])?$documentdetail['baptism_certificate']:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
               <?php } else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
            </div>
          </div>    
        </div>

        <div class="row">
         <hr>
        </div>
        <div class="row">
          <div class="col-md-6">
             <div class="form-group">
              <label for="available_seat">Defence/ Martyr I- Card or Certificate of Department</label>
               <?php if(isset($documentdetail['certificate_of_department'])&&!empty($documentdetail['certificate_of_department'])){ ?>
               <a href="../images/certificate_of_department/<?php echo isset($documentdetail['certificate_of_department'])?$documentdetail['certificate_of_department']:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
               <?php } else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
            </div>
          </div>    

            <div class="col-md-6">
             <div class="form-group">
              <label for="available_seat">Staff Mother</label>
              <?php if(isset($documentdetail['staff_mother_id_card'])&&!empty($documentdetail['staff_mother_id_card'])){ ?>
               <a href="../images/staff_mother_id_card/<?php echo isset($documentdetail['staff_mother_id_card'])?$documentdetail['staff_mother_id_card']:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
                <?php } else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
            </div>
          </div>    
        
          <div class="col-md-6">
             <div class="form-group">
              <label for="available_seat">Staff Father ID Card</label>
              <?php if(isset($documentdetail['staff_father_id_card'])&&!empty($documentdetail['staff_father_id_card'])){ ?>
               <a href="../images/staff_father_id_card/<?php echo isset($documentdetail['staff_father_id_card'])?$documentdetail['staff_father_id_card']:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
               <?php } else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
            </div>
          </div>    
        </div>
        <div class="row">
          <div class="col-md-6">
             <div class="form-group">
              <label for="available_seat">Transfer Certificate (Previous School)</label>
               <?php if(isset($documentdetail['transfer_certificate_previous_school'])&&!empty($documentdetail['transfer_certificate_previous_school'])){ ?>
               <a href="../images/transfer_certificate_previous_school/<?php echo isset($documentdetail['transfer_certificate_previous_school'])?$documentdetail['transfer_certificate_previous_school']:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
               <?php } else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
            </div>
          </div>    

            <div class="col-md-6">
             <div class="form-group">
              <label for="available_seat">Transfer Certificate (State/ Country)</label>
               <?php if(isset($documentdetail['transfercertificate'])&&!empty($documentdetail['transfercertificate'])){ ?>
               <a href="../images/transfercertificate/<?php echo isset($documentdetail['transfercertificate'])?$documentdetail['transfercertificate']:'' ?>" target="_blank" class="btn btn-success btn-sm">View</a>
               <?php } else{ ?>
               <a href="" target="_blank" class="btn btn-warning btn-sm">No Document</a>
               <?php  } ?>
            </div>
          </div>    
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
<?php } ?>