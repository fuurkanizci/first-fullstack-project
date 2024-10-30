<?php
include 'db.php';
include "mail.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$eventsTitle=$_POST["etkinlik_basligi"];
$eventsAbout=$_POST["etkinlik_kategori"];
$event=$_POST["events"];
$userId=$_SESSION["user"]['id'];
if(mysqli_query($deneme, "INSERT INTO events(baslik, kategori, icerik, user_id ) VALUES('".$eventsTitle."' ,'".$eventsAbout."', '".$event."', '".$userId."')") OR DIE ("Hata: Kayıt İşlemi Gerçekleşmedi.")) {
    echo mail_gonder("Yeni Etkinlik Eklendi", $eventsTitle, $eventsAbout, $event, $userId, "furkanizci_10@icloud.com");
    header("Refresh:2; ../pages/etkinlikler.php");
}
    else
echo "Kaydetmedi";

?>