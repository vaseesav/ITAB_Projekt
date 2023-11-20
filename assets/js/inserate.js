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