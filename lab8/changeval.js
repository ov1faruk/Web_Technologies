function validateForm(pForm) {
	let flag = "";
	
	if (pForm.userName.value === "") {
		document.getElementById("userNameErrMsg").innerHTML = "Please enter correct username.";
		flag = "Empty";
	}

	if (pForm.password.value === "") {
		document.getElementById("passwordErrMsg").innerHTML = "Please enter correct password.";
		flag = "Empty";
	}

	if (flag === "") {
		return true;
	}
	
	return false;
}
