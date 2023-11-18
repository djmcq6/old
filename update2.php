<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cashaccID = $_POST['id'];
    $date = $_POST['date2'];
    $account = $_POST['account'];
    $action = $_POST['action'];
    $amount = $_POST['amount'];
    $notes = $_POST['notes'];
    //$toAccount = $_POST['to_account']; // To Account for transfers

    // Insert the first transaction based on the selected action
    if ($action === 'Deposit') {
        $debit = $amount;
        $credit = 0;


        $query1 = "UPDATE cashaccounts
           SET Date_2 = '$date',
               Account_2 = '$account',
               Action_2 = '$action',
               Debit = '$debit',
               Credit = '$credit',
               Notes = '$notes'
           WHERE CashAcc_ID = $cashaccID";

        
        // Execute both queries in a transaction to ensure data consistency
        mysqli_begin_transaction($conn);

        if (mysqli_query($conn, $query1)) {
            mysqli_commit($conn);
        } else {
            mysqli_rollback($conn);
            echo "Error: " . mysqli_error($conn);
        }
    
    
    header("Location: cashlog.php"); // Redirect to your index page after successful insertion
    exit();
    
    } elseif ($action === 'Withdrawal') {
        $debit = 0;
        $credit = $amount;


        $query1 = "UPDATE cashaccounts
           SET Date_2 = '$date',
               Account_2 = '$account',
               Action_2 = '$action',
               Debit = '$debit',
               Credit = '$credit',
               Notes = '$notes'
           WHERE CashAcc_ID = $cashaccID";

        
        // Execute both queries in a transaction to ensure data consistency
        mysqli_begin_transaction($conn);

        if (mysqli_query($conn, $query1)) {
            mysqli_commit($conn);
        } else {
            mysqli_rollback($conn);
            echo "Error: " . mysqli_error($conn);
        }
    
    header("Location: cashlog.php"); // Redirect to your index page after successful insertion
    exit();

    } elseif ($action === 'Transfer') {
        // Insert the debit for the first account
        $debit = $amount;
        $credit = 0;

        $query1 = "UPDATE cashaccounts
           SET Date_2 = '$date',
               Account_2 = '$account',
               Action_2 = '$action',
               Debit = '$debit',
               Credit = '$credit',
               Notes = '$notes'
           WHERE CashAcc_ID = $cashaccID";
        
        // Insert the credit for the second account
        $debit = 0;
        $credit = $amount;

        $query2 = "UPDATE cashaccounts
           SET Date_2 = '$date',
               Account_2 = '$account',
               Action_2 = '$action',
               Debit = '$debit',
               Credit = '$credit',
               Notes = '$notes'
           WHERE CashAcc_ID = $cashaccID"; // Replace 'ID' with the actual column name for your unique identifier

        
        // Execute both queries in a transaction to ensure data consistency
        mysqli_begin_transaction($conn);

        if (mysqli_query($conn, $query1) && mysqli_query($conn, $query2)) {
            mysqli_commit($conn);
        } else {
            mysqli_rollback($conn);
            echo "Error: " . mysqli_error($conn);
        }
    }
    
    header("Location: cashlog.php"); // Redirect to your index page after successful insertion
    exit();
}
?>
