<!--

-->

<?php include "EmployeeResupplyHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Resupply</title>
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
	<div align="center"><h2>View Inventory</h2></div>
	<!-- javascript filter search -->
	<input type="text" id="userInput" onkeyup="myFunction()" placeholder="Search by name" title="Type in a name">
	<div><table id="productTable" align="center" cellspacing="3" cellpadding="3" width="50%">
		<tr>
		<th align="left"><b>Product ID</b></td>
		<th align="left"><b>Lumber Type</b></td>
		<th align="left"><b>Sale Price/Unit</b></td>
		<th align="left"><b>Stock</b></td>
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
	<!-- HTML form confirmation - needs to include a summary? -->
	<form onsubmit="return confirm('Do you really want to submit the form?');" action="EmployeeResupply.php" method="POST" class="Form">
	<div class="FormDiv" align="center">
		
		<!-- Select product -->
		<table>
			<tr>
				<td>
					<label class="FormDivParLabel">Product: </label>
				</td>
				<td>
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
				</td>
			</tr>
				<td>
					<label class="FormDivParLabel">Vendor: </label>
				</td>
				<td>
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
				</td>
			<tr>
				<td>
					<label class="FormDivParLabel">Cost Per Unit: </label>
				</td>
				<td>
					<input type="text" id="CostPerUnit" name="CostPerUnit" class="FormDivParText" size="15" maxlength="30"/>
				</td>
			</tr>
			<tr>
				<td>
					<label class="FormDivParLabel">Quantity: </label>
				</td>
				<td>
					<input type="text" id="Quantity" name="Quantity" class="FormDivParText" size="15" maxlength="4"/>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
					<button type="Submit" id="AddPurchaseRecord" name="AddPurchaseRecord" class="FormDivParText" value="AddPurchaseRecord">Submit</button>
				</td>
			</tr>

		</table>
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
			<td>" . $row['quantity'] . "</td>
			<td>" . $row['costBoughtPerUnit'] . "</td>
			<td>" . $row['totalCost'] . "</td>
			</tr>";
		}
		?>
	</table>
	</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("userInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("productTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>
</html>
