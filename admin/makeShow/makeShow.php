<?php
include '../../postgresqlDBConnect.php';

$movieData = $db->query("SELECT * FROM movies")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Show</title>
</head>

<body>
    <form action="makeShowQuery.php">
        <label for="selected_movie">Select a movie:</label><br>
        <select name="movieID" id="movieID">
            <?php foreach ($movieData as $movieRow) : ?>
                <option value="<?= $movieRow["id"] ?>"><?= $movieRow["name"] ?></option>
            <?php endforeach ?>
        </select><br>
        <label for="dateSelected">Select when to play:</label><br>
        <input type="date" name="dateSelected" id="dateSelected"><br>
        <label for="timeSelected">Time:</label>
        <select name="timeSelected" id="timeSelected">
            <option value="12:20">12:00</option>
            <option value="12:30">12:30</option>
            <option value="13:00">13:00</option>
            <option value="13:30">13:30</option>
            <option value="14:00">14:00</option>
            <option value="14:30">14:30</option>
            <option value="15:00">15:00</option>
            <option value="15:30">15:30</option>
            <option value="16:00">16:00</option>
            <option value="16:30">16:30</option>
            <option value="17:00">17:00</option>
            <option value="17:30">17:30</option>
            <option value="18:00">18:00</option>
            <option value="18:30">18:30</option>
            <option value="19:00">19:00</option>
            <option value="19:30">19:30</option>
            <option value="20:00">20:00</option>
            <option value="20:30">20:30</option>
            <option value="21:00">21:00</option>
            <option value="21:30">21:30</option>
            <option value="22:00">22:00</option>
        </select>
        <input type="submit" value="Submit">

    </form>
</body>

</html>