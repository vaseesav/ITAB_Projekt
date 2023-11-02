<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>

    <title>Anmelden / Registrieren</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS Files-->
    <link rel="stylesheet" href="assets/css/index-style.css">
    <link rel="stylesheet" href="assets/css/login-style.css">
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
<header class="header-area header-sticky">
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="main-nav">
                <!-- Logo -->
                <a href="index.php" class="logo"><img src="assets/images/logo.png" alt=""></a>

                <!-- Nav Bar Start -->
                <ul class="nav">
                    <li><a href="index.php">Startseite</a></li>
                    <li><a href="#">Erkunden</a></li>
                    <li><a href="#">Über Uns</a></li>
                    <li><a href="login.php" class="active">Anmelden / Registrieren</a></li>
                </ul>   
                <!-- Nav Bar End -->

            </nav>
        </div>
    </div>
</div>
</header>
<!-- Header End -->

  <!-- Header Mobile -->
  <header class="mobile-header">
    <div class="hamburger-menu">
        <input id="menu__toggle" type="checkbox" />
        <label class="menu__btn" for="menu__toggle">
          <span></span>
        </label>

        <ul class="menu__box">
          <li><a class="menu__item" href="index.php">Startseite</a></li>
          <li><a class="menu__item" href="#">Erkunden</a></li>
          <li><a class="menu__item" href="#">Über uns</a></li>
        </ul>
      </div>
  </header>
  <!-- Header Mobile End -->

<!-- Panel Body Start -->
<div class="box" id="box">
    <!-- Register Panel Start -->
	<div class="form-box sign-up-box">
		<form action="#">
			<h1>Konto Erstellen</h1>
			<div class="social-box">
				<a href="#" class="social"><i class="fab fa-google-plus-g"><img src="assets/images/google-login.png" alt="google register button"></i></a>
			</div>
			<span>oder benutze deine Email für die Registrierung</span>
			<input type="text" placeholder="Name" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<button>Registrieren</button>
		</form>
	</div>
    <!-- Register Panel End -->

    <!-- Signin Panel Start -->
	<div class="form-box sign-in-box">
		<form action="#">
			<h1>Anmelden</h1>
			<div class="social-box">
				<a href="#" class="social"><i class="fab fa-google-plus-g"><img src="assets/images/google-login.png" alt="google register button"></i></a>
			</div>
			<span>oder benutze dein Konto</span>
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<a href="#">Passwort vergessen?</a>
			<button>Anmelden</button>
		</form>
	</div>
    <!-- Signin Panel End -->

    <!-- Panel Switcher Start -->
	<div class="overlay-box">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Willkommen zurück!</h1>
				<br>
				<button class="ghost" id="signIn">Anmelden</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Du hast noch kein Konto?</h1>
                <br>
				<button class="ghost" id="signUp">Registrieren</button>
			</div>
		</div>
	</div>
    <!-- Panel Switcher End -->

</div>
<!-- Panel Body End -->

    <!--Footer Start-->
    <footer>
        <p>Copyright © 2023 <a href="#">mieteinander</a> All rights reserved.</p>
    </footer>
    <!--Footer End-->

  <!-- Scripts -->
  <script src="assets/js/login.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>