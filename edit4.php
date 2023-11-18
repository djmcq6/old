<!DOCTYPE html>
<html>
<head>
    <title>Edit Expense Record</title>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <h2>Edit Expense Record</h2>

    <!-- Form for editing the expense record -->
    <form action="update4.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" value="<?php echo $date; ?>" required><br><br>
        <label for="expense">Expense:</label><br>
        <input type="text" id="expense" name="expense" value="<?php echo $expense; ?>" required><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
