<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Betler Multipurpose Forms HTML Template">
    <meta name="author" content="Ansonika">
    <title>Login</title>

  <!-- Favicons-->
  <link rel="shortcut icon" href="./BMKlogo.ico" type="image/x-icon">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

      <!-- BASE CSS -->
  <link href="http://bmk.clovery.si/login/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://bmk.clovery.si/login/css/vendors.css" rel="stylesheet">
  <link href="http://bmk.clovery.si/login/css/style.css" rel="stylesheet">

  <!-- YOUR CUSTOM CSS -->
  <link href="http://bmk.clovery.si/login/css/custom.css" rel="stylesheet">
</head>

<body>
<div class="background-image" style="background-image:url(http://bmk.clovery.si/dest/images/uploads/sliderv2-background.png) !important;">
<div class="min-vh-100 d-flex flex-column opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.25)">
	        <div class="container my-auto">
	            <div class="row">
	                <div class="col-md-9 col-lg-7 col-xl-5 mx-auto my-4">
	                    <div class="panel center">
	                        <figure>
	                            <a href="#0"><img src="http://bmk.clovery.si/dest/images/BMKlogo.png" width="100" height="100%" alt="Cinema Logo"></a>
	                        </figure>
	                        <form class="input_style_1" method="get" action="adminLoginQuery.php">
	                            <div class="form-group">
	                                <label for="email_address">Email Address</label>
	                                <input type="email" name="email" id="email" class="form-control">
	                            </div>
	                            <div class="form-group">
	                                <label for="password">Password</label>
	                                <input type="password" name="password" id="password" class="form-control">
	                            </div>
	                            <div class="clearfix mb-3">
	                                <div class="float-left">
	                                    <label class="container_check">Remember Me
	                                        <input type="checkbox">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </div>
	                                <div class="float-right">
	                                    <a id="forgot" href="http://bestmoviekolektion.herokuapp.com/users/password/new" style="color:#dd003f;">Forgot Password?</a>
	                                </div>
	                            </div>
	                            <button type="submit" class="btn_1 full-width">Login</button>
	                        </form>
	                        <p class="text-center mt-3 mb-0">Don't have an account? <a href="http://bestmoviekolektion.herokuapp.com/users/sign_up" style="color:#dd003f;">Sign Up</a></p>
	                        <form class="input_style_1" method="post">
	                            <div id="forgot_pw">
	                                <div class="form-group">
	                                    <label for="email_forgot">Login email</label>
	                                    <input type="email" class="form-control" name="email_forgot" id="email_forgot">
	                                </div>
	                                <p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
	                                <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
	                            </div>
	                        </form>
	                    </div>
	                </div>
	                <!-- /col -->
	            </div>
	            <!-- /row -->
	        </div>
	        <!-- /container -->
	        <div class="container py-2 copy white">© 2022 Best Movie Kolektion - All Rights Reserved.</div>
	    </div>
	</div>
	<!-- /background-image -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.js"></script>
	<script src="js/common_func.js"></script>

</body>
</html>