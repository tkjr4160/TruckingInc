<!--

-->

<?php include('AccountingInfoHelper.php'); ?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Accounting Information</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../Styles.css">
	<link href="../css/main.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<header>
		<div id="banner">
			<img src="../images/TruckingIncLogo.png" alt="Trucking Inc. Logo">
			<div id=session style="background-color:aliceblue;">
				<h3><u>Welcome!</u></h3><br>
				<?php
				echo '<p><b>Signed in as: </b>' . $_SESSION['EmployeeUsername'] . '</p>';
				echo '<h6><b>Date: </b>' . date('l, F jS, Y') . '</h6>';
				?>
			</div>
			<div class="social-media">
				<div id="facebook">
					<a href="https://www.facebook.com/" target="_blank">
						<img src="../images/facebook.png" alt="Facebook" style="width:42px;height:42px;border:0;">
					</a>
				</div>
				<div id="twitter">
					<a href="https://twitter.com/?lang=en" target="_blank">
						<img src="../images/twitter.png" alt="Twitter" style="width:42px;height:42px;border:0;">
					</a>
				</div>
				<div id="instagram">
					<a href="https://www.instagram.com/" target="_blank">
						<img src="../images/instagram.png" alt="Instagram" style="width:42px;height:42px;border:0;">
					</a>
				</div>
				<div id="youtube">
					<a href="https://www.youtube.com/" target="_blank">
						<img src="../images/youtube.png" alt="YouTube" style="width:42px;height:42px;border:0;">
					</a>
				</div>
			</div>
		</div>

		<nav>
			<ul>
				<li><a href="EmployeeHome.php">Employee Home</a></li>
				<li><a href="EmployeeAccount.php">My Account</a></li>
				<li><a href="EmployeeCreateNewEmployee.php">New Employee</a></li>
				<li><a href="EmployeePositionsAndPermissions.php">Positions and Permissions</a></li>
				<li><a href="EmployeeAssignTruck.php">Truck Management</a></li>
				<li><a href="EmployeeResupply.php">Inventory</a></li>
				<li><a href="EmployeeViewShipments.php">View Shipments</a></li>
				<li><a class="active" href="AccountingInfo.php">Accounting Information</a></li>
				<li style="float:right; width:150px" ;>
					<!-- Submitting to "EmployeeSignIn.php" -- needs to submit to "EmployeeHomeHelper.php" -->
					<form action="EmployeeHomeHelper.php" method="POST" class="Form">
						<button type="submit" id="EmployeeSignOutButton" name="EmployeeSignOutButton" class="FormDivParButton" value="EmployeeSignOut">Log Out</button>
					</form>
				</li>
			</ul>
		</nav>

		<div id="page-heading">
			<h1><u>Accounting Info</u><br><br>
				<span></span>
			</h1>
		</div>

	</header>
	<div class="wrapper">
		<br>
		<div id="form" style="width:100%; align:center;">
			<form action="AccountingInfoHelper.php" method="post" class="Form" style="align:center;" id="AccountsReceivableForm" name="AccountsReceivableForm">
				<div class="FormDiv">
					<h1 style="text-align:center;"><b><u>Accounts Recievable</u></b></h1>
				</div>
				<div class="FormDiv">
					<table class="table" id="TransactionsTable" name="TransactionsTable" style="width:80%;">
						<!--Transactions Accounts Receivable-->
						<tr class="FormDivTableTr">
							<th class="FormDivTableTrTd"><b>Transaction Date</b></th>
							<th class="FormDivTableTrTd"><b>Transaction Number</b></th>
							<th class="FormDivTableTrTd"><b>Product Number</b></th>
							<th class="FormDivTableTrTd"><b>Number Sold</b></th>
							<th class="FormDivTableTrTd"><b>Total Amount</b></th>
						</tr>
						<?php
						echo $TransactionList;
						?>
						<tr class="FormDivTableTr">
							<th class="FormDivTableTrTd"><b>Total Earned:</b></th>
							<th class="FormDivTableTrTd"><?php echo $earned; ?></th>
						</tr>
					</table>
					<br>
				</div>
			</form>
			<form action="AccountingInfoHelper.php" method="post" class="Form" style="align:center;" id="AccountsPayableForm" name="AccountsPayableForm">
				<div class="FormDiv">
					<h1 style="text-align:center;"><b><u>Accounts Payable</u></b></h1>
				</div>
				<div class="FormDiv">
					<table class="table" id="ShipmentsTable" name="ShipmentsTable" style="width:80%;">
						<!--Shipments Accounts Payable-->
						<tr class="FormDivTableTr">
							<th class="FormDivTableTrTd"><b>Shipment Date</b></th>
							<th class="FormDivTableTrTd"><b>Shipment Number</b></th>
							<th class="FormDivTableTrTd"><b>Product Number</b></th>
							<th class="FormDivTableTrTd"><b>Distance Traveled</b></th>
							<th class="FormDivTableTrTd"><b>Maintenance Cost</b></th>
							<th class="FormDivTableTrTd"><b>Fuel Cost</b></th>
						</tr>
						<?php
															echo $ShipmentList;
															?>
					</table>
					<br>
					<table class="table" style="width:80%;">
						<!--Purchases Accounts Payable-->
						<tr class="FormDivTableTr">
							<th class="FormDivTableTrTd"><b>Purchase Date</b></th>
							<th class="FormDivTableTrTd"><b>Purchase Number</b></th>
							<th class="FormDivTableTrTd"><b>Product Number</b></th>
							<th class="FormDivTableTrTd"><b>Number Bought</b></th>
							<th class="FormDivTableTrTd"><b>Total Amount</b></th>
						</tr>
						<?php
															echo $ProductPurchaseList;
															?>
					</table>
					<br>

					<!--Trucks Accounts Payable-->
					<table class="table" style="width:80%;">
						<tr class="FormDivTableTr">
							<th class="FormDivTableTrTd"><b>Purchase Date</b></th>
							<th class="FormDivTableTrTd"><b>Truck Number</b></th>
							<th class="FormDivTableTrTd"><b>Price</b></th>
						</tr>
						<?php
															echo $TruckList;
															?>
						<tr class="FormDivTableTr">
							<th class="FormDivTableTrTd"><b>Total Spent:</b></th>
							<th class="FormDivTableTrTd"><?php echo $spent; ?></th>
						</tr>
					</table>
				</div>
			</form>
			<form action="AccountingInfoHelper.php" method="post" class="Form" style="align:center;" id="ProfitLossForm" name="ProfitLossForm">
				<div class="FormDiv">
					<h1 style="text-align:center;"><b><u>Balance Sheet</u></b></h1>
				</div>
				<div class="FormDiv">
					<table class="table" id="ProfitLossTable" name="ProfitLossTable" style="width:80%;>
						<?php
															echo '<tr class="FormDivTableTr"><td class="FormDivTableTrTd"><b>Balance: </b></td><td class="FormDivTableTrTd">' . $balance . '</td></tr>';
															echo '<tr class="FormDivTableTr"><td class="FormDivTableTrTd"><b>Total Earned: </b></td><td class="FormDivTableTrTd">' . $earned . '</td></tr>';
															echo '<tr class="FormDivTableTr"><td class="FormDivTableTrTd"><b>Total Spent: </b></td><td class="FormDivTableTrTd">' . $spent . '</td></tr>';
															echo '<tr class="FormDivTableTr"><td class="FormDivTableTrTd"><b>Assets: </b></td><td class="FormDivTableTrTd">' . ($truckAssets + $woodAssets) . '</td></tr>';
															echo '<tr class="FormDivTableTr"><td class="FormDivTableTrTd"><b>Liabilities: </b></td><td class="FormDivTableTrTd">' . ($truckAssets + $woodAssets - $balance) . '</td></tr>';
															?>
					</table>
				</div>
			</form>
		</div>
		<br>
	</div>
	<footer>
		<div class="location">
			<h1><strong><u>Locations</u></strong></h1>
			<Address>
				1552 Leo Street<br>
				Pittsburgh, PA, 15203<br>
				(724)216-1634
			</Address>
			<Address>
				623 Jessie Street<br>
				Columbus, OH, 43201<br>
				(740)651-1623
			</Address>
		</div>
		<div class="copyright">
			<p>Copyright &copy Trucking Inc. 1997-2019. All rights reserved.</p>
		</div>
	</footer>
</body>

</html>
