<!--

-->

<?php

session_start();
include ('../mysqli_connect.php');
require ('CheckSignedIn.php');

$user = $_SESSION['CustomerUsername'];

$FindCustomerQuery = "Select * From Customer Where WebsiteUsername = '$user'";
$FindCustomerExecution = @mysqli_query($dbc, $FindCustomerQuery);
$FindCustomerArray = mysqli_fetch_array($FindCustomerExecution);
$customerID = $FindCustomerArray['customerID'];

if (!$FindCustomerExecution)
{
  echo '<h1>System Error</h1>';
  echo '<form action="CustomerOrderHistory.php">';
  echo '<p>Something went wrong...</p>';
  echo '<button>Ok</button>';
  echo '</form>';
}
else
{
  $FindTransactionsQuery = "Select * From Transact Where customerID = '$customerID'";
  $FindTransactionsExecution = @mysqli_query($dbc, $FindTransactionsQuery);

  if (!$FindTransactionsExecution)
  {
    echo '<h1>System Error</h1>';
    echo '<form action="CustomerOrderHistory.php">';
    echo '<p>Something went wrong...</p>';
    echo '<button>Ok</button>';
    echo '</form>';
  }
}
