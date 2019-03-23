<!--

-->

<?php

session_start();
include ('../mysqli_connect.php');
require ('CheckSignedIn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

  if ($_POST['CustomerSignOutButton'] == 'CustomerSignOut')
  {
    session_unset();
    session_destroy();
    setcookie('PHPSESSID', '', time()-3600, '/', '', 0, 0);
    header ('Location: CustomerSignIn.php');
  }
}
