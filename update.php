<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transaction_id = $_POST['id'];
    $date = $_POST['date'];
    $broker = $_POST['broker'];
    $ticker = strtoupper($_POST["ticker"]);
    $action = $_POST['action'];
    $shares = $_POST['shares'];
    $cost = $_POST['cost'];

    // Calculate the new Total value
    $total = $shares * $cost;

    // Perform the update in the database, including the Total value
    $sql = "UPDATE stocktransactionlog SET Date_1 = '$date', Broker_1 = '$broker', Ticker = '$ticker', Action_1 = '$action', Shares = $shares, Cost_Basis = $cost, Total = $total WHERE Transaction_ID = $transaction_id";

    if ($conn->query($sql) === TRUE) {
        echo "Transaction updated successfully.";
    } else {
        echo "Error updating transaction: " . $conn->error;
    }

    // Redirect back to the index page after updating
    header("Location: stocklog.php");
    exit();
}

// Close the database connection
$conn->close();
?>
