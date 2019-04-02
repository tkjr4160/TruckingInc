<!--

-->

<?php include "EmployeeTakeJobHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Employee Take Job</title>
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
	<!-- List Available Shipments -->
	<div align="center"><h3>Available Jobs</h3></div>
	<form action="EmployeeTakeJobHelper.php" method="POST" class="Form">
		<table align="center" cellspacing="3" cellpadding="3" width="50%">
			<tr>
				<td align="left"><b>Shipment ID</b></td>
				<td align="left"><b>Transaction ID</b></td>
				<td align="left"><b>Product ID</b></td>
				<td align="left"><b>Number of Units</b></td>
				<td align="left"><b>Address</b></td>
			</tr>
			<?php
			foreach ($shipmentsArray as $row) {
				echo '
				<tr>
					<td align="left">' . $row['shipmentID'] . '</td>
					<td align="left">' . $row['transactionID'] . '</td>
					<td align="left">' . $row['productID'] . '</td>
					<td align="left">' . $row['numberOfUnits'] . '</td>
					<td align="left">' . $row['street'] . ', ' . $row['city'] . ', ' . $row['state'] . ' ' . $row['zip'] . '</td>
					<td>
					<button type="submit" id="AcceptShipmentButton" name="AcceptShipmentButton" class="" value="' . $row['shipmentID'] . '">Accept Shipment</button>
					</td>
				</tr>';
			}
			?>
		</table>
	</form>

	&nbsp;
	<div align="center"><h3>My Accepted Jobs</h3></div>
		<table align="center" cellspacing="3" cellpadding="3" width="50%">
			<tr>
				<td align="left"><b>Shipment ID</b></td>
				<td align="left"><b>Transaction ID</b></td>
				<td align="left"><b>Product ID</b></td>
				<td align="left"><b>Number of Units</b></td>
				<td align="left"><b>Address</b></td>
				<td align="left"><b>Accepted On</b></td>
				<td align="left"><b>Mileage Used</b></td>
				<td align="left"><b>Maintenance Costs</b></td>
				<td align="left"><b>Fuel Costs</b></td>
			</tr>
			<?php
			foreach ($currentJobsArray as $row) {
				echo '
				<tr>
					<td align="left">' . $row['shipmentID'] . '</td>
					<td align="left">' . $row['transactionID'] . '</td>
					<td align="left">' . $row['productID'] . '</td>
					<td align="left">' . $row['numberOfUnits'] . '</td>
					<td align="left">' . $row['street'] . ', ' . $row['city'] . ', ' . $row['state'] . ' ' . $row['zip'] . '</td>
					<td align="left">' . $row['dt'] . '</td>
					<form action="EmployeeTakeJobHelper.php" method="POST" class="Form">
						<td align="left"> <input type="text" id="MileageUsed" name="MileageUsed" class="FormDivParText" size="15" maxlength="6"/></td>
						<td align="left"> <input type="text" id="TruckMaintenanceCosts" name="TruckMaintenanceCosts" class="FormDivParText" size="15" maxlength="6"/></td>
						<td align="left"> <input type="text" id="FuelCosts" name="FuelCosts" class="FormDivParText" size="15" maxlength="6"/></td>
						<input type="hidden" value="' . $row['shipmentID'] . '" name="ShipmentID"/>
						<input type="hidden" value="' . $row['transactionID'] . '" name="TransactionID"/>
						<td>
						<button type="submit" id="UpdateShipmentButton" name="UpdateShipmentButton" class="FormDivParText" value="UpdateShipment">Update</button>
						</td>
					</form>
				</tr>';
			}
			?>
		</table>
	</div>
	&nbsp;
	<div align="center"><h3>My Completed Jobs</h3></div>
		<table align="center" cellspacing="3" cellpadding="3" width="50%">
			<tr>
				<td align="left"><b>Shipment ID</b></td>
				<td align="left"><b>Transaction ID</b></td>
				<td align="left"><b>Product ID</b></td>
				<td align="left"><b>Number of Units</b></td>
				<td align="left"><b>Address</b></td>
				<td align="left"><b>Completed On</b></td>
				<td align="left"><b>Mileage Used</b></td>
				<td align="left"><b>Maintenance Costs</b></td>
				<td align="left"><b>Fuel Costs</b></td>
			</tr>
			<?php
			foreach ($completedJobsArray as $row) {
				echo '
				<tr>
					<td align="left">' . $row['shipmentID'] . '</td>
					<td align="left">' . $row['transactionID'] . '</td>
					<td align="left">' . $row['productID'] . '</td>
					<td align="left">' . $row['numberOfUnits'] . '</td>
					<td align="left">' . $row['street'] . ', ' . $row['city'] . ', ' . $row['state'] . ' ' . $row['zip'] . '</td>
					<td align-"left">' . $row['dt'] . '</td>
					<td align="left">' . $row['mileageUsed'] . '</td>
					<td align="left">' . $row['truckMaintenanceCosts'] . '</td>
					<td align="left">' . $row['fuelCosts'] . '</td>
				</tr>';
			}
			?>
		</table>
	</div>
</body>
</html>
