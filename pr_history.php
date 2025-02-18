<?php
include("db.php");

// Attempt to connect to the database
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get all historical inventory records, including the `date_created` field
$sql = "SELECT * FROM inventory ORDER BY id DESC"; // Adjust if your table has a different name or structure
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Purchase Request History</title>
  <!-- Font Awesome CDN for the trash icon -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h2>Purchase Request History</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Stock/Property No.</th>
        <th>Unit</th>
        <th>Item Description</th>
        <th>Quantity</th>
        <th>Unit Cost</th>
        <th>Total Cost</th>
        <th>Requested By</th>
        <th>Approved By</th>
        <th>Date Created</th>
        <th>Action</th> <!-- Action column for the trash icon -->
      </tr>
    </thead>
    <tbody>
      <?php
      if ($result->num_rows > 0) {
        // Loop through each row and output the data
        while ($row = $result->fetch_assoc()) {
          $id = $row['id'];  // Assuming 'id' is the unique identifier
          echo "<tr>
                  <td>" . htmlspecialchars($row['stock']) . "</td>
                  <td>" . htmlspecialchars($row['unit']) . "</td>
                  <td>" . htmlspecialchars($row['description']) . "</td>
                  <td>" . htmlspecialchars($row['quantity']) . "</td>
                  <td>" . htmlspecialchars($row['unit_cost']) . "</td>
                  <td>" . htmlspecialchars($row['total_cost']) . "</td>
                  <td>" . htmlspecialchars($row['requested_by']) . "</td>
                  <td>" . htmlspecialchars($row['approved_by']) . "</td>
                  <td>" . htmlspecialchars($row['date']) . "</td>
                  <td><button class='btn btn-danger' onclick='deleteRecord($id)'><i class='fas fa-trash'></i></button></td> <!-- Trash icon -->
                </tr>";
        }
      } else {
        // If no records are found
        echo "<tr><td colspan='8' class='text-center'>No records found</td></tr>";
      }

      // Close the database connection
      $conn->close();
      ?>
    </tbody>
  </table>
  <a href="purchase_request.php">
    <button class="btn btn-dark">Back to Purchase Request</button>
  </a>
</div>

<script>
// Function to confirm and delete the record
function deleteRecord(id) {
  // Confirm before deleting
  if (confirm("Are you sure you want to delete this record?")) {
    // If confirmed, redirect to the delete script with the record ID
    window.location.href = "delete_inventory.php?id=" + id;
  }
}
</script>

</body>
</html>
