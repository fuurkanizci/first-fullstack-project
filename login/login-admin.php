<!doctype html>
<html lang="en">
<head>

    <link rel="shortcut icon" href="../assets/icos/favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Admin Giriş Kayıt</title>

    <!-- Spinner CSS -->


    <!-- Sayfa CSS -->
    <link rel="stylesheet" href="login.css">

    <link rel="stylesheet" href="../loading/loading.css">
</head>
<body>

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

<!-- İlk Form - Admin Formu -->


<div class="container admin-container" id="container">
    <div class="form-container sign-up-container">
        <form action="#">
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
            <button>Giriş Yap</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Tekrar Hoşgeldin</h1>
                <p>Hesap bilgilerini girdikten sonra, kaldığımız yerden devam edebiliriz</p>
                <button class="ghost" id="signIn">Giriş Yap</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Selamlar Hoşgeldin</h1>
                <p>Kişisel bilgilerini doldur ve bize katıl</p>
                <button class="ghost" id="signUp">Kayıt Ol</button>
            </div>
        </div>
    </div>
</div>

<!-- Spinner JavaScript -->


<!-- Form Geçiş Scripti -->
<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
</script>

</body>
</html>
