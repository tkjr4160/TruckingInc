<?php

session_start();
require ('CheckSignedIn.php');
require ('CheckPermissionA.php');

$EmployeeListQuery = "Select * From Employee";
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
      $ChangePosQuery = "Update Employee Set position = '$newPos' Where employeeID = '$id'";
      $ChangePermQuery = "Update Employee Set permissionsType = '$newPerm' Where employeeID = '$id'";
      $ChangePosExecution = @mysqli_query($dbc, $ChangePosQuery);
      $ChangePermExecution = @mysqli_query($dbc, $ChangePermQuery);
      if ($ChangePosExecution && $ChangePermExecution)
      {
        header('Location: EmployeePositionsAndPermissions.php');
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
  }
}
