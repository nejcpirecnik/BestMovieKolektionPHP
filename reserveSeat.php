<?php 

session_start();

include 'postgresqlDBConnect.php';
$showID = $_GET['show_id'];
$movieID = $_GET['movie_id'];

$showsData = $db->query("SELECT * FROM shows INNER JOIN movies ON shows.movie_id = movies.id WHERE shows.id=$showID")->fetchAll();

$data = $db->query("SELECT selected_seat FROM seats WHERE show_id = $showID")->fetchAll();
// and somewhere later:
foreach ($data as $row) {
    $occupiedSeats[] = $row['selected_seat'];
}

$implodedSeats = implode(',', $occupiedSeats);
$explodedSeats = explode(",", $implodedSeats);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .double {
            zoom: 2;
            transform: scale(2);
            -ms-transform: scale(2);
            -webkit-transform: scale(2);
            -o-transform: scale(2);
            -moz-transform: scale(2);
            transform-origin: 0 0;
            -ms-transform-origin: 0 0;
            -webkit-transform-origin: 0 0;
            -o-transform-origin: 0 0;
            -moz-transform-origin: 0 0;
        }
        #path{
            background-color: gray;
        }
    </style>
</head>
<body>
        <?php
        foreach ($showsData as $row) { 

            $playTime = $row['datetime'];

            //Storing the playtime into a SESSION
            $_SESSION['playTime'] = $playTime;

            $date = new DateTime($playTime);
            $localDate = $date->format('d.m.Y');
            $localTime = $date->format('H:i');

            $ticketPrice = $row['price'];

            ?>
        
            <p>Selected movie: <b><?= $_SESSION['movieName']; ?></b></p>
            <p>Ticket price: <b><?= $ticketPrice; ?>€</b></p>
            <p>Play time: <b><?= $localDate ?></b> at <b><?= $localTime ?></b></p>
        <?php } ?>

    <form action="selectedSeats.php" method="post">
        <table>
            <tbody>
                <tr>
                    <td>
                        <?php 
                        if (in_array("A1", $explodedSeats)) {
                            echo '<img src="https://cdn-icons-png.flaticon.com/512/1828/1828665.png" style="width:15px;">';
                        }else{
                            echo '<input type="checkbox" id="A1" name="check_list[]" value="A1">';
                        }
                        ?>
                    </td>
                    <td>
                    <?php 
                        if (in_array("A2", $explodedSeats)) {
                            echo '<img src="https://cdn-icons-png.flaticon.com/512/1828/1828665.png" style="width:15px;">';
                        }else{
                            echo '<input type="checkbox" id="A2" name="check_list[]" value="A2">';
                        }
                        ?>
                    </td>
                    <td id="path">&nbsp;</td>
                    <td>
                    <?php 
                        if (in_array("A3", $explodedSeats)) {
                            echo '<img src="https://cdn-icons-png.flaticon.com/512/1828/1828665.png" style="width:15px;">';
                        }else{
                            echo '<input type="checkbox" id="A3" name="check_list[]" value="A3">';
                        }
                        ?>
                    </td>
                    <td>
                    <?php 
                        if (in_array("A4", $explodedSeats)) {
                            echo '<img src="https://cdn-icons-png.flaticon.com/512/1828/1828665.png" style="width:15px;">';
                        }else{
                            echo '<input type="checkbox" id="A4" name="check_list[]" value="A4">';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php 
                        if (in_array("B1", $explodedSeats)) {
                            echo '<img src="https://cdn-icons-png.flaticon.com/512/1828/1828665.png" style="width:15px;">';
                        }else{
                            echo '<input type="checkbox" id="B1" name="check_list[]" value="B1">';
                        }
                        ?>
                    </td>
                    <td>
                    <?php 
                        if (in_array("B2", $explodedSeats)) {
                            echo '<img src="https://cdn-icons-png.flaticon.com/512/1828/1828665.png" style="width:15px;">';
                        }else{
                            echo '<input type="checkbox" id="B2" name="check_list[]" value="B2">';
                        }
                        ?>
                    </td>
                    <td id="path">&nbsp;</td>
                    <td>
                    <?php 
                        if (in_array("B3", $explodedSeats)) {
                            echo '<img src="https://cdn-icons-png.flaticon.com/512/1828/1828665.png" style="width:15px;">';
                        }else{
                            echo '<input type="checkbox" id="B3" name="check_list[]" value="B3">';
                        }
                        ?>
                    </td>
                    <td>
                    <?php 
                        if (in_array("B4", $explodedSeats)) {
                            echo '<img src="https://cdn-icons-png.flaticon.com/512/1828/1828665.png" style="width:15px;">';
                        }else{
                            echo '<input type="checkbox" id="B4" name="check_list[]" value="B4">';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php 
                        if (in_array("C1", $explodedSeats)) {
                            echo '<img src="https://cdn-icons-png.flaticon.com/512/1828/1828665.png" style="width:15px;">';
                        }else{
                            echo '<input type="checkbox" id="C1" name="check_list[]" value="C1">';
                        }
                        ?>
                    </td>
                    <td>
                    <?php 
                        if (in_array("C2", $explodedSeats)) {
                            echo '<img src="https://cdn-icons-png.flaticon.com/512/1828/1828665.png" style="width:15px;">';
                        }else{
                            echo '<input type="checkbox" id="C2" name="check_list[]" value="C2">';
                        }
                        ?>
                    </td>
                    <td id="path">&nbsp;</td>
                    <td>
                    <?php 
                        if (in_array("C3", $explodedSeats)) {
                            echo '<img src="https://cdn-icons-png.flaticon.com/512/1828/1828665.png" style="width:15px;">';
                        }else{
                            echo '<input type="checkbox" id="C3" name="check_list[]" value="C3">';
                        }
                        ?>
                    </td>
                    <td>
                    <?php 
                        if (in_array("C4", $explodedSeats)) {
                            echo '<img src="https://cdn-icons-png.flaticon.com/512/1828/1828665.png" style="width:15px;">';
                        }else{
                            echo '<input type="checkbox" id="C4" name="check_list[]" value="C4">';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php 
                        if (in_array("D1", $explodedSeats)) {
                            echo '<img src="https://cdn-icons-png.flaticon.com/512/1828/1828665.png" style="width:15px;">';
                        }else{
                            echo '<input type="checkbox" id="D1" name="check_list[]" value="D1">';
                        }
                        ?>
                    </td>
                    <td>
                    <?php 
                        if (in_array("D2", $explodedSeats)) {
                            echo '<img src="https://cdn-icons-png.flaticon.com/512/1828/1828665.png" style="width:15px;">';
                        }else{
                            echo '<input type="checkbox" id="D2" name="check_list[]" value="D2">';
                        }
                        ?>
                    </td>
                    <td id="path">&nbsp;</td>
                    <td>
                    <?php 
                        if (in_array("D3", $explodedSeats)) {
                            echo '<img src="https://cdn-icons-png.flaticon.com/512/1828/1828665.png" style="width:15px;">';
                        }else{
                            echo '<input type="checkbox" id="C3" name="check_list[]" value="C3">';
                        }
                        ?>
                    </td>
                    <td>
                    <?php 
                        if (in_array("D4", $explodedSeats)) {
                            echo '<img src="https://cdn-icons-png.flaticon.com/512/1828/1828665.png" style="width:15px;">';
                        }else{
                            echo '<input type="checkbox" id="D4" name="check_list[]" value="D4">';
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <input type="hidden" name="moviePrice" value="<?= $ticketPrice; ?>">
        <input type="hidden" name="showID" value="<?= $showID; ?>">

        <input type="submit">
    </form>
</body>

</html>