<?php
session_start();

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "mieteinander";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM user WHERE Email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['Passworthash'])) {
            // Password is correct
            $_SESSION['loggedin'] = true;
            $_SESSION['userId'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];

            // Redirect to another page
            header("Location: index.php");
            exit;
        } else {
            // Password is not correct
            echo "Ungültige E-Mail oder Passwort.";
        }
    } else {
        echo "Ungültige E-Mail oder Passwort.";
    }
}

$conn->close();
?>
