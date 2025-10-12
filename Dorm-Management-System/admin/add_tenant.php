<?php
// admin/add_tenant.php
session_start();
// Security Check: Only allow 'admin' role
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

require_once('../config/db_connect.php');

$message = "";
$rooms = [];
// Fetch available rooms
$room_result = $conn->query("SELECT id, room_number, monthly_rent FROM rooms WHERE status = 'Available'");
if ($room_result) {
    while ($row = $room_result->fetch_assoc()) {
        $rooms[] = $row;
    }
} else {
    $message = "<p style='color: red;'>Error fetching rooms: " . $conn->error . "</p>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Data Collection
    $firstName = $conn->real_escape_string($_POST['first_name']);
    $lastName = $conn->real_escape_string($_POST['last_name']);
    $contact = $conn->real_escape_string($_POST['contact_number']);
    $roomId = (int)$_POST['room_id'];
    $checkInDate = date('Y-m-d'); // Today's date
    
    // Login Credentials
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Get rent details from selected room
    $rent_query = $conn->prepare("SELECT monthly_rent FROM rooms WHERE id = ?");
    $rent_query->bind_param("i", $roomId);
    $rent_query->execute();
    $rent_result = $rent_query->get_result()->fetch_assoc();
    $monthlyRent = $rent_result['monthly_rent'];

    // --- START OF EVENT-DRIVEN TRANSACTION ---
    $conn->begin_transaction();
    try {
        // EVENT 1: Insert Tenant Record (Core Action)
        $sqlTenant = "INSERT INTO tenants (first_name, last_name, contact_number, room_id, check_in_date) VALUES (?, ?, ?, ?, ?)";
        $stmtTenant = $conn->prepare($sqlTenant);
        $stmtTenant->bind_param("sssis", $firstName, $lastName, $contact, $roomId, $checkInDate);
        $stmtTenant->execute();
        $tenantId = $conn->insert_id; // Get the ID of the new tenant

        // EVENT 2: Create User Login Account (Trigger)
        $sqlUser = "INSERT INTO users (name, email, password, role, tenant_id) VALUES (?, ?, ?, 'tenant', ?)";
        $stmtUser = $conn->prepare($sqlUser);
        $fullName = $firstName . ' ' . $lastName;
        $stmtUser->bind_param("sssi", $fullName, $email, $hashedPassword, $tenantId);
        $stmtUser->execute();

        // EVENT 3: Update Room Status (Trigger)
        $sqlRoom = "UPDATE rooms SET status = 'Occupied' WHERE id = ?";
        $stmtRoom = $conn->prepare($sqlRoom);
        $stmtRoom->bind_param("i", $roomId);
        $stmtRoom->execute();
        
        // EVENT 4: Generate Initial Rent Record (Trigger)
        // Rent due date is set for 5 days from today (adjust as needed)
        $dueDate = date('Y-m-d', strtotime('+5 days')); 
        $sqlRent = "INSERT INTO payments (tenant_id, amount, due_date, status) VALUES (?, ?, ?, 'Unpaid')";
        $stmtRent = $conn->prepare($sqlRent);
        $stmtRent->bind_param("ids", $tenantId, $monthlyRent, $dueDate);
        $stmtRent->execute();

        // Commit all changes if no errors occurred
        $conn->commit();
        $message = "<p style='color: green;'>Tenant **{$fullName}** added successfully! Room status updated, and initial rent record generated.</p>";
        
        // *Optional Event:* Send Welcome Notification here (Email/SMS logic)

    } catch (Exception $e) {
        // Rollback on error
        $conn->rollback();
        $message = "<p style='color: red;'>Transaction failed: " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Tenant - Admin</title>
</head>
<body>
    <h2>Add New Tenant</h2>
    <p><a href="dashboard.php">Back to Dashboard</a></p>
    <?php echo $message; ?>

    <form method="POST" action="add_tenant.php">
        <h3>Tenant Information</h3>
        <label>First Name:</label><br>
        <input type="text" name="first_name" required><br><br>
        
        <label>Last Name:</label><br>
        <input type="text" name="last_name" required><br><br>
        
        <label>Contact Number:</label><br>
        <input type="text" name="contact_number" required><br><br>
        
        <label>Assign Room:</label><br>
        <select name="room_id" required>
            <option value="">Select Available Room</option>
            <?php foreach ($rooms as $room): ?>
                <option value="<?php echo $room['id']; ?>">
                    <?php echo $room['room_number']; ?> (Rent: <?php echo number_format($room['monthly_rent'], 2); ?>)
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <h3>Login Credentials (for Tenant Portal)</h3>
        <label>Tenant Email:</label><br>
        <input type="email" name="email" required><br><br>
        
        <label>Initial Password:</label><br>
        <input type="password" name="password" required><br><br>
        
        <button type="submit">Register Tenant & Trigger Events</button>
    </form>
</body>
</html>
