<!DOCTYPE html>
<html>
<head>
    <title>Expense</title>
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include 'navbar.php'; ?>

    <h2>Expense Tracker</h2>

    <!-- Add New Transaction button -->
    <p><a href="add4.php"><button>Record Expense</button></a></p>

    <!-- Display Existing Expenses -->
    <h3>Existing Expenses:</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Expense</th>
        </tr>
        <!-- Fetch and display records from the database here -->
        <?php
        include 'connection.php'; // Include your database connection

        // Fetch records from the database and display them in the table
        $sql = "SELECT * FROM expense2"; // Replace 'your_table_name' with your table name
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["date"] . "</td><td>" . $row["expense"] . "</td></tr>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>