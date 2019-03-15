<!--

-->

<?php include "CustomerSignInHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Customer Sign In</title>
	<meta charset="utf-8"/>
</head>
<body>
	<div class="Div">
		<a href="CustomerSignUp.php">No account? Sign up here</a></br>
		<a href="../TruckingIncHome.php">Back to home</a>
	</div>
	<form action="CustomerSignInHelper.php" method="post" class="Form">
		<div class="FormDiv">
			<p class="FormDivPar">
				<label class="FormDivParLabel">Username: </label>
				<input type="text" id="CustomerUsername" name="CustomerUsername" class="FormDivParText" size="20" maxlength="30"/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Password: </label>
				<input type="text" id="CustomerPassword" name="CustomerPassword" class="FormDivParText" size="20" maxlength="30"/>
			</p>
			<p class="FormDivPar">
				<button type="submit" id="CustomerSubmitButton" name="CustomerSubmitButton" class="FormDivParButton" value="CustomerSignIn">Submit</button>
			</p>
		</div>
	</form>
</body>
</html>
