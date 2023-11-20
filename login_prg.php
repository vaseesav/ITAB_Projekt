<?php
session_start();

$dbServername = "rdbms.strato.de";
$dbUsername = "dbu2408738";
$dbPassword = "#code-cruncher-2023%";
$dbName = "dbs12222605";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

$response = array("success" => false, "error" => "");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = isset($_POST['login_email']) ? $conn->real_escape_string($_POST['login_email']) : '';
    $password = isset($_POST['login_password']) ? $conn->real_escape_string($_POST['login_password']) : '';

    error_log("Empfangene E-Mail: " . $email);
    error_log("Empfangenes Passwort: " . $password);

    if (empty($email) || empty($password)) {
        $response["error"] = "E-Mail und Passwort müssen angegeben werden.";
    } else {
        $stmt = $conn->prepare("SELECT NutzerID, UName, Email, Passworthash FROM user WHERE Email = ?");
        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['Passworthash'])) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['userId'] = $user['NutzerID'];
                    $_SESSION['username'] = $user['UName'];
                    $_SESSION['email'] = $user['Email'];

                    $response["success"] = true;
                } else {
                    $response["error"] = "Ungültige E-Mail oder Passwort.";
                }
            } else {
                $response["error"] = "Ungültige E-Mail oder Passwort.";
            }
            $stmt->close();
        } else {
            $response["error"] = "Datenbankabfrage fehlgeschlagen.";
        }
    }
} else {
    $response["error"] = "Ungültige Anfrage.";
}

$conn->close();
echo json_encode($response);
?>