<?php
// Set the header to allow cross-origin requests (if necessary)
header('Content-Type: application/json');

// Database connection details
include('db.php');

// Create a connection to the database
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}

// Query to get all historical inventory records
$sql = "SELECT * FROM inventory ORDER BY id DESC";  // Make sure to change 'inventory' if your table is named differently

// Execute the query
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    $history = [];
    
    // Fetch all rows and store them in an array
    while ($row = $result->fetch_assoc()) {
        $history[] = $row;
    }

    // Close the database connection
    $conn->close();

    // Return the history in JSON format
    echo json_encode($history);
} else {
    // Return an empty array if no history found
    echo json_encode([]);
}
?>
    