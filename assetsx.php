<?php

include 'connection.php';

$query = "SELECT * FROM balancesheet";
$result = mysqli_query($conn, $query);

echo "<table border='1'>";
echo "<tr><th>Tier 1</th><th>Tier 2</th><th>Tier 3</th><th>Tier 4</th><th>Tier 5</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['tier1'] . "</td>";
    echo "<td>" . $row['tier2'] . "</td>";
    echo "<td>" . $row['tier3'] . "</td>";
    echo "<td>" . $row['tier4'] . "</td>";
    echo "<td>" . $row['tier5'] . "</td>";
    echo "</tr>";
}

echo "</table>";

$query = "SELECT 
            CONCAT_WS(',', 
                NULLIF(tier1, ''), 
                NULLIF(tier2, ''), 
                NULLIF(tier3, ''), 
                NULLIF(tier4, ''), 
                NULLIF(tier5, '')
            ) AS data 
          FROM balancesheet";

$result = mysqli_query($conn, $query);

echo "<table border='1'>";
echo "<tr><th>Data</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['data'] . "</td>";
    echo "<td><button onclick=\"openForm('" . $row['data'] . "')\">Open Form</button></td>";
    echo "</tr>";
}
?>

<script>
function openForm(data) {
    // You can customize the form URL and properties as per your requirements
    var formURL = "your_form_url.php?data=" + data;
    var formName = "FormWindow";
    var formProperties = "width=600,height=400,location=no,menubar=no,toolbar=no";
    window.open(formURL, formName, formProperties);
}
</script>




