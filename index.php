<?php

include "postgresqlDBConnect.php";
$movieData = $db->query("SELECT * FROM movies")->fetchAll();
$userData = $db->query("SELECT * FROM users")->fetchAll();
session_start();

?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<!-- Basic need -->
	<title>Best Movie Kolektion</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="css/style.css">

</head>
<body style="background-color:#020d18";>
<div class="slider movie-items" style="background:transparent;">
	<div class="container">
		<div class="row">
			<h1 style="font-family:Arial; font-weight:700; color:white">CURRENTLY PLAYING</h1>
		</div>
		<div class="row">
	    	<div  class="slick-multiItemSlider">
            <?php foreach ($movieData as $movieRow) { ?>
	    		<div class="movie-item">
	    			<div class="mv-img">
	    				<a href="#"><img src="<?= $movieRow['image']; ?>" alt="" max-width="285" min-width="285" max-height="437" min-height="437"></a>
	    			</div>
	    			<div class="title-in">
	    				<div class="cate">
	    					<span class="blue"><a href="#">GENRE</a></span>
	    				</div>
	    				<h6><a href="readMoreMovie.php?movieID=<?= $movieRow['id'] ?>"><?= $movieRow['name']; ?></a></h6>
	    				<p><i class="ion-android-star"></i><span><?= $movieRow['rating']; ?></span> /10</p>
	    			</div>
	    		</div>
                <?php } ?>
	    	</div>
	    </div>
	</div>
</div>
<!--FOOTER HERE-->

<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>
<script src="js/plugins2.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
