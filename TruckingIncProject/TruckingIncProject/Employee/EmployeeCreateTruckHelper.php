<?php

session_start();
require ('CheckSignedIn.php');
require ('CheckPermissionAorB.php');

$TruckListQuery = "Select * From Truck";
$TruckListExecution = @mysqli_query($dbc, $TruckListQuery);

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

  if ($_POST['TruckSubmitButton'] == 'RegisterTruck')
  {
    $make = $_POST['TruckMake'];
    $model = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['TruckModel'])));
    $color = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['TruckColor'])));
    $licenseNo = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['TruckLicense'])));
    $price = 30000;

    if (empty($make) || empty($model) || empty($color) || empty($licenseNo))
    {
      echo '<form action="EmployeeCreateTruck.php">';
      echo '<p>ERROR! You must to fill out all fields!</p>';
      echo '<button>Ok</button>';
      echo '</form>';
    }
    else
    {
      $CreateTruckQuery = "Insert Into Truck (make, model, color, licenseNo, priceBoughtFor, inUse) Values ('$make', '$model', '$color', '$licenseNo', '$price', 'N')";
      $CreateTruckExecution = @mysqli_query($dbc, $CreateTruckQuery);
      if ($CreateTruckExecution)
      {
        header('Location: EmployeeCreateTruck.php');
      }
      else
      {
        echo '<h1>System Error</h1>';
        echo '<form action="EmployeeCreateTruck.php">';
        echo '<p>Something went wrong...</p>';
        echo '<button>Ok</button>';
        echo '</form>';
      }
    }
  }
  mysqli_close($dbc);
}
