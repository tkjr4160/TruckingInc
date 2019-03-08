<?php

session_start();
require ('CheckSignedIn.php');
require ('CheckPermissionAorB.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

  if ($_POST['BuyTruckButton'] == 'BuyTruck')
  {
    $make = $_POST['TruckMake']; $make = htmlentities($make);
    $model = $_POST['TruckModel']; $model = htmlentities($model);
    $color = $_POST['TruckColor']; $color = htmlentities($color);
    $licenseNo = $_POST['TruckLicense']; $licenseNo = htmlentities($licenseNo);

    if (empty($make) || empty($model) || empty($color) || empty($licenseNo))
    {
      echo '<form action="EmployeeCreateTruck.php">';
      echo '<p>ERROR! You must to fill out all fields!</p>';
      echo '<button>Ok</button>';
      echo '</form>';
    }
    else
    {
      $CreateTruckQuery = "Insert Into Truck (make, model, color, licenseNo, inUse) Values ('$make', '$model', '$color', '$licenseNo', 'N')";
      $CreateTruckExecution = @mysqli_query($dbc, $CreateTruckQuery);
      if ($CreateTruckExecution)
      {
        echo '<h1>Success</h1>';
        echo '<form action="EmployeeHome.php">';
        echo '<p>Truck Bought</p>';
        echo '<button>Ok</button>';
        echo '</form>';
      }
      else
      {
        echo '<h1>System Error</h1>';
        echo '<form action="EmployeeCreateTruck.php">';
        echo '<p>Something went wrong...</p>';
        echo '<button>Ok</button>';
        echo '</form>';
      }
      mysqli_close($dbc);
    }
  }
  else if ($_POST['EmployeeSignOutButton'] == 'EmployeeSignOut')
  {
    $_SESSION = [];
    header ('Location: EmployeeSignIn.php');
  }
}
