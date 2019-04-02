<?php

session_start();
require ('CheckSignedIn.php');
require ('CheckPermissionAorBorC.php'); // change to CheckPermissionA.php

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
$addMake = trim(htmlentities(mysqli_real_escape_string($dbc, $_POST['TruckMake'])));
$addModel = trim(htmlentities(mysqli_real_escape_string($dbc, $_POST['TruckModel'])));
$addColor = trim(htmlentities(mysqli_real_escape_string($dbc, $_POST['TruckColor'])));
$addYear = trim(htmlentities(mysqli_real_escape_string($dbc, $_POST['TruckYear'])));
$addLicenseNo = trim(htmlentities(mysqli_real_escape_string($dbc, $_POST['LicenseNum'])));
$addPrice = trim(htmlentities(mysqli_real_escape_string($dbc, $_POST['PurchasePrice'])));

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
      echo '<form action="EmployeeHome.php">';
      echo '<p>ERROR! An employee and a truck must be selected to assign a truck!</p>';
      echo ' truckid: ' . $truckid . ' employeeid: ' . $employeeid;
      echo '<button>Ok</button>';
      echo '</form>';
    }
    else
    {
      $updateEmployeeQuery = 'UPDATE Employee SET truckID = ' . $truckid . ' WHERE employeeID = ' . $employeeid . ';';
      $updateEmployeeExecution = @mysqli_query($dbc, $updateEmployeeQuery);
      $updateTruckQuery = 'UPDATE Truck SET inUse = "Y" WHERE truckID = ' . $truckid . ';';
      $updateTruckExecution = @mysqli_query($dbc, $updateTruckQuery);

      if ($updateEmployeeExecution && $updateTruckExecution)
      {
        header('Location: EmployeeAssignTruck.php');
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
        header('Location: EmployeeAssignTruck.php');
      }
      else {
        echo '<h1>System Error</h1>';
        echo '<form action="EmployeeAssignTruck.php">';
        echo '<p>There was an error while unassigning truck ' . $truckid2 . ' from employee ' . $employeeid2 . '</p>';
        echo '<button>Ok</button>';
        echo '</form>';
      }
      mysqli_close($dbc);
    }
  }

  // *********************** Add Trucks ***********************
  if ($_POST['AddTruckButton'] == 'AddTruck')
  {
    if (empty($addMake) || empty($addModel) || empty($addColor) || empty($addYear) || empty($addLicenseNo) || empty($addPrice))
    {
      echo '<form action="EmployeeAssignTruck.php">';
      echo '<p>ERROR! You must to fill out all fields!</p>';
      echo '<button>Ok</button>';
      echo '</form>';
    }
    else
    {
      $addTruckQuery = "INSERT INTO Truck (make, model, color, year, licenseNo, priceBoughtFor) 
                        VALUES ('$addMake', '$addModel', '$addColor', '$addYear', '$addLicenseNo', '$addPrice');";
      $addTruckExecute = @mysqli_query($dbc, $addTruckQuery);

      if ($addTruckExecute)
      {
        header('Location: EmployeeAssignTruck.php');
      }
      else
      {
        echo '<h1>System Error</h1>';
        echo '<form action="EmployeeAssignTruck.php">';
        echo '<p>Something went wrong...</p>';
        echo '<button>Ok</button>';
        echo '</form>';
        print('Testing: ' . $addMake . ' - ' . $addModel . ' - ' . $addColor . ' - ' . $addYear . ' - ' . $addLicenseNo  . ' - ' . $addPrice);
      }
      mysqli_close($dbc);
    }
  }

  // *********************** Remove Trucks ***********************
  while ($row = mysqli_fetch_array($TruckTableExecute)) {

    if ($_POST['RemoveTruckButton'] == $row['truckID']) {
      // Delete selected truck from the database
      $truckid2 = $row['truckID'];
      $removeTruckQuery = 'DELETE FROM Truck WHERE truckID = ' . $truckid2 . ';';
      $removeTruckExecute = @mysqli_query($dbc, $removeTruckQuery);

      if ($removeTruckExecute) {
        header('Location: EmployeeAssignTruck.php');
        $unassignTruckQuery = 'UPDATE Employee SET truckID = NULL WHERE truckID = ' . $truckid2 . ';';
        $unassignTruckExectute = @mysqli_query($dbc, $unassignTruckQuery);
      }
      else {
        echo '<h1>System Error</h1>';
        echo '<form action="EmployeeAssignTruck.php">';
        echo '<p>There was an error with deleting truck ' . $truckid2 . ' from the database</p>';
        echo '<button>Ok</button>';
        echo '</form>';
      }
      mysqli_close($dbc);
    }
  }
}