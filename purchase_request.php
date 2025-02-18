<?php
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory Table</title>
  <link rel="stylesheet" href="index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="purchase-request">
  <h2>PURCHASE REQUEST</h2>
  <table>
    <tr>
      <td colspan="6" class="label">Entity Name: PHILIPPINE FIBER INDUSTRY DEVELOPMENT AUTHORITY REGION VII</td>
    </tr>
    <tr>
      <td colspan="1" class="label">Office/Section:</td>
      <td colspan="3" class="label">PR No.: <br>Responsibility Center Code:</td>
      <td contenteditable="true" colspan="3" class="label">Date:</td>
    </tr>

    <!-- Inventory Table -->
    <tbody>
      <tr>
        <th>Stock/Property No.</th>
        <th>Unit</th>
        <th>Item Description</th>
        <th>Quantity</th>
        <th>Unit Cost</th>
        <th>Total Cost</th>
      </tr>
    </tbody>
    <tbody id="table-body">
      <tr>
        
        <td contenteditable="true"  style="height: 500px; vertical-align: top;"></td>
        <td contenteditable="true" style="height: 500px; vertical-align: top;"></td>
        <td contenteditable="true" style="height: 500px; vertical-align: top;"></td>
        <td contenteditable="true" style="height: 500px; vertical-align: top;" oninput="calculateTotalCost(this)"></td> <!-- Quantity cell -->
        <td contenteditable="true" style="height: 500px; vertical-align: top;" oninput="calculateTotalCost(this)"></td> <!-- Unit Cost cell -->
        <td contenteditable="true" style="height: 500px; vertical-align: top;"></td> <!-- Total Cost will be automatically calculated -->
      </tr>
    </tbody>

    <tr>
      <td colspan="6" class="text-center"><strong></strong></td>
    </tr>

    <!-- Footer form, unchanged -->
    <tr>
      <td colspan="6" class="bottom-row">Purpose:</td>
    </tr>
    <tr>
      <td colspan="2" class="text-center"><strong></strong></td>
      <td colspan="2" class="text-center"><strong>Requested by:</strong></td>
      <td colspan="2" class="text-center"><strong>Approved by:</strong></td>
    </tr>
    <tr>
      <td colspan="2" class="text-start"><strong>Signature</strong></td>
      <td colspan="2" class="text-center"><strong></strong></td>
      <td colspan="2" class="text-center"><strong></strong></td>
    </tr>
    <tr>
    <td colspan="2" class="text-start"><strong>Printed Name</strong></td>
    <td colspan="2" class="text-center" contenteditable="true" id="requestedBy"><strong>JOSE DARY C. LOCSIN</strong></td> <!-- Requested By -->
    <td colspan="2" class="text-center" contenteditable="true" id="approvedBy"><strong>JOSEPH S. SALAS</strong></td> <!-- Approved By -->
</tr>

    <tr>
      <td colspan="2" class="text-start"><strong>Designation</strong></td>
      <td colspan="2" class="text-center">TAU Head</td>
      <td colspan="2" class="text-center">Officer-in-Charge</td>
    </tr>
  </table>
</div>

<!-- Buttons -->
<a href="dashboard.php">
  <button class="btn btn-dark mt-4 no-print">Dashboard</button>
</a>
<button class="btn btn-primary mt-4 no-print" id="add-row-btn">Add Row</button>
<button class="btn btn-danger mt-4 no-print" id="delete-row-btn">Delete Last Row</button>
<button class="btn btn-success mt-4 no-print" id="save-btn">Save Data</button>
<a href="pr_history.php">
  <button class="btn btn-warning mt-4 no-print">View History</button>
</a>
<button class="btn btn-secondary mt-4 no-print" id="print-btn">Print</button>

<!-- Bootstrap 5 JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>
  document.getElementById('add-row-btn').addEventListener('click', function() {
    var tableBody = document.getElementById('table-body');
    var newRow = document.createElement('tr');
    for (var i = 0; i < 6; i++) {
      var newCell = document.createElement('td');
      newCell.setAttribute('contenteditable', 'true');
      if (i === 3 || i === 4) {
        newCell.setAttribute('oninput', 'calculateTotalCost(this)');
      }
      newRow.appendChild(newCell);
    }
    tableBody.appendChild(newRow);
  });

  document.getElementById('delete-row-btn').addEventListener('click', function() {
    var tableBody = document.getElementById('table-body');
    var rows = tableBody.querySelectorAll('tr');
    if (rows.length > 0) {
      tableBody.removeChild(rows[rows.length - 1]);
    }
  });

  function calculateTotalCost(cell) {
    var row = cell.closest('tr');
    var quantityCell = row.querySelectorAll('td')[3];
    var unitCostCell = row.querySelectorAll('td')[4];
    var totalCostCell = row.querySelectorAll('td')[5];

    var quantity = parseFloat(quantityCell.textContent.trim());
    var unitCost = parseFloat(unitCostCell.textContent.trim());

    if (!isNaN(quantity) && !isNaN(unitCost)) {
      var totalCost = quantity * unitCost;
      totalCostCell.textContent = totalCost.toFixed(2);
    } else {
      totalCostCell.textContent = '';
    }
  }

  document.getElementById('save-btn').addEventListener('click', function() {
  var tableRows = document.querySelectorAll('#table-body tr');
  var data = [];

  tableRows.forEach(function(row) {
    var rowData = [];

    // Collect data for each cell in the row
    row.querySelectorAll('td').forEach(function(cell, index) {
      rowData.push(cell.textContent.trim());
    });

    // Capture Requested By and Approved By values
    var requestedBy = document.getElementById('requestedBy').textContent.trim();
    var approvedBy = document.getElementById('approvedBy').textContent.trim();

    // Add Requested By and Approved By to the row data
    rowData.push(requestedBy, approvedBy);

    // Append the row data to the main data array
    data.push(rowData);
  });

  // Send the collected data to the backend
  fetch('save_inventory.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ inventoryData: data }),
  })
  .then(response => response.json())
  .then(data => {
    alert('Data saved successfully');
  })
  .catch((error) => {
    alert('Error saving data: ' + error);
  });
});


  document.getElementById('print-btn').addEventListener('click', function() {
    window.print();
  });
</script>

</body>
</html>
