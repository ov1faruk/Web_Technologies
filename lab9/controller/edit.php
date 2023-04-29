<?php 

	// Initialize variables to store user input and error messages
    $flag = false;
    $username = "";
    $userErr = "";
    $password = "";
    $passwordErr = "";
    $firstname = "";
    $firstnameErr = "";
    $lastname = "";
    $lastnameErr = "";
    $gender = "";
    $genderErr = "";
    $mobileno = "";
    $mobilenoErr = "";
    $email = "";
    $emailErr = "";
    $address1 = "";
    $country = "";
    $addressErr = "";
    $updateMsg = "";
    $errorMsg = "";

    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        // Validate user input and set error flags if necessary
        if (empty($_POST['firstname'])) {
            $firstnameErr = "First Name is Empty";
            $flag = true;
        }

        if (empty($_POST['lastname'])) {
            $lastnameErr = "Last Name is Empty";
            $flag = true;
        }

        if (empty($_POST['email'])) {
            $emailErr = "Email is Empty";
            $flag = true;
        }

        if (empty($_POST['mobileno'])) {
            $mobilenoErr = "Mobileno is Empty";
            $flag = true;
        }

        if (empty($_POST['address1'])) {
            $addressErr = "Street/House/Road is Empty";
            $flag = true;
        }

        // Create function to sanitize user input
        function test_input($data) {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }

    // Include editConnection script
    include('../model/editConnection.php');
    
?>

