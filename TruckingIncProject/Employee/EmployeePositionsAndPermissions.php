<!--

-->

<?php include "EmployeePositionsAndPermissionsHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Employee Positions and Permissions</title>
	<meta charset="utf-8"/>
</head>
<body class="Div">
	<div>
		<a href="EmployeeHome.php">Employee Home</a></br>
		<a href="../TruckingIncHome.php">Website Home</a>
	</div>

	<form action="EmployeePositionsAndPermissions.php" method="POST" class="Form">
		<div class="FormDiv">
			<table align="center" cellspacing="3" cellpadding="3" width="50%">
			<tr>
			<td align="left"><b>Employee ID</b></td>
			<td align="left"><b>Employee Name</b></td>
			<td align="left"><b>Employee Position</b></td>
			<td align="left"><b>Employee Permission Level</b></td>
			</tr>
			<?php
				while ($row = mysqli_fetch_array($EmployeeListExecution))
        {
          echo'
					<tr>
          <td align="left">' . $row['employeeID'] . '</td>
          <td align="left">' . $row['firstName'] . ' ' . $row['middleInitial'] . ' ' . $row['lastName'] . '</td>
          <td align="left">
					<select name="ChangePosition' . $row['employeeID'] . '">
					<option value="' . $row['position'] . '">' . $row['position'] . '</option>
					<option value="Manager">Manager</option>
					<option value="Packager">Packager</option>
					<option value="Truck Driver">Truck Driver</option>
					<option value="IT">IT Department</option>
					</select>
					</td>
					<td align="left">
					<select name="ChangePermission' . $row['employeeID'] . '">
					<option value="' . $row['permissionsType'] . '">' . $row['permissionsType'] . '</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
					</select>
					</td>
					<td>
					<button type="submit" id="ChangePermsAndPosButton" name="ChangePermsAndPosButton" class="" value="' . $row['employeeID'] . '">Submit</button>
					</td>
          </tr>';
        }
        echo '</table>';
			?>
		</div>
	</form>
</body>
</html>
