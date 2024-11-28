<?php
$servername = "localhost"; // Typically 'localhost'
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "login"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO student (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
