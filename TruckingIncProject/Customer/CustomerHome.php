<!--

-->

<?php include "CustomerHomeHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Customer Home</title>
	<meta charset="utf-8"/>
</head>
<body>
	<div class="Div">
		<a href="CustomerCreateOrder.php">New Order</a></br>
		<a href="CustomerOrderHistory.php">Order History</a></br>
		<a href="CustomerAccount.php">My Account</a></br>
		<a href="../TruckingIncHome.php">Website Home</a>
	</div>
	<form action="CustomerSignIn.php" method="post" class="Form">
		<div class="FormDiv">
			<p class="FormDivPar">
				<button type="submit" id="CustomerSignOutButton" name="CustomerSignOutButton" class="FormDivParButton" value="CustomerSignOut">Log Out</button>
			</p>
		</div>
	</form>
</body>
</html>
