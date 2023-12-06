<?php
// Include the database connection file
include 'assets/database/connection.php';

// Write SQL query
$query = "SELECT * FROM anzeige ORDER BY anzeigenID DESC LIMIT 1";

// Execute the query
$queryResult = mysqli_query($conn, $query);

// Check if the query returned a result
if (mysqli_num_rows($queryResult) > 0) {
    // Fetch the first row from the result
    $dataRow = mysqli_fetch_assoc($queryResult);

    // Output the AnzeigenID
    echo $dataRow['AnzeigenID'];
} else {
    echo "No results found";
}

// Close the database connection
mysqli_close($conn);
?>