<?php
// admin/dashboard.php
session_start();

// Security Check: Only allow 'admin' role
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome, Admin <?php echo $_SESSION['name']; ?>!</h2>
    <p>This is your control panel. You can now manage Tenants, Rooms, and Payments.</p>
    <p><a href="../logout.php">Logout</a></p>
    
    <ul>
        <li><a href="#">Manage Tenants (Next Step!)</a></li>
        <li><a href="#">Manage Rooms</a></li>
    </ul>
</body>
</html>