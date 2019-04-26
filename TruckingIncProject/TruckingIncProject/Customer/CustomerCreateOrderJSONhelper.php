<?php
include ('../mysqli_connect.php');

session_start();

// *********************** Data for Create Order ***********************
// Retrieve customerID from currently logged-in user
$username = $_SESSION['CustomerUsername'];
$customerIDQuery = 'SELECT customerID FROM Customer WHERE Customer.WebsiteUsername = "' . $username . '";';
$customerIDExecute = @mysqli_query($dbc, $customerIDQuery);
$row1 = mysqli_fetch_array($customerIDExecute);
$customerID = $row1['customerID'];

// Retrieve lumber type for customer options
$lumberTypeQuery = "SELECT lumberType FROM Product";
$lumberTypeExecution = @mysqli_query($dbc, $lumberTypeQuery);
// Retrieve lumber type and quantity from user
$lumberType = $_POST['LumberType']; $lumberType = htmlentities($lumberType);
$numberOfUnits = $_POST['NumberUnits']; $numberOfUnits = htmlentities($numberOfUnits);

// Retrieve productID based upon user-selected lumberType
$productIDQuery = 'SELECT productID, numInStock, costSoldPerUnit FROM Product WHERE Product.lumberType = "' . $lumberType . '";';
$productIDExecute = @mysqli_query($dbc, $productIDQuery);
$row2 = mysqli_fetch_array($productIDExecute);
$productID = $row2['productID'];
$numInStock = $row2['numInStock'];
$costPerUnit = $row2['costSoldPerUnit'];

// Retrieve payment information
$cardNumber = $_POST['CardNumber']; $cardNumber = htmlentities($cardNumber);
$cvv = $_POST['CVV']; $cvv = htmlentities($cvv);
$expr = $_POST['Expiration']; $expr = htmlentities($expr);

// Calculate total cost of order
$shippingFee = 1500;
$totalCost = (intval($numberOfUnits) * intval($costPerUnit)) + intval($shippingFee);

// *********************** Data for List Transactions ***********************
$transactionsQuery = 'SELECT transactionID, productID, numberOfUnits, shippingFee, totalCost, transactionStatus, dt FROM Transact WHERE customerID = ' . $customerID . ';';
$transactionsExecute = @mysqli_query($dbc, $transactionsQuery);

// *********************** Data for Create Shipment ***********************
// Retrieve address
$street = $_POST['Street']; $street = htmlentities($street);
$city = $_POST['City']; $city = htmlentities($city);
$state = $_POST['State']; $state = htmlentities($state);
$zip = $_POST['ZIP']; $zip = htmlentities($zip);

// if POST
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // pull values and output JSON
    $values = array(
      "LumberType" => $lumberType,
	    "NumberUnits" => $numberOfUnits,
	    "Street" => $street,
      "City" => $city,
      "State" => $state,
      "ZIP" => $zip,
      "CardNumber" => $cardNumber,
      "CVV" => $cvv,
      "Expiration" => $expr,
      "CostPerUnit" => $costPerUnit,
      "ShippingFee" => $shippingFee,
      "TotalCost" => $totalCost
    );
    echo json_encode($values);
}
