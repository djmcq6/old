<!DOCTYPE html>
<html>
<head>
    <title>Current Stock Positions</title>
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include 'navbar.php'; ?>

    <h2>Current Stock Positions</h2>

    <!-- Display the table of current positions -->
    <table border="1">
        <tr>
            <th>Ticker</th>
            <th>Total Shares</th>
        </tr>
        <?php
        include 'connection.php';

        // Query to calculate total shares for each ticker
        $sql = "SELECT Ticker, TotalShares
        FROM (
            SELECT Ticker, 
                SUM(CASE WHEN Action_1 = 'Buy' THEN Shares ELSE 0 END) - SUM(CASE WHEN Action_1 = 'Sell' THEN Shares ELSE 0 END) AS TotalShares
                FROM stocktransactionlog
                GROUP BY Ticker
        ) AS Subquery
        WHERE TotalShares > 0
        ORDER BY TotalShares DESC";



        // Execute the query
        $result = $conn->query($sql);

        // Check if the query executed successfully
        if (!$result) {
            echo "Error: " . $conn->error;
        } else {
            // Check if there are rows in the result set
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><a href='stockinfo.php?Ticker=" . $row['Ticker'] . "'> X </a>" . $row['Ticker'] . "</td>";
                    echo "<td>" . $row['TotalShares'] . "</td>";
                    echo "</tr>";
                }
                
            } else {
                echo "<tr><td colspan='2'>No positions found.</td></tr>";
            }
        }

        // Close the database connection
        $conn->close();
        ?>
    </table>
</body>
</html>
