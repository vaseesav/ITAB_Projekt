<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'mieteinander';


$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);


if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

$nutzerID = 1; // Beispiel-NutzerID
$anzeigenName = 'Beispielname';
$veranstaltungstyp = 'Beispieltyp';
$beschreibung = 'Beispielbeschreibung';
$anzahlGaeste = 10;
$plz = 12345;
$stadt = 'Beispielstadt';
$bundesland = 'Beispielbundesland';
$preis = 100.50;
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
?>