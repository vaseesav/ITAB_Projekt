<?php
include 'assets/database/connect.php';
$userId = $_SESSION['userId'];
// SQL-Abfrage, um die Daten zu erhalten
$sql = "SELECT * FROM foto WHERE AnzeigenID = $userId";
$result = $conn->query($sql);

// Prüfen, ob Ergebnisse vorhanden sind und diese ausgeben
if ($result->num_rows > 0) {
    // Ausgabe der Daten jedes Reihen
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "FotoID: " . $row["FotoID"] . " - AnzeigenID: " . $row["AnzeigenID"] . " - Pfad: " . $row["Pfad"];
        echo "</div>";
    }
} else {
    echo "Keine Ergebnisse gefunden";
}
$conn->close();
?>