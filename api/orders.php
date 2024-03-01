<?php

require_once 'config.php';
require_once 'auth.php';

// Example API endpoint for getting orders
function getOrders($token) {
    $user = authenticateUser($token);

    // Connect to database and fetch orders
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM orders WHERE user_id = " . $user['id'];
    $result = $conn->query($sql);

    $orders = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
    }

    $conn->close();

    return $orders;
}

?>
