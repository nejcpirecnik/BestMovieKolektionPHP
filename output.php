<?php 

include 'postgresqlDBConnect.php';

$data = $db->query("SELECT * FROM users")->fetchAll();
foreach ($data as $row) {
    echo $row['email']."<br>";
}

?>