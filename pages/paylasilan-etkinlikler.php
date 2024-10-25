<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../plugins/node_modules/tailwindcss/tailwind.css">
    <link rel="stylesheet" href="style.css">
    <title> Etkinlikler </title>
    <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="../src/components/loading/loading.css">
</head>

<body class="bg-orange-50 ">

<div class="flex flex-row justify-center items-center text-3xl justify-evenly">
    <div ><a class="anim text-black" href="./paylasilan-haberler.php">Haberler</a>
    </div>
    <div ><a class="anim text-black" href="./index.php">Anasayfa</a>
    </div>
</div>




<div id="loading"  class="loader loader-index"></div>


<?php
include('../db/db.php');
$header='../src/components/header.php';
$userId = $_SESSION['user']['id'];
$sorgu = "SELECT * FROM events where user_id='$userId'";
$data = $deneme->query($sorgu);

if ($data->num_rows > 0) {
    while ($row = $data->fetch_assoc()) {
        echo "<div style='padding: 0px 95px;' class='px-[30rem]'>
        <div style='font-weight: bold; font-size: 20px;'>"  . $row['baslik'] . "</div>
        <div style='height: 10px;'></div>
        <div>" . $row['icerik'] . "</div>
        <div style='height: 10px;'></div>
        <div style='color: gray;'>" . $row['kategori'] . "</div>
        
        <a href = '../db/crud/deletee.php?id=" . $row['id'] . "' class='p-2 border border-0   rounded-2xl text-red-600 mr-5 hover:bg-[#ff0000ab]  hover:text-black' >Sil</a>
                <a href ='updatee-from.php?id=" . $row ['id'] . "'class='p-2 border border-0   rounded-2xl text-green-600 mr-5 hover:bg-[#11a411b0]  hover:text-black mb-3 ' >Güncelle</a>
            <hr class='mt-4 color-black border-1 h-[2px] bg-black'>
      </div>";


    }


}


echo "<a class='' href='./etkinlik-ekleme.php' ><img src='../src/assets/icos/plus.png' class='absolute top-4 right-4 border border-green-500 p-3 rounded-full hover:bg-green-500' alt='add'/></a>";
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