<?php
include 'connection.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $date = $_POST['date'];
    $expense = $_POST['expense'];

    // SQL query to update record
    $sql = "UPDATE your_table_name SET date='$date', expense='$expense' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
header("Location: expense.php");
exit;
?>
