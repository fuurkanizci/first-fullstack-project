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

include('db.php');
$id = $_POST['id'] ?? null;
$type = $_POST['type'] ?? null;
$reyply = $_POST['reply_comment'] ?? null;
$created_at = $_POST['created_at'] ?? null;

if (!$id || (!$type && !$reyply)) {
    echo "Geçersiz veri. Lütfen tekrar deneyin.";
    exit;
}
if ($type && !empty($type) && $type == 'haber') {
    if(mysqli_query($deneme, "INSERT INTO replies(id, user_id, comment_id, reply_id, created_at ) VALUES(".$_SESSION['user']['id']." ,'".$id."', '".$reyply."', NOW())") OR DIE ("Hata: Kayıt İşlemi Gerçekleşmedi.")) {
    }
    echo "Yorum başarıyla eklendi.";
    header("Refresh:2; ../pages/haberler.php");
} elseif ($type && !empty($type) && $type == 'etkinlik') {
    if (mysqli_query($deneme, "INSERT INTO replies(id, user_id, comment_id, reply_id, created_at ) VALUES(".$_SESSION['user']['id'].",'" . $id . "', '" . $reyply . "', NOW())") or die ("Hata: Kayıt İşlemi Gerçekleşmedi.")) {
    }
    echo "Yorum başarıyla eklendi.";
    header("Refresh:2; ../pages/etkinlikler.php");

}

$stmt->close();
$deneme->close();
?>
</body>
</html>
