<!--
-->

<?php include "EmployeeCreateNewEmployeeHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Create Employee</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <script src="../jquery-3.3.1.js">
    function myFunction()
    {
        var passw = document.getElementById("EmployeePassword");
        var passwr = document.getElementById("EmployeeRepeatPassword");
        var zip = document.getElementById("EmployeeZip");
        var phone = document.getElementById("EmployeePhone");
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
                echo '<div class="session"><p><b>Signed in as: <br>' . $_SESSION['EmployeeUsername'] . '</b></p></div>';
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
                <li><a class="active" href="EmployeeCreateNewEmployee.php">New Employee</a></li>
                <li><a href="EmployeePositionsAndPermissions.php">Positions and Permissions</a></li>
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
            <h1><u>Create New Employee</u><br><br>
                <span></span>
            </h1>
        </div>

    </header>
    <div class="wrapper">
        <div id="form">
            <form action="EmployeeCreateNewEmployeeHelper.php" method="post" class="Form">
                <br>
                <div class="accountInfo-form">
                    <br>
                    <table class="table-input" style="width:50%; border: solid 1px black; box-shadow: 1px 2px rgba(0, 0, 0, 0.582);">
                        <tr>
                            <td>
                                <label class="FormDivParLabel">Desired Username: </label>
                            </td>
                            <td>
                                <input type="text" id="EmployeeUsername" name="EmployeeUsername" class="FormDivParText" size="20" maxlength="30" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="FormDivParLabel">New Password: </label>
                            </td>
                            <td>
                                <input title="Password must contain at least one uppercase letter, one lowercase letter and one number. May be up to 30 characters long" type="password" id="EmployeePassword" name="EmployeePassword" class="FormDivParText" size="20" maxlength="30" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])\w{3,30}" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="FormDivParLabel">Repeat Password: </label>
                            </td>
                            <td>
                                <input title="Password must match" type="password" id="EmployeeRepeatPassword" name="EmployeeRepeatPassword" class="FormDivParText" size="20" maxlength="30" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])\w{3,30}" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="FormDivParLabel">First Name: </label>
                            </td>
                            <td>
                                <input type="text" id="EmployeeFirstName" name="EmployeeFirstName" class="FormDivParText" size="20" maxlength="30" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="FormDivParLabel">Middle Initial: </label>
                            </td>
                            <td>
                                <input type="text" id="EmployeeMiddleInitial" name="EmployeeMiddleInitial" class="FormDivParText" size="2" maxlength="1" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="FormDivParLabel">Last Name: </label>
                            </td>
                            <td>
                                <input type="text" id="EmployeeLastName" name="EmployeeLastName" class="FormDivParText" size="20" maxlength="30" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="FormDivParLabel">Street: </label>
                            </td>
                            <td>
                                <input type="text" id="EmployeeStreet" name="EmployeeStreet" class="FormDivParText" size="20" maxlength="30" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="FormDivParLabel">City: </label>
                            </td>
                            <td>
                                <input type="text" id="EmployeeCity" name="EmployeeCity" class="" FormDivParText size="20" maxlength="30" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="FormDivParLabel">State: </label>
                            </td>
                            <td>
                                <select id="EmployeeState" name="EmployeeState" class="FormDivParSel">
                                    <option value="AL">AL</option>
                                    <option value="AK">AK</option>
                                    <option value="AZ">AZ</option>
                                    <option value="AR">AR</option>
                                    <option value="CA">CA</option>
                                    <option value="CO">CO</option>
                                    <option value="CT">CT</option>
                                    <option value="DE">DE</option>
                                    <option value="FL">FL</option>
                                    <option value="GA">GA</option>
                                    <option value="HI">HI</option>
                                    <option value="ID">ID</option>
                                    <option value="IL">IL</option>
                                    <option value="IN">IN</option>
                                    <option value="IA">IA</option>
                                    <option value="KS">KS</option>
                                    <option value="KY">KY</option>
                                    <option value="LA">LA</option>
                                    <option value="ME">ME</option>
                                    <option value="MD">MD</option>
                                    <option value="MA">MA</option>
                                    <option value="MI">MI</option>
                                    <option value="MN">MN</option>
                                    <option value="MS">MS</option>
                                    <option value="MO">MO</option>
                                    <option value="MT">MT</option>
                                    <option value="NE">NE</option>
                                    <option value="NV">NV</option>
                                    <option value="NH">NH</option>
                                    <option value="NJ">NJ</option>
                                    <option value="NM">NM</option>
                                    <option value="NY">NY</option>
                                    <option value="NC">NC</option>
                                    <option value="ND">ND</option>
                                    <option value="OH">OH</option>
                                    <option value="OK">OK</option>
                                    <option value="OR">OR</option>
                                    <option value="PA">PA</option>
                                    <option value="RI">RI</option>
                                    <option value="SC">SC</option>
                                    <option value="SD">SD</option>
                                    <option value="TN">TN</option>
                                    <option value="TX">TX</option>
                                    <option value="UT">UT</option>
                                    <option value="VT">VT</option>
                                    <option value="VA">VA</option>
                                    <option value="WA">WA</option>
                                    <option value="WV">WV</option>
                                    <option value="WI">WI</option>
                                    <option value="WY">WY</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="FormDivParLabel">Zip: </label>
                            </td>
                            <td>
                                <input title="Format: xxxxx or xxxxx-xxxx" type="text" id="EmployeeZip" name="EmployeeZip" class="FormDivParText" size="15" minlength="5" maxlength="10" placeholder="11111 or 11111-1111" pattern="^\d{5}$|^\d{5}-\d{4}$" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="FormDivParLabel">Phone: </label>
                            </td>
                            <td>
                                <input title="Format: xxx-xxx-xxxx"type="text" id="EmployeePhone" name="EmployeePhone" class="FormDivParText" size="15" maxlength="12" placeholder="111-111-1111" pattern="((\(\d{3}\) ?)|(\d{3}-))?\d{3}-\d{4}" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="FormDivParLabel">Email: </label>
                            </td>
                            <td>
                                <input type="email" id="EmployeeEmail" name="EmployeeEmail" class="FormDivParText" size="20" maxlength="50" placeholder="email@website.com" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button style="width:225px;" type="submit" id="EmployeeSubmitButton" name="EmployeeSubmitButton" class="FormDivParText" value="RegisterEmployee">Submit</button>
                            </td>
                            <td>
                                <button style="width:225px;" type="reset" id="EmployeeResetButton" name="EmployeeResetButton" class="FormDivParButton" value="Reset">Reset</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
            <br>
        </div>
        <br>
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
