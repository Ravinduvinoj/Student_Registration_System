<?php 
session_start();
//session_destroy();
$_SESSION['usertype'] = '';
$_SESSION['user'] = '';
$_SESSION['userid'] = '';
header("Location:Login.php");

?>
