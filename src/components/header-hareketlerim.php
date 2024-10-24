
<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
include('../../db/db.php');
include('../../db/data.php');
?>


<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="../../plugins/node_modules/tailwindcss/tailwind.css">
<header>
    <div class="bg-transparent text-white box-border  ">

        <nav class="flex justify-center items-center p-5">


            <div class="flex flex-row justify-center items-center ">
                <button id="homeButton" class="p-2 border border-0   rounded-2xl  mr-5 hover:bg-[#00FF0028] color"><?= $home ?></button>

               <button id="newsButton" class="p-2 border border-0 rounded-2xl  mr-5 hover:bg-[#00FF0028] "><?= $publishedNews ?></button>
                <button id="eventsButton" class="p-2 border border-0   rounded-2xl  mr-5 hover:bg-[#00FF0028] color"><?= $publishedEvent ?></button>
                <button id="begenilerButton" class="p-2 border border-0 rounded-2xl  mr-5 hover:bg-[#00B9FF45] "><?= $likes?></button>
                <button id="yorumlarButton" class="p-2 border border-0 rounded-2xl  mr-5 hover:bg-[#00B9FF45] "><?= $comments?></button>
                <a id="logOutButton"  class="p-2 border border-1 border-white hover:border-[red] rounded-full hover:bg-[#FF000028] absolute top-4 right-4"><img src='../src/assets/icos/logout.png'alt='add'/></a>

            </div>
        </nav>
    </div>

</header>


<script>
    document.getElementById("homeButton").addEventListener("click", function () {
        window.location.href = "index.php";
    });
    document.getElementById("newsButton").addEventListener("click", function () {
        window.location.href = "paylasilan-haberler.php";
    });
    document.getElementById("eventsButton").addEventListener("click", function () {
        window.location.href = "paylasilan-etkinlikler.php";
    });
    document.getElementById("begenilerButton").addEventListener("click", function () {
        window.location.href = "begeniler.php";
    });
    document.getElementById("yorumlarButton").addEventListener("click", function () {
        window.location.href = "yorumlar.php";
    });document.getElementById("logOutButton").addEventListener("click", function () {
        if (confirm('Çıkmak İstediğine Emin Misin ?')) {
            window.location.href = "../db/logout.php";
        }
        return false;
    });


</script>
