<?php 

include 'postgresqlDBConnect.php';

$dateTime = $_GET['datetime'];
$movieID = $_GET['selectedMovie'];

$sql = "INSERT INTO shows (datetime, movie_id) VALUES (?,?)";
$stmt= $db->prepare($sql);
$stmt->execute([$dateTime, $movieID]);

?>