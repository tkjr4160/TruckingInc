<?php
// Connect to AWS RDS MySQL instance
DEFINE ('DB_HOST', 'truckinginc.chkhxwehteg0.us-east-2.rds.amazonaws.com');
DEFINE ('DB_USER', 'capstoneSP19');
DEFINE ('DB_PASS', 'cscc2019');
DEFINE ('DB_NAME', 'TruckingInc');

$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASS, DB_NAME) or die ("Could not connect to MySQL");
mysqli_set_charset($dbc, 'utf-8');
