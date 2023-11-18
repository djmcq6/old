<?php
include 'connection.php';

$query = "SHOW TABLES LIKE 't%'";
$result = mysqli_query($conn, $query);

$highestTable = 't0'; // Initialize with a default table name

while ($row = mysqli_fetch_row($result)) {
    $tableName = $row[0];
    if (intval(substr($tableName, 1)) > intval(substr($highestTable, 1))) {
        $highestTable = $tableName;
    }
}

if (isset($_GET['data'])) {
    $clickedAccount = $_GET['data'];

    $query = "SHOW TABLES LIKE 't%'";
    $result = mysqli_query($conn, $query);

    $belongsToHighest = false;

    while ($row = mysqli_fetch_row($result)) {
        $tableName = $row[0];
        $query = "SELECT * FROM " . $tableName . " WHERE account_" . $tableName . " = '" . $clickedAccount . "'";
        $res = mysqli_query($conn, $query);

        if (mysqli_num_rows($res) > 0) {
            echo "The clicked account belongs to table: " . $tableName . "<br>";
            if ($tableName === $highestTable) {
                echo "This is the highest tier";
                $belongsToHighest = true;
            } else {
                echo "This is not the highest tier";
            }
            break; // Stop the loop after finding the corresponding table
        }
    }

    // If the account doesn't belong to any table
    if (!$belongsToHighest) {
        echo "The clicked account does not belong to any table";
    }
}
?>
