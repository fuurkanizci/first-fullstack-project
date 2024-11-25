<?php
include('../db/db.php');
include('../db/data.php');
$header = '../src/components/header.php';
$footer = '../src/components/footer.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Haber & Etkinlik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../plugins/node_modules/tailwindcss/tailwind.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../src/components/loading/loading.css">
    <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
</head>

<body class="h-full w-full  overflow-hidden bg-orange-50">
<div class="absolute z-50 w-full top-0 left-0 bg-transparent text-white">
    <?php

    include $header;
    ?>
</div>
<?php

if (isset($_SESSION['user']['name'])) {
    echo '
<div class="fixed top-5 right-4 text-3xl text-black z-50 border rounded-full p-3 bg-white w-auto inline-flex 
            max-lg:top-4 max-lg:right-4 max-lg:text-lg max-lg:text-end max-lg:border max-lg:w-auto">
       ' . htmlspecialchars($_SESSION['user']['name']) . '
    </div>';

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


<div class="bgi opacity-200 ">
    <img class="w-full h-screen object-cover " src="../src/assets/imgs/writer.jpg" alt="asd">
    <div class="overlay"></div>
</div>

<div class="absolute z-50 w-full bottom-0 left-0 bg-transparent text-[white]">
    <?php
    include $footer;

    ?>
</div>
</body>
</html>
