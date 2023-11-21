<?php
// Verbindung zur Datenbank herstellen
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mieteinander";

$conn = new mysqli($servername, $username, $password, $dbname);

// Überprüfen der Verbindung
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Überprüfen, ob das Suchformular abgeschickt wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Überprüfen der Existenz der Schlüssel
    if (isset($_POST["raumname"]) && isset($_POST["veranstaltungstyp"]) && isset($_POST["anzahl-gaeste"]) && isset($_POST["beschreibung"]) &&
        isset($_POST["postleitzahl"]) && isset($_POST["stadt"]) && isset($_POST["bundesland"]) && isset($_POST["land"]) &&
        isset($_POST["startDatum"]) && isset($_POST["endDatum"]) && isset($_POST["preis"])) {

        // Erfassen der Anzeigeninformationen aus dem Formular
        $raumname = $_POST["raumname"];
        $veranstaltungstyp = $_POST["veranstaltungstyp"];
        $anzahlGaeste = $_POST["anzahl-gaeste"];
        $beschreibung = $_POST["beschreibung"];
        $postleitzahl = $_POST["postleitzahl"];
        $stadt = $_POST["stadt"];
        $bundesland = $_POST["bundesland"];
        $land = $_POST["land"];
        $startDatum = $_POST["startDatum"];
        $endDatum = $_POST["endDatum"];
        $preis = $_POST["preis"];

        // Erstellen der SQL-Abfrage basierend auf den Anzeigeninformationen
        $sql = "INSERT INTO `Anzeige aufgeben` (`Raumname`, `Veranstaltungstyp`, `AnzahlGaeste`, `Beschreibung des Raumes`, 
                `Postleitzahl`, `Stadt`, `Bundesland`, `Land`, `Verfügbarkeit`, `Preis`) VALUES ('$raumname', '$veranstaltungstyp', 
                $anzahlGaeste, '$beschreibung', '$postleitzahl', '$stadt', '$bundesland', '$land', '$startDatum-$endDatum', '$preis')";

        // Führen der SQL-Abfrage aus
        if ($conn->query($sql) === TRUE) {
            echo "Anzeige erfolgreich aufgegeben!";
        } else {
            echo "Fehler beim Aufgeben der Anzeige: " . $conn->error;
        }
    } else {
        echo "Ein oder mehrere Formularfelder fehlen.";
    }
}

// Schließen der Verbindung zur Datenbank
$conn->close();
