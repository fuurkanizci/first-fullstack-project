<?php
include('../db/db.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $user_type="user";

    $sql="SELECT * FROM `users` WHERE email='".$email."' AND password='".$password."'";
    $result=mysqli_query($sql,$deneme);
    $row=mysqli_fetch_assoc($result);
    if($row["user_type"]=="user"){
        echo "user";
    }
    elseif($row["user_type"]=="admin"){
        echo "admin";
    }
    else{
        echo "username or password is wrong";
    }
}


?>




<!DOCTYPE html>
<html lang="en">
<head>


    <link rel="shortcut icon" href="../assets/icos/favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Giriş Kayıt</title>
    <link rel="stylesheet" href="login.css">


    <link rel="stylesheet" href="../loading/loading.css">
</head>
<body >

<!-- Spinner -->
<div id="loading"  class="loader loader-index"></div>
<script>
    window.addEventListener("load", () => {
        const loader = document.querySelector(".loader");
        loader.classList.add("loader--hidden");
        loader.addEventListener("transitionend", () => {
            document.body.removeChild(loader);
        });
    });
</script>

<button type="button" class="mrgn-bttm" onClick="parent.location='./login-admin.php'">Admin Giriş Kayıt</button>


    <!-- İkinci Form - Kullanıcı Formu -->

    <div class="container user-container " id="container2">
        <div class="form-container sign-up-container">
            <form action="#" method="post">
                <h1 class="yazi-siyah">Hesap Oluştur</h1>
                <input type="text" placeholder="Name">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <button>Kayıt Ol</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="#">
                <h1 class="yazi-siyah">Giriş Yap</h1>
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <button type="submit" >Giriş Yap</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Tekrar Hoşgeldin</h1>
                    <p>Hesap bilgilerini girdikten sonra, kaldığımız yerden devam edebiliriz</p>
                    <button type="submit"  class="ghost" id="signIn2">Giriş Yap</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Selamlar Hoşgeldin</h1>
                    <p>Kişisel bilgilerini doldur ve bize katıl</p>
                    <button class="ghost" id="signUp2">Kayıt Ol</button>
                </div>
            </div>
        </div>
    </div>


<script>
    // İlk formun animasyonu
    const signUpButton2 = document.getElementById('signUp2');
    const signInButton2 = document.getElementById('signIn2');
    const container2 = document.getElementById('container2');

    signUpButton2.addEventListener('click', () => {
        container2.classList.add("right-panel-active");
    });

    signInButton2.addEventListener('click', () => {
        container2.classList.remove("right-panel-active");
    });



    // İkinci formun animasyonu

</script>
</body>
</html>
