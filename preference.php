<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['theme'])) {
    setcookie("theme", $_POST['theme'], time() + (86400 * 30), "/");
    header("Location: dashboard.php");
    exit();
}

$currentTheme = $_COOKIE['theme'] ?? 'light';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="<?php echo $currentTheme; ?>">

<div class="container">
<form method="post">
    <h2>Select Theme</h2>

    <select name="theme">
        <option value="light" <?php if ($currentTheme == 'light') echo 'selected'; ?>>
            Light Mode
        </option>
        <option value="dark" <?php if ($currentTheme == 'dark') echo 'selected'; ?>>
            Dark Mode
        </option>
    </select><br><br>

    <button type="submit">Save Preference</button>
</form>
</div>

</body>
</html>
