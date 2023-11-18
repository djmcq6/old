<!DOCTYPE html>
<html>
<head>
    <title>Add Expense</title>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <h2>Add Expense</h2>

    <form action="maketable.php" method="post">
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" required><br><br>
        <label for="expense">Expense:</label><br>
        <input type="text" id="expense" name="expense" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
