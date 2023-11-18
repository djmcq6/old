<!DOCTYPE html>
<html>
<head>
    <title>Delete Stock Transaction</title>
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include 'navbar.php'; ?>
    
    <h2>Delete Stock Transaction</h2>
    
    <?php
    include 'connection.php';

    // Check if the 'id' parameter is set in the URL
    if (isset($_GET['id'])) {
        $transaction_id = $_GET['id'];

        // Fetch the stock transaction with the given 'Transaction_ID' from the database
        $sql = "SELECT * FROM stocktransactionlog WHERE Transaction_ID = $transaction_id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            
            // Display transaction details and a confirmation form
            echo "<p>Are you sure you want to delete the following transaction?</p>";
            echo "<p>Date: " . $row['Date_1'] . "</p>";
            echo "<p>Broker: " . $row['Broker_1'] . "</p>";
            echo "<p>Ticker: " . $row['Ticker'] . "</p>";
            echo "<p>Action: " . $row['Action_1'] . "</p>";
            echo "<p>Shares: " . $row['Shares'] . "</p>";
            echo "<p>Cost Basis: " . $row['Cost_Basis'] . "</p>";
            echo "<p>Total: " . $row['Total'] . "</p>";
            
            // Create a form to confirm the deletion
            ?>
            <form method="post" action="delete_process.php">
                <input type="hidden" name="id" value="<?php echo $transaction_id; ?>">
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

    <p><a href="index.php">Back to Transactions</a></p>
</body>
</html>
