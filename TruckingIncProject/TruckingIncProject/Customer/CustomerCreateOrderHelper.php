<?php
include ('../mysqli_connect.php');

session_start();

require ('CheckSignedIn.php');

// *********************** Data for Create Order ***********************
// Retrieve lumber type
$lumberTypeQuery = "SELECT lumberType FROM Product";
$lumberTypeExecution = @mysqli_query($dbc, $lumberTypeQuery);
$lumberType = $_POST['SelectLumber']; $lumberType = htmlentities($lumberType);
$numberOfUnits = $_POST['NumberUnits']; $numberOfUnits = htmlentities($numberOfUnits);

// Retrieve customerID from currently logged-in user
$username = $_SESSION['CustomerUsername'];
$customerIDQuery = 'SELECT customerID FROM Customer WHERE Customer.WebsiteUsername = "' . $username . '";';
$customerIDExecute = @mysqli_query($dbc, $customerIDQuery);
$row1 = mysqli_fetch_array($customerIDExecute);
$customerID = $row1['customerID'];

// Retrieve productID based upon user-selected lumberType
$productIDQuery = 'SELECT productID FROM Product WHERE Product.lumberType = "' . $lumberType . '";';
$productIDExecute = @mysqli_query($dbc, $productIDQuery);
$row2 = mysqli_fetch_array($productIDExecute);
$productID = $row2['productID'];

// Retrieve cost-per-unit of user-selected lumber type
$costUnitQuery = 'SELECT costSoldPerUnit FROM Product WHERE Product.lumberType = "' . $lumberType . '";';
$costUnitExecute = @mysqli_query($dbc, $costUnitQuery);
$row3 = mysqli_fetch_array($costUnitExecute);
$costPerUnit = $row3['costSoldPerUnit'];

// Calculate total cost of order
$shippingFee = 1500;
$totalCost = (intval($numberOfUnits) * intval($costPerUnit)) + intval($shippingFee);

// *********************** Data for List Transactions ***********************
$transactionsQuery = 'SELECT transactionID, productID, numberOfUnits, totalCost, transactionStatus FROM Transact WHERE customerID = ' . $customerID . ';';
$transactionsExecute = @mysqli_query($dbc, $transactionsQuery);

// *********************** Data for Create Shipment ***********************
// Retrieve address
$street = $_POST['Street']; $street = htmlentities($street);
$city = $_POST['City']; $city = htmlentities($city);
$state = $_POST['State']; $state = htmlentities($state);
$zip = $_POST['ZIP']; $zip = htmlentities($zip);

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // *********************** Create Order ***********************
    if ($_POST['CustomerCreateOrderButton'] == 'CustomerCreateOrder')
    {
        if (empty($customerID) || empty($productID) || empty($totalCost) || empty($numberOfUnits))
        {
            echo '<form action="CustomerCreateOrder.php">';
            echo "Customer ID: " . $customerID . " " . gettype($customerID) . " ";
            echo "Product ID: " . $productID . " " . gettype($productID) . " ";
            echo "Number of Units: " . $numberOfUnits . " " . gettype($numberOfUnits) . " ";
            echo "Total Cost: " . $totalCost . " " . gettype($totalCost) . " ";
            echo "Number of Units int?: " . intval($numberOfUnits) . " ";
            echo "Cost per unit: " . intval($costPerUnit) . " ";
            echo '<p>ERROR! All fields must be filled!</p>';
            echo '<button>Ok</button>';
            echo '</form>';
        }
        else
        {            
            // Create new transaction
            $createOrderQuery = 'INSERT INTO Transact (customerID, productID, numberOfUnits, shippingFee, totalCost, transactionStatus)
            VALUES (' . $customerID . ', ' . $productID . ', ' . $numberOfUnits . ', ' . $shippingFee . ', ' . $totalCost . ', "N")';
            $createOrderExecute = @mysqli_query($dbc, $createOrderQuery);
            
            if ($createOrderExecute)
            {
                // Grab transactionID of the transaction created above
                $transactionID = mysqli_insert_id($dbc);

                // Create new shipment
                $createShipmentQuery = 'INSERT INTO Shipment (transactionID, street, city, state, zip) 
                VALUES ("' . $transactionID . '", "' . $street . '", "' . $city . '", "' . $state . '", "' . $zip . '")';
                $createShipmentExecute = @mysqli_query($dbc, $createShipmentQuery);

                if ($createShipmentExecute) {
                    header('Location: CustomerCreateOrder.php');
                    echo '<h3>Transaction and Shipment creation successful!</h3>';
                }
                else {
                    echo 'Failed to connect to MySQL: ' . mysqli_error($dbc);
                }
               
            }
            else
            {
                echo '<h1>System Error</h1>';
                echo "CusID: " . $customerID . " ";
                echo "ProdID: " . $productID . " ";
                echo "NOU: " . $numberOfUnits . " ";
                echo "Totac: " . $totalCost . " ";
                echo '<form action="CustomerCreateOrder.php">';
                echo '<p>Something went wrong...</p>';
                echo '<button>Ok</button>';
                echo '</form>';
            }
        mysqli_close($dbc);
        }
    }
}
