<?php
// Database configuration
$servername = "localhost";
$username = "roots"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "database1"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sample data for a new membership purchase
$price_professional = 199.99; // Example price for Professional membership
$price_ultimate = 299.99; // Example price for Ultimate membership
$price_standard = 99.99; // Example price for Standard membership

// Sample user name fetched when the user logs in
$user_name = "John Doe"; // Example user name

// Prepare SQL statement to fetch user ID based on user name
$sql_select_user = "SELECT id FROM users WHERE username = ?";
$stmt_select_user = $conn->prepare($sql_select_user);

if ($stmt_select_user === false) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameter for user name
$stmt_select_user->bind_param("s", $user_name);

// Execute the prepared statement to fetch user ID
$stmt_select_user->execute();
$stmt_select_user->bind_result($user_id);

// Fetch the result (user ID)
$stmt_select_user->fetch();

// Close the statement
$stmt_select_user->close();

// Prepare SQL statement for inserting data into membership_purchases table
$sql_insert_purchase = "INSERT INTO membership_purchases (user_id, membership_type, price) VALUES (?, ?, ?)";
$stmt_insert_purchase = $conn->prepare($sql_insert_purchase);

if ($stmt_insert_purchase === false) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameters to the SQL statement for each membership type
$stmt_insert_purchase->bind_param("iss", $user_id, $membership_type, $price);

// Insert data for Professional membership
$membership_type = "Professional";
$price = $price_professional;
$stmt_insert_purchase->execute();

// Insert data for Ultimate membership
$membership_type = "Ultimate";
$price = $price_ultimate;
$stmt_insert_purchase->execute();

// Insert data for Standard membership
$membership_type = "Standard";
$price = $price_standard;
$stmt_insert_purchase->execute();

echo "New membership purchase records created successfully.";

// Close the statement and connection
$stmt_insert_purchase->close();
$conn->close();
?>
