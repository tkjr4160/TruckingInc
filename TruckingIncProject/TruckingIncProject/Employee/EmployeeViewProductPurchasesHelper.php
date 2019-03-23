<!--

-->

<?php

session_start();
require ('CheckSignedIn.php');
require ('CheckPermissionAorBorC.php');

$FindProductPurchasesQuery = "Select * From ProductPurchase";
$FindProductPurchasesExecution = @mysqli_query($dbc, $FindProductPurchasesQuery);

if (!$FindProductPurchasesExecution)
{
  echo '<h1>System Error</h1>';
  echo '<form action="EmployeeHome.php">';
  echo '<p>Something went wrong...</p>';
  echo '<button>Ok</button>';
  echo '</form>';
}
