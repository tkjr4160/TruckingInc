<!--

-->

<?php

session_start();
include ('../mysqli_connect.php');
require ('CheckSignedIn.php');

//require ('EmployeeSignOut.php');

$CheckPositionQuery = "Select position From Employee Where WebsiteUsername = '$_SESSION[EmployeeUsername]'";
$CheckPositionExecution = @mysqli_query($dbc, $CheckPositionQuery);
$fetchPositionCheck = mysqli_fetch_array($CheckPositionExecution);

$CheckPermissionsQuery = "Select permissionsType From Employee Where WebsiteUsername = '$_SESSION[EmployeeUsername]'";
$CheckPermissionsExecution = @mysqli_query($dbc, $CheckPermissionsQuery);
$fetchPermissionsCheck = mysqli_fetch_array($CheckPermissionsExecution);


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if ($_POST['EmployeeSignOutButton'] == 'EmployeeSignOut')
  {
    session_unset();
    session_destroy();
    setcookie('PHPSESSID', '', time()-3600, '/', '', 0, 0);
    header ('Location: ../TruckingIncHome.php');
  }
}
