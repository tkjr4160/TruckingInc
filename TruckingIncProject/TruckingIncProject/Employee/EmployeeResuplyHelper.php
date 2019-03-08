<?php

session_start();
require ('CheckSignedIn.php');
require ('CheckPermissionAorB.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

  if ($_POST['EmployeeSignOutButton'] == 'EmployeeSignOut')
  {
    $_SESSION = [];
    header ('Location: EmployeeSignIn.php');
  }
}
