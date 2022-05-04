<?php
/*
    $var = implode(",", $_POST['check_list']);
    echo $var;
*/

    include "postgresqlDBConnect.php";

    $moviePrice = $_POST["moviePrice"];
    $seatCount = count($_POST['check_list']);
    $totalTicketPrice = $moviePrice*$seatCount;
    echo "Number of seats: ".$seatCount."<br>Total price:".$totalTicketPrice."<br>"; 


    $names = empty($_POST['check_list']) ? [] : $_POST['check_list'];
    foreach($names AS $name){
        if (!empty($name)) {
              $test= '['.implode(", ", (array)$name).']';                    
              print_r($test);
              /*
              $sql = "INSERT INTO seats (name) VALUES ('$test')";
              if ($conn->query($sql) === true) {
                echo ('ok');
             }       
             */       
        }
    }
