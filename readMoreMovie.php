<?php
session_start();

include 'postgresqlDBConnect.php';

$movieFromGet = $_GET['movieID'];
$movieID = (int) $movieFromGet;

$data = $db->query("SELECT * FROM shows WHERE movie_id = $movieID")->fetchAll();

$movie = $db->query("SELECT * FROM movies WHERE id=$movieID")->fetch();
$_SESSION['movieName'] = $movie['name'];

?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<!-- Basic need -->
	<title><?= $movie['name'] ?></title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/x-icon" href="BMKlogo.ico">
	<link rel="profile" href="#">

	<!--Google Font-->
	<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<link rel="stylesheet" href="calender.css">

	<!-- CSS files -->
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
	<!--preloading-->
	<!--end of signup form popup-->
	<div class="hero mv-single-hero" style="background-image: url('sliderv2-background.png'); background-size: auto; background-repeat: repeat;">)">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- <h1> movie listing - list</h1>
				<ul class="breadcumb">
					<li class="active"><a href="#">Home</a></li>
					<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
				</ul> -->
				</div>
			</div>
		</div>
	</div>
	<div class="page-single movie-single movie_single">
		<div class="container">
			<div class="row ipad-width2">
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="movie-img sticky-sb">
						<img src="<?= $movie['image'] ?>" alt="">
						<div class="movie-btn">
							<p>Available shows:</p>
							<?php foreach ($data as $row) {
								$date = $row['date'];
								$explodedDate = explode('-', $date);

								$showYear = $explodedDate[0];
								$showMonth = $explodedDate[1];
								$showDay = $explodedDate[2];

								$showDate = $showDay . '.' . $showMonth . '.' . $showYear;

								$time = $row['time'];

								$showID = $row['shows_id'];
							?>
								<div class="movie-btn">
									<div class="btn-transform transform-vertical">
										<div><a href="reserveSeat.php?show_id=<?= $showID ?>&movie_id=<?= $movieID ?>" class="item item-1 yellowbtn" style="text-decoration:none; color:black;"> <i class="ion-card"></i><?= $showDate ?> - <?= $time ?></a></div>
										<div><a href="reserveSeat.php?show_id=<?= $showID ?>&movie_id=<?= $movieID ?>" class="item item-2 yellowbtn" style="text-decoration:none; color:black;"><i class="ion-card">Reserve Seat</i></a></div>
									</div>
								</div>
							<?php
							} ?>
						</div>
					</div>
				</div>
				<div class="col-md-8 col-sm-12 col-xs-12">
					<div class="movie-single-ct main-content">
						<h1 class="bd-hd"><?= $movie['name'] ?></h1>
						<div class="movie-tabs">
							<div class="tabs">
								<ul class="tab-links tabs-mv">
									<li class="active"><a href="#overview" style="text-decoration:none;">Overview</a></li>
								</ul>
								<div class="tab-content">
									<div id="overview" class="tab active">
										<!-- Button trigger modal -->
										<div class="row">
											<div class="col-md-8 col-sm-12 col-xs-12">
												<p><?= $movie['description'] ?></p>
												<div class="title-hd-sm">
													<h4>Videos & Photos</h4>

												</div>
												<div class="mvsingle-item ov-item">
													<a class="img-lightbox" data-fancybox-group="gallery" href="images/uploads/image11.jpg"><img src="thumbnail.png" width="100px" height="250px" alt=""></a>
													<a class="img-lightbox" data-fancybox-group="gallery" href="images/uploads/image21.jpg"><img src="thumbnail.png" width="100px" height="250px" alt=""></a>
													<a class="img-lightbox" data-fancybox-group="gallery" href="images/uploads/image31.jpg"><img src="thumbnail.png" width="100px" height="250px" alt=""></a>
													<a class="img-lightbox" data-fancybox-group="gallery" href="images/uploads/image31.jpg"><img src="thumbnail.png" width="100px" height="250px" alt=""></a>
												</div>
												<div class="title-hd-sm">
													<h4>Shows</h4>
												</div>
												<!-- Button trigger modal -->
												<div class="mv-user-review-item">
													<?php foreach ($data as $row) {
														$date = $row['date'];
														$explodedDate = explode('-', $date);

														$showYear = $explodedDate[0];
														$showMonth = $explodedDate[1];
														$showDay = $explodedDate[2];
													?>
														<div class="calendar">
															<div class="calendar__picture" style="background-image: url('<?= $movie['image'] ?>'); box-shadow: inset 0 0 0 50vw rgba(0,0,0,0.8);">
																<h2 style="color:white;"><?= $showDay . "." . $showMonth . "." . $showYear ?>, <?= $row['day_name'] ?></h2>
																<h3>Playing at: <?= $row['time']; ?>pm</h3>
															</div>
															<div class="calendar__date">
																<div class="calendar__day">M</div>
																<div class="calendar__day">T</div>
																<div class="calendar__day">W</div>
																<div class="calendar__day">T</div>
																<div class="calendar__day">F</div>
																<div class="calendar__day">S</div>
																<div class="calendar__day">S</div>
																<div class="calendar__number"></div>
																<div class="calendar__number"></div>
																<div class="calendar__number"></div>
																<div class="calendar__number" <?php if ($showDay == 28) {
																									echo "id='selected'";
																								} ?>>28</div>
																<div class="calendar__number" <?php if ($showDay == 29) {
																									echo "id='selected'";
																								} ?>>29</div>
																<div class="calendar__number" <?php if ($showDay == 30) {
																									echo "id='selected'";
																								} ?>>30</div>
																<div class="calendar__number" <?php if ($showDay == 1) {
																									echo "id='selected'";
																								} ?>>1</div>
																<div class="calendar__number" <?php if ($showDay == 2) {
																									echo "id='selected'";
																								} ?>>2</div>
																<div class="calendar__number" <?php if ($showDay == 3) {
																									echo "id='selected'";
																								} ?>>3</div>
																<div class="calendar__number" <?php if ($showDay == 4) {
																									echo "id='selected'";
																								} ?>>4</div>
																<div class="calendar__number" <?php if ($showDay == 5) {
																									echo "id='selected'";
																								} ?>>5</div>
																<div class="calendar__number" <?php if ($showDay == 6) {
																									echo "id='selected'";
																								} ?>>6</div>
																<div class="calendar__number" <?php if ($showDay == 7) {
																									echo "id='selected'";
																								} ?>>7</div>
																<div class="calendar__number" <?php if ($showDay == 8) {
																									echo "id='selected'";
																								} ?>>8</div>
																<div class="calendar__number" <?php if ($showDay == 9) {
																									echo "id='selected'";
																								} ?>>9</div>
																<div class="calendar__number" <?php if ($showDay == 10) {
																									echo "id='selected'";
																								} ?>>10</div>
																<div class="calendar__number" <?php if ($showDay == 11) {
																									echo "id='selected'";
																								} ?>>11</div>
																<div class="calendar__number" <?php if ($showDay == 12) {
																									echo "id='selected'";
																								} ?>>12</div>
																<div class="calendar__number" <?php if ($showDay == 13) {
																									echo "id='selected'";
																								} ?>>13</div>
																<div class="calendar__number" <?php if ($showDay == 14) {
																									echo "id='selected'";
																								} ?>>14</div>
																<div class="calendar__number" <?php if ($showDay == 15) {
																									echo "id='selected'";
																								} ?>>15</div>
																<div class="calendar__number" <?php if ($showDay == 16) {
																									echo "id='selected'";
																								} ?>>16</div>
																<div class="calendar__number" <?php if ($showDay == 17) {
																									echo "id='selected'";
																								} ?>>17</div>
																<div class="calendar__number" <?php if ($showDay == 18) {
																									echo "id='selected'";
																								} ?>>18</div>
																<div class="calendar__number" <?php if ($showDay == 19) {
																									echo "id='selected'";
																								} ?>>19</div>
																<div class="calendar__number" <?php if ($showDay == 20) {
																									echo "id='selected'";
																								} ?>>20</div>
																<div class="calendar__number" <?php if ($showDay == 21) {
																									echo "id='selected'";
																								} ?>>21</div>
																<div class="calendar__number" <?php if ($showDay == 22) {
																									echo "id='selected'";
																								} ?>>22</div>
																<div class="calendar__number" <?php if ($showDay == 23) {
																									echo "id='selected'";
																								} ?>>23</div>
																<div class="calendar__number" <?php if ($showDay == 24) {
																									echo "id='selected'";
																								} ?>>24</div>
																<div class="calendar__number" <?php if ($showDay == 25) {
																									echo "id='selected'";
																								} ?>>25</div>
																<div class="calendar__number" <?php if ($showDay == 26) {
																									echo "id='selected'";
																								} ?>>26</div>
																<div class="calendar__number" <?php if ($showDay == 27) {
																									echo "id='selected'";
																								} ?>>27</div>
																<div class="calendar__number" <?php if ($showDay == 28) {
																									echo "id='selected'";
																								} ?>>28</div>
																<div class="calendar__number" <?php if ($showDay == 29) {
																									echo "id='selected'";
																								} ?>>29</div>
															</div>
														</div><br>
													<?php } ?>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- movie user review -->
		<script src="js/jquery.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/plugins2.js"></script>
		<script src="js/custom.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>