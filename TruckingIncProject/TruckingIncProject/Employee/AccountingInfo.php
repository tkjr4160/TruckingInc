<!--

-->

<?php include ('AccountingInfoHelper.php'); ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Accounting Information</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../Styles.css">
	<link rel="stylesheet" type="text/css" href="AccountingInfo.css">
</head>
<body>
	<div id="banner">
		<img src="../Pictures/TruckingIncLogo.png" alt="Logo" id= "logo">
		<div id="session">
			<?php
				echo '<p><b>Signed in as: </b>' . $_SESSION['EmployeeUsername'] . '</p>';
				echo '<p><b>Date: </b>' . date('l, F jS, Y') . '</p>';
			?>
		</div>
	</div>
	<div class="Div">
		<a href="EmployeeHome.php">Employee Home</a>
		<a href="../TruckingIncHome.php">Website Home</a>
	</div>
	<div id="form" width="100%" align="center">
	<form action="AccountingInfoHelper.php" method="post" class="Form" align="center" id="AccountsReceivableForm" name="AccountsReceivableForm">
		<div class="FormDiv">
			<h1 align="center"><b>Accounts Recievable</b></h1>
		</div>
		<div class="FormDiv">
			<table align="center" cellspacing="3" cellpadding="3" width="30%" class="FormDivTable" id="TransactionsTable" name="TransactionsTable" border="1">
			<!--Transactions Accounts Receivable-->
			<tr class="FormDivTableTr">
			<td align="left" class="FormDivTableTrTd"><b>Transaction Date</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Transaction Number</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Product Number</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Number Sold</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Total Amount</b></td>
			</tr>
			<?php
				echo $TransactionList;
			?>
			<tr class="FormDivTableTr">
				<td align="left" class="FormDivTableTrTd"><b>Total Earned:</b></td><td align="left" class="FormDivTableTrTd"><?php echo $earned; ?></td>
			</tr>
			</table>
		</div>
	</form>
	<form action="AccountingInfoHelper.php" method="post" class="Form" align="center" id="AccountsPayableForm" name="AccountsPayableForm">
		<div class="FormDiv">
			<h1 align="center"><b>Accounts Payable</b></h1>
		</div>
		<div class="FormDiv">
			<table align="center" cellspacing="3" cellpadding="3" width="30%" class="FormDivTable" id="ShipmentsTable" name="ShipmentsTable" border="1">
			<!--Shipments Accounts Payable-->
			<tr class="FormDivTableTr">
			<td align="left" class="FormDivTableTrTd"><b>Shipment Date</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Shipment Number</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Product Number</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Distance Traveled</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Maintenance Cost</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Fuel Cost</b></td>
			</tr>
			<?php
				echo $ShipmentList;
			?>
			<!--Purchases Accounts Payable-->
			<tr class="FormDivTableTr">
			<td align="left" class="FormDivTableTrTd"><b>Purchase Date</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Purchase Number</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Product Number</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Number Bought</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Total Amount</b></td>
			</tr>
			<?php
				echo $ProductPurchaseList;
			?>
			<!--Trucks Accounts Payable-->
			<tr class="FormDivTableTr">
			<td align="left" class="FormDivTableTrTd"><b>Purchase Date</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Truck Number</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Price</b></td>
			</tr>
			<?php
				echo $TruckList;
			?>
			<tr class="FormDivTableTr">
				<td align="left" class="FormDivTableTrTd"><b>Total Spent:</b></td><td align="left" class="FormDivTableTrTd"><?php echo $spent; ?></td>
			</tr>
		</table>
	</div>
	</form>
	<form action="AccountingInfoHelper.php" method="post" class="Form" align="center" id="ProfitLossForm" name="ProfitLossForm">
		<div class="FormDiv">
			<h1 align="center"><b>Balance Sheet</b></h1>
		</div>
		<div class="FormDiv">
			<table align="center" cellspacing="3" cellpadding="3" width="30%" class="FormDivTable" id="ProfitLossTable" name="ProfitLossTable">
				<?php
				echo '<tr class="FormDivTableTr"><td align="left" class="FormDivTableTrTd"><b>Balance: </b></td><td align="left" class="FormDivTableTrTd">' . $balance . '</td></tr>';
				echo '<tr class="FormDivTableTr"><td align="left" class="FormDivTableTrTd"><b>Total Earned: </b></td><td align="left" class="FormDivTableTrTd">' . $earned . '</td></tr>';
				echo '<tr class="FormDivTableTr"><td align="left" class="FormDivTableTrTd"><b>Total Spent: </b></td><td align="left" class="FormDivTableTrTd">' . $spent . '</td></tr>';
				echo '<tr class="FormDivTableTr"><td align="left" class="FormDivTableTrTd"><b>Assets: </b></td><td align="left" class="FormDivTableTrTd">' . ($truckAssets + $woodAssets) . '</td></tr>';
				echo '<tr class="FormDivTableTr"><td align="left" class="FormDivTableTrTd"><b>Liabilities: </b></td><td align="left" class="FormDivTableTrTd">' . ($truckAssets + $woodAssets - $balance) . '</td></tr>';
				?>
			</table>
		</div>
</form>
</div>
</body>
</html>
