<!--

-->

<?php

session_start();
include ('../mysqli_connect.php');
require ('CheckSignedOut.php');

$user = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['CustomerUsername'])));
$pass = mysqli_real_escape_string($dbc, htmlentities(trim($_POST['CustomerPassword'])));

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

  if ($_POST['CustomerSubmitButton'] == 'CustomerSignIn')
  {
    $findCustomerPasswordQuery = "Select AES_DECRYPT(WebsitePassword, 'NACL') From Customer Where WebsiteUsername = '$user'";
    $findCustomerPasswordExecution = @mysqli_query($dbc, $findCustomerPasswordQuery);
		$fetchCustomerPassword = mysqli_fetch_array($findCustomerPasswordExecution);
		if ($findCustomerPasswordExecution && $fetchCustomerPassword)
		{
    	if ($fetchCustomerPassword[0] == $pass)
    	{
      	$_SESSION['CustomerUsername'] = $user;
      	$_SESSION['CustomerPassword'] = $pass;
      	header('Location: CustomerHome.php');
    	}
			else
			{
				header('Location: CustomerWrongPassword.php');
			}
		}
    else
    {
      header('Location: CustomerWrongUsername.php');
    }
    mysqli_close($dbc);
  }
}
