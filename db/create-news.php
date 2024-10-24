
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="../plugins/node_modules/tailwindcss/tailwind.css"><?php
echo "<link rel='shortcut icon' href='../src/assets/icos/favicon.ico' type='image/x-icon'>";
include 'db.php';
include "mail.php";
$newsTitle=$_POST["haber_basligi"];
$newsAbout=$_POST["haber_konusu"];
$new=$_POST["haber"];
$userId=$_SESSION["user"]['id'];
if(mysqli_query($deneme, "INSERT INTO news(baslik, kategori, haber, user_id ) VALUES('".$newsTitle."' ,'".$newsAbout."', '".$new."', '".$userId."')") OR DIE ("Hata: Kayıt İşlemi Gerçekleşmedi.")) {
    mail_gonder("Yeni Haber Eklendi", $newsTitle, $newsAbout, $new, $userId, "furkanizci_10@icloud.com");header("Refresh:2; ../pages/haberler.php");
    echo "<div class=''>Haber Eklendi Yönlendiriliyorsunuz.";
}
else
    echo "Kaydetmedi";
?>
