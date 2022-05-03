<?php 

include "db.php"; 
$data = $pdo->query("SELECT * FROM shows 
INNER JOIN movies ON movies.movie_id = shows.movie_id INNER JOIN rooms ON rooms.room_id = shows.room_id")->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
</head>
<body>
    <?php
foreach ($data as $row) {
    $showID = $row['show_id'];
    $movieID = $row['movie_id'];
    $movieName = $row['name'];
    $movieDesc = $row['description'];
    $movieImage = $row['image'];
    $movieLength = $row['length'];

    $playTime = $row['time'];
    $theaterRoom = $row['room_name'];
    $theaterRoomTakenSeats = $row['room_taken_seats'];
    $theaterRoomAvailableSeats = $row['room_number_of_seats'];

    echo '
    <div style="margin:10px; border:1px solid; padding:5px;">
    <p><b>'.$movieName.'</b></p>
    <p>'.$movieDesc.'</p>
    <img src="'.$movieImage.'" width="150px" height="200px">
    <p><b>Movie length:</b> '.$movieLength.'h</p>
    <p><b>Playing at:</b> '.$playTime.'</p>
    <p><b>Theater room:</b> '.$theaterRoom.'</p>
    <p><b>Available seats:</b> '.$theaterRoomAvailableSeats-$theaterRoomTakenSeats."/".$theaterRoomAvailableSeats.'</p>
    <p>Show ID: '.$showID.'</p>
    
    
    
    
    
    
    <a href="reserveSeat.php?movie_id='.$movieID.'&show_id='.$showID.'">Buy Ticket</a>
    </div>
    ';
}
    ?>
</body>
</html>