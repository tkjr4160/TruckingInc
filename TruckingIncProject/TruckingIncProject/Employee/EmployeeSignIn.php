<!--

-->

<?php include "EmployeeSignInHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Employee Sign In</title>
	<meta charset="utf-8"/>
</head>
<body>
	<div class="Div">
		<a href="EmployeeSignUp.php">No account? Sign up here</a></br>
		<a href="../TruckingIncHome.php">Back to home</a>
	</div>
	<form action="EmployeeSignInHelper.php" method="post" class="Form">
		<div class="FormDiv">
			<p class="FormDivPar">
				<label class="FormDivParLabel">Username: </label>
				<input type="text" id="EmployeeUsername" name="EmployeeUsername" class="FormDivParText" size="20" maxlength="30"/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Password: </label>
				<input type="text" id="EmployeePassword" name="EmployeePassword" class="FormDivParText" size="20" maxlength="30"/>
			</p>
			<p class="FormDivPar">
				<button type="submit" id="EmployeeSubmitButton" name="EmployeeSubmitButton" class="FormDivParButton" value="EmployeeSignIn">Submit</button>
			</p>
		</div>
	</form>
</body>
</html>
