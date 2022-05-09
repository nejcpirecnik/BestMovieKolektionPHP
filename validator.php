<?php 

session_start();
include "postgresqlDBConnect.php";

$userID = 1;

$user = $db->query("SELECT * FROM users WHERE id = $userID")->fetch();
$_SESSION['userEmail'] = $user['email'];
echo $_SESSION['userEmail'];

header("Location: http://bestmoviekolektion.herokuapp.com/");

?>