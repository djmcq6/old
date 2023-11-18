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

    <form action="add_function3.php" method="post">
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" required><br>

        <label for="grossPay">Gross Pay:</label><br>
        <input type="text" id="grossPay" name="grossPay" required><br>

        <label for="taxes">Taxes:</label><br>
        <input type="text" id="taxes" name="taxes" required><br>

        <label for="insurance">Insurance:</label><br>
        <input type="text" id="insurance" name="insurance" required><br>

        <label for="retirement">Retirement:</label><br>
        <input type="text" id="retirement" name="retirement" required><br>

        <label for="regularHours">Regular Hours:</label><br>
        <input type="text" id="regularHours" name="regularHours" required><br>

        <label for="overtimeHours">Overtime Hours:</label><br>
        <input type="text" id="overtimeHours" name="overtimeHours" required><br>

        <label for="holidayHours">Holiday Hours:</label><br>
        <input type="text" id="holidayHours" name="holidayHours" required><br>

        <label for="sickHours">Sick Hours:</label><br>
        <input type="text" id="sickHours" name="sickHours" required><br>

        <label for="vacationHours">Vacation Hours:</label><br>
        <input type="text" id="vacationHours" name="vacationHours" required><br>

        <input type="submit" value="Submit">
    </form>


    </body>

</html>    