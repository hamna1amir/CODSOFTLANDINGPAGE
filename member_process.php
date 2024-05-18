<?php
// Database credentials
$servername = "localhost"; // Replace with your server name or IP address
$username = "root"; // Your SQL Server username
$password = ""; // Your SQL Server password
$dbname = "database1"; // Replace with your database name

// Create a PDO connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit(); // Stop script execution if connection fails
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $dob = $_POST["dob"];
    $registrationDate = $_POST["registration-date"]; // Add registration date retrieval
    $gender = $_POST["gender"];

    // Prepare and execute the SQL statement to insert data into a table
    $stmt = $conn->prepare("INSERT INTO membership (firstName, lastName, email, phone, address, dob, registration_date, gender) VALUES (:firstName, :lastName, :email, :phone, :address, :dob, :registration_date, :gender)");
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':dob', $dob);
    $stmt->bindParam(':registration_date', $registrationDate); // Bind registration date
    $stmt->bindParam(':gender', $gender);
    // Execute the statement
    try {
        $stmt->execute();
        echo "Membership registration successful!";
        echo "<script>localStorage.setItem('firstName', '" . $firstName . "');</script>";
        echo "<script>localStorage.setItem('lastName', '" . $lastName . "');</script>";
        echo "<script>window.location.href = 'index.html';</script>"; // Redirect to index.html after success
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: index.html");
    exit(); // Ensure no further code execution after redirection
}

// Close the database connection
$conn = null;
?>
