function showPreloader() {
  document.getElementById('preloader').style.display = 'block';
}

function hidePreloader() {
  document.getElementById('preloader').style.display = 'none';
}

$(document).ready(function () {
  $('form').on('submit', function (event) {
    event.preventDefault();
    showPreloader();

    let formData = new FormData(this);

    $.ajax({
      url: 'assets/php-backend/suchmaschine-page/datenabfrage.php',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,

      success: function (data) {
        let ergebnisseDiv = $('.result-container');
        ergebnisseDiv.empty();

        if (Array.isArray(data) && data.length > 0) {
          data.forEach((row) => {
            let resultDiv = $('<div>').addClass('result styled-result');
            resultDiv.html(`<h3 class="styled-title">${row.AnzeigenName}</h3>
                <p class="styled-type">Veranstaltungstyp: ${row.Veranstaltungstyp}</p>
                <p class="styled-description">Beschreibung: ${row.Beschreibung}</p>
                <p class="styled-price">Preis: ${row.preis}</p>`);
            ergebnisseDiv.append(resultDiv);
          });
        } else {
          ergebnisseDiv.html('<p>Keine Ergebnisse gefunden.</p>');
        }
        hidePreloader();
      },

      error: function (jqXHR, textStatus, errorThrown) {
        console.error('Fehler bei der Anfrage:', textStatus, errorThrown);
        $('.result-container').html(
          '<p>Fehler bei der Suche. Bitte versuchen Sie es später noch einmal.</p>'
        );
        hidePreloader();
      },
    });
  });
});
