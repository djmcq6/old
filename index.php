<!DOCTYPE html>
<html>
<head>
    <title>Stock Transactions</title>
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include 'navbar.php'; ?>

    <h2>Balance Sheet</h2>
    

    <a href="form_sub.php"><button>Create Sub Account</button></a>
    <a href="form_coa.php"><button>Create Account Title</button></a>
    <a href="form_tj.php"><button>Transaction Journal</button></a>


    <?php
// Assuming you have already established a connection to your database
include 'connection.php';

// Query to show account_title
$query1 = "SELECT * FROM sub_account ";
$result1 = mysqli_query($conn, $query1);
 echo "ASSET TABLE <BR>";
// Displaying the result of query 1
while ($row = mysqli_fetch_assoc($result1)) {

    echo "<b>".$row['name_sub'] . "</b><br>";

    $subA = $row['id_sub'] ;



    $query2 = "SELECT account_title, id_coa FROM coa where sub_account ='$subA'";

  
$result2 = mysqli_query($conn, $query2);

// Displaying the result of query 2
while ($row = mysqli_fetch_assoc($result2)) {
    echo $row['account_title'] .  "<br>";

 $subAA = $row['id_coa'] ;

}
}



?>

<!--
    <table border="1" id="assetsTable">
        <caption><a href="assets.php">Assets</caption>
        <tr>
            <th>Account</th>
            <th>Amount</th>
        </tr>
        <tr>
            <td><a href="cash_accounts.php">Cash</a></td>
            <td>$100,000</td>
        </tr>
        <tr>
            <td><a href="Current_positions.php">Stocks</a></td>
            <td>$50,000</td>
        </tr>
        <tr>
            <td><a href="autoS.php">Auto</td>
            <td>$ - </td>
        </tr>
        <tr>
            <td>Other</td>
            <td>$ - </td>
        </tr>
        <tr>
            <td><strong>Total Assets</strong></td>
            <td><strong id="totalAssets">$525,000</strong></td>
        </tr>
    </table>

    <br>

    <table border="1">
        <caption>Liabilities and Equity</caption>
        <tr>
            <th>Account</th>
            <th>Amount</th>
        </tr>
        <tr>
            <td><a href="liabilities.php">Liabilities</td>
            <td>$50,000</td>
        </tr>
        <tr>
            <td><a href="creditcard.php">Credit Card</td>
            <td>$30,000</td>
        </tr>
        <tr>
            <td><a href="carnote.php">Car Note</td>
            <td>$100,000</td>
        </tr>
        <tr>
            <td><a href="equity.php">Equity</td>
            <td>$345,000</td>
        </tr>
        <tr>
            <td><strong>Total Liabilities and Equity</strong></td>
            <td><strong>$525,000</strong></td>
        </tr>
    </table>

    <br><br>

    <h2>Income Statement</h2>

    <table border="1" id="incomeStatement">
        <caption>Income Statement</caption>
        <tr>
            <th>Account</th>
            <th>Amount</th>
        </tr>
        <tr>
            <td><a href="income.php">Income</td>
            <td>$300,000</td>
        </tr>
        <tr>
            <td><a href="expense.php">Expenses</td>
            <td>$150,000</td>
        </tr>
        <tr>
            <td><strong>Net Income</strong></td>
            <td><strong>$150,000</strong></td>
        </tr>
    </table>

    
</table>
-->

</body>

</html>

