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

	if (pForm.userName.value === "") {
		document.getElementById("userNameErrMsg").innerHTML = "Please enter a valid username.";
		flag = "Empty";
	}

	if (pForm.password.value === "") {
		document.getElementById("passwordErrMsg").innerHTML = "Please enter your password.";
		flag = "Empty";
	}

	if (pForm.confirmPassword.value === "") {
		document.getElementById("confirmPasswordErrMsg").innerHTML = "Please confirm your password.";
		flag = "Empty";
	}

	if (pForm.gender.value === "") {
		document.getElementById("genderErrMsg").innerHTML = "Please select your gender.";
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
