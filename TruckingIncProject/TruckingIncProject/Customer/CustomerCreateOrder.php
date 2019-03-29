<!--

-->

<?php include "CustomerCreateOrderHelper.php";?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Create Order</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type= "text/css" href="../Styles.css">
</head>
<body>
	<div id="banner">
		<img src="../Pictures/TruckingIncLogo.png" alt="Logo" id="logo">
	</div>
	<div class="Div">
		<a href="CustomerHome.php">Customer Home</a>
		<a href="../TruckingIncHome.php">Back to home</a>
	</div>
	<div id="form">
		<!-- -------------------------------- Create Customer Order --------------------------------  -->
		<form onsubmit="return confirm('Submit Order?');" action="CustomerCreateOrder.php" method="POST" class="Form">
		<div align="center" class="FormDiv">

			<!-- Select Lumber Type -->
			<h4>Lumber Choices</h4>
			<p class="FormDivPar">
				<label class="FormDivParLabel">Lumber Type: </label>
				<?php
				$lumberTypeList = '';
				while ($row = mysqli_fetch_array($lumberTypeExecution)) 
				{
					$lumberTypeList .= '<option value="' . $row['lumberType'] . '">' . $row['lumberType'] . '</option>';
				}
				?>
				<select name="SelectLumber<?php $row['lumberType'] ?>">
					<option disabled selected="true" value="Lumber">Select Lumber Type</option>
					<?php echo $lumberTypeList; ?>
				</select>
			</p>
			
			<!-- Enter Quantity -->
			<p class="FormDivPar">
				
				<label class="FormDivParLabel">Number of Units: </label>
				<input type="text" id="NumberUnits" name="NumberUnits" class="FormDivParSel" size="5"/>
			</p>

			<!-- Enter Shipping Address -->
			<h4>Shipping Address</h4>
			<p class="FormDivPar">
			<label class="FormDivParLabel">Street: </label>
			<input type="text" id="Street" name="Street" class="FormDivParSel" size="5"/>
			</p>

			<p class="FormDivPar">
			<label class="FormDivParLabel">City: </label>
			<input type="text" id="City" name="City" class="FormDivParSel" size="5"/>
			</p>

			<p class="FormDivPar">
				<label class="FormDivParLabel">State: </label>
				<select id="State" name="State" class="FormDivParSel">
				<option value="AL">AL</option> <option value="AK">AK</option> <option value="AZ">AZ</option> <option value="AR">AR</option> <option value="CA">CA</option>
				<option value="CO">CO</option> <option value="CT">CT</option> <option value="DE">DE</option> <option value="FL">FL</option> <option value="GA">GA</option>
				<option value="HI">HI</option> <option value="ID">ID</option> <option value="IL">IL</option> <option value="IN">IN</option> <option value="IA">IA</option>
				<option value="KS">KS</option> <option value="KY">KY</option> <option value="LA">LA</option> <option value="ME">ME</option> <option value="MD">MD</option>
				<option value="MA">MA</option> <option value="MI">MI</option> <option value="MN">MN</option> <option value="MS">MS</option> <option value="MO">MO</option>
				<option value="MT">MT</option> <option value="NE">NE</option> <option value="NV">NV</option> <option value="NH">NH</option> <option value="NJ">NJ</option>
				<option value="NM">NM</option> <option value="NY">NY</option> <option value="NC">NC</option> <option value="ND">ND</option> <option value="OH">OH</option>
				<option value="OK">OK</option> <option value="OR">OR</option> <option value="PA">PA</option> <option value="RI">RI</option> <option value="SC">SC</option>
				<option value="SD">SD</option> <option value="TN">TN</option> <option value="TX">TX</option> <option value="UT">UT</option> <option value="VT">VT</option>
				<option value="VA">VA</option> <option value="WA">WA</option> <option value="WV">WV</option> <option value="WI">WI</option> <option value="WY">WY</option>
				</select>
			</p>

			<p class="FormDivPar">
			<label class="FormDivParLabel">ZIP: </label>
			<input type="text" id="ZIP" name="ZIP" class="FormDivParSel" size="5"/>
			</p>

			<!-- Submit Order -->
			<p class="FormDivPar">
				<button type="submit" id="CustomerCreateOrderButton" name="CustomerCreateOrderButton" class="FormDivParButton" value="CustomerCreateOrder">Submit</button>
			</p>
		</form>

		<!-- List Transaction Information -->
		&nbsp;
		<div align="center"><h3>Transaction History</h3></div>
		<div class="FormDiv">
		<table align="center" cellspacing="3" cellpadding="3" width="50%">
			<tr>
				<td align="left"><b>Transaction ID</b></td>
				<td align="left"><b>Product ID</b></td>
				<td align="left"><b>Quantity</b></td>
				<td align="left"><b>Shipping Fee</b></td>
				<td align="left"><b>Total Cost</b></td>
				<td align="left"><b>Status</b></td>
			</tr>
			<?php
			while ($row = mysqli_fetch_array($transactionsExecute))
			{
				echo "<tr>
				<td>" . $row['transactionID'] . "</td>
				<td>" . $row['productID'] . "</td>
				<td>" . $row['numberOfUnits'] . "</td>
				<td>" . $row['shippingFee'] . "</td>
				<td>" . $row['totalCost'] . "</td>
				<td>" . $row['transactionStatus'] . "</td>
				</tr>";
			}
			?>
		</table>
	</div>
</body>
</html>
