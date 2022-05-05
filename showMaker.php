<?php

include 'postgresqlDBConnect.php';
$data = $db->query('SELECT * FROM shows')->fetchAll();
$movieSelect = $db->query('SELECT * FROM movies')->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Maker</title>
</head>
<body>
<form action="showMakerQuery.php" method="get">

  <label for="fname">Date & Time:</label><br>
  <input type="datetime-local" id="datetime" name="datetime"><br>

    <select name="selectedMovie" id="selectedMovie">
    <?php
        foreach ($movieSelect as $row) { ?>
            <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
        <?php } ?>
    </select>

  <input type="submit" value="Submit">
</form> 
</body>
</html>