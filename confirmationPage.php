<?php

session_start();

include 'postgresqlDBConnect.php';

    //Retreiving SESSION variables here
    $lastTicketID = $_SESSION['lastTicketID'];
    $seatCount = $_SESSION['seatCount'];
    $totalTicketPrice = $_SESSION['totalTicketPrice'];
    $showID = $_SESSION['selectedShowID'];
    $playTime = $_SESSION['playTime'];
    $movieName = $_SESSION['movieName'];
    $seatArray = $_SESSION['seatArray'];
?>

<h1>Congratulations!</h1>
<p>You have reserved <b><?= $seatCount; ?> seats (<?= $seatArray; ?>)</b> at a cost of <b><?= $totalTicketPrice; ?>€</b> for the movie <b><?= $movieName; ?></b> which is playing on <b><?= $playTime; ?></b></p>
<a href="PDF_Testing/index.php">Open ticket</a>
