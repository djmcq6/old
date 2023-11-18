<!DOCTYPE html>
<html>
<head>
    <title>Pay Stubs</title>
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include 'navbar.php'; ?>

    <h2>Pay Stubs</h2>

    <!-- Add New Transaction button -->
    <p><a href="add3.php"><button>Record Pay Stub</button></a></p>

    <!-- Display existing data in a table -->
    <table border="1">
        <tr>
            <th>Count</th>
            <th>Date</th>
            <th>Gross Pay</th>
            <th>Taxes</th>
            <th>Insurance</th>
            <th>Retirement</th>
            <th>Net Pay</th>
            <th>Regular Hours</th>
            <th>Overtime Hours</th>
            <th>Holiday Hours</th>
            <th>Sick Hours</th>
            <th>Vacation Hours</th>
            <th>Total Hours Worked</th>
            <th>Tax Rate</th>
            <th>Actions</th>
        </tr>
        <?php
        include 'connection.php';

        // Fetch data from the database
        $sql = "SELECT * FROM paystub ORDER BY Date";
        $result = $conn->query($sql);
        $count = 1; // Initialize the row count

        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $count . "</td>";
                    echo "<td>" . $row['Date'] . "</td>";
                    echo "<td>" . $row['Gross Pay'] . "</td>";
                    echo "<td>" . $row['Taxes'] . "</td>";
                    echo "<td>" . $row['Insurance'] . "</td>";
                    echo "<td>" . $row['Retirement'] . "</td>";
                    echo "<td>" . $row['Net Pay'] . "</td>";
                    echo "<td>" . $row['Regular Hours'] . "</td>";
                    echo "<td>" . $row['Over Time Hours'] . "</td>";
                    echo "<td>" . $row['Holiday Hours'] . "</td>";
                    echo "<td>" . $row['Sick Hours'] . "</td>";
                    echo "<td>" . $row['Vacation Hours'] . "</td>";
                    echo "<td>" . $row['Total Hours Worked'] . "</td>";
                    echo "<td>" . $row['Tax Rate'] . "</td>";
                    echo "<td><a href='edit.php?id=" . $row['Transaction_ID'] . "'><button>Edit</button></a> | <a href='delete.php?id=" . $row['Transaction_ID'] . "'><button>Delete</button></a></td>";
                    echo "</tr>";
                    $count++; // Increment the row count
                }
            } else {
                echo "<tr><td colspan='14'>No transactions found.</td></tr>";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
        ?>
    </table>
</body>
</html>
