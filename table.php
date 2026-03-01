<?php
include "db.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Students Data</title>
    <style>
       /* Reset and basic settings */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Body: Airy Blue Gradient */
body {
    background: linear-gradient(135deg, #f0f8ff 0%, #d1e9ff 100%);
    color: #5a7d9a;
    min-height: 100vh;
    padding: 40px;
    display: flex;
    justify-content: center;
}

/* The Frosted Glass White Container */
.container {
    width: 90%;
    max-width: 1000px;
    margin: auto;
    background: rgba(255, 255, 255, 0.6); /* Translucent White */
    backdrop-filter: blur(15px); /* The "Blure" effect */
    -webkit-backdrop-filter: blur(15px);
    padding: 40px;
    border-radius: 30px;
    border: 2px solid rgba(255, 255, 255, 0.8);
    box-shadow: 0 10px 30px rgba(173, 216, 230, 0.3);
}

/* Headings: Soft Sky Blue */
h2 {
    margin-bottom: 25px;
    color: #4a90e2;
    text-align: center;
    font-size: 28px;
    font-weight: 600;
    letter-spacing: 0.5px;
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: separate; /* Important for rounded corners on tables */
    border-spacing: 0 10px; /* Adds a little gap between rows */
    margin-top: 15px;
}

table th {
    background: rgba(74, 144, 226, 0.1); /* Very light blue tint */
    color: #4a90e2;
    padding: 15px;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 13px;
    letter-spacing: 1px;
    border-bottom: 2px solid #ffffff;
}

table td {
    padding: 15px;
    text-align: center;
    background: rgba(255, 255, 255, 0.4); /* Transparent row background */
    color: #5a7d9a;
    transition: 0.3s;
    border-bottom: 1px solid rgba(255, 255, 255, 0.5);
}

/* Rounding the table corners */
table tr:first-child th:first-child { border-top-left-radius: 15px; }
table tr:first-child th:last-child { border-top-right-radius: 15px; }

table tr:hover td {
    background: rgba(255, 255, 255, 0.8); /* Highlight on hover */
    transform: scale(1.01);
}

/* Action links (Buttons) */
a {
    text-decoration: none;
    padding: 8px 16px;
    border-radius: 12px;
    margin: 4px;
    display: inline-block;
    font-size: 13px;
    font-weight: 600;
    transition: 0.3s;
}

/* Update Button - Soft Teal/Green */
a[href*="update"] {
    background: #81ecec;
    color: #00818a;
    box-shadow: 0 4px 10px rgba(129, 236, 236, 0.3);
}

/* Delete Button - Soft Rose/Pink */
a[href*="delete"] {
    background: #ffadd2;
    color: #a4161a;
    box-shadow: 0 4px 10px rgba(255, 173, 210, 0.3);
}

a:hover {
    transform: translateY(-2px);
    filter: brightness(1.05);
    opacity: 1;
}

/* Responsive */
@media (max-width: 768px) {
    .container {
        width: 95%;
        padding: 20px;
    }
    
    table {
        font-size: 14px;
    }
}
    </style>

</head>

<body>
    <?php
    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == 'deleted') {
            echo "<script>alert('Student deleted successfully!');</script>";
        } elseif ($_GET['msg'] == 'error') {
            echo "<script>alert('Error deleting student.');</script>";
        }
    }
    ?>
    <div class="container">
        <div class="header" style="display: flex; justify-content: space-between; align-items: center;">
            <h2>Student Records</h2>
            <a href="form.php" style="background: #007bff; color: white;"> + Add New Student</a>
        </div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Roll No</th>
                <th>Section</th>
                <th>Age</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>

            <?php
            $query = "SELECT * FROM students";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                ?>

                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['roll_no']; ?></td>
                    <td><?php echo $row['section']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>"
                            onclick="return confirm('Are you sure you want to delete this student?');">Delete</a>
                    </td>
                </tr>

            <?php } ?>

        </table>
    </div>
</body>

</html>