<!--

-->

<?php include "EmployeeHomeHelper.php"; ?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Employee Home</title>
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
                <li><a class="active" href="EmployeeHome.php">Employee Home</a></li>
                <li><a href="EmployeeAccount.php">My Account</a></li>
                <li><a href="EmployeeCreateNewEmployee.php">New Employee</a></li>
                <li><a href="EmployeePositionsAndPermissions.php">Positions and Permissions</a></li>
                <?php if ($fetchPositionCheck[0] == 'Truck Driver') {echo '<li><a href="EmployeeTakeJob.php">Find Job</a></li>';}?>
                <li><a href="EmployeeAssignTruck.php">Truck Management</a></li>
                <li><a href="EmployeeResupply.php">Inventory</a></li>
                <li><a href="EmployeeViewShipments.php">View Shipments</a></li>
                <li><a href="AccountingInfo.php">Accounting Information</a></li>
                <li style="float:right; width:150px" ;>
                    <!-- Submitting to "EmployeeSignIn.php" -- needs to submit to "EmployeeHomeHelper.php" -->
                    <form action="EmployeeHomeHelper.php" method="POST" class="Form">
                        <button type="submit" id="EmployeeSignOutButton" name="EmployeeSignOutButton" class="FormDivParButton" value="EmployeeSignOut">Log Out</button>
                    </form>
                </li>
            </ul>
        </nav>

        <div id="page-heading">
            <h1><u>Welcome to Trucking Inc.</u><br><br>
                <span>Hardwood lumber when and where you need it.</span>
            </h1>
        </div>

    </header>

    <div class="wrapper">

        <div class="content">
            <div id="p">
                <p><br>
                    Trucking Inc. has been a trusted lumber distributor for over 20 years. We ship the highest quality
                    timber
                    from
                    our partnered midwestern logging suppliers. We offer Highly completitive pricing and hassle free,
                    flat
                    rate
                    delivery across the continental US.
                </p>
            </div>
            <h2><strong><u>Products</u></strong></h2>
            <div class="products">
                <h1>Cedar</h1>
                <img src="../images/cedar.png" alt="Cedar">
                <ul>
                    <li>$21 per unit.</li>
                    <li>Length: 8'2" - 8'4"</li>
                    <li>Diameter: 12"</li>
                    <li>Low Maintenance. Resisant to warping and splits</li>
                </ul>
            </div>
            <div class="products">
                <h1>Cherry</h1>
                <img src="../images/cherry.jpg" alt="Cherry">
                <ul>
                    <li>$27 per unit.</li>
                    <li>Length: 10'</li>
                    <li>Diameter: 13-14"</li>
                    <li>Easily shaped, and it polishes well. Unstained, it has a rich, beautiful color.</li>
                </ul>
            </div>
            <div class="products">
                <h1>Hickory</h1>
                <img src="../images/hickory.jpg" alt="Hickory">
                <ul>
                    <li>$25 per unit.</li>
                    <li>Length: 12'</li>
                    <li>Width: 15" - 18"</li>
                    <li>Low Maintenance. Resisant to warping and splits</li>
                </ul>
            </div>
            <div class="products">
                <h1>Maple</h1>
                <img src="../images/maple.jpg" alt="Maple">
                <ul>
                    <li>$17 per unit.</li>
                    <li>Length: 16'</li>
                    <li>Width: 18" - 24"</li>
                    <li>One of the hardest wood species, It can take a beating and look great for years.</li>
                </ul>
            </div>
            <div class="products">
                <h1>Oak</h1>
                <img src="../images/oak.jpg" alt="Oak">
                <ul>
                    <li>$11 per unit.</li>
                    <li>Length: 14'</li>
                    <li>Width: 14" - 22"</li>
                    <li>Very durable, great value.</li>
                </ul>
            </div>
            <h2><strong><u>About Us</u></strong></h2>
            <p>Trucking Inc. has been providing reliable logistics solutions since 1997. The company was started by the
                Bob
                family in Pittsburgh, Pennsylvania. It began as a small family operation with Bob and his son doing
                everything
                from driving, to accounting, to customer service. In 2000, the family decided to expand their company.
                They
                opened an office with a warehouse and hired on new staff including drivers, clerical workers, managers,
                and
                logistics specialists. The company continued to grow slowly and steadily over the years, with the
                Trucking
                Inc.
                name becoming synonymous with quality in the west-coast logistics market. Due to a new partnership with
                Amazon
                in 2017, the company expanded and opened a second office in Columbus, Ohio. </p>
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
