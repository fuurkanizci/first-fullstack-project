


<?php
include "../db/db.php";
include "../db/sign-in.php";
include "../db/sign-up.php";
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
            <form action="../db/sign-up.php" method="POST">
                <h1 class="syh">Hesap Oluştur</h1>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" id="cpass" name="cpass" placeholder="Retype Password" required>
                <button type="submit" name="submit">Kayıt Ol</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="../db/sign-in.php" method="POST">
                <h1 class="syh">Giriş Yap</h1>
                <input type="email" name="email"placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="giris">Giriş Yap</button>
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
