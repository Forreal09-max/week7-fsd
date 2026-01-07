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
<head>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="<?php echo $theme; ?>">

<div class="container">
    <h2>Welcome, <?php echo $_SESSION['name']; ?></h2>

    <a href="preference.php">Change Theme</a><br><br>
    <a href="logout.php">Logout</a>
</div>

</body>
</html>
