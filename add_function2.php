<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $account = $_POST['account'];
    $action = $_POST['action'];
    $amount = $_POST['amount'];
    $notes = $_POST['notes'];

    if ($action == 'Transfer') {
        $toAccount = $_POST['to_account'];

        // Determine the "To Account" based on whether "Other" was selected
        if ($toAccount == 'Other') {
            $toAccount = $_POST['new_to_account'];
        }

        // Insert the first entry (Withdrawal from the "From Account")
        $sql1 = "INSERT INTO cashaccounts (Date_2, Account_2, Action_2, Debit, Credit, Notes)
                VALUES ('$date', '$account', 'Withdrawal', '0', '$amount', '$notes')";

        if ($conn->query($sql1) !== TRUE) {
            echo "Error: " . $conn->error;
        }

        // Insert the second entry (Deposit to the "To Account")
        $sql2 = "INSERT INTO cashaccounts (Date_2, Account_2, Action_2, Debit, Credit, Notes)
                VALUES ('$date', '$toAccount', 'Deposit', '$amount', '0', '')";

        if ($conn->query($sql2) !== TRUE) {
            echo "Error: " . $conn->error;
        }

        header("Location: index.php"); // Redirect to the main page
        exit();
    } else {
        // Determine debit and credit values based on the action
        $credit = ($action == 'Withdrawal') ? $amount : 0;
        $debit = ($action == 'Deposit') ? $amount : 0;

        // Determine the account to be used in Account_2
        if ($account == 'Other') {
            $account = $_POST['new_account'];
        }

        // Insert a single entry for Deposit or Withdrawal
        $sql = "INSERT INTO cashaccounts (Date_2, Account_2, Action_2, Debit, Credit, Notes)
                VALUES ('$date', '$account', '$action', '$debit', '$credit', '$notes')";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php"); // Redirect to the main page
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>
