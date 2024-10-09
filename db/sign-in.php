<?php
session_start();
error_reporting(0);
include('db.php');
if (isset($_POST['giris'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = mysqli_query($deneme, "SELECT * FROM users WHERE email='$email' AND password='$password' ");
    $row = mysqli_fetch_array($query);
    if($query) {
        echo "Yeni Etkinlik Eklendi";
        header("Refresh:2; ../pages/haberler.php");
    }
    else {
        echo "gata";

    }

}
  ?>