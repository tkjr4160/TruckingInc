<!--

-->

<?php include "CustomerSignUpHelper.php";?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Customer Sign Up</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type= "text/css" href="../Styles.css">
</head>
<body>
	<div id="banner">
		<img src="../Pictures/TruckingIncLogo.png" alt="Logo" id="logo">
	</div>
	<div class="Div">
		<a href="CustomerSignIn.php">Already have an account? Sign in here</a>
		<a href="../TruckingIncHome.php">Back to home</a>
	</div>
	<div id="form">
	<form action="CustomerSignUpHelper.php" method="post" class="Form">
		<div class="FormDiv">
			<p class="FormDivPar">
				<label class="FormDivParLabel">Desired Username: </label>
				<input type="text" id="CustomerUsername" name="CustomerUsername" class="FormDivParText" size="20" maxlength="30" required/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">New Password: </label>
				<input type="password" id="CustomerPassword" name="CustomerPassword" class="FormDivParText" size="20" maxlength="30" required/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Repeat Password: </label>
				<input type="password" id="CustomerRepeatPassword" name="CustomerRepeatPassword" class="FormDivParText" size="20" maxlength="30" required/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">First Name: </label>
				<input type="text" id="CustomerFirstName" name="CustomerFirstName" class="FormDivParText" size="20" maxlength="30" required/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Middle Initial: </label>
				<input type="text" id="CustomerMiddleInitial" name="CustomerMiddleInitial" class="FormDivParText" size="2" maxlength="1" required/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Last Name: </label>
				<input type="text" id="CustomerLastName" name="CustomerLastName" class="FormDivParText" size="20" maxlength="30" required/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Street: </label>
				<input type="text" id="CustomerStreet" name="CustomerStreet" class="FormDivParText" size="20" maxlength="30" required/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">City: </label>
				<input type="text" id="CustomerCity" name="CustomerCity" class=""FormDivParText size="20" maxlength="30" required/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">State: </label>
					<select id="CustomerState" name="CustomerState" class="FormDivParSel">
				<option value="AL">AL</option> <option value="AK">AK</option> <option value="AZ">AZ</option> <option value="AR">AR</option> <option value="CA">CA</option>
				<option value="CO">CO</option> <option value="CT">CT</option> <option value="DE">DE</option> <option value="FL">FL</option> <option value="GA">GA</option>
				<option value="HI">HI</option> <option value="ID">ID</option> <option value="IL">IL</option> <option value="IN">IN</option> <option value="IA">IA</option>
				<option value="KS">KS</option> <option value="KY">KY</option> <option value="LA">LA</option> <option value="ME">ME</option> <option value="MD">MD</option>
				<option value="MA">MA</option> <option value="MI">MI</option> <option value="MN">MN</option> <option value="MS">MS</option> <option value="MO">MO</option>
				<option value="MT">MT</option> <option value="NE">NE</option> <option value="NV">NV</option> <option value="NH">NH</option> <option value="NJ">NJ</option>
				<option value="NM">NM</option> <option value="NY">NY</option> <option value="NC">NC</option> <option value="ND">ND</option> <option value="OH">OH</option>
				<option value="OK">OK</option> <option value="OR">OR</option> <option value="PA">PA</option> <option value="RI">RI</option> <option value="SC">SC</option>
				<option value="SD">SD</option> <option value="TN">TN</option> <option value="TX">TX</option> <option value="UT">UT</option> <option value="VT">VT</option>
				<option value="VA">VA</option> <option value="WA">WA</option> <option value="WV">WV</option> <option value="WI">WI</option> <option value="WY">WY</option>
					</select>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Zip: </label>
				<input type="text" id="CustomerZip" name="CustomerZip" class="FormDivParText" size="15" maxlength="10" required/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Phone: </label>
				<input type="text" id="CustomerPhone" name="CustomerPhone" class="FormDivParText" size="15" maxlength="12" required/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Email: </label>
				<input type="text" id="CustomerEmail" name="CustomerEmail" class="FormDivParText" size="20" maxlength="50" required/>
			</p>
			<p class="FormDivPar">
				<button type="submit" id="CustomerSubmitButton" name="CustomerSubmitButton" class="FormDivParText" value="RegisterCustomer">Submit</button>
				<button type="reset" id="CustomerResetButton" name="CustomerResetButton" class="FormDivParButton" value="Reset">Reset</button>
			</p>
		</div>
	</form>
	</div>
</body>
</html>
