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
    $sql = "SELECT * FROM `Anzeige aufgeben` WHERE `Veranstaltungstyp` = '$veranstaltungstyp' AND `Budget` <= $budget";

    // Führen Sie die SQL-Abfrage aus
    $result = $conn->query($sql);

    // Überprüfen Sie die Ergebnisse und zeigen Sie sie an
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Hier können Sie die Ergebnisse anzeigen, z.B. in einer HTML-Tabelle
            echo "Raumname: " . $row["Raumname"] . "<br>";
            echo "Beschreibung: " . $row["Beschreibung des Raumes"] . "<br>";
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
    <title>Anzeige aufgeben - mieteinander</title>
    <link rel="stylesheet" href="assets/css/anzeigen-style.css"> 

    <head>
    <!-- ... (andere Head-Elemente) ... -->
    <script>
        function toggleForm(selectedForm) {
            var anzeigenForm = document.getElementById('anzeigenForm');
            var gesuchForm = document.getElementById('gesuchForm');

            // Verstecke oder zeige die Formulare basierend auf der Auswahl im Dropdown
            if (selectedForm === 'anzeigen') {
                anzeigenForm.classList.remove('invisible');
                gesuchForm.classList.add('invisible');
            } else {
                anzeigenForm.classList.add('invisible');
                gesuchForm.classList.remove('invisible');
            }
        }
    </script>
</head>


</head>
<body>


<!-- Dropdown-Menü für "Gesuch aufgeben" oder "Anzeige aufgeben" -->
<div class="dropdown-container">
        <select class="dropdown" onchange="toggleForm(this.value)">
            <option value="anzeigen">Anzeige aufgeben</option>
            <option value="gesuch">Gesuch aufgeben</option>
        </select>
    </div>

    <main>
        <section class="form-section">
            <!-- Anzeige aufgeben Formular -->
            <form id="anzeigenForm" class="invisible">
                <!-- ... (dein Anzeige aufgeben Formular) ... -->
            </form>

            <!-- Gesuch aufgeben Formular -->
            <form id="gesuchForm" class="invisible">
                <!-- ... (dein Gesuch aufgeben Formular) ... -->
            </form>
        </section>
    </main>

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
            <form>
                <label for="raumname">Raumname</label>
                <input type="text" id="raumname" name="raumname" required>

                <label for="veranstaltungstyp">Veranstaltungstyp</label>
                <input type="text" id="veranstaltungstyp" name="veranstaltungstyp" required>

                <label for="anzahl-gaeste">Anzahl der Gäste</label>
                <input type="number" id="anzahl-gaeste" name="anzahl-gaeste" required>

                <label for="beschreibung">Beschreibung des Raumes</label>
                <textarea id="beschreibung" name="beschreibung" required></textarea>

                <label for="postleitzahl">Postleitzahl</label>
                <input type="text" id="postleitzahl" name="postleitzahl" required>

                <label for="stadt">Stadt</label>
                <input type="text" id="stadt" name="stadt" required>

                <label for="bundesland">Bundesland</label>
                <input type="text" id="bundesland" name="bundesland" required>

                <label for="land">Land</label>
                <input type="text" id="land" name="land" required>

                <label for="verfuegbarkeit">Verfügbarkeit (Datum/ Zeit)</label>
                <input type="datetime-local" id="verfuegbarkeit" name="verfuegbarkeit" required>

                <label for="preis">Preis/ pro Stunde/Tag</label>
                <input type="text" id="preis" name="preis" required>

                <label for="verifiziert">Verifiziert</label>
                <select id="verifiziert" name="verifiziert" required>
                    <option value="ja">Ja</option>
                    <option value="nein">Nein</option>
                </select>

                <label for="fotos">Fotos</label>
                <input type="file" id="fotos" name="fotos" accept="image/*">

                <button type="submit">Anzeige aufgeben</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 mieteinander. Alle Rechte vorbehalten.</p>
    </footer>

</body>
</html>
