<?php 
	// Include connection script
	include('Connection.php');

	// Define variables to store user details
	$firstname = "";
	$lastname = "";
	$username = "";
	$gender = "";
	$email = "";
	$mobileno = "";
	$address1 = "";
	$country = "";

	// Get username from session and retrieve user details from database
    $username = $_SESSION['username'];
    $findresult = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if($res = mysqli_fetch_array($findresult))
    {
        $username = $res['username'];
        $firstname = $res['firstname'];
        $lastname = $res['lastname'];
        $gender = $res['gender'];
        $email = $res['email'];
        $mobileno = $res['mobileno'];
        $address1 = $res['address1'];
        $country = $res['country'];
    }

    // Display user details in HTML format
    echo "<h3>First Name: ".$firstname."</h3>".
         "<h3>Last Name: ".$lastname."</h3>".
         "<h3>User Name: ".$username." </h3>".
         "<h3>Gender: ".$gender."</h3>".
         "<h3>Email: ".$email."</h3>".
         "<h3>Mobile Number: ".$mobileno."</h3>".
         "<h3>Address: ".$address1."</h3>".
         "<h3>Country: ".$country."</h3>";

 ?>

<?php 