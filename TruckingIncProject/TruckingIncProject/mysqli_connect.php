<?php
// Connect to local DB
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASS', '');
DEFINE ('DB_NAME', 'truckinginc');
DEFINE ('DB_PORT', '3306');

$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT) or die ("Could not connect to MySQL " . mysqli_connect_error($dbc));
mysqli_set_charset($dbc, 'utf-8');
