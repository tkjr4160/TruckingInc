<!--

-->

<?php

if (isset($_SESSION['EmployeeUsername']) && isset($_SESSION['EmployeePassword']))
{
  header ('Location: EmployeeHome.php');
}
