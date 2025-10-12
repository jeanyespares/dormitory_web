<?php
// tenant/portal.php
session_start();

// Security Check: Only allow 'tenant' role
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'tenant') {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tenant Portal</title>
</head>
<body>
    <h2>Welcome, Tenant <?php echo $_SESSION['name']; ?>!</h2>
    <p>This is your personal portal. You can view your room details and payment history.</p>
    <p>This is where your **Rent Due Alerts** will appear!</p>
    <p><a href="../logout.php">Logout</a></p>
</body>
</html>