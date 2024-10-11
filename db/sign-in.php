<?php

echo "<link rel='shortcut icon' href='../src/assets/icos/favicon.ico' type='image/x-icon'>";
session_start();
error_reporting(0);
include('db.php');

if (isset($_POST['giris'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $stmt = $deneme->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();
        header("Refresh:1; ../pages/index.php");
        echo "<script>alert('Giriş Başarılı!');</script>";
        $_SESSION['user'] = $user;
    } else {
        header("Refresh:1; ../pages/login.php");
        echo "<script>alert('Geçersiz Email veya Şifre!');</script>";
    }


    $stmt->close();
    $deneme->close();
}


?>
