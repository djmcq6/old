<?php
    // Include the database connection file
    include 'connection2.php';

    // Establish the database connection
    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve the 'id_bs' from the query parameters
    $id_bs = $_GET['id_bs'];

    // Build the SQL query to delete the record
    $deleteQuery = "DELETE FROM balancesheet WHERE id_bs = $id_bs";

    // Execute the delete query
    if ($conn->query($deleteQuery) === TRUE) {
        echo "Record deleted successfully. Redirecting...";
        header("Location: form_newport.php"); // Redirect to form_newport.php
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
?>
