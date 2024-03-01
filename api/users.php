<?php

require_once 'config.php';
require_once 'auth.php';

// Example API endpoint for getting user profile
function getUserProfile($token) {
    $user = authenticateUser($token);

    // Connect to database and fetch user profile
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, username, email FROM users WHERE id = " . $user['id'];
    $result = $conn->query($sql);

    $profile = array();
    if ($result->num_rows > 0) {
        $profile = $result->fetch_assoc();
    }

    $conn->close();

    return $profile;
}

// Example API endpoint for updating user profile
function updateUserProfile($token, $userData) {
    $user = authenticateUser($token);

    // Connect to database and update user profile
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $userData['username'];
    $email = $userData['email'];

    $sql = "UPDATE users SET username = '$username', email = '$email' WHERE id = " . $user['id'];

    if ($conn->query($sql) === TRUE) {
        return array("message" => "User profile updated successfully");
    } else {
        return array("error" => "Error updating user profile: " . $conn->error);
    }

    $conn->close();
}

?>
