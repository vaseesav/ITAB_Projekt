<?php

//  Datenbankverbindung (Kenndaten)
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "mieteinander";

// Herstellen der Datenbankverbindung
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

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
$sql = "SELECT * FROM user WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Benutzer existiert bereits
    echo "Ein Benutzer mit dieser E-Mail-Adresse existiert bereits.";
} else {
    // Einfügen des neuen Benutzers in die Datenbank
    $sql = "INSERT INTO user (UName, Email, Passworthash) VALUES ('$username', '$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        // Benutzer erfolgreich registriert
        echo "Neuer Benutzer erfolgreich registriert.";
    } else {
        // Fehlerbehandlung
        echo "Fehler: " . $sql . "<br>" . $conn->error;
    }
}

// Schließen der Datenbankverbindung
$conn->close();
?>