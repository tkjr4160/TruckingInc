

<?php

session_start();
include ('CheckSignedIn.php');
include ('CheckPermissionAorB.php');

$CheckPositionQuery = "Select position From Employee Where WebsiteUsername = '$_SESSION[EmployeeUsername]'";
$CheckPositionExecution = @mysqli_query($dbc, $CheckPositionQuery);
$fetchPositionCheck = mysqli_fetch_array($CheckPositionExecution);

$CheckPermissionsQuery = "Select permissionsType From Employee Where WebsiteUsername = '$_SESSION[EmployeeUsername]'";
$CheckPermissionsExecution = @mysqli_query($dbc, $CheckPermissionsQuery);
$fetchPermissionsCheck = mysqli_fetch_array($CheckPermissionsExecution);

$balance = 1000000;
$earned = 0;
$spent = 0;
$truckCount = 0;
$truckAssets = 0;
$woodAssets = 0;

$TransactionList = '';
$ShipmentList = '';
$ProductPurchaseList = '';
$TruckList = '';

$TransactionListQuery = "SELECT * FROM Transact";
$TransactionListExecution = @mysqli_query($dbc, $TransactionListQuery);
while ($row = mysqli_fetch_array($TransactionListExecution))
{
  $transactionID = $row['transactionID'];

  $ShipmentQuery = "SELECT * FROM Shipment WHERE transactionID = '$transactionID'";
  $ShipmentExecution = @mysqli_query($dbc, $ShipmentQuery);
  $row1 = mysqli_fetch_array($ShipmentExecution);

  $TransactionList .= '
  <tr class="FormDivTableTr">
  <td align="left" class="FormDivTableTrTd">' . $row['dt'] . '</td>
  <td align="left" class="FormDivTableTrTd">' . $row['transactionID'] . '</td>
  <td align="left" class="FormDivTableTrTd">' . $row['productID'] . '</td>
  <td align="left" class="FormDivTableTrTd">' . number_format($row['numberOfUnits'], 0) . '</td>
  <td align="left" class="FormDivTableTrTd">$' . number_format($row['totalCost'], 2) . '</td>
  </tr>';

  $ShipmentList .= '
  <tr class="FormDivTableTr">
  <td align="left" class="FormDivTableTrTd">' . $row1['dt'] . '</td>
  <td align="left" class="FormDivTableTrTd">' . $row1['shipmentID'] . '</td>
  <td align="left" class="FormDivTableTrTd">' . $row['productID'] . '</td>
  <td align="left" class="FormDivTableTrTd">' . number_format($row1['mileageUsed'], 0) . '</td>
  <td align="left" class="FormDivTableTrTd">$' . number_format($row1['truckMaintenanceCosts'], 2) . '</td>
  <td align="left" class="FormDivTableTrTd">$' . number_format($row1['fuelCosts'], 2) . '</td>
  </tr>';

  $earned += $row['totalCost'];
  $spent += ($row1['truckMaintenanceCosts'] + $row1['fuelCosts']);
}

$ProductPurchaseListQuery = "SELECT * FROM ProductPurchase";
$ProductPurchaseListExecution = @mysqli_query($dbc, $ProductPurchaseListQuery);
while ($row = mysqli_fetch_array($ProductPurchaseListExecution))
{
  $ProductPurchaseList .= '
  <tr class="FormDivTableTr">
  <td align="left" class="FormDivTableTrTd">' . $row['dt'] . '</td>
  <td align="left" class="FormDivTableTrTd">' . $row['purchaseID'] . '</td>
  <td align="left" class="FormDivTableTrTd">' . $row['productID'] . '</td>
  <td align="left" class="FormDivTableTrTd">' . number_format($row['quantity'], 0) . '</td>
  <td align="left" class="FormDivTableTrTd">$' . number_format($row['totalCost'], 2) . '</td>
  </tr>';

  $spent += $row['totalCost'];
}

$TruckListQuery = "SELECT * FROM Truck";
$TruckListExecution = @mysqli_query($dbc, $TruckListQuery);
while($row = mysqli_fetch_array($TruckListExecution))
{
  $TruckList .= '
  <tr class="FormDivTableTr">
  <td align="left" class="FormDivTableTrTd">' . $row['dt'] . '</td>
  <td align="left" class="FormDivTableTrTd">' . $row['truckID'] . '</td>
  <td align="left" class="FormDivTableTrTd">$' . number_format($row['priceBoughtFor'], 2) . '</td>
  </tr>';

  $spent += $row['priceBoughtFor'];
  $truckCount += 1;
  $truckAssets += $row['priceBoughtFor'];
}

$ProductListQuery = "SELECT * FROM Product";
$ProductListExecution = @mysqli_query($dbc, $ProductListQuery);
while($row = mysqli_fetch_array($ProductListExecution))
{
  $woodAssets += ($row['costSoldPerUnit'] * $row['numInStock']);
}

$balance += ($earned - $spent);
