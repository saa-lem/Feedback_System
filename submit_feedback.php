<?php
// Capture form data
$name = $_POST['name'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];
$rating = $_POST['rating'];

// Establish database connection
$conn = new mysqli('localhost', 'root', '', 'feedback_system');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert feedback into the database
$sql = "INSERT INTO feedback (name, email, feedback, rating) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $name, $email, $feedback, $rating);

if ($stmt->execute()) {
    echo "Thank you for your feedback!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
