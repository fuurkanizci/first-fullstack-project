<?php
include 'db.php';
include "mail.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$newsTitle=$_POST["haber_basligi"];
$newsAbout=$_POST["haber_konusu"];
$news=$_POST["haber"];
$userId=$_SESSION["user"]['id'];
if(mysqli_query($deneme, "INSERT INTO news(baslik, kategori, haber, user_id ) VALUES('".$newsTitle."' ,'".$newsAbout."', '".$news."', '".$userId."')") OR DIE ("Hata: Kayıt İşlemi Gerçekleşmedi.")) {
    echo mail_gonder("Yeni haber Eklendi", $newsTitle, $newsAbout, $news, $userId, "furkanizci_10@icloud.com");
  header("Location: ../pages/haberler.php");
}
else
    echo "Kaydetmedi";

?>