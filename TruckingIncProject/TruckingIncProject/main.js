//<script>
	//function passwordMask() {
		//var x = document.getElementById("CustomerPassword", "EmployeePassword", "CustomerRepeatPassword", "CustomerPassword", "EmployeePassword", "EmployeeRepeatPassword");
		//if (x.type === "password") {
				//x.type = "text";
		//} else {
			//x.type = "password";
		//}
	//}

//</script>

// CustomerCreateOrder.php
// Pull data from form, send to helper, send back
function myFunction() {
	console.log('myFunction started');
	jQuery.post("CustomerCreateOrderJSONhelper.php", {
		"LumberType": document.getElementById("LumberType").value,
		"NumberUnits": document.getElementById("NumberUnits").value,
		"Street": document.getElementById("Street").value,
		"City": document.getElementById("City").value,
		"State": document.getElementById("State").value,
		"ZIP": document.getElementById("ZIP").value
	}, function(data) {
		document.getElementById("lumberType").innerHTML = data['LumberType'];
		document.getElementById("numberUnits").innerHTML = data['NumberUnits'];
		document.getElementById("street").innerHTML = data['Street'];
		document.getElementById("city").innerHTML = data['City'];
		document.getElementById("state").innerHTML = data['State'];
		document.getElementById("zip").innerHTML = data['ZIP'];
		document.getElementById("costPerUnit").innerHTML = data['CostPerUnit'];
		document.getElementById("shippingFee").innerHTML = data['ShippingFee'];
		document.getElementById("totalCost").innerHTML = data['TotalCost'];
		modalDisplay();
	}, 'json').fail(function(err) {
		console.log(err);
	});
}