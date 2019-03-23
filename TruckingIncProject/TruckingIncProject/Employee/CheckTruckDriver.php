<!--

-->

<?php

include ('../mysqli_connect.php');

$CheckPositionQuery = "Select position From Employee Where WebsiteUsername = '$_SESSION[EmployeeUsername]'";
$CheckPositionExecution = @mysqli_query($dbc, $CheckPositionQuery);
$fetchPositionCheck = mysqli_fetch_array($CheckPositionExecution);

if ($CheckPositionExecution && $fetchPositionCheck)
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
