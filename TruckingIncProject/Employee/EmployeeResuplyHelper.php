<?php

session_start();
require ('CheckSignedIn.php');
require ('CheckPermissionAorB.php');

// *********************** List Inventory ***********************
$viewInventoryQuery = "SELECT Product.productID, Product.lumberType,  
Product.costSoldPerUnit, Product.numInStock FROM Product;";
$viewInventoryExecute = @mysqli_query($dbc, $viewInventoryQuery);


// ********************** List Product Purchase History *************************
$viewHistoryQuery = "SELECT * FROM ProductPurchase";
$viewHistoryExecute = @mysqli_query($dbc, $viewHistoryQuery);


// ********************** Add Product Purchase Records *************************
// --- Pull data from form ---
$costPerUnit = $_POST['CostPerUnit']; $costPerUnit = htmlentities($costPerUnit);
$quantity = $_POST['Quantity']; $quantity = htmlentities($quantity);
$vendorName = $_POST['SelectVendor']; $vendorName = htmlentities($vendorName);
$productName = $_POST['SelectProduct']; $productName = htmlentities($productName);

// --- Product Name ---
$productNameQuery = "SELECT lumberType FROM Product";
$productNameExecute = @mysqli_query($dbc, $productNameQuery); 
// Retrieve productID based upon productName selection
$productIDQuery = 'SELECT productID FROM Product WHERE Product.lumberType = "' . $productName . '";';
$productIDExectute = @mysqli_query($dbc, $productIDQuery);
$row2 = mysqli_fetch_array($productIDExectute);
$productID = $row2['productID'];

// --- Company Name ---
$vendorNameQuery = "SELECT companyName FROM Vendor";
$vendorNameExecute = @mysqli_query($dbc, $vendorNameQuery);
// Retrieve vendorID based upon companyName selection
$vendorQuery = 'SELECT vendorID FROM Vendor WHERE companyName = "' . $vendorName . '";';
$vendorIDExecute = @mysqli_query($dbc, $vendorQuery);
$row4 = mysqli_fetch_array($vendorIDExecute);
$vendorID = $row4['vendorID'];

// --- Calculate total cost ---
$totalCost = (intval($costPerUnit) * intval($quantity));


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  // *********************** Add Product Purchase Records ***********************
  if ($_POST['AddPurchaseRecord'] == 'AddPurchaseRecord')
  {
    if (empty($productID) || empty($vendorID) || empty($costPerUnit) || empty($totalCost) || empty($quantity))
    {
      echo '<form action="EmployeeResuply.php">';
      echo "Product ID: " . $productID . " " . gettype($productID) . " ";
      echo "Vendor ID: " . $vendorID . " " . gettype($vendorID) . " ";
      echo "Cost per: " . $costPerUnit . " " . gettype($costPerUnit) . " ";
      echo "Total Cost: " . $totalCost . " " . gettype($totalCost) . " ";
      echo "Quantity: " . $quantity . " " . gettype($quantity) . " ";
      echo '<p>ERROR! All fields must be filled!</p>';
      echo '<button>Ok</button>';
      echo '</form>';
    }
    else
    {
        $addRecordQuery = 'INSERT INTO ProductPurchase (productID, vendorID, costPerUnit, totalCost, quantity)
        VALUES (' . $productID . ', ' . $vendorID . ', ' . $costPerUnit . ', ' . $totalCost . ', ' . $quantity . ');';
        $addRecordExecute = @mysqli_query($dbc, $addRecordQuery) or die(mysqli_error($dbc));

        if ($addRecordExecute)
        {
            header('Location: EmployeeResuply.php');

            // Update numInStock in Product table (for selected product)
            // Retrieve current stock
            $inStockQuery = 'SELECT numInStock FROM Product WHERE Product.productID = "' . $productID . '";';
            $inStockExecute = @mysqli_query($dbc, $inStockQuery);
            $row5 = mysqli_fetch_array($inStockExecute);
            $inStock = $row5['numInStock'];

            // Calculate updated stock
            $updatedStock = (intval($inStock) + intval($quantity));

            // Update stock
            $updateStockQuery = 'UPDATE Product SET numInStock = ' . $updatedStock . ' WHERE Product.productID = ' . $productID . ';';
            $updateExecute = @mysqli_query($dbc, $updateStockQuery);
        }
        else
        {
            echo '<h1>System Error</h1>';
            echo "Product ID: " . $productID . " " . gettype($productID) . " ";
            echo "Vendor ID: " . $vendorID . " " . gettype($vendorID) . " ";
            echo "Cost per: " . $costPerUnit . " " . gettype($costPerUnit) . " ";
            echo "Total Cost: " . $totalCost . " " . gettype($totalCost) . " ";
            echo "Quantity: " . $quantity . " " . gettype($quantity) . " ";
            echo '<form action="EmployeeSignUp.php">';
            echo '<p>Something went wrong...</p>';
            echo '<button>Ok</button>';
            echo '</form>';
      }
      mysqli_close($dbc);
    }
  }
}
