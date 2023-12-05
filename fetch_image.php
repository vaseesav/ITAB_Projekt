<?php
include 'assets/database/connect.php';

$sql = "SELECT * FROM foto";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    $row = $result->fetch_assoc();
    echo "<div class='inseratbild'>
                 
                <img class='bildInserat' src=" . $row["Pfad"] . " alt='Italian Trulli'>
              </div";
} else {
    echo 'keine Daten';
}
$conn->close();
?>
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