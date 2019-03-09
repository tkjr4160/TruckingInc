<!--

-->

<?php include "EmployeeCreateTruckHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Buy New Truck</title>
	<meta charset="utf-8"/>
</head>
<body class="Div">
	<div>
		<a href="EmployeeHome.php">Employee Home</a></br>
		<a href="../TruckingIncHome.php">Website Home</a>
	</div>
	<form action="EmployeeCreateTruck.php" method="post" class="Form">
		<div class="FormDiv">
			<p class="FormDivPar">
				<label class="FormDivParLabel">Make: </label>
				<input type="text" id="TruckMake" name="TruckMake" class="FormDivParText" size="20" maxlength="30"/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Model: </label>
				<input type="text" id="TruckModel" name="TruckModel" class="FormDivParText" size="20" maxlength="30"/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Color: </label>
				<input type="text" id="TruckColor" name="TruckColor" class="FormDivParText" size="20" maxlength="30"/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">License Number: </label>
				<input type="text" id="TruckLicense" name="TruckLicense" class="FormDivParText" size="10" maxlength="15"/>
			</p>
			<p class="FormDivPar">
				<button type="submit" id="BuyTruckButton" name="BuyTruckButton" class="FormDivParButton" value="BuyTruck">Submit</button>
			</p>
		</div>
	</form>
	<form action="EmployeeHomeHelper.php" method="POST" class="Form">
		<div class="FormDiv">
			<p class="FormDivPar">
				<button type="submit" id="EmployeeSignOutButton" name="EmployeeSignOutButton" class="FormDivParButton" value="EmployeeSignOut">Log Out</button>
			</p>
		</div>
	</form>
</body>
</html>
