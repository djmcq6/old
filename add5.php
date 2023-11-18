<!DOCTYPE html>
<html>
<head>
    <title>Pay Stubs</title>
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include 'navbar.php'; ?>

    <h2>Pay Stubs</h2>
    <p>Record Your Pay Stubs:</p>

    <form action="add_function4.php" method="post">
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" required><br><br>
        <label for="expense">Expense:</label><br>
        <input type="text" id="expense" name="expense" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>