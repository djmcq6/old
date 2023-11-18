<!DOCTYPE html>
<html>
<head>
    <title>Edit Stock Transaction</title>
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include 'navbar.php'; ?>

    <h2>Edit Stock Transaction</h2>
    
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
            
            // Display a form pre-populated with the existing data for editing
            ?>
            <form method="post" action="update.php">
                <input type="hidden" name="id" value="<?php echo $transaction_id; ?>">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" value="<?php echo $row['Date_1']; ?>" required><br><br>
                <label for="broker">Broker:</label>
                <input type="text" id="broker" name="broker" value="<?php echo $row['Broker_1']; ?>" required><br><br>
                <label for="ticker">Ticker:</label>
                <input type="text" id="ticker" name="ticker" value="<?php echo $row['Ticker']; ?>" required><br><br>
                <label for="action">Action:</label>
                <input type="text" id="action" name="action" value="<?php echo $row['Action_1']; ?>" required><br><br>
                <label for="shares">Shares:</label>
                <input type="number" id="shares" name="shares" step="any" value="<?php echo $row['Shares']; ?>" required><br><br>
                <label for="cost">Cost Basis:</label>
                <input type="number" id="cost" name="cost" step="any" value="<?php echo $row['Cost_Basis']; ?>" required><br><br>
                <input type="submit" value="Update">
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
