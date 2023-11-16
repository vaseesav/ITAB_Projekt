<?php
$dbServername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'mieteinander';

try {
    $conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }

    $dump = file_get_contents('sql/mieteinander.sql');
    if ($dump === false) {
        throw new Exception("Fehler beim Laden der SQL-Datei.");
    }

    $success = $conn->multi_query($dump);
    if (!$success) {
        throw new Exception("Fehler beim Ausführen der SQL-Anweisungen: " . $conn->error);
    }

    echo "SQL-Anweisungen erfolgreich ausgeführt.";
} catch (Exception $e) {
    echo "Ein Fehler ist aufgetreten: " . $e->getMessage();
}

$conn->close();
?>
