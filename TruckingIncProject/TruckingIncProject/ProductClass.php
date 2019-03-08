<?php
class Product
{
	var $productID;
	var $lumberType;
	var $vendorID;
	var $costPerUnit;

	function getProductID() 	{return $this->productID;}
	function getLumberType() 	{return $this->lumberType;}
	function getVendorID()		{return $this->vendorID;}
	function getCostPerUnit() 	{return $this->costPerUnit;}

	function setLumberType($lumberType) 	{$this->lumberType = $lumberType;}
	function setVendorID($vendorID) 	{$this->vendorID = $vendorID;}
	function setCostPerUnit($costPerUnit) 	{$this->costPerUnit = $costPerUnit;}
}
