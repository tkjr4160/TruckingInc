<!--

-->

<?php include "EmployeeHomeHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Employee Home</title>
	<meta charset="utf-8"/>
</head>
<body>
	<div class="Div">
    <a href="EmployeeAccount.php">My Account</a></br>
    <a href="EmployeePositionsAndPermissions.php">Positions and Permissions</a></br>
    <a href="EmployeeTakeJob.php">Find Job</a></br>
		<a href="EmployeeCreateTruck.php">Buy New Truck</a></br>
		<a href="EmployeeAssignTruck.php">Assign Truck</a></br>
		<a href="EmployeeResuply.php">Resupply</a></br>
		<a href="../TruckingIncHome.php">Website Home</a></br>
	</div>
	<form action="EmployeeSignIn.php" method="POST" class="Form">
		<div class="FormDiv">
			<p class="FormDivPar">
				<button type="submit" id="EmployeeSignOutButton" name="EmployeeSignOutButton" class="FormDivParButton" value="EmployeeSignOut">Log Out</button>
			</p>
		</div>
	</form>
</body>
</html>
