<?php
include ('../mysqli_connect.php');

session_start();

require ('CheckSignedIn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

  if ($_POST['CustomerSignOutButton'] == 'CustomerSignOut')
  {
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    //unset($_SESSION['CustomerUsername']);
    //unset($_SESSION['CustomerPassword']);
    header ('Location: CustomerSignIn.php');
  }
}
