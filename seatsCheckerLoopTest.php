<?php 

include 'postgresqlDBConnect.php';

$stmt = $db->query("SELECT * FROM seats");
$user = $stmt->fetch();

$var = implode(",", $user);
print $var;
?>