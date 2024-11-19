<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Student Records</h1>
        <a href="create.php" class="btn">Add New Student</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Course & Section</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM students";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['firstname']}</td>
                                <td>{$row['middlename']}</td>
                                <td>{$row['lastname']}</td>
                                <td>{$row['age']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['course_section']}</td>
                                <td>
                                    <a href='edit.php?id={$row['id']}' class='edit'>Edit</a>
                                    <a href='delete.php?id={$row['id']}' class='delete'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
