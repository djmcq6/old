<!DOCTYPE html>
<html>
<head>
    <title>Stock Transactions</title>
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include 'navbar.php'; ?>

    <h2>Stock Transactions</h2>

    <!-- Add New Transaction button -->
    <p><a href="add.php"><button>Add New Transaction</button></a></p>

    <!-- Display existing data in a table -->
    <table border="1">
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Broker</th>
            <th>Ticker</th>
            <th>Action</th>
            <th>Shares</th>
            <th>Cost Basis</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <?php
        include 'connection.php';

        if (isset($_GET['Ticker'])) {
            $ticker = $_GET['Ticker'];
        
            // Fetch data from the database and order by date
            $sql = "SELECT * FROM stocktransactionlog WHERE Ticker = '$ticker' ORDER BY Date_1";
            $result = $conn->query($sql);
            $count = 1; // Initialize the row count
        
            // rest of the code
        } else {
            echo "Ticker not set.";
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $count . "</td>";
                echo "<td>" . $row['Date_1'] . "</td>";
                echo "<td>" . $row['Broker_1'] . "</td>";
                echo "<td>" . $row['Ticker'] . "</td>";
                echo "<td>" . $row['Action_1'] . "</td>";

                // Format the numeric values with 2 decimal places
                $shares = number_format($row['Shares'], 2);
                $cost = number_format($row['Cost_Basis'], 2);
                $total = number_format($row['Total'], 2);

                echo "<td>" . $shares . "</td>";
                echo "<td>" . $cost . "</td>";
                echo "<td>" . $total . "</td>";
                
                echo "<td><a href='edit.php?id=" . $row['Transaction_ID'] . "'><button>Edit</button></a> | <a href='delete.php?id=" . $row['Transaction_ID'] . "'><button>Delete</button></a></td>";
                echo "</tr>";
                $count++; // Increment the row count
            }
        } else {
            echo "<tr><td colspan='8'>No transactions found.</td></tr>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </table>
</body>
</html>

