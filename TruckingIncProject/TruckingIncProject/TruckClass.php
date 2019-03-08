<?php
class Truck
{
	var $truckID;
	var $make;
	var $model;
	var $color;
	var $licenseNo;

	function getTruckID() 		{return $this->truckID;}
	function getMake() 		{return $this->make;}
	function getModel() 		{return $this->model;}
	function getColor() 		{return $this->color;}
	function getLicenseNo() 	{return $this->licenseNo;}

	function setMake($make)			{$this->make = $make;}
	function setModel($model)		{$this->model = $model;}
	function setColor($color) 		{$this->color = $color;}
	function setLicenseNo($licenseNo) 	{$this->licenseNo = $licenseNo;}
}
