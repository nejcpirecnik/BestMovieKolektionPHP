<?php 

session_start();

if($_SESSION['adminStatus']!=1){
  header("Location:adminLogin.php");
}
include "../postgresqlDBConnect.php";

$data = $db->query("SELECT * FROM tickets INNER JOIN users ON users.id = tickets.user_id INNER JOIN seats ON seats.id = tickets.seat_id INNER JOIN shows ON shows_id = tickets.show_id")->fetchAll();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Admin Panel</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="https://sh16.neoserv.si:2083/cpsess2789234926/viewer/home%2fpirecnik%2fbmk.clovery.si%2fdest%2fimages/BMKlogo.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Best Movie Kolektion - Admin</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <!--Sidebar menu-->
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
          <a class="nav-link" href="index.php">
              <span data-feather="video"></span>
              Movies
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="showsIndex.php">
              <span data-feather="film"></span>
              Shows
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="usersIndex.php">
              <span data-feather="users"></span>
              Users
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="ticketsIndex.php">
              <span data-feather="file-text"></span>
              Tickets
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!--Sidebar menu END-->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
      <h2>Tickets</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">User</th>
              <th scope="col">Seats</th>
              <th scope="col">Show ID</th>
              <th scope="col">Date</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            foreach ($data as $row) { ?>
              <tr>
              <td><?= $row['id']; ?></td>
              <td><?= $row['email']; ?></td>
              <td><?= $row['selected_seat']; ?></td>
              <td><?= $row['show_id']; ?></td>
              <td><?= $row['date']; ?></td>
              <td><a href="edituser/editUser.php?userID=<?php echo $row['id']; ?>" target="_blank" style="text-decoration: none; color:black;">Edit</a></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
