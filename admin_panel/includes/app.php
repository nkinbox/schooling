<?php
require_once('config.php');
class App extends GFHConfig
{
    public static $msg = "";
    public static $error = "";

    public function __construct()
    {
        parent::__construct();
    }

    public function driverRegister()
    {
        //echo "<pre>"

        $response=array();
        $name=isset($_POST['name'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['name']):'';
        $email=isset($_POST['email'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['email']):'';
        $mobile=isset($_POST['mobile'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['mobile']):'';
        $password=isset($_POST['password'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['password']):'';
        $address=isset($_POST['address'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['address']):'';
        $vehicle_no=isset($_POST['vehicle_no'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['vehicle_no']):'';
        $vehicle_type=isset($_POST['vehicle_type'])?mysqli_real_escape_string(GFHConfig::$link,$_POST['vehicle_type']):'';
       
       
        $allowedExts = array("jpg", "jpeg", "gif", "png","pdf","doc","docx");

        $extension = strtolower(pathinfo($_FILES['address_proof']['name'], PATHINFO_EXTENSION));
        $extension1 = strtolower(pathinfo($_FILES['document']['name'], PATHINFO_EXTENSION));
        $extension2 = strtolower(pathinfo($_FILES['rcdocument']['name'], PATHINFO_EXTENSION));
        $extension3 = strtolower(pathinfo($_FILES['id_proof']['name'], PATHINFO_EXTENSION));
        $sql="INSERT INTO tbl_driver_register (name,email,mobile,password,address,vehicle_no,vehicle_type,status,created_at) VALUES ('".$name."','".$email."','".$mobile."','".$password."','".$address."','".$vehicle_no."','".$vehicle_type."','1',now())";
       /* $sql="insert into `tbl_driver_register` SET `name`='".$name."',`email`='".$email."',`mobile`='".$mobile."',`password`='".$password."',`address`='".$address."',`vehicle_no`='".$vehicle_no."',`vehicle_type`='".$vehicle_type."',`status`='1',`created_at`=now()";*/
        $result=mysqli_query(GFHConfig::$link,$sql);

        if($result)
        {
            $insertid=mysqli_insert_id(GFHConfig::$link);
            if ($_FILES['address_proof']['name'] != "") {
                if (in_array($extension, $allowedExts)) {
                    
                    $img = "address-" . $insertid . "." . $extension;
                    mysqli_query(GFHConfig::$link, "UPDATE `tbl_driver_register` SET `address_proof`='".$img."' WHERE `id`='".$insertid."'");
                    move_uploaded_file($_FILES['address_proof']['tmp_name'], "driver/address/" . $img);
                }
            }

            if ($_FILES['document']['name'] != "") {
                if (in_array($extension1, $allowedExts)) {
                    
                    $document = "document-" . $insertid . "." . $extension;
                    mysqli_query(GFHConfig::$link, "UPDATE `tbl_driver_register` SET `document`='".$document."' WHERE `id`='".$insertid."'");
                    move_uploaded_file($_FILES['document']['tmp_name'], "driver/document/" . $document);
                }
            }

            if ($_FILES['rcdocument']['name'] != "") {
                if (in_array($extension2, $allowedExts)) {
                    
                    $rcdocument = "rcdocument-" . $insertid . "." . $extension;
                    mysqli_query(GFHConfig::$link, "UPDATE `tbl_driver_register` SET `rcdocument`='".$rcdocument."' WHERE `id`='".$insertid."'");
                    move_uploaded_file($_FILES['rcdocument']['tmp_name'], "driver/rcdocument/" . $rcdocument);
                }
            }

            if($_FILES['id_proof']['name'] != "") {
                if (in_array($extension3, $allowedExts)) {
                    
                    $id_proof = "id_proof-" . $insertid . "." . $extension;
                    mysqli_query(GFHConfig::$link, "UPDATE `tbl_driver_register` SET `id_proof`='".$id_proof."' WHERE `id`='".$insertid."'");
                    move_uploaded_file($_FILES['id_proof']['tmp_name'], "driver/id_proof/" . $rcdocument);
                }
            }

            echo json_encode(array('result'=>1,'id'=>$insertid,'msg'=>'success'));
        }
        die;
    }


}
global $GFH_App;

$GFH_App=new App();