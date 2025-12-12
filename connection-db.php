<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "cozycoffee";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
    exit; // stop execution if DB connection fails
}
?>


