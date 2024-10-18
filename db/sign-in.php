<!doctype html>
<html lang="en">
<head>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../plugins/node_modules/tailwindcss/tailwind.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giriş</title>
</head>
<body class="text-gray">

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
        header("Refresh:2 ../pages/index.php");
        echo " <div><img
class='w-full h-screen object-cover  ' src='../src/assets/imgs/welcome.jpg' alt='welcomePage'></div>";
        $_SESSION['user'] = $user;

    } else {
      header("Refresh:2 ../pages/login.php");
      echo " <div>
 <img class='w-full h-screen object-cover  ' src='../src/assets/imgs/try-again.jpg' alt='tryAgainPage'>
</div>";
        echo "<script>alert('Geçersiz Email veya Şifre!');</script>";
    }


    $stmt->close();
    $deneme->close();
}


?>


</body>
</html>

