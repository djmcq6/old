<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balance Sheet Table</title>
    <?php include 'navbar.php';?>
</head>
<body>
    <h1>Balance Sheet Table</h1>

    <a href="newbs.php"><button>Add Account</button></a>

    <table border="1">
    <tr>
        <?php
        // Include the database connection file
        include 'connection2.php';

        // Establish the database connection
        $conn1 = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

        // Check the connection
        if ($conn1->connect_error) {
            die("Connection failed: " . $conn1->connect_error);
        }

        // Fetch the column names dynamically from the 'balancesheet' table
        $sql = "SHOW COLUMNS FROM balancesheet";
        $result = $conn1->query($sql);

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
        $conn1->close();
        ?>
    </tr>
    <?php
    // Establish a new database connection
    $conn2 = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    // Check the connection
    if ($conn2->connect_error) {
        die("Connection failed: " . $conn2->connect_error);
    }

    // Fetch all data from the 'balancesheet' table
    $sql = "SELECT * FROM balancesheet";
    $result = $conn2->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            // Output data as table rows
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . ($value !== null ? $value : '') . "</td>";
                }
                echo "<td>
                          <a href='editbs.php?id_bs=" . $row['id_bs'] . "'>Edit</a> |
                          <a href='deletebs.php?id_bs=" . $row['id_bs'] . "'>Delete</a>
                      </td>"; // Adding the 'Edit' and 'Delete' buttons
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='" . (count($row) + 1) . "'>0 results</td></tr>";
        }
    } else {
        echo "Query failed.";
    }

    // Close the database connection
    $conn2->close();
    ?>
</table>



    <br>

    <h2>Combined Accounts Table</h2>

    <a href="newtier.php"><button>Add Tier</button></a>
    <a href="deltier.php"><button>Remove Tier</button></a>     
    <br></br>   

    <table border="1">
        <tr>
            <th>Code</th>
            <th>Account</th>
            <th>Add Row</th> 
            <th>Sub-Account</th>
        </tr>
        
        <?php
            // Establish a new database connection
            $conn3 = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

            // Check the connection
            if ($conn3->connect_error) {
                die("Connection failed: " . $conn3->connect_error);
            }

            // Fetch all data from the 'balancesheet' table for t columns and their codes
            $sql = "SELECT ";
            $columns = [];
            $result = $conn3->query("SHOW COLUMNS FROM balancesheet WHERE Field LIKE 't%'");
            while ($row = $result->fetch_assoc()) {
                $columns[] = $row['Field'];
            }

            $sql .= implode(', ', $columns);
            $sql .= ", code FROM balancesheet WHERE code IS NOT NULL ORDER BY code";

            $result = $conn3->query($sql);

            if ($result) {
                if ($result->num_rows > 0) {
                    // Output data as table rows
                    while ($row = $result->fetch_assoc()) {
                        foreach ($columns as $column) {
                            if ($row[$column] !== null && $row[$column] !== '') {
                                echo "<tr>";
                                echo "<td>" . $row['code'] . "</td>"; // Swapped 'Account' with 'Code'
                                echo "<td>" . $row[$column] . "</td>"; // Swapped 'Code' with 'Account'
                                echo '<td><a href="javascript:void(0);" onclick="openForm(\'' . $row[$column] . '\', \'' . urlencode($row[$column]) . '\')">Add Row</a></td>';
                                echo "<td><a href='.php'>". $row[$column] . ' Sub-Account' ." </a></td>";
                                echo "</tr>";
                            }
                        }
                    }
                } else {
                    echo "<tr><td colspan='2'>0 results</td></tr>";
                }
            } else {
                echo "Query failed.";
            }
            if (isset($_GET['code'])) {
                $code = $_GET['code'];
                // Find the column name based on the code
                // Perform your logic here to find the column name
                echo "Column name for code $code is <COLUMN_NAME>";
            }
            // Close the database connection
            $conn3->close();
        ?>
    </table>


    <script>
        function openForm(code, columnValue) {
            var formWindow = window.open("form_newrow.php?code=" + code + "&columnValue=" + columnValue, "FormWindow", "width=400,height=400");
        }
    </script>

</body>
</html>
