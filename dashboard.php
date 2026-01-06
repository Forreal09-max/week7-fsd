<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

$theme = $_COOKIE['theme'] ?? 'light';
?>

<!DOCTYPE html>
<html>
<body style="
background-color: <?php echo ($theme == 'dark') ? 'black' : 'white'; ?>;
color: <?php echo ($theme == 'dark') ? 'white' : 'black'; ?>
">

<h2>Welcome, <?php echo $_SESSION['name']; ?></h2>

<a href="preference.php">Change Theme</a><br><br>
<a href="logout.php">Logout</a>

</body>
</html>
