<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "mieteinander";


$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);


$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
   
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        // Passwort ist korrekt
        echo "Anmeldung erfolgreich.";
    } else {
        // Passwort ist nicht korrekt
        echo "Ungültige E-Mail oder Passwort.";
    }
} else {
    echo "Ungültige E-Mail oder Passwort.";
}


$conn->close();
?>