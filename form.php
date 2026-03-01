<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="dark-style.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <h2>Add Student Details</h2>
            <!-- specify POST method so PHP can read values via $_POST -->
            <form action="insert.php" method="post" id="studentForm">
                <input type="text" name="name" placeholder="Name" required>
                <input type="text" name="roll_no" placeholder="Roll No" required>
                <input type="text" name="section" placeholder="Section" required>
                <input type="number" name="age" placeholder="Age" required>
                <input type="tel" name="phone" placeholder="Phone Number" required>
                <input type="text" name="address" placeholder="Address" required>
                <button type="submit">Add Student</button>
            </form>
            <a href="table.php">View Students</a>
        </div>
    </div>
</body>

</html>