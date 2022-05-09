<?php 
error_reporting(0);
include "../../postgresqlDBConnect.php";

$userEmail = $_GET['userEmail'];
$userID = $_GET['userID'];

$sql = "UPDATE users SET email=? WHERE id = ?";
$stmt= $db->prepare($sql);
$stmt->execute([$userEmail, $userID]);

header("location: ../usersIndex.php")
?>