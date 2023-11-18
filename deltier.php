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
        $columnNames = array();
        // Fetch Column Names
        while ($row = $result->fetch_assoc()) {
            $columnNames[] = $row['Field'];
        }

        // Find the last 'codeX' column and get its corresponding integer value
        $lastCodeXValue = 0;
        foreach ($columnNames as $columnName) {
            if (preg_match('/^code(\d+)$/', $columnName, $matches)) {
                $currentCodeXValue = intval($matches[1]);
                if ($currentCodeXValue > $lastCodeXValue) {
                    $lastCodeXValue = $currentCodeXValue;
                }
            }
        }

        // Concatenate the 'codeX' columns and update the 'code' column
        if ($lastCodeXValue > 0) {
            $codesToConcatenate = [];
            for ($i = 1; $i <= $lastCodeXValue; $i++) {
                $codeColumnValue = ($i === 1) ? "code$i" : "CONCAT(code$i, '.0')";
                $codesToConcatenate[] = "IFNULL($codeColumnValue, '')";
            }

            if (!empty($codesToConcatenate)) {
                $concatenatedCodesString = implode(" || ', ' || ", $codesToConcatenate);
                $updateCodeColumnQuery = "UPDATE balancesheet SET code = CONCAT($concatenatedCodesString)";

                if ($conn->query($updateCodeColumnQuery) === TRUE) {
                    echo "Code columns concatenated successfully.";

                    // Delete the last two columns from the 'balancesheet' table
                    $lastColumn = 't' . $lastCodeXValue;
                    $secondLastColumn = 'code' . $lastCodeXValue;
                    $deleteLastColumnQuery = "ALTER TABLE balancesheet DROP $lastColumn";
                    $deleteSecondLastColumnQuery = "ALTER TABLE balancesheet DROP $secondLastColumn";

                    if ($conn->query($deleteLastColumnQuery) === TRUE && $conn->query($deleteSecondLastColumnQuery) === TRUE) {
                        echo "Last two columns deleted successfully. Redirecting...";
                        $conn->close();
                        exit();
                    } else {
                        echo "Error deleting last two columns: " . $conn->error;
                    }
                } else {
                    echo "Error concatenating code columns: " . $conn->error;
                }
            } else {
                echo "No 'codeX' columns found.";
            }
        } else {
            echo "No 'codeX' columns found.";
        }
    } else {
        echo "Query failed.";
        header("Location: form_newport.php");
    }

    // Close the database connection
    $conn->close();
?>
