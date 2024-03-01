<?php
// Include necessary files
require_once 'api/config.php';
require_once 'api/auth.php';
require_once 'includes/header.php';
require_once 'includes/functions.php';

// Check if the user is logged in
$user = check_auth();
if (!$user) {
    header("Location: login.php");
    exit();
}

// Get user details from the database
$user_id = $user['id'];
$query = "SELECT * FROM users WHERE id = :user_id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$user_data = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<div class="container">
    <h2>User Profile</h2>
    <div class="row">
        <div class="col-md-6">
            <form>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" value="<?php echo $user_data['username']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" value="<?php echo $user_data['email']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="balance">Balance:</label>
                    <input type="text" class="form-control" id="balance" value="<?php echo $user_data['balance']; ?>" readonly>
                </div>
                <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
            </form>
        </div>
    </div>
</div>

<?php
require_once 'includes/footer.php';
?>
