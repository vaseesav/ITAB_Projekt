document.addEventListener("DOMContentLoaded", function () {
    let form = document.querySelector('form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        let formData = new FormData(form);

        fetch('datenabfrage.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            let ergebnisseDiv = document.querySelector('.result-container');
            ergebnisseDiv.innerHTML = '';

            if (data.length > 0) {
                data.forEach(row => {
                    let resultDiv = document.createElement('div');
                    resultDiv.className = 'result';

                    resultDiv.innerHTML = '<h3>' + row.AnzeigenName + '</h3>' +
                        '<p>Veranstaltungstyp: ' + row.Veranstaltungstyp + '</p>' +
                        '<p>Beschreibung: ' + row.Beschreibung + '</p>' +
                        '<p>Preis: ' + row.preis + '</p>';

                    ergebnisseDiv.appendChild(resultDiv);
                });
            } else {
                ergebnisseDiv.innerHTML = '<p>Keine Ergebnisse gefunden.</p>';
            }
        })
        .catch(error => console.error('Fehler:', error));
    });
});

// Warte auf das Laden des DOMs
document.addEventListener("DOMContentLoaded", function () {
    // Hole das Range-Element und das Output-Element
    let preisRange = document.getElementById("preisRange");
    let preisOutput = document.getElementById("preisOutput");

    // Aktualisiere das Output-Element, wenn sich der Range-Wert ändert
    preisRange.addEventListener("input", function () {
        preisOutput.value = preisRange.value;
    });
});
