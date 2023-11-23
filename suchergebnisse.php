<!DOCTYPE html>
<html lang="de">

<head>
    <?php include("assets/php/head.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mieteinander - Suchergebnisse</title>
    <link rel="stylesheet" href="assets/css/ergebnisse.css">
</head>

<body>
    <!-- Header Start-->
    <?php include("assets/php/header.php"); ?>
    <!-- Header End -->
<br><br><br><br><br><br>
    <div class="container">
        <?php include 'assets/php-backend/suchmaschine-page/datenabfrage.php'; // Führt das Skript für die Datenabfrage aus ?>
    </div>

    <!-- Lade externe Javascript-Dateien -->
   <!-- <script src="ergebnisse.js"></script> --> // TODO: Verlinkung
    <footer>
        <!--Footer Start-->
        <?php include 'assets/php/footer.php'; ?>
        <!--Footer End-->
    </footer>
</body>

</html>
