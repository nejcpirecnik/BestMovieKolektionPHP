<?php

include "../../postgresqlDBConnect.php";

$movieID = $_GET['movieID'];
$data = $db->query("SELECT * FROM movies WHERE id=$movieID")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit movie</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php foreach ($data as $row) { ?>
        <form action="editMovieQuery.php" method="GET">
 <p>Movie name:</p>
<input type="text" class="form-control" id="movieName" name="movieName" aria-describedby="movieName" value="<?= $row['name'] ?>">

<p>Description:</p>
<textarea id="movieDescription" name="movieDescription" rows="4" cols="100">
<?= $row['description'] ?>
</textarea><br>

<p>Movie Image: <i>Submit image source link</i></p>
<input type="text" class="form-control" id="movieImage" name="movieImage" aria-describedby="movieImage" value="<?= $row['image'] ?>"><br>

<p>Rating:</p>
<input type="number" min="1" max="10" class="form-control" id="movieRating" name="movieRating" aria-describedby="movieRating" value="<?= $row['rating'] ?>"><br>

<p>Price:</p>
<input type="number" step="any" min="1" class="form-control" id="moviePrice" name="moviePrice" aria-describedby="moviePrice" value="<?= $row['price'] ?>"><br><br>

<p>Status:</p>
    <input type="checkbox" id="movieStatus" name="movieStatus" <?php if($row['active']==1){ echo "value='1' checked";} ?>>

<br><br>

<input type="hidden" id="movieID" name="movieID" value="<?= $movieID; ?>">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <?php } ?>
</body>

</html>