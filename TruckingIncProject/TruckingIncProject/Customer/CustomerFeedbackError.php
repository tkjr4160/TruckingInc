<!--

-->

<?php include "CustomerFeedbackHelper.php"; ?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Customer Feedback Error</title>
  <meta charset="utf-8" />
  <link href="../css/main.css" rel="stylesheet" type="text/css">
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
        <!-- Submitting to "CustomerSignIn.php" -- needs to submit to "CustomerHomeHelper.php" -->
        <form action="CustomerHomeHelper.php" method="post" class="Form">
          <button type="submit" id="CustomerSignOutButton" name="CustomerSignOutButton" class="logout-button" value="CustomerSignOut" style="width:150px; float:right;">Log Out</button>
        </form>
        </li>
      </ul>
    </nav>

    <div id="page-heading">
      <h1><u>Customer Feedback</u><br><br>
        <span>Email not recieved!</span>
      </h1>
    </div>

  </header>
  <div class="wrapper" style="height: 380px;">
    &nbsp;
    <h1 style="text-align:center;"><u>ERROR!</u></h1>
    <form action="CustomerFeedback.php" method="post" style="text-align:center;">
      <p>Your email was not recieved!</p>
      <button type="submit" style="width:20%; margin:0 auto;">Ok</button>
    </form>
    &nbsp;
    <img src="../images/cancel.png" alt="Unsuccessful!" style="display: block;margin-left: auto;margin-right: auto; height:150px;width:150px;">
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
