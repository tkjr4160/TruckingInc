<!--

-->

<?php include "EmployeeAssignTruckHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Manage Trucks</title>
	<meta charset="utf-8"/>
</head>
<body class="Div">
	<div>
		<a href="EmployeeHome.php">Employee Home</a></br>
		<!-- <a href="../TruckingIncHome.php">Website Home</a> -->
	</div>
	<div align="center"><h1>Truck Management</h1></div>
	&nbsp;

	<!-- -------------------------------- Assign Trucks -------------------------------- -->
	<div align="center"><h3>Assign Trucks</h3></div>
	<form action="EmployeeAssignTruck.php" method="POST" class="Form">
		<div class="FormDiv">
			<table align="center" cellspacing="3" cellpadding="3" width="50%">
			<tr>
				<td align="left"><b>Employee ID</b></td>
				<td align="left"><b>Truck ID</b></td>
				<td align="left"></td>
			</tr>
				<?php
				$employeeList = '';
				$truckList = '';
				
				while ($row = mysqli_fetch_array($EmployeeListExecution)) 
				{
					$employeeList .= '<option value="' . $row['employeeID'] . '">' . $row['employeeID'] . '</option>';
				}
				while ($row2 = mysqli_fetch_array($TruckListExecution))
				{
					$truckList .= '<option value="' . $row2['truckID'] . '">' . $row2['truckID'] . '</option>';
				}
				?>
				<tr>
					<td align="left">
						<select name="ChangeEmployee<?php $row['employeeID'] ?>">
							<option disabled selected="true" value="Employee">Select an Employee</option>
							<?php echo $employeeList ?>
						</select>
					</td>
					<td align="left">
						<select name="ChangeTruck <?php $row2['truckID'] ?>">
							<option disabled selected="true" value="Truck">Select a Truck</option>
							<?php echo $truckList ?>
						</select>
					</td>
					<td align="left">
					<button type="submit" id="AssignTruckButton" name="AssignTruckButton" class="FormDivParText" value="AssignTruck">Assign</button>
					</td>
				</tr>
			</table>
		</div>
	</form>

	<!-- -------------------------------- Unassign Trucks -------------------------------- -->
	<form action="EmployeeAssignTruck.php" method="POST" class="Form">
		<div class="FormDiv">
			<table align="center" cellspacing="3" cellpadding="3" width="50%">
			<tr>
			<td align="left"><b>Employee ID</b></td>
			<td align="left"><b>Truck ID</b></td>
			<td align="left"></td>
			</tr>
				<?php
				$employeeList2 = '';
				$truckList2 = '';
				while ($row = mysqli_fetch_array($EmployeeListExecution2)) 
				{
					$employeeList2 .= '<option value="' . $row['employeeID'] . '">' . $row['employeeID'] . '</option>';
				}
				while ($row2 = mysqli_fetch_array($TruckListExecution2))
				{
					$truckList2 .= '<option value="' . $row2['truckID'] . '">' . $row2['truckID'] . '</option>';
				}
				?>
			<tr>
				<td align="left">
					<select name="ChangeEmployee2<?php $row['employeeID'] ?>">
						<option disabled selected="true" value="Employee">Select an Employee</option>
						<?php echo $employeeList2 ?>
					</select>
				</td>
				<td align="left">
					<select name="ChangeTruck2 <?php $row2['truckID'] ?>">
						<option disabled selected="true" value="Truck">Select a Truck</option>
						<?php echo $truckList2 ?>
					</select>
				</td>
				<td align="left">
				<button type="submit" id="UnassignTruckButton" name="UnassignTruckButton" class="FormDivParText" value="UnassignTruck">Unasssign</button>
				</td>
			</tr>
			</table>
		</div>
	</form>

	<!-- -------------------------------- Add/Remove Trucks -------------------------------- -->
	&nbsp;
	<div align="center"><h3>Add Trucks</h3></div>
	<form action="EmployeeAssignTruckHelper.php" method="POST" class="Form">
		<div class="FormDiv" align="center">
			<p class="FormDivPar">
				<label class="FormDivParLabel">Make: </label>
				<select id="TruckMake" name="TruckMake" class="FormDivParSel">
					<option value="Volvo">Volvo</option> 
					<option value="Kenworth">Kenworth</option> 
					<option value="GMC">GMC</option>
					<option value="MercendesBenz">Mercedes Benz</option> 
					<option value="Chevrolet">Chevrolet</option> 
				</select>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Model: </label>
				<input type="text" id="TruckModel" name="TruckModel" class="FormDivParText" size="15" maxlength="30"/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Color: </label>
				<input type="text" id="TruckColor" name="TruckColor" class="FormDivParText" size="15" maxlength="30"/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Year: </label>
				<input type="text" id="TruckYear" name="TruckYear" class="FormDivParText" size="15" maxlength="4"/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">License Number: </label>
				<input type="text" id="LicenseNum" name="LicenseNum" class="FormDivParText" size="15" maxlength="30"/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Purchase Price: </label>
				<input type="text" id="PurchasePrice" name="PurchasePrice" class="FormDivParText" size="15" maxlength="6"/>
			<p class="FormDivPar">
				<button type="submit" id="AddTruckButton" name="AddTruckButton" class="FormDivParText" value="AddTruck">Add Truck</button>
			</p>
		</div>
	</form>


	<!-- -------------------------------- List Truck Records -------------------------------- -->
	&nbsp;
	<div align="center"><h3>Truck Listings</h3></div>
	<div class="FormDiv">
	<table align="center" cellspacing="3" cellpadding="3" width="50%">
		<tr>
			<td align="left"><b>Truck ID</b></td>
			<td align="left"><b>Make</b></td>
			<td align="left"><b>Model</b></td>
			<td align="left"><b>Color</b></td>
			<td align="left"><b>Year</b></td>
			<td align="left"><b>License Number</b></td>
			<td align="left"><b>Purchase Price</b></td>
			<td align="left"><b>In Use</b></td>
			<td align="left"><b>Driver</b></td>
		</tr>
		<?php
		while ($row = mysqli_fetch_array($TruckTableExecute))
		{
			echo "<tr>
			<td>" . $row['truckID'] . "</td>
			<td>" . $row['make'] . "</td>
			<td>" . $row['model'] . "</td>
			<td>" . $row['color'] . "</td>
			<td>" . $row['year'] . "</td>
			<td>" . $row['licenseNo'] . "</td>
			<td>" . $row['priceBoughtFor'] . "</td>
			<td>" . $row['inUse'] . "</td>
			<td>" . $row['employeeID'] . "</td>
			</tr>";
		}
		?>
	</table>
	</body>
</html>