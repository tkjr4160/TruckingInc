<?php

session_start();
require ('CheckSignedIn.php');
require ('CheckPermissionAorBorC.php'); // change to CheckPermissionA.php

// *********************** Assign Trucks ***********************
$EmployeeListQuery = "SELECT * FROM Employee WHERE position = 'Truck Driver'";
$EmployeeListExecution = @mysqli_query($dbc, $EmployeeListQuery);
$TruckListQuery = "SELECT * FROM Truck WHERE inUse = 'N'";
$TruckListExecution = @mysqli_query($dbc, $TruckListQuery);
$truckid = $_POST['ChangeTruck']; $truckid = htmlentities($truckid);
$employeeid = $_POST['ChangeEmployee']; $employeeid = htmlentities($employeeid);

// *********************** Unassign Trucks ***********************
$EmployeeListQuery2 = "SELECT Truck.*, Employee.employeeID FROM Truck LEFT JOIN Employee ON (Truck.truckID = Employee.truckID) WHERE Truck.inUse = 'U'";
$EmployeeListExecution2 = @mysqli_query($dbc, $EmployeeListQuery2);
$TruckListQuery2 = "SELECT * FROM Truck WHERE inUse = 'U'";
$TruckListExecution2 = @mysqli_query($dbc, $TruckListQuery2);
$truckid2 = $_POST['ChangeTruck2']; $truckid2 = htmlentities($truckid2);
$employeeid2 = $_POST['ChangeEmployee2']; $employeeid2 = htmlentities($employeeid2);

// *********************** Add Trucks ***********************
$addMake = $_POST['TruckMake']; $addMake = htmlentities($addMake);
$addModel = $_POST['TruckModel']; $addModel = htmlentities($addModel);
$addColor = $_POST['TruckColor']; $addColor = htmlentities($addColor);
$addYear = $_POST['TruckYear']; $addYear = htmlentities($addYear);
$addLicenseNo = $_POST['LicenseNum']; $addLicenseNo = htmlentities($addLicenseNo);
$addPrice = $_POST['PurchasePrice']; $addPrice = htmlentities($addPrice);

// *********************** List Trucks ***********************
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
      $updateTruckQuery = 'UPDATE Truck SET inUse = "U" WHERE truckID = ' . $truckid . ';';
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
  if ($_POST['UnassignTruckButton'] == 'UnassignTruck')
  {

    if (empty($truckid2) || empty($employeeid2))
    {
      echo '<form action="EmployeeSignUp.php">';
      echo '<p>ERROR! An employee and a truck must be selected to unassign a truck!</p>';
      echo '<button>Ok</button>';
      echo '</form>';
    }
    else
    {
      $updateEmployeeQuery = 'UPDATE Employee, Truck SET Employee.truckID = NULL, Truck.inUse = "N" WHERE Employee.employeeID = ' . $employeeid2 . ' AND Truck.truckID = ' . $truckid2 . '';
      $updateEmployeeExecution = @mysqli_query($dbc, $updateEmployeeQuery);

    if ($updateEmployeeExecution)
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


}

// *********************** Remove Trucks ***********************
