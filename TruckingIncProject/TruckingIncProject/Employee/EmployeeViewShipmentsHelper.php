<!--

-->

<?php

session_start();
require ('CheckSignedIn.php');
require ('CheckPermissionAorBorC.php');

$CheckPositionQuery = "Select position From Employee Where WebsiteUsername = '$_SESSION[EmployeeUsername]'";
$CheckPositionExecution = @mysqli_query($dbc, $CheckPositionQuery);
$fetchPositionCheck = mysqli_fetch_array($CheckPositionExecution);

$CheckPermissionsQuery = "Select permissionsType From Employee Where WebsiteUsername = '$_SESSION[EmployeeUsername]'";
$CheckPermissionsExecution = @mysqli_query($dbc, $CheckPermissionsQuery);
$fetchPermissionsCheck = mysqli_fetch_array($CheckPermissionsExecution);

$FindTransactionsQuery = "Select * From Transact";
$FindTransactionsExecution = @mysqli_query($dbc, $FindTransactionsQuery);

if (!$FindTransactionsExecution)
{
  echo '<h1>System Error</h1>';
  echo '<form action="EmployeeHome.php">';
  echo '<p>Something went wrong...</p>';
  echo '<button>Ok</button>';
  echo '</form>';
}
