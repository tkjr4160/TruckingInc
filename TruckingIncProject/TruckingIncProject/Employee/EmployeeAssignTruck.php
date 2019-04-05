

<!--
   -->
   <?php include "EmployeeAssignTruckHelper.php"; ?>
<!DOCTYPE HTML>
<html>
   <head>
      <title>Employee Assign Truck</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="../css/main.css" rel="stylesheet" type="text/css">
      <script src="../js/main.js"></script>
      <script src="../jquery-3.3.1.js">
      function myFunction()
         {
         var lnum=document.getElementByID("LicenseNum");
         if (!lnum.checkValidity()) 
            {
            document.getElementById("LicenseNum").innerHTML = lnum.validationMessage;
            }
         else 
            {
            document.getElementById("LicenseNum").innerHTML = "";
	  		} 
		}
	</script>
   </head>
   <body>
      <header>
         <div id="banner">
            <img src="../images/TruckingIncLogo.png" alt="Trucking Inc. Logo">
            <div id=session style="background-color:aliceblue;">
               <h3><u>Welcome!</u></h3>
               <br>
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
               <li><a href="EmployeeCreateNewEmployee.php">New Employee</a></li>
               <li><a href="EmployeePositionsAndPermissions.php">Positions and Permissions</a></li>
               <?php if ($fetchPositionCheck[0] == 'Truck Driver') {echo '<li><a href="EmployeeTakeJob.php">Find Job</a></li>';}?>
               <li><a class="active" href="EmployeeAssignTruck.php">Truck Management</a></li>
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
            <h1><u>Truck Management</u>
            </h1>
         </div>
      </header>
      <div class="wrapper">
         <div id="form">
            <div>
               <br>
               <h3><u>Assign Trucks</u></h3>
            </div>
            <form action="EmployeeAssignTruck.php" method="POST" class="Form">
               <br>
               <div class="accountInfo-form">
                  <table class="table-input" style="width:60%;">
                     <tr>
                        <th><b>Employee ID</b></th>
                        <th><b>Truck ID</b></th>
                     </tr>
                     <?php
                        $employeeList = '';
                        while ($row2 = mysqli_fetch_array($EmployeeListExecution)) {
                            $employeeList .= '<option value="' . $row2['employeeID'] . '">' . $row2['employeeID'] . '</option>';
                        }
                        $truckList = '';
                        while ($row2 = mysqli_fetch_array($TruckListExecution)) {
                            $truckList .= '<option value="' . $row2['truckID'] . '">' . $row2['truckID'] . '</option>';
                        }
                        ?>
                     <tr>
                        <td>
                           <select name="ChangeEmployee<?php $row2['employeeID'] ?>" required>
                              <option disabled selected="true" value="Employee">Select an Employee</option>
                              <?php echo $employeeList ?>
                           </select>
                        </td>
                        <td>
                           <select name="ChangeTruck<?php $row2['truckID'] ?>" required>
                              <option disabled selected="true" value="Truck">Select a Truck</option>
                              <?php echo $truckList ?>
                           </select>
                        </td>
                        <td style="background-color:#ffffff;border:none;width:150px;">
                           <button type="submit" id="AssignTruckButton" name="AssignTruckButton" class="FormDivParText" value="AssignTruck">Assign</button>
                        </td>
                     </tr>
                  </table>
               </div>
            </form>
            <br>
            <hr>
            <!-- -------------------------------- Unassign Trucks -------------------------------- -->
            <div>
               <h3><u>Unassign Trucks</u></h3>
            </div>
            <br>
            <form action="EmployeeAssignTruck.php" method="POST" class="Form">
               <div class="accountInfo-form">
            <form action="EmployeeAssignTruckHelper.php" method="POST" class="Form">
            <table class="table" style="width: 60%;">
            <tr>
            <th><b>Employee ID</b></th>
            <th><b>Truck ID</b></th>
            </tr>
            <?php
               while ($row3 = mysqli_fetch_array($EmployeeListExecution2)) {
                   echo '
               <tr>
               <td>' . $row3['employeeID'] . '</td>
               <td>' . $row3['truckID'] . '</td>
               <td style="background-color:#ffffff;border:none;width:150px;">
               <button type="submit" id="UnassignTruckButton" name="UnassignTruckButton" class="" value="' . $row3['employeeID'] . '">Unassign</button>
               </td>
               </tr>';
               }
               ?>
            </table>
            </form>
            </div>
            </form>
            <br>
            <hr>
            <!-- -------------------------------- Add Trucks -------------------------------- -->
            &nbsp;
            <div>
               <h3><u>Add Trucks</u></h3>
            </div>
            <br>
            <form action="EmployeeAssignTruckHelper.php" method="POST" class="Form">
               <div class="accountInfo-form">
                  <table class="table-input" style="width:60%;">
                     <tr>
                        <td>
                           <label class="FormDivParLabel">Make: </label>
                        </td>
                        <td>
                           <select id="TruckMake" name="TruckMake" class="FormDivParSel" required>
                              <option value="Volvo">Volvo</option>
                              <option value="Kenworth">Kenworth</option>
                              <option value="GMC">GMC</option>
                              <option value="MercendesBenz">Mercedes Benz</option>
                              <option value="Chevrolet">Chevrolet</option>
                           </select>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <label class="FormDivParLabel">Model: </label>
                        </td>
                        <td>
                           <input type="text" id="TruckModel" name="TruckModel" class="FormDivParText" size="15" maxlength="30" required/>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <label class="FormDivParLabel">Color: </label>
                        </td>
                        <td>
                           <input type="text" id="TruckColor" name="TruckColor" class="FormDivParText" size="15" maxlength="30" required/>
                        </td>
                     <tr>
                     <tr>
                        <td>
                           <label class="FormDivParLabel">Year: </label>
                        </td>
                        <td>
                           <input type="text" id="TruckYear" name="TruckYear" class="FormDivParText" size="15" maxlength="4" required/>
                        </td>
                     <tr>
                        <td>
                           <label class="FormDivParLabel">License Number: </label>
                        </td>
                        <td>
                          <input title="License number must be a minimum of 6 characters and a maximum of 8 characters" type="text" id="LicenseNum" name="LicenseNum" class="FormDivParText" size="15" maxlength="8" placeholder="111111" pattern="^(?=.*[0-9])\w{6,8}" required/>
                        </td>
                     <tr>
                     <tr>
                        <td>
                           <label class="FormDivParLabel">Purchase Price: </label>
                        </td>
                        <td>
                          <input type="number" id="PurchasePrice" name="PurchasePrice" class="FormDivParText" size="15" maxlength="6" required/>
                        </td>
                     <tr>
                        <td colspan="2">
                           <button type="submit" id="AddTruckButton" name="AddTruckButton" class="FormDivParText" value="AddTruck">Add Truck</button>
                        </td>
                     </tr>
                  </table>
               </div>
            </form>
            <br>
            <hr>
            <!-- -------------------------------- List Truck Records -------------------------------- -->
            &nbsp;
            <div>
               <h3><u>Truck Listings</u></h3>
            </div>
            <div class="accountInfo-form">
               <br>
               <form action="EmployeeAssignTruckHelper.php" method="POST" class="Form">
                  <table class="table" style="width:90%;">
                     <tr class="edit-table-row;">
                        <th><b>Truck ID&nbsp</b></th>
                        <th><b>Make</b></th>
                        <th><b>Model</b></th>
                        <th><b>Color</b></th>
                        <th><b>Year</b></th>
                        <th><b>Date Purchased</b></th>
                        <th><b>License Number</b></th>
                        <th><b>Purchase Price</b></th>
                        <th><b>In Use</b></th>
                        <th><b>Driver</b></th>
                     </tr>
                     <?php
                        while ($row = mysqli_fetch_array($TruckTableExecute)) {
                            echo '
                        <tr>
                        <td>' . $row['truckID'] . '</td>
                        <td>' . $row['make'] . '</td>
                        <td>' . $row['model'] . '</td>
                        <td>' . $row['color'] . '</td>
                        <td>' . $row['year'] . '</td>
                        <td>' . $row['dt'] . '</td>
                        <td>' . $row['licenseNo'] . '</td>
                        <td>' . $row['priceBoughtFor'] . '</td>
                        <td>' . $row['inUse'] . '</td>
                        <td>' . $row['employeeID'] . '</td>
                        <td style="background-color:#ffffff;border:none;width:150px;">
                        <button type="submit" id="RemoveTruckButton" name="RemoveTruckButton" class="" value="' . $row['truckID'] . '">Remove Truck</button>
                        </td>
                        </tr>';
                        }
                        ?>
                  </table>
               </form>
               <br><br>
            </div>
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

