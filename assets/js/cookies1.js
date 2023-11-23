document.addEventListener("DOMContentLoaded", function () {
    // Sucht das Cookie-Popup-Element und die Schaltflächen
    let cookiePopup = document.getElementById("cookie-popup");
    let acceptButton = document.getElementById("accept-button");
    let changeSettingsButton = document.getElementById("change-settings-button");

    // Überprüft, ob Nutzer bereits Cookies akzeptiert hat
    let cookiesAccepted = localStorage.getItem("cookiesAccepted");

    // Überprüft, ob Nutzer bereits seine Cookie-Einstellungen geändert hat
    let cookieSettingsChanged = localStorage.getItem("cookieSettingsChanged");

    // Funktion zum Anzeigen des Cookie-Popups, wenn Benutzer noch keine Cookies akzeptiert hat
    function showCookiePopup() {
        if (true) { 
            cookiePopup.style.display = "block";
        }
    }
    

    // Funktion zum Akzeptieren von Cookies und Ausblenden des Popups
    function acceptCookies() {
        // Setzt den Status auf akzeptiert und speichert dies lokal
        localStorage.setItem("cookiesAccepted", true);
        localStorage.setItem("cookieSettingsChanged", false);

        // Versteckt das Popup
        cookiePopup.style.display = "none";
    }

    // Funktion zum Anzeigen des Cookie-Einstellungen-Popups
    function showCookieSettings() {
        // Hier könntet ein Modalfenster oder Dialog verwendet werden, um die Cookie-Einstellungen anzuzeigen
        let userResponse = window.confirm("Möchten Sie Ihre Cookie-Einstellungen ändern?");

        if (userResponse) {
            // Benutzer hat "OK" geklickt, zeige ein Modalfenster oder ein Formular für die Cookie-Einstellungen
            showSettingsModal();
        } else {
            // Benutzer hat "Abbrechen" geklickt
            alert("Cookie-Einstellungen wurden nicht geändert.");
        }
    }

    // Funktion zum Anzeigen des Modals oder Formulars für die Cookie-Einstellungen
    function showSettingsModal() {
        // Hier könnte  die Logik für  Anzeige eines Modals oder Formulars implementiert werden
        // Zum Beispiel kann man vorhandenes Modal-Framework wie Bootstrap Modal verwenden

        // Markiert, dass Benutzer die Cookie-Einstellungen geändert hat
        localStorage.setItem("cookieSettingsChanged", true);
    }

    // Event Listener für Laden der Seite
    showCookiePopup();

    // Event Listener für Akzeptieren-Button
    acceptButton.addEventListener("click", acceptCookies);

    // Event Listener für Cookie-Einstellungen ändern
    changeSettingsButton.addEventListener("click", showCookieSettings);
});
