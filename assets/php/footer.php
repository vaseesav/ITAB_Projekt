<footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2023 <a href="#">mieteinander</a> All rights reserved.
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