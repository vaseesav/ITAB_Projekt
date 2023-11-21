<?php
require_once 'assets/php/head.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <?php
// Überprüfen, ob der Benutzer eingeloggt ist. Wenn nicht, zur Login-Seite umleiten
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
?>
    <title>Profil</title>
    <link rel="stylesheet" href="assets/css/profile-style.css">
</head>

<body>
    <!-- Header Start-->
        <?php
        include  'assets/php/preloader.php';
        include 'assets/php/header.php';
        ?>
    <!-- Header End -->

    <!-- Header Mobile -->
        <?php
        include 'assets/php/mobileHeader.php';
        ?>
  <!-- Header Mobile End -->

    <!-- Loading Animation (Server loading time) -->
    <div id="preloader" style="display: none;">
        <?php include 'assets/php/preloader.php'; ?>
    </div>

    <div class="containered">
        <h2>Profil</h2>

        <div class="profile-picture-container">
            <?php include 'assets/php-backend/profilePicture.php'?>
            <!-- Formular für Bild-Upload -->
            <input type="file" id="profilePictureInput" name="profilePicture" style="display: none;" onchange="uploadProfilePicture()">
            <br>
            <button onclick="document.getElementById('profilePictureInput').click();">Bild auswählen</button>
            <p class="error_text"></p>
        </div>


        <?php
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            echo "<p>Nutzername: " . $username . "</p>";
            echo "<p>E-Mail: " . $_SESSION['email'] . "</p>";
        }
        ?>

        <!-- Buttons -->
        <button onclick="openModal()">Passwort ändern</button>
        <button onclick="logout()">Abmelden</button>
    </div>

    <div id="passwordModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Passwort ändern</h2>
            <form id="changePasswordForm">
                Neues Passwort:<br> <input type="password" name="new_password" required><br>
                Passwort bestätigen:<br> <input type="password" name="confirm_password" required><br>
                <button type="submit" value="Passwort ändern">Passwort ändern</button>
            </form>
            <p id="passwordChangeMessage"></p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/profile.js"></script>
    <script src="assets/js/navColor.js"></script>

<!--Footer Start-->
    <?php
    include 'assets/php/footer.php';
    ?>
<!--Footer End-->
</body>
</html>
