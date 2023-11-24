<?php
global $conn;
require '../../database/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchText = isset($_POST["searchText"]) ? htmlspecialchars($_POST["searchText"]) : "";
    $bundesland = isset($_POST["bundesland"]) ? htmlspecialchars($_POST["bundesland"]) : "";
    $stadt = isset($_POST["stadt"]) ? htmlspecialchars($_POST["stadt"]) : "";
    $veranstaltungstyp = isset($_POST["veranstaltungstyp"]) ? htmlspecialchars($_POST["veranstaltungstyp"]) : "";
    $sortieren = isset($_POST["sortieren"]) ? htmlspecialchars($_POST["sortieren"]) : "";
    $sortierreihenfolge = isset($_POST["sortierreihenfolge"]) ? htmlspecialchars($_POST["sortierreihenfolge"]) : "";
    $anzahlGaeste = isset($_POST["anzahlGaeste"]) ? htmlspecialchars($_POST["anzahlGaeste"]) : "";
    $veranstaltungsdauer = isset($_POST["veranstaltungsdauer"]) ? htmlspecialchars($_POST["veranstaltungsdauer"]) : "";
    $postleitzahl = isset($_POST["postleitzahl"]) ? htmlspecialchars($_POST["postleitzahl"]) : "";
    $startdatum = isset($_POST["startdatum"]) ? htmlspecialchars($_POST["startdatum"]) : "";
    $enddatum = isset($_POST["enddatum"]) ? htmlspecialchars($_POST["enddatum"]) : "";

    if(isset($_POST["preis"]) && $_POST["preis"] != "custom") {
        $preisBereich = explode("-", $_POST["preis"]);
        $minPreis = $preisBereich[0];
        $maxPreis = $preisBereich[1];
    } else {
        $minPreis = isset($_POST["minPreis"]) ? htmlspecialchars($_POST["minPreis"]) : 0;
        $maxPreis = isset($_POST["maxPreis"]) ? htmlspecialchars($_POST["maxPreis"]) : PHP_INT_MAX;
    }

    $sqlConditions = [];
    $params = [];
    $paramTypes = "";

    if (!empty($searchText)) {
        $sqlConditions[] = "(a.Veranstaltungstyp LIKE CONCAT('%', ?, '%') OR a.Beschreibung LIKE CONCAT('%', ?, '%'))";
        array_push($params, $searchText, $searchText);
        $paramTypes .= "ss";
    }

    // Bundesland Filter
    if (!empty($bundesland)) {
        $sqlConditions[] = "a.Bundesland = ?";
        array_push($params, $bundesland);
        $paramTypes .= "s";
    }

    // Preis-Filter
    if (isset($minPreis) && isset($maxPreis)) {
        $sqlConditions[] = "a.preis BETWEEN ? AND ?";
        array_push($params, $minPreis, $maxPreis);
        $paramTypes .= "ii";
    }

    // TODO: weitere Filter

    $sql = "SELECT * FROM anzeige AS a JOIN buchungszeitraum AS b ON a.AnzeigenID = b.AnzeigenID";
    if (count($sqlConditions) > 0) {
        $sql .= " WHERE " . join(" AND ", $sqlConditions);
    }
    $sql .= " ORDER BY a.$sortieren " . ($sortierreihenfolge == "absteigend" ? "DESC" : "ASC");

    $stmt = $conn->prepare($sql);
    if (count($params) > 0) {
        $stmt->bind_param($paramTypes, ...$params);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $resultArray = [];
    while ($row = $result->fetch_assoc()) {
        $resultArray[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($resultArray);

    $stmt->close();
} else {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Ungültige Anfrage"]);
}

$conn->close();
?>