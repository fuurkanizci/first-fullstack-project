<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../plugins/node_modules/tailwindcss/tailwind.css">
    <link rel="stylesheet" href="style.css">
    <title>Etkinlikler</title>
    <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../src/components/loading/loading.css">
</head>

<body class="bg-orange-50">

<div class="flex flex-row justify-center items-center text-3xl justify-evenly">
    <div class="anim-head"><a class=" " href="./index.php">Anasayfa</a>
    </div>
    <div class="anim-head"><a class=" " href="./hareketlerim.php">Hareketlerim</a>
    </div>
    <div class="anim-head"><a class=" " href="./paylasilan-haberler.php">Paylaşılan Haberler</a>
    </div>
    <div class="anim-head"><a class=" " href="./yorumlar.php">Yorumlarım</a>
    </div>
    <div class="anim-head"><a class=" " href="./begeniler.php">Beğenilerim</a>
    </div>

</div>
<div id="loading" class="loader loader-index"></div>

<form id="silForm" method="post" action="../db/crud/deletee.php">

<?php
    include('../db/db.php');
    session_start();
    $userId = $_SESSION['user']['id'];
    $sorgu = "SELECT * FROM events WHERE user_id='$userId'";
    $data = $deneme->query($sorgu);

    if ($data && $data->num_rows > 0) {
        while ($row = $data->fetch_assoc()) {
            echo "<div style='padding: 0px 95px;' class='px-[30rem]'>
                    <div style='font-weight: bold; font-size: 20px;'>" . htmlspecialchars($row['baslik']) . "</div>
                    <div style='height: 10px;'></div>
                    <div>" . htmlspecialchars($row['icerik']) . "</div>
                    <div style='height: 10px;'></div>
                    <div style='color: gray;'>" . htmlspecialchars($row['kategori']) . "</div>
                    <input type='checkbox' class='event-checkbox' name='events_ids[]' value='" . htmlspecialchars($row['id']) . "' onchange='checkCheckboxes()'>
                    <a href='../db/crud/deletee.php?id=" . htmlspecialchars($row['id']) . "&type=event' class='p-2 border border-0 rounded-2xl text-red-600 mr-5 hover:bg-[#ff0000ab] hover:text-black'>Sil</a>
                    <a href='updatee-from.php?id=" . htmlspecialchars($row['id']) . "' class='p-2 border border-0 rounded-2xl text-green-600 mr-5 hover:bg-[#11a411b0] hover:text-black mb-3'>Güncelle</a>
                    <hr class='mt-4 color-black border-1 h-[2px] bg-black'>
                </div>";
        }
    } else {
        echo "<div class='p-4'>Herhangi bir etkinlik bulunamadı.</div>";
    }
    ?>

    <button id='topluSilme' type='submit' name='sil' class='mt-4 p-2 bg-red-600 text-white rounded' disabled>Seçili Etkinlikleri Sil</button>
</form>

<a class='' href='./etkinlik-ekleme.php'>
    <img src='../src/assets/icos/plus.png' class='absolute top-4 right-4 border border-green-500 p-3 rounded-full hover:bg-green-500' alt='add'/>
</a>

<script>
    window.addEventListener("load", () => {
        const loader = document.querySelector(".loader");
        loader.classList.add("loader--hidden");
        loader.addEventListener("transitionend", () => {
            document.body.removeChild(loader);
        });
    });

    function checkCheckboxes() {
        const checkboxes = document.querySelectorAll('.event-checkbox');
        const button = document.getElementById('topluSilme');
        let isChecked = false;

        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                isChecked = true;
            }
        });

        button.disabled = !isChecked;
    }
    document.getElementById("silForm").onsubmit = function(event) {
        const checkboxes = document.querySelectorAll('.event-checkbox');
        let isChecked = false;

        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                isChecked = true;
            }
        });

        if (!isChecked) {
            alert('Seçili etkinlik yok. Lütfen silmek için en az bir etkinlik seçin.');
            event.preventDefault();
        } else {
            // Kullanıcıdan onay al
            return confirm('Seçili etkinlikleri silmek istediğinize emin misiniz?');
        }
    };
</script>
</body>
</html>
