<?php

include "../../postgresqlDBConnect.php";

$userID = $_GET['userID'];
$data = $db->query("SELECT * FROM users WHERE id=$userID")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php foreach ($data as $row) { ?>
        <form action="editUserQuery.php" method="GET">
            <p>Email:</p>
            <input type="email" class="form-control" id="userEmail" name="userEmail" aria-describedby="userEmail" value="<?= $row['email'] ?>">
            <input type="hidden" id="userID" name="userID" value="<?= $userID; ?>">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <?php } ?>
</body>

</html>