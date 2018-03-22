<?php  require_once('admin_panel/includes/function.php');
global $GFH_Admin;
 
date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
 
if(isset($_POST))
{
    session_start();

$sql="SELECT * FROM `tbl_order` WHERE `userid`='".$_SESSION['SCH_USERID']."' and status='1' order by id limit 0,1";
            // echo $sql;die;
 $odrs=mysqli_query(GFHConfig::$link,$sql);
 if(mysqli_num_rows($odrs)>0){

    $userinfo=$GFH_Admin->getRegisterUsers(@$_SESSION['SCH_USERID']);
    $user=mysqli_fetch_assoc($userinfo);
// echo json_encode(array('status'=>'success'));die;
      $result=$GFH_Admin->checkFormfilled();
        $res=mysqli_fetch_assoc($result);
        $currentdate=date('Y-m-d H:i:s');
        // $currentdate1=strtotime($currentdate);
        $orderdate=$res['order_date'];
       /* $orderdate1=strtotime($orderdate);
        $totalhours=($currentdate1 - $orderdate1)/60;*/

        $datestr=$orderdate;//Your date
        // $date=strtotime($datestr);//Converted to a PHP date (a second count)

       

        $timeFirst  = strtotime($res['order_date']);
        $timeSecond = strtotime($currentdate);
        $differenceInSeconds = $timeSecond - $timeFirst;
        $hour=($differenceInSeconds/3600);
        if($hour<=72)
        {
            if($user['common_admission_form']==5)
            {
                echo json_encode(array('status'=>'read'));
            }else{
                 echo json_encode(array('status'=>'success'));
            }
        }else{
            if($user['common_admission_form']==5)
            {
                echo json_encode(array('status'=>'read'));
            }else{
                echo json_encode(array('status'=>'success'));
            }
        }
        // echo json_encode(array('status'=>'success'));die;
 }else{
    echo json_encode(array('status'=>'atleast','msg'=>'Apply to atleast one school','redirect'=>'apply-to-schools.php'));
 }

// echo json_encode(array('status'=>'success'));die;
 
// if(mysqli_num_rows($orders)>0){
                        
        // echo json_encode(array('status'=>'success'));   
        // $result=$GFH_Admin->checkFormfilled();
        // $res=mysqli_fetch_assoc($result);
        // $currentdate=date('d-m-Y');
        // $currentdate1=strtotime($currentdate);
        // $orderdate=$res['order_date'];
        // $orderdate1=strtotime($orderdate);
        // $totalhours=($currentdate1 - $orderdate1)/60;
        // if($totalhours<=72)
        // {
        //     echo json_encode(array('status'=>'success'));
        // }else{
        //     if($res['parent_visit_for_admission']==1)
        //     {
        //         echo json_encode(array('status'=>'update'));
        //     }else{
        //         echo json_encode(array('status'=>'read'));
        //     }
        // }

    //     }else{
    //    echo echo json_encode(array('status'=>'failed'));
    // } 
// die();
}
?>