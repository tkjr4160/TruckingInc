<?php
class Shipment
{
	var $shipmentID;
	var $employeeID;
	var $mileageUsed;
	var $truckMaintenanceCosts;
	var $fuelCosts;
	var $shippingFee;
	var $status;

	function getShipmentID() 		{return $this->shipmentID;}
	function getEmployeeID() 		{return $this->employeeID;}
	function getMileageUsed() 		{return $this->mileageUsed;}
	function getTruckMaintenanceCosts() 	{return $this->truckMaintenanceCosts;}
	function getfuelCosts() 		{return $this->fuelCosts;}
	function getShippingFee() 		{return $this->shippingFee;}
	function getStatus() 			{return $this->status;}

	function setEmployeeID($employeeID) 				{$this->employeeID = $employeeID;}
	function setMileageUsed($mileageUsed) 				{$this->mileageUsed = $mileageUsed;}
	function setTruckMaintenanceCosts($truckMaintenanceCosts) 	{$this->truckMaintenanceCosts = $truckMaintenanceCosts;}
	function setfuelCosts($fuelCosts) 				{$this->fuelCosts = $fuelCosts;}
	function setShippingFee($shippingFee) 				{$this->shippingFee = $shippingFee;}
	function setStatus($status) 					{$this->status = $status;}
}
