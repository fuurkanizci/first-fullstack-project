
<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
include('../../db/db.php');
include('../../db/data.php');
?>


<header>
    <div class="bg-transparent text-neutral-300 box-border  ">

        <nav class="flex justify-center items-center p-5">


            <div class="flex flex-row justify-center items-center text-xl">
                <button id="homeButton" class="p-2 border border-0   rounded-2xl  mr-5 hover:bg-[#00FF0028] color"><?= $home ?></button>
                <button id="newsAddButton" class="p-2 border border-0   rounded-2xl  mr-5 hover:bg-[#00FF0028] color"><?= $newsAdd ?></button>
                <button id="eventsAddButton" class="p-2 border border-0 rounded-2xl  mr-5 hover:bg-[#00FF0028] "><?= $eventsAdd ?></button>
                <button id="activitiesButton" class="p-2 border border-0 rounded-2xl  mr-5 hover:bg-[#00B9FF45] "><?= $myActivities?></button>
                <button id="eventsButton" class="p-2 border border-0 rounded-2xl  mr-5 hover:bg-[#00B9FF45] "><?= $events?></button>
                <button id="newsButton" class="p-2 border border-0 rounded-2xl  mr-5 hover:bg-[#00B9FF45] "><?= $news?></button>
                <a id="logOutButton"  class=" p-2 border border-1 border-white hover:border-[red] rounded-full hover:bg-[#FF000028] absolute top-4 right-4"><img src='../src/assets/icos/logout.png'alt='add'/></a>
            </div>
        </nav>
    </div>

</header>


<script>
    document.getElementById("homeButton").addEventListener("click", function () {
        window.location.href = "index.php";
    });
    document.getElementById("newsAddButton").addEventListener("click", function () {
        window.location.href = "haber-ekleme.php";
    });
    document.getElementById("eventsAddButton").addEventListener("click", function () {
        window.location.href = "etkinlik-ekleme.php";
    });
    document.getElementById("activitiesButton").addEventListener("click", function () {
        window.location.href = "hareketlerim.php";
    });
    document.getElementById("eventsButton").addEventListener("click", function () {
        window.location.href = "etkinlikler.php";
    });
    document.getElementById("newsButton").addEventListener("click", function () {
        window.location.href = "haberler.php";
    });document.getElementById("logOutButton").addEventListener("click", function () {
        if (confirm('Çıkmak İstediğine Emin Misin ?')) {
            window.location.href = "../db/logout.php";
        }
        return false;
    });


</script>
