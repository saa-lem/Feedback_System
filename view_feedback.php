<?php
// Establish database connection
$conn = new mysqli('localhost', 'root', '', 'feedback_system');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve feedback data
$sql = "SELECT * FROM feedback ORDER BY submission_date DESC";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback List</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #4CAF50; color: white; }
    </style>
</head>
<body>
    <h2>Feedback Received</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Feedback</th>
            <th>Rating</th>
            <th>Submission Date</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['feedback']; ?></td>
            <td><?php echo $row['rating']; ?></td>
            <td><?php echo $row['submission_date']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
<?php
// Close connection
$conn->close();
?>
