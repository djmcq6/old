<!DOCTYPE html>
<html>
<head>
    <title>Stock Transactions</title>
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include 'navbar.php'; ?>

    <?php
include 'connection.php';

$query = "SELECT * FROM cashaccounts";
$result = mysqli_query($conn, $query);
?>

<!-- Display records in a table -->
<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Account</th>
            <th>Action</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Notes</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['Date_2'] ?></td>
                <td><?= $row['Account_2'] ?></td>
                <td><?= $row['Action_2'] ?></td>
                <td><?= $row['Debit'] ?></td>
                <td><?= $row['Credit'] ?></td>
                <td><?= $row['Notes'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['CashAcc_ID'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $row['CashAcc_ID'] ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
<?php
include 'connection.php';

$query = "SELECT * FROM cashaccounts";
$result = mysqli_query($conn, $query);
?>

<!-- Display records in a table -->
<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Account</th>
            <th>Action</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Notes</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['Date_2'] ?></td>
                <td><?= $row['Account_2'] ?></td>
                <td><?= $row['Action_2'] ?></td>
                <td><?= $row['Debit'] ?></td>
                <td><?= $row['Credit'] ?></td>
                <td><?= $row['Notes'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['CashAcc_ID'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $row['CashAcc_ID'] ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
