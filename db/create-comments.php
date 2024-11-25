<?php      include('../db/db.php');  ?>

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
error_reporting(E_ALL);
ini_set('display_errors', 1);


$id = $_POST['id'] ?? null;
$type = $_POST['type'] ?? null;
$yorum = $_POST['yorum'] ?? null;

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

if ($type == 'haber') {
    if (mysqli_query($deneme, "INSERT INTO comments(user_id, news_id, comment, created_at) 
        VALUES(" . $_SESSION['user']['id'] . ", '" . $id . "', '" . htmlspecialchars($yorum) . "', NOW())")) {
        echo "Yorum başarıyla eklendi.";
        header("Location: ../pages/haberler.php");
        exit;
    } else {
        die("Hata: Kayıt işlemi gerçekleşmedi.");
    }
} elseif ($type == 'etkinlik') {
    if (mysqli_query($deneme, "INSERT INTO comments(user_id, events_id, comment, created_at) 
        VALUES(" . $_SESSION['user']['id'] . ", '" . $id . "', '" . htmlspecialchars($yorum) . "', NOW())")) {
        echo "Yorum başarıyla eklendi.";
        header("Location: ../pages/etkinlikler.php");
        exit;
    } else {
        die("Hata: Kayıt işlemi gerçekleşmedi.");
    }
}

$deneme->close();
?>

</body>
</html>
