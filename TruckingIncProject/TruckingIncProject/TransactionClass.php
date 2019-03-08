<?php
class Transaction
{
	var $transactionID;
	var $customerID;
	var $shipmentID;
	var $productID;
	var $numberOfUnits;

	function getTransactionID() 	{return $this->transactionID;}
	function getCustomerID() 	{return $this->customerID;}
	function getShipmentID() 	{return $this->shipmentID;}
	function getProductID() 	{return $this->productID;}
	function getNumberOfUnits() 	{return $this->numberOfUnits;}

	function setCustomerID($customerID) 		{$this->customerID = $customerID;}
	function seShipmentID($shipmentID) 		{$this->shipmentID = $shipmentID;}
	function setProductID($productID) 		{$this->productID = $productID;}
	function setNumberOfUnits($numberOfUnits) 	{$this->numberOfUnits = $numberOfUnits;}
}
