<!DOCTYPE html>
<html>
<head>
    <title>Stock Transaction</title>
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include 'navbar.php'; ?>

    <h2>Stock Transaction</h2>
    <p>Record Your Stock Transaction:</p>

    <form method="post" action="add_function.php">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br><br>

        <label for="broker">Broker:</label>
        <select id="broker" name="broker" required>
            <option value="" disabled selected>Select a Broker</option>
            <?php
            include 'connection.php';

            // Fetch the list of existing brokers from the database
            $sql = "SELECT DISTINCT Broker_1 FROM stocktransactionlog";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['Broker_1'] . "'>" . $row['Broker_1'] . "</option>";
                }
            }
            ?>
            <option value="Other">Enter New Broker</option>
        </select><br><br>

         <!-- New broker input field (hidden by default) -->
         <div id="newBrokerField" style="display: none;">
            <label for="new_broker">New Broker:</label>
            <input type="text" id="new_broker" name="new_broker">
        </div>

        <label for="ticker">Ticker:</label>
        <input type="text" id="ticker" name="ticker" required><br><br>

        <label for="actionn">Action:</label>
        <select id="actionn" name="actionn" required>
            <option value="Buy">Buy</option>
            <option value="Sell">Sell</option>
        </select><br><br>

        <label for="shares">Shares:</label>
        <input type="number" id="shares" name="shares" step="any" required><br><br>

        <label for="cost">Cost Basis:</label>
        <input type="number" id="cost" name="cost" step="any" required><br><br>


        <input type="submit" value="Submit">
    </form>

    <!-- JavaScript to show/hide the new broker input field -->
    <script>
        document.getElementById('broker').addEventListener('change', function() {
            var newBrokerField = document.getElementById('newBrokerField');
            var selectedOption = this.options[this.selectedIndex].value;
            if (selectedOption === 'Other') {
                newBrokerField.style.display = 'block';
            } else {
                newBrokerField.style.display = 'none';
            }
        });
    </script>
</body>
</html>
