/* Login/Sign-up Drop-down*/

function openLoginForm() {
  document.getElementById("login-form").style.display = "block";
}

function closeLoginForm() {
  document.getElementById("login-form").style.display = "none";
}

function openSignupForm() {
  document.getElementById("signup-form").style.display = "block";
}

function closeSignupForm() {
  document.getElementById("signup-form").style.display = "none";
}

function openEmployeeLoginForm() {
  document.getElementById("employee-login-form").style.display = "block";
}

function closeEmployeeLoginForm() {
  document.getElementById("employee-login-form").style.display = "none";
}

function myFunction() {
	console.log('myFunction started');
	jQuery.post("CustomerCreateOrderJSONhelper.php", {
		"LumberType": document.getElementById("LumberType").value,
		"NumberUnits": document.getElementById("NumberUnits").value,
		"Street": document.getElementById("Street").value,
		"City": document.getElementById("City").value,
		"State": document.getElementById("State").value,
		"ZIP": document.getElementById("ZIP").value,
		"CardNumber": document.getElementById("CardNumber").value,
		"CVV": document.getElementById("CVV").value,
		"Expiration": document.getElementById("Expiration").value
	}, function(data) {
		document.getElementById("lumberType").innerHTML = data['LumberType'];
		document.getElementById("numberUnits").innerHTML = data['NumberUnits'];
		document.getElementById("street").innerHTML = data['Street'];
		document.getElementById("city").innerHTML = data['City'];
		document.getElementById("state").innerHTML = data['State'];
		document.getElementById("zip").innerHTML = data['ZIP'];
		document.getElementById("cardNumber").innerHTML = data['CardNumber'];
		document.getElementById("cvv").innerHTML = data['CVV'];
		document.getElementById("expr").innerHTML = data['Expiration'];
		document.getElementById("costPerUnit").innerHTML = data['CostPerUnit'];
		document.getElementById("shippingFee").innerHTML = data['ShippingFee'];
		document.getElementById("totalCost").innerHTML = data['TotalCost'];
		modalDisplay();
	}, 'json').fail(function(err) {
		console.log(err);
	});
}