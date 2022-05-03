<?php
$host = "ec2-34-248-169-69.eu-west-1.compute.amazonaws.com";
$dbname = "d73crng95mbdr8";
$user = "dwhklgewlkfybc";
$password = "d484a6cea09c1803c3061b7589147e3e70ad91d8bf0582ea48888f3d4190d915";
$port = "5432";

$dsn = "pgsql:host=$host;dbname=$dbname;user=$user;port=$port;password=$password";

$db = new PDO($dsn);

 ?>