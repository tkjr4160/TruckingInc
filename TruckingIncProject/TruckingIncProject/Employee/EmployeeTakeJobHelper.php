<?php
session_start();
require ('CheckSignedIn.php');
require ('CheckTruckDriver.php');
$CheckPositionQuery = "Select position From Employee Where WebsiteUsername = '$_SESSION[EmployeeUsername]'";
$CheckPositionExecution = @mysqli_query($dbc, $CheckPositionQuery);
$fetchPositionCheck = mysqli_fetch_array($CheckPositionExecution);

$CheckPermissionsQuery = "Select permissionsType From Employee Where WebsiteUsername = '$_SESSION[EmployeeUsername]'";
$CheckPermissionsExecution = @mysqli_query($dbc, $CheckPermissionsQuery);
$fetchPermissionsCheck = mysqli_fetch_array($CheckPermissionsExecution);



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
$mileageUsed = trim(htmlentities(mysqli_real_escape_string($dbc, $_POST['MileageUsed'])));
$maintenanceCosts = trim(htmlentities(mysqli_real_escape_string($dbc, $_POST['TruckMaintenanceCosts'])));
$fuelCosts = trim(htmlentities(mysqli_real_escape_string($dbc, $_POST['FuelCosts'])));
$shipmentID2 = trim(htmlentities(mysqli_real_escape_string($dbc, $_POST['ShipmentID'])));
$transactionID2 = trim(htmlentities(mysqli_real_escape_string($dbc, $_POST['TransactionID'])));


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
          header('Location: TakeJobConfirmation.php');

          // Update transaction status in Transact table
          $updateTransactionQuery = 'UPDATE Transact SET transactionStatus = "A" WHERE transactionID = ' . $transactionID . ';';
          $updateTransactionExecute = @mysqli_query($dbc, $updateTransactionQuery);
        }
        else {
          header('Location: TakeJobError.php');
        }
      }
    }
  }

  // Update accepted shipments
  if ($_POST['UpdateShipmentButton'] == 'UpdateShipment')
  {


      // Update shipment
      $updateShipmentQuery = 'UPDATE Shipment SET mileageUsed = ' . $mileageUsed . ', truckMaintenanceCosts = ' . $maintenanceCosts . ', fuelCosts = ' . $fuelCosts . ' WHERE shipmentID = ' . $shipmentID2 . '';
      $updateShipmentExecute = @mysqli_query($dbc, $updateShipmentQuery);

      if ($updateShipmentExecute) {
        $updateTransactionQuery2 = 'UPDATE Transact SET transactionStatus = "C" WHERE transactionID = ' . $transactionID2 . '';
        $updateTransactionExecute2 = @mysqli_query($dbc, $updateTransactionQuery2);
        header('Location: TakeJobConfirmation.php');
      }
      else {
        header ('Location TakeJobError.php');
      }
  }

  if ($_POST['EmployeeSignOutButton'] == 'EmployeeSignOut')
  {
    $_SESSION = [];
    header ('Location: ../TruckingIncHome.php');
  }
}
