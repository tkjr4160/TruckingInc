<?php

if (isset($_SESSION['CustomerUsername']) && isset($_SESSION['CustomerPassword']))
{
  header ('Location: CustomerHome.php');
}
