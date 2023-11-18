<!-- form_tj.php -->
<!DOCTYPE html>
<html>
<head>
    <title>TJ Form</title>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <form action="add_tj.php" method="post">
        <label for="date_tj">Date:</label><br>
        <input type="date" id="date_tj" name="date_tj"><br><br>

        <label>Debit Credit:</label><br>
        <select name="debit_credit" id="debit_credit">
            <option value="Debit">Debit</option>
            <option value="Credit">Credit</option>
        </select><br><br>


        <label for="amount_tj">Amount:</label><br>
        <input type="number" id="amount_tj" name="amount_tj"><br><br>

        <label for="id_coa">Choose an Account Title:</label><br>
        <select name="id_coa" id="id_coa">
            <?php
            // Include the database connection
            include 'connection.php';

            // Fetch options from the coa table
            $sql = "SELECT * FROM coa";
            $result = $conn->query($sql);

            // Display options in the select dropdown
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id_coa"] . "'>" . $row["account_title"] . "</option>";
                }
            }
            ?>
        </select><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
