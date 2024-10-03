<!doctype html>
<?php
include('/Applications/XAMPP/xamppfiles/htdocs/first-project/db/db.php');
include('/Applications/XAMPP/xamppfiles/htdocs/first-project/db/data.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Backend EDC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./node_modules/tailwindcss/tailwind.css">
    <link rel="stylesheet" href="./style.css">
</head>

<header>
    <div class="childs-colors text-white box-border">
        <div>
            <h1 class="flex flex-col justify-center items-center text-3xl text-[#f0a500]"><?= $myWeb ?></h1>
        </div>
        <nav class="flex justify-center items-center p-5">
            <ul class="list-image-none flex">
                <li class="m-[15px] "><a class="text-white no-underline" href="#home"><?= $home ?></a></li>
                <li class="m-[15px] "><a class="text-white no-underline" href="#about"><?= $aboutUs ?></a></li>
                <li class="m-[15px] "><a class="text-white no-underline" href="#services"><?= $services ?></a></li>
                <li class="m-[15px] "><a class="text-white no-underline " href="#contact"><?= $contact ?></a></li>
            </ul>

            <div class="flex flex-row absolute right-6">
                <button id="newsButton"
                        class="  p-2 border rounded-2xl bg-[#f0a500] mr-5 hover:bg-[#F2B631]"><?= $newsAdd ?></button>
                <button id="eventsButton"
                        class="p-2 border rounded-2xl bg-[#f0a500] hover:bg-[#F2B631]"><?= $eventsAdd ?></button>
            </div>
        </nav>

    </div>
</header>

<body class="h-full w-full font-serif overflow-hidden">
<?php
$deneme = mysqli_connect("127.0.0.1", "root", "", "proje-1-haberler");
$sorgu = "SELECT * FROM video";
$data = $deneme->query($sorgu);

if (!$data) {
    die("Sorgu hatası: " . mysqli_error($deneme)); // Sorgu hatası varsa hata mesajını göster
}

// Videoyu döngü ile çekme
while ($row = mysqli_fetch_assoc($data)) { // MYSQL_ASSOC yerine mysqli_fetch_assoc kullanabilirsiniz
    $vid = $row['name'];
    echo "<video class='w-  h-screen left-0 top-0' autoplay muted loop>
            <source type='video/mp4' src='" . $vid . "'>
          </video>"; // PHP kodu içinde $vid değişkenini kullanmak için doğrudan PHP yazım stilini kullanın
}

?>

<footer class="childs-color text-white p-5 h-[250px] text-left fixed bottom-0 w-full">
    <div class="flex justify-around max-w-full m-auto ">
        <!-- Haberler Bölümü -->
        <div class="">
            <h3 class="mb-4 text-xl underline underline-offset-2"><a href="./haberler.php"><?= $news ?></a></h3>
            <ul class="list- text-white no-underline pb-2">
                <li class="list-none text-white no-underline"><?= $newsProduct ?></li>
                <li class="list-none text-white no-underline"><?= $newsSoftware ?></li>
                <li class="list-none text-white no-underline"><?= $newsBultens ?></li>
            </ul>
        </div>

        <!-- Etkinlikler Bölümü -->
        <div class="footer-section ">
            <h3 class="mb-4 text-xl underline underline-offset-2"><a href="./etkinlikler.php"><?= $events ?></a></h3>
            <ul class="list-none text-white no-underline pb-2">
                <li class="list-none text-white no-underline"><?= $eventsSoftware ?></li>
                <li class="list-none text-white no-underline"><?= $eventsDev ?></li>

                <li class="list-none text-white no-underline"><?= $eventsOnline ?></li>
            </ul>
        </div>

        <!-- Site Linkleri Bölümü -->
        <div class="pr-28  ">
            <h3 class="mb-4 text-xl underline underline-offset-2"><?= $quicqMenu ?></h3>
            <ul class="list-none text-white no-underline pb-2">
                <li class="list-none text-white no-underline"><?= $home ?></li>
                <li class="list-none text-white no-underline"><?= $aboutUs ?></li>
                <li class="list-none text-white no-underline"><?= $services ?></li>
                <li class="list-none text-white no-underline"><?= $contact ?></li>
            </ul>
            <p class="absolute left-[45%] bottom-2 text-[#f0a500]"> <?= $designed ?></p>
        </div>
    </div>

</footer>
<script> document.getElementById("newsButton").addEventListener("click", function () {
        window.location.href = "haber-ekleme.php";
    });
    document.getElementById("eventsButton").addEventListener("click", function () {
        window.location.href = "etkinlik-ekleme.php";
    });</script>
</body>

</html>
