<?php
// Veritabanı bağlantısını dahil et
include('/Applications/XAMPP/xamppfiles/htdocs/first-project/db/db.php');

// Haberleri veritabanından çekme sorgusu
$sorgu = "SELECT id, baslik, haber, kategori FROM news";
$data = $deneme->query($sorgu);

// Sorgu hatasını kontrol et
if (!$data) {
    die("Sorgu hatası: " . $deneme->error);
}

// Bağlantı kontrolü
if (!$deneme) {
    die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
} else {
    echo "<div style='padding: 0px 95px; margin-top: 10px;'> Bağlantı başarılı</div>";
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
                <a href ='../crud/update.php?id=" . $row ['id'] . "'>Güncelle</a>

            </div>
        </div>";
    }
} else {
    echo "<div style='padding: 0px 95px;'>Hiç haber bulunamadı.</div>";
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
