<?php 

session_start();
$_SESSION['adminStatus'] = 0;
header("Location:admin/adminLogin.php")

?>