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