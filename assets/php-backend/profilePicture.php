<?php
$userId = $_SESSION['userId'];
$targetDir = "../../userdata/$userId/";
$profilePicturePath = $targetDir . "pb.jpg"; // Festlegen des Dateinamens als pb.jpg

// Erstellen Sie das Verzeichnis, wenn es nicht existiert
if (!file_exists("../final/userdata/$userId")) {
    mkdir("../final/userdata/$userId", 7777, true);
}

if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] == 0) {
    $imageFileType = strtolower(pathinfo($_FILES["profilePicture"]["name"], PATHINFO_EXTENSION));

    // zusätzliche Überprüfungen hinzufügen (Dateigröße, Dateityp usw.)

    echo "UserID: $userId<br>";
    if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], "../../userdata/$userId/pb.jpg")) {
        echo "UserID: $userId<br>";
        // TODO: Pfad in der Datenbank aktualisieren

        echo "Bild erfolgreich hochgeladen";
    } else {
        echo "Es gab einen Fehler beim Hochladen Ihres Bildes.";
    }
} else {
    echo "Keine gültige Datei ausgewählt oder ein anderer Fehler ist aufgetreten.";
}

// Überprüfen, ob ein Profilbild vorhanden ist, sonst Platzhalter verwenden
if (file_exists("../final/userdata/$userId/pb.jpg")) {
    $imageToShow = "../final/userdata/$userId/pb.jpg";
} else {
    $imageToShow = 'assets/images/pb-placeholder.jpg'; // Platzhalterbild
}
?>
<img src="<?php echo htmlspecialchars($imageToShow); ?>" alt="Profilbild" id="profileImage">