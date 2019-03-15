<!--

-->

<?php

session_start();
require ('CheckSignedIn.php');
require ('CheckPermissionA.php');

$EmployeeListQuery = "Select * From Employee Where employeeID != '1'";
$EmployeeListExecution = @mysqli_query($dbc, $EmployeeListQuery);

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  while ($row = mysqli_fetch_array($EmployeeListExecution))
  {
    if ($_POST['ChangePermsAndPosButton'] == $row['employeeID'])
    {
      $id = $row['employeeID'];
      $newPos = $_POST['ChangePosition' . $id];
      $newPerm = $_POST['ChangePermission' . $id];



      if (($row['position'] == 'Truck Driver') && ($newPos != 'Truck Driver') && isset($row['truckID']))
      {
        $CurrentTruckID = $row['truckID'];
        $ChangeTruckInUseQuery = "Update Truck Set inUse = 'N' Where truckID = '$CurrentTruckID'";
        $NullEmployeeTruckIDQuery = "Update Employee Set truckID = NULL Where employeeID = '$id'";
        $ChangeTruckInUseExecution = @mysqli_query($dbc, $ChangeTruckInUseQuery);
        $NullEmployeeTruckIDExecution = @mysqli_query($dbc, $NullEmployeeTruckIDQuery);

        if ($ChangeTruckInUseExecution && $NullEmployeeTruckIDExecution)
        {

        }
        else
        {
          echo '<h1>System Error</h1>';
          echo '<form action="EmployeePositionsAndPermissions.php">';
          echo '<p>Something went wrong...</p>';
          echo '<button>Ok</button>';
          echo '</form>';
        }
      }

      $ChangePosPermQuery = "Update Employee Set position = '$newPos', permissionsType = '$newPerm' Where employeeID = '$id'";
      $ChangePosPermExecution = @mysqli_query($dbc, $ChangePosPermQuery);

      if ($ChangePosPermExecution)
      {
        header('Location: EmployeePositionsAndPermissions.php');
      }
      else
      {

      }
    }
  }
}
