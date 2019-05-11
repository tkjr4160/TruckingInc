<!--

-->

<?php include "EmployeeResuplyHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Product Inventory Management</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/main.css" rel="stylesheet" type="text/css">
</head>

<header>
    <div id="banner">
        <img src="../images/TruckingIncLogo.png" alt="Logo" id="logo">
        <div id=session>
            <h3>Session Info</h3>
            <!-- Submitting to "EmployeeSignIn.php" -- needs to submit to "EmployeeHomeHelper.php" -->
            <form action="EmployeeHomeHelper.php" method="POST" class="Form">
                <div class="FormDiv">
                    <p class="FormDivPar">
                        <button type="submit" id="EmployeeSignOutButton" name="EmployeeSignOutButton" class="FormDivParButton" value="EmployeeSignOut">Log Out</button>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <nav>
        <ul>
            <li><a href="EmployeeHome.php">Employee Home</a></li>
            <li><a href="EmployeeAccount.php">My Account</a></li>
            <li><a href="EmployeeCreateNewEmployee.php">New Employee</a></li>
            <li><a href="EmployeePositionsAndPermissions.php">Positions and Permissions</a></li>
            <li><a href="EmployeeTakeJob.php">Find Job</a></li>
            <li><a href="EmployeeAssignTruck.php">Truck Management</a></li>
            <li><a class="active" href="EmployeeResupply.php">Inventory</a></li>
            <li><a href="EmployeeViewShipments.php">View Shipments</a></li>
            <li><a href="../TruckingIncHome.php">Website Home</a></li>
        </ul>
    </nav>
</header>

<body>

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
			<select name="SelectProduct<?php echo $row['lumberType']; ?>" required>
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
			<select name="SelectVendor<?php echo $row['vendor']; ?>" required>
				<option disabled selected="true" value="SelectVendor">Select Vendor</option>
				<?php echo $vendorList; ?>
			</select>
		</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Cost Per Unit: </label>
				<input type="text" id="CostPerUnit" name="CostPerUnit" class="FormDivParText" size="15" maxlength="30" required/>
			</p>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Quantity: </label>
				<input type="text" id="Quantity" name="Quantity" class="FormDivParText" size="15" maxlength="4" required/>
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
