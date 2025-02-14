<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Request Table</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
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
<body>
    <div class="purchase-request">
        <table>
            <!-- Top row for extra data -->
          
            <!-- Row with header labels -->
            <tr>
                <td colspan="6" class="label"><h2>PURCHASE REQUEST </h2><br> Entity Name:  PHILIPPINE FIBER INDUSTRY DEVELOPMENT AUTHORITY REGION VII <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Fund Cluster:</strong></td>
                
            </tr>
            <tr>
                <td colspan="2" class="label">Office/Section:</td>
                <td colspan="2" class="label">PR No.: <br>Responsibility Center Code:</td>
                <td colspan="4" class="label">Date:</td>
            </tr>
            
            <!-- Main table with headers -->
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
            <tbody style="height: 60px;">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
            <!-- Bottom row for extra data -->
            <tr>
                <td colspan="6" class="bottom-row">Purpose:</td>
            </tr>
            <tr>
          <td colspan="2" class="text-center"><strong></strong></td>
          <td colspan="2" class="text-center"><strong>Requested by:</strong></td>
          <td colspan="2" class="text-center"><strong>Approved by:</strong></td>
        </tr>
        <tr>
          <td colspan="2" class="text-center"><strong>Signature</strong></td>
          <td colspan="2" class="text-center"><strong></strong></td>
          <td colspan="2" class="text-center"><strong></strong></td>
        </tr>
        <tr>
          <td colspan="2" class="text-start"><strong>Printed Name</strong></td>
          <td colspan="2" class="text-center"><strong>JOSE DARY C. LOCSIN</strong></td>
          <td colspan="2" class="text-center"><strong>JOSEPH S. SALAS</strong></td>
        </tr>
        <tr>
          <td colspan="2" class="text-start"><strong>Designation</strong></td>
          <td colspan="2" class="text-center">TAU Head</td>
          <td colspan="2" class="text-center">Officer-in-Charge</td>
        </tr>
        </table>
    </div>
</body>
</html>
