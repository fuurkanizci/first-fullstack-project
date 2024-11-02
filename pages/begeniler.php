<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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

<div class="flex flex-row justify-center items-center text-3xl justify-evenly mb-6">
    <div class="anim-head"><a class=" " href="./index.php">Anasayfa</a>
    </div>
    <div class="anim-head"><a class=" " href="./hareketlerim.php">Hareketlerim</a>
    </div>
    <div class="anim-head"><a class=" " href="./paylasilan-etkinlikler.php">Paylaşılan Etkinlikler</a>
    </div>
    <div class="anim-head"><a class=" " href="./paylasilan-haberler.php">Paylaşılan Haberler</a>
    </div>
    <div class="anim-head"><a class=" " href="./yorumlar.php">Yorumlarım</a>
    </div>

</div>
<?php

include('../db/db.php');
$userId = $_SESSION['user']['id'];

$sorgu = "SELECT * FROM likes where user_id=$userId";
$data = $deneme->query($sorgu);

if ($data->num_rows > 0) {
    while ($row = $data->fetch_assoc()) {
        if ($row['events_id'] != null) {
            $eventId = $row['events_id'];
            $eventShow = "SELECT * FROM events WHERE id=$eventId";
            $dataEventShow = $deneme->query($eventShow);
            $events = $dataEventShow->fetch_assoc();
            echo "<div style='padding: 0px 95px;' class='px-[30rem] text-black'>

         <div style='height: 10px;'></div>
        <div class='text-xl'><p class='text-2xl mb-2'>Etkinlik </p> " . $events['kategori'] . "</div>
        <div style='height: 10px;'></div>
            
        <div class='mt-5'>
        <a href = '../db/crud/delete-likes.php?id=" . $row['id'] . "' class='p-2 border border-0   rounded-2xl text-red-600 mr-5 hover:bg-[#ff0000ab]  hover:text-black' >Sil</a>
                <hr class='mt-4'>
      </div>
      </div>";
        }
        if ($row['news_id'] != null) {
            $newsId = $row['news_id'];
            $newsShow = "SELECT * FROM news WHERE id=$newsId";
            $dataNewsShow = $deneme->query($newsShow);
            $news = $dataNewsShow->fetch_assoc();

            echo "<div style='padding: 0px 95px;' class='px-[30rem] text-black'>

         <div style='height: 10px;'></div>
        <div class='text-xl'><p class='text-2xl mb-2'>Haber </p> " . $news['haber'] . "</div>
        <div style='height: 10px;'></div>
            
        <div class='mt-5'>
        <a href = '../db/crud/delete-likes.php?id=" . $row['id'] . "' class='p-2 border border-0   rounded-2xl text-red-600 mr-5 hover:bg-[#ff0000ab]  hover:text-black' >Sil</a>
                <hr class='mt-4'>
      </div>
      </div>";
        }


    }
}
?>
<div class="text-black">
    <?php
    include $footer; ?>
</div>


<?php include $cfg; ?>
</body>
</html>