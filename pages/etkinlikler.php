<?php
include('/Applications/XAMPP/xamppfiles/htdocs/first-project/db/db.php');

// Veritabanından haberleri çekme
$sorgu = "SELECT id, baslik, icerik, kategori FROM events";
$data = $deneme->query($sorgu);

if ($data->num_rows > 0) {
    // output data of each row
    while ($row = $data->fetch_assoc()) {
        echo "<div style='padding: 0px 95px;'>
        <div style='font-weight: bold; font-size: 20px;'>" . $row['id'] . " " . $row['baslik'] . "</div>
        <div style='height: 10px;'></div>
        <div>" . $row['icerik'] . "</div>
        <div style='height: 10px;'></div>
        <div style='color: gray;'>" . $row['kategori'] . "</div>
        <a href = '../crud/deletee.php?id=" . $row['id'] . "' style='color: red;'>Sil</a>
                <a href ='../crud/update.php?id=" . $row ['id'] . "'>Güncelle</a>
      </div>";

    }
} else {
    echo "0 results";
}
if (!$deneme) {
    echo "Connection failed: " . mysqli_connect_error();
} else {
    echo "<div style='padding: 0px 95px; margin-top: 10px;'> Connected successfully</div>";
}
// Sorgu hatasını kontrol et
if (!$sorgu) {
    die("Sorgu hatası: " . mysqli_error($deneme));
}

// Haberleri ekrana yazdırma

?>
<div style='align-items: center; font-size: large; justify-content: center; color: red; '><a href="./haberler.php">Haberler</a>
</div>,
<div style='align-items: center; font-size: large; justify-content: center; '><a href="./index.php">Anasayfa</a>
</div>