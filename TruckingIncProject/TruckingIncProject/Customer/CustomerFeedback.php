<!--

-->
<?php
include "CustomerFeedbackHelper.php";
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Customer Feedback</title>
    <meta charset="utf-8" />
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <script src="../jquery-3.3.1.js">
    function myFunction()
    {
        var email = document.getElementById("emailMessage");

        if (!email.checkValidity())
        {
          email.innerHTML = passw.validationMessage;
        }
        else
        {
          email.innerHTML = "";
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
                echo '<p><b>Signed in as: <br>' . $_SESSION['CustomerUsername'] . '</b></p>';
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
                <li><a href="CustomerHome.php">Customer Home</a></li>
                <li><a href="CustomerAccount.php">My Account</a></li>
                <li><a href="CustomerCreateOrder.php">New Order</a></li>
                <li><a class="active" href="CustomerFeedback.php">Customer Feedback</a></li>
                <li style="float:right; width:150px" ;>

                    <form action="CustomerHomeHelper.php" method="post" class="Form">
                        <button type="submit" id="CustomerSignOutButton" name="CustomerSignOutButton" class="logout-button" value="CustomerSignOut">Log Out</button>
                    </form>
                </li>
            </ul>
        </nav>

        <div id="page-heading">
            <h1><u>Feedback</u><br><br>
                <span>Tell us about our service</span>
            </h1>
        </div>

    </header>
    <div class="wrapper">
        <div class="FormDiv">

            <form action="CustomerFeedbackHelper.php" method="post" class="Form" name="EmailForm" id="EmailForm">
                <div class="accountInfo-form"><br><br><br><br>
                  <label>To: Admin@TruckingInc.com</label>
                  <textarea form="EmailForm" name="emailMessage" id="emailMessage" rows="6" cols="133" minlength="1" maxlength="500" required="required"/></textarea>

                  <button type="submit" name="SubmitEmailButton" id="SubmitEmailButton" value="SubmitEmail">Submit</button>
                  <button type="reset" name="ResetEmailButton" id="ResetEmailButton">Clear</button>
                </div>
            </form><br><br><br>
        </div>
        <hr>
        <br><br>
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
