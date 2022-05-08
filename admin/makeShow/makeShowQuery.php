<?php 

include "../../postgresqlDBConnect.php";

$movieID = $_GET['movieID'];
$dateSelected = $_GET['dateSelected'];
$timeSelected = $_GET['timeSelected'];

echo "Movie ID: ".$movieID;
echo "Date: ".$dateSelected;
echo "Time: ".$timeSelected;

$dateQuery = $dateSelected.' '.$timeSelected.':00';
echo "<br><br><br><br>".$dateQuery;

$timestamp = strtotime($dateSelected);
$dayName = date('D', $timestamp);


$sql = "INSERT INTO shows (movie_id, day_name, date, time) VALUES (?,?,?,?)";
$stmt= $db->prepare($sql);
$stmt->execute([$movieID, $dayName, $dateSelected, $timeSelected]);

header("Location: makeShow.php");
?>