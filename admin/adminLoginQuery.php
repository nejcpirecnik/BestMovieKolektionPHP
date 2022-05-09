<?php 

session_start();

$email = $_GET['email'];
$password = $_GET['password'];

if(($email=='admin@admin.com') AND ($password=='toor')){
    $_SESSION['adminStatus'] = 1;
    header("Location: index.php");
}else{
    header("Location: adminLogin.php");
}

?>