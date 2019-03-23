<!--

-->

<?php include "CustomerHomeHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Customer Home </title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../Styles.css">
</head>
<body>
	<div id="banner">
		<img src="../Pictures/TruckingIncLogo.png" alt="Logo" id= "logo">
	</div>
	<div class="Div">
		<a href="CustomerAccount.php">My Account</a>
		<a href="CustomerCreateOrder.php">New Order</a>
		<a href="../TruckingIncHome.php">Website Home</a>
	</div>
	<form action="CustomerHomeHelper.php" method="post" class="Form">
		<div class="FormDiv">
			<p class="FormDivPar">
				<button type="submit" id="CustomerSignOutButton" name="CustomerSignOutButton" class="FormDivParButton" value="CustomerSignOut">Log Out</button>
			</p>
		</div>
	</form>
</body>
</html>
