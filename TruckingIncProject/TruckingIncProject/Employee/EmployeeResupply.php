<!--
-->

<?php include "EmployeeResupplyHelper.php"; ?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Resupply</title>
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
              <?php if ($fetchPermissionsCheck[0] == 'A' || $fetchPermissionsCheck[0] == 'B') {echo '<li><a class="active" href="EmployeeResupply.php">Inventory</a></li>';}?>
              <?php if ($fetchPermissionsCheck[0] == 'A' || $fetchPermissionsCheck[0] == 'B' || $fetchPermissionsCheck[0] == 'C') {echo '<li><a href="EmployeeViewShipments.php">View Shipments</a></li>';}?>
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
            <h1><u>Inventory</u><br><br>
                <span>Add and View Trucking Inc. Inventory</span>
            </h1>
        </div>

    </header>
    <div class="wrapper">
        <div id="form">
            <br>
            <div class="inv-search">
                <h2><u>View Inventory</u></h2>
                <!-- javascript filter search -->
                <input type="text" id="userInput" onkeyup="myFunction()" placeholder="Search by name" title="Type in a name">
            </div>
            <div>
                <br>
                <table id="productTable" class="table" style="width:60%;">
                    <tr class="edit-table-row">
                        <th><b>Product ID</b></td>
                        <th><b>Lumber Type</b></td>
                        <th><b>Sale Price/Unit</b></td>
                        <th><b>Stock</b></td>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($viewInventoryExecute)) {
                        echo "<tr>
			<td>" . $row['productID'] . "</td>
			<td>" . $row['lumberType'] . "</td>
			<td>$" . number_format($row['costSoldPerUnit'], 2) . "</td>
			<td>" . number_format($row['numInStock'], 0) . "</td>
			</tr>";
                    }
                    ?>
                </table>
                <br>
            </div>
            <hr>
            <!-- -------------------------------- Add Purchase Entries -------------------------------- -->
            &nbsp;
            <div>
                <h2 style="text-align: center;"><u>Add Product Purchase Records</u></h2>
            </div>
            <!-- HTML form confirmation - needs to include a summary? -->
            <form onsubmit="return confirm('Do you really want to submit the form?');" action="EmployeeResupply.php" method="POST" class="Form">
                <div class="FormDiv">
                    <br>
                    <!-- Select product -->
                    <table class="table-input" style="width:60%;">
                        <tr class="edit-table-row">
                            <td>
                                <label class="FormDivParLabel">Product: </label>
                            </td>
                            <td>
                                <?php
                                $productIDList = '';
                                while ($row = mysqli_fetch_array($productNameExecute)) {
                                    $productIDList .= '<option value="' . $row['lumberType'] . '">' . $row['lumberType'] . '</option>';
                                }
                                ?>
                                <select id="SelectProduct" name="SelectProduct<?php echo $row['lumberType']; ?>" required>
                                    <option selected="true" disabled="disabled" value="">Select Product</option>
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
                            while ($row = mysqli_fetch_array($vendorNameExecute)) {
                                $vendorList .= '<option value="' . $row['companyName'] . '">' . $row['companyName'] . '</option>';
                            }
                            ?>
                            <select name="SelectVendor<?php echo $row['vendor']; ?>" required>
                                <option disabled selected="true" value="">Select Vendor</option>
                                <?php echo $vendorList; ?>
                            </select>
                        </td>
                        <tr class="edit-table-row">
                            <td>
                                <label class="FormDivParLabel">Cost Per Unit: </label>
                            </td>
                            <td>
                                <input title="This must be a number less than 10,000." type="text" id="CostPerUnit" name="CostPerUnit" class="FormDivParText" size="15" maxlength="30" pattern="[0-9]{1,4}" required/>
                            </td>
                        </tr>
                        <tr class="edit-table-row">
                            <td>
                                <label class="FormDivParLabel">Quantity: </label>
                            </td>
                            <td>
                                <input title="This must be a number less than 10,000." type="text" id="Quantity" name="Quantity" class="FormDivParText" size="15" maxlength="4" pattern="[0-9]{1,4}" required/>
                            </td>
                        </tr>
                        <tr class="edit-table-row">
                            <td colspan="2">
                                <button type="Submit" id="AddPurchaseRecord" name="AddPurchaseRecord" class="FormDivParText" value="AddPurchaseRecord">Submit</button>
                            </td>
                        </tr>

                    </table>
                    <br>
                </div>
            </form>
            <hr>
            <!-- -------------------------------- List Purchase Entries -------------------------------- -->
            &nbsp;
            <div>
                <h2 style="text-align: center;"><u>Product Purchase History</u></h2>
            </div>
            <br>
            <table class="table" style="width:80%">
                <tr class="edit-table-row">
                    <th><b>Purchase ID</b></th>
                    <th><b>Product ID</b></th>
                    <th><b>Vendor ID</b></th>
                    <th><b>Quantity</b></th>
                    <th><b>Cost Per Unit</b></th>
                    <th><b>Total Cost</b></th>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($viewHistoryExecute)) {
                    echo "<tr>
			<td>" . $row['purchaseID'] . "</td>
			<td>" . $row['productID'] . "</td>
			<td>" . $row['vendorID'] . "</td>
			<td>" . number_format($row['quantity'], 0) . "</td>
			<td>$" . number_format($row['costBoughtPerUnit'], 2) . "</td>
			<td>$" . number_format($row['totalCost'], 2) . "</td>
			</tr>";
                }
                ?>
            </table>
            <br><br>
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
