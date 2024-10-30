<?php
session_start();

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

<div class="flex flex-row justify-center bg-transparent items-center text-3xl justify-evenly z-[1000] relative mt-4">
    <div><a class="anim text-white" href="">Anasayfa</a></div>
    <div><a class="anim text-white" href="./paylasilan-haberler.php">Paylaştığım Haberler</a></div>
    <div><a class="anim text-white" href="./paylasilan-etkinlikler.php">Paylaştığım Etkinlikler</a></div>
    <div><a class="anim text-white" href="./begeniler.php">Beğenilerim</a></div>
    <div><a class="anim text-white" href="./yorumlar.php">Yorumlarım</a></div>
    <a id="logOutButton" class="p-2 border border-1 border-white hover:border-[red] rounded-full hover:text-[#ff0000] hover:bg-[#FF000028] absolute top-4 right-4 z-50">
        <i class="fa-solid fa-right-from-bracket"></i>
    </a>
</div>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("logOutButton").addEventListener("click", function () {
            if (confirm('Çıkmak İstediğine Emin Misin ?')) {
                window.location.href = "../db/logout.php";
            }
        });
    });
</script>
