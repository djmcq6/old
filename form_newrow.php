<?php
    // Include the database connection file
    include 'connection2.php';

    // Establish a new database connection
    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the 'code' value is set
    if (isset($_GET['code']) && isset($_GET['columnValue'])) {
        // Retrieve the 'code' and 'columnValue' from the query parameters
        $code = $_GET['code'];
        $columnValue = $_GET['columnValue'];

        // Fetch the column names dynamically from the 'balancesheet' table
        $sql = "SHOW COLUMNS FROM balancesheet";
        $result = $conn->query($sql);

        if ($result) {
            $columnNames = [];
            while ($row = $result->fetch_assoc()) {
                $columnNames[] = $row['Field'];
            }

            // Look for the specific value in the columns
            $matchingColumns = [];
            foreach ($columnNames as $columnName) {
                $sql = "SELECT * FROM balancesheet WHERE $columnName = '$columnValue'";
                $result = $conn->query($sql);

                if ($result) {
                    if ($result->num_rows > 0) {
                        // Output the column name where the value is found
                        $matchingColumns[] = $columnName;
                    }
                } else {
                    echo "Query failed: " . $conn->error;
                }
            }

            if (count($matchingColumns) > 0) {
                // Display the first table
                echo "<table border='1'>";
                // Display column names
                echo "<tr>";
                foreach ($columnNames as $columnName) {
                    echo "<th>$columnName</th>";
                }
                echo "</tr>";

                // Display rows with values matching the provided column value
                $sql = "SELECT * FROM balancesheet WHERE " . implode(" = '$columnValue' OR ", $matchingColumns) . " = '$columnValue'";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    foreach ($row as $key => $value) {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";

                // Display the message
                echo "The value $columnValue is found in the column " . implode(", ", $matchingColumns) . ".";
                echo "<br>";

                // Display the form
                echo "<form method='post' action='newrow.php'>";
                echo "<table border='1'>";
                // Display column names for the form
                echo "<tr>";
                foreach ($columnNames as $columnName) {
                    if ($columnName !== 'id_bs') {
                        echo "<th>$columnName</th>";
                    }
                }
                echo "</tr>";

                // Display rows with values matching the provided column value in the form
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    foreach ($row as $key => $value) {
                        if ($key !== 'id_bs') {
                            echo "<td><input type='text' name='$key' value='" . ($value !== null ? $value : '') . "'></td>";
                        }
                    }
                    echo "</tr>";
                }
                echo "</table>";
                echo "<input type='submit' value='Submit'>";
                echo "</form>";
            } else {
                echo "No results found for the provided column value.";
            }
        } else {
            echo "Query failed: " . $conn->error;
        }
    } else {
        echo "No code or column value found.";
    }

    // Close the database connection
    $conn->close();
?>
