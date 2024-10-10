<?php
echo "<link rel='shortcut icon' href='../assets/icos/favicon.ico' type='image/x-icon'>";
include "mail-sign.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

$deneme = mysqli_connect("127.0.0.1", "root", "", "proje-1-haberler");

if (!$deneme) {
    die("Veritabanına bağlanılamadı: " . mysqli_connect_error());
}
mysqli_set_charset($deneme, "utf8");

if (isset($_POST['submit'])) {
    // Form verilerini alalım
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = md5($_POST['password'])  ;
    $cpass = $_POST['cpass'];

    if (empty($name) || empty($email) || empty($password) || empty($cpass)) {
        echo "<script>alert('Lütfen tüm alanları doldurun.');</script>";
    } elseif ($_POST['password'] !== $cpass) {
        echo "<script>alert('Şifreler eşleşmiyor.');</script>";
    } else {


        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_prepare($deneme, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<script>alert('Bu email zaten kullanılıyor.');</script>";
                } else {
                    $sqlInsert = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
                    $stmtInsert = mysqli_prepare($deneme, $sqlInsert);
                    if ($stmtInsert) {
                        mysqli_stmt_bind_param($stmtInsert, "sss", $name, $email, $password);
                        if (mysqli_stmt_execute($stmtInsert)) {
                            echo mail_sign( $name, $email,  "furkanizci_10@icloud.com");
                            header("Refresh:2; ../pages/index.php");
                            echo "<script>alert('Kayıt başarılı!');</script>";
                        } else {
                            echo "Kayıt eklenemedi: " . mysqli_error($deneme);
                        }
                    } else {
                        echo "Hazırlanan ifade oluşturulamadı: " . mysqli_error($deneme);
                    }
                }
            } else {
                echo "Sorgu çalıştırılamadı: " . mysqli_error($deneme);
            }
        } else {
            echo "Hazırlanan ifade oluşturulamadı: " . mysqli_error($deneme);
        }
    }
}
?>
