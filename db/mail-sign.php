<?php
// PHPMailer dosyalarını dahil et
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Eğer Composer kullanıyorsan, autoload'u çağır
require '../vendor/autoload.php'; // Composer ile kurduysan
//require 'libs/PHPMailer/src/PHPMailer.php'; // Manuel kurulum yaptıysan
//require 'libs/PHPMailer/src/Exception.php';
function mail_sign($name, $email)
{

    $mail = new PHPMailer(true);  // PHPMailer objesini oluştur

    try {
        // SMTP Ayarları
        $mail->isSMTP();                                            // SMTP kullanacağını belirt
        $mail->Host       = 'smtp.gmail.com';                       // SMTP sunucusu (Gmail için)
        $mail->SMTPAuth   = true;                                   // SMTP kimlik doğrulamasını aç
        $mail->Username   = 'fuurkanizci.10@gmail.com';                    // SMTP kullanıcı adı (Gmail adresin)
        $mail->Password   = 'fqwc yszb wrwu kuvy';                        // SMTP şifren
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // TLS şifreleme
        $mail->Port       = 587;                                    // TCP portu (Gmail için 587)

        // Alıcı ve Gönderen Bilgileri
        $mail->setFrom('fuurkanizci.10@gmail.com', 'Haberler&Etkinlikler Bilgilendirme');
        $mail->addAddress('furkanizci_10@icloud.com', 'Furkan İzci');     // Alıcı email ve adı

        // İçerik Ayarları
        $mail->isHTML(true);                                        // HTML içerik göndermek için ayarla
        $mail->Subject =  "Yeni Kayıt Oluşturldu"  ;                      // E-posta başlığı
        $mail->Body    = "$name". " Adında Yeni Bir Üye". "<br>" . "$email";   // HTML içerik
        $mail->AltBody = "a";  // HTML olmayan istemciler için düz içerik

        // E-postayı gönder
        $mail->send();
    } catch (Exception $e) {
    }
}

?>
