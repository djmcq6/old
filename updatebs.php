<?php
    // Include the database connection file
    include 'connection2.php';

    // Establish the database connection
    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve the 'id_bs' from the form
    $id_bs = $_POST['id_bs'];

    // Build the SQL query to update the record
    $updateQuery = "UPDATE balancesheet SET ";
    foreach ($_POST as $key => $value) {
        if ($key !== 'id_bs') {
            $updateQuery .= "$key = '$value', ";
        }
    }
    $updateQuery = rtrim($updateQuery, ', ');
    $updateQuery .= " WHERE id_bs = $id_bs";

    // Execute the update query
    if ($conn->query($updateQuery) === TRUE) {
        echo "Record updated successfully. Redirecting...";
        header("Location: form_newport.php"); // Redirect to form_newport.php
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
?>
