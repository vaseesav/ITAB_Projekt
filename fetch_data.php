<?php
include 'dbAuslesen.php';

$sql = "SELECT * FROM anzeige";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Start table
    echo "<tr>
            <th>AnzeigenID</th>
            <th>NutzerID</th>
            <th>AnzeigenName</th>
            <th>Veranstaltungstyp</th>
            <th>Beschreibung</th>
            <th>Anzahl Gaeste</th>
            <th>PLZ</th>
            <th>Stadt</th>
            <th>Bundesland</th>
            <th>Preis</th>
            <th>IstAnzeige</th>
          </tr>";
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["AnzeigenID"] . "</td>
                <td>" . $row["NutzerID"] . "</td>
                <td>" . $row["AnzeigenName"] . "</td>
                <td>" . $row["Veranstaltungstyp"] . "</td>
                <td>" . $row["Beschreibung"] . "</td>
                <td>" . $row["anzahlGaeste"] . "</td>
                <td>" . $row["Plz"] . "</td>
                <td>" . $row["Stadt"] . "</td>
                <td>" . $row["Bundesland"] . "</td>
                <td>" . $row["preis"] . "</td>
                <td>" . $row["istAnzeige"] . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='11'>0 results</td></tr>";
}
$conn->close();
?>