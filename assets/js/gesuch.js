function toggleGesuch() {
    // Holen Sie sich die Formularelemente
    let anzeigenButton = document.getElementById('anzeigenButton');
    let gesuchButton = document.getElementById('gesuchButton');

    // Verstecke oder zeige die Formulare basierend auf der Auswahl im Dropdown
    if (anzeigenButton.style.display !== 'none') {
        anzeigenButton.style.display = 'none';
        gesuchButton.style.display = 'block';
    }
    if (anzeigenButton.style.display !== 'none' && gesuchButton.style.display !== 'none') {
        gesuchButton.style.display = 'block';
    }
    

}
function toggleAnzeige() {
    // Holen Sie sich die Formularelemente
    let anzeigenButton = document.getElementById('anzeigenButton');
    let gesuchButton = document.getElementById('gesuchButton');

    // Verstecke oder zeige die Formulare basierend auf der Auswahl im Dropdown
    if (gesuchButton.style.display !== 'none') {
        gesuchButton.style.display = 'none';
        anzeigenButton.style.display = 'block';
    } 
    if (anzeigenButton.style.display !== 'none' && gesuchButton.style.display !== 'none') {
        anzeigenButton.style.display = 'block';
    }
}