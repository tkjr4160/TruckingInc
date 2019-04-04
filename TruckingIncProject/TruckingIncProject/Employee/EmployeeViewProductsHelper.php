<!--

-->

<?php

session_start();
require ('CheckSignedIn.php');
require ('CheckPermissionAorBorC.php');

$FindProductsQuery = "Select * From Product";
$FindProductsExecution = @mysqli_query($dbc, $FindProductsQuery);

if (!$FindProductsExecution)
{
  echo '<h1>System Error</h1>';
  echo '<form action="EmployeeHome.php">';
  echo '<p>Something went wrong...</p>';
  echo '<button>Ok</button>';
  echo '</form>';
}
