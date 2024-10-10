<link rel="stylesheet" href="../loading/loading.css">

<title> Etkinlikler </title>

<link rel="shortcut icon" href="../assets/icos/favicon.ico" type="image/x-icon">

<div id="loading"  class="loader loader-index"></div>
<script>
    window.addEventListener("load", () => {
        const loader = document.querySelector(".loader");
        loader.classList.add("loader--hidden");
        loader.addEventListener("transitionend", () => {
            document.body.removeChild(loader);
        });
    });
</script>
<?php
include('/Applications/XAMPP/xamppfiles/htdocs/first-fullstack-project/db/db.php');

$sorgu = "SELECT id, baslik, icerik, kategori FROM events";
$data = $deneme->query($sorgu);

if ($data->num_rows > 0) {
    while ($row = $data->fetch_assoc()) {
        echo "<div style='padding: 0px 95px;'>
        <div style='font-weight: bold; font-size: 20px;'>"  . $row['baslik'] . "</div>
        <div style='height: 10px;'></div>
        <div>" . $row['icerik'] . "</div>
        <div style='height: 10px;'></div>
        <div style='color: gray;'>" . $row['kategori'] . "</div>
        <a href = '../crud/deletee.php?id=" . $row['id'] . "' style='color: red;'>Sil</a>
                <a href ='./updatee-from.php?id=" . $row ['id'] . "'>Güncelle</a>
      </div>";
        echo "<div style='align-items: center; font-size: large; justify-content: center; color: #003cff; '><a href='./etkinlik-ekleme.php'>EKLEMEK İÇİN TIKLAYIN.</a>";


    }
} else {
    echo "<div style='align-items: center; font-size: large; justify-content: center; color: #003cff; '><a href='./etkinlik-ekleme.php'>EKLEMEK İÇİN TIKLAYIN.</a>";
}


?>
<div style='align-items: center; font-size: large; justify-content: center; color: red; '><a href="./haberler.php">Haberler</a>
</div>,
<div style='align-items: center; font-size: large; justify-content: center; '><a href="./index.php">Anasayfa</a>
</div>
