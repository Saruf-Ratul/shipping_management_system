<?php
// Include necessary files and initialize session
require_once('api/config.php');
require_once('includes/header.php');
require_once('includes/functions.php');

// Check if the user is logged in
if (!isLoggedIn()) {
    header('Location: login.php');
    exit();
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate form inputs (you will need to implement validation)
    $errors = validateOrderForm($_POST);

    // If no errors, proceed to create the order
    if (empty($errors)) {
        $orderData = processOrder($_POST); // You'll need to implement this function
        if ($orderData) {
            // Order created successfully, display success message or redirect to order detail page
            $_SESSION['success'] = 'Order created successfully.';
            header('Location: order_detail.php?id=' . $orderData['order_id']);
            exit();
        } else {
            $errors[] = 'Failed to create order. Please try again later.';
        }
    }
}

// Fetch user's default ship from address from the database (you'll need to implement this)
$defaultShipFromAddress = getDefaultShipFromAddress($_SESSION['user_id']);

// Fetch available services and package types for the user's group (you'll need to implement this)
$availableServices = getAvailableServices($_SESSION['user_group_id']);
$availablePackageTypes = getAvailablePackageTypes($_SESSION['user_group_id']);

// Fetch FedEx drop-off locations (you'll need to implement this)
$fedexDropOffLocations = getFedexDropOffLocations();

// Fetch USPS drop-off locations (you'll need to implement this)
$uspsDropOffLocations = getUspsDropOffLocations();

// Fetch USPS pickup locations (you'll need to implement this)
$uspsPickupLocations = getUspsPickupLocations();

// Fetch saved orders for the user (you'll need to implement this)
$savedOrders = getSavedOrders($_SESSION['user_id']);

// Fetch voided orders for the user (you'll need to implement this)
$voidedOrders = getVoidedOrders($_SESSION['user_id']);

// Fetch list of orders that are shipped and not voided (you'll need to implement this)
$shippedOrders = getShippedOrders($_SESSION['user_id']);

// Fetch list of orders that are voided (you'll need to implement this)
$voidedOrders = getVoidedOrders($_SESSION['user_id']);

// Include HTML for order form
include('templates/order_form.php');

// Include HTML for saved orders, shipped orders, voided orders, etc. (you'll need to implement these templates)
include('templates/saved_orders.php');
include('templates/shipped_orders.php');
include('templates/voided_orders.php');

// Include footer
require_once('includes/footer.php');
?>
