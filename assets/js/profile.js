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
        var formData = new FormData();
        formData.append('profilePicture', document.getElementById('profilePictureInput').files[0]);

        // Preloader anzeigen
        showPreloader();

        // Dateityp überprüfen
        var contentType = formData.get('profilePicture').type;
        if (!/image\/(jpeg|png|gif)/i.test(contentType)) {
            hidePreloader();
            // Fehlermeldung im Textfeld mit der Klasse "error_text" anzeigen
            var errorText = document.querySelector('.error_text');
            errorText.innerHTML = 'Nur Bilddateien (JPEG, PNG, GIF) sind zulässig.';
            return;
        }

        // Dateigröße überprüfen
        var fileSize = formData.get('profilePicture').size;
        if (fileSize > 3000000) {
            hidePreloader();
            // Fehlermeldung im Textfeld mit der Klasse "error_text" anzeigen
            var errorText = document.querySelector('.error_text');
            errorText.innerHTML = 'Die Dateigröße darf 3 MB nicht überschreiten.';
            return;
        }

        $.ajax({
            type: 'POST',
            url: 'assets/php-backend/profilePicture.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                // Preloader ausblenden
                hidePreloader();
                // Seite neu laden, um das aktualisierte Bild anzuzeigen
                window.location.reload();
            },
            error: function(error) {
                // Preloader ausblenden
                hidePreloader();
                console.error('Fehler beim Hochladen des Bildes:', error);
            }
        });
    }



