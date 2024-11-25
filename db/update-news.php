<?php include 'db.php';
echo "<link rel='shortcut icon' href='../src/assets/icos/favicon.ico' type='image/x-icon'>";

include "mail.php";
$newsTitle=$_POST["haber_basligi"];
$newsAbout=$_POST["haber_konusu"];
$new=$_POST["haber"];
if(mysqli_query($deneme, "INSERT INTO news(baslik, kategori, haber ) VALUES('".$newsTitle."' ,'".$newsAbout."', '".$new."')") OR DIE ("Hata: Güncelleme İşlemi Gerçekleşmedi.")) {
    mail_gonder("Haber Güncellendi", $newsTitle, $newsAbout, $new, "furkanizci_10@icloud.com");header("Location: ../pages/etkinlikler.php");
}
else
    echo "Güncellenmedi";
?>
