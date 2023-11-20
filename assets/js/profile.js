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

// Anfrage für Passwortänderung
document.getElementById("changePasswordForm").onsubmit = function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "change_password.php", true);
    xhr.onload = function() {
        document.getElementById("passwordChangeMessage").innerText = this.responseText;
    }
    xhr.send(formData);
}