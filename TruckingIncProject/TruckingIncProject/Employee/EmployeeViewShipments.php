<!--
-->

<?php include('EmployeeViewShipmentsHelper.php'); ?>

<!DOCTYPE HTML>
<html>

<head>
    <title>View Shipments</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <script src="../js/main.js"></script>
</head>

<body>
    <header>
        <div id="banner">
            <img src="../images/TruckingIncLogo.png" alt="Trucking Inc. Logo">
            <div id=session style="background-color:aliceblue;">
                <h3><u>Welcome!</u></h3><br>
                <?php
                echo '<p><b>Signed in as: <br>' . $_SESSION['EmployeeUsername'] . '</b></p>';
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
              <?php if ($fetchPermissionsCheck[0] == 'A') {echo '<li><a href="EmployeeCreateNewEmployee.php">New Employee</a></li>';}?>
              <?php if ($fetchPermissionsCheck[0] == 'A') {echo '<li><a href="EmployeePositionsAndPermissions.php">Positions and Permissions</a></li>';}?>
              <?php if ($fetchPositionCheck[0] == 'Truck Driver') {echo '<li><a href="EmployeeTakeJob.php">Find Job</a></li>';}?>
              <?php if ($fetchPermissionsCheck[0] == 'A' || $fetchPermissionsCheck[0] == 'B') {echo '<li><a href="EmployeeAssignTruck.php">Truck Management</a></li>';}?>
              <?php if ($fetchPermissionsCheck[0] == 'A' || $fetchPermissionsCheck[0] == 'B') {echo '<li><a href="EmployeeResupply.php">Inventory</a></li>';}?>
              <?php if ($fetchPermissionsCheck[0] == 'A' || $fetchPermissionsCheck[0] == 'B' || $fetchPermissionsCheck[0] == 'C') {echo '<li><a class="active" href="EmployeeViewShipments.php">View Shipments</a></li>';}?>
              <?php if ($fetchPermissionsCheck[0] == 'A' || $fetchPermissionsCheck[0] == 'B') {echo '<li><a href="AccountingInfo.php">Accounting Information</a></li>';}?>
              <li><a href="Graphs.php">Graphs</a></li>
                <li style="float:right; width:150px" ;>
                    <!-- Submitting to "EmployeeSignIn.php" -- needs to submit to "EmployeeHomeHelper.php" -->
                    <form action="EmployeeHomeHelper.php" method="POST" class="Form">
                        <button type="submit" id="EmployeeSignOutButton" name="EmployeeSignOutButton" class="FormDivParButton" value="EmployeeSignOut">Log Out</button>
                    </form>
                </li>
            </ul>
        </nav>

        <div id="page-heading">
            <h1><u>Shipments</u><br><br>
                <span></span>
            </h1>
        </div>

    </header>
    <div class="wrapper">
        <div id="form">
            <form action="EmployeeViewShipmentsHelper.php" method="post" class="Form">
                <div class="FormDiv">
                    <br>
                    <table class="table" style="text-align:center;">
                        <tr class="FormDivTableTr">
                            <th><b><u>Shipment ID</u></b></th>
                            <th><b><u>Employee ID</u></b></th>
                            <th><b><u>Customer ID</u></b></th>
                            <th><b><u>Mileage Used</u></b></th>
                            <th><b><u>Maintenance Cost</u></b></th>
                            <th><b><u>Fuel Cost</u></b></th>
                            <th><b><u>Shipping Fee</u></b></th>
                            <th><b><u>Number of Units</u></b></th>
                            <th><b><u>Total Cost</u></b></th>
                            <th><b><u>Status</u></b></th>
                            <th><b><u>Last Updated</u></b></th>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_array($FindTransactionsExecution)) {
                            $transactionID = $row['transactionID'];
                            $FindShipmentsQuery = 'SELECT * FROM Shipment WHERE transactionID = ' . $transactionID . '';
                            $FindShipmentsExecution = @mysqli_query($dbc, $FindShipmentsQuery);
                            if (!$FindShipmentsExecution) {
                                echo '<h1>System Error</h1>';
                                echo '<form action="EmployeeHome.php">';
                                echo '<p>Something went wrong...</p>';
                                echo '<button>Ok</button>';
                                echo '</form>';
                            } else {
                                $row1 = mysqli_fetch_array($FindShipmentsExecution);
                                echo '
					<tr class="FormDivTableTr">
					<td class="FormDivTableTrTd">' . $row1['shipmentID'] . '</td>
					<td class="FormDivTableTrTd">' . $row1['employeeID'] . '</td>
					<td class="FormDivTableTrTd">' . $row['customerID'] . '</td>
					<td class="FormDivTableTrTd">' . number_format($row1['mileageUsed'], 0) . '</td>
					<td class="FormDivTableTrTd">$' . number_format($row1['truckMaintenanceCosts'], 2) . '</td>
					<td class="FormDivTableTrTd">$' . number_format($row1['fuelCosts'], 2) . '</td>
					<td class="FormDivTableTrTd">$' . number_format($row['shippingFee'], 2) . '</td>
					<td class="FormDivTableTrTd">' . number_format($row['numberOfUnits'], 0) . '</td>
					<td class="FormDivTableTrTd">$' . number_format($row['totalCost'], 2) . '</td>
					<td class="FormDivTableTrTd">' . $row['transactionStatus'] . '</td>
					<td class="FormDivTableTrTd">' . $row1['dt'] . '</td>
					</tr>';
                            }
                        }
                        ?>
                    </table>
                    <br><br>
                </div>
            </form>
        </div>
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
