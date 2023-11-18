<?php
// Include the database connection
include 'connection.php';

// Check if the form is submitted
    // Collect form data
    $namesub = $_POST['name_sub'];

    $sql = "INSERT INTO sub_account (name_sub) VALUES ('$namesub')";

    if (mysqli_query($conn, $sql)) {
        // Redirect back to index.php
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

// Close the connection
mysqli_close($conn);
?>
