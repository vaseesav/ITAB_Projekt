function search() {
    // Hier würde die eigentliche Suchlogik implementiert werden
    // Dies ist nur ein Platzhalter für statische Daten
    let searchInput = document.getElementById('searchInput').value.toLowerCase();

    // Statische Inserate als Beispiel
    let ads = [
        { raumname: 'Partyraum', veranstaltungstyp: 'Party', anzahlgaeste: 50, beschreibung: 'Großer Raum für Partys', postleitzahl: '12345', stadt: 'Beispielstadt', bundesland: 'Beispielbundesland', land: 'Deutschland', startdatum: '2023-01-01', enddatum: '2023-12-31', preis: 100 },
        // Füge hier weitere statische Inserate hinzu
    ];

    // Filtere die Inserate basierend auf der Suche
    let filteredAds = ads.filter(function (ad) {
        return (
            Object.values(ad).some(function (value) {
                return value.toString().toLowerCase().includes(searchInput);
            })
        );
    });

    // Anzeige der Suchergebnisse
    displayResults(filteredAds);
}

function displayResults(results) {
    let resultsContainer = document.getElementById('searchResults');
    resultsContainer.innerHTML = '';

    if (results.length === 0) {
        resultsContainer.innerHTML = '<p>Keine Ergebnisse gefunden.</p>';
    } else {
        results.forEach(function (result) {
            // Hier kannst du die Suchergebnisse formatieren und anzeigen
            resultsContainer.innerHTML += '<div class="card"><div class="card-body">' +
                '<h2>' + result.raumname + '</h2>' +
                '<p><strong>Veranstaltungstyp:</strong> ' + result.veranstaltungstyp + '</p>' +
                '<p><strong>Anzahl Gäste:</strong> ' + result.anzahlgaeste + '</p>' +
                // Füge hier weitere Informationen hinzu
                '</div></div>';
        });
    }
}


