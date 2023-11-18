<?php
// Include the database connection
include 'connection.php';

// Fetch data from the 'coa' table where the 'sub_account' is 'assets'
$sqlAssets = "SELECT account_title FROM coa WHERE sub_account = 'assets'";
$resultAssets = $conn->query($sqlAssets);

// Fetch data from the 'coa' table where the 'sub_account' is 'liabilities' or 'equity'
$sqlLiabilitiesEquity = "SELECT account_title, sub_account FROM coa WHERE sub_account = 'liabilities' OR sub_account = 'equity'";
$resultLiabilitiesEquity = $conn->query($sqlLiabilitiesEquity);

// Initialize variables for tracking sections
$liabilitiesDisplayed = false;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Assets, Liabilities, and Equity Tables</title>
</head>
<body>

<h2>Assets Table</h2>

<table border="1">
    <tr>
        <th>Accounts</th>
    </tr>

    <?php
    // Display data in an HTML table
    if ($resultAssets->num_rows > 0) {
        while ($row = $resultAssets->fetch_assoc()) {
            echo "<tr><td>" . $row["account_title"] . "</td></tr>";
        }
    } else {
        echo "<tr><td>No accounts found for assets</td></tr>";
    }
    ?>
</table>

<h2>Liabilities and Equity Table</h2>

<table border="1">
    <tr>
        <th>Accounts</th>
    </tr>

    <?php
    // Display data in an HTML table
    if ($resultLiabilitiesEquity->num_rows > 0) {
        while ($row = $resultLiabilitiesEquity->fetch_assoc()) {
            if ($row["sub_account"] === 'liabilities') {
                if (!$liabilitiesDisplayed) {
                    echo "<tr><th>Liabilities</th></tr>";
                    $liabilitiesDisplayed = true;
                }
            } else {
                if ($liabilitiesDisplayed) {
                    echo "<tr><th>Equity</th></tr>";
                    $liabilitiesDisplayed = false;
                }
            }
            echo "<tr><td>" . $row["account_title"] . "</td></tr>";
        }
    } else {
        echo "<tr><td>No accounts found for liabilities and equity</td></tr>";
    }
    
    

    ?>
</table>

</body>
</html>

<?php
// Assuming you have already established a connection to your database

// Query to show account_title
$query1 = "SELECT * FROM coa group by sub_account";
$result1 = mysqli_query($conn, $query1);

// Displaying the result of query 1
while ($row = mysqli_fetch_assoc($result1)) {
    echo $row['sub_account'] . "<br>";

    $subA = $row['account_title'] ;
}

// Query to show account_title and sub_account
$query2 = "SELECT account_title, sub_account FROM coa";
$result2 = mysqli_query($conn, $query2);

// Displaying the result of query 2
while ($row = mysqli_fetch_assoc($result2)) {
    echo $row['account_title'] . " - " . $row['sub_account'] . "<br>";
}
?>


<?php
// Close the connectionch
$conn->close();
?>
