<?php 


// Database connection parameters
$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "financialstatementhierarchy";
//$dbName = "coa";



// Create a database connection
$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}










?>