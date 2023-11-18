<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cashaccID = $_POST['id'];

    // Perform the deletion in the database
    $sql = "DELETE FROM cashaccounts WHERE CashAcc_ID = $cashaccID";
    
    if ($conn->query($sql) === TRUE) {
        echo "Transaction deleted successfully.";
    } else {
        echo "Error deleting transaction: " . $conn->error;
    }

    // Redirect back to the index page after deleting
    header("Location: cashlog.php");
    exit();
}

// Close the database connection
$conn->close();
?>
