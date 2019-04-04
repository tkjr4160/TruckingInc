<!--

-->

<?php

session_start();
include ('../mysqli_connect.php');

$user = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['CustomerUsername'])));
$pass = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['CustomerPassword'])));
$fn = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['CustomerFirstName'])));
$mi = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['CustomerMiddleInitial'])));
$ln = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['CustomerLastName'])));
$str = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['CustomerStreet'])));
$cty = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['CustomerCity'])));
$stt = $_POST['CustomerState'];
$zp = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['CustomerZip'])));
$phn = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['CustomerPhone'])));
$eml = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['CustomerEmail'])));
$rptPass = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['CustomerRepeatPassword'])));

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
      header('Location: CustomerNonMatchingPasswords.php');
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
        header('Location: CustomerUsernameTaken.php');
      }
      mysqli_close($dbc);
    }
  }
}
