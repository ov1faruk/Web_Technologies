<?php 

    // Start session and include loginConnection script
    session_start();
    include('../model/loginConnection.php');

    // Initialize variables to store user input and error messages
    $username = "";
    $userErrMsg = "";
    $password = "";
    $passErrMsg = "";

    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        // Create function to sanitize user input
        function test_input($data) {
            $data = htmlspecialchars($data);
            return $data;
        }

        // Retrieve and sanitize username and password from user input
        $username = test_input($_POST['username']);
        $password = test_input($_POST['password']);

        // Define variable for message to be displayed after form submission
        $message = "";

        // Check if username and/or password are empty and set error flags if necessary
        if (empty($username)) {
            $userErrMsg = "Empty username";
        }
        if (empty($password)) {
            $passErrMsg = "Empty password";
        }
        else {
            echo $message;
        }
    } 
?>

