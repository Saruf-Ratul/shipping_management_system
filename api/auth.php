<?php

require_once 'vendor/autoload.php'; // Include JWT library

use Firebase\JWT\JWT;

// Secret key for JWT
define('JWT_SECRET', 'your_secret_key');

// Function to generate JWT token
function generateJWT($data) {
    $payload = array(
        "data" => $data
    );
    return JWT::encode($payload, JWT_SECRET);
}

// Function to decode JWT token
function decodeJWT($token) {
    try {
        $decoded = JWT::decode($token, JWT_SECRET, array('HS256'));
        return (array) $decoded->data;
    } catch (Exception $e) {
        return null;
    }
}

// Function to authenticate user using JWT token
function authenticateUser($token) {
    $decoded = decodeJWT($token);
    if ($decoded) {
        return $decoded;
    } else {
        http_response_code(401);
        echo json_encode(array("message" => "Unauthorized"));
        exit();
    }
}

?>
