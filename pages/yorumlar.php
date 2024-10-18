<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yorumlarım</title>
</head>
<body>
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
$sorgu = "SELECT news_id, events_id, comment FROM comments";
$data = $deneme->query($sorgu);

if ($data->num_rows > 0) {
    while ($row = $data->fetch_assoc()) {
        echo "<div style='padding: 0px 95px;' class='px-[30rem] text-black'>
        <div >"  . $row['news_id'] . "</div>
         <div style='height: 10px;'></div>
        <div>" . $row['events_id'] . "</div>
        <div style='height: 10px;'></div>
        <div>" . $row['comment'] . "</div>
        
        <div style='height: 10px;'></div>
        <div >" . $row['kategori'] . "</div>
        
        <a href = '../db/crud/deletee.php?id=" . $row['id'] . "' class='p-2 border border-0   rounded-2xl text-red-600 mr-5 hover:bg-[#ff0000ab]  hover:text-black' >Sil</a>
                <a href ='updatee-from.php?id=" . $row ['id'] . "'class='p-2 border border-0   rounded-2xl text-green-600 mr-5 hover:bg-[#11a411b0]  hover:text-black mb-3 ' >Güncelle</a>
                <hr class='mt-4'>
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
</body>
</html>