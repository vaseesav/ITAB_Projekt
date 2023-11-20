<?php
include 'assets/php/head.php';
?>
<!DOCTYPE html>
<html lang="de">
	<head>
		<link rel="stylesheet" href="assets/css/login-style.css" />
		<title>Anmelden / Registrieren</title>
	</head>
	<body>
		<div id="js-preloader" class="js-preloader">
			<div class="preloader-inner">
				<span class="dot"></span>
				<div class="dots">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
		</div>

		<!-- Header Start-->
		<?php include("assets/php/header.php"); ?>
		<!-- Header End -->

		<!-- Header Mobile -->
		<?php 
 	 	include 'assets/php/mobileHeader.php'; 
  		?>
		<!-- Header Mobile End -->

		<!-- Panel Body Start -->

		<div class="box" id="box">
			<!-- Register Panel Start -->
			<div class="form-box sign-up-box">
				<form name="register" id="register" method="post">
					<h1>Konto Erstellen</h1>
					<div class="social-box">
						<a href="#" class="social">
							<i class="fab fa-google-plus-g"><img src="assets/images/google-login.png" alt="google register button" /></i>
						</a>
					</div>
					<span>oder benutze deine Email für die Registrierung</span>
					<input type="text" placeholder="Name" name="username" />
					<input type="email" placeholder="Email" name="email" />
					<input type="password" placeholder="Password" name="password" />
					<button type="submit">Registrieren</button>
                    <div id="register-result"></div>
				</form>
			</div>
			<!-- Register Panel End -->

			<!-- Signin Panel Start -->
			<div class="form-box sign-in-box">
                <form name="login-form" id="login-form" method="post">
					<h1>Anmelden</h1>
					<div class="social-box">
						<a href="#" class="social">
							<i class="fab fa-google-plus-g"><img src="assets/images/google-login.png" alt="google register button" /></i>
						</a>
					</div>
					<span>oder benutze dein Konto</span>
					<input type="email" placeholder="Email" name="login_email" />
					<input type="password" placeholder="Password" name="login_password" />
					<a href="#">Passwort vergessen?</a>
					<button type="submit">Anmelden</button>
                    <div id="login-result"></div>
				</form>
			</div>
			<!-- Signin Panel End -->

			<!-- Panel Switcher Start -->
			<div class="overlay-box">
				<div class="overlay">
					<div class="overlay-panel overlay-left">
						<h1>Willkommen zurück!</h1>
						<br />
						<button class="ghost" id="signIn">Anmelden</button>
					</div>
					<div class="overlay-panel overlay-right">
						<h1>Du hast noch kein Konto?</h1>
						<br />
						<button class="ghost" id="signUp">Registrieren</button>
					</div>
				</div>
			</div>
			<!-- Panel Switcher End -->
		</div>
		<!-- Panel Body End -->

<!--Footer Start-->
  <?php
    include 'assets/php/footer.php';
  ?>
 <!--Footer End-->

		<!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="assets/js/login.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/navColor.js"></script>
	</body>
</html>
