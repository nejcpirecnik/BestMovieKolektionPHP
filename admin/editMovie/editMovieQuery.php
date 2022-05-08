<?php 

include "../../postgresqlDBConnect.php";

$movieID = $_GET['movieID'];
$movieName = $_GET['movieName'];
$movieDescription = $_GET['movieDescription'];
$movieImage = $_GET['movieImage'];
$movieRating = $_GET['movieRating'];
$moviePrice = $_GET['moviePrice'];

$movieStatus = $_GET['movieStatus'];

$status = 1;
if($movieStatus == 0){
    $status = 0;
}else{
    $status = 1;
}


$sql = "UPDATE movies SET name=?, description=?, image=?, rating=?, price=?, active=? WHERE id=?";
$stmt= $db->prepare($sql);
$stmt->execute([$movieName, $movieDescription, $movieImage, $movieRating, $moviePrice, $status, $movieID]);

header("location: editMovie.php")
?>