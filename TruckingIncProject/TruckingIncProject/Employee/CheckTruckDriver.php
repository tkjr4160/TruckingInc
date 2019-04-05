<!--

-->

<?php

include ('../mysqli_connect.php');

$CheckPositionQuery = "Select position From Employee Where WebsiteUsername = '$_SESSION[EmployeeUsername]'";
$CheckPositionExecution = @mysqli_query($dbc, $CheckPositionQuery);
$fetchPositionCheck = mysqli_fetch_array($CheckPositionExecution);

$CheckPermissionsQuery = "Select permissionsType From Employee Where WebsiteUsername = '$_SESSION[EmployeeUsername]'";
$CheckPermissionsExecution = @mysqli_query($dbc, $CheckPermissionsQuery);
$fetchPermissionsCheck = mysqli_fetch_array($CheckPermissionsExecution);

if ($CheckPositionExecution && $fetchPositionCheck && $CheckPermissionsExecution && $fetchPermissionsCheck)
{
  if ($fetchPositionCheck[0] != 'Truck Driver')
  {
    header ('Location: EmployeeNoAccess.php');
  }
}
else
{
  header ('Location: EmployeeHome.php');
}
