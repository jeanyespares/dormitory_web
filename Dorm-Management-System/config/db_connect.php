<?php
$servername = "localhost";
$username = "jeany"; // Default WAMP user
$password = "jeany";     // Default WAMP password
$dbname = "dorm_dbs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully"; // Tanggalin ito kapag okay na
?>