<?php
include 'dbAuslesen.php';

$sql = "SELECT * FROM anzeige";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    $row = $result->fetch_assoc();
    echo "<div class='inseratausgabe'>
                <div>" . $row["istAnzeige"] . "</div>            
                <div class='inseratTitel'>" . $row["AnzeigenName"] . "</div>
                <div class='grau'>Veranstaltungstyp:</div>
                <div>" . $row["Veranstaltungstyp"] . "</div>
                <div class='grau'>Beschreibung:</div>
                <div>" . $row["Beschreibung"] . "</div>
                <div>Maximale Anzahl Gäste:</div>
                <div>" . $row["anzahlGaeste"] . "</div>
                <div>Standort:</div>
                <span>" . $row["Plz"] . "</span>
                <span>" . $row["Stadt"] . "</span>
                <span>" . $row["Bundesland"] . "</span>
                <div>Preis pro Tag:</div>
                <div>" . $row["preis"] . "</div>
                
              </div";
}
$conn->close();
?>