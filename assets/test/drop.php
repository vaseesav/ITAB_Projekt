<?php
global $conn;
ini_set('display_errors', '1');

require '../../database/connect.php';

// Deaktivieren der Fremdschlüsselbeschränkungen
$conn->query("SET FOREIGN_KEY_CHECKS=0");

// SQL zum Löschen der Tabellen
$tablesToDelete = ['anzeige', 'buchungszeitraum', 'foto', 'gebuchter_zeitraum', 'user'];
foreach ($tablesToDelete as $table) {
    $sql = "DROP TABLE IF EXISTS $table";

    if ($conn->query($sql) === TRUE) {
        echo "Tabelle $table wurde erfolgreich gelöscht.\n";
    } else {
        echo "Fehler beim Löschen der Tabelle $table: " . $conn->error . "\n";
    }
}

// Wiederaktivieren der Fremdschlüsselbeschränkungen
$conn->query("SET FOREIGN_KEY_CHECKS=1");

// Verbindung schließen
$conn->close();
?>
