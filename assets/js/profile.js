/**
 * waiting animation
 */
function showPreloader() {
    document.getElementById('preloader').style.display = 'block';
}

function hidePreloader() {
    document.getElementById('preloader').style.display = 'none';
}

function logout() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "logout.php", true);
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            window.location.href = 'index.php';
        }
    }
    xhr.send();
}

function openModal() {
    document.getElementById("passwordModal").style.display = "block";
}

function closeModal() {
    document.getElementById("passwordModal").style.display = "none";
}

// Schließen des Modals, wenn außerhalb des Modals geklickt wird
window.onclick = function(event) {
    if (event.target == document.getElementById("passwordModal")) {
        closeModal();
    }
}

$(document).ready(function() {
    $("#changePasswordForm").submit(function(event) {
        event.preventDefault();
        console.log("Formular wird abgeschickt"); // Zum Testen
        showPreloader(); // Preloader anzeigen

        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "../final/change_password.php", // Pfad zu Ihrer PHP-Datei
            data: formData,
            success: function(response) {
                hidePreloader(); // Preloader ausblenden
                $("#passwordChangeMessage").html(response);
            },
            error: function() {
                hidePreloader(); // Preloader ausblenden
                $("#passwordChangeMessage").html("Ein Fehler ist aufgetreten.");
            }
        });
    });
});
