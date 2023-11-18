<!DOCTYPE html>
<html>
<head>
    <title>Delete Cash Transaction</title>
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include 'navbar.php'; ?>
    
    <h2>Delete Cash Transaction</h2>
    
    <?php
    include 'connection.php';

    // Check if the 'id' parameter is set in the URL
    if (isset($_GET['id'])) {
        $cashaccID = $_GET['id'];

        // Fetch the stock transaction with the given 'Transaction_ID' from the database
        $sql = "SELECT * FROM cashaccounts WHERE CashAcc_ID = $cashaccID";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            
            // Display transaction details and a confirmation form
            echo "<p>Are you sure you want to delete the following transaction?</p>";
            echo "<p>Date: " . $row['Date_2'] . "</p>";
            echo "<p>Account: " . $row['Account_2'] . "</p>";
            echo "<p>Action: " . $row['Action_2'] . "</p>";
             $amount = 0;
                if ($row['Debit'] != 0) {
                    $amount = $row['Debit'];
                } elseif ($row['Credit'] != 0) {
                    $amount = $row['Credit'];
                }
                echo $amount;
            echo "<p>Notes: " . $row['Notes'] . "</p>";
            
            // Create a form to confirm the deletion
            ?>
            <form method="post" action="delete_process2.php">
                <input type="hidden" name="id" value="<?php echo $cashaccID; ?>">
                <input type="submit" value="Delete">
            </form>
            <?php
        } else {
            echo "Transaction not found.";
        }
    } else {
        echo "Transaction ID not provided.";
    }

    // Close the database connection
    $conn->close();
    ?>

    <p><a href="cashlog.php">Back to Transactions</a></p>
</body>
</html>
