<?php
// PHPMailer dosyalarını dahil et
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Eğer Composer kullanıyorsan, autoload'u çağır
require '../vendor/autoload.php'; // Composer ile kurduysan
//require 'libs/PHPMailer/src/PHPMailer.php'; // Manuel kurulum yaptıysan
//require 'libs/PHPMailer/src/Exception.php';
function mail_gonder($konu, $baslik, $haberKonu, $icerik, $alici)
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
        $mail->setFrom('fuurkanizci.10@gmail.com', 'Gönderen Adı');
        $mail->addAddress('furkanizci_10@icloud.com', 'Alıcı Adı');     // Alıcı email ve adı

        // İçerik Ayarları
        $mail->isHTML(true);                                        // HTML içerik göndermek için ayarla
        $mail->Subject = $konu;                         // E-posta başlığı
        $mail->Body    = $baslik.$haberKonu.$icerik;   // HTML içerik
        $mail->AltBody = $alici;  // HTML olmayan istemciler için düz içerik

        // E-postayı gönder
        $mail->send();
        echo 'Paylaşım Başarıyla Gerçekleşti.';
    } catch (Exception $e) {
        echo "Paylaşılamadı. Hata: {$mail->ErrorInfo}";
    }
}

?>
