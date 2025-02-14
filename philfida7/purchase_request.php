<?php
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory Table</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Media query to hide action buttons and the 'Actions' column when printing */
    @media print {
      .no-print {
        display: none !important;
      }
      .table td:last-child,
      .table th:last-child {
        display: none !important; /* Hide the 'Actions' column */
      }
      
      /* Ensure that footer content (Requested by, Approved by) is visible during printing */
      .footer-content {
        display: table-row !important;  /* Force footer content to be printed */
      }
    }

    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
}

.purchase-request {
    width: 100%;
    margin: 0 auto;
    padding: 10px;
 
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

table th, table td {
    padding: 8px;
    text-align: center;
    border: 1px solid black;
}

table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

table td {
    height: 50px;
}

table tr td:nth-child(2), table tr td:nth-child(3), table tr td:nth-child(4), table tr td:nth-child(5), table tr td:nth-child(6) {
    width: 15%;
}

.top-row {
    text-align: center;
    background-color:white;
    font-size: 16px;
    font-weight: bold;
}

.label {
    text-align: left;
    font-weight: bold;
    padding-left: 10px;
}

.content {
    text-align: left;
    padding-left: 10px;
}

.bottom-row {
    text-align: start;
    background-color:white;
    font-size: 14px;
    font-weight: bold;
}

h2 {
  text-align: center;
  margin-bottom: 20px; /* Optional: Adjust the space below the heading */
}

  </style>
</head>
<body>

<div class="purchase-request">
<table>
<tr>
                <td colspan="6" class="label"><h2>PURCHASE REQUEST </h2>Entity Name:  PHILIPPINE FIBER INDUSTRY DEVELOPMENT AUTHORITY REGION VII <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    </td>
                
            </tr>
            <tr>
                <td colspan="1" class="label">Office/Section:</td>
                <td colspan="4" class="label">PR No.: <br>Responsibility Center Code:</td>
                <td colspan="2" class="label">Date:</td>
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
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true" oninput="calculateTotalCost(this)"></td> <!-- Quantity cell -->
          <td contenteditable="true" oninput="calculateTotalCost(this)"></td> <!-- Unit Cost cell -->
          <td contenteditable="true"></td> <!-- Total Cost will be automatically calculated -->
        </tr>
      </tbody>


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
          <td colspan="2" class="text-center"><strong>JOSE DARY C. LOCSIN</strong></td>
          <td colspan="2" class="text-center"><strong>JOSEPH S. SALAS</strong></td>
        </tr>
        <tr>
        
        </tr>
  
    </table>
    </div>
    <!-- Buttons -->
    <a href="dashboard.php">
      <button class="btn btn-dark mt-4 no-print">Back</button>
    </a>
    <button class="btn btn-primary mt-4 no-print" id="add-row-btn">Add Row</button>
    <button class="btn btn-danger mt-4 no-print" id="delete-row-btn">Delete Last Row</button> <!-- New Delete Row Button -->
    <button class="btn btn-success mt-4 no-print" id="save-btn">Save Data</button>
    <button class="btn btn-secondary mt-4 no-print" id="print-btn">Print</button> <!-- Print Button -->
  </div>

  <!-- Bootstrap 5 JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

  <!-- JavaScript for Table and Calculation -->
  <script>
    // Function to add a new row to the table
    document.getElementById('add-row-btn').addEventListener('click', function() {
      var tableBody = document.getElementById('table-body');
      var newRow = document.createElement('tr');
      for (var i = 0; i < 6; i++) {
        var newCell = document.createElement('td');
        newCell.setAttribute('contenteditable', 'true');
        if (i === 3 || i === 4) { // Add event listener for Quantity and Unit Cost cells
          newCell.setAttribute('oninput', 'calculateTotalCost(this)');
        }
        newRow.appendChild(newCell);
      }

      tableBody.appendChild(newRow);
    });

    // Function to delete the last row
    document.getElementById('delete-row-btn').addEventListener('click', function() {
      var tableBody = document.getElementById('table-body');
      var rows = tableBody.querySelectorAll('tr');
      if (rows.length > 0) {
        tableBody.removeChild(rows[rows.length - 1]); // Remove the last row
      }
    });

    // Function to calculate the Total Cost based on Quantity and Unit Cost
    function calculateTotalCost(cell) {
      var row = cell.closest('tr');
      var quantityCell = row.querySelectorAll('td')[3];  // Quantity column
      var unitCostCell = row.querySelectorAll('td')[4];  // Unit Cost column
      var totalCostCell = row.querySelectorAll('td')[5];  // Total Cost column

      var quantity = parseFloat(quantityCell.textContent.trim());
      var unitCost = parseFloat(unitCostCell.textContent.trim());

      // Calculate the Total Cost if both Quantity and Unit Cost are numbers
      if (!isNaN(quantity) && !isNaN(unitCost)) {
        var totalCost = quantity * unitCost;
        totalCostCell.textContent = totalCost.toFixed(2); // Update the Total Cost field
      } else {
        totalCostCell.textContent = ''; // Clear Total Cost if input is invalid
      }
    }
    
    // Function to save the data from the table
    document.getElementById('save-btn').addEventListener('click', function() {
      var tableRows = document.querySelectorAll('#table-body tr');
      var data = [];

      tableRows.forEach(function(row) {
        var rowData = [];
        row.querySelectorAll('td').forEach(function(cell) {
          rowData.push(cell.textContent.trim());
        });
        data.push(rowData);
      });

      // Send the table data to the PHP backend
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

    // Function to print the table
    document.getElementById('print-btn').addEventListener('click', function() {
      window.print();  // Trigger the print dialog
    });
  </script>

</body>
</html>
