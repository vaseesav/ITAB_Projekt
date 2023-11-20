const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('box');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
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

	// Formular ist gültig
	return true;
}

function validateEmail(email) {
	var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
	return re.test(String(email).toLowerCase());
}

function validatePassword(password) {
	var re = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/; // Mindestens 8 Zeichen, mindestens ein Buchstabe und eine Zahl
	return re.test(String(password));
}

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

