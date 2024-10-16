<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<?php
include('../../db/db.php');
include('../../db/data.php');
$header='../src/components/header.php';
$footer='../src/components/footer.php';
?>
<?php
include $header;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CFG</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../../plugins/node_modules/tailwindcss/tailwind.css">
    <link rel="stylesheet" href="../../pages/style.css">
    <link rel="stylesheet" href="../components/loading/loading.css">
    <link rel="shortcut icon" href="../assets/icos/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../assets/icos/favicon.ico" type="image/x-icon">
</head>

<body class="h-full w-full font-serif overflow-hidden bg-orange-50">


<div id="loading" class="loader loader-index"></div>














<?php
include $footer;

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