<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Tracker</title>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h1>Portfolio Tracker</h1>

    <div>
        <!-- Button to add a new portfolio -->
        <a href="form_newport.php"><button>New Portfolio</button></a>
    </div>

    <br></br>

    <div>
        <!-- PHP code to fetch and display data -->
        <?php
            // Include the database connection file
            include 'connection2.php';

            // Establish the database connection
            $connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

            // Check the connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            // Query to select the 'portfolio' column from the 'portfolio' table
            $sql = "SELECT portfolio FROM portfolio";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo $row["portfolio"] . "<br>";
                }
            } else {
                echo "0 results";
            }

            // Close the database connection
            $connection->close();
        ?>
    </div>

    
</body>
</html>
