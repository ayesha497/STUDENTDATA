<?php
include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the student from the table
    $query = "DELETE FROM students WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect back to table.php with success message
        header("Location: table.php?msg=Deleted successfully");
        exit;
    } else {
        // Redirect back with error message
        header("Location: table.php?msg=error deleting student");
        exit;
    }
} else {
    // Redirect if no id provided
    header("Location: table.php");
    exit;
}
?>