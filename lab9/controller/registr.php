<?php 
	include('Connection.php');

	if(isset($_POST['submit']))
	{
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$userName = $_POST['userName'];
		$password = $_POST['password'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$mobileNo = $_POST['mobileNo'];
		$address1 = $_POST['address1'];
		$country = $_POST['country'];

		if ($firstName != '' && $lastName != '' && $userName != ''&& $password != '' && $gender != '' && $email != '' && $mobileNo !='' && $address1 != '' && $country != '')
		{
			$insertQuery = "INSERT INTO users(first_name, last_name, user_name, password, gender, email, mobile_no, address_1, country) VALUES('$firstName', '$lastName', '$userName', '$password', '$gender', '$email', '$mobileNo', '$address1', '$country')";

			if($conn->query($insertQuery)==true)
			{
				echo "Registration has been successful.<br>";
			}

		}
		else
		{
			echo "Please fill in all the required fields.";
		}

		$conn->close();	
	}
?>
