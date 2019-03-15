<!--

-->

<?php include "CustomerCreateOrderHelper.php" ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>New Order</title>
	<meta charset="utf-8"/>
</head>
<body>
	<div class="Div">
		<a href="CustomerHome.php">Customer Home</a></br>
		<!-- <a href="../TruckingIncHome.php">Website Home</a> -->
	</div>
	
	<!-- -------------------------------- Create Customer Order --------------------------------  -->
	<form action="CustomerCreateOrder.php" method="POST" class="Form">
		<div align="center" class="FormDiv">

			<!-- Select Lumber Type -->
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

			<!-- Submit order -->
			<p class="FormDivPar">
				<button type="submit" id="CustomerCreateOrderButton" name="CustomerCreateOrderButton" class="FormDivParButton" value="CustomerCreateOrder">Submit</button>
			</p>
		</div>
	</form>
</body>
</html>
