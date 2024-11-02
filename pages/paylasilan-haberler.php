<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../plugins/node_modules/tailwindcss/tailwind.css">
    <link rel="stylesheet" href="style.css">
    <title>Haberlerim</title>
    <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../src/components/loading/loading.css">
</head>
<body class="bg-orange-50">
<div class="flex flex-row justify-center items-center text-3xl justify-evenly">
    <div class="anim-head"><a class=" " href="./index.php">Anasayfa</a>
    </div>
    <div class="anim-head"><a class=" " href="./hareketlerim.php">Hareketlerim</a>
    </div>
    <div class="anim-head"><a class=" " href="./paylasilan-etkinlikler.php">Paylaşılan Etkinlikler</a>
    </div>
    <div class="anim-head"><a  href="./begeniler.php">Beğenilerim</a>
    </div>
    <div class="anim-head"><a class=" " href="./yorumlar.php">Yorumlarım</a>
    </div>

</div>

<div id="loading" class="loader loader-index"></div>

<form id="silForm" method="post" action="../db/crud/delete.php">
    <?php
    include('../db/db.php');

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
                <hr class='mt-4 color-black border-1 h-[2px] bg-black'>
            </div>";
        }
    } else {
        echo "<div class='p-4'>Herhangi bir haber bulunamadı.</div>";
    }

    echo "<a class='' href='./haber-ekleme.php'><img src='../src/assets/icos/plus.png' class='absolute top-4 right-4 border border-green-500 p-3 rounded-full hover:bg-green-500' alt='add'/></a>";
    ?>

    <button id='topluSilme' type='submit' name='sil' class='mt-4 p-2 bg-red-600 text-white rounded' disabled>Seçili Haberleri Sil</button>
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

    // Form gönderiminden önce kontrol yap
    document.getElementById("silForm").onsubmit = function(event) {
        const checkboxes = document.querySelectorAll('.news-checkbox');
        let isChecked = false;

        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                isChecked = true;
            }
        });

        if (!isChecked) {
            button.disabled = !isChecked;
            event.preventDefault(); // Formun gönderilmesini engelle
        } else {
            // Kullanıcıdan onay al
            return confirm('Seçili haberleri silmek istediğinize emin misiniz?');
        }
    };
</script>
</body>
</html>
