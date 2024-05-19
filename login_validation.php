<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error_username = $error_password = ""; // Initialize error variables

    // Check if username is empty
    if(empty($_POST['username'])) {
        $error_username = "Username is required";
    }
    // Check if password is empty
    if(empty($_POST['password'])) {
        $error_password = "Password is required";
    }

    // If no errors, proceed with login logic
    if(empty($error_username) && empty($error_password)) {
        // Perform your login logic here
        // Example: check credentials against a database
    }
}
?>

