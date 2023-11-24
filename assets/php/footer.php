<footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <a class="agb-text" href="agb.php" >AGB</a>
            <a class="impressum-text" href="impressum.php" >Impressum</a>
          <p>Copyright © 2023 <a href="#">mieteinander</a> All rights reserved.
            <div class="theme-change-footer">
                <a href="#" id="accessibilityThemeLink">Barrierefreies Theme aktivieren</a>
                <div id="themeStatus" data-theme="<?php echo $_SESSION['theme']; ?>"></div>

            </div>

        </div>
      </div>
    </div>

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
  </footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/js/footer.js"></script>