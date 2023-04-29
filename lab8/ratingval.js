function validateForm(pForm) {
	let flag = "";

	if (pForm.packageName.value === "") {
		document.getElementById("packageNameErrMsg").innerHTML = "Please enter a valid package name.";
		flag = "Empty";
	}

	if (pForm.rating.value === "") {
		document.getElementById("ratingErrMsg").innerHTML = "Please enter a valid rating number.";
		flag = "Empty";
	}

	if (flag === "") {
		return true;
	}
	
	return false;
}
