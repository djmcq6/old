<?php
include 'connection.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $expense = $_POST['expense'];

    // Insert data into the table
    $sql = "INSERT INTO expense2 (date, expense) VALUES ('$date', '$expense')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
header("Location: expense2.php");
exit;
?>
