<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$userId = $_SESSION['userId'];
$targetDir = "../../userdata/$userId/";
$profilePicturePath = $targetDir . "pb.jpg"; // Festlegen des Dateinamens als pb.jpg

// Erstellen Sie das Verzeichnis, wenn es nicht existiert
if (!file_exists("../final/userdata/$userId/")) {
    mkdir("../final/userdata/$userId/", 0777, false);
}

if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] == 0) {
    $imageFileType = strtolower(pathinfo($_FILES["profilePicture"]["name"], PATHINFO_EXTENSION));

    // zusätzliche Überprüfungen hinzufügen (Dateigröße, Dateityp usw.)

    if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], "../../../userdata/$userId/pb.jpg")) {
        // TODO: Pfad in der Datenbank aktualisieren

        // echo "Bild erfolgreich hochgeladen";
    } else {
       // echo "Es gab einen Fehler beim Hochladen Ihres Bildes.";
    }
} else {
    // echo "Keine gültige Datei ausgewählt oder ein anderer Fehler ist aufgetreten.";
}

// Überprüfen, ob ein Profilbild vorhanden ist, sonst Platzhalter verwenden
if (file_exists("../final/userdata/$userId/pb.jpg")) {
    // Hinzufügen eines Zeitstempels als Query-Parameter
    $imageToShow = "../final/userdata/$userId/pb.jpg?t=" . time();
} else {
    $imageToShow = 'assets/images/pb-placeholder.jpg';
}

?>
<img src="<?php echo htmlspecialchars($imageToShow); ?>" alt="Profilbild" id="profileImage">