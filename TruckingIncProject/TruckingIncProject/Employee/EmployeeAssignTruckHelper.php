<?php

session_start();
require ('CheckSignedIn.php');
require ('CheckPermissionAorB.php'); // change to CheckPermissionA.php

$CheckPositionQuery = "Select position From Employee Where WebsiteUsername = '$_SESSION[EmployeeUsername]'";
$CheckPositionExecution = @mysqli_query($dbc, $CheckPositionQuery);
$fetchPositionCheck = mysqli_fetch_array($CheckPositionExecution);

$CheckPermissionsQuery = "Select permissionsType From Employee Where WebsiteUsername = '$_SESSION[EmployeeUsername]'";
$CheckPermissionsExecution = @mysqli_query($dbc, $CheckPermissionsQuery);
$fetchPermissionsCheck = mysqli_fetch_array($CheckPermissionsExecution);

// *********************** Assign Trucks ***********************
$EmployeeListQuery = "SELECT * FROM Employee WHERE position = 'Truck Driver' AND truckID IS NULL";
$EmployeeListExecution = @mysqli_query($dbc, $EmployeeListQuery);
$TruckListQuery = "SELECT * FROM Truck WHERE inUse = 'N'";
$TruckListExecution = @mysqli_query($dbc, $TruckListQuery);
$truckid = $_POST['ChangeTruck']; $truckid = htmlentities($truckid);
$employeeid = $_POST['ChangeEmployee']; $employeeid = htmlentities($employeeid);

// *********************** Unassign Trucks ***********************
$EmployeeListQuery2 = "SELECT employeeID, truckID FROM Employee WHERE position = 'Truck Driver' AND truckID IS NOT NULL";
$EmployeeListExecution2 = @mysqli_query($dbc, $EmployeeListQuery2);

// *********************** Add Trucks ***********************
$addMake = $_POST['TruckMake']; $addMake = htmlentities($addMake);
$addModel = $_POST['TruckModel']; $addModel = htmlentities($addModel);
$addColor = $_POST['TruckColor']; $addColor = htmlentities($addColor);
$addYear = $_POST['TruckYear']; $addYear = htmlentities($addYear);
$addLicenseNo = $_POST['LicenseNum']; $addLicenseNo = htmlentities($addLicenseNo);
$addPrice = $_POST['PurchasePrice']; $addPrice = htmlentities($addPrice);

// *********************** List & Remove Trucks ***********************
$TruckTableQuery = "SELECT Truck.*, Employee.employeeID FROM Truck LEFT JOIN Employee ON (Truck.truckID = Employee.truckID);";
$TruckTableExecute = @mysqli_query($dbc, $TruckTableQuery);

// Begin
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  // *********************** Assign Trucks ***********************
  if ($_POST['AssignTruckButton'] == 'AssignTruck')
  {
    if (empty($truckid) || empty($employeeid))
    {
      header('Location: AssignTruckError.php');
    }
    else
    {
      $updateEmployeeQuery = 'UPDATE Employee SET truckID = ' . $truckid . ' WHERE employeeID = ' . $employeeid . ';';
      $updateEmployeeExecution = @mysqli_query($dbc, $updateEmployeeQuery);
      $updateTruckQuery = 'UPDATE Truck SET inUse = "Y" WHERE truckID = ' . $truckid . ';';
      $updateTruckExecution = @mysqli_query($dbc, $updateTruckQuery);

      if ($updateEmployeeExecution && $updateTruckExecution)
      {
        header('Location: AssignTruckConfirmation.php');
      }
      else
      {
        echo '<h1>System Error</h1>';
        echo '<form action="EmployeeSignUp.php">';
        echo '<p>Something went wrong...</p>';
        echo '<button>Ok</button>';
        echo '</form>';
      }
      mysqli_close($dbc);
    }
  }

  // *********************** Unassign Trucks ***********************

  while ($row = mysqli_fetch_array($EmployeeListExecution2)) {

    if ($_POST['UnassignTruckButton'] == $row['employeeID']) {
      // Unassign truck from employee
      $truckid2 = $row['truckID'];
      $employeeid2 = $row['employeeID'];
      $updateEmployeeQuery = 'UPDATE Employee, Truck SET Employee.truckID = NULL, Truck.inUse = "N" WHERE Employee.employeeID = ' . $employeeid2 . ' AND Truck.truckID = ' . $truckid2 . '';
      $updateEmployeeExecute = @mysqli_query($dbc, $updateEmployeeQuery);

      if ($updateEmployeeExecute) {
        header('Location: AssignTruckConfirmation.php');
      }
      else {
        header('Location: AssignTruckError.php');
      }
      mysqli_close($dbc);
    }
  }

  // *********************** Add Trucks ***********************
  if ($_POST['AddTruckButton'] == 'AddTruck')
  {

    if (empty($addMake) || empty($addModel) || empty($addColor) || empty($addYear) || empty($addLicenseNo) || empty($addPrice))
    {
      header('Location: AssignTruckError.php');
    }
    else
    {
      $addTruckQuery = "INSERT INTO Truck (make, model, color, year, licenseNo, priceBoughtFor)
                        VALUES ('$addMake', '$addModel', '$addColor', '$addYear', '$addLicenseNo', '$addPrice');";
      $addTruckExecute = @mysqli_query($dbc, $addTruckQuery);

      if ($addTruckExecute)
      {
        header('Location: AssignTruckConfirmation.php');
      }
      else
      {
        header('Location: AssignTruckError.php');
      }
      mysqli_close($dbc);
    }
  }

  // *********************** Remove Trucks ***********************
  while ($row = mysqli_fetch_array($TruckTableExecute)) {

    if ($_POST['RemoveTruckButton'] == $row['truckID']) {
      // Delete selected truck from the database
      $truckid2 = $row['truckID'];
      $unassignTruckQuery = 'UPDATE Employee SET truckID = NULL WHERE truckID = ' . $truckid2 . ';';
      $unassignTruckExectute = @mysqli_query($dbc, $unassignTruckQuery);
      $removeTruckQuery = 'DELETE FROM Truck WHERE truckID = ' . $truckid2 . ';';
      $removeTruckExecute = @mysqli_query($dbc, $removeTruckQuery);

      if ($removeTruckExecute) {

        header('Location: AssignTruckConfirmation.php');

        // // If truck was assigned to employee, remove the truckID from that employee
        // $checkTruckAssignedQuery = 'SELECT employeeID FROM Employee WHERE truckID = ' . $truckid2 . ';';
        // $checkTruckAssignedExecute = @mysqli_query($dbc, $checkTruckAssignedQuery);
        // if (!empty($checkTruckAssignedExecute)) {

        // }
      }
      else {
        header('Location: AssignTruckError.php');
      }
      mysqli_close($dbc);
    }
  }
}
