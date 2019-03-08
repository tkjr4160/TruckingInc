<?php

session_start();
require ('CheckSignedIn.php');
require ('CheckPermissionAorBorC.php');

$EmployeeListQuery = "Select * From Employee where position = 'Truck Driver'";
$EmployeeListExecution = @mysqli_query($dbc, $EmployeeListQuery);

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

}
