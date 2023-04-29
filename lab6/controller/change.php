<?php 

    // Define variables to store user input and error messages
    $username="";
    $userErrMsg="";

    $password="";
    $passErrMsg="";

    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] === "POST") {

            // Create a function to sanitize user input
            function test_input($data) {
                $data = htmlspecialchars($data);
                return $data;
            }
            
            // Define a variable for the message that will be displayed after form submission
            $message = "";
            
            // Check if username and password are empty
            if (empty($username)) {
                $userErrMsg .= "Username is Empty";
               
            }
            if (empty($password)) {
                $passErrMsg .= "Password is Empty";
            }
                
            // If both fields are filled out, display success message
            else {
                echo $message;
            }
        }

        // Include connection script
        include('../model/changeConnection.php');
?>
