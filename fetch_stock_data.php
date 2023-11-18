<!DOCTYPE html>
<html>
<head>
    <title>Stock Search Results</title>
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include 'navbar.php'; ?>
    
    <h1>Stock Search Results</h1>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the user's input (stock ticker)
        $ticker = $_POST["ticker"];

        // Run the Python script to fetch stock data
        $output = shell_exec("python3 fetch_stock_data.py $ticker");

        // Display the results
        echo "<pre>$output</pre>";
    }
    ?>
    
    <a href="stocksearch.php">Back to Search</a>
</body>
</html>
