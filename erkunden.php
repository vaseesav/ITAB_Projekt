<!DOCTYPE html>
<html lang="de">

<head>
    <?php include("assets/php/head.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mieteinander - Suchmaschine</title>
    <link rel="stylesheet" href="assets/css/erkunden.css">
</head>

<body>
<!-- Header Start-->
<?php include("assets/php/header.php"); ?>
    <!-- Header End -->

    <!-- Hauptcontainer -->
    <div class="container-suchmaschine">

       <!-- Suchleiste -->
       <section class="search-container">
<br><br><br><br><br><br><br>
            <!-- Sucheingabe -->
            <div class="search-input">
                <label for="searchInput">Was suchst du?</label>
                <form method="post" action="assets/sql/db-read.php">
                    <input type="text" name="searchInput" id="searchInput" placeholder="Du kannst z.B. nach Veranstaltungstypen suchen">
                    <!-- Suchbutton -->
                    <button type="submit" id="searchButton">Suchen</button>
                </form>
            </div>
        </section>

            <!-- Suchbutton -->
            <button id="searchButton" onclick="search()">Suchen</button>
        </section>

        <!-- Filteroptionen -->
        <section class="filters">
            <h2>Filter</h2>
            <div class="filter-option">
                <label for="eventType">Veranstaltungstyp:</label>
                <select id="eventType">
                    <option value="party">Party</option>
                    <option value="meeting">Meeting</option>
                    <option value="workshop">Workshop</option>
                    <!-- Füge hier weitere Optionen hinzu -->
                </select>
            </div>

            <div class="filter-option">
                <label for="guestCount">Anzahl Gäste:</label>
                <input type="number" id="guestCount" min="1">
            </div>

            <!-- Füge hier weitere Filteroptionen hinzu -->
        </section>

        <!-- Suchergebnisse -->
        <section id="searchResults">
            <!-- Die Suchergebnisse werden hier angezeigt -->
        </section>

    </div>

    <!-- Lade externe Javascript-Dateien -->
    <script src="erkunden.js"></script>
<footer>
<!--Footer Start-->
<?php include 'assets/php/footer.php'; ?>
<!--Footer End-->
</footer>
</body>

</html>
