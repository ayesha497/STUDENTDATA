<?php
include "db.php";

$id = $_GET['id'];

// Handle form submission
if (isset($_POST['update'])) {
    $name    = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    $section = $_POST['section'];
    $age     = $_POST['age'];
    $phone   = $_POST['phone'];
    $address = $_POST['address'];

    $update = "UPDATE students
               SET name='$name', roll_no='$roll_no', section='$section', age='$age', phone='$phone', address='$address'
               WHERE id='$id'";

    $result = mysqli_query($conn, $update);

    if ($result) {
        header("Location: table.php?msg=Updated successfully");
    } else {
        header("Location: table.php?msg=Error updating student");
    }
    exit;
}

// Fetch existing student data
$query = "SELECT * FROM students WHERE id='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Student</title>
<link rel="stylesheet" href="dark-style.css">

</head>
<body>
    <div class="container">
        <h2>Update Student Details</h2>
        <form method="POST">
            Name:
            <input type="text" name="name" value="<?php echo $row['name']; ?>" required>

            Roll No:
            <input type="text" name="roll_no" value="<?php echo $row['roll_no']; ?>" required>

            Section:
            <input type="text" name="section" value="<?php echo $row['section']; ?>" required>

            Age:
            <input type="number" name="age" value="<?php echo $row['age']; ?>" required>

            Phone:
            <input type="tel" name="phone" value="<?php echo $row['phone']; ?>" required>

            Address:
            <input type="text" name="address" value="<?php echo $row['address']; ?>" required>

            <button name="update">Update</button>
        </form>
    </div>
</body>
</html>