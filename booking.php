<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["booknow"])) 
{
    // Get the booking data from the request
    $booking_id = $_POST["booking_id"];
    $trainer_id = $_POST["trainer_id"];
    $user_id = $_POST["user_id"];
    $booking_date = $_POST["booking_date"];
    $booking_time = $_POST["booking_time"];


     $servername = "localhost";
     $username = "root";
  $password = "";
     $dbname = "database1";

   
     $conn = new mysqli($servername, $username, $password, $dbname);


     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
    }

    // Insert the booking data into the database
    $sql = "INSERT INTO bookings (booking_id, trainer_id, user_id, booking_date, booking_time) 
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
     $stmt->bind_param("iiiss", $booking_id, $trainer_id, $user_id, $booking_date, $booking_time);

     if ($stmt->execute()) {
        echo "Booking successful!";
     } else {
        echo "Error: " . $stmt->error;
     }


    // For testing purposes, you can output the booking data
    echo "Booking ID: " . $booking_id . "<br>";
    echo "Trainer ID: " . $trainer_id . "<br>";
    echo "User ID: " . $user_id . "<br>";
    echo "Booking Date: " . $booking_date . "<br>";
    echo "Booking Time: " . $booking_time . "<br>";
    exit; // Stop further execution
}

// If the form is not submitted or the request is not POST, return an error message
echo "Error: Invalid request.";
?>

