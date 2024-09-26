<!doctype html>
<?php
include "data.php";
include "db.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./node_modules/tailwindcss/tailwind.css">
    <link rel="stylesheet" href="./style.css">

    <header class="bg-[#333] p-5 text-white box-border">
</head>
<div class="">
    <h1 class=" flex flex-col justify-center items-center text-3xl text-[#f0a500]">MyWebsite</h1>
</div>
<nav class="flex justify-center items-center p-5">

    <ul class="list-image-none flex">
        <li class="m-[15px] "><a class="text-white no-underline" href="#home"><?= $home ?></a></li>
        <li class="m-[15px] "><a class="text-white no-underline" href="#about"><?= $aboutUs ?></a></li>
        <li class="m-[15px] "><a class="text-white no-underline" href="#services"><?= $services ?></a></li>
        <li class="m-[15px] "><a class="text-white no-underline hover:text-cyan-700 max-md:p-[40px]  "
                                 href="#contact"><?= $contact ?></a></li>
    </ul>
</nav>
</header>
<body class=" h-full w-full font-serif ">
<video class=" w-full h-full left-0 top-0"
       autoplay muted loop>
    <source type="video/mp4" src="./6981411-hd_1920_1080_25fps.mp4">
</video>

<footer class=" bg-[#333] text-white p-5 h-[370px] text-left fixed bottom-0 w-full">
    <div class=" flex justify-between max-w-full m-auto ">
        <!-- Haberler Bölümü -->
        <div class=" w-[30%] ">
            <h3 class=" mb-4 text-xl underline underline-offset-2 "><a href="./haberler.php">Haberler</a></h3>
            <ul class="list-  text-white no-underline pb-2">
                <li class="list-none   text-white no-underline ">Yeni Ürün Lansmanı</li>
                <li class="list-none   text-white no-underline ">Yazılım Güncellemeleri</li>
                <li class="list-none   text-white no-underline ">Basın Bültenleri</li>
            </ul>
        </div>

        <!-- Etkinlikler Bölümü -->
        <div class="footer-section">
            <h3 class=" mb-4 text-xl  underline underline-offset-2  "><a href="./etkinlikler.php">Etkinlikler</a></h3>
            <ul class="list-none   text-white no-underline pb-2">
                <li class="list-none   text-white no-underline ">Yazılım Konferansı 2024</li>
                <li class="list-none   text-white no-underline ">Geliştirici Buluşması</li>
                <li class="list-none   text-white no-underline ">Çevrimiçi Webinar</li>
            </ul>
        </div>

        <!-- Site Linkleri Bölümü -->
        <div>
            <h3 class=" mb-4 text-xl  underline underline-offset-2  "> Hızlı Ulaş</h3>
            <ul class="list-none   text-white no-underline pb-2">
                <li class="list-none   text-white no-underline "><?= $home ?></li>
                <li class="list-none   text-white no-underline "><?= $aboutUs ?></li>
                <li class="list-none   text-white no-underline "><?= $services ?></li>
                <li class="list-none   text-white no-underline "><?= $contact ?></li>
            </ul>
            <p class=""> designed by Furkanİzci</p>
        </div>
    </div>
</footer>
</body>
</html>