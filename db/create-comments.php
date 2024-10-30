<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <title>Yorum Oluşturma</title>
</head>
<body>

<?php
// Hata raporlamayı etkinleştir
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('db.php');

// Formdan gelen verileri al
$id = $_POST['id'] ?? null;
$type = $_POST['type'] ?? null;
$yorum = $_POST['yorum'] ?? null;

// Veri kontrolü
if (!$id) {
    echo "ID eksik. Lütfen tekrar deneyin.";
    exit;
}
if (!$type) {
    echo "Yorum tipi eksik. Lütfen tekrar deneyin.";
    exit;
}
if (!$yorum) {
    echo "Yorum boş olamaz. Lütfen tekrar deneyin.";
    exit;
}

// Yorumun nereye yapılacağını kontrol et
if ($type == 'haber') {
    // Haber yorumu ekleme sorgusu
    if (mysqli_query($deneme, "INSERT INTO comments(user_id, news_id, comment, created_at) 
        VALUES(" . $_SESSION['user']['id'] . ", '" . $id . "', '" . htmlspecialchars($yorum) . "', NOW())")) {
        echo "Yorum başarıyla eklendi.";
        header("Refresh:2; ../pages/haberler.php");
        exit; // header'dan sonra çıkış yap
    } else {
        die("Hata: Kayıt işlemi gerçekleşmedi.");
    }
} elseif ($type == 'etkinlik') {
    // Etkinlik yorumu ekleme sorgusu
    if (mysqli_query($deneme, "INSERT INTO comments(user_id, events_id, comment, created_at) 
        VALUES(" . $_SESSION['user']['id'] . ", '" . $id . "', '" . htmlspecialchars($yorum) . "', NOW())")) {
        echo "Yorum başarıyla eklendi.";
        header("Refresh:2; ../pages/etkinlikler.php");
        exit; // header'dan sonra çıkış yap
    } else {
        die("Hata: Kayıt işlemi gerçekleşmedi.");
    }
}

// Bağlantıyı kapat
$deneme->close();
?>

</body>
</html>
