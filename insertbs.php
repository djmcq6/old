<?php
    // Include the database connection file
    include 'connection2.php';

    // Establish the database connection
    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Build the SQL query to insert a new record
    $columnNames = array();
    $columnValues = array();
    foreach ($_POST as $key => $value) {
        if ($key !== 'id_bs') {
            $columnNames[] = $key;
            $columnValues[] = "'$value'";
        }
    }

    $insertQuery = "INSERT INTO balancesheet (";
    $insertQuery .= implode(", ", $columnNames);
    $insertQuery .= ") VALUES (";
    $insertQuery .= implode(", ", $columnValues);
    $insertQuery .= ")";

    // Execute the insert query
    if ($conn->query($insertQuery) === TRUE) {
        echo "New record added successfully. Redirecting...";
        header("Location: form_newport.php");
    } else {
        echo "Error adding record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
?>
