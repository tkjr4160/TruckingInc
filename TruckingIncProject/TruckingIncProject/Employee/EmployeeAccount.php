<!--

-->

<?php include "EmployeeAccountHelper.php"; ?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Employee Account</title>
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
            <li><a class="active" href="EmployeeAccount.php">My Account</a></li>
            <li><a href="EmployeePositionsAndPermissions.php">Positions and Permissions</a></li>
            <li><a href="EmployeeTakeJob.php">Find Job</a></li>
            <li><a href="EmployeeAssignTruck.php">Assign Truck</a></li>
            <li><a href="EmployeeResuply.php">Resupply</a></li>
            <li style="float:right; border-left: 1px solid grey; border-right: none"><a href="../TruckingIncHome.php">Website
                    Home</a></li>
        </ul>
    </nav>
</header>

<body>

</body>

</html> 