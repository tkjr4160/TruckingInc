<!--

-->

<?php include "EmployeeResuplyHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Employee Resuply</title>
	<meta charset="utf-8"/>
</head>
<body class="Div">
	<div>
		<a href="EmployeeHome.php">Employee Home</a></br>
		<a href="../TruckingIncHome.php">Website Home</a>
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
