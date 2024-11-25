<?php   include('../db/db.php'); ?>
<!doctype html>
<?php

include('../db/data.php');
$header_activities='../src/components/header-hareketlerim.php';
?>

<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../plugins/node_modules/tailwindcss/tailwind.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../src/components/loading/loading.css">
    <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hareketlerim</title>
    <link rel="stylesheet" href="../src/components/loading/loading.css">



    <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">


</head>
<body class="h-full w-full  overflow-hidden bg-orange-50">
<div id="loading"  class="loader loader-index w-full h-full"></div>
<div class="absolute z-50 w-full top-0 left-0 bg-transparent text-white">
    <?php

    include $header_activities;
    ?>
</div>
<div class="bgi opacity-100">
    <img class="w-full h-screen object-cover " src="../src/assets/imgs/activities.png" alt="asd">
    <div class="overlay"></div>
</div>





























<script>
    window.addEventListener("load", () => {
        const loader = document.querySelector(".loader");
        loader.classList.add("loader--hidden");
        loader.addEventListener("transitionend", () => {
            document.body.removeChild(loader);
        });
    });
</script>
<div class="absolute z-50 w-full bottom-0 left-0 bg-transparent text-[white]">
    <?php
    $footer='../src/components/footer.php';
    include $footer;

    ?>
</div>
</body>
</html>