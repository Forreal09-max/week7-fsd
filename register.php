<?php
include 'db.php';

if (isset($_POST['register'])) {

    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO students (student_id, name, password)
            VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$student_id, $name, $password]);

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="light">

<div class="container">
<form method="post">
    <h2>Register</h2>

    Student ID:
    <input type="text" name="student_id" required>

    Name:
    <input type="text" name="name" required>

    Password:
    <input type="password" name="password" required>

    <button type="submit" name="register">Register</button>
</form>
</div>

</body>
</html>
