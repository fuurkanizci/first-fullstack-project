<?php
// MySQL'e bağlanma
$deneme = mysqli_connect("127.0.0.1", "root", "", "proje-1-haberler");

// Bağlantı hatası varsa hata mesajını ekrana yazdır
if (!$deneme) {
    die("Veritabanına bağlanılamadı: " . mysqli_connect_error());
}

// UTF-8 karakter setini ayarla
mysqli_set_charset($deneme, "utf8");

?>
