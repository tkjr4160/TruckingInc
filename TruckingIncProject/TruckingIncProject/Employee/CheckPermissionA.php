<?php

include ('../mysqli_connect.php');

$CheckPermissionsQuery = "Select permissionsType From Employee Where WebsiteUsername = '$_SESSION[EmployeeUsername]'";
$CheckPermissionsExecution = @mysqli_query($dbc, $CheckPermissionsQuery);
$fetchPermissionsCheck = mysqli_fetch_array($CheckPermissionsExecution);
if ($CheckPermissionsExecution && $fetchPermissionsCheck)
{
  if (($fetchPermissionsCheck[0] != 'A'))
  {
    header ('Location: EmployeeNoAccess.php');
  }
}
else
{
  header ('Location: EmployeeHome.php');
}
