<?php
global $conn;

// Datenbankverbindung (Kenndaten)
require '../../database/connect.php';

// Überprüfen auf Verbindungsfehler
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
// Hier wird die Suchlogik implementiert
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validierung der Benutzereingaben
    $searchText = isset($_POST["searchText"]) ? htmlspecialchars($_POST["searchText"]) : "";
    $bundesland = isset($_POST["bundesland"]) ? htmlspecialchars($_POST["bundesland"]) : "";
    $stadt = isset($_POST["stadt"]) ? htmlspecialchars($_POST["stadt"]) : "";
    $veranstaltungstyp = isset($_POST["veranstaltungstyp"]) ? htmlspecialchars($_POST["veranstaltungstyp"]) : "";
    $sortieren = isset($_POST["sortieren"]) ? htmlspecialchars($_POST["sortieren"]) : "";
    $sortierreihenfolge = isset($_POST["sortierreihenfolge"]) ? htmlspecialchars($_POST["sortierreihenfolge"]) : "";
    $minPreis = isset($_POST["minPreis"]) ? htmlspecialchars($_POST["minPreis"]) : "";
    $maxPreis = isset($_POST["maxPreis"]) ? htmlspecialchars($_POST["maxPreis"]) : "";
    $startdatum = isset($_POST["startdatum"]) ? htmlspecialchars($_POST["startdatum"]) : "";
    $enddatum = isset($_POST["enddatum"]) ? htmlspecialchars($_POST["enddatum"]) : "";
    $anzahlGaeste = isset($_POST["anzahlGaeste"]) ? htmlspecialchars($_POST["anzahlGaeste"]) : "";
    $veranstaltungsdauer = isset($_POST["veranstaltungsdauer"]) ? htmlspecialchars($_POST["veranstaltungsdauer"]) : "";
    $postleitzahl = isset($_POST["postleitzahl"]) ? htmlspecialchars($_POST["postleitzahl"]) : "";

    // Überprüfe, ob $sortieren ein gültiger Spaltenname ist
    $allowedColumns = ["preis", "anzahlGaeste", "startdatum"]; // Füge hier alle erlaubten Spaltennamen hinzu
    if (in_array($sortieren, $allowedColumns)) {

        // Überprüfe, ob $sortierreihenfolge gültig ist (nur "aufsteigend" oder "absteigend" erlaubt)
        if ($sortierreihenfolge == "aufsteigend" || $sortierreihenfolge == "absteigend") {

            // Einfache SQL-Abfrage mit vorbereitetem Statement
            $stmt = $conn->prepare("SELECT * FROM anzeige AS a
            JOIN buchungszeitraum AS b ON a.AnzeigenID = b.AnzeigenID
            WHERE 
            (a.Veranstaltungstyp LIKE ? OR a.Beschreibung LIKE ?) AND 
            (a.Bundesland = ? OR ? = '') AND 
            (a.Stadt LIKE ? OR ? = '') AND 
            (a.Veranstaltungstyp LIKE ? OR ? = '') AND
            (a.anzahlGaeste >= ? OR ? = '') AND
            (a.preis BETWEEN ? AND ?) AND
            (a.Plz = ? OR ? = '') AND
            (b.Startdatum >= ? OR ? = '') AND
            (b.Enddatum <= ? OR ? = '')
            ORDER BY a.$sortieren " . ($sortierreihenfolge == "absteigend" ? "DESC" : "ASC"));

            $stmt->bind_param("ssssssssssssssssss", $searchText, $searchText, $bundesland, $bundesland, $stadt, $stadt, $veranstaltungstyp, $veranstaltungstyp, $anzahlGaeste, $anzahlGaeste, $minPreis, $maxPreis, $postleitzahl, $postleitzahl, $startdatum, $startdatum, $enddatum, $enddatum);

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Hier werden die Suchergebnisse angezeigt
                echo "<h2>Suchergebnisse:</h2>";
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='result'>";
                    echo "<h3>" . $row["AnzeigenName"] . "</h3>";
                    echo "<p>Veranstaltungstyp: " . $row["Veranstaltungstyp"] . "</p>";
                    echo "<p>Beschreibung: " . $row["Beschreibung"] . "</p>";
                    echo "<p>Preis: " . $row["preis"] . "</p>";
                    // Weitere Informationen können hier hinzugefügt werden
                    echo "</div>";
                }
            } else {
                echo "<p>Keine Ergebnisse gefunden.</p>";
            }

            $stmt->close();
        } else {
            // Unerlaubter Wert für $sortierreihenfolge
            echo "Ungültiger Wert für die Sortierreihenfolge.";
        }
    } else {
        // Unerlaubter Wert für $sortieren
        echo "Ungültiger Wert für die Sortierung.";
    }
}

$conn->close();
?>