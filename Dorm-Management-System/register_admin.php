<?php
// register_admin.php
require_once('config/db_connect.php');

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Hash the password securely
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Set role to 'admin'
    $role = 'admin';

    // Check if user already exists
    $check_sql = "SELECT id FROM users WHERE email = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        $message = "<p style='color: red;'>Error: Admin with this email already exists!</p>";
    } else {
        // Insert new Admin user
        $sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $email, $hashed_password, $role);
        
        if ($stmt->execute()) {
            $message = "<p style='color: green;'>Admin registered successfully! You can now log in.</p>";
        } else {
            $message = "<p style='color: red;'>Registration failed: " . $conn->error . "</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Registration</title>
</head>
<body>
    <h2>Admin Registration (For Initial Setup)</h2>
    <?php echo $message; ?>
    <form method="POST" action="register_admin.php">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Register Admin</button>
    </form>
    <p>Already registered? <a href="login.php">Go to Login</a></p>
</body>
</html>