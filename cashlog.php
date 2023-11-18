<!DOCTYPE html>
<html>
<head>
    <title>Cash Transactions</title>
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include 'navbar.php'; ?>

    <h2>Cash Transactions</h2>

    <!-- Add New Transaction button -->
    <p><a href="add2.php"><button>Add New Transaction</button></a></p>
    <p><a href="add8.php"><button>Record Interest Income</button></a></p>
    <p><a href="add9.php"><button>Record Interest Expense</button></a></p>

    <!-- Display existing data in a table -->
    <table border="1">
        <tr>
            <th>Count</th>
            <th>Date</th>
            <th>Account</th>
            <th>Action</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Notes</th>
            <th>Action</th>
        </tr>
        <?php
        include 'connection.php';

        // Fetch data from the database and order by date
        $sql = "SELECT * FROM cashaccounts ORDER BY Date_2";
        $result = $conn->query($sql);

        $count = 1; // Initialize the row count

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $count . "</td>"; // Display the row count
                echo "<td>" . $row['Date_2'] . "</td>";
                echo "<td>" . $row['Account_2'] . "</td>";
                echo "<td>" . $row['Action_2'] . "</td>";
                echo "<td>" . $row['Debit'] . "</td>";
                echo "<td>" . $row['Credit'] . "</td>";
                echo "<td>" . $row['Notes'] . "</td>";
                echo "<td><a href='edit2.php?id=" . $row['CashAcc_ID'] . "'><button>Edit</button></a> | <a href='delete2.php?id=" . $row['CashAcc_ID'] . "'><button>Delete</button></a></td>";
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
