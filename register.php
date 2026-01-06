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
}
?>

<form method="post">
    Student ID: <input type="text" name="student_id" required><br><br>
    Name: <input type="text" name="name" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button name="register">Register</button>
</form>
