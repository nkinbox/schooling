<?php 
ob_start();
include('header.php');
include('main-sidebar.php');
/*include('includes/function.php');
global $GFH_Admin;
*/
?>
<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<!-- <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
  height:250,
    plugins: [
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table contextmenu paste jbimages"
  ],
   content_css: "css/content.css",
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
   relative_urls: false
 });
</script> -->

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
    <?php


        if(isset($_POST['save_page']))
        {
          
          //echo "<pre>";print_r($_POST);die;
          $GFH_Admin->setPage();
        }

        if(isset($_REQUEST['edit_id']))
        {
          $pageDetails=$GFH_Admin->getPages($_REQUEST['edit_id']);
          $pageDetail=mysqli_fetch_assoc($pageDetails);
          //echo "<pre>";print_r($pageDetail);die;
        }
    ?>
      <!-- Default box -->
      <div class="box">
          <div class="box-header with-border">
          <h3 class="box-title"><?php echo isset($_REQUEST['edit_id'])?'Edit':'Add New'; ?>  Page</h3>
              <?php if(isset($GFH_Admin::$msg) && !empty($GFH_Admin::$msg)){ ?>
            <div class="alert alert-success">
              <strong>Success!</strong> <?php echo $GFH_Admin::$msg; ?>
            </div>
            <?php  } ?>
            <?php if(isset($GFH_Admin::$error) && !empty($GFH_Admin::$error)){ ?>
            <div class="alert alert-warning">
              <strong>Failed!</strong> <?php echo $GFH_Admin::$error; ?>
            </div>
            <?php  } ?>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
    
          <form method="post" role="form" enctype="multipart/form-data">
            <input type="hidden" name="page_id" value="<?php echo isset($pageDetail['page_id'])?$pageDetail['page_id']:''; ?>">

<!--             <div class="form-group">
             <label>Page Parent</label>
                <select name="page_parent_id" required class="form-control">
                                    <option value="0">None</option>
                    <?php

                    $sltcat=mysqli_query(GFHConfig::$link, "select * from pages");
                    while($fetchcat=mysqli_fetch_assoc($sltcat))
                    {
                      //echo "<pre>";print_r($fetchcat);die;
                    ?>
                        <option value="<?php echo $fetchcat['page_id']?>" <?php if(isset($pageDetail['page_parent_id']) && $pageDetail['page_parent_id']==$fetchcat['page_id'])echo "selected='selected'";?>><?php echo isset($fetchcat['page_name'])?$fetchcat['page_name']:'';  ?>
                        </option>
                <?php }?>
                         </select>
            </div> -->

            <div class="form-group">
             <label>Page Title </label>
                <input type="text" class="form-control" style="width:100%;" name="page_name" value="<?php echo isset($pageDetail['page_name'])?$pageDetail['page_name']:''; ?>" placeholder="Enter title...">
            </div>

            <div class="form-group">
                <label >Page Order :</label>
                
                    <input type="text" class="form-control" name="page_order" id="page_order" placeholder="Order"  required="required" value="<?php echo isset($pageDetail['page_order'])?$pageDetail['page_order']:'' ?>">
              
            </div>
            
           <!--  <div class="form-group">
                <label >Page Link :</label>
                
                    <input type="text" class="form-control" name="page_link" id="page_link" placeholder="Page link"   value="<?php echo isset($pageDetail['page_link'])?$pageDetail['page_link']:'' ?>">
              
            </div> -->

            <div class="form-group">
                <label >Status </label>
                <select class="form-control" name="page_status" id="page_status">
                  <option>Select Status</option>
                  <option value="1" <?php echo (isset($pageDetail['page_status'])&&$pageDetail['page_status']==1)?'selected="selected"':'' ?>>Active</option>
                  <option value="0" <?php echo (isset($pageDetail['page_status'])&&$pageDetail['page_status']==0)?'selected="selected"':'' ?>>Inactive</option>
                </select>
            </div>

            

            <div class="form-group">
             <label>Image</label><br>
             <?php  if(isset($pageDetail['page_image'])&&!empty($pageDetail['page_image'])){ ?>
             <img src="../images/page/<?php echo isset($pageDetail['page_image'])?$pageDetail['page_image']:'';  ?>" width="50" height="50" />
             <?php } ?>
                <input type="file"  style="width:100%;" name="page_image" >
            </div>

            <div class="form-group">
             <label>Page Content</label><br>
             <textarea id="editor1" name="page_description" rows="10" cols="80">
                    <?php echo isset($pageDetail['page_description'])?$pageDetail['page_description']:'' ?>
             </textarea>
            </div>

         <!--    <div class="form-group">
               <input type="hidden" name="page_footer" value="0" />  
                 <input name="page_footer" type="checkbox" id="page_footer" value="1" <?php if(isset($pageDetail['page_footer']) && $pageDetail['page_footer']=='1') echo "checked";?>/>  Show in Footer
            </div> -->
            

            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="save_page" value="Save">
            </div>
        </form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <div class="box-footer">
         
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
<?php include('footer.php'); ?>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
});
</script>