<?php
session_start();

// Überprüfen, ob der Benutzer eingeloggt ist
if (!isset($_SESSION['loggedin'])) {
    echo "Nutzer ist nicht eingeloggt.";
    exit;
}

function validatePassword($password) {
    return preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d\S]{8,}$/', $password);
}

// Datenbankverbindung herstellen
$dbServername = "rdbms.strato.de";
$dbUsername = "dbu2408738";
$dbPassword = "#code-cruncher-2023%";
$dbName = "dbs12222605";

try {
    $conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

    // Überprüfen der Verbindung
    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }

    // Überprüfen, ob das Formular gesendet wurde
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        $user_email = $_SESSION['email']; // Annahme, dass die E-Mail in der Session gespeichert ist

        if ($new_password == $confirm_password) {
            // Validierung des Passworts
            if (!validatePassword($new_password)) {
                echo "Das Passwort muss mindestens 8 Zeichen lang sein und sowohl Buchstaben als auch Zahlen enthalten.";
                exit;
            }

            // Passwort verschlüsseln
            $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);

            // Passwort in der Datenbank aktualisieren
            $stmt = $conn->prepare("UPDATE user SET Passworthash = ? WHERE Email = ?");
            $stmt->bind_param("ss", $new_password_hash, $user_email);

            if ($stmt->execute()) {
                // Überprüfen, ob das Passwort tatsächlich geändert wurde
                if ($stmt->affected_rows > 0) {
                    echo "Passwort erfolgreich geändert.";
                } else {
                    echo "Keine Änderung vorgenommen. Überprüfen Sie die E-Mail-Adresse.";
                }
            } else {
                echo "Fehler beim Ändern des Passworts: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Passwörter stimmen nicht überein.";
        }
    } else {
        echo "Ungültige Anfrage.";
    }
} catch (Exception $e) {
    echo "Ein Fehler ist aufgetreten: " . $e->getMessage();
}

$conn->close();
?>
