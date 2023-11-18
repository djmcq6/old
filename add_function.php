<?php
include 'connection.php';

$date = $_POST["date"];
$broker = $_POST["broker"];
$ticker = strtoupper($_POST["ticker"]);
$actionn = $_POST["actionn"];
$shares = $_POST["shares"];
$cost = $_POST["cost"];
$total = $shares * $cost;

if ($broker === "Other") {
    // If the selected broker is "Other," get the new broker value from the form
    $newBroker = $_POST["new_broker"];

    // Insert the new broker into the database
    $insertBrokerSql = "INSERT INTO brokers (BrokerName) VALUES ('$newBroker')";
    $conn->query($insertBrokerSql);

    // Use the newly inserted broker as the broker value
    $broker = $newBroker;
}

// Now, insert the transaction into the database using the selected or new broker
$sql = "INSERT INTO stocktransactionlog (Date_1, Broker_1, Ticker, Action_1, Shares, Cost_Basis, Total)
        VALUES ('$date', '$broker', '$ticker', '$actionn', '$shares', '$cost', '$total')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: add.php"); // Redirect to the success page
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
