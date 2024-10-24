<?php
echo "<link rel='shortcut icon' href='../src/assets/icos/favicon.ico' type='image/x-icon'>";
include 'db.php';
include "mail.php";
$eventsTitle=$_POST["etkinlik_basligi"];
$eventsAbout=$_POST["etkinlik_kategori"];
$event=$_POST["events"];
$userId=$_SESSION["user"]['id'];
if(mysqli_query($deneme, "INSERT INTO events(baslik, icerik, kategori, user_id ) VALUES('".$eventsTitle."' ,'".$eventsAbout."', '".$event."', '".$userId."')") OR DIE ("Hata: Kayıt İşlemi Gerçekleşmedi.")) {
    echo mail_gonder("Yeni Etkinlik Eklendi", $eventsTitle, $eventsAbout, $event, $userId, "furkanizci_10@icloud.com");
    header("Refresh:2; ../pages/etkinlikler.php");
}
    else
echo "Kaydetmedi";

?>