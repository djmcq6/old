<?php
include 'connection.php';
// Assuming you have a valid database connection at this point

$sql = "SELECT * FROM stocktransactionlog";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop through the results and fetch data
    while ($row = $result->fetch_assoc()) {
        // Access data using $row["column_name"]
        echo "Date: " . $row["Date_1"] . "<br>";
        echo "Broker: " . $row["Broker_1"] . "<br>";
        echo "Ticker: " . $row["Ticker"] . "<br>";
        echo "Action: " . $row["Action_1"] . "<br>";
        echo "Shares: " . $row["Shares"] . "<br>";
        echo "Cost: " . $row["Cost_Basis"] . "<br>";
        echo "Total: " . $row["Total"] . "<br>";

        // Add more columns as needed
        echo "<br>";
    }
} else {
    echo "No records found.";
}

// Close the database connection
$conn->close();
?>
