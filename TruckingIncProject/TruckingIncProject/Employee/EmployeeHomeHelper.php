<?php

session_start();
include ('../mysqli_connect.php');
require ('CheckSignedIn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if ($_POST['EmployeeSignOutButton'] == 'EmployeeSignOut')
  {
    $_SESSION = array();
    session_destroy();
    setcookie('PHPSESSID', '', time()-3600, '/', '', 0, 0);
    header ('Location: EmployeeSignIn.php');
  }
}
