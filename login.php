<?php
session_start();
include 'db.php';

$error = "";

if (isset($_POST['login'])) {

    $student_id = $_POST['student_id'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM students WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$student_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['logged_in'] = true;
        $_SESSION['name'] = $user['name'];

        header("Location: dashboard.php");
        exit();

    } else {
        $error = "Invalid Student ID or Password";
    }
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
    <h2>Login</h2>

    <?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>

    Student ID:
    <input type="text" name="student_id" required>

    Password:
    <input type="password" name="password" required>

    <button type="submit" name="login">Login</button>
</form>
</div>

</body>
</html>
