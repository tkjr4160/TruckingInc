<!--

-->

<?php include ('CustomerOrderHistoryHelper.php'); ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Order History</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../Styles.css">
</head>
<body>
	<div id="banner">
		<img src="../Pictures/TruckingIncLogo.png" alt="Logo" id= "logo">
	</div>
	<div class="Div">
		<a href="CustomerHome.php">Customer Home</a>
		<a href="../TruckingIncHome.php">Website Home</a>
	</div>
	<div id="form">
	<form action="CustomerOrderHistoryHelper.php" method="post" class="Form">
		<div class="FormDiv">
			<table align="center" cellspacing="3" cellpadding="3" width="50%" class="FormDivTable">
			<tr class="FormDivTableTr">
			<td align="left" class="FormDivTableTrTd"><b>Product ID</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Shipping Fee</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Number of Units</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Total Cost</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Status</b></td>
			</tr>
			<?php
			while ($row = mysqli_fetch_array($FindTransactionsExecution))
			{
				echo '
				<tr class="FormDivTableTr">
				<td align="left" class="FormDivTableTrTd">' . $row['productID'] . '</td>
				<td align="left" class="FormDivTableTrTd">' . $row['shippingFee'] . '</td>
				<td align="left" class="FormDivTableTrTd">' . $row['numberOfUnits'] . '</td>
				<td align="left" class="FormDivTableTrTd">' . $row['TotalCost'] . '</td>
				<td align="left" class="FormDivTableTrTd">' . $row['transactionStatus'] . '</td>
				</tr>';
			}
			?>
			</table>
		</div>
	</form>
	</div>
</body>
</html>
