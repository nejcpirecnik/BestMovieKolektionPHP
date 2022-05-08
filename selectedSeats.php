<?php

session_start();

/*
    $var = implode(",", $_POST['check_list']);
    echo $var;
*/

include "postgresqlDBConnect.php";

$moviePriceString = $_POST["moviePrice"];
$showID = $_POST["showID"];

$moviePrice = (float)$moviePriceString;
$seatCount = count($_POST['check_list']);
$totalTicketPrice = $moviePrice * $seatCount;

//Setting up a session
    $_SESSION['seatCount'] = $seatCount;
    $_SESSION['totalTicketPrice'] = $totalTicketPrice;
    $_SESSION['selectedShowID'] = $showID;

    $movieName = $_SESSION['movieName'];
?>

<p>Selected seats: <?= $seatCount ?></p>
<p>Ticket price: <?= $totalTicketPrice ?>€</p>
<p>Movie name: <?= $movieName; ?></p>

<?php 
    //Makes a new seat query.
    $SeatArray = implode(",", $_POST['check_list']); 

    $_SESSION['seatArray'] = $SeatArray;

    $sql = "INSERT INTO seats (selected_seat, show_id) VALUES (?,?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$SeatArray, $showID]);





    //NEW TICKET SYSTEM
    // Getting the last generated seat.
    $stmt = $db->query("SELECT * FROM seats ORDER BY id DESC LIMIT 1");
    $lastSeat = $stmt->fetch();

    $lastSeatID = $lastSeat['id'];

    //Inserting all the data into a ticket
    $sql = "INSERT INTO tickets (user_id, seat_id, show_id) VALUES (?,?,?)";
    $stmt = $db->prepare($sql);
    $userID = 1;
    $stmt->execute([$userID, $lastSeatID, $showID]);

    //Getting last tickets ID
    $lastTicketID = $db->query("SELECT * FROM tickets ORDER BY id DESC LIMIT 1")->fetch();

    //Getting the last ticket ID into a session.
    $_SESSION['lastTicketID'] = $lastTicketID;

    header("Location:confirmationPage.php");

?>