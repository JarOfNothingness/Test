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
// Backend PHP code to process the incoming data
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['inventoryData']) && is_array($data['inventoryData'])) {
    $stmt = $conn->prepare("INSERT INTO inventory 
                            (stock, unit, description, quantity, unit_cost, total_cost, requested_by, approved_by) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    foreach ($data['inventoryData'] as $row) {
        $stock = $row[0] ?? '';
        $unit = $row[1] ?? '';
        $description = $row[2] ?? '';
        $quantity = $row[3] ?? 0;
        $unitCost = $row[4] ?? 0;
        $totalCost = $row[5] ?? 0;
        $requestedBy = $row[6] ?? '';  // Captured Requested By
        $approvedBy = $row[7] ?? '';   // Captured Approved By

        if (strpos($description, ',') !== false) {
            $description = implode(', ', array_map('trim', explode(',', $description)));
        }

        $stmt->bind_param('ssssddss', $stock, $unit, $description, $quantity, $unitCost, $totalCost, $requestedBy, $approvedBy);
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
