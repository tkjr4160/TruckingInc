<!--

-->


<!DOCTYPE HTML>
<html>

<head>
  <title>Customer Sign Up</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/main.css" rel="stylesheet" type="text/css">
  <script src="../jquery-3.3.1.js">
  function myFunction()
  {
      var passw = document.getElementById("CustomerPassword");
      var passwr = document.getElementById("CustomerRepeatPassword");
      var zip = document.getElementById("CustomerZip");
      var phone = document.getElementById("CustomerPhone");
      if (!passw.checkValidity())
      {
        document.getElementById("CustomerPassword").innerHTML = passw.validationMessage;
      }
      else
      {
        document.getElementById("CustomerPassword").innerHTML = "";
      }
      if (!passwr.checkValidity())
      {
        document.getElementById("CustomerRepeatPassword").innerHTML = passwr.validationMessage;
      }
      else
      {
        document.getElementById("CustomerRepeatPassword").innerHTML = "";
      }
      if (!zip.checkValidity())
      {
        document.getElementById("CustomerZip").innerHTML = zip.validationMessage;
      }
      else
      {
        document.getElementById("CustomerZip").innerHTML = "";
      }
      if (!phone.checkValidity())
      {
        document.getElementById("CustomerPhone").innerHTML = phone.validationMessage;
      }
      else
      {
        document.getElementById("CustomerPhone").innerHTML = "";
      }
  }
  </script>
</head>

<header>
    <div id="banner">
        <img src="../images/TruckingIncLogo.png" alt="Logo" id="logo">
    </div>
    <nav>
        <ul>
            <li><a href="CustomerSignIn.php">Already have an account? Sign in here</a></li>
            <li style="float:right; border-left: 1px solid grey; border-right: none"><a href="../TruckingIncHome.php">Website
                    Home</a></li>
        </ul>
    </nav>
</header>

<body>
    <div id="content">
        <form action="CustomerSignUpHelper.php" method="post" class="Form">
            <div class="signup-form">
                <p>
                    <label>Desired Username: </label>
                    <input type="text" id="CustomerUsername" name="CustomerUsername" size="20" maxlength="30" required />
                </p>
                <br>
                <p>
                    <label>New Password:</label>
                    <input title="Password must contain at least one uppercase letter, one lowercase letter and one number. May be up to 30 characters long" type="password" id="CustomerPassword" name="CustomerPassword" class="FormDivParText" size="20" maxlength="30" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])\w{3,30}" required/>
                </p>
                <br>
                <p>
                    <label>Repeat Password: </label>
                    <input title="Password must contain xat least one uppercase letter, one lowercase letter and one number. May be up to 30 characters long" type="password" id="CustomerRepeatPassword" name="CustomerRepeatPassword" class="FormDivParText" size="20" maxlength="30" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])\w{3,30}" required/>
                </p>
                <br>
                <p>
                    <label>First Name: </label>
                    <input type="text" id="CustomerFirstName" name="CustomerFirstName" size="20" maxlength="30" required />
                </p>
                <br>
                <p>
                    <label>Middle Initial: </label>
                    <input type="text" id="CustomerMiddleInitial" name="CustomerMiddleInitial" size="2" maxlength="1" required />
                </p>
                <br>
                <p>
                    <label>Last Name: </label>
                    <input type="text" id="CustomerLastName" name="CustomerLastName" size="20" maxlength="30" required />
                </p>
                <br>
                <p>
                    <label>Street: </label>
                    <input type="text" id="CustomerStreet" name="CustomerStreet" size="20" maxlength="30" required />
                </p>
                <br>
                <p>
                    <label>City: </label>
                    <input type="text" id="CustomerCity" name="CustomerCity" FormDivParText size="20" maxlength="30" required />
                </p>
                <br>
                <p>
                    <label>State: </label>
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
                </p>
                <br>
                <p>
                    <label>Zip: </label>
                    <input type="text" id="CustomerZip" name="CustomerZip" size="15" maxlength="10" required />
                </p>
                <br>
                <p>
                    <label>Phone: </label>
                    <input type="text" id="CustomerPhone" name="CustomerPhone" size="15" maxlength="12" required />
                </p>
                <br>
                <p>
                    <label>Email: </label>
                    <input type="text" id="CustomerEmail" name="CustomerEmail" size="20" maxlength="50" required />
                </p>
                <br>
                <p>
                    <button type="submit" id="CustomerSubmitButton" name="CustomerSubmitButton" value="RegisterCustomer">Submit</button>
                    <button type="reset" id="CustomerResetButton" name="CustomerResetButton" value="Reset">Reset</button>
                </p>
            </div>
        </form>
    </div>
</body>

</html>
