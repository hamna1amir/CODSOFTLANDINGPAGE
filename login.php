<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process JSON data when received
$json_data = json_decode(file_get_contents("php://input"), true);

if ($json_data && isset($json_data['username'], $json_data['password'], $json_data['role'])) {
    $username = $json_data['username'];
    $password = $json_data['password'];
    $role = $json_data['role'];

    // Perform any necessary validation here

    // SQL query to insert user data into the database
    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        // Send a success response
        // echo "Success";
        $response = array("success" => true, "redirect_url" => "membership.html", "message"=>"Login Successful");
        echo json_encode($response);
        // header("Location: membership.html");

    } else {
        echo "Error: " . $conn->error;
    }
} else {
    // Invalid or missing data, send an error response
    echo "Error: Invalid data received.";
}

$conn->close();
?>
