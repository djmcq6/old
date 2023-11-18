<!-- form_coa.php -->
<!DOCTYPE html>
<html>
<head>
    <title>COA Form</title>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <form action="add_coa.php" method="post">
        <label for="account_title">Account Title:</label><br>
        <input type="text" id="account_title" name="account_title"><br><br>

          <label for="browser">Choose your sub account from the list:</label>
  


      <select name="sub_account" id="id_coa">
            <?php
            // Include the database connection
            include 'connection.php';

            // Fetch options from the coa table
            $sql = "SELECT * FROM sub_account";
            $result = $conn->query($sql);

            // Display options in the select dropdown
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id_sub"] . "'>" . $row["name_sub"] . "</option>";
                }
            }
            ?>
        </select>
  

        <label>Select Option:</label><br>
        <input type="radio" id="category" name="option" value="category">
        <label for="category">Category</label><br>
        <input type="radio" id="end_account" name="option" value="end_account">
        <label for="end_account">End Account</label>

        <input type="submit" value="Submit">save</input>
    </form>
</body>
</html>
