<?php
include ('../mysqli_connect.php');
session_start();

require ('CheckSignedIn.php');
require ('CheckTruckDriver.php');

// *********************** Data for Create Order ***********************
// Retrieve shipments with no employee assigned
$shipmentsQuery = 'SELECT Shipment.*, Transact.transactionID, Transact.productID, Transact.numberOfUnits FROM Shipment LEFT JOIN Transact ON (Shipment.transactionID = Transact.transactionID) WHERE employeeID IS NULL';
$shipmentsExecute = @mysqli_query($dbc, $shipmentsQuery);
$row1 = mysqli_fetch_array($shipmentsExecute);
$transactionID = $row1['transactionID'];

// Retrieve logged-in employee's ID
$username = $_SESSION['EmployeeUsername'];
$employeeIDQuery = 'SELECT employeeID FROM Employee WHERE Employee.WebsiteUsername = "' . $username . '";';
$employeeIDExecute = @mysqli_query($dbc, $employeeIDQuery);
$row2 = mysqli_fetch_array($employeeIDExecute);
$employeeID = $row2['employeeID'];

// Retrieve shipments where currently logged-in employee is assigned
$currentJobsQuery = 'SELECT Shipment.*, Transact.transactionID, Transact.productID, Transact.numberOfUnits FROM Shipment LEFT JOIN Transact ON (Shipment.transactionID = Transact.transactionID) WHERE employeeID = ' . $employeeID . '';
$currentJobsExecute = @mysqli_query($dbc, $currentJobsQuery);

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  while ($row = mysqli_fetch_array($shipmentsExecute)) {
    
    if ($_POST['AcceptShipmentButton'] == $row['shipmentID']) {
      // Assign currently logged in employee to the selected shipment
      $shipmentID = $row['shipmentID'];
      $assignQuery = 'UPDATE Shipment SET employeeID = ' . $employeeID . ' WHERE Shipment.shipmentID = ' . $shipmentID . ';';
      $assignExecute = @mysqli_query($dbc, $assignQuery);

      if ($assignExecute) {
        header('Location: EmployeeTakeJob.php');

        // Update transaction status in Transact table
        $updateTransactionQuery = 'UPDATE Transact SET transactionStatus = "A" WHERE transactionID = ' . $transactionID . ';';
        $updateTransactionExecute = @mysqli_query($dbc, $updateTransactionQuery);
      }
      else {
        echo 'SQL ERROR: ' . mysqli_error($dbc);
      }
    }
    else {
      echo '<h1>System Error</h1>';
      echo '<form action="EmployeeTakeJob.php">';
      echo '<p>Something went wrong...</p>';
      echo '<button>Ok</button>';
      echo '</form>';
    }

    if ($_POST['EmployeeSignOutButton'] == 'EmployeeSignOut')
    {
      $_SESSION = [];
      header ('Location: EmployeeSignIn.php');
    }
  }
}
