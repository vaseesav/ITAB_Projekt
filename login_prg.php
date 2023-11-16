<?php
session_start();

$dbServername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'mieteinander';
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    // Verwenden von vorbereiteten Anweisungen
    $stmt = $conn->prepare("SELECT NutzerID, UName, Email, Passworthash FROM user WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['Passworthash'])) {
            // Passwort ist korrekt
            $_SESSION['loggedin'] = true;
            $_SESSION['userId'] = $user['NutzerID'];
            $_SESSION['username'] = $user['UName'];
            $_SESSION['email'] = $user['Email'];

            // Weiterleitung zu einer anderen Seite
            header("Location: index.php");
            exit;
        } else {
            // Passwort ist nicht korrekt
            echo "Ungültige E-Mail oder Passwort.";
        }
    } else {
        echo "Ungültige E-Mail oder Passwort.";
    }
}

$conn->close();
?>
