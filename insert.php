<?php
include "db.php";

// Get form data (make sure form is submitted via POST)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // nothing to do, redirect back
    header("Location: form.php?msg=invalid");
    exit;
}

$name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
$roll_no = isset($_POST['roll_no']) ? mysqli_real_escape_string($conn, $_POST['roll_no']) : '';
$section = isset($_POST['section']) ? mysqli_real_escape_string($conn, $_POST['section']) : '';
$age = isset($_POST['age']) ? mysqli_real_escape_string($conn, $_POST['age']) : '';
$phone = isset($_POST['phone']) ? mysqli_real_escape_string($conn, $_POST['phone']) : '';
$address = isset($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : '';

// Insert into students table
$query = "INSERT INTO students (name, roll_no, section, age, phone, address) " .
    "VALUES ('$name', '$roll_no', '$section', '$age', '$phone', '$address')";

$result = mysqli_query($conn, $query);

if ($result) {
    // Redirect to table page with success message
    header("Location: table.php?msg=Data inserted successfully");
    exit;
} else {
    // For debugging: log the error (or show temporarily)
    error_log('Insert failed: ' . mysqli_error($conn));
    // Redirect to table page with error message
    header("Location: table.php?msg=error inserting data");
    exit;
}
?>