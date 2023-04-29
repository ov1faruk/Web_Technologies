<?php

	include('../model/packagelistConnection.php');
 	
	$packageName="";
	$packageError="";

	$shopName="";
	$shopError="";

	$place="";
	$placeError="";

	$price="";
	$priceError="";

	$score="";
	$scoreError="";


	if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function sanitize_input($data) {
				$data = htmlspecialchars($data);
				return $data;
			}

			$packageName = sanitize_input($_POST['packageName']);
			$shopName = sanitize_input($_POST['shopName']);
			$place = sanitize_input($_POST['place']);
			$price = sanitize_input($_POST['price']);
			$score = sanitize_input($_POST['score']);
			

			$message = "";
			if (empty($packageName)) {
				$packageError = "Package Name cannot be empty";
			}
			
			if (empty($shopName)) {
				$shopError .= "Shop Name cannot be empty";
				$message .= "<br>";
			}

			if (empty($place)) {
				$placeError .= "Location cannot be empty";
				$message .= "<br>";
			}
			if (empty($price)) {
				$priceError .= "Price cannot be empty";
				$message .= "<br>";
			}
			if (empty($score)) {
				$scoreError .= "Score cannot be empty";
				$message .= "<br>";
			}
			
			
		}
	if(isset($_POST['submit']))
	{
		$packageName = $_POST['packageName'];
		$shopName = $_POST['shop'];
		$place = $_POST['place'];
		$price = $_POST['price'];
		$score = $_POST['score'];
		
		if ($packageName != '' && $shopName != '' && $place != ''&& $price != '' && $score !='')
		{
			$insertQuery = "INSERT INTO package(package_name, shop_name, place, price, score) VALUES('$packageName', '$shopName', '$place', '$price', '$score')";

			if($conn->query($insertQuery)==true)
			{
				echo "Package has been registered successfully.";
			}

		}
		else
		{
			echo "Please fill in all the required fields.";
		}

		$conn->close();

		

		
	}
?>
