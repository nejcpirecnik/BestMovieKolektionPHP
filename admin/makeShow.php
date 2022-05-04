<?php
include '../postgresqlDBConnect.php';

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
    <form action="query/makeShowQuery.php">
        <label for="selected_movie">Select a movie:</label><br>
        <select name="selected_movie" id="selected_movie">
            <?php foreach ($movieData as $movieRow) : ?>
                <option value="<?= $movieRow["id"] ?>"><?= $movieRow["name"] ?></option>
            <?php endforeach ?>
        </select><br>
        <label for="datetime">Select when to play:</label><br>
        <input type="datetime-local" name="datetime" id="datetime">
        <input type="submit" value="Submit">
    </form>
</body>

</html>