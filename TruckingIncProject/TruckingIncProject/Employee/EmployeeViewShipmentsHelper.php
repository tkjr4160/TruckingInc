<!--

-->

<?php

session_start();
require ('CheckSignedIn.php');
require ('CheckPermissionAorBorC.php');

$FindTransactionsQuery = "Select * From Transact";
$FindTransactionsExecution = @mysqli_query($dbc, $FindTransactionsQuery);

if (!$FindTransactionsExecution)
{
  echo '<h1>System Error</h1>';
  echo '<form action="EmployeeHome.php">';
  echo '<p>Something went wrong...</p>';
  echo '<button>Ok</button>';
  echo '</form>';
}
