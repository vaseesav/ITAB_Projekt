const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('box');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

function validateLoginForm() {
	var email = document.forms["login"]["email"].value;
	var password = document.forms["login"]["password"].value;

	if (email === "" || password === "") {
		alert("Bitte E-Mail und Passwort eingeben.");
		return false;
	}

	// Anmeldeinformationen sind vorhanden
	return true;
}


/**
 * Validierungsfunktion für das Registrierungs-Formular
 */
$(document).ready(function() {
	$("#register").submit(function(event) {
		event.preventDefault(); // Verhindert das Neuladen der Seite

		// Überprüfen, ob das Formular gültig ist
		if (!validateForm()) {
			return; // Beendet die Funktion, wenn die Validierung fehlschlägt
		}

		// AJAX-Anfrage, wenn die Validierung erfolgreich ist
		$.ajax({
			type: "POST",
			url: "../final/register_prg.php",
			data: $(this).serialize(),
			success: function(response) {
				$("#register-result").html(response);
				if (response.includes("erfolgreich registriert")) {
					$("#register")[0].reset(); // Setzt das Formular zurück

					// Warte 3 Sekunden, dann führe die Aktion aus
					setTimeout(function() {
						signInButton.click(); // Löst das Klick-Event auf signInButton aus
					}, 3000); // 3000 Millisekunden = 3 Sekunden
				}
			},
			error: function(xhr, status, error) {
				var errorMessage = "Ein Fehler ist aufgetreten.";
				$("#register-result").html(errorMessage);
			}
		});
	});
});

function validateForm() {
	var username = document.forms["register"]["username"].value;
	var email = document.forms["register"]["email"].value;
	var password = document.forms["register"]["password"].value;

	if (username === "" || email === "" || password === "") {
		alert("Alle Felder müssen ausgefüllt werden.");
		return false;
	}

	if (!validateEmail(email)) {
		alert("Bitte geben Sie eine gültige E-Mail-Adresse ein.");
		return false;
	}

	if (!validatePassword(password)) {
		alert("Das Passwort muss mindestens 8 Zeichen lang sein und sowohl Buchstaben als auch Zahlen enthalten.");
		return false;
	}

	return true; // Formular ist gültig
}

// Hilfsfunktion zur Überprüfung der E-Mail-Adresse
function validateEmail(email) {
	var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
	return re.test(String(email).toLowerCase());
}

// Hilfsfunktion zur Überprüfung des Passworts
function validatePassword(password) {
	var re = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/; // Mindestens 8 Zeichen, mindestens ein Buchstabe und eine Zahl
	return re.test(String(password));
}

/**
 * Validierungsfunktion für das Login-Formular
 */
$(document).ready(function() {
	$("#login-form").submit(function(event) {
		event.preventDefault();

		var email = $("input[name=login_email]").val();
		var password = $("input[name=login_password]").val();

		$.ajax({
			type: "POST",
			url: "../final/login_prg.php",
			data: { login_email: email, login_password: password },
			dataType: "json",
			success: function(response) {
				console.log(response);
				if (response.success) {
					// Anmeldung war erfolgreich
					window.location.href = 'index.php'; // Weiterleitung zu einer anderen Seite
				} else {
					// Fehlerbehandlung
					alert("Fehler: " + response.error);
				}
			},
			error: function(xhr, status, error) {
				console.error("Ein Fehler ist aufgetreten: " + error);
			}
		});

	});
});


