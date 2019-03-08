<?php

session_start();
include ('../mysqli_connect.php');
require ('CheckSignedIn.php');
require ('CheckTruckDriver.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if ($_POST['EmployeeSignOutButton'] == 'EmployeeSignOut')
  {
    $_SESSION = [];
    header ('Location: EmployeeSignIn.php');
  }
}
