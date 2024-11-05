<?php include('../db/db.php'); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Haberlerim</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../plugins/fontawesome-free-6.6.0-web/css/fontawesome.css">
    <link rel="stylesheet" href="../plugins/fontawesome-free-6.6.0-web/css/solid.min.css">
    <link rel="stylesheet" href="../plugins/node_modules/tailwindcss/tailwind.css">
    <link rel="stylesheet" href="style.css">

    <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../src/components/loading/loading.css">
</head>
<body class="bg-orange-50">

<div id="loading" class="loader loader-index"></div>
<nav class="relative px-4 py-4 flex justify-between items-center ">
    <div class="lg:hidden">
        <button class="navbar-burger flex items-start text-[#f0a500] p-3">
            <svg class="block h-6 w-6 fill-current " viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Mobile menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
    </div>
    <ul class=" burger-width justify-center my-12 pb-12 hidden absolute  top-1/2 left-1/2  gap-12 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
        <li><a class="text-3xl text-black  hover:text-[#f0a500]" href="./index.php">Ana Sayfa</a></li>
        <li><a class="text-3xl text-black  hover:text-[#f0a500]" href="./hareketlerim.php">Hareketlerim</a></li>
        <li><a class="text-3xl text-black  hover:text-[#f0a500]" href="./paylasilan-etkinlikler.php">Paylaşılan
                Etkinlikler</a></li>
        <li><a class="text-3xl text-black  hover:text-[#f0a500]" href="./begeniler.php">Beğendiklerim</a></li>
        <li><a class="text-3xl text-black  hover:text-[#f0a500]" href="./yorumlar.php">Yorumlarım</a></li>
        <a id="logOutButton"
           class="  p-2  text-3xl border-none hover:border-[red] rounded-full hover:text-[#ff0000] hover:bg-[#FF000028]">
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>
    </ul>
</nav>
<div class="navbar-menu relative z-50 hidden">
    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
    <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-orange-50 border-r overflow-y-auto">
        <div class="flex items-center mb-8">
            <button class="navbar-close">
                <svg class="h-6 w-6 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div>
            <ul>
                <li class="mb-1"><a
                            class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded"
                            href="./index.php">Ana Sayfa</a></li>
                <li class="mb-1"><a
                            class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded"
                            href="./hareketlerim.php">Hareketlerim</a></li>
                <li class="mb-1"><a
                            class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded"
                            href="./paylasilan-etkinlikler.php">Paylaşılan Etkinlikler</a></li>
                <li class="mb-1"><a
                            class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded"
                            href="./begeniler.php">Beğendiklerim</a></li>
                <li class="mb-1"><a
                            class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded"
                            href="./yorumlar.php">Yorumlarım</a></li>
                <li class="mb-1"><a
                            class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded"
                            href="../db/logout.php">Çıkış</a></li>
            </ul>
        </div>
    </nav>
</div>


<form class="mt-12" id="silForm" method="post" action="../db/crud/delete.php">
    <?php


    $userId = $_SESSION['user']['id'];
    $sorgu = "SELECT * FROM news WHERE user_id='$userId'";
    $data = $deneme->query($sorgu);

    if ($data && $data->num_rows > 0) {
        while ($row = $data->fetch_assoc()) {
            echo "<div style='padding: 0px 95px;'>
                <div style='font-weight: bold; font-size: 20px;'>" . htmlspecialchars($row['baslik']) . "</div>
                <div style='height: 10px;'></div>
                <div>" . htmlspecialchars($row['haber']) . "</div>
                <div style='height: 10px;'></div>
                <div style='color: gray;'>" . htmlspecialchars($row['kategori']) . "</div>
                
                <input type='checkbox' class='news-checkbox' name='news_ids[]' value='" . htmlspecialchars($row['id']) . "'>
                <a href='../db/crud/delete.php?id=" . htmlspecialchars($row['id']) . "' class='p-2 border border-0 rounded-2xl text-red-600 mr-5 hover:bg-[#ff0000ab] hover:text-black'>Sil</a>
                <a href='update-form.php?id=" . htmlspecialchars($row['id']) . "' class='p-2 border border-0 rounded-2xl text-green-600 mr-5 hover:bg-[#11a411b0] hover:text-black mb-3'>Güncelle</a>
                <hr class='mt-4      '>
            </div>";
        }
    } else {
        echo "<div class='p-4'>Herhangi bir haber bulunamadı.</div>";
    }

    echo "<a class='' href='./haber-ekleme.php'><img src='../src/assets/icos/plus.png' class='absolute top-4 right-4 border border-green-500 p-3 rounded-full hover:bg-green-500' alt='add'/></a>";
    ?>

    <div class="flex flex-row justify-center">
        <button id='topluSilme' type='submit' name='sil'  class="p-2  rounded-2xl text-red-600 bg-red-100 hover:bg-red-200" disabled>Seçili
            Haberleri Sil
        </button>
    </div>
</form>

<script>
    window.addEventListener("load", () => {
        const loader = document.querySelector(".loader");
        loader.classList.add("loader--hidden");
        loader.addEventListener("transitionend", () => {
            document.body.removeChild(loader);
        });
    });


    document.querySelectorAll('.news-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', checkCheckboxes);
    });

    function checkCheckboxes() {
        const checkboxes = document.querySelectorAll('.news-checkbox');
        const button = document.getElementById('topluSilme');
        let isChecked = false;

        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                isChecked = true;
            }
        });

        button.disabled = !isChecked;
    }

    document.getElementById("silForm").onsubmit = function (event) {
        const checkboxes = document.querySelectorAll('.news-checkbox');
        let isChecked = false;

        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                isChecked = true;
            }
        });

        if (!isChecked) {
            button.disabled = !isChecked;
            event.preventDefault();
        } else {
            return confirm('Seçili haberleri silmek istediğinize emin misiniz?');
        }
    };
    document.addEventListener('DOMContentLoaded', function () {
        const burger = document.querySelector('.navbar-burger');
        const menu = document.querySelector('.navbar-menu');

        if (burger && menu) {
            burger.addEventListener('click', function () {
                menu.classList.toggle('hidden');
            });
        }

        const closeButtons = document.querySelectorAll('.navbar-close, .navbar-backdrop');
        closeButtons.forEach(close => {
            close.addEventListener('click', function () {
                menu.classList.add('hidden');
            });
        });

        document.getElementById("logOutButton").addEventListener("click", function () {
            if (confirm('Çıkmak İstediğine Emin Misin ?')) {
                window.location.href = "../db/logout.php";
            }
            return false;
        });
    });
</script>
</body>
<div class="absolute z-50 w-full bottom-0 left-0 bg-transparent text-[white]">
    <?php
    $footer='../src/components/footer.php';
    include $footer;

    ?>
</div>
</html>
