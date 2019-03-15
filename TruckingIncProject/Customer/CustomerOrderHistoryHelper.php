<?php
include ('../mysqli_connect.php');

session_start();

require ('CheckSignedIn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

  if ($_POST['CustomerSignOutButton'] == 'CustomerSignOut')
  {
    $_SESSION = [];
    header ('Location: CustomerSignIn.php');
  }
}
