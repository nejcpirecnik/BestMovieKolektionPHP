<?php 
error_reporting(0);
include "../../postgresqlDBConnect.php";

$showID = $_GET['showID'];
$movieID = $_GET['movieID'];
$dateSelected = $_GET['userID'];
$timeSelected = $_GET['timeSelected'];

$timestamp = strtotime($dateSelected);
$dayName = date('D', $timestamp);

$sql = "UPDATE shows SET movie_id=?, day_name=?, date=?, time=? WHERE shows_id = ?";
$stmt= $db->prepare($sql);
$stmt->execute([$movieID, $dayName, $dateSelected, $timeSelected, $showID]);

header("location: ../showsIndex.php")
?>