<?php
// Fehlerprotokollierung deaktivieren
global $conn;
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0); // Keine Fehlerberichterstattung


// Datenbankverbindung (Kenndaten)
require '../../database/connect.php';

// Überprüfen auf Verbindungsfehler
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// Eingabedaten zur Vermeidung von SQL-Injection escapen
$username = $conn->real_escape_string($_POST['username']);
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);

// Passwort aus Sicherheitsgründen hashen
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Überprüfen, ob der Benutzer bereits in der Datenbank existiert
$stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Benutzer existiert bereits
    echo "Ein Benutzer mit dieser E-Mail-Adresse existiert bereits.";
} else {
    // Einfügen des neuen Benutzers in die Datenbank
    $stmt = $conn->prepare("INSERT INTO user (UName, Email, Passworthash) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    if ($stmt->execute()) {
        // Benutzer erfolgreich registriert
        echo "Neuer Benutzer erfolgreich registriert.";
    } else {
        // Fehler beim Einfügen
        echo "Fehler beim Einfügen: " . mysqli_error($conn);
    }
}

// Schließen der Datenbankverbindung
$conn->close();
?>
