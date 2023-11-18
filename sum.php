<?php
include 'connection.php';
// Assuming you have a valid database connection at this point

$sql = "SELECT sum(Shares) as shares_total, Ticker FROM stocktransactionlog group by Ticker ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop through the results and fetch data
    while ($row = $result->fetch_assoc()) {
        // Access data using $row["column_name"]
        
        echo "Ticker: " . $row["Ticker"] . "<br>";
        
        echo "Shares: " . $row["shares_total"] . "<br>";
        

        // Add more columns as needed
        echo "<br>";
    }
} else {
    echo "No records found.";
}

// Close the database connection
$conn->close();
?>


