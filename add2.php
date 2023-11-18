<!DOCTYPE html>
<html>
<head>
    <title>Cash Transaction</title>
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include 'navbar.php'; ?>

    <h2>Cash Transaction</h2>
    <p>Record Your Cash Transaction:</p>

    <form method="post" action="add_function2.php">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br><br>

        <label for="account">Account:</label>
        <select id="account" name="account" required>
            <option value="" disabled selected>Select an Account</option>
            <?php
            include 'connection.php';

            // Fetch the list of existing accounts from the database
            $sql = "SELECT DISTINCT Account_2 FROM cashaccounts";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['Account_2'] . "'>" . $row['Account_2'] . "</option>";
                }
            }
            ?>
            <option value="Other">Enter New Account</option>
        </select><br><br>

        <!-- New account input field for Account (hidden by default) -->
        <div id="newAccountField" style="display: none;">
            <label for="new_account">New Account:</label>
            <input type="text" id="new_account" name="new_account">
        </div>

        <label for="action">Action:</label>
        <select id="action" name="action" required>
            <option value="Deposit">Deposit</option>
            <option value="Withdrawal">Withdrawal</option>
            <option value="Transfer">Transfer</option>
        </select><br><br>

        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" step="any" required><br><br>

        <!-- To Account field (visible only for Transfer) -->
        <div id="toAccountField" style="display: none;">
            <label for="to_account">To Account:</label>
            <select id="to_account" name="to_account" required>
                <?php
                // Fetch the list of existing accounts from the database (for To Account)
                $sql = "SELECT DISTINCT Account_2 FROM cashaccounts";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['Account_2'] . "'>" . $row['Account_2'] . "</option>";
                    }
                }
                ?>
                <option value="Other">Enter New Account</option>
            </select><br><br>

            <!-- New account input field for To Account (hidden by default) -->
            <div id="newToAccountField" style="display: none;">
                <label for="new_to_account">New To Account:</label>
                <input type="text" id="new_to_account" name="new_to_account">
            </div>

        </div>

        <label for="notes">Notes:</label>
        <input type="text" id="notes" name="notes"><br><br>

        <input type="submit" value="Submit">
    </form>

    <!-- JavaScript to show/hide the new account and to account input fields -->
    <script>
        var actionSelect = document.getElementById('action');
        var accountSelect = document.getElementById('account');
        var newAccountField = document.getElementById('newAccountField');
        var toAccountField = document.getElementById('toAccountField'); // Corrected ID here
        var toAccountSelect = document.getElementById('to_account');
        var newToAccountField = document.getElementById('newToAccountField'); // New field for To Account

        actionSelect.addEventListener('change', function() {
            var selectedAction = this.value;

            // Show/hide the "To Account" field based on the selected action
            if (selectedAction === 'Transfer') {
                toAccountField.style.display = 'block';
                toAccountSelect.required = true;
            } else {
                toAccountField.style.display = 'none';
                toAccountSelect.required = false;
            }

            // Show/hide the "New Account" field based on the selected action
            if (selectedAction === 'Other') {
                newAccountField.style.display = 'block';
            } else {
                newAccountField.style.display = 'none';
            }
        });

        // Similar logic for the To Account field
        toAccountSelect.addEventListener('change', function() {
            var selectedToAccount = this.value;

            if (selectedToAccount === 'Other') {
                newToAccountField.style.display = 'block';
            } else {
                newToAccountField.style.display = 'none';
            }
        });

        accountSelect.addEventListener('change', function() {
            var selectedAccount = this.value;

            // Show/hide the "New Account" field based on the selected account
            if (selectedAccount === 'Other') {
                newAccountField.style.display = 'block';
            } else {
                newAccountField.style.display = 'none';
            }
        });
    </script>

</body>
</html>
