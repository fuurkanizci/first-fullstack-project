<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beğeniler</title>
    <script src="../plugins/js/jquery.timeago.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../plugins/node_modules/tailwindcss/tailwind.css">
    <link rel="stylesheet" href="../pages/style.css">
    <link rel="stylesheet" href="../src/components/loading/loading.css">
    <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
</head>
<body class="bg-orange-50">
<!---->
<!--<nav class="relative px-4 py-4 flex justify-between items-center">-->
<!--    <div class="lg:hidden">-->
<!--        <button id="navbar-burger" class="navbar-burger flex items-start text-[#f0a500] p-3">-->
<!--            <svg class="block h-6 w-6 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">-->
<!--                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>-->
<!--            </svg>-->
<!--        </button>-->
<!--    </div>-->
<!--    <ul id="navbar-menu" class="hidden absolute mt-6 top-1/2 left-1/2 gap-12 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">-->
<!--        <li><a class="text-3xl text-black hover:text-[#f0a500]" href="./index.php">Ana Sayfa</a></li>-->
<!--        <li><a class="text-3xl text-black hover:text-[#f0a500]" href="./hareketlerim.php">Hareketlerim</a></li>-->
<!--        <li><a class="text-3xl text-black hover:text-[#f0a500]" href="./paylasilan-haberler.php">Paylaşılan Haberler</a></li>-->
<!--        <li><a class="text-3xl text-black hover:text-[#f0a500]" href="./paylasilan-etkinlikler.php">Paylaşılan Etkinlikler</a></li>-->
<!--        <li><a class="text-3xl text-black hover:text-[#f0a500]" href="./yorumlar.php">Yorumlarım</a></li>-->
<!--        <li>-->
<!--            <a id="logOutButton" class="p-2 border-none hover:border-[red] rounded-full hover:text-[#ff0000] hover:bg-[#FF000028]">-->
<!--                <i class="fa-solid fa-right-from-bracket"></i>-->
<!--            </a>-->
<!--        </li>-->
<!--    </ul>-->
<!--</nav>-->
<!---->
<!--<div class="navbar-menu relative z-50 hidden">-->
<!--    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>-->
<!--    <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-orange-50 border-r overflow-y-auto">-->
<!--        <div class="flex items-center mb-8">-->
<!--            <button id="navbar-close" class="navbar-close">-->
<!--                <svg class="h-6 w-6 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
<!--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>-->
<!--                </svg>-->
<!--            </button>-->
<!--        </div>-->
<!--        <div>-->
<!--            <ul>-->
<!--                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded" href="./index.php">Ana Sayfa</a></li>-->
<!--                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded" href="./hareketlerim.php">Hareketlerim</a></li>-->
<!--                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded" href="./paylasilan-haberler.php">Paylaşılan Haberler</a></li>-->
<!--                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded" href="./paylasilan-etkinlikler.php">Paylaşılan Etkinlikler</a></li>-->
<!--                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded" href="./yorumlar.php">Yorumlarım</a></li>-->
<!--                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded" href="../db/logout.php">Çıkış</a></li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </nav>-->
<!--</div>-->

<?php
include('../db/db.php'); // Veritabanı bağlantısı

// Kullanıcının oturum bilgilerini al
$userId = $_SESSION['user']['id'];

// Kullanıcının beğenilerini sorgula
$sorgu = "SELECT * FROM likes WHERE user_id=$userId";
$data = $deneme->query($sorgu);

// Beğeni varsa göster
if ($data->num_rows > 0) {
    while ($row = $data->fetch_assoc()) {
        if ($row['events_id'] != null) {
            // Etkinlik bilgilerini getir
            $eventId = $row['events_id'];
            $eventShow = "SELECT * FROM events WHERE id=$eventId";
            $dataEventShow = $deneme->query($eventShow);
            $events = $dataEventShow->fetch_assoc();

            // Etkinlik bilgilerini ekrana yazdır
            echo "<div style='padding: 0px 95px;' class='px-[30rem] text-black'>
                <div style='height: 10px;'></div>
                <div class='text-xl'><p class='text-2xl mb-2'>Etkinlik </p> " . htmlspecialchars($events['kategori']) . "</div>
                <div style='height: 10px;'></div>
                <div class='mt-5'>
                    <a href='../db/crud/delete-likes.php?id=" . $row['id'] . "' class='p-2 border border-0 rounded-2xl text-red-600 mr-5 hover:bg-[#ff0000ab] hover:text-black'>Sil</a>
                    <hr class='mt-4'>
                </div>
            </div>";
        }
        if ($row['news_id'] != null) {
            // Haber bilgilerini getir
            $newsId = $row['news_id'];
            $newsShow = "SELECT * FROM news WHERE id=$newsId";
            $dataNewsShow = $deneme->query($newsShow);
            $news = $dataNewsShow->fetch_assoc();

            // Haber bilgilerini ekrana yazdır
            echo "<div style='padding: 0px 95px;' class='px-[30rem] text-black'>
                <div style='height: 10px;'></div>
                <div class='text-xl'><p class='text-2xl mb-2'>Haber </p> " . htmlspecialchars($news['haber']) . "</div>
                <div style='height: 10px;'></div>
                <div class='mt-5'>
                    <a href='../db/crud/delete-likes.php?id=" . $row['id'] . "' class='p-2 border border-0 rounded-2xl text-red-600 mr-5 hover:bg-[#ff0000ab] hover:text-black'>Sil</a>
                    <hr class='mt-4'>
                </div>
            </div>";
        }
    }
} else {
    // Kullanıcının beğenisi yoksa mesaj göster
    echo "<div class='px-[30rem] text-black'>Henüz beğenilen hiçbir içerik yok.</div>";
}
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#navbar-burger').click(function() {
            $('.navbar-menu').toggleClass('hidden');
        });

        $('#navbar-close').click(function() {
            $('.navbar-menu').addClass('hidden');
        });
    });
</script>

</body>
</html>
