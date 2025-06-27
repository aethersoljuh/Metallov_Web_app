<?php
$host = 'db';
$db   = 'vulnerable_db';
$user = 'root';
$pass = 'Test123';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}
?>