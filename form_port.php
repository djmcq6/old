<!DOCTYPE html>
<html>
<head>
    <title>Portfolio Form</title>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <h2>Create a New Portfolio</h2>

    <form action="process_form.php" method="post">
        <label for="portfolio_name">Portfolio Name:</label><br>
        <input type="text" id="portfolio_name" name="portfolio_name"><br><br>

        <!--
        <h3>Select Statement Types</h3>

        <input type="checkbox" id="balance_sheet" name="statement_type[]" value="Balance Sheet">
        <label for="balance_sheet">Balance Sheet</label><br>
        <input type="checkbox" id="income_statement" name="statement_type[]" value="Income Statement">
        <label for="income_statement">Income Statement</label><br><br>

        <h3>Select Additional Options</h3>

        <input type="checkbox" id="asset" name="additional_options[]" value="Asset">
        <label for="asset">Asset</label><br>
        <input type="checkbox" id="liabilities" name="additional_options[]" value="Liabilities & Equity">
        <label for="liabilities">Liabilities & Equity</label><br>
        <input type="checkbox" id="income" name="additional_options[]" value="Income">
        <label for="income">Income</label><br>
        <input type="checkbox" id="expense" name="additional_options[]" value="Expense">
        <label for="expense">Expense</label><br><br>
        <input type="submit" value="Submit">
        -->
    </form>

</body>
</html>
