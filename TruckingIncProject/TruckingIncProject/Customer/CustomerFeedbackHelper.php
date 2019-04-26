<?php

session_start();
require "CheckSignedIn.php";
include "../mysqli_connect.php";

  $user = $_SESSION['CustomerUsername'];
  $CustomerListQuery = "SELECT * FROM Customer WHERE WebsiteUsername = '$user'";
  $CustomerListExecution = @mysqli_query($dbc, $CustomerListQuery);
  $CustomerList = mysqli_fetch_array($CustomerListExecution);
  $customerEmail = $CustomerList['email'];




  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    if ($_POST['SubmitEmailButton'] == 'SubmitEmail')
    {
      $emailMessage = $_POST['emailMessage'];
      /*
      if (mail('root@localhost.com', 'Customer Feedback', $emailMessage, 'From: ' . $customerEmail))
      {
        header('Location: CustomerFeedbackConfirmation.php');
      }
      else
      {
        header('Location: CustomerFeedbackError.php');
      }
      */
      //Mail only works locally, so above is replaced by
      mail('root@localhost.com', 'Customer Feedback', $emailMessage, 'From: ' . $customerEmail);
      header('Location: CustomerFeedbackConfirmation.php');
    }
  }
?>
