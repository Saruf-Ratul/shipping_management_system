<?php
// Include necessary files
require_once 'api/config.php';
require_once 'includes/header.php';
require_once 'includes/functions.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch user information
$user_id = $_SESSION['user_id'];
$user_info = getUserInfo($user_id); // Assuming you have a function to fetch user info

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include_once 'includes/header.php'; ?>

<div class="container">
    <h2>Welcome, <?php echo $user_info['username']; ?>!</h2>
    <p>Your email: <?php echo $user_info['email']; ?></p>
    <p>Your balance: $<?php echo $user_info['balance']; ?></p>
    <!-- You can add more user information here -->

    <!-- Example links/buttons to navigate to other pages -->
    <a href="order.php" class="btn">Create New Order</a>
    <a href="profile.php" class="btn">Edit Profile</a>
</div>

<?php include_once 'includes/footer.php'; ?>

</body>
</html>
