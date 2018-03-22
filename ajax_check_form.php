<?php
require_once('admin_panel/includes/function.php');
global $GFH_Admin;

if(isset($_POST))
{
	$result=$GFH_Admin->checkFormfilled();
	$res=mysqli_fetch_assoc($result);

	$userinfo=$GFH_Admin->getRegisterUsers(@$_SESSION['SCH_USERID']);
    $user=mysqli_fetch_assoc($userinfo);
	
		$checkorders=$GFH_Admin->getOrder();
			if (mysqli_num_rows($checkorders)==1) {
				
				$currentdate=date('d-m-Y');
				$currentdate1=strtotime($currentdate);
				$orderdate=$res['order_date'];
				$orderdate1=strtotime($orderdate);
				$totalhours=($currentdate1 - $orderdate1)/60;
				if($totalhours<=72)
				{
					echo "success";
				}else{
					if($user['common_admission_form']==5)
					{
						echo "success";
					}else{
						echo "You have exceeded the stipulated time for filling the common admission form. For concerns, please contact M:+91 9811831531 or E:contact@schoolling.com";
					}
				}
		
		}else{
			echo "success";
		}
		
// }
die;
}