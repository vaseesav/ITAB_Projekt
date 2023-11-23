<?php
global $conn;
// Verbindung zur Datenbank
require '../../database/connect.php';

// Überprüfen, ob die Anfrage eine POST-Anfrage ist
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sicherstellen, dass Eingaben korrekt behandelt werden
    $searchText = isset($_POST["searchText"]) ? htmlspecialchars($_POST["searchText"]) : "";
    $bundesland = isset($_POST["bundesland"]) ? htmlspecialchars($_POST["bundesland"]) : "";
    $stadt = isset($_POST["stadt"]) ? htmlspecialchars($_POST["stadt"]) : "";
    $veranstaltungstyp = isset($_POST["veranstaltungstyp"]) ? htmlspecialchars($_POST["veranstaltungstyp"]) : "";
    $sortieren = isset($_POST["sortieren"]) ? htmlspecialchars($_POST["sortieren"]) : "";
    $sortierreihenfolge = isset($_POST["sortierreihenfolge"]) ? htmlspecialchars($_POST["sortierreihenfolge"]) : "";
    $anzahlGaeste = isset($_POST["anzahlGaeste"]) ? htmlspecialchars($_POST["anzahlGaeste"]) : "";
    $veranstaltungsdauer = isset($_POST["veranstaltungsdauer"]) ? htmlspecialchars($_POST["veranstaltungsdauer"]) : "";
    $postleitzahl = isset($_POST["postleitzahl"]) ? htmlspecialchars($_POST["postleitzahl"]) : "";
    $startdatum = isset($_POST["startdatum"]) ? htmlspecialchars($_POST["startdatum"]) : "";
    $enddatum = isset($_POST["enddatum"]) ? htmlspecialchars($_POST["enddatum"]) : "";

    // Zusätzliche Logik für Preisbereiche
    if(isset($_POST["preis"]) && $_POST["preis"] != "custom") {
        $preisBereich = explode("-", $_POST["preis"]);
        $minPreis = $preisBereich[0];
        $maxPreis = $preisBereich[1];
    } else {
        $minPreis = isset($_POST["minPreis"]) ? htmlspecialchars($_POST["minPreis"]) : 0;
        $maxPreis = isset($_POST["maxPreis"]) ? htmlspecialchars($_POST["maxPreis"]) : PHP_INT_MAX;
    }

    // Anpassen der SQL-Abfrage, um leeren Suchtext zu berücksichtigen
    $searchCondition = ($searchText !== "") ? "(a.Veranstaltungstyp LIKE ? OR a.Beschreibung LIKE ?) AND " : "";

    // SQL-Abfrage vorbereiten
    $sql = "SELECT * FROM anzeige AS a
            JOIN buchungszeitraum AS b ON a.AnzeigenID = b.AnzeigenID
            WHERE 
            $searchCondition
            (a.Bundesland = ? OR ? = '') AND 
            (a.Stadt LIKE ? OR ? = '') AND 
            (a.Veranstaltungstyp LIKE ? OR ? = '') AND
            (a.anzahlGaeste >= ? OR ? = '') AND
            (a.preis BETWEEN ? AND ?) AND
            (a.Plz = ? OR ? = '') AND
            (b.Startdatum >= ? OR ? = '') AND
            (b.Enddatum <= ? OR ? = '')
            ORDER BY a.$sortieren " . ($sortierreihenfolge == "absteigend" ? "DESC" : "ASC");

    $stmt = $conn->prepare($sql);

    // Parameter binden
    if ($searchText !== "") {
        $stmt->bind_param("ssssssssssssssssss", $searchText, $searchText, $bundesland, $bundesland, $stadt, $stadt, $veranstaltungstyp, $veranstaltungstyp, $anzahlGaeste, $anzahlGaeste, $minPreis, $maxPreis, $postleitzahl, $postleitzahl, $startdatum, $startdatum, $enddatum, $enddatum);
    } else {
        $stmt->bind_param("ssssssssssssss", $bundesland, $bundesland, $stadt, $stadt, $veranstaltungstyp, $veranstaltungstyp, $anzahlGaeste, $anzahlGaeste, $minPreis, $maxPreis, $postleitzahl, $postleitzahl, $startdatum, $startdatum, $enddatum, $enddatum);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $resultArray = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($resultArray, $row);
        }
    } else {
    echo json_encode([]); // Sendet ein leeres Array zurück
}

    // Ergebnisse als JSON zurückgeben
    header('Content-Type: application/json');
    echo json_encode($resultArray);

    $stmt->close();
} else {
    // Keine POST-Anfrage
    header('Content-Type: application/json');
    echo json_encode(["error" => "Ungültige Anfrage"]);
}

$conn->close();
?>