<?php
// Verbindung zur Datenbank herstellen (Passen Sie die Daten an Ihre Konfiguration an)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mieteinander";

$conn = new mysqli($servername, $username, $password, $dbname);

// Überprüfen Sie die Verbindung
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Überprüfen, ob das Suchformular abgeschickt wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Erfassen Sie die Suchkriterien aus dem Formular
    $veranstaltungstyp = $_POST["veranstaltungstyp"];
    $budget = $_POST["budget"];

    // Erstellen Sie die SQL-Abfrage basierend auf den Suchkriterien
    $sql = "SELECT * FROM `Gesuch aufgeben` WHERE `Veranstaltungstyp` = '$veranstaltungstyp' AND `Budget` <= $budget";

    // Führen Sie die SQL-Abfrage aus
    $result = $conn->query($sql);

    // Überprüfen Sie die Ergebnisse und zeigen Sie sie an
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Hier können Sie die Ergebnisse anzeigen, z.B. in einer HTML-Tabelle
            echo "Gesuchstitel: " . $row["Titel"] . "<br>";
            echo "Beschreibung: " . $row["Zusätzliche Anforderungen an den Raum"] . "<br>";
            // Fügen Sie weitere Informationen hinzu, je nach Bedarf
            echo "<hr>";
        }
    } else {
        echo "Keine Ergebnisse gefunden.";
    }
}

// Schließen Sie die Verbindung zur Datenbank
$conn->close();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gesuch aufgeben - mieteinander</title>
    <link rel="stylesheet" href="assets/css/anzeigen-style.css"> 
</head>
<body>

<!-- Dropdown-Menü für "Gesuch aufgeben" oder "Anzeige aufgeben" -->
<div class="dropdown-container">
    <select class="dropdown" onchange="window.location.href=this.value">
        <option value="gesuch_aufgeben.php">Gesuch aufgeben</option>
        <option value="anzeige_aufgeben.php">Anzeige aufgeben</option>
    </select>
</div>

<header class="background-header">
    <div class="main-nav">
        <div class="logo">
            <img src="assets/images/logo.png" alt="mieteinander Logo"> 
        </div>
        <ul class="nav">
            <li><a href="#">Startseite</a></li>
            <li><a href="#">Anzeige aufgeben</a></li>
            <li><a href="#">Gesuch aufgeben</a></li>
        </ul>
    </div>
</header>

<main>
    <section class="form-section">
        <form method="post">
            <label for="titel">Gesuchstitel</label>
            <input type="text" id="titel" name="titel" required>

            <label for="veranstaltungstyp">Veranstaltungstyp</label>
            <input type="text" id="veranstaltungstyp" name="veranstaltungstyp" required>

            <label for="budget">Budget</label>
            <input type="number" id="budget" name="budget" required>

            <label for="zusatzanforderungen">Zusätzliche Anforderungen an den Raum</label>
            <textarea id="zusatzanforderungen" name="zusatzanforderungen" required></textarea>

            <button type="submit">Gesuch aufgeben</button>
        </form>
    </section>
</main>

<footer>
    <p>&copy; 2023 mieteinander. Alle Rechte vorbehalten.</p>
</footer>

</body>
</html>
