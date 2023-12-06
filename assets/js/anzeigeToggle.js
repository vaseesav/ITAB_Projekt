function toggleAnzeige() {
    document.getElementById('anzeigenButton').style.display = 'block';
    document.getElementById('gesuchButton').style.display = 'none';
    document.getElementById('anzeigenInhalt').required = true;
    document.getElementById('gesuchInhalt').required = false;
}

function toggleGesuch() {
    document.getElementById('anzeigenButton').style.display = 'none';
    document.getElementById('gesuchButton').style.display = 'block';
    document.getElementById('anzeigenInhalt').required = false;
    document.getElementById('gesuchInhalt').required = true;
}