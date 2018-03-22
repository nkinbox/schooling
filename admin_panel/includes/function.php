<?php
require_once('config1.php');
require_once('textlocal.class.php');
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
class GFHAdmin extends GFHConfig
{
	public static $msg="";
	public static $error="";

	public function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		if(isset($_POST['login']))
		{
		  if(!empty($_POST['emailid']) && !empty($_POST['emailid']))
		  {
		  	 
		    $emailid=mysqli_real_escape_string(GFHConfig::$link,trim($_POST['emailid']));
		    $password=mysqli_real_escape_string(GFHConfig::$link,trim($_POST['password']));
		    //$pass=md5($password);
		    $sql1="select * from admin where email='".$emailid."' and password='".$password."'";
		    $query=mysqli_query(GFHConfig::$link,$sql1);
		    $arr=mysqli_fetch_array($query);
		    if($emailid==$arr['email'] && $password==$arr['password'])
		    {
		    	//echo "<pre>"; print_r($_POST);die;
		      session_start();
		      $_SESSION['ADMINID']=$arr['id'];
		      $_SESSION['EMAIL']=$arr['email'];
		      $_SESSION['STATUS']=$arr['status'];
		      
		      // $_SESSION['FIRSTNAME']=$arr['first_name'];
		      // $_SESSION['LASTNAME']=$arr['last_name'];
		      header("location:home.php?con=dashboard");
		     
		    }else{
		    	echo "<script>alert('Username & Password is invalid');</script>";
		    }
		    
		  }else{
		  	echo "<script>alert('Username & Password is invalid');</script>";
		  }


		}
	}

	public function logout()
	{
		session_start();
		unset($_SESSION['ID']);
		header("location:index.php");
	}

	public function getAdmin()
	{
		$sql="select * from admin ";	
		return mysqli_query(GFHConfig::$link,$sql);
	}

	public function update_admin()
	{
		if(isset($_POST)&&(count($_POST)>0))
		{

			$admin_id=isset($_POST['admin_id'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['admin_id']):'';
			$username=isset($_POST['username'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['username']):'';
			$email=isset($_POST['email'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['email']):'';
			
			$password=isset($_POST['password'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['password']):'';
			

			$sql="UPDATE admin SET username = '".$username."',email='".$email."',password='".$password."',status=1";
			$sql.="  where id=".$admin_id;
			$result = mysqli_query(GFHConfig::$link,$sql);
			if($result)
			{
				header('location:admin.php?msg=update sucessfully');
			}
				
		}
	}
    public function getActivePages($limit = "")
    {
       
        $sql = "select * from pages where page_status='1' order by page_order";
        if(isset($limit)&&!empty($limit))
        {
            $sql.=" limit ".$limit;
        }
       
        return mysqli_query(GFHConfig::$link, $sql);
    }

	public function getPages($id = "")
    {
        $page_id = isset($id) ? $id : '';
        $sql = "select * from pages";
        if (!empty($page_id)) {
            $sql .= " where page_id=" . $page_id;
        }
         // echo $sql;die;
        return mysqli_query(GFHConfig::$link, $sql);
    }

    public function getPages_by_parentid($id = "")
    {
        $page_id = isset($id) ? $id : '';
        $sql = "select * from pages";
        if (!empty($page_id)) {
            $sql .= " where page_parent_id=" . $page_id;
        }
        return mysqli_query(GFHConfig::$link, $sql);
    }


    public function setPage()
    {
        if (isset($_POST) && (count($_POST) > 0)) {
            // echo "<pre>";print_r($_POST);die;	

            $page_id = isset($_POST['page_id']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['page_id']) : '';
            //$page_parent_id = isset($_POST['page_parent_id']) ? mysqli_real_escape_string(GFHConfig::$link, $_POST['page_parent_id']) : '';
            $page_name = ucfirst(mysqli_real_escape_string(GFHConfig::$link, $_POST['page_name']));
            $page_description = isset($_POST['page_description']) ?mysqli_real_escape_string(GFHConfig::$link, $_POST['page_description']) : '';
            $page_order = isset($_POST['page_order'])?mysqli_real_escape_string(GFHConfig::$link, $_POST['page_order']):'';
            $page_status = isset($_POST['page_status'])?mysqli_real_escape_string(GFHConfig::$link, $_POST['page_status']):'';
            $page_footer = isset($_POST['page_footer'])?mysqli_real_escape_string(GFHConfig::$link, $_POST['page_footer']):'0';
            $page_link = isset($_POST['page_link'])?mysqli_real_escape_string(GFHConfig::$link, $_POST['page_link']):'';
            $page_image = $_FILES['page_image']['name'];
            $allowedExts = array("jpg", "jpeg", "gif", "png","pdf");
            $extension = strtolower(pathinfo($_FILES['page_image']['name'], PATHINFO_EXTENSION));
            if (!empty($page_id)) {
                mysqli_query(GFHConfig::$link, "update pages set page_name='" . $page_name . "', page_description='" .$page_description. "', page_order='" . $page_order . "', page_parent_id='0', page_footer='".$page_footer."',page_link='" . $page_link . "',page_status=" . $page_status . " where page_id=" . $page_id);

                if ($_FILES['page_image']['name'] != "") {

                    if (in_array($extension, $allowedExts)) {

                        $img = $page_image;

                        mysqli_query(GFHConfig::$link, "update pages set page_image='" . $img . "' where page_id=" . $page_id);
                        move_uploaded_file($_FILES['page_image']['tmp_name'], "../images/page/" . $img);
                    }
                }
                header('location:page.php?msg=Page Updated Successfully');

            } else {
                //echo "<pre>"; print_r($_POST);die;
                $check = mysqli_query(GFHConfig::$link, "select * from pages where page_name='" . $page_name . "' and page_status='0'");
                if (mysqli_num_rows($check) < 1) {

                    mysqli_query(GFHConfig::$link, "insert into pages set page_name='" . $page_name . "', page_description='" . $page_description . "', page_order='" . $page_order . "', page_parent_id='" . $page_parent_id . "', page_footer='" . $page_footer . "',page_link='" . $page_link . "',page_status=" . $page_status);
                    $id = mysqli_insert_id(GFHConfig::$link);
                    if ($_FILES['page_image']['name'] != '') {
                        if (in_array($extension, $allowedExts)) {
                            $img = $page_image;
                            mysqli_query(GFHConfig::$link, "update pages set page_image='" . $img . "' where page_id='" . $id . "'");
                            move_uploaded_file($_FILES['page_image']['tmp_name'], "../images/page/" . $img);
                            header('location:page.php?msg=Page added Successfully');
                        } else {
                            header('location:page.php?error=Please Upload jpeg,jpg,png,pdf.');
                        }
                    }
                    header('location:page.php?msg=Page added Successfully');


                    //header("location: add-banner.php?msg=Invalid File. Please select only jpg, jpeg, gif, png files.");
                } else {
                    header('location:add-page.php?msg=Page not  added');
                }
            }
        }
    }

    public function delete_pages($ids = "")
    {
        //echo "<pre>";print_r($ids);die;
        if (!empty($ids)) {
            foreach ($ids as $id) {
                $sql = mysqli_query(GFHConfig::$link, "select * from pages where page_id=" . $id);
                $row = mysqli_fetch_assoc($sql);
                if (!empty($row['page_image'])) {
                    $filename = "../images/page/" . $row['page_image'];

                    if (file_exists($filename)) {
                        unlink($filename);
                    }
                }
                mysqli_query(GFHConfig::$link, "delete from pages where page_id=" . $id);
            }

        }

    }
    
    public function delete_offer($ids = "")
    {
        //echo "<pre>";print_r($ids);die;
        if (!empty($ids)) {
            foreach ($ids as $id) {

                // echo "<pre>";print_r($id);die;
                $sql = mysqli_query(GFHConfig::$link, "SELECT * FROM `tbl_offers` where id=" . $id);
                $row = mysqli_fetch_assoc($sql);
                if (!empty($row['image'])) {
                    $filename = "../images/offer/" . $row['schoolimg'];

                    if (file_exists($filename)) {
                        unlink($filename);
                    }
                }
                mysqli_query(GFHConfig::$link, "DELETE FROM `tbl_offers` WHERE id=".$id);
            }

        }

        return $ids;

    }

    public function delete_school($ids = "")
    {
        //echo "<pre>";print_r($ids);die;
        if (!empty($ids)) {
            foreach ($ids as $id) {

            	// echo "<pre>";print_r($id);die;
                $sql = mysqli_query(GFHConfig::$link, "select * from tbl_school where id=" . $id);
                $row = mysqli_fetch_assoc($sql);
                if (!empty($row['schoolimg'])) {
                    $filename = "../images/school/" . $row['schoolimg'];

                    if (file_exists($filename)) {
                        unlink($filename);
                    }
                }
                mysqli_query(GFHConfig::$link, "delete from tbl_school where id=" . $id);
            }

        }

        return $ids;

    }

    public function siteinfo(){

       // echo "<pre>";print_r($_POST);die;
        $siteinfo_id=isset($_POST['siteinfo_id'])?$_POST['siteinfo_id']:'';
        $email=isset($_POST['email'])?$_POST['email']:'';
        $phone=isset($_POST['phone'])?$_POST['phone']:'';
        $address=isset($_POST['address'])?$_POST['address']:'';
        $total_school=isset($_POST['total_school'])?$_POST['total_school']:'';
        $location=isset($_POST['location'])?$_POST['location']:'';
        $regions=isset($_POST['regions'])?$_POST['regions']:'';
        $years=isset($_POST['years'])?$_POST['years']:'';
        $title=isset($_POST['title'])?$_POST['title']:'';

        if(!empty($siteinfo_id))
        {

            $update=mysqli_query(GFHConfig::$link,"update site_info set email='".$email."',phone='".$phone."',address='".$address."',total_school='".$total_school."',location='".$location."',regions='".$regions."',title='".$title."',years='".$years."' where id='".$siteinfo_id."'");

            if($update)
            {
              header('location:siteinfo.php?msg=update successfully');  
            }
        }
    }

   	public function getSiteinfo(){

        // echo "SELECT `id`, `email`, `phone`, `address`, `total_school`, `location`, `regions`,`title`,`years` FROM `site_info` WHERE id='1'";die;
   		$siteinfos=mysqli_query(GFHConfig::$link,"SELECT `id`, `email`, `phone`, `address`, `total_school`, `location`, `regions`,`title`,`years` FROM `site_info` WHERE id='1'");
        $siteinfo=mysqli_fetch_assoc($siteinfos);
        return $siteinfo;
    }

    public function getRegions($id=""){

    	$sql="SELECT `id`, `name` FROM `tbl_region`";
    	if(isset($id)&&!empty($id))
    	{
    		$sql.=" where id='".$id."'";
    	}
   		$siteinfos=mysqli_query(GFHConfig::$link,$sql);
        
        return $siteinfos;
    }

	public function getUsers($id="")
	{
		$user_id=isset($id)?$id:'';
		$sql="select * from admin";
		if(!empty($user_id))
		{
			$sql.=" where id=".$user_id;
		}
		return mysqli_query(GFHConfig::$link,$sql);
	}

	public function getSchool($id="")
	{
		$sid=isset($id)?$id:'';
		$sql="SELECT * FROM `tbl_school` ";
		if(!empty($sid))
		{
			$sql.=" where id=".$sid;
		}
		return mysqli_query(GFHConfig::$link,$sql);
	}


	public function bulk_product_upload(){
        if(isset($_POST['importSubmit'])) {

            //validate whether uploaded file is a csv file
            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
            if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
                if (is_uploaded_file($_FILES['file']['tmp_name'])) {

                    //open uploaded csv file with read only mode
                    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

                    //skip first line
                    fgetcsv($csvFile);
                    //parse data from csv file line by line
                    while (($getData = fgetcsv($csvFile)) !== FALSE) {

                        // $check = mysqli_query(GFHConfig::$link, "SELECT * FROM `tbl_school` where name='$getData[1]'");
                        // if (mysqli_num_rows($check) > 0) {

                        // $sql="UPDATE `tbl_school` SET `school_id`='$getData[0]',`name`='$getData[1]',`school_gender`='$getData[2]',`school_region`='$getData[3]',`service_fee`='$getData[4]',`alert_fee`='$getData[5]',`address`='$getData[6]',`status`='$getData[7]',`updated_at`=now() where name='$getData[1]'";

                           

                        //} else {

                           $sql="insert into  `tbl_school` SET `school_id`='$getData[0]',`name`='$getData[1]',`school_gender`='$getData[2]',`school_region`='$getData[3]',`service_fee`='$getData[4]',`alert_fee`='$getData[5]',`address`='$getData[6]',`status`='$getData[7]',`schoolimg`='$getData[8]',`created_at`=now(),`updated_at`=now()";

                        //}

                        $result = mysqli_query(GFHConfig::$link, $sql);
                        if (!$result) {
                            printf("Error: %s\n", mysqli_error(GFHConfig::$link));
                        }
                        else{
                            header('location:school.php');
                           // echo "<script>window.location='school.php?msg=Uploaded successfully';</script>";
                        }

                    }

                    //close opened csv file
                    fclose($csvFile);


                }
            }
        }

    }

	public function setRegions()
	{

		//echo "<pre>";print_r($_POST);die;
		$response=array();
		
			$name=isset($_POST['name'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['name']):'';
			$region_id=isset($_POST['region_id'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['region_id']):'';
			
			
			if(isset($region_id)&&!empty($region_id))
			{

				$sql1="UPDATE `tbl_region` SET `name`='".$name."' WHERE id='".$region_id."'";

				// echo $sql1;die;
				$update_newrides = mysqli_query(GFHConfig::$link,$sql1);
				

			$response=array('status'=>'update','msg'=>'update successfully');
				
			}else{
				//echo "<pre>";print_r($_POST);die;
				$sql1="INSERT INTO `tbl_region` SET `name`='".$name."'";
				//echo $sql1;die;
				$insert_newride = mysqli_query(GFHConfig::$link,$sql1);
				$inserid=mysqli_insert_id(GFHConfig::$link);
		
					$response=array('status'=>'inserted','msg'=>'inserted successfully');
				
			}
		

		return $response;
	}

	public function delete_region($ids = "")
    {
        //echo "<pre>";print_r($ids);die;
        if (!empty($ids)) {
            foreach ($ids as $id) {
                
                mysqli_query(GFHConfig::$link, "DELETE FROM `tbl_region` WHERE id=".$id);
            }

        }
        return $ids;

    }

    public function getOffer($id="")
    {
        $sid=isset($id)?$id:'';
        $sql="SELECT * FROM `tbl_offers` ";
        if(!empty($sid))
        {
            $sql.=" where id=".$sid;
        }
        return mysqli_query(GFHConfig::$link,$sql);
    }

    public function getActiveOffer()
    {
        //$sid=isset($id)?$id:'';
        $sql="SELECT * FROM `tbl_offers` where status='1'";
       
        return mysqli_query(GFHConfig::$link,$sql);
    }


    public function offer()
    {

        // echo "<pre>";print_r($_POST);die;
        $response=array();
        
            $offer_id=isset($_POST['offer_id'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['offer_id']):'';
            
            $title=isset($_POST['title'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['title']):'';
            $discount_title=isset($_POST['discount_title'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['discount_title']):'';
            $discount_percent=isset($_POST['discount_percent'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['discount_percent']):'';

            $promocode=isset($_POST['promocode'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['promocode']):'';
           
            $oldimg=isset($_POST['oldimg'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['oldimg']):'';
            $bgcolor=isset($_POST['bgcolor'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['bgcolor']):'';
            $status=isset($_POST['status'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['status']):'';
            $allowedExts = array("jpg", "jpeg", "gif", "png");
            $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            
            //echo "<pre>";print_r($carname);die;

            if(isset($offer_id)&&!empty($offer_id))
            {

                $sql1="UPDATE `tbl_offers` SET `title`='".$title."',`discount_title`='".$discount_title."',`discount_percent`='".$discount_percent."',`promocode`='".$promocode."',`status`='".$status."',bgcolor='".$bgcolor."',`updated_at`=now() WHERE id='".$offer_id."'";

                // echo $sql1;die;
                $update_newrides = mysqli_query(GFHConfig::$link,$sql1);
                if($update_newrides)
                {
                    if($_FILES['image']['name'] != "") {
                        unlink('../images/offer/'.$oldimg);
                        if (in_array($extension, $allowedExts)) {

                            $img = "offer-" . $offer_id . "." . $extension;

                            mysqli_query(GFHConfig::$link, "update tbl_offers set image='" . $img . "' where id=" . $offer_id);
                            move_uploaded_file($_FILES['image']['tmp_name'], "../images/offer/" . $img);
                        }
                    }

                    $response=array('status'=>'update','msg'=>'update successfully');
                }else{
                    $response=array('status'=>'failed','error'=>'mysql error');
                }

            }else{
                //echo "<pre>";print_r($_POST);die;
                $sql1="INSERT INTO `tbl_offers` SET `title`='".$title."',`discount_title`='".$discount_title."',`discount_percent`='".$discount_percent."',`promocode`='".$promocode."',`status`='".$status."',bgcolor='".$bgcolor."',`created_at`=now()";
                // echo $sql1;die;
                $insert_newride = mysqli_query(GFHConfig::$link,$sql1);
                $inserid=mysqli_insert_id(GFHConfig::$link);
                if($insert_newride)
                {
                    if ($_FILES['image']['name'] != "") {
                        if (in_array($extension, $allowedExts)) {

                            $img = "school-".$inserid.".".$extension;

                            mysqli_query(GFHConfig::$link,"update tbl_offers set image='" . $img . "' where id=".$inserid);
                            move_uploaded_file($_FILES['image']['tmp_name'], "../images/offer/" . $img);
                        }
                    }
                    $response=array('status'=>'inserted','msg'=>'inserted successfully');
                }else{
                    $response=array('status'=>'failed','error'=>'mysql error');
                }
            }
       

        return $response;
    }


	public function setSchool()
	{

		//echo "<pre>";print_r($_POST);die;
		$response=array();
		if(!empty($_POST['name']) && !empty($_POST['school_gender']) && !empty($_POST['address']))
		{
			$school_id=isset($_POST['school_id'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['school_id']):'';
			
			$name=isset($_POST['name'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['name']):'';
			$school_gender=isset($_POST['school_gender'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['school_gender']):'';
			$school_region=isset($_POST['school_region'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['school_region']):'';

			$service_fee=isset($_POST['service_fee'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['service_fee']):'';
			$alert_fee=isset($_POST['alert_fee'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['alert_fee']):'';
			$address=isset($_POST['address'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['address']):'';
			$oldimg=isset($_POST['oldimg'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['oldimg']):'';
			$status=isset($_POST['status'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['status']):'';
			$allowedExts = array("jpg", "jpeg", "gif", "png");
            $extension = strtolower(pathinfo($_FILES['schoolimg']['name'], PATHINFO_EXTENSION));
			
			//echo "<pre>";print_r($carname);die;

			if(isset($school_id)&&!empty($school_id))
			{

				$sql1="UPDATE `tbl_school` SET `name`='".$name."',`school_gender`='".$school_gender."',`school_region`='".$school_region."',`service_fee`='".$service_fee."',`alert_fee`='".$alert_fee."',`address`='".$address."',`status`='".$status."',`updated_at`=now() WHERE id='".$school_id."'";

				//echo $sql1;die;
				$update_newrides = mysqli_query(GFHConfig::$link,$sql1);
				if($update_newrides)
				{
					if ($_FILES['schoolimg']['name'] != "") {
						unlink('../images/school/'.$oldimg);
	                    if (in_array($extension, $allowedExts)) {

	                        $img = "school-" . $school_id . "." . $extension;

	                        mysqli_query(GFHConfig::$link, "update tbl_school set schoolimg='" . $img . "' where id=" . $school_id);
	                        move_uploaded_file($_FILES['schoolimg']['tmp_name'], "../images/school/" . $img);
	                    }
	                }

					$response=array('status'=>'update','msg'=>'update successfully');
				}else{
					$response=array('status'=>'failed','error'=>'mysql error');
				}

			}else{
				//echo "<pre>";print_r($_POST);die;
				$sql1="INSERT INTO `tbl_school` SET `name`='".$name."',`school_id`=UUID(),`school_gender`='".$school_gender."',`school_region`='".$school_region."',`service_fee`='".$service_fee."',`alert_fee`='".$alert_fee."',`address`='".$address."',`status`='".$status."',`created_at`=now()";
				//echo $sql1;die;
				$insert_newride = mysqli_query(GFHConfig::$link,$sql1);
				$inserid=mysqli_insert_id(GFHConfig::$link);
				if($insert_newride)
				{
					if ($_FILES['schoolimg']['name'] != "") {
	                    if (in_array($extension, $allowedExts)) {

	                        $img = "school-".$inserid.".".$extension;

	                        mysqli_query(GFHConfig::$link,"update tbl_school set school_id='SC".$inserid."',schoolimg='" . $img . "' where id=".$inserid);
	                        move_uploaded_file($_FILES['schoolimg']['tmp_name'], "../images/school/" . $img);
	                    }
	                }
					$response=array('status'=>'inserted','msg'=>'inserted successfully');
				}else{
					$response=array('status'=>'failed','error'=>'mysql error');
				}
			}
		}else{
			$response=array('status'=>'empty','error'=>'Please enter required field.');
		}

		return $response;
	}

	public function single_delete($id="")
	{
		$response="";
	     if(isset($id)&&!empty($id))
	     {
	     	mysqli_query(GFHConfig::$link,"delete from car_details where vehicle_id=".$id);
	     	
	     	$response=true;
	     }
	     return $response;
	}


	public function getRegisterUsers($id="")
	{

		$id=isset($id)?$id:'';
		 $sql="SELECT * FROM `tbl_register`";
		if(!empty($id))
		{
			$sql.=" where id=".$id;
		}
        $sql.=" order by id desc";
		return mysqli_query(GFHConfig::$link,$sql);
	}

    public function getUserdata()
    {

       
         $sql="SELECT * FROM `tbl_register` as t1 inner join  `tbl_order` as t2 on t1.id=t2.id inner join `tbl_orderdetail` as t3 on t3.oid=t2.id";
    
        //$sql.=" order by id desc";
        return mysqli_query(GFHConfig::$link,$sql);
    }

	public function formAppliedUsers()
	{
		$sql="SELECT R.`id`, R.`name`, R.`email`, R.`phone`, R.`first_name`, R.`last_name`, R.`gender`, R.`address`, R.`password`, R.`status`,A A.`application_id`, A.`fk_userid`, A.`address`, A.`locality`, A.`state`, A.`city`, A.`years`, A.`month`,A. `paddress`, A.`pincode`, A.`plocality`, A.`housetype`, A.`pstate`, A.`pcity`, A.`ppincode`, A.`status`, A.`created_at` FROM `tbl_register` R inner join tbl_application_form_address A on R.id=A.fk_userid  where ";
		mysqli_query(GFHConfig::$link,$sql);
	}


	public function registerUsers()
	{
		$response=array();
		 // echo "<pre>";print_r($_POST);die;
		
			$userid=isset($_POST['user_id'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['user_id']):'';
			
			$first_name=isset($_POST['first_name'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['first_name']):'';
			$last_name=isset($_POST['last_name'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['last_name']):'';
			$email=isset($_POST['email'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['email']):'';
			$phone=isset($_POST['phone'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['phone']):'';
			$gender=isset($_POST['gender'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['gender']):'';
			$address=isset($_POST['address'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['address']):'';
			$password=isset($_POST['password'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['password']):'';


			if(isset($userid)&&!empty($userid))
			{
				$sql1="update  tbl_register SET first_name='".$first_name."',last_name='".$last_name."',email='".$email."', phone ='".$phone."',address='".$address."',password='".$password."',gender='".$gender."',status='1',updated_at=now() where id='".$userid."'";
				// echo $sql1;die;
				$update_users = mysqli_query(GFHConfig::$link,$sql1);
				if($update_users)
				{
					$response=array('status'=>'update','msg'=>'update successfully');
				}else{
					$response=array('status'=>'failed','error'=>'mysql error');
				}

			}else{
				$sql1="insert into  tbl_register SET first_name='".$first_name."',last_name='".$last_name."',email='".$email."', phone ='".$phone."',address='".$address."',password='".$password."',gender='".$gender."',status='1',created_at=now()";
				$insert_users = mysqli_query(GFHConfig::$link,$sql1);
				if($insert_users)
				{
					$response=array('status'=>'inserted','msg'=>'inserted successfully');
				}else{
					$response=array('status'=>'failed','error'=>'mysql error');
				}
			}
		

		return $response;
	}

	public function delete_users($ids="")
	{
		$response=array();

	     if(isset($ids)&&!empty($ids))
	     {
	     	foreach($ids as $id){
	     		$res=mysqli_query(GFHConfig::$link,"delete from tbl_register where id=".$id);
	     		if($res)
	     		{
                    $this->delete_formaddress($id);
                    $this->delete_formchilddetail($id);
                    $this->delete_formfatherdetail($id);
                    $this->delete_formmotherdetail($id);
                    $this->delete_formsibling($id);
                    $this->delete_Orders($id);
                    $this->delete_formdocument($id);
                    
	     			$response=true;
	     		}
	     	}
	     }
	    return $response;
	}

    public function delete_formaddress($id)
    {
        $response=false;
        if(isset($id)&&!empty($id))
        {
            $res=mysqli_query(GFHConfig::$link,"DELETE FROM `tbl_application_form_address` WHERE fk_userid='".$id."'");
            if($res)
            {
                $response=true;
            }
        }
       
          return $response;
    }

    public function delete_formchilddetail($id)
    {
        $response=false;
        if(isset($id)&&!empty($id))
        {
            $res=mysqli_query(GFHConfig::$link,"DELETE FROM `tbl_application_form_childdetail` WHERE userid='".$id."'");
            if($res)
            {
                $response=true;
            }
        }
       
        return $response;
          
    }

    public function delete_formfatherdetail($id)
    {
        $response=false;
        if(isset($id)&&!empty($id))
        {
            $res=mysqli_query(GFHConfig::$link,"DELETE FROM `tbl_application_form_father` WHERE fk_userid='".$id."'");
            if($res)
            {
                $response=true;
            }
        }
       
        return $response;
          
    }

    public function delete_formmotherdetail($id)
    {
        $response=false;
        if(isset($id)&&!empty($id))
        {
            $res=mysqli_query(GFHConfig::$link,"DELETE FROM `tbl_application_form_mother` WHERE `userid`='".$id."'");
            if($res)
            {
                $response=true;
            }
        }
       
        return $response;
          
    }

    public function delete_formsibling($id)
    {
        $response=false;
        if(isset($id)&&!empty($id))
        {
            $sql="SELECT * FROM `tbl_sibling` WHERE userid='".$id."'";
            $results=mysqli_query(GFHConfig::$link,$sql);
            $result=mysqli_fetch_assoc($results);
            mysqli_query(GFHConfig::$link,"DELETE FROM `tbl_sibling_detail` WHERE `fk_id`='".$result['id']."'");
            $res1=mysqli_query(GFHConfig::$link,"DELETE FROM `tbl_sibling` WHERE userid='".$id."'");
            if($res1)
            {
                $response=true;
            }
        }
       
        return $response;  
    }

    public function delete_formdocument($id)
    {
        $response=false;
        if(isset($id)&&!empty($id))
        {
            $sql="SELECT * FROM `tbl_sibling_document` WHERE userid='".$id."'";
            $results=mysqli_query(GFHConfig::$link,$sql);
            $result=mysqli_fetch_assoc($results);
            @unlink('../images/child/'.$result['child_photo']);
            @unlink('../images/father/'.$result['father_photo']);
            @unlink('../images/mother/'.$result['mother_photo']);
            @unlink('../images/family/'.$result['family_photograph']);
            @unlink('../images/address_proof/'.$result['address_proof']);
            @unlink('../images/child_birth_certificate/'.$result['child_birth_certificate']);
            @unlink('../images/child_medical_certificate/'.$result['child_medical_certificate']);
            @unlink('../images/child_adhar_card/'.$result['child_adhar_card']);
            @unlink('../images/father/'.$result['father_adhar_card']);
            @unlink('../images/mother_adhar_card/'.$result['mother_adhar_card']);
            @unlink('../images/alumni_father_cbse_12_passing/'.$result['alumni_father_cbse_12_passing']);
            @unlink('../images/alumni_father_cbse_12_marksheet/'.$result['alumni_father_cbse_12_marksheet']);
            @unlink('../images/alumni_mother_cbse_12_passing/'.$result['cbse_12_passing_certificate']);
            @unlink('../images/alumni_mother_cbse_12_marksheet/'.$result['cbse_12_marksheet']);
            @unlink('../images/latest_school_id_card/'.$result['latest_school_id_card']);
            @unlink('../images/latest_fee_receipt/'.$result['latest_fee_receipt']);
            @unlink('../images/death_certificate/'.$result['death_certificate']);
            @unlink('../images/letter_of_parish_priest/'.$result['letter_of_parish_priest']);
            @unlink('../images/baptism_certificate/'.$result['baptism_certificate']);
            @unlink('../images/certificate_of_department/'.$result['certificate_of_department']);
            @unlink('../images/staff_father_id_card/'.$result['staff_mother_id_card']);
            @unlink('../images/father/'.$result['staff_father_id_card']);
            @unlink('../images/previous_school_certificate/'.$result['transfer_certificate_previous_school']);
            @unlink('../images/transfercertificate/'.$result['transfercertificate']);
            $res1=mysqli_query(GFHConfig::$link,"DELETE FROM `tbl_sibling_document` WHERE userid='".$id."'");
            if($res1)
            {
                $response=true;
            }
        }
       
        return $response;  
    }

    public function delete_Orders($id)
    {
        $sql="SELECT * FROM `tbl_order` WHERE userid='".$id."'";
        $results=mysqli_query(GFHConfig::$link,$sql);
        $result=mysqli_fetch_assoc($results);
        mysqli_query(GFHConfig::$link,"DELETE FROM `tbl_orderdetail` WHERE oid='".$result['id']."'");
        mysqli_query(GFHConfig::$link,"DELETE FROM `tbl_order` WHERE id='".$result['id']."'");
    }

	public function getBookingDetails($id="")
	{
		$booking_id=isset($id)?$id:'';
		$sql="SELECT `id`, `name`, `email`,`pickupdate`, `phone`, `pickupcity`, `dropcity`, `pickupaddress`, `dropaddress`, `entry_date`, `totalamount`, `carid`, `pickuptime`  FROM `tbl_bookinginfo` ";
		if(!empty($booking_id))
		{
			$sql.=" where B.id=".$booking_id;
		}
		$sql.=" order by id desc";
		return mysqli_query(GFHConfig::$link,$sql);
	}

	public function getRentalBooking($id="")
	{
		$booking_id=isset($id)?$id:'';
		$sql="SELECT `id`, `name`, `email`, `phone`, `package`, `pickupdate`, `pickuptime`, `pickupcity`, `pickupaddress`, `totalamount`, `carid`, `status`, `entry_date` FROM `tbl_booking_rental_car` ";
		if(!empty($booking_id))
		{
			$sql.=" where B.id=".$booking_id;
		}
		$sql.=" order by id desc";
		return mysqli_query(GFHConfig::$link,$sql);
	}

	public function booking_detail()
	{
		$response=array();
		 //echo "<pre>";print_r($_POST);die;
		if(count($_POST)>0)
		{
			$booking_id=isset($_POST['booking_id'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['booking_id']):'';
			
			$userid=isset($_POST['userid'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['userid']):'';
			$invoice_no=isset($_POST['invoice_no'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['invoice_no']):'';
			$name=isset($_POST['name'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['name']):'';
			$email=isset($_POST['email'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['email']):'';
			$gender=isset($_POST['gender'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['gender']):'';
			$age=isset($_POST['age'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['age']):'';
			$phone=isset($_POST['phone'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['phone']):'';
			$total_traveller=isset($_POST['total_traveller'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['total_traveller']):'';
			$fare_per=isset($_POST['fare_per'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['fare_per']):'';
			$total_fare=isset($_POST['total_fare'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['total_fare']):'';
			$cab_type=isset($_POST['cab_type'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['cab_type']):'';
			$start_from=isset($_POST['start_from'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['start_from']):'';
			$end_to=isset($_POST['end_to'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['end_to']):'';
			$booking_date=isset($_POST['booking_date'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['booking_date']):'';
			$travel_date=isset($_POST['travel_date'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['travel_date']):'';
			$booking_status=isset($_POST['booking_status'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['booking_status']):'';
		


			if(isset($booking_id)&&!empty($booking_id))
			{
				$sql1="update confirm_booking SET userid='".$userid."',name='".$name."',email='".$email."', phone ='".$phone."',gender='".$gender."',age='".$age."',";
				$sql1.=" phone='".$phone."',total_traveller='".$total_traveller."',fare_per='".$fare_per."',";
				$sql1.=" total_fare='".$total_fare."',cab_type='".$cab_type."',start_from='".$start_from."',";
				$sql1.=" end_to='".$end_to."',booking_date='".$booking_date."',travel_date='".$travel_date."',";
				$sql1.=" booking_status='".$booking_status."'";
				$sql1.=" where id='".$booking_id."'";

				//echo $sql1;die;
				$update_users = mysqli_query(GFHConfig::$link,$sql1);
				if($update_users)
				{
					$this->sendnotification();
					$response=array('status'=>'update','msg'=>'update successfully');
				}else{
					$response=array('status'=>'failed','error'=>'mysql error');
				}

			}else{
				$sql1="insert into confirm_booking SET userid='".$userid."',name='".$name."',email='".$email."', phone ='".$phone."',gender='".$gender."',age='".$age."',";
				$sql1.=" phone='".$phone."',total_traveller='".$total_traveller."',fare_per='".$fare_per."',";
				$sql1.=" total_fare='".$total_fare."',cab_type='".$cab_type."',start_from='".$start_from."',";
				$sql1.=" end_to='".$end_to."',booking_date='".$booking_date."',travel_date='".$travel_date."',";
				$sql1.=" booking_status='".$booking_status."'";
				$insert_users = mysqli_query(GFHConfig::$link,$sql1);
				if($insert_users)
				{
					$response=array('status'=>'inserted','msg'=>'inserted successfully');
				}else{
					$response=array('status'=>'failed','error'=>'mysql error');
				}
			}
		}else{
			$response=array('status'=>'empty','error'=>'Please enter required field.');
		}

		return $response;
	}

	public function sendnotification()
	{

		$acceptResponse=array();
		$acceptResponse["vechileId"]=98;
		$acceptResponse["vechileType"]="dbsnmsdfbm";
		$acceptResponse["from"]="fshdkjhasf";
		$acceptResponse["to"]="fdsjkjhskfd";
		$acceptResponse["booking date"]="00000000";

			$msgJsonData=$mesg=json_encode($acceptResponse);
			$title=$title="successfully accepted ";
			$userId=$userid=1;

			$path_to_fcm="https://fcm.googleapis.com/fcm/send";

			$server_key="AAAA6pWtd9Q:APA91bFnzjGV8w418oJzDXqEvIYWsUm139Up7_Ftx6VNxGaeO98jShpyG8Z7D802v4_zN58chZFlE3u_H3XjQ85N25C6dF90P3NTRmhgmigqJvpVPlLz-G5UksWDu7FMmoahWErVR1RF";

			$sql="select deviceid from users where  id='".$userId."'";

			$results=mysqli_query(GFHConfig::$link,$sql);
			$row=mysqli_fetch_row($results);
			$key=$row[0];

			//$key="fbDNkbe6EXE:APA91bGwYBPY-kIID0AG4DMxaa5j-nhLyHxV3Fj8Ovq6u3n5_Ir9OmlksQgHjbFA0WKy1l6ZnUc--1o2DpGs5NvEt9aBiB6dhGGyE7zsWqRff7Vijor17qmH22g-g1SIww8rgj8JUc3e";

			$headers=array('Authorization:key='.$server_key,'Content-type:application/json');

			$fields=array('to'=>$key,'data'=>array('title'=>$title,'body'=>json_encode($msgJsonData)));

			$payload=json_encode($fields);
			$curl_session=curl_init();
			curl_setopt($curl_session,CURLOPT_URL,$path_to_fcm);
			curl_setopt($curl_session,CURLOPT_POST,true);
			curl_setopt($curl_session,CURLOPT_HTTPHEADER,$headers);
			curl_setopt($curl_session,CURLOPT_RETURNTRANSFER,true);
			curl_setopt($curl_session,CURLOPT_SSL_VERIFYPEER,false);
			curl_setopt($curl_session,CURLOPT_IPRESOLVE,CURL_IPRESOLVE_V4);
			curl_setopt($curl_session,CURLOPT_POSTFIELDS,$payload);

			$result=curl_exec($curl_session);

			if($result)
			{
				return  true;
			}else{
				return  false;
			}

	}

	public function delete_booking($ids="")
	{
		$response=array();

	     if(isset($ids)&&!empty($ids))
	     {
	     	foreach($ids as $id){
	     		$res=mysqli_query(GFHConfig::$link,"delete from tbl_bookinginfo where id=".$id);
	     		if($res)
	     		{
	     			$response=true;
	     		}
	     	}
	     }
	    return $response;
	}

	public function delete_rental_booking($ids="")
	{
		$response=array();

	     if(isset($ids)&&!empty($ids))
	     {
	     	foreach($ids as $id){
	     		$res=mysqli_query(GFHConfig::$link,"delete from tbl_booking_rental_car where id=".$id);
	     		if($res)
	     		{
	     			$response=true;
	     		}
	     	}
	     }
	    return $response;
	}

	public function single_booking_detail_delete($id="")
	{
		$response="";
	     if(isset($id)&&!empty($id))
	     {
	     	mysqli_query(GFHConfig::$link,"delete from confirm_booking where id=".$id);
	     	
	     	$response=true;
	     }
	     return $response;
	}

	public function getfeedback($id="")
	{
		$user_id=isset($id)?$id:'';
		$sql="select * from feedback";
		if(!empty($user_id))
		{
			$sql.=" where id=".$user_id;
		}
		return mysqli_query(GFHConfig::$link,$sql);
	}

	public function feedback()
	{
		$response=array();
		
			$feedback_id=isset($_POST['feedback_id'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['feedback_id']):'';
			$userid=isset($_POST['userid'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['userid']):'';
			
			$customer_name=isset($_POST['customer_name'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['customer_name']):'';
			$email_id=isset($_POST['email_id'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['email_id']):'';
			$feedback_content=isset($_POST['feedback_content'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['feedback_content']):'';
			$rating=isset($_POST['rating'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['rating']):'';
		

			if(isset($feedback_id)&&!empty($feedback_id))
			{
				 // echo "<pre>";print_r($_POST);die;
				$sql1="update feedback SET userid='".$userid."',customer_name='".$customer_name."', email_id ='".$email_id."',feedback_content='".$feedback_content."',rating='".$rating."',status='1',entry_date=now() where id='".$feedback_id."'";
				//echo $sql1;die;
				$update_users = mysqli_query(GFHConfig::$link,$sql1);
				if($update_users)
				{
					$response=array('status'=>'update','msg'=>'update successfully');
				}else{
					$response=array('status'=>'failed','error'=>'mysql error');
				}

			}else{
				$sql1="insert into feedback SET userid='".$userid."',customer_name='".$customer_name."', email_id ='".$email_id."',feedback_content='".$feedback_content."',rating='".$rating."',status='1',entry_date=now()";
				$insert_users = mysqli_query(GFHConfig::$link,$sql1);
				if($insert_users)
				{
					$response=array('status'=>'inserted','msg'=>'inserted successfully');
				}else{
					$response=array('status'=>'failed','error'=>'mysql error');
				}
			}
		

		return $response;
	}

	public function deletefeedback()
	{
		$response=array();

	     if(isset($ids)&&!empty($ids))
	     {
	     	foreach($ids as $id){
	     		$res=mysqli_query(GFHConfig::$link,"delete from feedback where id=".$id);
	     		if($res)
	     		{
	     			$response=true;
	     		}
	     	}
	     }
	    return $response;
	}

	public function getComplain($id="")
	{
		$user_id=isset($id)?$id:'';
		$sql="select * from complain";
		if(!empty($user_id))
		{
			$sql.=" where id=".$user_id;
		}
		return mysqli_query(GFHConfig::$link,$sql);
	}

	public function complain()
	{
		$response=array();
			 //echo "<pre>";print_r($_POST);die;
			$complain_id=isset($_POST['complain_id'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['complain_id']):'';
			$username=isset($_POST['username'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['username']):'';
			
			$phone=isset($_POST['phone'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['phone']):'';
			$email_id=isset($_POST['email_id'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['email_id']):'';
			$complain_content=isset($_POST['complain_content'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['complain_content']):'';
			$complain_date=isset($_POST['complain_date'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['complain_date']):'';
		

			if(isset($complain_id)&&!empty($complain_id))
			{
				
				$sql1="update  complain SET username='".$username."',phone='".$phone."', email_id ='".$email_id."',complain_content='".$complain_content."',complain_date='".$complain_date."',status='1',entry_date=now() where id='".$complain_id."'";
				//echo $sql1;die;
				$update_users = mysqli_query(GFHConfig::$link,$sql1);
				if($update_users)
				{
					$response=array('status'=>'update','msg'=>'update successfully');
				}else{
					$response=array('status'=>'failed','error'=>'mysql error');
				}

			}

		return $response;
	}

	public function deletecomplain($ids)
	{
		$response=array();
		//echo "<pre>";print_r($_POST);die;
	     if(isset($ids)&&!empty($ids))
	     {
	     	foreach($ids as $id){
	     		//echo "delete from complain where id=".$id;die;
	     		$res=mysqli_query(GFHConfig::$link,"delete from complain where id=".$id);
	     		if($res)
	     		{
	     			$response=true;
	     		}
	     	}
	     }
	    return $response;
	}

	public function setcity()
	{
		//echo "<pre>";print_r($_POST);die;
		$city_id=isset($_POST['city_id'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['city_id']):'';
			
		$city=isset($_POST['city'])?mysqli_real_escape_string(GFHConfig::$link,trim($_POST['city'])):'';
		$status=isset($_POST['status'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['status']):'';
		
		$package=isset($_POST['package'])?implode(',',$_POST['package']):'';
		if(isset($city_id)&&!empty($city_id))
		{
			$sql1="update city SET name='".$city."',status='".$status."',package='".$package."',updated_at=now() where id='".$city_id."'";
			$update_city = mysqli_query(GFHConfig::$link,$sql1);
			if($update_city)
			{

				if(isset($_POST['subcity']))
				{
					$this->subcity($city_id,$city,$_POST['subcity']);
				}

				$response=array('status'=>'update','msg'=>'update successfully');
			}else{
				$response=array('status'=>'failed','error'=>'mysql error');
			}

		}else{
			//echo "<pre>";print_r($_POST);die;
			$sql1="insert into city SET name='".$city."',status='".$status."',package='".$package."',created_at=now()";
			//echo $sql1;die;
			$insert_city = mysqli_query(GFHConfig::$link,$sql1);
			if($insert_city)
			{
				$this->subcity($insert_city,$city,$_POST['subcity']);
				$response=array('status'=>'inserted','msg'=>'inserted successfully');
			}else{
				$response=array('status'=>'failed','error'=>'mysql error');
			}
		}

			return $response;
	}

	public function subcity($cityid,$city,$subcitys){

		if(isset($subcitys))
		{
			mysqli_query(GFHConfig::$link,"DELETE FROM `tbl_subcity` WHERE fk_citiid='".$cityid."'");
			foreach($subcitys as $subcity)
			{
				if(!empty($subcity))
				{
					mysqli_query(GFHConfig::$link,"INSERT INTO `tbl_subcity` SET `fk_citiid`='".$cityid."',`sname`='".$subcity."',cityname='".$city."'");
				}
				
			}
			
		}
		
	}

	public function getCity($id="")
	{
		$user_id=isset($id)?$id:'';
		$sql="select * from city";
		if(!empty($user_id))
		{
			$sql.=" where id=".$user_id;
		}
		return mysqli_query(GFHConfig::$link,$sql);
	}

	public function getSubCity($id="")
	{
		$id=isset($id)?$id:'';
		$sql="select * from tbl_subcity";
		if(!empty($id))
		{
			$sql.=" where fk_citiid=".$id;
		}
		return mysqli_query(GFHConfig::$link,$sql);
	}

	public function deletecity($ids)
	{
		$response=array();
		//echo "<pre>";print_r($_POST);die;
	     if(isset($ids)&&!empty($ids))
	     {
	     	foreach($ids as $id){
	     		//echo "delete from complain where id=".$id;die;
	     		$res=mysqli_query(GFHConfig::$link,"delete from city where id=".$id);
	     		if($res)
	     		{
	     			$response=true;
	     		}
	     	}
	     }
	    return $response;
	}

	public function getCar($id="")
	{
		$id=isset($id)?$id:'';
		$sql="SELECT * FROM `tbl_car_type`";
		if(!empty($user_id))
		{
			$sql.=" where id='".$id."'";
		}
		return mysqli_query(GFHConfig::$link,$sql);
	}


	public function setRegisterByEmail()
	{
		if(count($_POST)>0)
		{
			$email=isset($_POST['email'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['email']):'';
			
			$password=isset($_POST['password'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['password']):'';
			$check=mysqli_query(GFHConfig::$link,"SELECT * FROM `tbl_register` WHERE `email`='".$email."'");
			if(mysqli_num_rows($check)>0)
			{
				$response=array('status'=>'failed','error'=>'User already exists');
			}else{
			$sql1="INSERT INTO `tbl_register` SET `email`='".$email."',`password`='".$password."',status='1',created_at=now()";
			//echo $sql1;die;
			$insert_user = mysqli_query(GFHConfig::$link,$sql1);
			$inserid=mysqli_insert_id(GFHConfig::$link);
			if($insert_user)
			{
				session_start();
				$_SESSION['SCH_USERID']=$inserid;
				$_SESSION['SCH_USEREMAIL']=$email;
				$checkorder=$this->getOrder();
				if(mysqli_num_rows($checkorder)>0)
				{
					$redirectn="index.php";
				}else{
					$redirectn="dashboard.php";
				}
				$response=array('status'=>'success','msg'=>'inserted successfully','redirect'=>$redirectn);
			}else{
				$response=array('status'=>'failed','error'=>'mysql error');
			}
			
		}
		return $response;
		}	
	}

	public function setRegisterByPhone()
	{
		if(count($_POST)>0)
		{
			$response=array();
			$phone=isset($_POST['mobile'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['mobile']):'';
			
			$mpassword=isset($_POST['mpassword'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['mpassword']):'';
			$check=mysqli_query(GFHConfig::$link,"SELECT * FROM `tbl_register` WHERE `phone`='".$phone."'");
			if(mysqli_num_rows($check)>0)
			{
				$response=array('status'=>'failed','error'=>'User already exists');
			}else{
			$sql1="INSERT INTO `tbl_register` SET `phone`='".$phone."',`password`='".$mpassword."',status='1',created_at=now()";
			//echo $sql1;die;
            $response=array('status'=>'success','msg'=>'inserted successfully','redirect'=>$sql1);
			$insert_user = mysqli_query(GFHConfig::$link,$sql1);
			$inserid=mysqli_insert_id(GFHConfig::$link);

			if($insert_user)
			{
				session_start();
				$_SESSION['SCH_USERID']=$inserid;
				$_SESSION['SCH_USERPHONE']=$phone;
                $checkorder=$this->getOrder();
				if(mysqli_num_rows($checkorder)>0)
				{
                    $redirectn="dashboard.php";
					
				}else{
					$redirectn="index.php";
				}
				$response=array('status'=>'success','msg'=>'inserted successfully','redirect'=>$redirectn);
			}else{
				$response=array('status'=>'failed','error'=>'mysql error');
			}
		}
			return $response;
		}	
	}


	public function frontLogin()
	{
		if(count($_POST)>0)
		{
			$response=array();
			$username=isset($_POST['username'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['username']):'';
			
			$lpassword=isset($_POST['lpassword'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['lpassword']):'';
			
			$sql1="SELECT `id`, `name`, `email`, `phone`, `password`, `status`, `created_at`, `updated_at` FROM `tbl_register` WHERE (email='".$username."' or phone='".$username."') and password='".$lpassword."'";
			//echo $sql1;die;
			$users = mysqli_query(GFHConfig::$link,$sql1);
			
			if(mysqli_num_rows($users)>0)
			{
				$user=mysqli_fetch_assoc($users);
				session_start();
				$_SESSION['SCH_USERID']=$user['id'];
				$_SESSION['SCH_USERPHONE']=$user['phone'];
				$_SESSION['SCH_USEREMAIL']=$user['email'];
                $checkorder=$this->getOrder();
                if(mysqli_num_rows($checkorder)>0)
                {
                    $redirectn="index.php";
                }else{
                    $redirectn="dashboard.php";
                }

				$response=array('status'=>'success','msg'=>'inserted successfully','redirect'=>$redirectn);
			}else{
				$response=array('status'=>'failed','error'=>'invalid user');
			}
			return $response;
		}	
	}

	public function forgetPassword()
	{
		if(count($_POST)>0)
		{
			$response=array();
            $eml=trim($_POST['frgemail']);
			$email=mysqli_real_escape_string(GFHConfig::$link,$eml);
			$sql1="SELECT `id`, `name`, `email`, `phone`, `password`, `status`, `created_at`, `updated_at` FROM `tbl_register` WHERE (email='".$email."' or phone='".$email."')";
            // echo $sql1;die;
			$check=mysqli_query(GFHConfig::$link,$sql1);
			if(mysqli_num_rows($check)>0)
			{
				$user=mysqli_fetch_assoc($check);
                if(preg_match("/^-?[1-9][0-9]*$/D",$email)){
                   $apiKey = urlencode('Kkcjk8L4+mk-Twr0IJilyJ9A6F8BSDioQ5WYcslivh');
    
                    // Message details
                    $numbers = array($email);
                    $sender = urlencode('SCHLNG');
                    $message = rawurlencode("Dear user, Your password is: ".$user['password'].". Please use this for logging in to http://schoolling.com.");
                 
                    $numbers = implode(',', $numbers);
                 
                    // Prepare data for POST request
                    $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
                 
                    // Send the POST request with cURL
                    $ch = curl_init('https://api.textlocal.in/send/');
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $res = curl_exec($ch);
                    curl_close($ch);
                    $response=array('status'=>'success','msg'=>'Password has been sent to your mobile number');
                    // Process your response here
                    //echo $res;
                }else{
                     $to = $user['email'];
                  $subject = "Schoolling.com | Forgot Password";

                  $message = "
                  
                  <table >
                  <tr>
                  <td>Dear user, Your password is: '".$user['password']."'. Please use this for logging in to http://schoolling.com.</td>
                  </tr>
                 
                  </table>
                  ";

                  $headers = "MIME-Version: 1.0" . "\r\n";
                  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                   $headers .= 'From: <noreply@schoolling.com>' . "\r\n";
                  if(@mail($to,$subject,$message,$headers))
                  {
                    $response=array('status'=>'success','msg'=>'Password has been sent to your email ID.');
                  }else{
                    $response=array('status'=>'failed','error'=>'Mail not sent. Please try again.');
                  }   
                }
			
		        
			}else{
				$response=array('status'=>'failed','error'=>'Please enter the email/ mobile with which you signed up.');
			}

			return $response;
		}
	}

	public function updateUserProfile()
	{
		if(count($_POST)>0)
		{
            //profileimg
			$first_name=isset($_POST['first_name'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['first_name']):'';
			$last_name=isset($_POST['last_name'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['last_name']):'';
			$mobile=isset($_POST['mobile'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['mobile']):'';
			$email=isset($_POST['email'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['email']):'';
			$gender=isset($_POST['gender'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['gender']):'';
			$address=isset($_POST['address'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['address']):'';
			$userId=isset($_SESSION['SCH_USERID'])?$_SESSION['SCH_USERID']:'';
            $allowedExts = array("jpg", "jpeg", "gif", "png","pdf");
            $extention=strtolower(pathinfo($_FILES['profileimg']['name'], PATHINFO_EXTENSION));

			if(!empty($userId))
			{
				$sql="UPDATE `tbl_register` SET `email`='".$email."',`phone`='".$mobile."',`first_name`='".$first_name."',`last_name`='".$last_name."',`gender`='".$gender."',`address`='".$address."',`updated_at`=now() WHERE `id`='".$userId."'";
				$result=mysqli_query(GFHConfig::$link,$sql);
				if($result)
				{
                    if (in_array($extention,$allowedExts)) {
                        $profilephoto="profileimg-" . $userId . "." . $extention;
                        // echo "UPDATE `tbl_register` SET profile='".$profilephoto."' WHERE `id`='".$userId."'";die;
                         mysqli_query(GFHConfig::$link,"UPDATE `tbl_register` SET profile='".$profilephoto."' WHERE `id`='".$userId."'");
                        move_uploaded_file($_FILES['profileimg']['tmp_name'], "images/profile/" . $profilephoto);
                       
                    }
					$response=array('status'=>'success','msg'=>'Update successfully');
				}else{
					$response=array('status'=>'failed','msg'=>'Mysql error');
				}
			}else{
				header('location:index.php');
			}

		}
	}


	public function getUserProfile()
	{
		$userId=isset($_SESSION['SCH_USERID'])?$_SESSION['SCH_USERID']:'';

		$check=mysqli_query(GFHConfig::$link,"SELECT  `email`, `phone`, `first_name`, `last_name`, `gender`, `address`,`track_id`,`profile` FROM `tbl_register` WHERE `id`='".$userId."'");

		if(mysqli_num_rows($check)>0)
		{
			$user=mysqli_fetch_assoc($check);
			return $user;
		}
	}

	public function ApplicationFormAddress()
	{
		@session_start();
		$response=array();
		$addressid=isset($_POST['addressid'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['addressid']):'';
		$address=isset($_POST['address'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['address']):'';
		$locality=isset($_POST['locality'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['locality']):'';
		$state=isset($_POST['state'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['state']):'';
		$city=isset($_POST['city'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['city']):'';
		$pincode=isset($_POST['pincode'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['pincode']):'';
		$years=isset($_POST['years'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['years']):'';
		$month=isset($_POST['month'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['month']):'';
		$housetype=isset($_POST['housetype'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['housetype']):'';
		$paddress=isset($_POST['paddress'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['paddress']):'';
		$plocality=isset($_POST['plocality'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['plocality']):'';
		$pcity=isset($_POST['pcity'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['pcity']):'';
		$pstate=isset($_POST['pstate'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['pstate']):'';
		$ppincode=isset($_POST['ppincode'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['ppincode']):'';
		$userId=isset($_SESSION['SCH_USERID'])?$_SESSION['SCH_USERID']:'';
		if(!empty($userId))
		{
			if(!empty($addressid)){
				$sql1="Update `tbl_application_form_address` SET `fk_userid`='".$userId."',`address`='".$address."',`locality`='".$locality."',`state`='".$state."',`city`='".$city."',`years`='".$years."',`month`='".$month."',`paddress`='".$paddress."',`pincode`='".$pincode."',`plocality`='".$plocality."',`housetype`='".$housetype."',`pstate`='".$pstate."',`pcity`='".$pcity."',`ppincode`='".$ppincode."',`status`='1',`updated_at`=now() where id='".$addressid."'";

			$result1=mysqli_query(GFHConfig::$link,$sql1);
				if($result1)
				{
					$response=array('status'=>'success' ,'data'=>$userId,'msg'=>'update successfully.');
				}else{
					$response=array('status'=>'failed','data'=>$userId,'msg'=>'failed');
				}
			}else{
				$sql="Insert into `tbl_application_form_address` SET `fk_userid`='".$userId."',`address`='".$address."',`locality`='".$locality."',`state`='".$state."',`city`='".$city."',`years`='".$years."',`month`='".$month."',`paddress`='".$paddress."',`pincode`='".$pincode."',`plocality`='".$plocality."',`housetype`='".$housetype."',`pstate`='".$pstate."',`pcity`='".$pcity."',`ppincode`='".$ppincode."',`status`='1',`created_at`=now()";

			$result=mysqli_query(GFHConfig::$link,$sql);
			$inserid=mysqli_insert_id(GFHConfig::$link);
			$appid="AP".$inserid;
			if($result)
			{
				mysqli_query(GFHConfig::$link,"UPDATE `tbl_application_form_address` SET `application_id`='".$appid."' WHERE `id`='".$inserid."'");
				$response=array('status'=>'success' ,'data'=>$userId);
			}else{
				$response=array('status'=>'failed','data'=>$userId);
			}
			}

			mysqli_query(GFHConfig::$link,"UPDATE `tbl_register` SET `application_phase`='1' WHERE `id`='".$userId."'");
			
		}

		return $response;
	}


	public function searchSchool($region="",$search="")
	{
		

		// if(isset($search)&&!empty($search))
		// {
		// 	$sql.=" where `name` like '%".$search."%'";
		// }

		$where=array();

		if(!empty($region))
		{
			if($region=="All Regions")
			{

			}else{
			$reg="`school_region`='".$region."'";
			array_push($where,$reg);
			}
			
		}
		
		if(!empty($search))
		{
			$dd=" `name` like '%".$search."%'";
			array_push($where,$dd);
		}
		$clause=implode(' and ',$where);

		if(isset($where)&&!empty($where))
		{
			$data=" where ".$clause;
		}else{
			$data="";
		}

		$sql="SELECT * FROM `tbl_school`".$data;
		//echo $sql;die;

			return mysqli_query(GFHConfig::$link,$sql);
	}


	public function ApplicationFormChild()
	{

		@session_start();
		$response=array();
		$c_first_name=isset($_POST['c_first_name'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['c_first_name']):'';
		$c_middle_name=isset($_POST['c_middle_name'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['c_middle_name']):'';
		$c_last_name=isset($_POST['c_last_name'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['c_last_name']):'';
		$c_gender=isset($_POST['c_gender'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['c_gender']):'';
		$c_category=isset($_POST['c_category'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['c_category']):'';
		$c_nationality=isset($_POST['c_nationality'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['c_nationality']):'';
		$c_dob=isset($_POST['c_dob'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['c_dob']):'';
		$c_place_of_birth=isset($_POST['c_place_of_birth'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['c_place_of_birth']):'';
		$c_mother_tounge=isset($_POST['c_mother_tounge'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['c_mother_tounge']):'';
		$c_aadharcard=isset($_POST['c_aadharcard'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['c_aadharcard']):'';
		$c_religion=isset($_POST['c_religion'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['c_religion']):'';
		$other_specifys=isset($_POST['other_specifys'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['other_specifys']):'';
		$c_blood_group=isset($_POST['c_blood_group'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['c_blood_group']):'';
		$any_medical_condition=isset($_POST['any_medical_condition'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['any_medical_condition']):'';
		$c_is_child_adopted=isset($_POST['c_is_child_adopted'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['c_is_child_adopted']):'';
		$c_language_at_home=isset($_POST['c_language_at_home'])?implode(',',$_POST['c_language_at_home']):'';
		$c_language_at_home_other=isset($_POST['c_language_at_home_other'])?$_POST['c_language_at_home_other']:'';
		$childid=isset($_POST['childid'])?$_POST['childid']:'';
		$userId=isset($_SESSION['SCH_USERID'])?$_SESSION['SCH_USERID']:'';
		if(!empty($userId))
		{

			if(!empty($childid))
			{
				//echo "<pre>";print_r($_POST);die;
				$sql1="update `tbl_application_form_childdetail` SET userid='".$userId."',`c_first_name`='".$c_first_name."',`c_middle_name`='".$c_middle_name."',`c_last_name`='".$c_last_name."',`c_gender`='".$c_gender."',`c_nationality`='".$c_nationality."',`c_category`='".$c_category."',`c_religion`='".$c_religion."',`other_specifys`='".$other_specifys."',`c_dob`='".$c_dob."',`c_place_of_birth`='".$c_place_of_birth."',`c_cast`='',`c_mother_tounge`='".$c_mother_tounge."',`c_is_child_adopted`='".$c_is_child_adopted."',`c_blood_group`='".$c_blood_group."',`c_language_at_home`='".$c_language_at_home."',`c_language_at_home_other`='".$c_language_at_home_other."',`c_aadhar`='".$c_aadharcard."',`any_medical_condition`='".$any_medical_condition."',`updated_at`=now() where id='".$childid."'";
				//echo $sql1;die;
				$result1=mysqli_query(GFHConfig::$link,$sql1);
				if($result1)
				{
					$response=array('status'=>'success' ,'data'=>$userId);
				}else{
					$response=array('status'=>'failed','data'=>$userId);
				}
			}else{

				
				$sql="INSERT INTO `tbl_application_form_childdetail` SET userid='".$userId."',`c_first_name`='".$c_first_name."',`c_middle_name`='".$c_middle_name."',`c_last_name`='".$c_last_name."',`c_gender`='".$c_gender."',`c_nationality`='".$c_nationality."',`c_category`='".$c_category."',`c_religion`='".$c_religion."',`other_specifys`='".$other_specifys."',`c_dob`='".$c_dob."',`c_place_of_birth`='".$c_place_of_birth."',`c_cast`='',`c_mother_tounge`='".$c_mother_tounge."',`c_is_child_adopted`='".$c_is_child_adopted."',`c_blood_group`='".$c_blood_group."',`c_language_at_home`='".$c_language_at_home."',`c_language_at_home_other`='".$c_language_at_home_other."',`c_aadhar`='".$c_aadharcard."',`any_medical_condition`='".$any_medical_condition."',`created_at`=now()";
				// echo $sql;die;
			$result=mysqli_query(GFHConfig::$link,$sql);
				if($result)
				{
					$response=array('status'=>'success' ,'data'=>$userId);
				}else{
					$response=array('status'=>'failed','data'=>$userId);
				}
			}

			mysqli_query(GFHConfig::$link,"UPDATE `tbl_register` SET `application_phase`='2' WHERE `id`='".$userId."'");
		}

		return $response;
	}

	public function ApplicationFormFather()
	{
		@session_start();
		$response=array();
		$father_first_name=isset($_POST['father_first_name'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['father_first_name']):'';
		$father_middle_name=isset($_POST['father_middle_name'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['father_middle_name']):'';
		$father_last_name=isset($_POST['father_last_name'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['father_last_name']):'';
		$relation_with_child=isset($_POST['relation_with_child'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['relation_with_child']):'';
		$father_nationality=isset($_POST['father_nationality'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['father_nationality']):'';
		$father_dob=isset($_POST['father_dob'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['father_dob']):'';
		$qualification=isset($_POST['qualification'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['qualification']):'';
		$qualification_other=isset($_POST['qualification_other'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['qualification_other']):'';
		$father_occupation=isset($_POST['father_occupation'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['father_occupation']):'';
		$father_occupation_other=isset($_POST['father_occupation_other'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['father_occupation_other']):'';
		$father_organisation=isset($_POST['father_organisation'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['father_organisation']):'';
		$father_office_address=isset($_POST['father_office_address'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['father_office_address']):'';
		$father_office_phone=isset($_POST['father_office_phone'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['father_office_phone']):'';
		$father_annual_salary=isset($_POST['father_annual_salary'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['father_annual_salary']):'';
		$father_annual_salary=isset($_POST['father_annual_salary'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['father_annual_salary']):'';
		$father_mobile=isset($_POST['father_mobile'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['father_mobile']):'';
		$father_designation=isset($_POST['father_designation'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['father_designation']):'';
		$father_sports_background=isset($_POST['father_sports_background'])?$_POST['father_sports_background']:'';
		$father_email=isset($_POST['father_email'])?$_POST['father_email']:'';
		$father_employed_school=isset($_POST['father_employed_school'])?$_POST['father_employed_school']:'';
		$father_employed_school_name=isset($_POST['father_employed_school_name'])?$_POST['father_employed_school_name']:'';
		$father_job_transferrable =isset($_POST['father_job_transferrable'])?$_POST['father_job_transferrable']:'';
		$father_employed_school_role=isset($_POST['father_employed_school_role'])?$_POST['father_employed_school_role']:'';
		$last_school_attendent_by_father=isset($_POST['last_school_attendent_by_father'])?$_POST['last_school_attendent_by_father']:'';
		$last_school_attendent_yop=isset($_POST['last_school_attendent_yop'])?$_POST['last_school_attendent_yop']:'';
		$fatherid=isset($_POST['fatherid'])?$_POST['fatherid']:'';
		$userId=isset($_SESSION['SCH_USERID'])?$_SESSION['SCH_USERID']:'';
		if(!empty($userId))
		{

			if(!empty($fatherid))
			{
				$sql1="UPDATE `tbl_application_form_father` SET `fk_userid`='".$userId."',`father_first_name`='".$father_first_name."',`father_middle_name`='".$father_middle_name."',`father_last_name`='".$father_last_name."',`relation_with_child`='".$relation_with_child."',`father_nationality`='".$father_nationality."',`father_dob`='".$father_dob."',`qualification`='".$qualification."',`qualification_other`='".$qualification_other."',`father_occupation`='".$father_occupation."',`father_occupation_other`='".$father_occupation_other."',`father_organisation`='".$father_organisation."',`father_office_address`='".$father_office_address."',`father_office_phone`='".$father_office_phone."',`father_annual_salary`='".$father_annual_salary."',`father_designation`='".$father_designation."',`father_job_transferrable`='".$father_job_transferrable."',`father_mobile`='".$father_mobile."',`father_email`='".$father_email."',`father_sports_background`='".$father_sports_background."',`father_employed_school`='".$father_employed_school."',`father_employed_school_name`='".$father_employed_school_name."',`father_employed_school_role`='".$father_employed_school_role."',`last_school_attendent_by_father`='".$last_school_attendent_by_father."',`last_school_attendent_yop`='".$last_school_attendent_yop."' where id='".$fatherid."'";
                // echo $sql1;die;
				$result1=mysqli_query(GFHConfig::$link,$sql1);
				if($result1)
				{
					$response=array('status'=>'success' ,'data'=>$userId);
				}else{
					$response=array('status'=>'failed','data'=>$userId);
				}
			}else{
				$sql="INSERT INTO `tbl_application_form_father` SET `fk_userid`='".$userId."',`father_first_name`='".$father_first_name."',`father_middle_name`='".$father_middle_name."',`father_last_name`='".$father_last_name."',`relation_with_child`='".$relation_with_child."',`father_nationality`='".$father_nationality."',`father_dob`='".$father_dob."',`qualification`='".$qualification."',`qualification_other`='".$qualification_other."',`father_occupation`='".$father_occupation."',`father_occupation_other`='".$father_occupation_other."',`father_organisation`='".$father_organisation."',`father_office_address`='".$father_office_address."',`father_office_phone`='".$father_office_phone."',`father_annual_salary`='".$father_annual_salary."',`father_designation`='".$father_designation."',`father_job_transferrable`='".$father_job_transferrable."',`father_mobile`='".$father_mobile."',`father_email`='".$father_email."',`father_sports_background`='".$father_sports_background."',`father_employed_school`='".$father_employed_school."',`father_employed_school_name`='".$father_employed_school_name."',`father_employed_school_role`='".$father_employed_school_role."',`last_school_attendent_by_father`='".$last_school_attendent_by_father."',`last_school_attendent_yop`='".$last_school_attendent_yop."'";

			
			
				$result=mysqli_query(GFHConfig::$link,$sql);
				if($result)
				{
					$response=array('status'=>'success' ,'data'=>$userId);
				}else{
					$response=array('status'=>'failed','data'=>$userId);
				}
			}

			mysqli_query(GFHConfig::$link,"UPDATE `tbl_register` SET `application_phase`='3' WHERE `id`='".$userId."'");
			
		}

		return $response;
	}


	public function ApplicationFormMother()
	{

		@session_start();
		$response=array();
		$mother_first_name=isset($_POST['mother_first_name'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['mother_first_name']):'';
		$mother_middle_name=isset($_POST['mother_middle_name'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['mother_middle_name']):'';
		$mother_last_name=isset($_POST['mother_last_name'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['mother_last_name']):'';
		$mother_relation_with_child=isset($_POST['mother_relation_with_child'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['mother_relation_with_child']):'';
		$mother_nationality=isset($_POST['mother_nationality'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['mother_nationality']):'';
		$c_nationality=isset($_POST['c_nationality'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['c_nationality']):'';
		$mother_dob=isset($_POST['mother_dob'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['mother_dob']):'';
		$mother_qualification=isset($_POST['mother_qualification'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['mother_qualification']):'';
		$mother_qualification_other=isset($_POST['mother_qualification_other'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['mother_qualification_other']):'';
		$mother_occupation=isset($_POST['mother_occupation'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['mother_occupation']):'';
		$mother_occupation_others=isset($_POST['mother_occupation_others'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['mother_occupation_others']):'';
		$mother_organisation_name=isset($_POST['mother_organisation_name'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['mother_organisation_name']):'';
		$mother_office_address=isset($_POST['mother_office_address'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['mother_office_address']):'';
		$mother_office_phone=isset($_POST['mother_office_phone'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['mother_office_phone']):'';
		$mother_annual_salary=isset($_POST['mother_annual_salary'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['mother_annual_salary']):'';
		$mother_office_designation=isset($_POST['mother_office_designation'])?$_POST['mother_office_designation']:'';
		$mother_job_transferrable=isset($_POST['mother_job_transferrable'])?$_POST['mother_job_transferrable']:'';
		$mother_phone=isset($_POST['mother_phone'])?$_POST['mother_phone']:'';
		$mother_email=isset($_POST['mother_email'])?$_POST['mother_email']:'';
		$mother_sports=isset($_POST['mother_sports'])?$_POST['mother_sports']:'';
		$mother_emplyoed_at_school=isset($_POST['mother_emplyoed_at_school'])?$_POST['mother_emplyoed_at_school']:'';
		$mother_school_name=isset($_POST['mother_school_name'])?$_POST['mother_school_name']:'';
		$mother_school_role=isset($_POST['mother_school_role'])?$_POST['mother_school_role']:'';
		$mother_last_school_attendent=isset($_POST['mother_last_school_attendent'])?$_POST['mother_last_school_attendent']:'';
		$mother_school_yop=isset($_POST['mother_school_yop'])?$_POST['mother_school_yop']:'';
		$userId=isset($_SESSION['SCH_USERID'])?$_SESSION['SCH_USERID']:'';
		$motherid=isset($_POST['motherid'])?$_POST['motherid']:'';
		if(!empty($userId))
		{
			//echo "<pre>";print_r($_POST);die;
			if(!empty($motherid))
			{
				$sql1="UPDATE `tbl_application_form_mother` SET `userid`='".$userId."',`mother_first_name`='".$mother_first_name."',`mother_middle_name`='".$mother_middle_name."',`mother_last_name`='".$mother_last_name."',`mother_relation_with_child`='".$mother_relation_with_child."',`mother_nationality`='".$mother_nationality."',`mother_dob`='".$mother_dob."',`mother_qualification`='".$mother_qualification."',`mother_qualification_other`='".$mother_qualification_other."',`mother_occupation`='".$mother_occupation."',`mother_occupation_others`='".$mother_occupation_others."',`mother_organisation_name`='".$mother_organisation_name."',`mother_office_address`='".$mother_office_address."',`mother_office_phone`='".$mother_office_phone."',`mother_annual_salary`='".$mother_annual_salary."',`mother_office_designation`='".$mother_office_designation."',`mother_job_transferrable`='".$mother_job_transferrable."',`mother_phone`='".$mother_phone."',`mother_email`='".$mother_email."',`mother_sports`='".$mother_sports."',`mother_emplyoed_at_school`='".$mother_emplyoed_at_school."',`mother_school_name`='".$mother_school_name."',`mother_school_role`='".$mother_school_role."',`mother_last_school_attendent`='".$mother_last_school_attendent."',`mother_school_yop`='".$mother_school_yop."' where id='".$motherid."'";
				$result1=mysqli_query(GFHConfig::$link,$sql1);
				if($result1)
				{
					$response=array('status'=>'success' ,'data'=>$userId);
				}else{
					$response=array('status'=>'failed','data'=>$userId);
				}
			}else{
				$sql="INSERT INTO `tbl_application_form_mother` SET `userid`='".$userId."',`mother_first_name`='".$mother_first_name."',`mother_middle_name`='".$mother_middle_name."',`mother_last_name`='".$mother_last_name."',`mother_relation_with_child`='".$mother_relation_with_child."',`mother_nationality`='".$mother_nationality."',`mother_dob`='".$mother_dob."',`mother_qualification`='".$mother_qualification."',`mother_qualification_other`='".$mother_qualification_other."',`mother_occupation`='".$mother_occupation."',`mother_occupation_others`='".$mother_occupation_others."',`mother_organisation_name`='".$mother_organisation_name."',`mother_office_address`='".$mother_office_address."',`mother_office_phone`='".$mother_office_phone."',`mother_annual_salary`='".$mother_annual_salary."',`mother_office_designation`='".$mother_office_designation."',`mother_job_transferrable`='".$mother_job_transferrable."',`mother_phone`='".$mother_phone."',`mother_email`='".$mother_email."',`mother_sports`='".$mother_sports."',`mother_emplyoed_at_school`='".$mother_emplyoed_at_school."',`mother_school_name`='".$mother_school_name."',`mother_school_role`='".$mother_school_role."',`mother_last_school_attendent`='".$mother_last_school_attendent."',`mother_school_yop`='".$mother_school_yop."'";
			
			
			$result=mysqli_query(GFHConfig::$link,$sql);
			if($result)
			{
				$response=array('status'=>'success' ,'data'=>$userId);
			}else{
				$response=array('status'=>'failed','data'=>$userId);
			}


			}

			mysqli_query(GFHConfig::$link,"UPDATE `tbl_register` SET `application_phase`='4' WHERE `id`='".$userId."'");
		}

		return $response;
	}

	public function ApplicationFormSibling()
	{
		@session_start();
		$response=array();
		$sibling_email=isset($_POST['sibling_email'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['sibling_email']):'';
		$sibling_mobile=isset($_POST['sibling_mobile'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['sibling_mobile']):'';
		$sibling_parent_status=isset($_POST['sibling_parent_status'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['sibling_parent_status']):'';
		$mode_of_transport=isset($_POST['mode_of_transport'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['mode_of_transport']):'';
		$tranferred_from_other_state=isset($_POST['tranferred_from_other_state'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['tranferred_from_other_state']):'';
		$tranferred_from_other_state_time=isset($_POST['tranferred_from_other_state_time'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['tranferred_from_other_state_time']):'';
		$tranferred_from_other_state_place=isset($_POST['tranferred_from_other_state_place'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['tranferred_from_other_state_place']):'';
		$previous_school=isset($_POST['previous_school'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['previous_school']):'';
		$previous_school_address=isset($_POST['previous_school_address'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['previous_school_address']):'';
		$child_living_with=isset($_POST['child_living_with'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['child_living_with']):'';
		$is_first_child=isset($_POST['is_first_child'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['is_first_child']):'';
		$siblingid=isset($_POST['siblingid'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['siblingid']):'';
		$userId=isset($_SESSION['SCH_USERID'])?$_SESSION['SCH_USERID']:'';
		if(!empty($userId))
		{

			if(!empty($siblingid))
			{
				$sql1="UPDATE `tbl_sibling` SET `userid`='".$userId."',`sibling_email`='".$sibling_email."',`sibling_mobile`='".$sibling_mobile."',`sibling_parent_status`='".$sibling_parent_status."',`mode_of_transport`='".$mode_of_transport."',`tranferred_from_other_state`='".$tranferred_from_other_state."',`tranferred_from_other_state_time`='".$tranferred_from_other_state_time."',`tranferred_from_other_state_place`='".$tranferred_from_other_state_place."',`previous_school`='".$previous_school."',`previous_school_address`='".$previous_school_address."',`child_living_with`='".$child_living_with."',`is_first_child`='".$is_first_child."' where id='".$siblingid."'";
				$result1=mysqli_query(GFHConfig::$link,$sql1);
				//$insertid=mysqli_insert_id(GFHConfig::$link);
				$this->siblingDetail($siblingid);
				//$this->uploadDocument($insertid);
			}else{

				$sql="INSERT INTO `tbl_sibling` SET `userid`='".$userId."',`sibling_email`='".$sibling_email."',`sibling_mobile`='".$sibling_mobile."',`sibling_parent_status`='".$sibling_parent_status."',`mode_of_transport`='".$mode_of_transport."',`tranferred_from_other_state`='".$tranferred_from_other_state."',`tranferred_from_other_state_time`='".$tranferred_from_other_state_time."',`tranferred_from_other_state_place`='".$tranferred_from_other_state_place."',`previous_school`='".$previous_school."',`previous_school_address`='".$previous_school_address."',`child_living_with`='".$child_living_with."',`is_first_child`='".$is_first_child."'";
			
			
			$result=mysqli_query(GFHConfig::$link,$sql);
			$insertid=mysqli_insert_id(GFHConfig::$link);
			$this->siblingDetail();
			//$this->uploadDocument($insertid);
				if($result)
				{
					$response=array('status'=>'success' ,'data'=>$userId);

				}else{
					$response=array('status'=>'failed','data'=>$userId);
				}
			}
			mysqli_query(GFHConfig::$link,"UPDATE `tbl_register` SET `application_phase`='5',common_admission_form='2' WHERE `id`='".$userId."'");
		}

		return $response;
	}

	public function siblingDetail()
	{
		@session_start();
		$sibling_name=isset($_POST['sibling_name'])?$_POST['sibling_name']:'';
		$sibling_gender=isset($_POST['sibling_gender'])?$_POST['sibling_gender']:'';
		$sibling_dob=isset($_POST['sibling_dob'])?$_POST['sibling_dob']:'';
		$school_attending=isset($_POST['school_attending'])?$_POST['school_attending']:'';
		$class=isset($_POST['class'])?$_POST['class']:'';
		$section=isset($_POST['section'])?$_POST['section']:'';
		$admission_number=isset($_POST['admission_number'])?$_POST['admission_number']:'';
		//$siblingid=isset($_POST['siblingid'])?$_POST['siblingid']:'';
		$userId=isset($_SESSION['SCH_USERID'])?$_SESSION['SCH_USERID']:'';
		if(!empty($userId))
		{
			mysqli_query(GFHConfig::$link,"DELETE FROM `tbl_sibling_detail` WHERE `fk_id`='".$userId."'");
			foreach($sibling_name as $key=>$value){
				$sql="INSERT INTO `tbl_sibling_detail` SET fk_id='".$userId."',`sibling_name`='".$sibling_name[$key]."',`sibling_gender`='".$sibling_gender[$key]."',`sibling_dob`='".$sibling_dob[$key]."',`school_attending`='".$school_attending[$key]."',`class`='".$class[$key]."',`section`='".$section[$key]."',`admission_number`='".$admission_number[$key]."'";
				//echo $sql;die;
				$result=mysqli_query(GFHConfig::$link,$sql);
			}
			
		}
	}

	public function uploadDocument()
	{	
		$response=array();
		@session_start();
		$id=isset($_SESSION['SCH_USERID'])?$_SESSION['SCH_USERID']:'';
			$allowedExts = array("jpg", "jpeg", "gif", "png","pdf");
			//$extension = strtolower(pathinfo($_FILES['child_photo']['name'], PATHINFO_EXTENSION));
			$childphoto=""; $fatherphoto="";
			$motherphoto="";$familyphoto="";$addressproof="";$child_birth_certificate="";$child_medicalcertificate="";
			$father_adharcard="";$mother_adharcard="";$alumni_father_cbse_12passing="";$alumni_father_cbse_12marksheet="";
			$alumni_mother_cbse_12passing="";$alumni_mother_cbse_12marksheet="";$latest_school_idcard="";$latest_feereceipt="";
			$letter_of_parish_priest="";$baptism_certificate="";$certificate_of_department="";$staff_mother_id_card="";
			$staff_father_id_card="";$previous_school_certificate="";$transfercertificate="";
			$extention=strtolower(pathinfo($_FILES['child_photo']['name'], PATHINFO_EXTENSION));

			$extention1=strtolower(pathinfo($_FILES['father_photo']['name'], PATHINFO_EXTENSION));
			//echo $extention1;die;
			$extention2=strtolower(pathinfo($_FILES['mother_photo']['name'], PATHINFO_EXTENSION));
			$extention3=strtolower(pathinfo($_FILES['family_photograph']['name'], PATHINFO_EXTENSION));
			
			$extention15=strtolower(pathinfo($_FILES['death_certificate']['name'], PATHINFO_EXTENSION));
			$extention16=strtolower(pathinfo($_FILES['letter_of_parish_priest']['name'], PATHINFO_EXTENSION));
			$extention17=strtolower(pathinfo($_FILES['baptism_certificate']['name'], PATHINFO_EXTENSION));
			$extention18=strtolower(pathinfo($_FILES['certificate_of_department']['name'], PATHINFO_EXTENSION));
			$extention19=strtolower(pathinfo($_FILES['staff_mother_id_card']['name'], PATHINFO_EXTENSION));
			$extention20=strtolower(pathinfo($_FILES['staff_father_id_card']['name'], PATHINFO_EXTENSION));
			$extention21=strtolower(pathinfo($_FILES['transfer_certificate_previous_school']['name'], PATHINFO_EXTENSION));
			$extention22=strtolower(pathinfo($_FILES['transfercertificate']['name'], PATHINFO_EXTENSION));
			if ($_FILES['child_photo']['name'] != '') {
				
				if (in_array($extention,$allowedExts)) {
				    $childphoto="child-" . $id . "." . $extention;
				    move_uploaded_file($_FILES['child_photo']['tmp_name'], "images/child/" . $childphoto);
				}
			}

			if ($_FILES['father_photo']['name'] != '') {
				
				if (in_array($extention1, $allowedExts)) {
				    $fatherphoto="father-" . $id . "." . $extention1;
				    move_uploaded_file($_FILES['father_photo']['tmp_name'], "images/father/" . $fatherphoto);
				}
			}

			if ($_FILES['mother_photo']['name'] != '') {
				
				if (in_array($extention2, $allowedExts)) {
				    $motherphoto="mother-" . $id . "." . $extention2;
				    move_uploaded_file($_FILES['mother_photo']['tmp_name'], "images/mother/" . $motherphoto);
				}
			}

			if ($_FILES['family_photograph']['name'] != '') {
				
				if (in_array($extention3, $allowedExts)) {
				    $familyphoto="family-" . $id . "." . $extention3;
				    move_uploaded_file($_FILES['family_photograph']['tmp_name'], "images/family/" . $familyphoto);
				}
			}

			if ($_FILES['address_proof']['name'] != '') {
				
	    		foreach($_FILES["address_proof"]["tmp_name"] as $key=>$tmp_name)
	            {
	                $file_name=$_FILES["address_proof"]["name"][$key];
	                $file_tmp=$_FILES["address_proof"]["tmp_name"][$key];
	                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
	                if(in_array($ext,$allowedExts))
	                {
	                    $filename=basename($file_name,$ext);
	                    $newFileName=$filename.time().".".$ext;
	                    $address[]=$newFileName;
	                    move_uploaded_file($_FILES["address_proof"]["tmp_name"][$key],"images/address_proof/".$newFileName);
	                }
	               
	            }
	            $addressproof=isset($address)?implode(',',$address):'';

        	}

        	if ($_FILES['child_adhar_card']['name'] != '') {
				
	    		foreach($_FILES["child_adhar_card"]["tmp_name"] as $key=>$tmp_name)
	            {
	                $file_namex=$_FILES["child_adhar_card"]["name"][$key];
	                $file_tmpx=$_FILES["child_adhar_card"]["tmp_name"][$key];
	                $extx=pathinfo($file_namex,PATHINFO_EXTENSION);
	                if(in_array($extx,$allowedExts))
	                {
	                    $filenamex=basename($file_namex,$extx);
	                    $newFileNamex=$file_namex.time().".".$extx;
	                    $child_adhar_card1[]=$newFileNamex;
	                    move_uploaded_file($_FILES["child_adhar_card"]["tmp_name"][$key],"images/child_adhar_card/".$newFileNamex);
	                }
	               
	            }
	            $child_adharcard=isset($child_adhar_card1)?implode(',',$child_adhar_card1):'';

        	}

        	if ($_FILES['child_birth_certificate']['name'] != '') {
				
	    		foreach($_FILES["child_birth_certificate"]["tmp_name"] as $key=>$tmp_name)
	            {
	            	$child_birth_certificate=array();
	                $file_name1=$_FILES["child_birth_certificate"]["name"][$key];
	                $file_tmp1=$_FILES["child_birth_certificate"]["tmp_name"][$key];
	                $ext1=pathinfo($file_name1,PATHINFO_EXTENSION);
	                if(in_array($ext1,$allowedExts))
	                {
	                    $filename1=basename($file_name1,$ext1);
	                    $newFileName1=$filename1.time().".".$ext1;
	                    $child_birth_certificate1[]=$newFileName1;
	                    move_uploaded_file($_FILES["child_birth_certificate"]["tmp_name"][$key],"images/child_birth_certificate/".$newFileName1);
	                }
	               
	            }
	            $child_birthcertificate=isset($child_birth_certificate1)?implode(',',$child_birth_certificate1):'';

        	}


        	if ($_FILES['child_medical_certificate']['name'] != '') {
				
	    		foreach($_FILES["child_medical_certificate"]["tmp_name"] as $key=>$tmp_name)
	            {
	                $file_name2=$_FILES["child_medical_certificate"]["name"][$key];
	                $file_tmp2=$_FILES["child_medical_certificate"]["tmp_name"][$key];
	                $ext2=pathinfo($file_name2,PATHINFO_EXTENSION);
	                if(in_array($ext2,$allowedExts))
	                {
	                    $filename2=basename($file_name2,$ext2);
	                    $newFileName2=$filename2.time().".".$ext2;
	                    $child_medical_certificate1[]=$newFileName2;
	                    move_uploaded_file($_FILES["child_medical_certificate"]["tmp_name"][$key],"images/child_medical_certificate/".$newFileName2);
	                }
	               
	            }
	            $child_medicalcertificate=isset($child_medical_certificate1)?implode(',',$child_medical_certificate1):'';

        	}

        	if ($_FILES['father_adhar_card']['name'] != '') {
				
	    		foreach($_FILES["father_adhar_card"]["tmp_name"] as $key=>$tmp_name)
	            {
	                $file_name3=$_FILES["father_adhar_card"]["name"][$key];
	                $file_tmp3=$_FILES["father_adhar_card"]["tmp_name"][$key];
	                $ext3=pathinfo($file_name3,PATHINFO_EXTENSION);
	                if(in_array($ext3,$allowedExts))
	                {
	                    $filename3=basename($file_name3,$ext3);
	                    $newFileName3=$filename3.time().".".$ext3;
	                    $father_adhar_card1[]=$newFileName3;
	                    move_uploaded_file($_FILES["father_adhar_card"]["tmp_name"][$key],"images/father/".$newFileName3);
	                }
	               
	            }
	            $father_adharcard=isset($father_adhar_card1)?implode(',',$father_adhar_card1):'';

        	}

    		if ($_FILES['mother_adhar_card']['name'] != '') {
				
	    		foreach($_FILES["mother_adhar_card"]["tmp_name"] as $key=>$tmp_name)
	            {
	            	$mother_adhar_card=array();
	                $file_name4=$_FILES["mother_adhar_card"]["name"][$key];
	                $file_tmp4=$_FILES["mother_adhar_card"]["tmp_name"][$key];
	                $ext4=pathinfo($file_name4,PATHINFO_EXTENSION);
	                if(in_array($ext4,$allowedExts))
	                {
	                    $filename4=basename($file_name4,$ext4);
	                    $newFileName4=$filename4.time().".".$ext4;
	                    $mother_adhar_card1[]=$newFileName4;
	                    move_uploaded_file($_FILES["mother_adhar_card"]["tmp_name"][$key],"images/mother_adhar_card/".$newFileName4);
	                }
	               
	            }
            $mother_adharcard=isset($mother_adhar_card1)?implode(',',$mother_adhar_card1):'';

        	}


        	if ($_FILES['alumni_father_cbse_12_passing']['name'] != '') {
				
	    		foreach($_FILES["alumni_father_cbse_12_passing"]["tmp_name"] as $key=>$tmp_name)
	            {
	                $file_name5=$_FILES["alumni_father_cbse_12_passing"]["name"][$key];
	                $file_tmp5=$_FILES["alumni_father_cbse_12_passing"]["tmp_name"][$key];
	                $ext5=pathinfo($file_name5,PATHINFO_EXTENSION);
	                if(in_array($ext5,$allowedExts))
	                {
	                    $filename5=basename($file_name5,$ext5);
	                    $newFileName5=$filename5.time().".".$ext5;
	                    $alumni_father_cbse_12_passing1[]=$newFileName5;
	                    move_uploaded_file($_FILES["alumni_father_cbse_12_passing"]["tmp_name"][$key],"images/alumni_father_cbse_12_passing/".$newFileName5);
	                }
	               
	            }
            $alumni_father_cbse_12passing=isset($alumni_father_cbse_12_passing1)?implode(',',$alumni_father_cbse_12_passing1):'';

        	}

        	if ($_FILES['alumni_father_cbse_12_marksheet']['name'] != '') {
				
	    		foreach($_FILES["alumni_father_cbse_12_marksheet"]["tmp_name"] as $key=>$tmp_name)
	            {
	                $file_name6=$_FILES["alumni_father_cbse_12_marksheet"]["name"][$key];
	                $file_tmp6=$_FILES["alumni_father_cbse_12_marksheet"]["tmp_name"][$key];
	                $ext6=pathinfo($file_name6,PATHINFO_EXTENSION);
	                if(in_array($ext6,$allowedExts))
	                {
	                    $filename6=basename($file_name6,$ext6);
	                    $newFileName6=$filename6.time().".".$ext6;
	                    $alumni_father_cbse_12_marksheet1[]=$newFileName6;
	                    move_uploaded_file($_FILES["alumni_father_cbse_12_marksheet"]["tmp_name"][$key],"images/alumni_father_cbse_12_marksheet/".$newFileName6);
	                }
	               
	            }
            $alumni_father_cbse_12marksheet=isset($alumni_father_cbse_12_marksheet1)?implode(',',$alumni_father_cbse_12_marksheet1):'';

        	}


        	if ($_FILES['alumni_mother_cbse_12_passing']['name'] != '') {
				
	    		foreach($_FILES["alumni_mother_cbse_12_passing"]["tmp_name"] as $key=>$tmp_name)
	            {
	                $file_name7=$_FILES["alumni_mother_cbse_12_passing"]["name"][$key];
	                $file_tmp7=$_FILES["alumni_mother_cbse_12_passing"]["tmp_name"][$key];
	                $ext7=pathinfo($file_name7,PATHINFO_EXTENSION);
	                if(in_array($ext7,$allowedExts))
	                {
	                    $filename7=basename($file_name7,$ext7);
	                    $newFileName7=$filename7.time().".".$ext7;
	                    $alumni_mother_cbse_12_passing1[]=$newFileName7;
	                    move_uploaded_file($_FILES["alumni_mother_cbse_12_passing"]["tmp_name"][$key],"images/alumni_mother_cbse_12_passing/".$newFileName7);
	                }
	               
	            }
            $alumni_mother_cbse_12passing=isset($alumni_mother_cbse_12_passing1)?implode(',',$alumni_mother_cbse_12_passing1):'';

        	}


        	if ($_FILES['alumni_mother_cbse_12_marksheet']['name'] != '') {
				
	    		foreach($_FILES["alumni_mother_cbse_12_marksheet"]["tmp_name"] as $key=>$tmp_name)
	            {
	                $file_name8=$_FILES["alumni_mother_cbse_12_marksheet"]["name"][$key];
	                $file_tmp8=$_FILES["alumni_mother_cbse_12_marksheet"]["tmp_name"][$key];
	                $ext8=pathinfo($file_name8,PATHINFO_EXTENSION);
	                if(in_array($ext8,$allowedExts))
	                {
	                    $filename8=basename($file_name8,$ext8);
	                    $newFileName8=$filename8.time().".".$ext8;
	                    $alumni_mother_cbse_12_marksheet1[]=$newFileName8;
	                    move_uploaded_file($_FILES["alumni_mother_cbse_12_marksheet"]["tmp_name"][$key],"images/alumni_mother_cbse_12_marksheet/".$newFileName8);
	                }
	               
	            }
            $alumni_mother_cbse_12marksheet=isset($alumni_mother_cbse_12_marksheet1)?implode(',',$alumni_mother_cbse_12_marksheet1):'';

        	}

        	if ($_FILES['latest_school_id_card']['name'] != '') {
				
	    		foreach($_FILES["latest_school_id_card"]["tmp_name"] as $key=>$tmp_name)
	            {
	                $file_name9=$_FILES["latest_school_id_card"]["name"][$key];
	                $file_tmp9=$_FILES["latest_school_id_card"]["tmp_name"][$key];
	                $ext9=pathinfo($file_name9,PATHINFO_EXTENSION);
	                if(in_array($ext9,$allowedExts))
	                {
	                    $filename9=basename($file_name9,$ext9);
	                    $newFileName9=$filename9.time().".".$ext9;
	                    $latest_school_id_card1[]=$newFileName9;
	                    move_uploaded_file($_FILES["latest_school_id_card"]["tmp_name"][$key],"images/latest_school_id_card/".$newFileName9);
	                }
	               
	            }
            $latest_school_idcard=isset($latest_school_id_card1)?implode(',',$latest_school_id_card1):'';

        	}

        	if ($_FILES['latest_fee_receipt']['name'] != '') {
				
	    		foreach($_FILES["latest_fee_receipt"]["tmp_name"] as $key=>$tmp_name)
	            {
	                $file_name10=$_FILES["latest_fee_receipt"]["name"][$key];
	                $file_tmp10=$_FILES["latest_fee_receipt"]["tmp_name"][$key];
	                $ext10=pathinfo($file_name10,PATHINFO_EXTENSION);
	                if(in_array($ext10,$allowedExts))
	                {
	                    $filename10=basename($file_name10,$ext10);
	                    $newFileName10=$filename10.time().".".$ext10;
	                    $latest_fee_receipt[]=$newFileName10;
	                    move_uploaded_file($_FILES["latest_fee_receipt"]["tmp_name"][$key],"images/latest_fee_receipt/".$newFileName10);
	                }
	               
	            }
            $latest_feereceipt=isset($latest_fee_receipt)?implode(',',$latest_fee_receipt):'';

        	}

        	if ($_FILES['death_certificate']['name'] != '') {
				
				if (in_array($extention15, $allowedExts)) {
				    $death_certificate="death_certificate-" . $id . "." . $extention15;
				    move_uploaded_file($_FILES['death_certificate']['tmp_name'], "images/death_certificate/" . $death_certificate);
				}
			}

			if ($_FILES['letter_of_parish_priest']['name'] != '') {
				
				if (in_array($extention16, $allowedExts)) {
				    $letter_of_parish_priest="letter_of_parish_priest-" . $id . "." . $extention16;
				    move_uploaded_file($_FILES['letter_of_parish_priest']['tmp_name'], "images/letter_of_parish_priest/" . $letter_of_parish_priest);
				}
			}

			if ($_FILES['baptism_certificate']['name'] != '') {
				
				if (in_array($extention17, $allowedExts)) {
				    $baptism_certificate="baptism_certificate-" . $id . "." . $extention17;
				    move_uploaded_file($_FILES['baptism_certificate']['tmp_name'], "images/baptism_certificate/" . $baptism_certificate);
				}
			}

			if ($_FILES['certificate_of_department']['name'] != '') {
				
				if (in_array($extention18, $allowedExts)) {
				    $certificate_of_department="certificate_of_department-" . $id . "." . $extention18;
				    move_uploaded_file($_FILES['certificate_of_department']['tmp_name'], "images/certificate_of_department/" . $certificate_of_department);
				}
			}

			if ($_FILES['staff_mother_id_card']['name'] != '') {
				
				if (in_array($extention19, $allowedExts)) {
				    $staff_mother_id_card="staff_mother_id_card-" . $id . "." . $extention19;
				    move_uploaded_file($_FILES['staff_mother_id_card']['tmp_name'], "images/staff_mother_id_card/" . $staff_mother_id_card);
				}
			}

			if ($_FILES['staff_father_id_card']['name'] != '') {
				
				if (in_array($extention20, $allowedExts)) {
				    $staff_father_id_card="staff_father_id_card-" . $id . "." . $extention20;
				    move_uploaded_file($_FILES['staff_father_id_card']['tmp_name'], "images/staff_father_id_card/" . $staff_father_id_card);
				}
			}

			if ($_FILES['transfer_certificate_previous_school']['name'] != '') {
				
				if (in_array($extention21, $allowedExts)) {
				    $previous_school_certificate="previous_school_certificate-" . $id . "." . $extention21;
				    move_uploaded_file($_FILES['transfer_certificate_previous_school']['tmp_name'], "images/previous_school_certificate/" . $previous_school_certificate);
				}
			}

			if ($_FILES['transfercertificate']['name'] != '') {
				
				if (in_array($extention22, $allowedExts)) {
				    $transfercertificate="transfercertificate-" . $id . "." . $extention22;
				    move_uploaded_file($_FILES['transfercertificate']['tmp_name'], "images/transfercertificate/" . $transfercertificate);
				}
			}

         $dd=mysqli_query(GFHConfig::$link,"SELECT * FROM `tbl_sibling_document` WHERE `userid`='".$id."'");
        if(mysqli_num_rows($dd)>0)
        {
            $sql="update `tbl_sibling_document` SET `child_photo`='".$childphoto."',`father_photo`='".$fatherphoto."',`mother_photo`='".$motherphoto."',`family_photograph`='".$familyphoto."',`address_proof`='".$addressproof."',`child_birth_certificate`='".$child_birthcertificate."',`child_medical_certificate`='".$child_medicalcertificate."',`child_adhar_card`='".$child_adharcard."',`father_adhar_card`='".$father_adharcard."',`mother_adhar_card`='".$mother_adharcard."',`alumni_father_cbse_12_passing`='".$alumni_father_cbse_12passing."',`alumni_father_cbse_12_marksheet`='".$alumni_father_cbse_12marksheet."',`cbse_12_passing_certificate`='".$alumni_mother_cbse_12passing."',`cbse_12_marksheet`='".$alumni_mother_cbse_12marksheet."',`latest_school_id_card`='".$latest_school_idcard."',`latest_fee_receipt`='".$latest_feereceipt."',`death_certificate`='".$death_certificate."',`letter_of_parish_priest`='".$letter_of_parish_priest."',`baptism_certificate`='".$baptism_certificate."',`certificate_of_department`='".$certificate_of_department."',`staff_mother_id_card`='".$staff_mother_id_card."',`staff_father_id_card`='".$staff_father_id_card."',`transfer_certificate_previous_school`='".$previous_school_certificate."',`transfercertificate`='".$transfercertificate."' where userid='".$id."'";
        }else{
            $sql="insert into `tbl_sibling_document` SET `userid`='".$id."',`child_photo`='".$childphoto."',`father_photo`='".$fatherphoto."',`mother_photo`='".$motherphoto."',`family_photograph`='".$familyphoto."',`address_proof`='".$addressproof."',`child_birth_certificate`='".$child_birthcertificate."',`child_medical_certificate`='".$child_medicalcertificate."',`child_adhar_card`='".$child_adharcard."',`father_adhar_card`='".$father_adharcard."',`mother_adhar_card`='".$mother_adharcard."',`alumni_father_cbse_12_passing`='".$alumni_father_cbse_12passing."',`alumni_father_cbse_12_marksheet`='".$alumni_father_cbse_12marksheet."',`cbse_12_passing_certificate`='".$alumni_mother_cbse_12passing."',`cbse_12_marksheet`='".$alumni_mother_cbse_12marksheet."',`latest_school_id_card`='".$latest_school_idcard."',`latest_fee_receipt`='".$latest_feereceipt."',`death_certificate`='".$death_certificate."',`letter_of_parish_priest`='".$letter_of_parish_priest."',`baptism_certificate`='".$baptism_certificate."',`certificate_of_department`='".$certificate_of_department."',`staff_mother_id_card`='".$staff_mother_id_card."',`staff_father_id_card`='".$staff_father_id_card."',`transfer_certificate_previous_school`='".$previous_school_certificate."',`transfercertificate`='".$transfercertificate."'";
        }



		$result=mysqli_query(GFHConfig::$link,$sql);
		if($result)
		{
			$response=array('status'=>'success');
		}
		return $response;
	}


	public function search_School($sql)
	{
		return mysqli_query(GFHConfig::$link,$sql);
	}

	public function autocompleteSearch($search,$selectedregion='',$selectschool='')
	{
         //echo $selectschool;
		$searchid=mysqli_real_escape_string(GFHConfig::$link,$search);
		 $sql="SELECT `id`, `school_id`, `name`, `school_gender`, `school_region`, `service_fee`, `schoolimg`, `alert_fee`, `address`, `status` FROM `tbl_school` WHERE  `name` like '%".$searchid."%'";
		// if(isset($selectedregion)&&!empty($selectedregion))
		// {
            // if($selectedregion=='All Regions')
            // {
                
            // }
            if(isset($selectschool) && !empty($selectschool) && isset($selectedregion) && !empty($selectedregion))
            {
                $sql.=" and school_type='".$selectschool."' and school_region='".$selectedregion."'";
            }

            elseif(isset($selectedregion) && !empty($selectedregion)){
                $sql.=" and school_region='".$selectedregion."'";
            }
            else
            {
              $sql.=" and school_type='".$selectschool."'";  
            }

		// }
        // else if(isset($selectschool)&&!empty($selectschool))
        // {
            
            
        // }
       

		// echo $sql;die;
		return mysqli_query(GFHConfig::$link,$sql);
	}

	public function getApplicationAddress($userid="",$id="")
	{
		$userid=isset($_SESSION['SCH_USERID'])?$_SESSION['SCH_USERID']:'';
		if(isset($userid)&&!empty($userid))
		{
			$sql="SELECT * FROM `tbl_application_form_address` WHERE `fk_userid`='".$userid."'";
		
			return mysqli_query(GFHConfig::$link,$sql);
		}

	}

	public function getAllApplicationAddress($id="")
	{
		$sql="SELECT * FROM `tbl_application_form_address`";
		if(isset($id)&&!empty($id))
		{
			$sql.=" where id='".$id."'";
		}
		$sql.=" order by id desc";
		// echo $sql;die;
		return mysqli_query(GFHConfig::$link,$sql);
	}

    public function getAllApplicationAddress1($id="")
    {
        $sql="SELECT * FROM `tbl_application_form_address`";
        if(isset($id)&&!empty($id))
        {
            $sql.=" where fk_userid='".$id."'";
        }
        $sql.=" order by id desc";
        // echo $sql;die;
        return mysqli_query(GFHConfig::$link,$sql);
    }

    public function getAllApplicationchild1($id="")
    {
        $sql="SELECT * FROM `tbl_application_form_childdetail`";
        if(isset($id)&&!empty($id))
        {
            $sql.=" where userid='".$id."'";
        }
        // echo $sql;die;
        return mysqli_query(GFHConfig::$link,$sql);
    }

	public function getAllApplicationchild($id="")
	{
		$sql="SELECT * FROM `tbl_application_form_childdetail`";
		if(isset($id)&&!empty($id))
		{
			$sql.=" where id='".$id."'";
		}
		// echo $sql;die;
		return mysqli_query(GFHConfig::$link,$sql);
	}

    public function getAllApplicationfather1($id="")
    {
        $sql="SELECT * FROM `tbl_application_form_father`";
        if(isset($id)&&!empty($id))
        {
            $sql.=" where fk_userid='".$id."'";
        }
        // echo $sql;die;
        return mysqli_query(GFHConfig::$link,$sql);
    }

	public function getAllApplicationfather($id="")
	{
		$sql="SELECT * FROM `tbl_application_form_father`";
		if(isset($id)&&!empty($id))
		{
			$sql.=" where id='".$id."'";
		}
		// echo $sql;die;
		return mysqli_query(GFHConfig::$link,$sql);
	}

	public function getAllApplicationmother($id="")
	{
		$sql="SELECT * FROM `tbl_application_form_mother`";
		if(isset($id)&&!empty($id))
		{
			$sql.=" where id='".$id."'";
		}
		// echo $sql;die;
		return mysqli_query(GFHConfig::$link,$sql);
	}

    public function getAllApplicationmother1($id="")
    {
        $sql="SELECT * FROM `tbl_application_form_mother`";
        if(isset($id)&&!empty($id))
        {
            $sql.=" where userid='".$id."'";
        }
        // echo $sql;die;
        return mysqli_query(GFHConfig::$link,$sql);
    }


    public function getAllApplicationsibling1($id="")
    {
        $sql="SELECT * FROM `tbl_sibling`";
        if(isset($id)&&!empty($id))
        {
            $sql.=" where userid='".$id."'";
        }
        // echo $sql;die;
        return mysqli_query(GFHConfig::$link,$sql);
    }

	public function getAllApplicationsibling($id="")
	{
		$sql="SELECT * FROM `tbl_sibling`";
		if(isset($id)&&!empty($id))
		{
			$sql.=" where id='".$id."'";
		}
		// echo $sql;die;
		return mysqli_query(GFHConfig::$link,$sql);
	}

	public function getApplicationChild($userid="",$id="")
	{
		$userid=isset($_SESSION['SCH_USERID'])?$_SESSION['SCH_USERID']:'';

		if(isset($userid)&&!empty($userid))
		{
			$sql="SELECT * FROM `tbl_application_form_childdetail` WHERE `userid`='".$userid."'";
		}

		return mysqli_query(GFHConfig::$link,$sql);
	}

	public function getApplicationFather($userid="",$id="")
	{
		$userid=isset($_SESSION['SCH_USERID'])?$_SESSION['SCH_USERID']:'';
		// echo $userid;die;
		if(isset($userid)&&!empty($userid))
		{
			$sql="SELECT * FROM `tbl_application_form_father` WHERE `fk_userid`='".$userid."'";
		}

		return mysqli_query(GFHConfig::$link,$sql);
	}

	public function getApplicationMother($userid="",$id="")
	{
		$userid=isset($_SESSION['SCH_USERID'])?$_SESSION['SCH_USERID']:'';
		if(isset($userid)&&!empty($userid))
		{
			$sql="SELECT * FROM `tbl_application_form_mother` WHERE `userid`='".$userid."'";
		}

		return mysqli_query(GFHConfig::$link,$sql);
	}

	public function getApplicationSibling($userid="",$id="")
	{
		$userid=isset($_SESSION['SCH_USERID'])?$_SESSION['SCH_USERID']:'';
		if(isset($userid)&&!empty($userid))
		{
			$sql="SELECT * FROM `tbl_sibling` WHERE `userid`='".$userid."'";
		}

		return mysqli_query(GFHConfig::$link,$sql);
	}

	public function getApplicationSiblingDetail($userid="")
	{
		$userid=isset($userid)?$userid:'';
		$sql="SELECT * FROM `tbl_sibling_detail`";
		if(isset($userid)&&!empty($userid))
		{
			$sql.=" WHERE `fk_id`='".$userid."'";
		}
        // echo $sql;die;
		return mysqli_query(GFHConfig::$link,$sql);
	}

	public function getApplicationSiblingDetail1($userid="")
	{
		$userid=isset($_SESSION['SCH_USERID'])?$_SESSION['SCH_USERID']:'';
		
		if(isset($userid)&&!empty($userid))
		{
			$sql="SELECT * FROM `tbl_sibling_detail`";
			$sql.=" WHERE `fk_id`='".$userid."'";
		}

		return mysqli_query(GFHConfig::$link,$sql);
	}

    public function getApplicationDocument1($userid="")
    {
        $sql="SELECT * FROM `tbl_sibling_document`";
        if(isset($userid)&&!empty($userid))
        {
            $sql.=" WHERE `userid`='".$userid."'";
            
        }
        return mysqli_query(GFHConfig::$link,$sql);

        
    }

	public function getApplicationDocument($userid="",$id="")
	{
		$userId=isset($_SESSION['SCH_USERID'])?$_SESSION['SCH_USERID']:'';
		if(isset($userid)&&!empty($userid))
		{
			$sql="SELECT * FROM `tbl_sibling_document` WHERE `userid`='".$userId."'";
            return mysqli_query(GFHConfig::$link,$sql);
		}

		
	}

	public function getOrder()
	{
		$userId=isset($_SESSION['SCH_USERID'])?$_SESSION['SCH_USERID']:'';
		
		if(isset($userId)&&!empty($userId))
		{
			$sql="SELECT * FROM `tbl_order` WHERE `userid`='".$userId."' and status='1'";
            // echo $sql;die;
            return mysqli_query(GFHConfig::$link,$sql);
		}
		//echo $sql;die;
		
	}

    public function getOrder1()
    {
        $userId=isset($_SESSION['SCH_USERID'])?$_SESSION['SCH_USERID']:'';
        
        if(isset($userId)&&!empty($userId))
        {
            $sql="SELECT * FROM `tbl_order` WHERE `userid`='".$userId."' and status='1'";
            // echo $sql;die;
            return mysqli_query(GFHConfig::$link,$sql);
        }
        //echo $sql;die;
        
    }

	public function changePassword(){
		$response=array();
		$oldpassword=isset($_POST['oldpassword'])?$_POST['oldpassword']:'';
		$newpassword=isset($_POST['newpassword'])?$_POST['newpassword']:'';
		$userId=isset($_SESSION['SCH_USERID'])?$_SESSION['SCH_USERID']:'';
		$check=mysqli_query(GFHConfig::$link,"SELECT * FROM `tbl_register` WHERE `id`='".$userId."' and password='".$oldpassword."'");
		if(mysqli_num_rows($check)>0)
		{
			$sql="UPDATE `tbl_register` SET `password`='".$newpassword."' WHERE `id`='".$userId."'";
			$result=mysqli_query(GFHConfig::$link,$sql);
			if($result)
			{
				$response=array('status'=>'success','msg'=>'successfully changed.');
			}else{
				$response=array('status'=>'failed','msg'=>'not update');
			}
		}else{
			$response=array('status'=>'failed','msg'=>'Old password does not match.');
		}
		return $response;
		
	}

	public function requestForCall()
	{
		$response=array();
		$mobile=isset($_POST['phone'])?$_POST['phone']:'';
		$userId=isset($_SESSION['SCH_USERID'])?$_SESSION['SCH_USERID']:'';
		$sql="UPDATE `tbl_register` SET `requestcall`='".$mobile."',`requestdate`=now() WHERE `id`='".$userId."'";
		$result=mysqli_query(GFHConfig::$link,$sql);
		if($result)
		{
            $to = "contact@schoolling.com";
              $subject = "User requested for call";

              $message = "
              <p>Dear Admin,</p>
              <table >
              <tr>
              <td>Mobile</td>
              <td>".$mobile."</td>
              </tr>
              </table>
              ";

              // Always set content-type when sending HTML email
              $headers = "MIME-Version: 1.0" . "\r\n";
              $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

              $headers .= 'From: <contact@schoolling.com>' . "\r\n";
              
              @mail($to,$subject,$message,$headers);
              

			$response=array('status'=>'success','msg'=>'Successfully Sent');
		}
		return $response;
	}


	public function order($id="")
	{
		$sql="SELECT `id`, `userid`, `sk_id`, `amount`, `appform_status`, `appformsubstatus`, `common_admission_form`, `parent_signature`, `submission_to_school`, `receipt_from_school`, `parent_visit_for_admission`, `status`, `order_date`,`taxnid` FROM `tbl_order`";
		if(isset($id) && !empty($id))
		{
			$sql.=" where id='".$id."'";
		}else{
			$sql.=" order by id desc";
		}
		// echo $sql;die;
		return mysqli_query(GFHConfig::$link,$sql);
	}

	public function trackStatus($userid)
	{
		$sql="SELECT O.`id`, O.`userid`,OD.`id` as trackid, OD.`sk_id`, O.`amount`, OD.`common_admission_form`, OD.`parent_signature`, OD.`submission_to_school`, OD.`receipt_from_school`, OD.`parent_visit_for_admission`, O.`order_date` FROM `tbl_order` O inner join tbl_orderdetail OD on O.id=OD.oid WHERE O.status='1' and O.userid='".$userid."' order by OD.`id` asc";
		// if(isset($id) && !empty($id))
		// {
		
		// }
		// echo $sql;die;
		return mysqli_query(GFHConfig::$link,$sql);
	}

	public function getOrderDetail($oid)
	{
		$sql="SELECT * FROM `tbl_orderdetail` where oid='".$oid."'";
		return mysqli_query(GFHConfig::$link,$sql);
	}

    public function getOrderDetail1($id)
    {
        $sql="SELECT * FROM `tbl_orderdetail` where id='".$id."'";
        return mysqli_query(GFHConfig::$link,$sql);
    }

	public function facebookLogin($fid="",$fname="",$femail=""){
        
        $prev_query = mysqli_query(GFHConfig::$link,"SELECT * FROM `tbl_register` WHERE fb_uid=".$fid);
        
        if(mysqli_num_rows($prev_query)>0){
        	
            $result = mysqli_query(GFHConfig::$link,"UPDATE `tbl_register` SET email = '".$femail."',social='FACEBOOK',first_name='".$fname."' where fb_uid=".$fid);

        }else{
            $result = mysqli_query(GFHConfig::$link,"INSERT INTO tbl_register SET email = '".$femail."',social='FACEBOOK',first_name='".$fname."',fb_uid=".$fid.", status=3");
        }

        if($result)
        {
            $sql = mysqli_query(GFHConfig::$link,"SELECT * FROM tbl_register WHERE fb_uid=".$fid);
            $row=mysqli_fetch_array($sql);
            if(!session_id())
                {
                     session_start();
                }
              $_SESSION['SCH_USERID']=$row['id'];
				$_SESSION['SCH_USEREMAIL']=$row['email'];
              //echo "<pre>"; print_r($_SESSION);die;
              //self::redirect('user-dashboard.php');
            header('location:index.php');
        }
    }

    public function googlePluseLogin($fid="",$fname="",$femail=""){
        //echo "<pre>";print_r($fid);die;
        $prev_query = mysqli_query(GFHConfig::$link,"SELECT * FROM tbl_register WHERE fb_uid='".$fid."'");
        
        if(mysqli_num_rows($prev_query)>0){
            $result = mysqli_query(GFHConfig::$link,"UPDATE tbl_register SET email = '".$femail."',social='GPLUSE',first_name='".$fname."',updated_at=now() where fb_uid='".$fid."'");
        }else{
            $result = mysqli_query(GFHConfig::$link,"INSERT INTO tbl_register SET email = '".$femail."',social='GPLUSE',first_name='".$fname."',fb_uid='".$fid."', status=3");
        }

        if($result)
        {
            $sql = mysqli_query(GFHConfig::$link,"SELECT * FROM tbl_register WHERE fb_uid='".$fid."'");
            $row=mysqli_fetch_array($sql);
            if(!session_id()){

                     session_start();
                }

              $_SESSION['SCH_USERID']=$row['id'];
				$_SESSION['SCH_USEREMAIL']=$row['email'];
             
            header('location:index.php');
            
        }
    }
    public function twitterLogin($fid="",$fname="",$femail=""){
        
        $prev_query = mysqli_query(GFHConfig::$link,"SELECT * FROM `tbl_register` WHERE fb_uid='".$fid."'");
        
        if(mysqli_num_rows($prev_query)>0){
            
            $result = mysqli_query(GFHConfig::$link,"UPDATE `tbl_register` SET email = '".$femail."',social='TWITTER',first_name='".$fname."',updated_at=now() where fb_uid='".$fid."'");

        }else{
            $result = mysqli_query(GFHConfig::$link,"INSERT INTO tbl_register SET email = '".$femail."',social='TWITTER',first_name='".$fname."',fb_uid='".$fid."', status=3");
        }

        if($result)
        {
            $sql = mysqli_query(GFHConfig::$link,"SELECT * FROM tbl_register WHERE fb_uid='".$fid."'");
            $row=mysqli_fetch_array($sql);
            if(!session_id())
                {
                     session_start();
                }
              $_SESSION['SCH_USERID']=$row['id'];
                $_SESSION['SCH_USEREMAIL']=$row['email'];
              //echo "<pre>"; print_r($_SESSION);die;
              //self::redirect('user-dashboard.php');
            header('location:index.php');
        }
    }
    public function LinkedinLogin($fid="",$fname="",$femail=""){
        
        $prev_query = mysqli_query(GFHConfig::$link,"SELECT * FROM tbl_register WHERE fb_uid='".$fid."'");
        
        if(mysqli_num_rows($prev_query)>0){
            //echo "string";
            $result = mysqli_query(GFHConfig::$link,"UPDATE tbl_register SET email = '".$femail."',social='Linkedin',first_name='".$fname."',updated_at=now() where fb_uid='".$fid."'");
            $sql = mysqli_query(GFHConfig::$link,"SELECT * FROM tbl_register WHERE fb_uid='".$fid."'");
            $row=mysqli_fetch_array($sql);
            if(!session_id()){

                     session_start();
                }

              $_SESSION['SCH_USERID']=$row['id'];
                $_SESSION['SCH_USEREMAIL']=$row['email'];
              header("location:index.php");
              
        }else{
            $result = mysqli_query(GFHConfig::$link,"INSERT INTO tbl_register SET email = '".$femail."',social='Linkedin',first_name='".$fname."',fb_uid='".$fid."', status=3");
            $sql = mysqli_query(GFHConfig::$link,"SELECT * FROM tbl_users WHERE fb_uid='".$fid."'");
            $row=mysqli_fetch_array($sql);
            if(!session_id()){

                     session_start();
                }

               $_SESSION['SCH_USERID']=$row['id'];
                $_SESSION['SCH_USEREMAIL']=$row['email'];
              header("location:index.php");
        }

        
    }

    public function checkFormfilled()
    {
        @session_start();
         $userid=isset($_SESSION['SCH_USERID'])?$_SESSION['SCH_USERID']:'';
        $sql="SELECT * FROM  tbl_order O inner join `tbl_orderdetail` OD WHERE  userid='".$userid."'";
        // echo  $sql;die;
       return  mysqli_query(GFHConfig::$link,$sql);
    }




}

global $GFH_Admin;

$GFH_Admin=new GFHAdmin();