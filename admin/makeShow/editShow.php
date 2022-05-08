<?php

include "../../postgresqlDBConnect.php";
$showID = $_GET['showID'];
$data = $db->query("SELECT * FROM shows INNER JOIN movies ON movies.id = shows.movie_id WHERE shows_id = $showID")->fetchAll();
$allMovies = $db->query("SELECT * FROM movies")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Show</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php foreach ($data as $row) { 
        
        $playDate = $row['date'];
        $playTime = $row['time'];
        
        ?>

        

        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Movie name</label>

                <select name="movieID" id="movieID">
                    <?php foreach ($allMovies as $movieRow) { ?>
                        <option value="<?= $movieRow["id"] ?>"><?= $movieRow["name"] ?></option>
                    <?php } ?>
                </select>

            </div>
            <label for="dateSelected">Select when to play:</label><br>
        <input type="date" name="dateSelected" id="dateSelected" value="<?= $playDate ?>"><br>
        <label for="timeSelected">Time:</label>
        <select name="timeSelected" id="timeSelected">
            <option value="12:00">12:00</option>
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
        </select><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <?php } ?>
</body>

</html>