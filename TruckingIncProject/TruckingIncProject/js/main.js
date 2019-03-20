<script>
	function passwordMask() {
		var x = document.getElementById("CustomerPassword", "EmployeePassword", "CustomerRepeatPassword", "CustomerPassword", "EmployeePassword", "EmployeeRepeatPassword");
		if (x.type === "password") {
				x.type = "text";
		} else {
			x.type = "password";
		}
	}

	function validateForm() {
		var x = document.EmployeeSignInForm["EmployeeSignInForm"]["EmployeeUsername"].value;
		if (x == "") {
			alert(name+" must be filled out.");
			return false;
		}
	}

</script>