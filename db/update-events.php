<?php
include 'db.php';
include "mail.php";
$eventsTitle=$_POST["etkinlik_basligi"];
$eventsAbout=$_POST["etkinlik_kategori"];
$event=$_POST["etkinlik"];
if(mysqli_query($deneme, "INSERT INTO events(baslik, icerik, kategori ) VALUES('".$eventsTitle."' ,'".$eventsAbout."', '".$event."')") OR DIE ("Hata: Güncelleme İşlemi Gerçekleşmedi.")) {
    mail_gonder("Etkinlik Güncellendi", $eventsTitle, $eventsAbout, $event, "furkanizci_10@icloud.com");
    echo"<a href='../pages/etkinlikler.php'> Güncellediğiniz Etkinliği Görmek İçin Tıklayınız.</a>";
}
else
    echo "Güncellenmedi";
?>