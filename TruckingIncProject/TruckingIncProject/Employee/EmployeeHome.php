<!--

-->

<?php include "EmployeeHomeHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Employee Home</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../Styles.css">
</head>
<body>
	<div id="banner">
		<img src="../Pictures/TruckingIncLogo.png" alt="Logo" id= "logo">
	</div>
	<div class="Div">
    <a href="EmployeeAccount.php">My Account</a>
		<a href="EmployeeCreateNewEmployee.php">New Employee</a>
    <a href="EmployeePositionsAndPermissions.php">Positions and Permissions</a>
    <a href="EmployeeTakeJob.php">Find Job</a>
		<a href="EmployeeAssignTruck.php">Truck Management</a>
		<a href="EmployeeResupply.php">Inventory</a>
		<a href="EmployeeViewShipments.php">View Shipments</a>
		<a href="../TruckingIncHome.php">Website Home</a>
	</div>
	<form action="EmployeeHomeHelper.php" method="POST" class="Form">
		<div class="FormDiv">
			<p class="FormDivPar">
				<button type="submit" id="EmployeeSignOutButton" name="EmployeeSignOutButton" class="FormDivParButton" value="EmployeeSignOut">Log Out</button>
			</p>
		</div>
	</form>
</body>
</html>
