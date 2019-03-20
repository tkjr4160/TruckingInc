<!--

-->

<?php include "CustomerSignInHelper.php"; ?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Customer Sign In</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/login-layout.css" rel="stylesheet" type="text/css">
    <script src="main.js"></script>
    <style>
        .Div {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="login">
        <div class="logo">
            <img src="../images/TruckingIncLogo.png" alt="Logo" class="logo">
        </div>

        <form action="CustomerSignInHelper.php" method="post" class="Form">
            <div class="FormDiv">
                <p class="FormDivPar">
                    <label class="FormDivParLabel">Username: </label>
                    <input type="text" id="CustomerUsername" name="CustomerUsername" class="FormDivParText" size="20" maxlength="30" required />
                </p>
                <p class="FormDivPar">
                    <label class="FormDivParLabel">Password: </label>
                    <input type="password" id="CustomerPassword" name="CustomerPassword" class="FormDivParText" size="20" maxlength="30" required />
                </p>
                <p class="FormDivPar">
                    <button type="submit" id="CustomerSubmitButton" name="CustomerSubmitButton" class="FormDivParButton" value="CustomerSignIn">Submit</button>
                </p>
            </div>
        </form>
        <div class="Div">
            <a href="CustomerSignUp.php">No account? Sign up here</a>
            </br>
            <a href="../TruckingIncHome.php">Back to home</a>
        </div>
    </div>
</body>

</html> 