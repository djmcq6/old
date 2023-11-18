<?php
include 'connection.php'; // Include your database connection

// Create table query
$sql = "CREATE TABLE IF NOT EXISTS expense2 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    expense VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully or already exists";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Make Table</title>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <h2>Expense Table Created</h2>

    <p><a href="expense2.php"><button>Back to Expense Tracker</button></a></p>
</body>
</html>
