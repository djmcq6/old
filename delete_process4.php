<?php
include 'connection.php'; // Include your database connection

$id = $_GET['id'];

// SQL query to delete record
$sql = "DELETE FROM your_table_name WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
header("Location: expense.php");
exit;
?>
