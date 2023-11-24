<?php
include 'assets/php/head.php';
?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Überprüfen, ob der Benutzer eingeloggt ist. Wenn nicht, zur Login-Seite umleiten
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and store it in variables

    $userId = $_SESSION['userId'];

    include 'assets/database/connect.php';

    $nutzerID = $userId; // Beispiel-NutzerID
    $anzeigenName = $_POST['anzeigenTitel'] ?? '';
    $veranstaltungstyp = $_POST['veranstaltungstyp'] ?? '';
    $beschreibung = $_POST['anzeigenInhalt'] ?? '';
    $anzahlGaeste = $_POST['anzahl-gaeste'] ?? 0;
    $plz = $_POST['postleitzahl'] ?? '';
    $stadt = $_POST['stadt'] ?? '';
    $bundesland = $_POST['bundesland'] ?? '';
    $preis = $_POST['preis'] ?? '';
    $istAnzeige = 1;


    // Einfüge-Query vorbereiten
    $sql = "INSERT INTO anzeige (NutzerID, AnzeigenName, Veranstaltungstyp, Beschreibung, anzahlGaeste, Plz, Stadt, Bundesland, preis, istAnzeige) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Parameter an die Query binden
    $stmt->bind_param("isssiiisdi", $nutzerID, $anzeigenName, $veranstaltungstyp, $beschreibung, $anzahlGaeste, $plz, $stadt, $bundesland, $preis, $istAnzeige);

    // Query ausführen
    $stmt->execute();

    echo "Neue Anzeige erfolgreich hinzugefügt!";

    // Schließe Statement und Verbindung
    $stmt->close();
    $conn->close();

    // Handle file upload
    if (isset($_FILES['fotos'])) {
        echo "Fotodatei: " . htmlspecialchars($_FILES['fotos']['name']) . "<br>";
    } else {
        echo "Keine Fotodatei hochgeladen.<br>";
    }
}
//include 'assets/php-backend/anzeigen/anzeigeAufgeben.php';


?>

<!DOCTYPE html>
<html lang="de">

<head>
    <title>Anzeige oder Gesuch aufgeben</title>
    <link rel="stylesheet" href="assets/css/anzeigen-style.css">
    <script src="assets/js/inserate.js"></script>
    <script src="assets/js/gesuch.js"></script>
</head>

<body>
    <div id="js-preloader" class="js-preloader">s
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br>
    <inputboxn>
        <form method="post" enctype="multipart/form-data">
            <!-- Your HTML form content goes here -->
            <div class="toggle-container">
                <button class="toggle-text" onclick="toggleAnzeige()">Anzeige aufgeben</button>
                <button class="toggle-text" onclick="toggleGesuch()">Gesuch aufgeben</button>
            </div>
            <!-- Weitere Eingabefelder für die Anzeige eines Raumes -->
            <div id="anzeigenButton">
                <label for="anzeigenTitel">Titel der Anzeige:</label>
                <input type="text" id="anzeigenTitel" name="anzeigenTitel" required>
                <label for="anzeigenInhalt">Beschreibung:</label>
                <textarea id="anzeigenInhalt" name="anzeigenInhalt" required></textarea>
            </div>

            <div id="gesuchButton">
                <label for="gesuchTitel">Titel des Gesuchs:</label>
                <input type="text" id="gesuchTitel" name="gesuchTitel" required>
                <label for="gesuchInhalt">Inhalt des Gesuchs:</label>
                <textarea id="gesuchInhalt" name="gesuchInhalt" required></textarea>
            </div>
            <label for="veranstaltungstyp">Veranstaltungstyp:</label>
            <input type="text" id="veranstaltungstyp" name="veranstaltungstyp" required>
            <label for="anzahl-gaeste">Anzahl der Gäste:</label>
            <input type="number" id="anzahl-gaeste" name="anzahl-gaeste" required>

            <label for="postleitzahl">Postleitzahl:</label>
            <input type="text" id="postleitzahl" name="postleitzahl" required>

            <label for="stadt">Stadt:</label>
            <input type="text" id="stadt" name="stadt" required>

            <label for="bundesland">Bundesland:</label>
            <input type="text" id="bundesland" name="bundesland" required>

            <label for="land">Land:</label>
            <input type="text" id="land" name="land" required>

            <label for="startDatum">Startdatum und -zeit:</label>
            <input type="datetime-local" id="startDatum" name="startDatum" required>

            <label for="endDatum">Enddatum und -zeit:</label>
            <input type="datetime-local" id="endDatum" name="endDatum" required>

            <!-- Für die Auswahl zwischen Stunde und Tag -->
            <br>
            <label for="preis">Mietpreis pro Tag</label>
            <input type="text" id="preis" name="preis" required>
            <div class="proBox">

                <!-- <input type="radio" id="tag" name="pro-tag" value="tag">
          <label for="tag">pro Tag</label><br>
          <input type="radio" id="stunde" name="pro-stunde" value="stunde">
          <label for="stunde">pro Stunde</label><br> -->

                <!-- <span class="currency">EUR</span> -->
            </div>

            <label for="fotos">Fotos</label>
            <br>
            <input type="file" id="fotos" name="fotos" accept="image/*">
            <br>
            <button type="submit">Anzeige aufgeben</button>
        </form>
    </inputboxn>
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

    <!--Footer Start-->
    <?php
    include 'assets/php/footer.php';
    ?>
    <!--Footer End-->

    <!-- Scripts -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/navColor.js"></script>

</body>

</html>