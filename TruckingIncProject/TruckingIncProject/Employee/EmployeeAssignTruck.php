<!--

-->

<?php include "EmployeeAssignTruckHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Assign Truck</title>
	<meta charset="utf-8"/>
</head>
<body class="Div">
	<div>
		<a href="EmployeeHome.php">Employee Home</a></br>
		<a href="../TruckingIncHome.php">Website Home</a>
	</div>
	<form action="EmployeeAssignTruck.php" method="POST" class="Form">
		<div class="FormDiv">
			<table align="center" cellspacing="3" cellpadding="3" width="50%">
			<tr>
			<td align="left"><b>Employee ID</b></td>
			<td align="left"><b>Employee Name</b></td>
			<td align="left"><b>Truck ID</b></td>
			</tr>
			<?php
				while ($row = mysqli_fetch_array($EmployeeListExecution))
				{
					echo '
					<tr>
					<td align="left">' . $row['employeeID'] . '</td>
					<td align="left">' . $row['firstName'] . ' ' . $row['middleInitial'] . ' ' . $row['lastName'] . '</td>

					<td align="left">
					<select name="ChangeTruck' . $row['employeeID'] . '">
					<option value="' . $row['truckID'] . '">' . $row['truckID'] . '</option>';
					$TruckListQuery = "Select * From Truck Where inUse = 'N'";
					$TruckListExecution = @mysqli_query($dbc, $TruckListQuery);
					while ($row2 = mysqli_fetch_array($TruckListExecution))
					{
						echo '<option value="' . $row2['truckID'] . '">' . $row['truckID'] . '</option>';
					}
					echo '
					</select>
					</td>
					</tr>';
				}
				echo '</table>';
			?>
		</div>
	</form>
</body>
</html>
