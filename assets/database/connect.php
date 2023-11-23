<?php
global $conn;
// Datenbankkonfiguration
$dbServername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'mieteinander';

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
