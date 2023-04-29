<?php 
	include('Conn.php');

	$firstName = $lastName = $userName = $gender = $email = $mobileNo = $address1 = $country = "";

    $userName = $_SESSION['username'];
    $findResult = mysqli_query($conn, "SELECT * FROM users WHERE username = '$userName'");

    if($res = mysqli_fetch_array($findResult))
    {
        $userName = $res['username'];
        $firstName = $res['first_name'];
        $lastName = $res['last_name'];
        $gender = $res['gender'];
        $email = $res['email'];
        $mobileNo = $res['mobile_no'];
        $address1 = $res['address_1'];
        $country = $res['country'];
    }

    echo "<h3>First Name : ".$firstName." </h3>".
         "<h3>Last Name : ".$lastName."</h3>".
         "<h3>User Name : ".$userName." </h3>".
         "<h3>Gender : ".$gender." </h3>".
         "<h3>Email : ".$email." </h3>".
         "<h3>Mobile Number : ".$mobileNo." </h3>".
         "<h3>Address : ".$address1." </h3>".
         "<h3>Country : ".$country." </h3>";
?>