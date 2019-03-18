<?php

session_start();
include ('../mysqli_connect.php');
require ('CheckSignedIn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if ($_POST['EmployeeSignOutButton'] == 'EmployeeSignOut')
  {
    $_SESSION = [];
    header ('Location: EmployeeSignIn.php');
  }
}
