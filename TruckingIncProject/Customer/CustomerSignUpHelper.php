<?php
include ('../mysqli_connect.php');

session_start();

require ('CheckSignedOut.php');

$user = $_POST['CustomerUsername']; $user = htmlentities($user);
$pass = $_POST['CustomerPassword']; $pass = htmlentities($pass);
$fn = $_POST['CustomerFirstName']; $fn = htmlentities($fn);
$mi = $_POST['CustomerMiddleInitial']; $mi = htmlentities($mi);
$ln = $_POST['CustomerLastName']; $ln = htmlentities($ln);
$str = $_POST['CustomerStreet']; $str = htmlentities($str);
$cty = $_POST['CustomerCity']; $cty = htmlentities($cty);
$stt = $_POST['CustomerState']; $stt = htmlentities($stt);
$zp = $_POST['CustomerZip']; $zp = htmlentities($zp);
$phn = $_POST['CustomerPhone']; $phn = htmlentities($phn);
$eml = $_POST['CustomerEmail']; $eml = htmlentities($eml);
$rptPass = $_POST['CustomerRepeatPassword']; $rptPass = htmlentities($rptPass);

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

  if ($_POST['CustomerSubmitButton'] == 'RegisterCustomer')
  {

    if (empty($user) || empty($pass) || empty($rptPass) || empty($fn) || empty($mi) || empty($ln) || empty($str) || empty($cty) ||
        empty($stt) || empty($zp) || empty($phn) || empty($eml))
    {
      echo '<form action="CustomerSignUp.php">';
      echo '<p>ERROR! You must to fill out all fields!</p>';
      echo '<button>Ok</button>';
      echo '</form>';
    }
    else if ($pass != $rptPass)
    {
      echo '<form action="CustomerSignUp.php">';
      echo '<p>ERROR! The passwords do not match!</p>';
      echo '<button>Ok</button>';
      echo '</form>';
    }
    else
    {
      $createCustomerQuery =
  		"Insert Into Customer (firstName, middleInitial, lastName, street, city, state, zip, phone, email, WebsiteUsername, WebsitePassword)
  		 Values ('$fn', '$mi', '$ln', '$str', '$cty', '$stt', '$zp', '$phn', '$eml', '$user', AES_ENCRYPT('$pass', 'NACL'))";
      $createCustomerExecution = @mysqli_query($dbc, $createCustomerQuery);
      if ($createCustomerExecution)
      {
        $_SESSION['CustomerUsername'] = $user;
        $_SESSION['CustomerPassword'] = $pass;
        header('Location: CustomerHome.php');
      }
      else
      {
        echo '<h1>System Error</h1>';
        echo '<form action="CustomerSignUp.php">';
        echo '<p>Something went wrong...</p>';
        echo '<button>Ok</button>';
        echo '</form>';

      }
      mysqli_close($dbc);
    }
  }
}
