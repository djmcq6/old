<!DOCTYPE html>
<html>
<head>
    <title>Stock Search</title>
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include 'navbar.php'; ?>
    
    <h1>Stock Search</h1>
    <form action="fetch_stock_data.php" method="post">
        <label for="ticker">Enter Stock Ticker:</label>
        <input type="text" id="ticker" name="ticker" required>
        <input type="submit" value="Search">
    </form>
</body>
</html>
