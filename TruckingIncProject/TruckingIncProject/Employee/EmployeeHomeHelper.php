<!--

-->

<?php

session_start();
include ('../mysqli_connect.php');
require ('CheckSignedIn.php');

//require ('EmployeeSignOut.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if ($_POST['EmployeeSignOutButton'] == 'EmployeeSignOut')
  {
    session_unset();
    session_destroy();
    setcookie('PHPSESSID', '', time()-3600, '/', '', 0, 0);
    header ('Location: ../TruckingIncHome.php');
  }
}
