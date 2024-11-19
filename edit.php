<?php include 'db.php'; ?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM students WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Student Record</h1>
        <form action="edit.php?id=<?php echo $id; ?>" method="POST">
            <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>" required>
            <input type="text" name="middlename" value="<?php echo $row['middlename']; ?>" required>
            <input type="text" name="lastname" value="<?php echo $row['lastname']; ?>" required>
            <input type="number" name="age" value="<?php echo $row['age']; ?>" required>
            <input type="text" name="address" value="<?php echo $row['address']; ?>" required>
            <input type="text" name="course_section" value="<?php echo $row['course_section']; ?>" required>
            <button type="submit" name="submit" class="btn">Update</button>
        </form>
        <a href="index.php" class="btn">Back</a>
    </div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course_section = $_POST['course_section'];

    $sql = "UPDATE students SET firstname='$firstname', middlename='$middlename', lastname='$lastname', 
            age='$age', address='$address', course_section='$course_section' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
