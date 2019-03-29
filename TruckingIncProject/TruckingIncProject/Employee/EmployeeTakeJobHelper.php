<?php
include ('../mysqli_connect.php');
session_start();

require ('CheckSignedIn.php');
require ('CheckTruckDriver.php');

// Retrieve shipments with no employee assigned
$shipmentsQuery = 'SELECT Shipment.*, Transact.transactionID, Transact.productID, Transact.numberOfUnits FROM Shipment LEFT JOIN Transact ON (Shipment.transactionID = Transact.transactionID) WHERE employeeID IS NULL';
$shipmentsExecute = @mysqli_query($dbc, $shipmentsQuery);
$shipmentsArray = array();
while ($row = mysqli_fetch_array($shipmentsExecute)) {
  $shipmentsArray[] = $row;
}

// Retrieve logged-in employee's ID
$username = $_SESSION['EmployeeUsername'];
$employeeIDQuery = 'SELECT employeeID FROM Employee WHERE Employee.WebsiteUsername = "' . $username . '";';
$employeeIDExecute = @mysqli_query($dbc, $employeeIDQuery);
$row = mysqli_fetch_array($employeeIDExecute);
$employeeID = $row['employeeID'];

// Retrieve shipments where currently logged-in employee is assigned (but not completed)
$currentJobsQuery = 'SELECT Shipment.*, Transact.transactionID, Transact.productID, Transact.numberOfUnits 
FROM Shipment LEFT JOIN Transact ON (Shipment.transactionID = Transact.transactionID) 
WHERE Shipment.employeeID = ' . $employeeID . ' AND Transact.transactionStatus = "A"';
$currentJobsExecute = @mysqli_query($dbc, $currentJobsQuery);
$currentJobsArray = array();
while ($row = mysqli_fetch_array($currentJobsExecute)) {
  $currentJobsArray[] = $row;
}

// Retrieve shipments that currently logged-in employee has completed
$completedJobsQuery = 'SELECT Shipment.*, Transact.transactionID, Transact.productID, Transact.numberOfUnits 
FROM Shipment LEFT JOIN Transact ON (Shipment.transactionID = Transact.transactionID) 
WHERE Shipment.employeeID = ' . $employeeID . ' AND Transact.transactionStatus = "C"';
$completedJobsExecute = @mysqli_query($dbc, $completedJobsQuery);
$completedJobsArray = array();
while ($row = mysqli_fetch_array($completedJobsExecute)) {
  $completedJobsArray[] = $row;
}

// Retrieve data from update shipment form
$mileageUsed = $_POST['MileageUsed']; $mileageUsed = htmlentities($mileageUsed);
$maintenanceCosts = $_POST['TruckMaintenanceCosts']; $maintenanceCosts = htmlentities($maintenanceCosts);
$fuelCosts = $_POST['FuelCosts']; $fuelCosts = htmlentities($fuelCosts);
$shipmentID2 = $_POST['ShipmentID']; $shipmentID2 = htmlentities($shipmentID2);
$transactionID2 = $_POST['TransactionID']; $transactionID2 = htmlentities($transactionID2);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Accept shipments
  if ($_POST['AcceptShipmentButton']) {
    foreach ($shipmentsArray as $row) {
      // Accept shipment
      if ($_POST['AcceptShipmentButton'] == $row['shipmentID']) {
        // Assign currently logged in employee to the selected shipment
        $shipmentID = $row['shipmentID'];
        $transactionID = $row['transactionID'];
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
    }
  }

  // Update accepted shipments
  if ($_POST['UpdateShipmentButton'] == 'UpdateShipment') {
    if (empty($mileageUsed) || empty($fuelCosts))
    {
      echo '<form action="EmployeeHome.php">';
      echo '<p>ERROR!</p>';
      echo ' - Mileage: ' . $mileageUsed;
      echo 'Maintenance: ' . $maintenanceCosts;
      echo 'Fuel: ' . $fuelCosts;
      echo '<button>Ok</button>';
      echo '</form>';
    }
    else {
      // Update shipment
      $updateShipmentQuery = 'UPDATE Shipment SET mileageUsed = ' . $mileageUsed . ', truckMaintenanceCosts = ' . $maintenanceCosts . ', fuelCosts = ' . $fuelCosts . ' WHERE shipmentID = ' . $shipmentID2 . '';
      $updateShipmentExecute = @mysqli_query($dbc, $updateShipmentQuery);

      if ($updateShipmentExecute) {
        header('Location: EmployeeTakeJob.php');
        $updateTransactionQuery2 = 'UPDATE Transact SET transactionStatus = "C" WHERE transactionID = ' . $transactionID2 . '';
        $updateTransactionExecute2 = @mysqli_query($dbc, $updateTransactionQuery2);
      }
      else {
        echo 'SQL ERROR: ' . mysqli_error($dbc);
        echo ' - shipmentID: ' . $shipmentID2;
        echo ' Mileage: ' . $mileageUsed;
        echo ' Maintenance: ' . $maintenanceCosts;
        echo ' Fuel: ' . $fuelCosts;
      }
    }    
  }
  
  if ($_POST['EmployeeSignOutButton'] == 'EmployeeSignOut')
  {
    $_SESSION = [];
    header ('Location: EmployeeSignIn.php');
  } 
}
