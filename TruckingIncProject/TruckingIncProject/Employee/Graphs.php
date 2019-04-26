<!--

-->

<?php

session_start();
include "../mysqli_connect.php";
include "CheckSignedIn.php";

$CheckPositionQuery = "Select position From Employee Where WebsiteUsername = '$_SESSION[EmployeeUsername]'";
$CheckPositionExecution = @mysqli_query($dbc, $CheckPositionQuery);
$fetchPositionCheck = mysqli_fetch_array($CheckPositionExecution);

$CheckPermissionsQuery = "SELECT permissionsType FROM EMPLOYEE WHERE WebsiteUsername = '$_SESSION[EmployeeUsername]'";
$CheckPermissionsExecution = @mysqli_query($dbc, $CheckPermissionsQuery);
$fetchPermissionsCheck = mysqli_fetch_array($CheckPermissionsExecution);

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Employee Graphs</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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
                <?php if ($fetchPermissionsCheck[0] == 'A' || $fetchPermissionsCheck[0] == 'B' || $fetchPermissionsCheck[0] == 'C') {echo '<li><a href="EmployeeViewShipments.php">View Shipments</a></li>';}?>
                <?php if ($fetchPermissionsCheck[0] == 'A' || $fetchPermissionsCheck[0] == 'B') {echo '<li><a href="AccountingInfo.php">Accounting Information</a></li>';}?>
                <li><a class="active" href="Graphs.php">Graphs</a></li>
                <li style="float:right; width:150px" ;>
                    <!-- Submitting to "EmployeeSignIn.php" -- needs to submit to "EmployeeHomeHelper.php" -->
                    <form action="EmployeeHomeHelper.php" method="POST" class="Form">
                        <button type="submit" id="EmployeeSignOutButton" name="EmployeeSignOutButton" class="FormDivParButton" value="EmployeeSignOut">Log Out</button>
                    </form>
                </li>
            </ul>
        </nav>

        <div id="page-heading">
            <h1><u>Graphs</u><br><br>
                <span>Example Graphs</span>
            </h1>
        </div>

    </header>
    <div class="wrapper">
        <div id="form">
            <form action="" method="post" class="Form">
                <div class="accountInfo-form"><br><br><br><br>
                    <table class="table-input">

                      <?php
                      echo '<canvas id="myCanvas" style="border:1px solid #000000;"></canvas>';

                      $timelineQuery = "SELECT DISTINCT YEAR(dt) AS Year, MONTH(dt) AS Month, DAY(dt) AS Day FROM Transact";
                      $timelineExecution = @mysqli_query($dbc, $timelineQuery);
                      $dateArray = '';
                      $incomeArray = '';
                      while ($row = mysqli_fetch_array($timelineExecution))
                      {
                        $year = $row['Year'];
                        $month = $row['Month'];
                        $day = $row['Day'];
                        $transactionQuery = "SELECT SUM(totalCost) FROM Transact WHERE YEAR(dt) = '$year' AND MONTH(dt) = '$month' AND DAY(dt) = '$day' GROUP BY YEAR(dt), MONTH(dt), DAY(dt)";
                        $transactionExecution = @mysqli_query($dbc, $transactionQuery);
                        $dayGains = mysqli_fetch_array($transactionExecution);

                        $incomeArray .= ', ' . $dayGains[0];
                        $dateArray .= ', ' . $month . ' + "/" + ' . $day . ' + "/" + ' . $year;

                      }
                      $incomeArray = ltrim($incomeArray, ',');
                      $dateArray = ltrim($dateArray, ',');
                      echo"
                      <script>
                      var dates = [$dateArray];
                      var income = [$incomeArray];
                      var ctx = document.getElementById('myCanvas');
                      var myCanvas = new Chart(ctx,
                      {
                        type: 'line',
                        data:
                        {
                          labels: dates,
                          datasets:
                          [
                            {
                              label: 'USD',
                              data: income,
                              borderColor: '#FFFF00',
                              backgroundColor: '#FFFF00',
                              fill: false
                            }
                          ]
                        },
                        options:
                        {
                          title:
                          {
                            display: true,
                            text: 'Dollar Amount Earned (by Day)'
                          }
                        }
                      });
                      </script>";
                      ?>

                    </table>
                </div>
            </form>
            <form action="" method="post" class="Form">
                <div class="accountInfo-form"><br><br><br><br>
                    <table class="table-input">

                      <?php
                      echo '<canvas id="myOtherCanvas" style="border:1px solid #000000;"></canvas>';

                      $timelineQuery = "SELECT DISTINCT YEAR(dt) AS Year, MONTH(dt) AS Month, DAY(dt) AS Day FROM Transact";
                      $timelineExecution = @mysqli_query($dbc, $timelineQuery);
                      $dateArray = '';
                      $cedarArray = '';
                      $cherryArray = '';
                      $hickoryArray = '';
                      $mapleArray = '';
                      $oakArray = '';

                      while ($row = mysqli_fetch_array($timelineExecution))
                      {
                        $year = $row['Year'];
                        $month = $row['Month'];
                        $day = $row['Day'];
                        $productOneQuery = "SELECT SUM(numberOfUnits) FROM Transact WHERE productID = '1' AND YEAR(dt) = '$year' AND MONTH(dt) = '$month' AND DAY(dt) = '$day' GROUP BY YEAR(dt), MONTH(dt), DAY(dt)";
                        $productOneExecution = @mysqli_query($dbc, $productOneQuery);
                        $productTwoQuery = "SELECT SUM(numberOfUnits) FROM Transact WHERE productID = '2' AND YEAR(dt) = '$year' AND MONTH(dt) = '$month' AND DAY(dt) = '$day' GROUP BY YEAR(dt), MONTH(dt), DAY(dt)";
                        $productTwoExecution = @mysqli_query($dbc, $productTwoQuery);
                        $productThreeQuery = "SELECT SUM(numberOfUnits) FROM Transact WHERE productID = '3' AND YEAR(dt) = '$year' AND MONTH(dt) = '$month' AND DAY(dt) = '$day' GROUP BY YEAR(dt), MONTH(dt), DAY(dt)";
                        $productThreeExecution = @mysqli_query($dbc, $productThreeQuery);
                        $productFourQuery = "SELECT SUM(numberOfUnits) FROM Transact WHERE productID = '4' AND YEAR(dt) = '$year' AND MONTH(dt) = '$month' AND DAY(dt) = '$day' GROUP BY YEAR(dt), MONTH(dt), DAY(dt)";
                        $productFourExecution = @mysqli_query($dbc, $productFourQuery);
                        $productFiveQuery = "SELECT SUM(numberOfUnits) FROM Transact WHERE productID = '5' AND YEAR(dt) = '$year' AND MONTH(dt) = '$month' AND DAY(dt) = '$day' GROUP BY YEAR(dt), MONTH(dt), DAY(dt)";
                        $productFiveExecution = @mysqli_query($dbc, $productFiveQuery);

                        $product1 = mysqli_fetch_array($productOneExecution);
                        $product2 = mysqli_fetch_array($productTwoExecution);
                        $product3 = mysqli_fetch_array($productThreeExecution);
                        $product4 = mysqli_fetch_array($productFourExecution);
                        $product5 = mysqli_fetch_array($productFiveExecution);

                        $cedarArray .= ', ' . $product3[0];
                        $cherryArray .= ', ' . $product5[0];
                        $hickoryArray .= ', ' . $product4[0];
                        $mapleArray .= ', ' . $product2[0];
                        $oakArray .= ', ' . $product1[0];

                        $dateArray .= ', ' . $month . ' + "/" + ' . $day . ' + "/" + ' . $year;

                      }
                      $cedarArray = ltrim($cedarArray, ',');
                      $cherryArray = ltrim($cherryArray, ',');
                      $hickoryArray = ltrim($hickoryArray, ',');
                      $mapleArray = ltrim($mapleArray, ',');
                      $oakArray = ltrim($oakArray, ',');

                      $dateArray = ltrim($dateArray, ',');
                      echo"
                      <script>
                      var dates = [$dateArray];
                      var cedar = [$cedarArray];
                      var cherry = [$cherryArray];
                      var hickory = [$hickoryArray];
                      var maple = [$mapleArray];
                      var oak = [$oakArray];
                      var ctx = document.getElementById('myOtherCanvas');
                      var myOtherCanvas = new Chart(ctx,
                      {
                        type: 'bar',
                        data:
                        {
                          labels: dates,
                          datasets:
                          [
                            {
                              label: 'Units Cedar',
                              data: cedar,
                              backgroundColor: '#FF00FF'
                            },
                            {
                              label: 'Units Cherry',
                              data: cherry,
                              backgroundColor: '#0000FF'
                            },
                            {
                              label: 'Units Hickory',
                              data: hickory,
                              backgroundColor: '#FF0000'
                            },
                            {
                              label: 'Units Maple',
                              data: maple,
                              backgroundColor: '#00FF00'
                            },
                            {
                              label: 'Units Oak',
                              data: oak,
                              backgroundColor: '#00FFFF'
                            }
                          ]
                        },
                        options:
                        {
                          title:
                          {
                            display: true,
                            text: 'Amount of Product Sold (by Day)'
                          }
                        }
                      });
                      </script>";
                      ?>

                    </table>
                </div>
            </form>
            <form action="" method="post" class="Form">
                <div class="accountInfo-form"><br><br><br><br>
                    <table class="table-input">

                      <?php
                      echo '<canvas id="myThirdCanvas" style="border:1px solid #000000;"></canvas>';

                      $permAQuery = "SELECT count(employeeID) FROM Employee WHERE permissionsType = 'A'";
                      $permBQuery = "SELECT count(employeeID) FROM Employee WHERE permissionsType = 'B'";
                      $permCQuery = "SELECT count(employeeID) FROM Employee WHERE permissionsType = 'C'";
                      $permDQuery = "SELECT count(employeeID) FROM Employee WHERE permissionsType = 'D'";
                      $noPermQuery = "SELECT count(employeeID) FROM EMPLOYEE WHERE permissionsType IS NULL";

                      $permAExecution = @mysqli_query($dbc, $permAQuery);
                      $permBExecution = @mysqli_query($dbc, $permBQuery);
                      $permCExecution = @mysqli_query($dbc, $permCQuery);
                      $permDExecution = @mysqli_query($dbc, $permDQuery);
                      $noPermExecution = @mysqli_query($dbc, $noPermQuery);

                      $permAArray = mysqli_fetch_array($permAExecution);
                      $permBArray = mysqli_fetch_array($permBExecution);
                      $permCArray = mysqli_fetch_array($permCExecution);
                      $permDArray = mysqli_fetch_array($permDExecution);
                      $noPermArray = mysqli_fetch_array($noPermExecution);

                      $permA = $permAArray[0];
                      $permB = $permBArray[0];
                      $permC = $permCArray[0];
                      $permD = $permDArray[0];
                      $noPerm = $noPermArray[0];

                      echo"
                      <script>
                      var permA = [$permA];
                      var permB = [$permB];
                      var permC = [$permC];
                      var permD = [$permD];
                      var noPerm = [$noPerm];
                      var something = ['Permission Types'];
                      var ctx = document.getElementById('myThirdCanvas');
                      var myThirdCanvas = new Chart(ctx,
                      {
                        type: 'pie',
                        data:
                        {
                          labels: ['Type A', 'Type B', 'Type C', 'Type D', 'Unassigned'],
                          datasets:
                          [
                            {

                              label: [''],
                              data: [$permA, $permB, $permC, $permD, $noPerm],
                              backgroundColor: ['#FFFF00', '#FF00FF', '#00FFFF', '#00FF00', '#FF0000'],
                              borderColor: ['#FFFF00', '#FF00FF', '#00FFFF', '#00FF00', '#FF0000']
                            }
                          ]
                        },
                        options:
                        {
                          title:
                          {
                            display: true,
                            text: 'Proportions of Different Permission Levels Among Employees'
                          }
                        }
                      });
                      </script>";
                      ?>

                    </table>
                </div>
            </form>
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
</body>

</html>
