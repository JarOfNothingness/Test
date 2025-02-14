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

// Read the POST data (JSON)
$data = json_decode(file_get_contents('php://input'), true);

// Check if inventory data exists
if (isset($data['inventoryData']) && is_array($data['inventoryData'])) {
    // Prepare the SQL query
    $stmt = $conn->prepare("INSERT INTO inventory (stock, unit, description, quantity, unit_cost, total_cost) VALUES (?, ?, ?, ?, ?, ?)");

    // Loop through each row and insert into the database
    foreach ($data['inventoryData'] as $row) {
        // Extract values from the row
        $stock = $row[0] ?? '';
        $unit = $row[1] ?? '';
        $description = $row[2] ?? '';
        $quantity = $row[3] ?? 0;
        $unitCost = $row[4] ?? 0;
        $totalCost = $row[5] ?? 0;

        // Bind the parameters and execute the query
        $stmt->bind_param('ssssdd', $stock, $unit, $description, $quantity, $unitCost, $totalCost);
        $stmt->execute();
    }

    // Close the prepared statement
    $stmt->close();

    // Close the database connection
    $conn->close();

    // Send success response
    echo json_encode(['message' => 'Data saved successfully']);
} else {
    // Send error response if no data is provided
    echo json_encode(['error' => 'Invalid data received']);
}
?>
