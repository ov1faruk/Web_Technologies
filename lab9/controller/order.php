<?php
$package = "";
$shop = "";
$place = "";
$price = "";
$score = "";
if(isset($_POST['submit']))
	{
		$package = $_POST['package'];
		$shop = $_POST['shop'];
		$place = $_POST['place'];
		$price = $_POST['price'];
		$score =$_POST['score'];
		
		if ($package != '' && $shop != '' && $place != ''&& $price != '' && $score !='')
		{
			$insertQuery = "INSERT INTO package(package, shop, place, price, score) VALUES('$package', '$shop', '$place', '$price', '$score')";
        
            if($conn->query($insertQuery)==true)
            {
                echo "Package has been successfully registered.";
            }
		}
		else
		{
			echo "Please complete all the required fields.";
		}

		$conn->close();		
	}
?>
