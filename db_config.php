<?php
// db_config.php
$host = 'localhost';
$db = 'usiu';
$user = 'root'; // Default user for local MySQL
$pass = '';     // Leave empty for local MySQL

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
