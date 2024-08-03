<?php
// Database configuration
$host = 'localhost';
$db = 'contact_form_db'; // Replace with your database name
$user = 'root'; // Replace with your database username
$pass = ''; // Replace with your database password

// Create a connection
$conn = new mysqli($host, $user, $pass, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Get form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    // Save data to the database or perform other actions
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);

// Execute the query
if ($stmt->execute()) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
