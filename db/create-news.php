<?php
session_start();
include 'db.php';
include "mail.php";

if (!isset($_SESSION["user"])) {
    die("Kullanıcı oturumu açık değil.");
}

$newsTitle = $_POST["haber_basligi"] ?? null;
$newsAbout = $_POST["haber_konusu"] ?? null;
$new = $_POST["haber"] ?? null;
$userId = $_SESSION["user"]['id'];
if (isset($_POST["submit"]) && $newsTitle && $newsAbout && $new) {
    // Güvenlik için verileri temizle
    $newsTitle = mysqli_real_escape_string($deneme, $newsTitle);
    $newsAbout = mysqli_real_escape_string($deneme, $newsAbout);
    $new = mysqli_real_escape_string($deneme, $new);

    // SQL sorgusu
    $sorgu = "INSERT INTO news (baslik, kategori, haber, user_id) VALUES ('$newsTitle', '$newsAbout', '$new', '$userId')";

    if (mysqli_query($deneme, $sorgu)) {
        mail_gonder("Yeni Haber Eklendi", $newsTitle, $newsAbout, $new, $userId, "furkanizci_10@icloud.com");
        echo "<div>Haber Eklendi, yönlendiriliyorsunuz...</div>";
        header("Refresh:2; ../pages/haberler.php");
    } else {
        die("Hata: " . mysqli_error($deneme));
    }
} else {
    echo "Eksik alanlar var, tüm bilgileri girin.";
}

?>
