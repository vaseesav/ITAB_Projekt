document.addEventListener("DOMContentLoaded", function () {
    let form = document.querySelector('form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        let formData = new FormData(form);

        fetch('assets/php-backend/suchmaschine-page/datenabfrage.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                let ergebnisseDiv = document.querySelector('.result-container');
                ergebnisseDiv.innerHTML = '';

                if (data.length > 0) {
                    data.forEach(row => {
                        let resultDiv = document.createElement('div');
                        resultDiv.className = 'result';

                        resultDiv.innerHTML = `<h3>${row.AnzeigenName}</h3>
                        <p>Veranstaltungstyp: ${row.Veranstaltungstyp}</p>
                        <p>Beschreibung: ${row.Beschreibung}</p>
                        <p>Preis: ${row.preis}</p>`;

                        ergebnisseDiv.appendChild(resultDiv);
                    });
                } else {
                    ergebnisseDiv.innerHTML = '<p>Keine Ergebnisse gefunden.</p>';
                }
            })
            .catch(error => console.error('Fehler:', error));
    });
});
