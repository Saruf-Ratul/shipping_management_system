<?php

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'Ratul');
define('DB_PASS', '123321');
define('DB_NAME', 'shipping_management_system');

// Database connection settings
$host = 'localhost'; // or your database host
$dbname = 'shipping_management_system';
$username = 'Ratul';
$password = '123321';

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If connection fails, show error message
    die("Connection failed: " . $e->getMessage());
}


// API keys
define('EASYPOST_API_KEY', 'your_easypost_api_key');
define('GOOGLE_MAPS_API_KEY', 'your_google_maps_api_key');
define('STRIPE_API_KEY', 'your_stripe_api_key');

?>
