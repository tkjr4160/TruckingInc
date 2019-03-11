<!--

-->

<?php

session_start();
include ('../mysqli_connect.php');
require ('CheckSignedIn.php');

$user = $_SESSION['CustomerUsername'];

$CustomerDetailsQuery = "Select * from Customer where WebsiteUsername = '$user'";
$CustomerDetailsExecution = @mysqli_query($dbc, $CustomerDetailsQuery);
$row = mysqli_fetch_array($CustomerDetailsExecution);

$newStreet = htmlentities($_POST['streetChange']);
$newCity = htmlentities($_POST['cityChange']);
$newState = $_POST['stateChange'];
$newZip = htmlentities($_POST['zipChange']);
$newPhone = htmlentities($_POST['phoneChange']);
$newEmail = htmlentities($_POST['emailChange']);
$currentPassword = htmlentities($_POST['CurrentPassword']);
$newPassword = htmlentities($_POST['NewPassword']);
$repeatNewPassword = htmlentities($_POST['RepeatNewPassword']);

$ChangeDetailsQuery = "Update Customer Set street = '$newStreet', city ='$newCity', state = '$newState', zip = '$newZip', phone = '$newPhone', email = '$newEmail' where WebsiteUsername = '$user'";



if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if ($_POST['ChangeAccountDetailsButton'] == $row['customerID'])
  {
    if (empty($newStreet) || empty($newCity) || empty($newState) || empty($newZip) || empty($newPhone) || empty($newEmail))
    {
      echo '<form action="CustomerAccount.php">';
      echo '<p>You must fill out all fields!</p>';
      echo '<button>Ok</button>';
      echo '</form>';
    }
    else
    {
      $ChangeDetailsExecution = @mysqli_query($dbc, $ChangeDetailsQuery);
      if ($ChangeDetailsExecution)
      {
        header ('Location: CustomerAccount.php');
      }
      else
      {
        echo '<h1>System Error</h1>';
        echo '<form action="CustomerAccount.php">';
        echo '<p>Something went wrong...</p>';
        echo '<button>Ok</button>';
        echo '</form>';
      }
    }
  }
  else if ($_POST['ChangePasswordButton'] == 'ChangePassword')
  {
    $FindPasswordQuery = "Select AES_DECRYPT(WebsitePassword, 'NACL') From Customer Where WebsiteUsername = '$user'";
    $FindPasswordExecution = @mysqli_query($dbc, $FindPasswordQuery);
    $FindPassword = mysqli_fetch_array($FindPasswordExecution);
    $ChangePasswordQuery = "Update Customer Set WebsitePassword = AES_ENCRYPT('$newPassword', 'NACL') Where WebsiteUsername = '$user'";
    if (empty($currentPassword) || empty($newPassword) || empty($repeatNewPassword))
    {
      echo '<form action="CustomerAccount.php">';
      echo '<p>You must fill out all fields!</p>';
      echo '<button>Ok</button>';
      echo '</form>';
    }
    else if ($currentPassword == $FindPassword[0] && $newPassword == $repeatNewPassword)
    {
      $ChangePasswordExecution = @mysqli_query($dbc, $ChangePasswordQuery);
      if (!$ChangePasswordExecution)
      {
        echo '<h1>System Error</h1>';
        echo '<form action="CustomerAccount.php">';
        echo '<p>Something went wrong...</p>';
        echo '<button>Ok</button>';
        echo '</form>';
      }
      else
      {
        $_SESSION['EmployeePassword'] = $newPassword;
        header('Location: CustomerAccount.php');
      }
    }
    else
    {
      echo '<form action="CustomerAccount.php">';
      echo '<p>You must have the correct current password, and your new passwords must match.</p>';
      echo '<button>Ok</button>';
      echo '</form>';
    }
  }
}
