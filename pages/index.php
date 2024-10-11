<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ./login.php");
    exit;
}
?>

<!doctype html>
<?php
include('../db/db.php');
include('../db/data.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Haber & Etkinlik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../plugins/node_modules/tailwindcss/tailwind.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../src/components/loading/loading.css">
    <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
</head>

<body class="h-full w-full font-serif overflow-hidden">

<div id="loading" class="loader loader-index"></div>
<script>
    window.addEventListener("load", () => {
        const loader = document.querySelector(".loader");
        loader.classList.add("loader--hidden");
        loader.addEventListener("transitionend", () => {
            document.body.removeChild(loader);
        });
    });
</script>



<header>
    <div class="bg-transparent text-white box-border  ">
        <div>
            <h1 class="flex flex-col justify-center items-center text-3xl text-[#f0a500]"><?= $myWeb ?></h1>
        </div>
        <nav class="flex justify-center items-center p-5">
            <ul class="list-image-none flex">
                <li class="m-[15px]"><a class="text-white no-underline" href="#home"><?= $home ?></a></li>
                <li class="m-[15px]"><a class="text-white no-underline" href="#about"><?= $aboutUs ?></a></li>
                <li class="m-[15px]"><a class="text-white no-underline" href="#services"><?= $services ?></a></li>
                <li class="m-[15px]"><a class="text-white no-underline" href="#contact"><?= $contact ?></a></li>
            </ul>

            <div class="flex flex-row absolute right-6">
                <button id="newsButton" class="p-2 border rounded-2xl bg-[#f0a500] mr-5 hover:bg-[#F2B631]"><?= $newsAdd ?></button>
                <button id="eventsButton" class="p-2 border rounded-2xl bg-[#f0a500] mr-5 hover:bg-[#F2B631]"><?= $eventsAdd ?></button>
                <button id="activitiesButton" class="p-2 border rounded-2xl bg-[#f0a500] mr-5 hover:bg-[#F2B631]"><?= $myActivities?></button>
                <button id="logOutButton" class="p-2 border rounded-2xl bg-[#f0a500] hover:bg-[red]"><?= $logOut?></button>
            </div>
        </nav>
    </div>

</header>
<div class="bgi opacity-200 ">
    <img class="w-full h-screen object-cover " src="../src/assets/imgs/writer.jpg" alt="asd">
    <div class="overlay"></div>
</div>
<footer class="text-white p-5 text-left fixed bottom-0 w-full">
    <div class="flex justify-around max-w-full m-auto ">
        <div>
            <h3 class="mb-4 text-xl underline underline-offset-2"><a href="./haberler.php"><?= $news ?></a></h3>
            <ul class="list-none no-underline pb-2">
                <li class="list-none no-underline"><?= $newsProduct ?></li>
                <li class="list-none no-underline"><?= $newsSoftware ?></li>
                <li class="list-none no-underline"><?= $newsBultens ?></li>
            </ul>
        </div>
        <div class="footer-section ">
            <h3 class="mb-4 text-xl underline underline-offset-2"><a href="./etkinlikler.php"><?= $events ?></a></h3>
            <ul class="list-none no-underline pb-2">
                <li class="list-none no-underline"><?= $eventsSoftware ?></li>
                <li class="list-none no-underline"><?= $eventsDev ?></li>
                <li class="list-none no-underline"><?= $eventsOnline ?></li>
            </ul>
        </div>
        <div class="pr-28 ">
            <h3 class="mb-4 text-xl underline underline-offset-2"><?= $quicqMenu ?></h3>
            <ul class="list-none no-underline pb-2">
                <li class="list-none no-underline"><?= $home ?></li>
                <li class="list-none no-underline"><?= $aboutUs ?></li>
                <li class="list-none no-underline"><?= $services ?></li>
                <li class="list-none no-underline"><?= $contact ?></li>
            </ul>
            <p class="absolute left-[45%] bottom-2 text-[#f0a500]"><a href="https://www.instagram.com/furkanizci10/profilecard/?igsh=MTc2aXpoY2psYngzZA=="><?= $designed ?></a></p>
        </div>
    </div>
</footer>

<script>
    document.getElementById("newsButton").addEventListener("click", function () {
        window.location.href = "haber-ekleme.php";
    });
    document.getElementById("eventsButton").addEventListener("click", function () {
        window.location.href = "etkinlik-ekleme.php";
    });
    document.getElementById("activitiesButton").addEventListener("click", function () {
        window.location.href = "hareketlerim.php";
    }); document.getElementById("logOutButton").addEventListener("click", function () {
        window.location.href = "../db/logout.php";
    });
</script>
</body>
</html>
