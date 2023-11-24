<?php
include 'assets/php/head.php';
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erkunden</title>
    <link rel="stylesheet" href="assets/css/suchmaschine.css">
</head>

<body>
<?php
include 'assets/php/preloader.php';
?>
<!-- Header Start-->
<?php include("assets/php/header.php"); ?>
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
    <br><br><br><br><br><br><br><br>

    <form action="suchergebnisse.php" method="post">
<div class="suchmaschine">
        <!-- Allgemeine Suche -->
        <section class="suche-container">
        <fieldset>
            <div class="header-text">
            <legend>Allgemeine Suche</legend>
            <label for="searchText">Suche nach Text:</label>
            <input type="text" name="searchText" id="searchText" placeholder="Suchtext eingeben">
            </div>
        </fieldset>

        <!-- Standortsuche-->
        <fieldset>
            <legend>Standortsuche</legend>
            <label for="bundesland">Bundesland:</label>
            <select name="bundesland" id="bundesland">
                <option value="">Alle</option>
                <option value="bundesland1">Bundesland 1</option>
                <option value="bundesland2">Bundesland 2</option>
            </select>
            <label for="stadt">Stadt:</label>
            <input type="text" name="stadt" id="stadt" placeholder="Stadt eingeben">
            <label for="postleitzahl">Postleitzahl:</label>
            <input type="text" name="postleitzahl" id="postleitzahl" placeholder="Postleitzahl eingeben">
        </fieldset>


        <!-- Detailsuche -->
        <fieldset>
            <legend>Detailsuche</legend>
            <label for="veranstaltungstyp">Veranstaltungstyp:</label>
            <input type="text" name="veranstaltungstyp" id="veranstaltungstyp" placeholder="Veranstaltungstyp eingeben">

            <label for="anzahlGaeste">Maximale Anzahl der Gäste:</label>
            <input type="number" min="1" name="anzahlGaeste" id="anzahlGaeste" placeholder="Anzahl der Gäste">
        </fieldset>

        <!-- Sortierung und Preis -->
        <!-- Sortierung und Preis -->
        <fieldset>
            <legend>Sortierung und Preis</legend>
            <label for="sortieren">sortieren nach:</label>
            <select name="sortieren" id="sortieren">
            <option value="preis">Preis</option>
            <option value="anzahlGaeste">Anzahl der Gäste</option>
            <option value="startdatum">Startdatum</option>
            </select>

            <label for="sortierreihenfolge">Sortierreihenfolge:</label>
            <select name="sortierreihenfolge" id="sortierreihenfolge">
            <option value="aufsteigend">aufsteigend</option>
            <option value="absteigend">absteigend</option>
            </select>

            <fieldset>
        <!-- Benutzerdefinierte Mindest- und Maximalpreise -->
                <label for="preis-custom">Preisrahmen:</label>
                    von <input type="number price" class="preis" name="minPreis" id="minPreis" placeholder="0"> €   
                    bis <input type="number price" class="preis" name="maxPreis" id="maxPreis" placeholder="max."> €
            </fieldset>
        </fieldset>

        <!-- Zeitraum -->
        <fieldset>
            <legend>Zeitraum</legend>
            <label for="zeitraum"></label>
            von <input type="date" name="startdatum" id="startdatum">
            bis <input type="date" name="enddatum" id="enddatum">
    	    <br><br>
            <label for="veranstaltungsdauer">Veranstaltungsdauer (in Tagen):</label>
            <input type="number" min="1" name="veranstaltungsdauer" id="veranstaltungsdauer" placeholder="Veranstaltungsdauer">
        </fieldset>

        <input class="btn-suchen" type="submit" value="Suchen">
        </section>
    </form>
</div>
    <!-- Ergebniscontainer -->
    <div class="result-container"></div>
        <!--Footer Start-->
        <?php include 'assets/php/footer.php'; ?>
        <!--Footer End-->

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/navColor.js"></script>
<script src="assets/js/suchmaschine.js"></script>
</body>

</html>
