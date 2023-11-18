<?php
    // Include the database connection file
    include 'connection2.php';

    // Establish the database connection
    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Find the names of the last 2 columns in the 'balancesheet' table
    $sql = "SHOW COLUMNS FROM balancesheet";
    $result = $conn->query($sql);

    if ($result) {
        $columns = array();
        $columnNames = array();
        // Fetch Column Names
        while ($row = $result->fetch_assoc()) {
            $columnNames[] = $row['Field'];
        }

        // Extract Last Columns
        $lastColumn = end($columnNames);
        $secondLastColumn = prev($columnNames);

        // Extract X Values
        $lastX = (int)substr($lastColumn, 1); // Assuming the column name is in the form of tX
        $secondLastX = (int)substr($secondLastColumn, 1); // Assuming the column name is in the form of tX

        // Increment X
        $newX = max($lastX, $secondLastX) + 1;

        // Add new columns to the 'balancesheet' table with default value as empty string
        $newColumn1 = 't' . $newX;
        $newColumn2 = 'code' . $newX;

        $addColumn1Query = "ALTER TABLE balancesheet ADD $newColumn1 VARCHAR(255) DEFAULT ''";
        $addColumn2Query = "ALTER TABLE balancesheet ADD $newColumn2 VARCHAR(255) DEFAULT ''";

        if ($conn->query($addColumn1Query) === TRUE && $conn->query($addColumn2Query) === TRUE) {
            // Update values in the 'codeX' column
            $updateCodeColumnQuery = "UPDATE balancesheet SET code = CONCAT(code, '.0')";
            if ($conn->query($updateCodeColumnQuery) === TRUE) {
                // Update values in the newly added column
                $updateNewColumnQuery = "UPDATE balancesheet SET $newColumn2 = CONCAT($newColumn2, '.0')";
                if ($conn->query($updateNewColumnQuery) === TRUE) {
                    echo "New columns added successfully and values updated. Redirecting...";
                    $conn->close();
                    header("Location: form_newport.php");
                    exit();
                } else {
                    echo "Error updating values in the newly added column: " . $conn->error;
                }
            } else {
                echo "Error updating values in the 'codeX' column: " . $conn->error;
            }
        } else {
            echo "Error adding new columns: " . $conn->error;
        }
    } else {
        echo "Query failed.";
    }

    // Close the database connection
    $conn->close();
?>

