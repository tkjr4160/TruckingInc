<!--

-->

<?php include "EmployeeSignInHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Employee Sign In</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../LoginStylesheet.css">
	<style>
		.Div {
			text-align: center;
			margin-top: 50px;
		}
	</style>
</head>
<body>
	<div class="Login">
		<div class="logo">
			<img src="../Pictures/TruckingIncLogo.png" alt="Logo" class= "logo">
		</div>
		<form action="EmployeeSignInHelper.php" method="post" class="Form">
			<div class="FormDiv">
				<p class="FormDivPar">
					<label class="FormDivParLabel">Username: </label>
					<input type="text" id="EmployeeUsername" name="EmployeeUsername" class="FormDivParText" size="20" maxlength="30" required/>
				</p>
				<p class="FormDivPar">
					<label class="FormDivParLabel">Password: </label>
					<input type="password" id="EmployeePassword" name="EmployeePassword" class="FormDivParText" size="20" maxlength="30" required/>
				</p>
				<p class="FormDivPar">
					<button type="submit" id="EmployeeSubmitButton" name="EmployeeSubmitButton" class="FormDivParButton" value="EmployeeSignIn">Submit</button>
					<button type="reset" id="EmployeeResetButton" name="EmployeeResetButton" class="FormDivParButton" value="Reset">Reset</button>
				</p>
			</div>
		</form>
		<div class="Div">
			<a href="../TruckingIncHome.php">Back to home</a>
		</div>
	</div>
</body>
</html>
