<!--

-->

<?php include "EmployeePositionsAndPermissionsHelper.php"; ?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Employee Positions and Permissions</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <script src="../js/main.js"></script>
</head>

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
            <li><a class="active" href="EmployeePositionsAndPermissions.php">Positions and Permissions</a></li>
            <li><a href="EmployeeTakeJob.php">Find Job</a></li>
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
        <h1><u>Assign Employee Positions</u>
        </h1>
    </div>

</header>

<body>
    <div class="wrapper">
        <div id="form">
            <form action="EmployeePositionsAndPermissionsHelper.php" method="post" class="Form">
                <div class="accountInfo-form">
                    <br>
                    <table class="table" style="width: 90%;">
                        <tr class="edit-table-row">
                            <th><b><u>Employee ID</u></b></th>
                            <th><b><u>Employee Name</u></b></th>
                            <th><b><u>Employee Position</u></b></th>
                            <th><b><u>Employee Permission Level</u></b></th>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_array($EmployeeListExecution)) {
                            echo '
					<tr class="edit-table-row">
          <td>' . $row['employeeID'] . '</td>
          <td>' . $row['firstName'] . ' ' . $row['middleInitial'] . ' ' . $row['lastName'] . '</td>
          <td>
					<select id="ChangePosition" name="ChangePosition' . $row['employeeID'] . '" class="FormDivTableTrTdSel">
					<option value="' . $row['position'] . '">' . $row['position'] . '</option>
					<option value="Manager">Manager</option>
					<option value="Packager">Packager</option>
					<option value="Truck Driver">Truck Driver</option>
					<option value="IT">IT Department</option>
					</select>
					</td>
					<td>
					<select id="ChangePermission" name="ChangePermission' . $row['employeeID'] . '" class="FormDivTableTrTdSel">
					<option value="' . $row['permissionsType'] . '">' . $row['permissionsType'] . '</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
					</select>
					</td>
					<td style="background-color:#ffffff; border:none;">
					<button type="submit" id="ChangePermsAndPosButton" name="ChangePermsAndPosButton" class="FormDivTableTrTdButton" value="' . $row['employeeID'] . '">Submit</button>
					</td>
          </tr>';
                        }
                        echo '</table>';
                        ?>
                </div>
            </form>
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