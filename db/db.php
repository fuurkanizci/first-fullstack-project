<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$servername = "127.0.0.1";
$username = "root";
$password = "";
$db_name = "proje-1-haberler";
$deneme = new mysqli($servername, $username, $password, $db_name, 3306);

if ($deneme->connect_error) {
    die("Connection failed: " . $deneme->connect_error);
}
?>
