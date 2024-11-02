<?php

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
include('../db/db.php');
include('../db/data.php');
?>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="../plugins/node_modules/tailwindcss/tailwind.css">
<link rel="stylesheet" href="../pages/style.css">
<link rel="stylesheet" href="../plugins/fontawesome-free-6.6.0-web/css/fontawesome.css">
<link rel="stylesheet" href="../plugins/fontawesome-free-6.6.0-web/css/solid.min.css">

<div class="flex flex-row justify-center bg-transparent items-center text-3xl justify-evenly z-[1000] mt-4">
    <div><a class="anim text-white" href="">Anasayfa</a></div>
    <div><a class="anim text-white" href="./haberler.php">Haberler</a></div>
    <div><a class="anim text-white" href="./etkinlikler.php">Etkinlikler</a></div>
    <div><a class="anim text-white" href="./hareketlerim.php">Hareketlerim</a></div>
    <a id="logOutButton" class="p-2 border border-1 border-white hover:border-[red] rounded-full hover:text-[#ff0000] hover:bg-[#FF000028] absolute top-4 right-4">
        <i class="fa-solid fa-right-from-bracket"></i>
    </a>
</div>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("logOutButton").addEventListener("click", function () {
            if (confirm('Çıkmak İstediğine Emin Misin ?')) {
                window.location.href = "../db/logout.php";
            }
            return false;
        });
        document.getElementById("homeButton")?.addEventListener("click", function () {
            window.location.href = "index.php";
        });
        document.getElementById("newsAddButton")?.addEventListener("click", function () {
            window.location.href = "haber-ekleme.php";
        });
        document.getElementById("eventsAddButton")?.addEventListener("click", function () {
            window.location.href = "etkinlik-ekleme.php";
        });
        document.getElementById("activitiesButton")?.addEventListener("click", function () {
            window.location.href = "hareketlerim.php";
        });
        document.getElementById("eventsButton")?.addEventListener("click", function () {
            window.location.href = "etkinlikler.php";
        });
        document.getElementById("newsButton")?.addEventListener("click", function () {
            window.location.href = "haberler.php";
        });
    });
</script>
