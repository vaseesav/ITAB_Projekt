<?php
global $conn;
// Datenbankkonfiguration
$dbServername = "rdbms.strato.de";
$dbUsername = "dbu2408738";
$dbPassword = "#code-cruncher-2023%";
$dbName = "dbs12222605";

// Versuch, eine Verbindung zur Datenbank herzustellen
try {
    $conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

    // Überprüfen der Verbindung
    if ($conn->connect_error) {
        throw new Exception("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }
} catch (Exception $e) {
    // Fehlerbehandlung
    error_log($e->getMessage());
    exit('Ein Fehler bei der Datenbankverbindung ist aufgetreten.');
}
?>
