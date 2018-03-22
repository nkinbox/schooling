<?php
session_start();
unset($_SESSION['SCH_USERID']);
unset($_SESSION['SCH_USERPHONE']);
unset($_SESSION['SCH_USEREMAIL']);
header('location:index.php');
?>