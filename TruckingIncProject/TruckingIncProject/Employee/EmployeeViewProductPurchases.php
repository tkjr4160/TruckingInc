<!--

-->

<?php include ('EmployeeViewProductPurchasesHelper.php'); ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>View Product Purchases</title>
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
	<form action="EmployeeViewProductPurchasesHelper.php" method="post" class="Form">
		<div class="FormDiv">
			<table align="center" cellspacing="3" cellpadding="3" width="50%" class="FormDivTable">
			<tr class="FormDivTableTr">
			<td align="left" class="FormDivTableTrTd"><b>Purchase ID</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Product ID</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Vendor ID</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Number of Units</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Total Cost</b></td>
			</tr>
			<?php
			while ($row = mysqli_fetch_array($FindProductPurchasesExecution))
			{
					echo '
					<tr class="FormDivTableTr">
					<td align="left" class="FormDivTableTrTd">' . $row['purchaseID'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row['productID'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row['vendorID'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row['quantity'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row['totalCost'] . '</td>
					</tr>';
			}
			?>
			</table>
		</div>
	</form>
	</div>
</body>
</html>
