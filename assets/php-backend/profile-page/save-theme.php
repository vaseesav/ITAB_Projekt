<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['theme'])) {
    $_SESSION['theme'] = $_POST['theme'];
}
?>
