<?php
    // Check if the 'id_bs' key exists in the $_GET array
    if (isset($_GET['id_bs'])) {
        $id_bs = $_GET['id_bs'];
    } else {
        // Handle the case when 'id_bs' is not set
        // For instance, you can redirect the user or display an error message
        // Redirect example: header("Location: error_page.php");
        // Error message example: echo "ID not found.";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Balance Sheet</title>
    <?php include 'navbar.php';?>
</head>
<body>
    <h1>Edit Balance Sheet</h1>

    <form method="post" action="updatebs.php">

        <input type="hidden" name="id_bs" value="<?php echo $id_bs; ?>">

        <table border="1">
            <tr>
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
                                echo "<th>" . $row['Field'] . "</th>";
                            }
                            echo "<th>Update</th>"; // Adding the 'Update' column header
                        } else {
                            echo "No columns found in the table.";
                        }
                    } else {
                        echo "Query failed.";
                    }

                    // Close the database connection
                    $conn->close();
                ?>
            </tr>
            <?php
                // Establish a new database connection
                $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

                // Check the connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch data of the selected row to be edited
                $sql = "SELECT * FROM balancesheet WHERE id_bs=$id_bs";
                $result = $conn->query($sql);

                if ($result) {
                    if ($result->num_rows > 0) {
                        // Output data as table rows
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            foreach ($row as $key => $value) {
                                echo "<td>";
                                if ($key !== 'id_bs') {
                                    echo "<input type='text' name='$key' value='$value'>";
                                } else {
                                    echo $value;
                                }
                                echo "</td>";
                            }
                            echo "<td><input type='submit' value='Save'></td>"; // Adding the 'Save' button
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='" . (count($row) + 1) . "'>0 results</td></tr>";
                    }
                } else {
                    echo "Query failed.";
                }

                // Close the database connection
                $conn->close();
            ?>
        </table>
    </form>

</body>
</html>
