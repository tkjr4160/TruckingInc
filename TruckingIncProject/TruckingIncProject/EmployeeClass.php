<?php
class Employee
{
	var $employeeID;
	var $truckID;
	var $firstName;
	var $middleInitial;
	var $lastName;
	var $street;
	var $city;
	var $state;
	var $zip;
	var $phone;
	var $email;
	var $position;
	var $permissionsType;
	var $username;
	var $password;

	function getEmployeeID() 	{return $this->employeeID;}
	function getTruckID() 		{return $this->truckID;}
	function getFirstName() 	{return $this->firstName;}
	function getMiddleInitial() 	{return $this->middleInitial;}
	function getLastName() 		{return $this->lastName;}
	function getStreet() 		{return $this->street;}
	function getCity() 		{return $this->city;}
	function getState() 		{return $this->state;}
	function getZip() 		{return $this->zip;}
	function getPhone() 		{return $this->phone;}
	function getEmail() 		{return $this->email;}
	function getPosition()		{return $this->position;}
	function getPermissionsType()	{return $this->permissionsType;}
	function getUsername() 		{return $this->username;}
	function getPassword() 		{return $this->password;}

	function setTruckID($truckID)			{$this->truckID = $truckID;}
	function setFirstName($firstName) 		{$this->firstName = $firstName;}
	function setMiddleInitial($middleInitial) 	{$this->middleInitial = $middleInitial;}
	function setLastName($lastName) 		{$this->lastName = $lastName;}
	function setStreet($street) 			{$this->street = $street;}
	function setCity($city) 			{$this->city = $city;}
	function setState($state) 			{$this->state = $state;}
	function setZip($zip) 				{$this->zip = $zip;}
	function setPhone($phone) 			{$this->phone = $phone;}
	function setEmail($email) 			{$this->email = $email;}
	function setPosition($position)			{$this->position = $position;}
	function setPermissionsType($permissionsType)	{$this->permissionsType = $permissionsType;}
	function setUsername($username) 		{$this->username = $username;}
	function setPassword($password) 		{$this->password = $password;}

	function takeShipment(Shipment $shipment)	{$shipment->setEmployeeID($this->employeeID);}
}
