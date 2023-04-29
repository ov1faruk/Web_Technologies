function validateForm(pForm) {
	let flag = "";

	if (pForm.firstName.value === "") {
		document.getElementById("firstNameErrMsg").innerHTML = "Please enter your first name.";
		flag = "Empty";
	}

	if (pForm.lastName.value === "") {
		document.getElementById("lastNameErrMsg").innerHTML = "Please enter your last name.";
		flag = "Empty";
	}

	if (pForm.email.value === "") {
		document.getElementById("emailErrMsg").innerHTML = "Please enter a valid email address.";
		flag = "Empty";
	}

	if (pForm.mobileNo.value === "") {
		document.getElementById("mobileNoErrMsg").innerHTML = "Please enter a valid mobile number.";
		flag = "Empty";
	}

	if (pForm.address1.value === "") {
		document.getElementById("address1ErrMsg").innerHTML = "Please enter your address.";
		flag = "Empty";
	}

	if (flag === "") {
		return true;
	}
	
	return false;
}
