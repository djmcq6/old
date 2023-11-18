<?php
include 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $date = $_POST['date'];
    $grossPay = $_POST['grossPay'];
    $taxes = $_POST['taxes'];
    $insurance = $_POST['insurance'];
    $retirement = $_POST['retirement'];

    // Calculate net pay
    $netPay = $grossPay - $taxes - $insurance - $retirement;

    $regularHours = $_POST['regularHours'];
    $overtimeHours = $_POST['overtimeHours'];
    $holidayHours = $_POST['holidayHours'];
    $sickHours = $_POST['sickHours'];
    $vacationHours = $_POST['vacationHours'];

    // Calculate total hours worked
    $totalHoursWorked = $regularHours + $overtimeHours + $holidayHours + $sickHours + $vacationHours;

    // Calculate tax rate
    $taxRate = $taxes / $grossPay - 1;

    // SQL query for insertion
    $sql = "INSERT INTO paystub (Date, `Gross Pay`, Taxes, Insurance, Retirement, `Net Pay`, `Regular Hours`, `Overtime Hours`, `Holiday Hours`, `Sick Hours`, `Vacation Hours`, `Total Hours Worked`, `Tax Rate`) 
            VALUES ('$date', '$grossPay', '$taxes', '$insurance', '$retirement', '$netPay', '$regularHours', '$overtimeHours', '$holidayHours', '$sickHours', '$vacationHours', '$totalHoursWorked', '$taxRate')";

    if ($conn->query($sql) === TRUE) {
        echo "New record added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
