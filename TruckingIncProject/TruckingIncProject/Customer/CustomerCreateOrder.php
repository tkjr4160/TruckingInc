

<!--
   -->
   <?php
   include "CustomerCreateOrderHelper.php";
   include "CustomerCreateOrderJSONhelper.php";
   ?>
<!DOCTYPE HTML>
<html>
   <head>
      <title>Create Order</title>
      <meta charset="utf-8" />
      <link rel="stylesheet" type="text/css" href="../css/main.css">
      <script src="../js/jquery-3.3.1.js"></script>
      <script src="../js/main.js"></script>
      <script>
         var str= $("CardNumber").substring(1,4);
         var oneStr= $("CardNumber").substring(1,1);
         var twoStr= $("CardNumber").substring(1,2);
         var oneNum= parseInt(oneStr,10);
         var twoNum= parseInt(twoStr,10);
         var num= parseInt(str,10);
         var card= document.getElementById("CardNumber");
         
         if(card.checkValidity() && oneNum==4)
           {
           document.getElementById("CardNumber").innerHTML = "Card Type is Visa";
           }
         if(card.checkValidity() && num==6011 || card.checkValidity() && twoNum==65)
           {
           document.getElementById("CardNumber").innerHTML = "Card Type is Discover";
           }
         if(card.checkValidity() && num>=51 && num<=55 || card.checkValidity() && num>=2221 && num<=2720)
           {
           document.getElementById("CardNumber").innerHTML = "Card Type is Mastercard";
           }
         else
           {
           document.getElementById("CardNumber").innerHTML = card.validationMessage;
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
               <li><a class="active" href="CustomerCreateOrder.php">New Order</a></li>
               <li style="float:right; width:150px" ;>
                  <!-- Submitting to "CustomerSignIn.php" -- needs to submit to "CustomerHomeHelper.php" -->
                  <form action="CustomerHomeHelper.php" method="post" class="Form">
                     <button type="submit" id="CustomerSignOutButton" name="CustomerSignOutButton" class="logout-button" value="CustomerSignOut">Log Out</button>
                  </form>
               </li>
            </ul>
         </nav>
         <div id="page-heading">
            <h1><u>Create Order</u><br><br>
               <span></span>
            </h1>
         </div>
      </header>
      <div class="wrapper">
         <div id="form">
            <!-- -------------------------------- Create Customer Order --------------------------------  -->
            <form action="CustomerCreateOrderHelper.php" method="POST" class="Form">
               <br>
               <div class="FormDiv">
                  <h3><u>Order Lumber</u></h3>
                  <table class="table-input" style="width:50%;">
                     <tr>
                        <td>
                           <label class="FormDivParLabel">Lumber Type: </label>
                        </td>
                        <td>
                           <?php
                              $lumberTypeList = '';
                              while ($row = mysqli_fetch_array($lumberTypeExecution)) {
                                  $lumberTypeList .= '<option value="' . $row['lumberType'] . '">' . $row['lumberType'] . '</option>';
                              }
                              ?>
                           <select id="LumberType" name="LumberType<?php $row['lumberType'] ?>" required>
                              <option disabled selected="true" value="Lumber">Select Lumber Type</option>
                              <?php echo $lumberTypeList; ?>
                           </select>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <label class="FormDivParLabel">Number of Units: </label>
                        </td>
                        <td>
                           <input type="text" id="NumberUnits" name="NumberUnits" class="FormDivParSel" size="5" required/>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <label class="FormDivParLabel">Street: </label>
                        </td>
                        <td>
                           <input type="text" id="Street" name="Street" class="FormDivParSel" size="5" required/>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <label class="FormDivParLabel">City: </label>
                        </td>
                        <td>
                           <input type="text" id="City" name="City" class="FormDivParSel" size="5" required/>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <label class="FormDivParLabel">State: </label>
                        </td>
                        <td>
                           <select id="State" name="State" class="FormDivParSel" required>
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
                           <label class="FormDivParLabel">ZIP: </label>
                        </td>
                        <td>
                           <input title="Format: xxxxx or xxxxx-xxxx" type="text" id="ZIP" name="ZIP" class="FormDivParSel" size="5" maxlength="10" pattern="^\d{5}$|^\d{5}-\d{4}$" placeholder="11111 or 11111-1111" required/>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <label class="FormDivParLabel">Card Number: </label>
                        </td>
                        <td>
                           <input title="Only accepts Visa, Mastercard or Discover" type="text" id="CardNumber" name="CardNumber" class="FormDivParSel" size="16" maxlength="16" pattern="[0-9]{16}" placeholder="1111111111111111" required/>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <label class="FormDivParLabel">CVV: </label>
                        </td>
                        <td>
                           <input type="text" id="CVV" name="CVV" class="FormDivParSel" size="3" maxlength="3" placeholder="111" pattern="[0-9]{3}" required/>
                        </td>
                     </tr>
                  </table>
               </div>
               <!-- The Modal -->
               <div id="myModal" class="modal">
                  <!-- Modal content -->
                  <div class="modal-content">
                     <span class="close">&times;</span>
                     <div>
                        <div><h3 text-align="center">Review Your Order<h3></div>
                        <table class="table-input" cellspacing="3" cellpadding="3" width="10%" height="50%">
                           <tr>
                              <td width="40%"><b>Lumber Type:</td>
                              <td id="lumberType"></td>
                           </tr>
                           <tr>
                              <td><b>Quantity:</td>
                              <td id="numberUnits"></td>
                           </tr>
                           <tr>
                              <td><b>Street:</td>
                              <td id="street"></td>
                           </tr>
                           <tr>
                              <td><b>City:</td>
                              <td id="city"></td>
                           </tr>
                           <tr>
                              <td><b>State:</td>
                              <td id="state"></td>
                           </tr>
                           <tr>
                              <td><b>ZIP:</td>
                              <td id="zip"></td>
                           </tr>
                           <tr>
                              <td><b>Card Number:</td>
                              <td id="cardNumber"></td>
                           </tr>
                           <tr>
                              <td><b>CVV:</td>
                              <td id="cvv"></td>
                           </tr>
                           <tr>
                              <td><b>Cost Per Unit:</td>
                              <td id="costPerUnit"></td>
                           </tr>
                           <tr>
                              <td><b>Shipping Fee:</td>
                              <td id="shippingFee"></td>
                           </tr>
                           <tr>
                              <td><b>Total Cost:</td>
                              <td id="totalCost"></td>
                           </tr>
                        </table>
                        <button type="submit" id="CustomerCreateOrderButton" name="CustomerCreateOrderButton" value="CustomerCreateOrder">Submit Order</button>
                        <button id="close" >Cancel Order</button>
                     </div>
                </form>
            </div>
         </div>
         <!-- Submit Order -->
         <!-- Trigger/Open  Modal -->
         <br><button style="width:200px;margin:auto;" type="submit" onclick="myFunction()">Review Order</button>
         <br>
         <hr>
         <!-- List Transaction Information -->
         &nbsp;&nbsp;&nbsp;
         <div>
            <h3><u>Transaction History</u></h3>
         </div>
         <div class="FormDiv">
            <table class="table" style="width:90%;">
               <tr>
                  <th><b>Transaction ID</b></th>
                  <th><b>Product ID</b></th>
                  <th><b>Quantity</b></th>
                  <th><b>Shipping Fee</b></th>
                  <th><b>Total Cost</b></th>
                  <th><b>Status</b></th>
                  <th><b>Order Placed On<b></th>
               </tr>
               <?php
                  while ($row = mysqli_fetch_array($transactionsExecute)) {
                     echo "<tr>
                     <td>" . $row['transactionID'] . "</td>
                     <td>" . $row['productID'] . "</td>
                     <td>" . $row['numberOfUnits'] . "</td>
                     <td>" . $row['shippingFee'] . "</td>
                     <td>" . $row['totalCost'] . "</td>
                     <td>" . $row['transactionStatus'] . "</td>
                     <td>" . $row['dt'] . "</td>
                     </tr>";
                  }
                  ?>
            </table>
            <br>
            <br>
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
   <script>
      // Modal pop-up for order confirmation
      // Get modal
      var modal = document.getElementById('myModal');
      // Get <span> element that closes modal
      var span = document.getElementsByClassName("close")[0];
      var closeBtn = document.getElementById("close");
      //Open modal
      function modalDisplay() {
          modal.style.display = "block";
      }
      // When user clicks on <span> (x), close modal
      span.onclick = function() {
          modal.style.display = "none";
      }
      closeBtn.onclick = function() {
          modal.style.display = "none";
          return false;
      }
      // When user clicks anywhere outside of modal, close it
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }
   </script>
</html>

