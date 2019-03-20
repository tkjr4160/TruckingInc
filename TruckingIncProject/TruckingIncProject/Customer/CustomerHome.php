<!--

-->

<?php include "CustomerHomeHelper.php"; ?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Customer Home</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/main.css" rel="stylesheet" type="text/css">
</head>

<header>
    <div class="banner">
        <img src="../images/TruckingIncLogo.png" alt="Logo" id="logo">
        <div id=session>
            <h3>Session Info</h3>
            <!-- Submitting to "CustomerSignIn.php" -- needs to submit to "CustomerHomeHelper.php" -->
            <form action="CustomerSignIn.php" method="post" class="Form">
                <div class="FormDiv">
                    <p class="FormDivPar">
                        <button type="submit" id="CustomerSignOutButton" name="CustomerSignOutButton" class="FormDivParButton" value="CustomerSignOut">Log Out</button>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <nav>
        <ul>
            <li><a class="active" href="CustomerHome.php">Customer Home</a></li>
            <li><a href="CustomerCreateOrder.php">New Order</a></li>
            <li><a href="CustomerOrderHistory.php">Order History</a></li>
            <li><a href="CustomerAccount.php">My Account</a></li>
            <li style="float:right; border-left: 1px solid grey; border-right: #0D407A"><a href="../TruckingIncHome.php">Website
                    Home</a></li>
        </ul>
    </nav>
</header>

<body>

</body>

</html> 