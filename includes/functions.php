<!-- functions.php -->
<?php

// Function to sanitize user input
function sanitize_input($input) {
    return htmlspecialchars(strip_tags($input));
}

// Function to redirect to a specified location
function redirect($location) {
    header("Location: $location");
    exit;
}

// Function to generate a random alphanumeric string
function generate_random_string($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $random_string = '';
    for ($i = 0; $i < $length; $i++) {
        $random_string .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $random_string;
}

// Function to check if user is logged in
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

?>
