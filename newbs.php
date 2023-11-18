<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Row to Balance Sheet</title>
    <?php include 'navbar.php';?>
</head>
<body>
    <h1>Add New Row to Balance Sheet</h1>

    <form method="post" action="insertbs.php">
        <?php
            // Include the database connection file
            include 'connection2.php';

            // Establish the database connection
            $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch the column names dynamically from the 'balancesheet' table
            $sql = "SHOW COLUMNS FROM balancesheet";
            $result = $conn->query($sql);

            if ($result) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $columnName = $row['Field'];
                        if ($columnName !== 'id_bs') {
                            echo "<label for='$columnName'>$columnName:</label><br>";
                            echo "<input type='text' id='$columnName' name='$columnName' value=''><br><br>";
                        }
                    }
                } else {
                    echo "No columns found in the table.";
                }
            } else {
                echo "Query failed.";
            }

            // Close the database connection
            $conn->close();
        ?>
        <input type="submit" value="Submit">
    </form>

</body>
</html>
