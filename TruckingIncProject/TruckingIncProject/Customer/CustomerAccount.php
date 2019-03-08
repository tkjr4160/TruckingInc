<!--

-->

<?php include "CustomerAccountHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Customer Account</title>
	<meta charset="utf-8"/>
</head>
<body class="Div">
	<div>
		<a href="CustomerHome.php">Customer Home</a></br>
		<a href="../TruckingIncHome.php">Website Home</a>
	</div>
	<form action="CustomerSignIn.php" method="POST" class="Form">
		<div class="FormDiv">
			<p class="FormDivPar">
				<button type="submit" id="CustomerSignOutButton" name="CustomerSignOutButton" class="FormDivParButton" value="CustomerSignOut">Log Out</button>
			</p>
		</div>
	</form>
</body>
</html>
