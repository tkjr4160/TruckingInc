<!--

-->

<?php include "CustomerCreateOrderHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>New Order</title>
	<meta charset="utf-8"/>
</head>
<body>
	<div class="Div">
		<a href="CustomerHome.php">Customer Home</a></br>
		<a href="../TruckingIncHome.php">Website Home</a>
	</div>
	<form action="CustomerOrderHistory.php" method="POST" class="Form">
		<div class="FormDiv">
			<p class="FormDivPar">
				<label class="FormDivParLabel">Lumber Type: </label>
				<select id="LumberType" name="LumberType" class="FormDivParSel">
					<option value="Oak">Oak</option> <option value="Maple">Maple</option> <option value="Ash">Ash</option> <option value="Cherry">Cherry</option>
					<option value="Mahogany">Mahogany</option> <option value="Birch">Birch</option>
				</select>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Number of Units: </label>
				<input type="text" id="NumberUnits" name="NumberUnits" class="FormDivParSel" size="5"/>
			</p>
			<p class="FormDivPar">
				<button type="submit" id="CustomerCreateOrderButton" name="CustomerCreateOrderButton" class="FormDivParButton" value="CustomerCreateOrder">Submit</button>
			</p>
		</div>
	</form>
	<form action="CustomerSignIn.php" method="POST" class="Form">
		<div class="FormDiv">
			<p class="FormDivPar">
				<button type="submit" id="CustomerSignOutButton" name="CustomerSignOutButton" class="FormDivParButton" value="CustomerSignOut">Log Out</button>
			</p>
		</div>
	</form>
</body>
</html>
