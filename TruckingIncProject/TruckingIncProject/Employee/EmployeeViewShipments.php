<!--

-->

<?php include ('EmployeeViewShipmentsHelper.php'); ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>View Shipments</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../Styles.css">
</head>
<body>
	<div id="banner">
		<img src="../Pictures/TruckingIncLogo.png" alt="Logo" id= "logo">
	</div>
	<div class="Div">
		<a href="EmployeeHome.php">Employee Home</a>
		<a href="../TruckingIncHome.php">Website Home</a>
	</div>
	<div id="form">
	<form action="EmployeeViewShipmentsHelper.php" method="post" class="Form">
		<div class="FormDiv">
			<table align="center" cellspacing="3" cellpadding="3" width="50%" class="FormDivTable">
			<tr class="FormDivTableTr">
			<td align="left" class="FormDivTableTrTd"><b>Shipment ID</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Employee ID</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Customer ID</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Mileage Used</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Maintenance Cost</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Fuel Cost</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Shipping Fee</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Number of Units</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Total Cost</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Status</b></td>
			</tr>
			<?php
			while ($row = mysqli_fetch_array($FindTransactionsExecution))
			{
				$transactionID = $row['transactionID'];
				$FindShipmentsQuery = "Select * From Shipment Where transactionID = '$transactionID'";
		    $FindShipmentsExecution = @mysqli_query($dbc, $FindShipmentsQuery);

				if (!$FindShipmentsExecution)
				{
					echo '<h1>System Error</h1>';
				  echo '<form action="EmployeeHome.php">';
				  echo '<p>Something went wrong...</p>';
				  echo '<button>Ok</button>';
				  echo '</form>';
				}
				else
				{
					$row1 = mysqli_fetch_array($FindShipmentsExecution);
					echo '
					<tr class="FormDivTableTr">
					<td align="left" class="FormDivTableTrTd">' . $row1['shipmentID'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row1['employeeID'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row['customerID'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row1['mileageUsed'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row1['truckMaintenanceCosts'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row1['fuelCosts'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row['shippingFee'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row['numberOfUnits'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row['TotalCost'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row['transactionStatus'] . '</td>
					</tr>';
				}
			}
			?>
			</table>
		</div>
	</form>
	</div>
</body>
</html>
