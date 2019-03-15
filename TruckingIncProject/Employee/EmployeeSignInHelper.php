<?php

session_start();
include ('../mysqli_connect.php');
require ('CheckSignedOut.php');

$user = $_POST['EmployeeUsername']; $user = htmlentities($user);
$pass = $_POST['EmployeePassword']; $pass = htmlentities($pass);

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

  if ($_POST['EmployeeSubmitButton'] == 'EmployeeSignIn')
  {

    if (empty($user) || empty($pass))
    {
			echo '<form action="EmployeeHomeHelper.php">';
			echo '<p>ERROR! You must to fill out both fields!</p>';
			echo '<button>Ok</button>';
			echo '</form>';
    }
    else
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
					echo '<form action="EmployeeHomeHelper.php">';
					echo '<p>ERROR! This is the wrong password for this user!</p>';
					echo '<button>Ok</button>';
					echo '</form>';
				}
			}
      else
      {
        echo '<h1>System Error</h1>';
        echo '<form action="EmployeeHomeHelper.php">';
        echo '<p>Something went wrong...</p>';
        echo '<button>Ok</button>';
        echo '</form>';
      }
      mysqli_close($dbc);
    }
  }
}
