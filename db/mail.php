<?php
echo "<link rel='shortcut icon' href='../src/assets/icos/favicon.ico' type='image/x-icon'>";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../plugins/vendor/autoload.php';
//require 'libs/PHPMailer/src/PHPMailer.php';
//require 'libs/PHPMailer/src/Exception.php';
function mail_gonder($konu, $baslik, $haberKonu, $icerik, $alici)
{

$mail = new PHPMailer(true);  // PHPMailer objesini oluştur

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'fuurkanizci.10@gmail.com';
        $mail->Password   = 'fqwc yszb wrwu kuvy';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('fuurkanizci.10@gmail.com', ' Haberler&Etkinlikler Bilgilendirme ');
        $mail->addAddress('furkanizci_10@icloud.com', 'Furkan İzci');

        $mail->isHTML(true);
        $mail->Subject = $konu;
        $mail->Body    = $baslik.$haberKonu.$icerik;
        $mail->AltBody = $alici;

        $mail->send();
    } catch (Exception $e) {
    }
}

?>
