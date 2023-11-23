<!DOCTYPE html>
<html lang="de">

<head>
    <?php include("assets/php/head.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mieteinander - Suchmaschine</title>
    <link rel="stylesheet" href="assets/css/suchmaschine.css">
</head>

<body>
    <!-- Header Start-->
    <?php include("assets/php/header.php"); ?>
    <!-- Header End -->

    <!-- Loading Animation (Server loading time) -->
    <div id="preloader" style="display: none;">
        <?php include 'assets/php/preloader.php'; ?>
    </div>
    <br><br><br><br><br><br><br><br>

    <form action="suchergebnisse.php" method="post">

        <!-- Allgemeine Suche -->
        <fieldset>
            <legend>Allgemeine Suche</legend>
            <label for="searchText">Suche nach Text:</label>
            <input type="text" name="searchText" id="searchText" placeholder="Suchtext eingeben">
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
            <input type="number" name="anzahlGaeste" id="anzahlGaeste" placeholder="Anzahl der Gäste">
        </fieldset>

        <!-- Sortierung und Preis -->
        <!-- Sortierung und Preis -->
<fieldset>
    <legend>Sortierung und Preis</legend>
    <label for="sortieren">Sortieren nach:</label>
    <select name="sortieren" id="sortieren">
        <option value="preis">Preis</option>
        <option value="anzahlGaeste">Anzahl der Gäste</option>
        <option value="startdatum">Startdatum</option>
    </select>

    <label for="sortierreihenfolge">Sortierreihenfolge:</label>
    <select name="sortierreihenfolge" id="sortierreihenfolge">
        <option value="aufsteigend">Aufsteigend</option>
        <option value="absteigend">Absteigend</option>
    </select>

    <fieldset>
        <legend>Preis (pro Tag):</legend>
        <!-- vordefinierte Preissegmente -->
        <label for="preis-0-50">
        <input type="radio" name="preis" id="preis-0-50" value="0-50">
        0 - 50 €
    </label>

    <label for="preis-50-100">
        <input type="radio" name="preis" id="preis-50-100" value="50-100">
        50 - 100 €
    </label>

    <label for="preis-100-200">
        <input type="radio" name="preis" id="preis-100-200" value="100-200">
        100 - 200 €
    </label>

    <label for="preis-200-300">
        <input type="radio" name="preis" id="preis-200-300" value="200-300">
        200 - 300 €
    </label>

        <!-- Benutzerdefinierte Mindest- und Maximalpreise -->
        <label for="preis-custom">
            <input type="radio" name="preis" id="preis-custom" value="custom">
            Benutzerdefiniert:
        </label>
        von <input type="number" name="minPreis" id="minPreis" placeholder="Min">
        bis <input type="number" name="maxPreis" id="maxPreis" placeholder="Max">
    </fieldset>
</fieldset>

        <!-- Zeitraum -->
        <fieldset>
            <legend>Zeitraum</legend>
            <label for="zeitraum">Zeitraum:</label>
            von <input type="date" name="startdatum" id="startdatum">
            bis <input type="date" name="enddatum" id="enddatum">

            <label for="veranstaltungsdauer">Veranstaltungsdauer (in Tagen):</label>
            <input type="number" name="veranstaltungsdauer" id="veranstaltungsdauer" placeholder="Veranstaltungsdauer">
        </fieldset>

        <input type="submit" value="Suchen">
    </form>

    <!-- Ergebniscontainer -->
    <div class="result-container"></div>

    <!-- Lade externe Javascript-Dateien -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="assets/js/suchmaschine.js"></script>
        <!--Footer Start-->
        <?php include 'assets/php/footer.php'; ?>
        <!--Footer End-->
</body>

</html>
