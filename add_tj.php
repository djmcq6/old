<?php
// Include the database connection
include 'connection.php';

// Check if the form is submitted
    // Collect form data
    $dateTJ = $_POST['date_tj'];
    $debitCredit = $_POST['debit_credit'];
    $amountTJ = $_POST['amount_tj'];
    $idCOA = $_POST['id_coa'];

    $sql = "INSERT INTO tj (date_tj, debit_credit, amount_tj, id_coa) VALUES ('$dateTJ', '$debitCredit', '$amountTJ', '$idCOA')";

    if (mysqli_query($conn, $sql)) {
        // Redirect back to index.php
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

// Close the connection
mysqli_close($conn);
?>
