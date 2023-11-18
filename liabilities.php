<!DOCTYPE html>
<html>
<head>
    <title>Liabilities</title>
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include 'navbar.php'; ?>

    <h2>Liabilities</h2>

    <?php
    include 'connection.php';

    $query = "";
    for ($i = 1; $i <= 6; $i++) {
        $tableName = 't' . $i;
        if ($i > 1) {
            $query .= " UNION ";
        }
        $query .= "(SELECT `account_" . $tableName . "` AS account_data, `code_" . $tableName . "` AS code_data FROM " . $tableName . ")";
    }
    $query .= " ORDER BY code_data ASC"; // Sort the combined table by code in ascending order

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<table border='1'>";
        echo "<tr><th>Account Data</th><th>Code</th><th>Action</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['account_data'] . "</td>";
            echo "<td>" . $row['code_data'] . "</td>";
            echo "<td><button onclick='openPopup(\"" . $row['account_data'] . "\")'>Open Popup</button></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    ?>

    <script>
        function openPopup(data) {
            // You can customize the popup URL and properties as needed
            var popupURL = "form_bs.php?data=" + data;
            var popupName = "PopupWindow";
            var popupProperties = "width=600,height=400,location=no,menubar=no,toolbar=no";
            window.open(popupURL, popupName, popupProperties);
        }
    </script>
</body>
</html>
