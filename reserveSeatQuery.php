<?php 



include 'db.php';

//User Details
$userFirstName = $_GET['fname'];
$userLastName = $_GET['lname'];
$userEmail = $_GET['email'];

//Order Details
$numberOfTickets = $_GET['number_of_tickets'];
$orderTotal = $_GET['cost'];

$showID = $_GET["show_id"];
$userID = 1;

?>
<p><b>Congratulations!</b></p>
<p>You have ordered <?php echo $numberOfTickets; ?> tickets and spent <?php echo $orderTotal; ?>€</p>

<?php 
$sql = "INSERT INTO tickets (ticket_number_of_seats, ticket_id, user_id) VALUES (?,?,?)";

$stmt= $pdo->prepare($sql);
$stmt->execute([$numberOfTickets, $showID, $userID]);

?>