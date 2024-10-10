<?php
// PHPMailer dosyalarını dahil et
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
echo "<link rel='shortcut icon' href='../assets/icos/favicon.ico' type='image/x-icon'>";
require '../vendor/autoload.php';
//require 'libs/PHPMailer/src/PHPMailer.php';
//require 'libs/PHPMailer/src/Exception.php';
function mail_sign($name, $email)
{

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'fuurkanizci.10@gmail.com';
        $mail->Password   = 'fqwc yszb wrwu kuvy';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;


        $mail->setFrom('fuurkanizci.10@gmail.com', 'Haberler&Etkinlikler Bilgilendirme');
        $mail->addAddress('furkanizci_10@icloud.com', 'Furkan İzci');


        $mail->isHTML(true);
        $mail->Subject =  "Yeni Kayıt Oluşturldu"  ;
        $mail->Body    = "$name". " Adında Yeni Bir Üye". "<br>" . "$email";
        $mail->AltBody = "a";


        $mail->send();
    } catch (Exception $e) {
    }
}

?>
