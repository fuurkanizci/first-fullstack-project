<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beğeni Kayıt</title>
</head>
<body>
<?php
echo "<link rel='shortcut icon' href='../src/assets/icos/favicon.ico' type='image/x-icon'>";
include 'db.php';
include "mail-likes.php";
$eventsTitle=$_POST["etkinlik_basligi"];
$eventsAbout=$_POST["etkinlik_kategori"];
$event=$_POST["events"];
if(mysqli_query($deneme, "INSERT INTO likes(baslik, icerik, kategori ) VALUES('".$eventsTitle."' ,'".$eventsAbout."', '".$event."')") OR DIE ("Hata: Kayıt İşlemi Gerçekleşmedi.")) {
    echo mail_gonder("Yeni Etkinlik Eklendi", $eventsTitle, $eventsAbout, $event, "furkanizci_10@icloud.com");
    header("Refresh:2; ../pages/etkinlikler.php");
}
else
    echo "Kaydetmedi";

?>
</body>
</html>