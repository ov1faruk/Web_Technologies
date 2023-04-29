function validateForm(pForm) {
	let flag = "";

	if (pForm.userName.value === "") {
		document.getElementById("userNameErrMsg").innerHTML = "Please enter a valid username.";
		flag = "Empty";
	}

	if (pForm.password.value === "") {
		document.getElementById("passwordErrMsg").innerHTML = "Please enter your password.";
		flag = "Empty";
	}

	if (flag === "") {
		return true;
	}
	
	return false;
}
