<?php
$host = "localhost";
$dbname = "np03cs4a240297";
$user = "np03cs4a240297";
$pass = "Q57i3rHBX9";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed");
}
?>
