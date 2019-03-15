<?php

session_start();
include ('../mysqli_connect.php');
require ('CheckSignedOut.php');

$user = $_POST['CustomerUsername']; $user = htmlentities($user);
$pass = $_POST['CustomerPassword']; $pass = htmlentities($pass);

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

  if ($_POST['CustomerSubmitButton'] == 'CustomerSignIn')
  {

    if (empty($user) || empty($pass))
    {
			echo '<form action="CustomerSignIn.php">';
			echo '<p>ERROR! You must to fill out both fields!</p>';
			echo '<button>Ok</button>';
			echo '</form>';
    }
    else
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
					echo '<form action="CustomerSignIn.php">';
					echo '<p>ERROR! This is the wrong password for this user!</p>';
					echo '<button>Ok</button>';
					echo '</form>';
				}
			}
      else
      {
        echo '<h1>System Error</h1>';
        echo '<form action="CustomerSignIn.php">';
        echo '<p>Something went wrong...</p>';
        echo '<button>Ok</button>';
        echo '</form>';
      }
      mysqli_close($dbc);
    }
  }
}
