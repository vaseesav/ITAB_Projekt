<!DOCTYPE html>
<html lang="de">
  <head>
  <?php
  include 'assets/php/head.php';
  ?>
  <title>Startseite</title>
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
  <?php
  include 'assets/php/header.php';
  ?>
  <!-- Header End -->

  <!-- Header Mobile -->
  <?php
  include 'assets/php/mobileHeader.php';
  ?>
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
  <?php
  include 'assets/php/footer.php';
  ?>
  <!--Footer End-->

  <!-- Scripts -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/navColor.js"></script>

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