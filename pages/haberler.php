<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../src/components/loading/loading.css">
    <title>Haberler</title>
    <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../plugins/node_modules/tailwindcss/tailwind.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-orange-50">
<a class='' href='./haber-ekleme.php' ><img src='../src/assets/icos/plus.png' class='absolute top-4 right-4 border border-green-600 p-3 rounded-full hover:bg-green-500' alt='add'/></a>
<div id="loading"  class="loader loader-index"></div>
<div class="flex flex-row justify-center items-center text-3xl justify-evenly">
    <div ><a class="anim text-black" href="./etkinlikler.php">Etkinlikler</a>
    </div>
    <div ><a class="anim text-black" href="./index.php">Anasayfa</a>
    </div>
</div>

<?php

include('../db/db.php');

$sorgu = "SELECT id, baslik, haber,  FROM news";
$data = $deneme->query($sorgu);

if (!$data) {
    die("Sorgu hatası: " . $deneme->error);
}


if ($data->num_rows > 0) {
    while ($row = $data->fetch_assoc()) {
        echo "<div style='padding: 0px 95px;'>
           <div class='flex flex-row justify-between'>  <div style='font-weight: bold; font-size: 20px;'>" . htmlspecialchars($row['baslik']) . "</div>
    <a href = '.../db/likes.php?id=" . $row['id'] . "' class='p-2 border border-0   rounded-2xl  mr-5 hover:bg-[#ffff00ab]   after:bg-[#ffff00ab]' ><img src='../src/assets/icos/favorite.png' alt='like'></a></div>
            <div style='height: 10px;'></div>
            <div>" . htmlspecialchars($row['haber']) . "</div>
            <div style='height: 10px;'></div>
            <div style='height: 20px;'></div>
            <div>
    <a href = '.../db/comments.php?id=" . $row['id'] . "' class='p-2 border border-0   rounded-2xl ' ><img src='../src/assets/icos/comment.png' alt='comment'></a>
               <hr class='mt-4'>
            </div>
        </div>";

    }

}



?>



<script>
    window.addEventListener("load", () => {
        const loader = document.querySelector(".loader");
        loader.classList.add("loader--hidden");
        loader.addEventListener("transitionend", () => {
            document.body.removeChild(loader);
        });
    });
</script>
</body>
</html>


