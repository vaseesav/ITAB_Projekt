<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anzeige aufgeben - mieteinander</title>
    <link rel="stylesheet" href="assets/css/anzeigen-style.css">

    <script>
        function toggleForm() {
            // Holen Sie sich die Formularelemente
            let anzeigenForm = document.getElementById('anzeigenForm');
            let gesuchForm = document.getElementById('gesuchForm');

            // Verstecke oder zeige die Formulare basierend auf der Auswahl im Dropdown
            if (anzeigenForm.style.display !== 'none') {
                anzeigenForm.style.display = 'none';
                gesuchForm.style.display = 'block';
            } else {
                anzeigenForm.style.display = 'block';
                gesuchForm.style.display = 'none';
            }
        }
    </script>
</head>

<body>

<!-- Schalter für "Gesuch aufgeben" oder "Anzeige aufgeben" -->

<div class="description-box">
    <p>Auf unserer Plattform dreht sich alles um das "Miteinander". Hier kannst du nicht nur Räume mieten, sondern auch jede Menge Lacher erleben.</p>
    <p>Wir bieten nicht nur Raum für Ideen, sondern auch Raum für Wortspiele. Wir machen es dir leicht, den perfekten Raum zu finden oder anzubieten - miteinander wird's möglich!</p>
    <p>Ob du einen "Raumtastischen" Ort für deine Veranstaltung suchst oder einfach etwas "Raumantisches" teilen möchtest, hier bist du richtig.</p>
    <p>Verpasse nicht die Gelegenheit, bei uns deine Raumkomödie zu starten. Wir sind der Meinung, dass das "Miteinander" nicht nur praktisch, sondern auch lustig sein sollte.</p>
    <p>Mieteinander, lacheinander, erlebeinander - denn bei uns wird das Mieten zum Gaudi! Willkommen in unserer Raumkomödien-Gemeinschaft!</p>
</div>

<div class="toggle-container">
    <label class="toggle-label">
        <input type="checkbox" id="toggleSwitch" onclick="toggleForm()">
        <span class="slider"></span>
    </label>
    <span class="toggle-text">Anzeige aufgeben</span>
    <span class="toggle-text">Gesuch aufgeben</span>
</div>

<main>
    <section class="form-section">
        <!-- Anzeige aufgeben Formular -->
        <form id="anzeigenForm" class="invisible">
            <label for="anzeigeTitel">Titel der Anzeige:</label>
            <input type="text" id="anzeigeTitel" name="anzeigeTitel" required>

            <label for="anzeigeInhalt">Inhalt der Anzeige:</label>
            <textarea id="anzeigeInhalt" name="anzeigeInhalt" required></textarea>

            <button type="submit">Anzeige aufgeben</button>
        </form>

        <!-- Gesuch aufgeben Formular -->
        <form id="gesuchForm" class="invisible" style="display:none;">
            <label for="gesuchTitel">Titel des Gesuchs:</label>
            <input type="text" id="gesuchTitel" name="gesuchTitel" required>

            <label for="gesuchInhalt">Inhalt des Gesuchs:</label>
            <textarea id="gesuchInhalt" name="gesuchInhalt" required></textarea>

            <button type="submit">Gesuch aufgeben</button>
        </form>
    </section>
</main>

<header class="background-header">
    <div class="main-nav">
        <div class="logo">
            <!-- Hier könnte zusätzlicher Text oder ein alternativer Text für das Bild hinzugefügt werden -->
            <img src="assets/images/logo.png" alt="mieteinander Logo"> 
        </div>
    </div>
</header>

<main>
    <section class="form-section">
        <!-- Formular für die Anzeige eines Raumes -->
        <form>
            <!-- Weitere Eingabefelder für die Anzeige eines Raumes -->
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

            <label for="startDatum">Startdatum und -zeit:</label>
            <input type="datetime-local" id="startDatum" name="startDatum" required>

            <label for="endDatum">Enddatum und -zeit:</label>
            <input type="datetime-local" id="endDatum" name="endDatum" required>

            <!-- Für die Auswahl zwischen Stunde und Tag -->
            <label for="preis">Preis</label>
            <div>
                <input type="text" id="preis" name="preis" required>
                <select name="einheit" id="einheit">
                    <option value="stunde">pro Stunde</option>
                    <option value="tag">pro Tag</option>
                </select>
                <span class="currency">EUR</span>
            </div>

            <label for="fotos">Fotos</label>
            <input type="file" id="fotos" name="fotos" accept="image/*">

            <button type="submit">Anzeige aufgeben</button>
        </form>
    </section>
</main>

<footer>
    <!-- Hier können zusätzliche Informationen oder Links für den Footer hinzugefügt werden -->
    <p>&copy; 2023 mieteinander. Alle Rechte vorbehalten.</p>
</footer>

</body>
</html>
