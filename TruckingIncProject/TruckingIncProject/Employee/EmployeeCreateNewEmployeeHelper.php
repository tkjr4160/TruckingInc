<!--

-->

<?php

session_start();
require ('CheckSignedIn.php');
require ('CheckPermissionA.php');

$user = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['EmployeeUsername'])));
$pass = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['EmployeePassword'])));
$fn = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['EmployeeFirstName'])));
$mi = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['EmployeeMiddleInitial'])));
$ln = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['EmployeeLastName'])));
$str = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['EmployeeStreet'])));
$cty = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['EmployeeCity'])));
$stt = $_POST['EmployeeState'];
$zp = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['EmployeeZip'])));
$phn = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['EmployeePhone'])));
$eml = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['EmployeeEmail'])));
$rptPass = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['EmployeeRepeatPassword'])));

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

  if ($_POST['EmployeeSubmitButton'] == 'RegisterEmployee')
  {

    if ($pass != $rptPass)
    {
      header('Location: EmployeeNonMatchingPasswords.php');
    }
    else
    {
      $createEmployeeQuery =
  		"Insert Into Employee (firstName, middleInitial, lastName, street, city, state, zip, phone, email, WebsiteUsername, WebsitePassword)
  		 Values ('$fn', '$mi', '$ln', '$str', '$cty', '$stt', '$zp', '$phn', '$eml', '$user', AES_ENCRYPT('$pass', 'NACL'))";
      $createEmployeeExecution = @mysqli_query($dbc, $createEmployeeQuery);
      if ($createEmployeeExecution)
      {
        header('Location: EmployeeCreateNewEmployee.php');
      }
      else
      {
        header('Location: EmployeeUsernameTaken.php');

      }
      mysqli_close($dbc);
    }
  }
}
