<?php
include ('../mysqli_connect.php');

session_start();

require ('CheckSignedIn.php');

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
$lumberType = trim(htmlentities(mysqli_real_escape_string($dbc, $_POST['LumberType'])));
//$lumberType = $_POST['LumberType']; $lumberType = htmlentities($lumberType);
$numberOfUnits = trim(htmlentities(mysqli_real_escape_string($dbc, $_POST['NumberUnits'])));
//Retrieve card information from user
$card = trim(htmlentities(mysqli_real_escape_string($dbc, $_POST['CardNumber'])));
$cvv = trim(htmlentities(mysqli_real_escape_string($dbc, $_POST['CVV'])));

// Retrieve productID based upon user-selected lumberType
$productIDQuery = 'SELECT productID, numInStock, costSoldPerUnit FROM Product WHERE Product.lumberType = "' . $lumberType . '";';
$productIDExecute = @mysqli_query($dbc, $productIDQuery);
$row2 = mysqli_fetch_array($productIDExecute);
$productID = $row2['productID'];
$numInStock = $row2['numInStock'];
$costPerUnit = $row2['costSoldPerUnit'];

// Calculate total cost of order
$shippingFee = 1500;
$totalCost = (intval($numberOfUnits) * intval($costPerUnit)) + intval($shippingFee);

// *********************** Data for List Transactions ***********************
$transactionsQuery = 'SELECT transactionID, productID, numberOfUnits, shippingFee, totalCost, transactionStatus, dt FROM Transact WHERE customerID = ' . $customerID . ';';
$transactionsExecute = @mysqli_query($dbc, $transactionsQuery);

// *********************** Data for Create Shipment ***********************
// Retrieve address
$street = trim(htmlentities(mysqli_real_escape_string($dbc, $_POST['Street'])));
$city = trim(htmlentities(mysqli_real_escape_string($dbc, $_POST['City'])));
$state = trim(htmlentities(mysqli_real_escape_string($dbc, $_POST['State'])));
$zip = trim(htmlentities(mysqli_real_escape_string($dbc, $_POST['ZIP'])));

// if POST
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // if customer submits order
    if ($_POST['CustomerCreateOrderButton'] == 'CustomerCreateOrder')
    {
        // (remove echoes with values output -- they were for testing)
        if (empty($customerID) || empty($productID) || empty($totalCost) || empty($numberOfUnits) || empty($street) || empty($city) || 
        empty($state) || empty($zip) || empty($card) || empty($cvv))
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
            // Create new transaction query
            $createOrderQuery= 'INSERT INTO Transact (customerID, productID, numberOfUnits, shippingFee, totalCost, transactionStatus)
            VALUES (' . $customerID . ', ' . $productID . ', ' . $numberOfUnits . ', ' . $shippingFee . ', ' . $totalCost . ', "N")';
            // Execute new transaction query
            $createOrderExecute = @mysqli_query($dbc, $createOrderQuery);

            // If query executes
            if ($createOrderExecute)
            {
                // Grab transactionID of the transaction created above
                $transactionID = mysqli_insert_id($dbc);
                // Create new shipment query
                $createShipmentQuery = 'INSERT INTO Shipment (transactionID, street, city, state, zip) 
                VALUES ("' . $transactionID . '", "' . $street . '", "' . $city . '", "' . $state . '", "' . $zip . '")';

                // Calculate updated stock
                $updatedStock = (intval($numInStock) - intval($numberOfUnits));
                // Update stock query
                $updateStockQuery = 'UPDATE Product SET numInStock = ' . $updatedStock . ' WHERE Product.productID = ' . $productID . ';';

                // if the company has enough of [selected product] in stock
                if (intval($numInStock) >= intval($numberOfUnits)) 
                {
                    // Update stock and create new shipment
                    $updateExecute = @mysqli_query($dbc, $updateStockQuery);
                    $createShipmentExecute = @mysqli_query($dbc, $createShipmentQuery);

                    // If shipment is created successfully
                    if ($createShipmentExecute) 
                    {
                        header('Location: OrderSubmissionConfirmation.php');
                        mysqli_close($dbc);
                    }
                    else 
                    {
                        echo 'Shipment could not be created.&nbsp;
                        SQL ERROR: ' . mysqli_error($dbc);
                    }
                }
                else 
                {
                    echo '<form action="CustomerCreateOrder.php">';
                    echo '<p>ERROR! Not enough product in stock!</p>';
                    echo '<button>Ok</button>';
                    echo '</form>';
                }
            }
            else 
            {
                echo 'Transaction could not be submitted.&nbsp;
                SQL ERROR: ' . mysqli_error($dbc);
                echo $createOrderQuery;
            }               
        }
    }
}

/*
CODE FOR STATIC CONFIRMATION PAGES INSTEAD OF JAVASCRIPT
CustomerConfirmOrder.php is in "UnusedPages Folder on Brian's local machine"
// if customer confirms order
    if ($_POST['CustomerConfirmOrderButton'] == 'ConfirmButton')
    {
        // Execute new transaction query
        $createOrderExecute = @mysqli_query($dbc, $GLOBALS['createOrderQuery']);
        
        // If query executes
        if ($createOrderExecute)
        {
            // Grab transactionID of the transaction created above
            $transactionID = mysqli_insert_id($dbc);
            // Create new shipment query
            $createShipmentQuery = 'INSERT INTO Shipment (transactionID, street, city, state, zip) 
            VALUES ("' . $transactionID . '", "' . $street . '", "' . $city . '", "' . $state . '", "' . $zip . '")';

            // Calculate updated stock
            $updatedStock = (intval($numInStock) - intval($numberOfUnits));
            // Update stock query
            $updateStockQuery = 'UPDATE Product SET numInStock = ' . $updatedStock . ' WHERE Product.productID = ' . $productID . ';';

            // if the company has enough of [selected product] in stock
            if (intval($numInStock) >= intval($numberOfUnits)) 
            {
                // Update stock and create new shipment
                $updateExecute = @mysqli_query($dbc, $updateStockQuery);
                $createShipmentExecute = @mysqli_query($dbc, $createShipmentQuery);

                // If shipment is created successfully
                if ($createShipmentExecute) 
                {
                    header('Location: OrderSubmissionConfirmation.php');
                    mysqli_close($dbc);
                }
                else 
                {
                    echo 'Shipment could not be created.&nbsp;
                    SQL ERROR: ' . mysqli_error($dbc);
                }
            }
            else 
            {
                echo '<form action="CustomerCreateOrder.php">';
                echo '<p>ERROR! Not enough product in stock!</p>';
                echo '<button>Ok</button>';
                echo '</form>';
            }
        }
        else 
        {
            echo 'Transaction could not be submitted.&nbsp;
            SQL ERROR: ' . mysqli_error($dbc);
            print_r($GLOBALS['createOrderQuery']);
        }               
    }





    // if customer submits order
    if ($_POST['CustomerCreateOrderButton'] == 'CustomerCreateOrder')
    {
        // (remove echoes with values output -- they were for testing)
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
            // Create new transaction query
            $createOrderQuery= 'INSERT INTO Transact (customerID, productID, numberOfUnits, shippingFee, totalCost, transactionStatus)
            VALUES (' . $customerID . ', ' . $productID . ', ' . $numberOfUnits . ', ' . $shippingFee . ', ' . $totalCost . ', "N")';
            // Execute new transaction query
            $createOrderExecute = @mysqli_query($dbc, $createOrderQuery);

            // If query executes
            if ($createOrderExecute)
            {
                // Grab transactionID of the transaction created above
                $transactionID = mysqli_insert_id($dbc);
                // Create new shipment query
                $createShipmentQuery = 'INSERT INTO Shipment (transactionID, street, city, state, zip) 
                VALUES ("' . $transactionID . '", "' . $street . '", "' . $city . '", "' . $state . '", "' . $zip . '")';

                // Calculate updated stock
                $updatedStock = (intval($numInStock) - intval($numberOfUnits));
                // Update stock query
                $updateStockQuery = 'UPDATE Product SET numInStock = ' . $updatedStock . ' WHERE Product.productID = ' . $productID . ';';

                // if the company has enough of [selected product] in stock
                if (intval($numInStock) >= intval($numberOfUnits)) 
                {
                    // Update stock and create new shipment
                    $updateExecute = @mysqli_query($dbc, $updateStockQuery);
                    $createShipmentExecute = @mysqli_query($dbc, $createShipmentQuery);

                    // If shipment is created successfully
                    if ($createShipmentExecute) 
                    {
                        header('Location: OrderSubmissionConfirmation.php');
                        mysqli_close($dbc);
                    }
                    else 
                    {
                        echo 'Shipment could not be created.&nbsp;
                        SQL ERROR: ' . mysqli_error($dbc);
                    }
                }
                else 
                {
                    echo '<form action="CustomerCreateOrder.php">';
                    echo '<p>ERROR! Not enough product in stock!</p>';
                    echo '<button>Ok</button>';
                    echo '</form>';
                }
            }
            else 
            {
                echo 'Transaction could not be submitted.&nbsp;
                SQL ERROR: ' . mysqli_error($dbc);
                print_r($GLOBALS['createOrderQuery']);
            }               
        }
    }
*/