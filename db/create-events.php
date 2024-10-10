<?php
echo "<link rel='shortcut icon' href='../assets/icos/favicon.ico' type='image/x-icon'>";
include 'db.php';
include "mail.php";
$eventsTitle=$_POST["etkinlik_basligi"];
$eventsAbout=$_POST["etkinlik_kategori"];
$event=$_POST["events"];
if(mysqli_query($deneme, "INSERT INTO events(baslik, icerik, kategori ) VALUES('".$eventsTitle."' ,'".$eventsAbout."', '".$event."')") OR DIE ("Hata: Kayıt İşlemi Gerçekleşmedi.")) {
    echo mail_gonder("Yeni Etkinlik Eklendi", $eventsTitle, $eventsAbout, $event, "furkanizci_10@icloud.com");
    header("Refresh:2; ../pages/etkinlikler.php");
}
    else
echo "Kaydetmedi";

?>