<!--

-->

<?php include "EmployeeAccountHelper.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Employee Passwords Don't Match</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="../Styles.css">
  <link href="../css/main.css" rel="stylesheet" type="text/css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
  <div class="wrapper" style="height: 380px;">
    &nbsp;
    <h1 style="text-align:center;"><u>ERROR!</u></h1>
    <form action="EmployeeHome.php" method="post" style="width:20%; margin:0 auto;text-align:center;">
      <p>You are trying to access a page that you don't have permission to use!</p>
      <button type="submit">Ok</button>
    </form>
    &nbsp;
    <img src="../images/cancel.png" alt="Unsuccessful!" style="display: block;margin-left: auto;margin-right: auto; height:150px;width:150px;">
    &nbsp;
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
<body>
</html>
