<?php
// Verbindung zur Datenbank herstellen
$servername = "localhost";
$username = "dein_db_benutzername";
$password = "dein_db_passwort";
$dbname = "mieteinander";

$conn = new mysqli($servername, $username, $password, $dbname);

// Überprüfen, ob die Verbindung erfolgreich war
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Funktion zum Suchen in der Datenbank
function searchInDatabase($searchInput) {
    global $conn;

    // SQL-Abfrage
    $sql = "SELECT * FROM anzeige WHERE Veranstaltungstyp LIKE '%$searchInput%' OR Stadt LIKE '%$searchInput%'";

    // Ausführen der Abfrage
    $result = $conn->query($sql);

    // Überprüfen, ob Ergebnisse vorhanden sind
    if ($result->num_rows > 0) {
        // Ergebnisse ausgeben
        while ($row = $result->fetch_assoc()) {
            echo "<div class='search-result'>";
            echo "<h3>" . $row["AnzeigenName"] . "</h3>";
            echo "<p>" . $row["Beschreibung"] . "</p>";
            // Weitere Informationen hier ausgeben
            echo "</div>";
        }
    } else {
        echo "Keine Ergebnisse gefunden.";
    }
}

// Wenn das Formular abgesendet wurde, die Suche durchführen
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchInput = $_POST["searchInput"];
    searchInDatabase($searchInput);
}

// Schließen der Datenbankverbindung
$conn->close();
?>
