<?php 

include 'db.php'; 
$movieID = $_GET["movie_id"];
$showID = $_GET['show_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Selector</title>
</head>
<body>
    <?php 
    $stmt = $pdo->query("SELECT * FROM movies WHERE movie_id LIKE $movieID");
    while ($row = $stmt->fetch()) {
        echo "<b>Movie title:</b> ".$row['name']."<br>".
             "<b>Movie description:</b> ".$row['description']."<br>";
    $imageURL = $row['image'];
    }
    ?>
    <img src="<?php echo $imageURL ?>" width="150px" height="200px">

<form method="GET" action="reserveSeatQuery.php">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="John"><br><br>

  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="Doe"><br><br>

  <label for="lname">Email:</label><br>
  <input type="email" id="email" name="email" value="john.doe@mail.com"><br><br>

  <label for="lname">Number of tickets:</label><br>
  <input type="text" id="number_of_tickets" name="number_of_tickets" value="1"><span>Price:<input readonly type="text" id="cost" name="cost" value="5.99">€</span><br><br>

  <input type="hidden" name="show_id" id="show_id" value="<?php echo $showID;?>">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    

<script>
$("#number_of_tickets").keyup(function(){
  var val = $(this).val();
  val = val.replace(/\D/g,'');
  $('#number_of_tickets').val(val);
  $("#cost").val(val*5.99);
});

</script>
  <input type="submit" value="Submit">
</form> 
</body>
</html>