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


/**
 * Profile picture upload
 */
function uploadProfilePicture() {
    var input = document.getElementById('profilePictureInput');
    if (input.files && input.files[0]) {
        var formData = new FormData();
        formData.append('profilePicture', input.files[0]);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../final/assets/php-backend/profilePicture.php', true);
        xhr.onload = function () {
            if (this.status == 200) {
                console.log(this.responseText);
                // Hier können Sie weitere Aktionen durchführen, z.B. das Bild auf der Seite aktualisieren
            } else {
                // Fehlerbehandlung
                console.error('Fehler beim Hochladen des Bildes');
            }
        };
        xhr.send(formData);
    }
}

