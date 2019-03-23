<!--

-->

<?php include "EmployeePositionsAndPermissionsHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Employee Positions and Permissions</title>
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
	<form action="EmployeePositionsAndPermissionsHelper.php" method="post" class="Form">
		<div class="FormDiv">
			<table align="center" cellspacing="3" cellpadding="3" width="50%" class="FormDivTable">
			<tr class="FormDivTableTr">
			<td align="left" class="FormDivTableTrTd"><b>Employee ID</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Employee Name</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Employee Position</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Employee Permission Level</b></td>
			</tr>
			<?php
				while ($row = mysqli_fetch_array($EmployeeListExecution))
        {
          echo'
					<tr class="FormDivTableTr">
          <td align="left" class="FormDivTableTrTd">' . $row['employeeID'] . '</td>
          <td align="left" class="FormDivTableTrTd">' . $row['firstName'] . ' ' . $row['middleInitial'] . ' ' . $row['lastName'] . '</td>
          <td align="left" class="FormDivTableTrTd">
					<select id="ChangePosition" name="ChangePosition' . $row['employeeID'] . '" class="FormDivTableTrTdSel">
					<option value="' . $row['position'] . '">' . $row['position'] . '</option>
					<option value="Manager">Manager</option>
					<option value="Packager">Packager</option>
					<option value="Truck Driver">Truck Driver</option>
					<option value="IT">IT Department</option>
					</select>
					</td>
					<td align="left" class="FormDivTableTrTd">
					<select id="ChangePermission" name="ChangePermission' . $row['employeeID'] . '" class="FormDivTableTrTdSel">
					<option value="' . $row['permissionsType'] . '">' . $row['permissionsType'] . '</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
					</select>
					</td>
					<td align="left" class="FormDivTableTrTd">
					<button type="submit" id="ChangePermsAndPosButton" name="ChangePermsAndPosButton" class="FormDivTableTrTdButton" value="' . $row['employeeID'] . '">Submit</button>
					</td>
          </tr>';
        }
        echo '</table>';
			?>
		</div>
	</form>
	</div>
</body>
</html>
