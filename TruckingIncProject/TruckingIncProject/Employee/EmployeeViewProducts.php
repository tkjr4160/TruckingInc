<!--

-->

<?php include ('EmployeeViewProductsHelper.php'); ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>View Products</title>
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
	<form action="EmployeeViewProductsHelper.php" method="post" class="Form">
		<div class="FormDiv">
			<table align="center" cellspacing="3" cellpadding="3" width="50%" class="FormDivTable">
			<tr class="FormDivTableTr">
			<td align="left" class="FormDivTableTrTd"><b>Product ID</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Lumber Type</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Vendor ID</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Unit Price (Buy)</b></td>
			<td align="left" class="FormDivTableTrTd"><b>Unit Price (Sell)</b></td>
      <td align="left" class="FormDivTableTrTd"><b>Num in Stock</b></td>
			</tr>
			<?php
			while ($row = mysqli_fetch_array($FindProductsExecution))
			{
					echo '
					<tr class="FormDivTableTr">
					<td align="left" class="FormDivTableTrTd">' . $row['productID'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row['lumberType'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row['vendorID'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row['costBoughtPerUnit'] . '</td>
					<td align="left" class="FormDivTableTrTd">' . $row['costSoldPerUnit'] . '</td>
          <td align="left" class="FormDivTableTrTd">' . $row['numInStock'] . '</td>
					</tr>';
			}
			?>
			</table>
		</div>
	</form>
	</div>
</body>
</html>
