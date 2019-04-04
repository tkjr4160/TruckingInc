<!--

-->

<?php include "EmployeeTakeJobHelper.php"; ?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Employee Take Job</title>
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
                <li><a href="EmployeeCreateNewEmployee.php">New Employee</a></li>
                <li><a href="EmployeePositionsAndPermissions.php">Positions and Permissions</a></li>
                <li><a class="active" href="EmployeeTakeJob.php">Find Job</a></li>
                <li><a href="EmployeeAssignTruck.php">Truck Management</a></li>
                <li><a href="EmployeeResupply.php">Inventory</a></li>
                <li><a href="EmployeeViewShipments.php">View Shipments</a></li>
                <li style="float:right; width:150px" ;>
                    <!-- Submitting to "EmployeeSignIn.php" -- needs to submit to "EmployeeHomeHelper.php" -->
                    <form action="EmployeeHomeHelper.php" method="POST" class="Form">
                        <button type="submit" id="EmployeeSignOutButton" name="EmployeeSignOutButton" class="FormDivParButton" value="EmployeeSignOut">Log Out</button>
                    </form>
                </li>
            </ul>
        </nav>

        <div id="page-heading">
            <h1><u>Inventory</u><br><br>
                <span>Add and View Trucking Inc. Inventory</span>
            </h1>
        </div>

    </header>
    <div class="wrapper">
        <div id="form">
            <br>
            <!-- List Available Shipments -->
            <div>
                <h3><u>Available Jobs</u></h3>
            </div>
            <br>
            <form action="EmployeeTakeJobHelper.php" method="POST" class="Form">
                <table class="table" style="width:90%;text-align:center;">
                    <tr>
                        <th><b>Shipment ID</b></th>
                        <th><b>Transaction ID</b></th>
                        <th><b>Product ID</b></th>
                        <th><b>Number of Units</b></th>
                        <th><b>Address</b></th>
                    </tr>
                    <?php
                    foreach ($shipmentsArray as $row) {
                        echo '
				<tr>
					<td>' . $row['shipmentID'] . '</td>
					<td>' . $row['transactionID'] . '</td>
					<td>' . $row['productID'] . '</td>
					<td>' . $row['numberOfUnits'] . '</td>
					<td>' . $row['street'] . ', ' . $row['city'] . ', ' . $row['state'] . ' ' . $row['zip'] . '</td>
					<td style="background-color:#ffffff;border:none;">
					<button type="submit" id="AcceptShipmentButton" name="AcceptShipmentButton" class="" value="' . $row['shipmentID'] . '">Accept Shipment</button>
					</td>
				</tr>';
                    }
                    ?>
                </table>
            </form>

            &nbsp;
            <div>
                <h3><u>My Accepted Jobs</u></h3>
            </div>
            <br>
            <table class="table" style="width:90%; text-align:center;">
                <tr>
                    <td align="left"><b>Shipment ID</b></td>
                    <td align="left"><b>Transaction ID</b></td>
                    <td align="left"><b>Product ID</b></td>
                    <td align="left"><b>Number of Units</b></td>
                    <td align="left"><b>Address</b></td>
                    <td align="left"><b>Accepted On</b></td>
                    <td align="left"><b>Mileage Used</b></td>
                    <td align="left"><b>Maintenance Costs</b></td>
                    <td align="left"><b>Fuel Costs</b></td>
                </tr>
                <?php
                foreach ($currentJobsArray as $row) {
                    echo '
                    <tr>
                        <td align="left">' . $row['shipmentID'] . '</td>
                        <td align="left">' . $row['transactionID'] . '</td>
                        <td align="left">' . $row['productID'] . '</td>
                        <td align="left">' . $row['numberOfUnits'] . '</td>
                        <td align="left">' . $row['street'] . ', ' . $row['city'] . ', ' . $row['state'] . ' ' . $row['zip'] . '</td>
                        <td align="left">' . $row['dt'] . '</td>
                        <form action="EmployeeTakeJobHelper.php" method="POST" class="Form">
                            <td align="left"> <input type="text" id="MileageUsed" name="MileageUsed" class="FormDivParText" size="15" maxlength="6" required/></td>
                            <td align="left"> <input type="text" id="TruckMaintenanceCosts" name="TruckMaintenanceCosts" class="FormDivParText" size="15" maxlength="6" required/></td>
                            <td align="left"> <input type="text" id="FuelCosts" name="FuelCosts" class="FormDivParText" size="15" maxlength="6" required/></td>
                            <input type="hidden" value="' . $row['shipmentID'] . '" name="ShipmentID"/>
                            <input type="hidden" value="' . $row['transactionID'] . '" name="TransactionID"/>
                            <td>
                            <button type="submit" id="UpdateShipmentButton" name="UpdateShipmentButton" class="FormDivParText" value="UpdateShipment">Update</button>
                            </td>
                        </form>
                    </tr>';
                }
                ?>
            </table>
            &nbsp;
            <div>
                <h3><u>My Completed Jobs</u></h3>
            </div>
                <table class="table" style="width:90%; text-align:center;">
                    <tr>
                        <td align="left"><b>Shipment ID</b></td>
                        <td align="left"><b>Transaction ID</b></td>
                        <td align="left"><b>Product ID</b></td>
                        <td align="left"><b>Number of Units</b></td>
                        <td align="left"><b>Address</b></td>
                        <td align="left"><b>Completed On</b></td>
                        <td align="left"><b>Mileage Used</b></td>
                        <td align="left"><b>Maintenance Costs</b></td>
                        <td align="left"><b>Fuel Costs</b></td>
                    </tr>
                    <?php
                    foreach ($completedJobsArray as $row) {
                        echo '
                        <tr>
                            <td align="left">' . $row['shipmentID'] . '</td>
                            <td align="left">' . $row['transactionID'] . '</td>
                            <td align="left">' . $row['productID'] . '</td>
                            <td align="left">' . $row['numberOfUnits'] . '</td>
                            <td align="left">' . $row['street'] . ', ' . $row['city'] . ', ' . $row['state'] . ' ' . $row['zip'] . '</td>
                            <td align-"left">' . $row['dt'] . '</td>
                            <td align="left">' . $row['mileageUsed'] . '</td>
                            <td align="left">' . $row['truckMaintenanceCosts'] . '</td>
                            <td align="left">' . $row['fuelCosts'] . '</td>
                        </tr>';
                    }
                    ?>
                </table>
            </table>
            <br>
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
