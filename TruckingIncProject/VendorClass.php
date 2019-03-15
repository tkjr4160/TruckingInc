<?php
class Vendor
{
	var $vendorID;
	var $companyName;
	var $street;
	var $city;
	var $state;
	var $zip;
	var $phone;
	var $email;

	function getVendorID() 		{return $this->vendorID;}
	function getCompanyName() 	{return $this->companyName;}
	function getStreet() 		{return $this->street;}
	function getCity() 		{return $this->city;}
	function getState() 		{return $this->state;}
	function getZip() 		{return $this->zip;}
	function getPhone() 		{return $this->phone;}
	function getEmail() 		{return $this->email;}

	function setCompanyName($companyName) 		{$this->companyName = $companyName;}
	function setStreet($street) 			{$this->street = $street;}
	function setCity($city) 			{$this->city = $city;}
	function setState($state) 			{$this->state = $state;}
	function setZip($zip) 				{$this->zip = $zip;}
	function setPhone($phone) 			{$this->phone = $phone;}
	function setEmail($email) 			{$this->email = $email;}
}
