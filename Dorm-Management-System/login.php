<?php
// login.php
session_start();
require_once('config/db_connect.php');

$error = "";

// Check if user is already logged in
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: admin/dashboard.php");
    } else {
        header("Location: tenant/portal.php");
    }
    exit();
}

// --- LOGIN PROCESSING ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Query to fetch user details
    $sql = "SELECT id, password, role, name, tenant_id FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $hashed_password = $user['password'];
        
        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Login Successful! Set Session Variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['name'] = $user['name']; // Store name for welcome message

            // Redirect based on role
            if ($user['role'] == 'admin') {
                header("Location: admin/dashboard.php");
                exit();
            } else if ($user['role'] == 'tenant') {
                header("Location: tenant/portal.php");
                exit();
            }
        }
    }
    
    // If login failed (incorrect password or email)
    $error = "Invalid email or password.";
}
// --- END LOGIN PROCESSING ---
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dormitory System Login</title>
    <style> .error { color: red; } </style>
</head>
<body>
    <h2>System Login</h2>
    <?php if ($error) echo "<p class='error'>$error</p>"; ?>
    <form method="POST" action="login.php">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
    <p>Initial Admin Setup? <a href="register_admin.php">Register Here</a></p>
</body>
</html>