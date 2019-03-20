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
</head>

<header>
    <div class="banner">
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
            <li><a href="EmployeeHome.php">Employee Home</a></a></li>
            <li><a href="EmployeeAccount.php">My Account</a></li>
            <li><a class="active" href="EmployeePositionsAndPermissions.php">Positions and Permissions</a></li>
            <li><a href="EmployeeTakeJob.php">Find Job</a></li>
            <li><a href="EmployeeAssignTruck.php">Assign Truck</a></li>
            <li><a href="EmployeeResuply.php">Resupply</a></li>
            <li style="float:right; border-left: 1px solid grey; border-right: none"><a href="../TruckingIncHome.php">Website
                    Home</a></li>
        </ul>
    </nav>
</header>

<body>
    <form action="EmployeePositionsAndPermissions.php" method="POST" class="transaction-form">
        <div class="FormDiv">
            <table align="center" cellspacing="3" cellpadding="3" width="50%">
                <tr>
                    <td align="left"><b>Employee ID</b></td>
                    <td align="left"><b>Employee Name</b></td>
                    <td align="left"><b>Employee Position</b></td>
                    <td align="left"><b>Employee Permission Level</b></td>
                </tr>
                <?php
								while ($row = mysqli_fetch_array($EmployeeListExecution)) {
									echo '
					<tr>
          <td align="left">' . $row['employeeID'] . '</td>
          <td align="left">' . $row['firstName'] . ' ' . $row['middleInitial'] . ' ' . $row['lastName'] . '</td>
          <td align="left">
					<select name="ChangePosition' . $row['employeeID'] . '">
					<option value="' . $row['position'] . '">' . $row['position'] . '</option>
					<option value="Manager">Manager</option>
					<option value="Packager">Packager</option>
					<option value="Truck Driver">Truck Driver</option>
					<option value="IT">IT Department</option>
					</select>
					</td>
					<td align="left">
					<select name="ChangePermission' . $row['employeeID'] . '">
					<option value="' . $row['permissionsType'] . '">' . $row['permissionsType'] . '</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
					</select>
					</td>
					<td>
					<button type="submit" id="ChangePermsAndPosButton" name="ChangePermsAndPosButton" class="" value="' . $row['employeeID'] . '">Submit</button>
					</td>
          </tr>';
								}
								echo '</table>';
								?>
        </div>
    </form>
</body>

</html> 