<!--

-->

<?php include "EmployeeAccountHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Employee Account</title>
	<meta charset="utf-8"/>
</head>
<body class="Div">
	<div>
		<a href="EmployeeHome.php">Employee Home</a></br>
		<a href="../TruckingIncHome.php">Website Home</a>
	</div>
	<form action="EmployeeAccountHelper.php" method="post" class="Form">
		<div class="FormDiv">
			<table align="center" cellspacing="3" cellpadding="3" width="50%" class="FormDivTable">
			<tr class="FormDivTableTr">
			<td align="left" class="FormDivTableTrTd"><b>Employee ID</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Name</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Street</b></td>
			<td align="left" class="FormDivTableTrTd"><b>City</b></td>
			<td align="left" class="FormDivTableTrTd"><b>State</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Zip</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Phone</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Email</b></td>
			</tr>
			<tr>
			<?php
					echo '
					<td align="left" class="FormDivTableTrTd">' . $row['employeeID'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row['firstName'] . ' ' . $row['middleInitial'] . ' ' . $row['lastName'] . '</td>
					<td align="left" class="FormDivTableTrTd"><input type="text" name="streetChange" class="FormDivTableTrTdText" value="' . $row['street'] . '" size="20" maxlength="30"/></td>
					<td align="left" class="FormDivTableTrTd"><input type="text" name="cityChange" class="FormDivTableTrTdText" value="' . $row['city'] . '" size="20" maxlength="30"/></td>

					<td align="left" class="FormDivTableTrTd"><select id="" name="stateChange" class="FormDivTableTrTdSel">
						<option value="' . $row['state'] . '">' . $row['state'] . '</option>
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
					</select></td>

					<td align="left" class="FormDivTableTrTd"><input type="text" name="zipChange" class="FormDivTableTrTdText" value="' . $row['zip'] . '" size="15" maxlength="10"/></td>
					<td align="left" class="FormDivTableTrTd"><input type="text" name="phoneChange" class="FormDivTableTrTdText" value="' . $row['phone'] . '" size="15" maxlength="12"/></td>
					<td align="left" class="FormDivTableTrTd"><input type="text" name="emailChange" class="FormDivTableTrTdText" value="' . $row['email'] . '" size="20" maxlength="50"/></td>

					<td align="left" class="FormDivTableTrTd">
						<button type="submit" id="ChangeAccountDetailsButton" name="ChangeAccountDetailsButton" class="FormDivTableTrTdButton" value="' . $row['employeeID'] . '">Update</button>
					</td>';
			?>
			</tr>
			</table>
		</div>
	</form>
	<form action="EmployeeAccountHelper.php" method="post" class="Form">
		<div class="FormDiv">
			<table align="center" cellspacing="3" cellpadding="3" width="50%" class="FormDivTable">
			<tr class="FormDivTableTr">
			<td align="left" class="FormDivTableTrTd"><b>Current Password: </b></td>
			<td align="left" class="FormDivTableTrTd"><b>New Password: </b></td>
			<td align="left" class="FormDivTableTrTd"><b>Repeat New Password: </b></td>
			</tr>
			<tr class="FormDivTableTr">
			<td align="left" class="FormDivTableTrTd"><input name="CurrentPassword" id="CurrentPassword" class="FormDivTableTrTdText" size="20" maxlength="30"/></td>
			<td align="left" class="FormDivTableTrTd"><input name="NewPassword" id="NewPassword" class="FormDivTableTrTdText" size="20" maxlength="30"/></td>
			<td align="left" class="FormDivTableTrTd"><input name="RepeatNewPassword" id="RepeatNewPassword" class="FormDivTableTrTdText" size="20" maxlength="30"/></td>
			<td align="left" class="FormDivTableTrTd"><button name="ChangePasswordButton" id="ChangePasswordButton" class="FormDivTableTrTdButton" value="ChangePassword">Change Password</button></td>
			</tr>
			</table>
		</div>
	</form>
</body>
</html>
