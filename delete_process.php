<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transaction_id = $_POST['id'];

    // Perform the deletion in the database
    $sql = "DELETE FROM stocktransactionlog WHERE Transaction_ID = $transaction_id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Transaction deleted successfully.";
    } else {
        echo "Error deleting transaction: " . $conn->error;
    }

    // Redirect back to the index page after deleting
    header("Location: stocklog.php");
    exit();
}

// Close the database connection
$conn->close();
?>
