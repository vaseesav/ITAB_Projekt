const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('box');

/**
 * Switching between registration and login
 */
signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});


/**
 * waiting animation
 */
function showPreloader() {
	document.getElementById('preloader').style.display = 'block';
}

function hidePreloader() {
	document.getElementById('preloader').style.display = 'none';
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

		showPreloader(); // Preloader anzeigen

		// AJAX-Anfrage, wenn die Validierung erfolgreich ist
		$.ajax({
			type: "POST",
			url: "../ITAB_Projekt/assets/php-backend/login-page/register_prg.php",
			data: $(this).serialize(),
			success: function(response) {
				hidePreloader();
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
				hidePreloader();
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
	var re = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d\S]{8,}$/;
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

		showPreloader(); // Preloader anzeigen

		$.ajax({
			type: "POST",
			url: "../ITAB_Projekt/assets/php-backend/login-page/login_prg.php",
			data: { login_email: email, login_password: password },
			dataType: "json",
			success: function(response) {
				hidePreloader();
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
				hidePreloader();
				console.error("Ein Fehler ist aufgetreten: " + error);
			}
		});

	});
});

// showPassword.js
document.addEventListener('DOMContentLoaded', function() {
	var showPasswordButton = document.getElementById('showPassword');

	showPasswordButton.addEventListener('click', function() {
		var passwordInput = document.getElementById('password');

		if (passwordInput.type === 'password') {
			passwordInput.type = 'text';
		} else {
			passwordInput.type = 'password';
		}
	});
});




