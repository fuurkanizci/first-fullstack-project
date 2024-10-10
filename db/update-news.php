<?php
echo "<link rel='shortcut icon' href='../assets/icos/favicon.ico' type='image/x-icon'>";
include 'db.php';
include "mail.php";
$newsTitle=$_POST["haber_basligi"];
$newsAbout=$_POST["haber_konusu"];
$new=$_POST["haber"];
if(mysqli_query($deneme, "INSERT INTO news(baslik, kategori, haber ) VALUES('".$newsTitle."' ,'".$newsAbout."', '".$new."')") OR DIE ("Hata: Güncelleme İşlemi Gerçekleşmedi.")) {
    mail_gonder("Haber Güncellendi", $newsTitle, $newsAbout, $new, "furkanizci_10@icloud.com");header("Refresh:2; ../pages/etkinlikler.php");
}
else
    echo "Güncellenmedi";
?>
