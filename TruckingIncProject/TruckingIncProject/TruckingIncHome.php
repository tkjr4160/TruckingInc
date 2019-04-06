<?php
include('Customer/CustomerSignInHelper.php');
include('Customer/CustomerSignUpHelper.php');
include('Employee/EmployeeSignInHelper.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Trucking Inc.</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link href="css/truckingIncHome.css" rel="stylesheet" type="text/css">
    <script src="js/main.js"></script>

</head>

<body>
    <header>
        <div id="banner">
            <img src="images/TruckingIncLogo.png" alt="Trucking Inc. Logo">
            <div id=session style="background-color:aliceblue;">
                <h3><u>Welcome!</u></h3><br>
                <p>Please sign in with the login button.</p>
            </div>
            <div class="social-media">
                <div id="facebook">
                    <a href="https://www.facebook.com/" target="_blank">
                        <img src="images/facebook.png" alt="Facebook" style="width:42px;height:42px;border:0;">
                    </a>
                </div>
                <div id="twitter">
                    <a href="https://twitter.com/?lang=en" target="_blank">
                        <img src="images/twitter.png" alt="Twitter" style="width:42px;height:42px;border:0;">
                    </a>
                </div>
                <div id="instagram">
                    <a href="https://www.instagram.com/" target="_blank">
                        <img src="images/instagram.png" alt="Instagram" style="width:42px;height:42px;border:0;">
                    </a>
                </div>
                <div id="youtube">
                    <a href="https://www.youtube.com/" target="_blank">
                        <img src="images/youtube.png" alt="YouTube" style="width:42px;height:42px;border:0;">
                    </a>
                </div>
            </div>
        </div>
        <nav>

            <ul>
                <li style="float:right; width:150px" ;><button class="nav-button" onclick="openLoginForm()">Login</button>
                </li>
                <li style="float:right; width:150px" ;><button class="nav-button" onclick="openSignupForm()">Sign Up</button>
                </li>
                <li style="float:left; width:150px" ;><button class="nav-button" onclick="openEmployeeLoginForm()">Employee Sign In</button>
                </li>
            </ul>

            <div class="login" id="login-form">
                <form action="Customer/CustomerSignInHelper.php" method="post" class="form-container">
                    <h1>Login</h1>

                    <p>No Account? Use the sign up button!</p>
                    <label>Username: </label>
                    <input type="text" id="CustomerUsername" name="CustomerUsername" size="20" maxlength="30" required />
                    <label>Password:</label>
                    <input type="password" id="CustomerPassword" name="CustomerPassword" size="20" maxlength="30" required />
                    <button type="submit" id="CustomerSubmitButton" class="btn" name="CustomerSubmitButton" value="CustomerSignIn">Login</button>
                    <button type="button" id="CustomerResetButton" name="CustomerResetButton" value="Reset" onclick="closeLoginForm()">Close</button>
                </form>
            </div>

            <div class="employee-login" id="employee-login-form">
                <form action="Employee/EmployeeSignInHelper.php" method="post" class="employee-form-container">
                    <h1>Employee Login</h1>

                    <p>Please enter employee login info.</p>
                    <label>Username: </label>
                    <input type="text" id="EmployeeUsername" name="EmployeeUsername" size="20" maxlength="30" required />
                    <label>Password:</label>
                    <input type="password" id="EmployeePassword" name="EmployeePassword" size="20" maxlength="30" required />
                    <button type="submit" id="EmployeeSubmitButton" class="btn" name="EmployeeSubmitButton" value="EmployeeSignIn">Login</button>
                    <button type="button" id="EmployeeResetButton" name="EmployeeResetButton" value="Reset" onclick="closeEmployeeLoginForm()">Close</button>

                </form>
            </div>

            <div class="signup" id="signup-form">
                <form action="Customer/CustomerSignUpHelper.php" method="post" class="signup-container">
                    <h1>Sign Up</h1>
                    <label>Desired Username: </label>
                    <input type="text" id="CustomerUsername" name="CustomerUsername" size="20" maxlength="30" required />
                    <br>
                    <label>New Password:</label>
                    <input type="password" id="CustomerPassword" name="CustomerPassword" size="20" maxlength="30" required />
                    <br>
                    <label>Repeat Password: </label>
                    <input type="password" id="CustomerRepeatPassword" name="CustomerRepeatPassword" size="20" maxlength="30" required />
                    <br>
                    <label>First Name: </label>
                    <input type="text" id="CustomerFirstName" name="CustomerFirstName" size="20" maxlength="30" required />
                    <br>
                    <label>Middle Initial: </label>
                    <input type="text" id="CustomerMiddleInitial" name="CustomerMiddleInitial" size="2" maxlength="1" required />
                    <br>
                    <label>Last Name: </label>
                    <input type="text" id="CustomerLastName" name="CustomerLastName" size="20" maxlength="30" required />
                    <br>
                    <label>Street: </label><br>
                    <input type="text" id="CustomerStreet" name="CustomerStreet" size="20" maxlength="30" required />
                    <br>
                    <label>City: </label><br>
                    <input type="text" id="CustomerCity" name="CustomerCity" FormDivParText size="20" maxlength="30" required />
                    <br>
                    <label>State: </label> <br>
                    <select id="CustomerState" name="CustomerState">
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
                    <br>
                    <label>Zip: </label><br>
                    <input type="text" id="CustomerZip" name="CustomerZip" size="15" maxlength="10" required />
                    <br>
                    <label>Phone: </label><br>
                    <input type="text" id="CustomerPhone" name="CustomerPhone" size="15" maxlength="12" required />
                    <br>
                    <label>Email: </label><br>
                    <input type="text" id="CustomerEmail" name="CustomerEmail" size="20" maxlength="50" required />
                    <br>
                    <button type="submit" id="CustomerSubmitButton" name="CustomerSubmitButton" value="RegisterCustomer">Submit</button>
                    <button type="button" id="CustomerResetButton" class="btn cancel" value="Reset" onclick="closeSignupForm()">Close</button>
                </form>
            </div>

        </nav>
    </header>
    <div id="page-heading">
        <h1><u>Welcome to Trucking Inc.</u><br>
            <span>Hardwood lumber when and where you need it.</span>
        </h1>
    </div>
    <div class="wrapper">

        <div class="content">
            <br>
            <div id="p">
                <p>
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
                <img src="images/cedar.png" alt="Cedar">
                <ul>
                    <li>$21 per unit.</li>
                    <li>Length: 8'2" - 8'4"</li>
                    <li>Diameter: 12"</li>
                    <li>Low Maintenance. Resisant to warping and splits</li>
                </ul>
            </div>
            <div class="products">
                <h1>Cherry</h1>
                <img src="images/cherry.jpg" alt="Cherry">
                <ul>
                    <li>$27 per unit.</li>
                    <li>Length: 10'</li>
                    <li>Diameter: 13-14"</li>
                    <li>Easily shaped, and it polishes well. Unstained, it has a rich, beautiful color.</li>
                </ul>
            </div>
            <div class="products">
                <h1>Hickory</h1>
                <img src="images/hickory.jpg" alt="Hickory">
                <ul>
                    <li>$25 per unit.</li>
                    <li>Length: 12'</li>
                    <li>Width: 15" - 18"</li>
                    <li>Low Maintenance. Resisant to warping and splits</li>
                </ul>
            </div>
            <div class="products">
                <h1>Maple</h1>
                <img src="images/maple.jpg" alt="Maple">
                <ul>
                    <li>$17 per unit.</li>
                    <li>Length: 16'</li>
                    <li>Width: 18" - 24"</li>
                    <li>One of the hardest wood species, It can take a beating and look great for years.</li>
                </ul>
            </div>
            <div class="products">
                <h1>Oak</h1>
                <img src="images/oak.jpg" alt="Oak">
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
                in 2017, the company expanded and opened a second office in Columbus, Ohio. </p> <br>
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