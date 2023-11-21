<?php
session_start();

// Überprüfen, ob der Nutzer eingeloggt ist
$loggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
?>
<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>

    <!-- <title>mieteinander</title> -->
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!--CSS Files-->
    <link rel="stylesheet" href="assets/css/light-colors.css">
    <link rel="stylesheet" href="assets/css/preloader-style.css">
    <link rel="stylesheet" href="assets/css/navbar-style.css">
    <link rel="stylesheet" href="assets/css/navbar-mob-style.css">
    <link rel="stylesheet" href="assets/css/footer-style.css">
    <link rel="stylesheet" href="assets/css/index-style.css">