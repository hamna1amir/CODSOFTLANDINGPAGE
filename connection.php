<?php
// Database credentials
$servername = "localhost"; // Change this if your database server is on a different host
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password, if any
$database = "fitnesscenter"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
