
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../plugins/node_modules/tailwindcss/tailwind.css">
    <link rel="stylesheet" href="style.css">
    <title> Yorumlarım </title>

    <script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../src/components/loading/loading.css">
</head>

<body class="bg-orange-50 ">

<div class="flex flex-row justify-center items-center text-3xl justify-evenly">
    <div class="anim"><a class=" text-black " href="./paylasilan-haberler.php">Haberler</a>
    </div>
    <div class="anim"><a class=" text-black" href="./index.php">Anasayfa</a>
    </div>
</div>




<div id="loading"  class="loader loader-index"></div>


<?php
include('../db/db.php');
$userId=$_SESSION['user']['id'];

$header='../src/components/header.php';
$sorgu = "SELECT * FROM comments where user_id=$userId";
$data = $deneme->query($sorgu);

if ($data->num_rows > 0) {
    while ($row = $data->fetch_assoc()) {
        echo "<div style='padding: 0px 95px;' class='px-[30rem] text-black'>
        <div >" .'Haber No:' . $row['news_id'] . "</div>
         <div style='height: 10px;'></div>
        <div>Etkinlik No:" . $row['events_id'] . "</div>
        <div style='height: 10px;'></div>
        <div>Yorum:" . $row['comment'] . "</div>
            
        
        <a href = '../db/crud/delete-comments.php?id=" . $row['id'] . "' class='p-2 border border-0   rounded-2xl text-red-600 mr-5 hover:bg-[#ff0000ab]  hover:text-black' >Sil</a>
                <a href ='./comment-update-form.php?id=" . $row ['id'] . "'class='p-2 border border-0   rounded-2xl text-green-600 mr-5 hover:bg-[#11a411b0]  hover:text-black mb-3 ' >Güncelle</a>
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
    function calcTimeAgo() {
        $('.timeago').each(function () {
            var timeAgo = $.timeago($(this).attr('data-date'));
            $(this).text(timeAgo);
            $(this).removeClass('timeago');
        });
    }
</script>
</body></html>