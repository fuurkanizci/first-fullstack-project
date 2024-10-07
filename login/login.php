<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap Kaydol</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <!-- İlk Form - Admin Formu -->
    <div class="denemeler pt"> <h2>Admin Giriş</h2> <h2>Admin Kayıt</h2> </div>

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

    <!-- İkinci Form - Kullanıcı Formu -->
    <div class="denemeler pt">
        <div><h2 class="pr ">Kullanıcı Giriş</h2></div>
        <div><h2>Kullanıcı Kayıt</h2></div>
    </div>

    <div class="container user-container" id="container2">
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
                    <button class="ghost" id="signIn2">Giriş Yap</button>
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
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });

    // İkinci formun animasyonu
    const signUpButton2 = document.getElementById('signUp2');
    const signInButton2 = document.getElementById('signIn2');
    const container2 = document.getElementById('container2');

    signUpButton2.addEventListener('click', () => {
        container2.classList.add("right-panel-active");
    });

    signInButton2.addEventListener('click', () => {
        container2.classList.remove("right-panel-active");
    });
</script>
</body>
</html>
