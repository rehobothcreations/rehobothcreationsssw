<?php
// IMPORTANT: Replace with your actual database credentials
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the email from the form
$email = $_POST['email'];

// Sanitize the email to prevent SQL injection
$email = mysqli_real_escape_string($conn, $email);

// SQL to insert the email into the 'subscribers' table
$sql = "INSERT INTO subscribers (email) VALUES ('$email')";

if ($conn->query($sql) === TRUE) {
  echo "Thank you for subscribing!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>