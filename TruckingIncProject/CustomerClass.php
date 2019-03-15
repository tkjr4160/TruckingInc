<?php
class Customer
{
	private $customerID;
	private $firstName;
	private $middleInitial;
	private $lastName;
	private $street;
	private $city;
	private $state;
	private $zip;
	private $phone;
	private $email;
	private $username;
	private $password;

	function getCustomerID() 	{return $this->customerID;}
	function getFirstName() 	{return $this->firstName;}
	function getMiddleInitial() 	{return $this->middleInitial;}
	function getLastName() 		{return $this->lastName;}
	function getStreet() 		{return $this->street;}
	function getCity() 		{return $this->city;}
	function getState() 		{return $this->state;}
	function getZip() 		{return $this->zip;}
	function getPhone() 		{return $this->phone;}
	function getEmail() 		{return $this->email;}
	function getUsername() 		{return $this->username;}
	function getPassword() 		{return $this->password;}

	function setCustomerID($customerID)			{$this->customerID = $customerID;}
	function setFirstName($firstName) 		{$this->firstName = $firstName;}
	function setMiddleInitial($middleInitial) 	{$this->middleInitial = $middleInitial;}
	function setLastName($lastName) 		{$this->lastName = $lastName;}
	function setStreet($street) 			{$this->street = $street;}
	function setCity($city) 			{$this->city = $city;}
	function setState($state) 			{$this->state = $state;}
	function setZip($zip) 				{$this->zip = $zip;}
	function setPhone($phone) 			{$this->phone = $phone;}
	function setEmail($email) 			{$this->email = $email;}
	function setUsername($username) 		{$this->username = $username;}
	function setPassword($password) 		{$this->password = $password;}
}
