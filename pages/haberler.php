<link rel="stylesheet" href="../loading/loading.css">
<title>Haberler</title>
<link rel="shortcut icon" href="../assets/icos/favicon.ico" type="image/x-icon">
<!-- Spinner -->
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
// Veritabanı bağlantısını dahil et
include('/Applications/XAMPP/xamppfiles/htdocs/first-fullstack-project/db/db.php');

// Haberleri veritabanından çekme sorgusu
$sorgu = "SELECT id, baslik, haber, kategori FROM news";
$data = $deneme->query($sorgu);

// Sorgu hatasını kontrol et
if (!$data) {
    die("Sorgu hatası: " . $deneme->error);
}


// Veritabanından haberleri çekme ve ekrana yazdırma
if ($data->num_rows > 0) {
    while ($row = $data->fetch_assoc()) {
        echo "<div style='padding: 0px 95px;'>
            <div style='font-weight: bold; font-size: 20px;'>" . $row['id'] . " - " . htmlspecialchars($row['baslik']) . "</div>
            <div style='height: 10px;'></div>
            <div>" . htmlspecialchars($row['haber']) . "</div>
            <div style='height: 10px;'></div>
            <div style='color: gray;'>" . htmlspecialchars($row['kategori']) . "</div>
            <div style='height: 20px;'></div>
            <div>
                <a href = '../crud/delete.php?id=" . $row['id'] . "' style='color: red;'>Sil</a>
                <a href ='./update-from.php?id=" . $row ['id'] . "'>Güncelle</a>

            </div>
        </div>";
    }
} else {

    echo "<div style='padding: 0px 95px;'>Hiç haber bulunamadı.</div>";
    echo "<div style='padding: 0px 95px;'><a href='./haber-ekleme.php '>Eklemek İçin Tıklayın.</a></div>";
}

// Veritabanı bağlantısını kapatma
$deneme->close();
?>

<!-- Diğer sayfalara yönlendirme linkleri -->
<div style='align-items: center; font-size: large; justify-content: center; color: red; '>
    <a href="./etkinlikler.php">Etkinlikler</a>
</div>
<div style='align-items: center; font-size: large; justify-content: center; '>
    <a href="./index.php">Anasayfa</a>
</div>
