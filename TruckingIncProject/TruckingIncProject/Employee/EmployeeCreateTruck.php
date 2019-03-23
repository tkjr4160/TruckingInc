<!--

-->

<?php include "EmployeeCreateTruckHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Employee Sign Up</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../Styles.css">
</head>
<body>
	<div id="banner">
		<img src="../Pictures/TruckingIncLogo.png" alt="Logo" id="logo">
	</div>
	<div class="Div">
		<a href="EmployeeHome.php">Employee Home</a>
		<a href="../TruckingIncHome.php">Website Home</a>
	</div>
	<div id="form">
	<form action="EmployeeCreateTruckHelper.php" method="post" class="Form">
		<div class="FormDiv">
			<p class="FormDivPar">
				<label class="FormDivParLabel">Make: </label>
				<select id="TruckMake" name="TruckMake" class="FormDivParSel">
					<option value="BMW">BMW</option>
					<option value="Chevrolet">Chevrolet</option>
					<option value="Dodge">Dodge</option>
					<option value="Ford">Ford</option>
					<option value="Honda">Honda</option>
					<option value="Mercedes">Mercedes</option>
					<option value="Nissan">Nissan</option>
					<option value="Toyota">Toyota</option>
					<option value="Volvo">Volvo</option>
				</select>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Model: </label>
				<input type="text" id="TruckModel" name="TruckModel" class="FormDivParText" size="20" maxlength="30" required/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Color: </label>
				<input type="text" id="TruckColor" name="TruckColor" class="FormDivParText" size="20" maxlength="30" required/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">License No: </label>
				<input type="text" id="TruckLicense" name="TruckLicense" class="FormDivParText" size="20" maxlength="30" required/>
			</p>
			<p class="FormDivPar">
				<button type="submit" id="TruckSubmitButton" name="TruckSubmitButton" class="FormDivParText" value="RegisterTruck">Submit</button>
				<button type="reset" id="TruckResetButton" name="TruckResetButton" class="FormDivParButton" value="Reset">Reset</button>
			</p>
		</div>
	</form>
	<form action="EmployeeCreateTruckHelper.php" method="post" class="Form">
		<div class="FormDiv">
			<table align="center" cellspacing="3" cellpadding="3" width="50%" class="FormDivTable">
			<tr class="FormDivTableTr">
			<td align="left" class="FormDivTableTrTd"><b>Truck ID</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Make</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Model</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Color</b></td>
			<td align="left" class="FormDivTableTrTd"><b>License No</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Price</b></td>
			<td align="left" class="FormDivTableTrTd"><b>In Use?</b></td>
			</tr>
			<?php
				while ($row = mysqli_fetch_array($TruckListExecution))
        {
          echo'
					<tr class="FormDivTableTr">
          <td align="left" class="FormDivTableTrTd">' . $row['truckID'] . '</td>
          <td align="left" class="FormDivTableTrTd">' . $row['make'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row['model'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row['color'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row['licenseNo'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row['priceBoughtFor'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row['inUse'] . '</td>
          </tr>';
        }
        echo '</table>';
			?>
		</div>
	</form>
	</div>
</body>
</html>
