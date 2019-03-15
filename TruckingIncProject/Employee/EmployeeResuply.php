<!--

-->

<?php include "EmployeeResuplyHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Product Inventory Management</title>
	<meta charset="utf-8"/>
</head>
<body class="Div">
	<div>
		<a href="EmployeeHome.php">Employee Home</a></br>
		<!-- <a href="../TruckingIncHome.php">Website Home</a> -->
	</div>

	<!-- -------------------------------- View Inventory -------------------------------- -->
	<div align="center"><h2>View Inventory</h2></div>
	<div><table align="center" cellspacing="3" cellpadding="3" width="50%">
		<tr>
		<td align="left"><b>Product ID</b></td>
		<td align="left"><b>Lumber Type</b></td>
		<td align="left"><b>Sale Price/Unit</b></td>
		<td align="left"><b>Stock</b></td>
		</tr>
		<?php
		while ($row = mysqli_fetch_array($viewInventoryExecute))
		{
			echo "<tr>
			<td>" . $row['productID'] . "</td>
			<td>" . $row['lumberType'] . "</td>
			<td>" . $row['costSoldPerUnit'] . "</td>
			<td>" . $row['numInStock'] . "</td>
			</tr>";
		}
		?>
	</table></div>

	<!-- -------------------------------- Add Purchase Entries -------------------------------- -->
	&nbsp;
	<div align="center"><h2>Add Product Purchase Records</h2></div>
	<form action="EmployeeResuply.php" method="POST" class="Form">
	<div class="FormDiv" align="center">
		
		<!-- Select product -->
		<p class="FormDivPar">
			<label class="FormDivParLabel">Product: </label>
			<?php
			$productIDList = '';
			while ($row = mysqli_fetch_array($productNameExecute)) 
			{
				$productIDList .= '<option value="' . $row['lumberType'] . '">' . $row['lumberType'] . '</option>';
			}
			?>
			<select name="SelectProduct<?php echo $row['lumberType']; ?>">
				<option disabled selected="true" value="SelectProduct">Select Product</option>
				<?php echo $productIDList; ?>
			</select>
		</p>

		<!-- Select Vendor -->
		<p class="FormDivPar">
			<label class="FormDivParLabel">Vendor: </label>
			<?php
			$vendorList = '';
			while ($row = mysqli_fetch_array($vendorNameExecute)) 
			{
				$vendorList .= '<option value="' . $row['companyName'] . '">' . $row['companyName'] . '</option>';
			}
			?>
			<select name="SelectVendor<?php echo $row['vendor']; ?>">
				<option disabled selected="true" value="SelectVendor">Select Vendor</option>
				<?php echo $vendorList; ?>
			</select>
		</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Cost Per Unit: </label>
				<input type="text" id="CostPerUnit" name="CostPerUnit" class="FormDivParText" size="15" maxlength="30"/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Quantity: </label>
				<input type="text" id="Quantity" name="Quantity" class="FormDivParText" size="15" maxlength="4"/>
			</p>
			<p class="FormDivPar">
				<button type="Submit" id="AddPurchaseRecord" name="AddPurchaseRecord" class="FormDivParText" value="AddPurchaseRecord">Submit</button>
			</p>
		</div>
	</form>

	<!-- -------------------------------- List Purchase Entries -------------------------------- -->
	&nbsp;
	<div align="center"><h2>Product Purchase History</h2></div>
	<table align="center" cellspacing="3" cellpadding="3" width="50%">
		<tr>
		<td align="left"><b>Purchase ID</b></td>
		<td align="left"><b>Product ID</b></td>
		<td align="left"><b>Vendor ID</b></td>
		<td align="left"><b>Quantity</b></td>
		<td align="left"><b>Cost Per Unit</b></td>
		<td align="left"><b>Total Cost</b></td>
		</tr>
		<?php
		while ($row = mysqli_fetch_array($viewHistoryExecute))
		{
			echo "<tr>
			<td>" . $row['purchaseID'] . "</td>
			<td>" . $row['productID'] . "</td>
			<td>" . $row['vendorID'] . "</td>
			<td>" . $row['costPerUnit'] . "</td>
			<td>" . $row['quantity'] . "</td>
			<td>" . $row['totalCost'] . "</td>
			</tr>";
		}
		?>
	</table>
</body>
</html>
