<?php
$host = "localhost";
$user = "root"; // Default XAMPP MySQL user
$pass = ""; // Default password is empty
$dbname = "philfida";

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
