<!DOCTYPE html>
<html>
<head>
    <title>Historical Stock Positions</title>
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include 'navbar.php'; ?>

    <h2>Historical Stock Positions</h2>

    <!-- Display the table of past positions -->
    <table border="1">
        <tr>
            <th>Ticker</th>
            <th>Date Sold</th>
        </tr>
        <?php
        include 'connection.php';

        // Query to fetch past positions with TotalShares = 0 and sort by the last date
        $sql = "SELECT Ticker, TotalShares, MAX(Date_1) AS LastDate
                FROM (
                    SELECT Ticker, 
                        SUM(CASE WHEN Action_1 = 'Buy' THEN Shares ELSE 0 END) - SUM(CASE WHEN Action_1 = 'Sell' THEN Shares ELSE 0 END) AS TotalShares,
                        MAX(Date_1) AS Date_1
                    FROM stocktransactionlog
                    GROUP BY Ticker
                ) AS Subquery
                WHERE TotalShares = 0
                GROUP BY Ticker
                ORDER BY LastDate DESC";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Ticker'] . "</td>";
                echo "<td>" . $row['LastDate'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No past positions found.</td></tr>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </table>
</body>
</html>
