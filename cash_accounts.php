<!DOCTYPE html>
<html>
<head>
    <title>Cash Account Balances</title>
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include 'navbar.php'; ?>

    <h2>Cash Account Balances</h2>

    <!-- Display the table of cash account balances -->
    <table border="1">
        <tr>
            <th>Account</th>
            <th>Balance</th>
        </tr>
        <?php
        include 'connection.php';

        // Query to calculate the balance for each account
        $sql = "SELECT Account_2 AS Account, SUM(Debit) - SUM(Credit) AS Balance
                FROM cashaccounts
                GROUP BY Account_2";

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
                    echo "<td>" . $row['Account'] . "</td>";
                    echo "<td>" . $row['Balance'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No cash accounts found.</td></tr>";
            }
        }

        // Close the database connection
        $conn->close();
        ?>
    </table>
</body>
</html>
