<!--

-->

<?php

session_start();
include ('../mysqli_connect.php');
require ('CheckSignedOut.php');

$user = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['EmployeeUsername'])));
$pass = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['EmployeePassword'])));

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

  if ($_POST['EmployeeSubmitButton'] == 'EmployeeSignIn')
  {
    $findEmployeePasswordQuery = "Select AES_DECRYPT(WebsitePassword, 'NACL') From Employee Where WebsiteUsername = '$user'";
    $findEmployeePasswordExecution = @mysqli_query($dbc, $findEmployeePasswordQuery);
		$fetchEmployeePassword = mysqli_fetch_array($findEmployeePasswordExecution);
		if ($findEmployeePasswordExecution && $fetchEmployeePassword)
		{
    	if ($fetchEmployeePassword[0] == $pass)
    	{
      	$_SESSION['EmployeeUsername'] = $user;
      	$_SESSION['EmployeePassword'] = $pass;
      	header('Location: EmployeeHome.php');
    	}
			else
			{
				header('Location: EmployeeWrongPassword.php');
			}
		}
    else
    {
      header ('Location: EmployeeWrongUsername.php');
    }
    mysqli_close($dbc);
  }
}
