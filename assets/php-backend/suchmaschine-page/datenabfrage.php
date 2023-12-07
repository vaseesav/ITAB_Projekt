<?php
global $conn;
require '../../database/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Eingaben validieren
    $searchText = $_POST["searchText"] ?? "";
    $bundesland = $_POST["bundesland"] ?? "";
    $stadt = $_POST["stadt"] ?? "";
    $veranstaltungstyp = $_POST["veranstaltungstyp"] ?? "";
    $sortieren = $_POST["sortieren"] ?? "preis";
    $sortierreihenfolge = $_POST["sortierreihenfolge"] ?? "aufsteigend";
    $anzahlGaeste = $_POST["anzahlGaeste"] ?? "";
    $veranstaltungsdauer = $_POST["veranstaltungsdauer"] ?? "";
    $postleitzahl = $_POST["postleitzahl"] ?? "";
    $startdatum = $_POST["startdatum"] ?? "";
    $enddatum = $_POST["enddatum"] ?? "";
    $preis = $_POST["preis"] ?? "custom";
    $minPreis = $_POST["minPreis"] !== "" ? $_POST["minPreis"] : 0;
    $maxPreis = $_POST["maxPreis"] !== "" ? $_POST["maxPreis"] : PHP_INT_MAX;

    $sqlConditions = [];
    $params = [];
    $paramTypes = "";

    // Filterbedingungen hinzufügen
    if (!empty($searchText)) {
        $sqlConditions[] = "(a.Veranstaltungstyp LIKE CONCAT('%', ?, '%') OR a.Beschreibung LIKE CONCAT('%', ?, '%'))";
        array_push($params, $searchText, $searchText);
        $paramTypes .= "ss";
    }
    // [Hinzufügen weiterer Bedingungen basierend auf anderen Filtern]

    if ($preis == "custom") {
        $sqlConditions[] = "a.preis BETWEEN ? AND ?";
        array_push($params, $minPreis, $maxPreis);
        $paramTypes .= "dd";
    }

    // SQL-Abfrage zusammenstellen
    $sql = "SELECT * FROM anzeige AS a JOIN buchungszeitraum AS b ON a.AnzeigenID = b.AnzeigenID";
    if (!empty($sqlConditions)) {
        $sql .= " WHERE " . implode(" AND ", $sqlConditions);
    }
    $sql .= " ORDER BY a.$sortieren " . ($sortierreihenfolge === "absteigend" ? "DESC" : "ASC");

    // SQL-Abfrage vorbereiten und ausführen
    $stmt = $conn->prepare($sql);
    if (!empty($paramTypes)) {
        $stmt->bind_param($paramTypes, ...$params);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    // Ergebnisse verarbeiten und ausgeben
    $resultArray = [];
                  

    header('Content-Type: application/json');
    echo json_encode($resultArray);
    

    $stmt->close();
} else {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Ungültige Anfrage"]);
}

$conn->close();
?>