<!DOCTYPE html>
<html>
<body>

<form method="GET" action="mail.php">
  <label for="userEmail">Email:</label><br>
  <input type="email" id="userEmail" name="userEmail" placeholder="nejc@gmail.com"><br><br>

  <label for="lname">Number of tickets:</label><br>
  <input type="text" id="number_of_tickets" name="number_of_tickets" value="1"><span>Price:<input readonly type="text" id="cost" name="cost" value="5.99">€</span><br><br>

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