<?php
session_start();

// Überprüfen, ob der Nutzer eingeloggt ist
$loggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>

    <title>mieteinander</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!--CSS Files-->
    <link rel="stylesheet" href="assets/css/index-style.css">
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
                        <li><a href="index.php" class="active">Startseite</a></li>
                        <li><a href="#">Erkunden</a></li>
                        <li><a href="#">Über Uns</a></li>
                        <li><a href="#" id="profile">Profile</a></li>
                        <li><a href="login.php" id="login">Anmelden / Registrieren</a></li>
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
          <li><a class="menu__item" href="#">Erkunden</a></li>
          <li><a class="menu__item" href="#">Über Uns</a></li>
          <li><a class="menu__item" href="#" id="profile">Profile</a></li>
          <li><a class="menu__item" href="login.php" id="login">Anmelden / Registrieren</a></li>
        </ul>
      </div>
  </header>
  <!-- Header Mobile End -->

  <!--Mobile Main Banner Area Start-->
  <div class="mobile-banner">
    <h1>mieteinander</h1>
    <h2>SEARCH, RENT &amp; CELEBRATE!</h2>
    <p>Discover and book unique event venues effortlessly on our platform, designed exclusively for your event location needs.</p>
  </div>
  <!--Mobile Main Banner Area End-->

  <!--Main Banner Area Start-->
  <section class="main-banner">
    <div class="bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 align-self-center">
            <div class="header-text">
              <h1>mieteinander</h1>
              <h2>SEARCH, RENT &amp; CELEBRATE!</h2>
              <p>Discover and book unique event venues effortlessly on our platform, designed exclusively for your event location needs.</p>
              <div class="buttons">
                <div class="main-button">
                  <a href="#">Explore Top Locations</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--Main Banner Area End-->

  
  <section class="main body">
    <div class="sample">
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
    </div>
  </section>

  <!--Footer Start-->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2023 <a href="#">mieteinander</a> All rights reserved.
        </div>
      </div>
    </div>
  </footer>
  <!--Footer End-->

  <!-- Scripts -->
  <script src="assets/js/main.js"></script>

  <!-- If LoggedIn -->
  <?php if ($loggedIn): ?>
    <!-- Zeige den Login-Button nur, wenn der Nutzer nicht eingeloggt ist -->
    <style>
      #login {
        display: none !important;
      }

      #profile {
        display: block;
      }
    </style>
<?php endif; ?>

  </body>
</html>