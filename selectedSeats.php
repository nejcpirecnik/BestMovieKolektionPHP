<?php
/*
    $var = implode(",", $_POST['check_list']);
    echo $var;
*/

    include "postgresqlDBConnect.php";

    $movieID = $_GET['movie_id'];
    $movie = $pdo->query("SELECT * FROM movies")->fetch();

    $names = empty($_POST['check_list']) ? [] : $_POST['check_list'];

    echo "Selected movie: ".$movie;

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
?>

