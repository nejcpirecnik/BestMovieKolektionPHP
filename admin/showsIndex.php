<?php
session_start();

if($_SESSION['adminStatus']!=1){
  header("Location:adminLogin.php");
}
include "../postgresqlDBConnect.php";

$data = $db->query("SELECT * FROM movies")->fetchAll();

$showData = $db->query("SELECT * FROM shows INNER JOIN movies ON movies.id = shows.movie_id")->fetchAll();

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
  <link rel="stylesheet" href="showsIndex.css">
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
          <a class="nav-link active" aria-current="page" href="showsIndex.php">
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
            <a class="nav-link" href="ticketsIndex.php">
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

        </div>
        <h2>Shows <span class="btn btn-primary">9.5.2022 - 15.5.2022</span></h2>
        <div class="container">
          <div class="timetable-img text-center">
            <img src="img/content/timetable.png" alt="">
          </div>
          <div class="table-responsive">
            <table class="table table-bordered text-center">
              <thead>
                <tr class="bg-light-gray">
                  <th class="text-uppercase">Time
                  </th>
                  <th class="text-uppercase">Monday</th>
                  <th class="text-uppercase">Tuesday</th>
                  <th class="text-uppercase">Wednesday</th>
                  <th class="text-uppercase">Thursday</th>
                  <th class="text-uppercase">Friday</th>
                  <th class="text-uppercase">Saturday</th>
                  <th class="text-uppercase">Sunday</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="align-middle">12:00 - 14:00</td>
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Mon") and (($showRow['time'] == "12:00") || ($showRow['time'] == "12:30") || ($showRow['time'] == "13:00") || ($showRow['time'] == "13:30") || ($showRow['time'] == "14:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">

                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                          
                        </div>
                      <?php } else { ?>

                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Tue") and (($showRow['time'] == "12:00") || ($showRow['time'] == "12:30") || ($showRow['time'] == "13:00") || ($showRow['time'] == "13:30") || ($showRow['time'] == "14:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>

                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Wed") and (($showRow['time'] == "12:00") || ($showRow['time'] == "12:30") || ($showRow['time'] == "13:00") || ($showRow['time'] == "13:30") || ($showRow['time'] == "14:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>

                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Thur") and (($showRow['time'] == "12:00") || ($showRow['time'] == "12:30") || ($showRow['time'] == "13:00") || ($showRow['time'] == "13:30") || ($showRow['time'] == "14:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>

                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Fri") and (($showRow['time'] == "12:00") || ($showRow['time'] == "12:30") || ($showRow['time'] == "13:00") || ($showRow['time'] == "13:30") || ($showRow['time'] == "14:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>

                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Sat") and (($showRow['time'] == "12:00") || ($showRow['time'] == "12:30") || ($showRow['time'] == "13:00") || ($showRow['time'] == "13:30") || ($showRow['time'] == "14:00"))) {foreach ($showData as $showRow) {?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                        <?php } ?>
                      <?php } else { ?>

                    <?php } ?>
                    
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Sun") and (($showRow['time'] == "12:00") || ($showRow['time'] == "12:30") || ($showRow['time'] == "13:00") || ($showRow['time'] == "13:30") || ($showRow['time'] == "14:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                </tr>

                <tr>
                  <td class="align-middle">14:00 - 16:00</td>
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Mon") and (($showRow['time'] == "14:00") || ($showRow['time'] == "14:30") || ($showRow['time'] == "15:00") || ($showRow['time'] == "15:30") || ($showRow['time'] == "16:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Tue") and (($showRow['time'] == "14:00") || ($showRow['time'] == "14:30") || ($showRow['time'] == "15:00") || ($showRow['time'] == "15:30") || ($showRow['time'] == "16:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Wed") and (($showRow['time'] == "14:00") || ($showRow['time'] == "14:30") || ($showRow['time'] == "15:00") || ($showRow['time'] == "15:30") || ($showRow['time'] == "16:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Thu") and (($showRow['time'] == "14:00") || ($showRow['time'] == "14:30") || ($showRow['time'] == "15:00") || ($showRow['time'] == "15:30") || ($showRow['time'] == "16:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Fri") and (($showRow['time'] == "14:00") || ($showRow['time'] == "14:30") || ($showRow['time'] == "15:00") || ($showRow['time'] == "15:30") || ($showRow['time'] == "16:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Sat") and (($showRow['time'] == "14:00") || ($showRow['time'] == "14:30") || ($showRow['time'] == "15:00") || ($showRow['time'] == "15:30") || ($showRow['time'] == "16:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                                    <!--Movie Script-->
                                    <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Sun") and (($showRow['time'] == "14:00") || ($showRow['time'] == "14:30") || ($showRow['time'] == "15:00") || ($showRow['time'] == "15:30") || ($showRow['time'] == "16:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                </tr>

                <tr>
                  <td class="align-middle">16:00 - 18:00</td>
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Mon") and (($showRow['time'] == "16:00") || ($showRow['time'] == "16:30") || ($showRow['time'] == "17:00") || ($showRow['time'] == "17:30") || ($showRow['time'] == "18:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Tue") and (($showRow['time'] == "16:00") || ($showRow['time'] == "16:30") || ($showRow['time'] == "17:00") || ($showRow['time'] == "17:30") || ($showRow['time'] == "18:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Wed") and (($showRow['time'] == "16:00") || ($showRow['time'] == "16:30") || ($showRow['time'] == "17:00") || ($showRow['time'] == "17:30") || ($showRow['time'] == "18:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Thu") and (($showRow['time'] == "16:00") || ($showRow['time'] == "16:30") || ($showRow['time'] == "17:00") || ($showRow['time'] == "17:30") || ($showRow['time'] == "18:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Fri") and (($showRow['time'] == "16:00") || ($showRow['time'] == "16:30") || ($showRow['time'] == "17:00") || ($showRow['time'] == "17:30") || ($showRow['time'] == "18:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Sat") and (($showRow['time'] == "16:00") || ($showRow['time'] == "16:30") || ($showRow['time'] == "17:00") || ($showRow['time'] == "17:30") || ($showRow['time'] == "18:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                                    <!--Movie Script-->
                                    <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Sun") and (($showRow['time'] == "16:00") || ($showRow['time'] == "16:30") || ($showRow['time'] == "17:00") || ($showRow['time'] == "17:30") || ($showRow['time'] == "18:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                </tr>

                <tr>
                  <td class="align-middle">18:00 - 20:00</td>
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Mon") and (($showRow['time'] == "18:00") || ($showRow['time'] == "18:30") || ($showRow['time'] == "19:00") || ($showRow['time'] == "19:30") || ($showRow['time'] == "12:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Tue") and (($showRow['time'] == "18:00") || ($showRow['time'] == "18:30") || ($showRow['time'] == "19:00") || ($showRow['time'] == "19:30") || ($showRow['time'] == "12:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Wed") and (($showRow['time'] == "18:00") || ($showRow['time'] == "18:30") || ($showRow['time'] == "19:00") || ($showRow['time'] == "19:30") || ($showRow['time'] == "12:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Thu") and (($showRow['time'] == "18:00") || ($showRow['time'] == "18:30") || ($showRow['time'] == "19:00") || ($showRow['time'] == "19:30") || ($showRow['time'] == "12:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Fri") and (($showRow['time'] == "18:00") || ($showRow['time'] == "18:30") || ($showRow['time'] == "19:00") || ($showRow['time'] == "19:30") || ($showRow['time'] == "12:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Sat") and (($showRow['time'] == "18:00") || ($showRow['time'] == "18:30") || ($showRow['time'] == "19:00") || ($showRow['time'] == "19:30") || ($showRow['time'] == "12:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                                    <!--Movie Script-->
                                    <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Sun") and (($showRow['time'] == "18:00") || ($showRow['time'] == "18:30") || ($showRow['time'] == "19:00") || ($showRow['time'] == "19:30") || ($showRow['time'] == "12:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                </tr>

                <tr>
                  <td class="align-middle">20:00 - 22:00</td>
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Mon") and (($showRow['time'] == "20:00") || ($showRow['time'] == "20:30") || ($showRow['time'] == "21:00") || ($showRow['time'] == "21:30") || ($showRow['time'] == "22:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Tue") and (($showRow['time'] == "20:00") || ($showRow['time'] == "20:30") || ($showRow['time'] == "21:00") || ($showRow['time'] == "21:30") || ($showRow['time'] == "22:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Wed") and (($showRow['time'] == "20:00") || ($showRow['time'] == "20:30") || ($showRow['time'] == "21:00") || ($showRow['time'] == "21:30") || ($showRow['time'] == "22:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Thu") and (($showRow['time'] == "20:00") || ($showRow['time'] == "20:30") || ($showRow['time'] == "21:00") || ($showRow['time'] == "21:30") || ($showRow['time'] == "22:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Fri") and (($showRow['time'] == "20:00") || ($showRow['time'] == "20:30") || ($showRow['time'] == "21:00") || ($showRow['time'] == "21:30") || ($showRow['time'] == "22:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                  <!--Movie Script-->
                  <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Sat") and (($showRow['time'] == "20:00") || ($showRow['time'] == "20:30") || ($showRow['time'] == "21:00") || ($showRow['time'] == "21:30") || ($showRow['time'] == "22:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                                    <!--Movie Script-->
                                    <td>
                    <?php
                    foreach ($showData as $showRow) {

                      $date = $showRow['date'];
                      $explodedDate = explode('-', $date);

                      $showYear = $explodedDate[0];
                      $showMonth = $explodedDate[1];
                      $showDay = $explodedDate[2];

                      $length = $showRow['length'];

                      if (($showRow['day_name'] == "Sun") and (($showRow['time'] == "20:00") || ($showRow['time'] == "20:30") || ($showRow['time'] == "21:00") || ($showRow['time'] == "21:30") || ($showRow['time'] == "22:00")) and ($showDay <= 15)) { ?>
                        <div class="card" style="padding:5px ;">
                          <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><b><?= $showRow['name'] ?> <a href="makeShow/editShow.php?showID=<?= $showRow['shows_id'] ?>" style="color:white ;"><span data-feather="edit"></span></a></b></span>
                          <div class="margin-10px-top font-size14">Starting: <?= $showRow['time'] ?></div>
                          <div class="font-size13 text-light-gray">Length: <?= $length ?>h</div>
                        </div>
                      <?php } else { ?>
                              
                    <?php }
                    } ?>
                  </td>
                  <!--Movie Script END-->
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>
  </div>


  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="dashboard.js"></script>
</body>

</html>