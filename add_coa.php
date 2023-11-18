<?php
// Include the database connection
include 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $accountTitle = $_POST['account_title'];
    $subAccount = $_POST['sub_account'];
    $option = $_POST['option'];

    // Define variables based on the selected option
    $type = ($option === 'category') ? 'category' : 'end account';

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO coa (account_title, sub_account, type) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $accountTitle, $subAccount, $type);

    // Execute the prepared statement
    if ($stmt->execute() === TRUE) {
        // Close the statement
        $stmt->close();
        // Close the connection
        $conn->close();
        // Redirect back to index.php
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
