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
    <script src="../jquery-3.3.1.js">
    function myFunction()
    {
        var passw = document.getElementById("NewPassword");
        var passwr = document.getElementById("RepeatNewPassword");
        var zip = document.getElementById("ZipChange");
        var phone = document.getElementById("PhoneChange");
        if (!passw.checkValidity())
        {
          passw.innerHTML = passw.validationMessage;
        }
        else
        {
          passw.innerHTML = "";
        }
        if (!passwr.checkValidity())
        {
          passwr.innerHTML = passwr.validationMessage;
        }
        else
        {
          passwr.innerHTML = "";
        }
        if (!zip.checkValidity())
        {
          zip.innerHTML = zip.validationMessage;
        }
        else
        {
          zip.innerHTML = "";
        }
        if (!phone.checkValidity())
        {
          phone.innerHTML = phone.validationMessage;
        }
        else
        {
          phone.innerHTML = "";
        }
    }
    </script>
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
                <li><a class="active" href="EmployeeAccount.php">My Account</a></li>
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
            <h1><u>My Account</u><br><br>
                <span>Edit Account Information</span>
            </h1>
        </div>

    </header>
    <div class="wrapper">
        <div id="form">
            <form action="EmployeeAccountHelper.php" method="post" class="Form">
                <div class="accountInfo-form"><br><br><br><br>
                    <table class="table-input">
                        <br>
                        <tr>
                            <td><b>ID</b></td>
                            <td><b>Name</b></td>
                            <td><b>Street</b></td>
                            <td><b>City</b></td>
                            <td><b>State</b></td>
                            <td><b>Zip</b></td>
                            <td><b>Phone</b></td>
                            <td><b>Email</b></td>
                        </tr>
                        <tr>
                            <?php
                            echo '
					<td>' . $row['employeeID'] . '</td>
					<td>' . $row['firstName'] . ' ' . $row['middleInitial'] . ' ' . $row['lastName'] . '</td>
					<td><input type="text" id="streetChange" name="streetChange" class="FormDivTableTrTdText" value="' . $row['street'] . '" size="15" maxlength="30"/></td>
					<td><input type="text" id="cityChange" name="cityChange" class="FormDivTableTrTdText" value="' . $row['city'] . '" size="5" maxlength="30"/></td>

					<td><select id="stateChange" name="stateChange" class="FormDivTableTrTdSel">
						<option value="' . $row['state'] . '">' . $row['state'] . '</option>
						<option value="AL">AL</option> <option value="AK">AK</option> <option value="AZ">AZ</option> <option value="AR">AR</option> <option value="CA">CA</option>
						<option value="CO">CO</option> <option value="CT">CT</option> <option value="DE">DE</option> <option value="FL">FL</option> <option value="GA">GA</option>
						<option value="HI">HI</option> <option value="ID">ID</option> <option value="IL">IL</option> <option value="IN">IN</option> <option value="IA">IA</option>
						<option value="KS">KS</option> <option value="KY">KY</option> <option value="LA">LA</option> <option value="ME">ME</option> <option value="MD">MD</option>
						<option value="MA">MA</option> <option value="MI">MI</option> <option value="MN">MN</option> <option value="MS">MS</option> <option value="MO">MO</option>
						<option value="MT">MT</option> <option value="NE">NE</option> <option value="NV">NV</option> <option value="NH">NH</option> <option value="NJ">NJ</option>
						<option value="NM">NM</option> <option value="NY">NY</option> <option value="NC">NC</option> <option value="ND">ND</option> <option value="OH">OH</option>
						<option value="OK">OK</option> <option value="OR">OR</option> <option value="PA">PA</option> <option value="RI">RI</option> <option value="SC">SC</option>
						<option value="SD">SD</option> <option value="TN">TN</option> <option value="TX">TX</option> <option value="UT">UT</option> <option value="VT">VT</option>
						<option value="VA">VA</option> <option value="WA">WA</option> <option value="WV">WV</option> <option value="WI">WI</option> <option value="WY">WY</option>
					</select></td>

					<td><input title="Format: xxxxx or xxxxx-xxxx" type="text" id="zipChange" name="zipChange" class="FormDivTableTrTdText" value="' . $row['zip'] . '" size="7" maxlength="10" placeholder="11111 or 11111-1111" pattern="^\d{5}$|^\d{5}-\d{4}$"/></td>
					<td><input title="Format: xxx-xxx-xxxx" type="text" id="phoneChange" name="phoneChange" class="FormDivTableTrTdText" value="' . $row['phone'] . '" size="9" maxlength="12" placeholder="111-111-1111" pattern="((\(\d{3}\) ?)|(\d{3}-))?\d{3}-\d{4}"/></td>
					<td><input type="text" id="emailChange" name="emailChange" class="FormDivTableTrTdText" value="' . $row['email'] . '" size="18" maxlength="50" placeholder="email@website.com"/></td>

					<td style="background-color: #ffffff; border:none;width:144px;">
						<button type="submit" id="ChangeAccountDetailsButton" name="ChangeAccountDetailsButton" class="FormDivTableTrTdButton" value="' . $row['employeeID'] . '">Update</button>
					</td>';
                            ?>
                        </tr>
                    </table>
                </div>
            </form><br><br><br>
            <hr>
            <form action="EmployeeAccountHelper.php" method="post" class="Form">
                <div class="accountPass-form">
                    <br><br>
                    <table class="table-input">
                        <tr>
                            <td><b>Current Password: </b></td>
                            <td><b>New Password: </b></td>
                            <td><b>Repeat New Password: </b></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="CurrentPassword" id="CurrentPassword" class="FormDivTableTrTdText" size="20" maxlength="30"/ required></td>
                            <td><input title="Password must contain at least one uppercase letter, one lowercase letter and one number. May be up to 30 characters long" type="password" name="NewPassword" id="NewPassword" class="FormDivTableTrTdText" size="20" maxlength="30" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])\w{3,30}" required /></td>
                            <td><input title="Password must match" type="password" name="RepeatNewPassword" id="RepeatNewPassword" class="FormDivTableTrTdText" size="20" maxlength="30" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])\w{3,30}" required /></td>
                            <td style="background-color: #ffffff; border:none;width:144px;"><button name="ChangePasswordButton" id="ChangePasswordButton" class="FormDivTableTrTdButton" value="ChangePassword">Change Password</button></td>
                        </tr>
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
