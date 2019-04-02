<!--

-->

<?php include "CustomerCreateOrderHelper.php";?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Create Order</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type= "text/css" href="../Styles.css">
	<script src="../jquery-3.3.1.js"></script>
	<script src="../main.js"></script>
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
		<form action="CustomerCreateOrderHelper.php" method="POST" class="Form">
		<div align="center" class="FormDiv">

		<h3>Order Lumber</h3>
			<table>
				<tr>
					<td>
						<label class="FormDivParLabel">Lumber Type: </label>	
					</td>
					<td>
						<?php
						$lumberTypeList = '';
						while ($row = mysqli_fetch_array($lumberTypeExecution)) 
						{
							$lumberTypeList .= '<option value="' . $row['lumberType'] . '">' . $row['lumberType'] . '</option>';
						}
						?>
						<select id="LumberType" name="LumberType<?php $row['lumberType'] ?>">
							<option disabled selected="true" value="Lumber">Select Lumber Type</option>
							<?php echo $lumberTypeList; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<label class="FormDivParLabel">Number of Units: </label>
					</td>
					<td>
						<input type="text" id="NumberUnits" name="NumberUnits" class="FormDivParSel" size="5"/>
					</td>
				</tr>
				<tr>
					<td>
						<label class="FormDivParLabel">Street: </label>
					</td>
					<td>
						<input type="text" id="Street" name="Street" class="FormDivParSel" size="5"/>
					</td>
				</tr>
				<tr>
					<td>
						<label class="FormDivParLabel">City: </label>
					</td>
					<td>
						<input type="text" id="City" name="City" class="FormDivParSel" size="5"/>
					</td>
				</tr>
				<tr>
					<td>
						<label class="FormDivParLabel">State: </label>
					</td>
					<td>
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
					</td>
				</tr>
				<tr>
					<td>
						<label class="FormDivParLabel">ZIP: </label>
					</td>
					<td>
						<input type="text" id="ZIP" name="ZIP" class="FormDivParSel" size="5"/>
					</td>
				</tr>
				<tr>
					<td>
						<label class="FormDivParLabel">Card Number: </label>
					</td>
					<td>
						<input type="text" id="CardNumber" name="CardNumber" class="FormDivParSel" size="16" maxlength="16"/>
					</td>
				</tr>
				<tr>
					<td>
						<label class="FormDivParLabel">CVV: </label>
					</td>
					<td>
						<input type="text" id="CVV" name="CVV" class="FormDivParSel" size="3" maxlength="3"/>
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td>
					</td>
				</tr>
			</table>
		</div>
		
		<!-- The Modal -->
		<div id="myModal" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
			<span class="close">&times;</span>
			<div>
				<table align="center" cellspacing="3" cellpadding="3" width="50%" height="50%">
					<tr>
						<td align="right"><b>Lumber Type:</td>
						<td id="lumberType"></td>
					</tr>
					<tr>
						<td align="right"><b>Quantity:</td>
						<td id="numberUnits"></td>
					</tr>
					<tr>
						<td align="right"><b>Street:</td>
						<td id="street"></td>
					</tr>
					<tr>
						<td align="right"><b>City:</td>
						<td id="city"></td>
					</tr>
					<tr>
						<td align="right"><b>State:</td>
						<td id="state"></td>
					</tr>
					<tr>
						<td align="right"><b>ZIP:</td>
						<td id="zip"></td>
					</tr>
					<tr>
						<td align="right"><b>Card Number:</td>
						<td id="cardNumber"></td>
					</tr>
					<tr>
						<td align="right"><b>CVV:</td>
						<td id="cvv"></td>
					</tr>
					<tr>
						<td align="right"><b>Cost Per Unit:</td>
						<td id="costPerUnit"></td>
					</tr>
					<tr>
						<td align="right"><b>Shipping Fee:</td>
						<td id="shippingFee"></td>
					</tr>
					<tr>
						<td align="right"><b>Total Cost:</td>
						<td id="totalCost"></td>
					</tr>
				</table>
				<button type="submit" id="CustomerCreateOrderButton" name="CustomerCreateOrderButton" class="FormDivParButton" value="CustomerCreateOrder">Submit Order</button>
			</form>
				<button id="close" class="FormDivParButton">Cancel Order</button>
			</div>
		</div>
		</div>
		<!-- Submit Order -->
		<!-- Trigger/Open  Modal -->
		<button type="submit" onclick="myFunction()">Review Order</button>

		<!-- List Transaction Information -->
		&nbsp;&nbsp;&nbsp;
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
				<td align="left"><b>Order Placed On<b></td>
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
				<td>" . $row['dt'] . "</td>
				</tr>";
			}
			?>
		</table>
	</div>
</body>
<script>
	// Modal pop-up for order confirmation
	// Get modal
	var modal = document.getElementById('myModal');

	// Get <span> element that closes modal
	var span = document.getElementsByClassName("close")[0];
	var closeBtn = document.getElementById("close");

	//Open modal
	function modalDisplay() {
		modal.style.display = "block";
	}

	// When user clicks on <span> (x), close modal
	span.onclick = function() {
		modal.style.display = "none";
	}
	closeBtn.onclick = function() {
		modal.style.display = "none";
	}

	// When user clicks anywhere outside of modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
</script>
</html>
