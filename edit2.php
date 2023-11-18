
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
        $cashaccID = $_GET['id'];

        // Fetch the stock transaction with the given 'Transaction_ID' from the database
        $sql = "SELECT * FROM cashaccounts WHERE CashAcc_ID = $cashaccID";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            
            // Display a form pre-populated with the existing data for editing
            ?>
            <form method="POST" action="update2.php">
                <input type="hidden" name="id" value="<?php echo $cashaccID; ?>">
                <label for="date2">Date:</label>
                <input type="date" id="date2" name="date2" value="<?php echo $row['Date_2']; ?>" required><br><br>
                <label for="account">Account:</label>
                <input type="text" id="account" name="account" value="<?php echo $row['Account_2']; ?>" required><br><br>
                <label for="action">Action:</label>
                <select id="action" name="action" required>
                    <option value="Deposit">Deposit</option>
                    <option value="Withdrawal">Withdrawal</option>
                    <option value="Transfer">Transfer</option>
                </select><br><br>
                
                <label for="action">Amount:</label>

                    <?php $amount = 0;
                if ($row['Debit'] != 0) {
                    $amount = $row['Debit'];
                } elseif ($row['Credit'] != 0) {
                    $amount = $row['Credit'];
                }
                echo "<input type= 'text' id='action' name='amount' value='$amount'>";

                ?><br><br>
                
                <label for="shares">Notes:</label>
                <input type="textarea" id="shares" name="notes"  value="<?php echo $row['Notes']; ?>" ><br><br>
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

    <p><a href="cashlog.php">Back to Transactions</a></p>
</body>
</html>
