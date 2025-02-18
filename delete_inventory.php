<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];  // Get the ID from the URL parameter

    // Create a connection to the database
    $conn = new mysqli($host, $user, $pass, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to delete the record
    $sql = "DELETE FROM inventory WHERE id = ?";

    // Prepare the query
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);  // Bind the ID parameter
        $stmt->execute();  // Execute the delete query

        // Check if the record was deleted
        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Record deleted successfully'); window.location.href = 'pr_history.php';</script>";
        } else {
            echo "<script>alert('Failed to delete the record'); window.location.href = 'pr_history.php';</script>";
        }

        // Close the statement and connection
        $stmt->close();
    } else {
        echo "<script>alert('Error preparing the query'); window.location.href = 'pr_history.php';</script>";
    }

    $conn->close();
} else {
    echo "<script>alert('No record ID provided'); window.location.href = 'pr_history.php';</script>";
}
?>
