<?php      include('../db/db.php');  ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../plugins/node_modules/tailwindcss/tailwind.css">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kayıt</title>
</head>
<body>

<?php
echo "<link rel='shortcut icon' href='../src/assets/icos/favicon.ico' type='image/x-icon'>";
include "mail-sign.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

$deneme = mysqli_connect("127.0.0.1", "root", "", "proje-1-haberler");

if (!$deneme) {
    die("Veritabanına bağlanılamadı: " . mysqli_connect_error());
}
mysqli_set_charset($deneme, "utf8");

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = md5($_POST['password']);
    $cpass = $_POST['cpass'];

    if (empty($name) || empty($email) || empty($password) || empty($cpass)) {
        echo " <div >
 <img class='w-full h-screen object-cover ' src='../src/assets/imgs/try-again.jpg' alt='tryAgainPage'>
</div>";
        echo "Lütfen Bütün Alanları Doldurun: " . mysqli_error($deneme);
        header("Refresh:2; ../pages/login.php");
    } elseif ($_POST['password'] !== $cpass) {
        echo " <div>
 <img class='w-full h-screen object-cover ' src='../src/assets/imgs/try-again.jpg' alt='tryAgainPage'>
</div>";
        echo "Şifreler Eşleşmedi: " . mysqli_error($deneme);
        header("Refresh:2; ../pages/login.php");
    } else {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_prepare($deneme, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    echo " <div>
 <img class='w-full h-screen object-cover ' src='../src/assets/imgs/try-again.jpg' alt='tryAgainPage'>
</div>";
                    echo "<script>alert('Bu email zaten kullanılıyor.');</script>";
                    header("Refresh:2; ../pages/login.php");
                } else {
                    $sqlInsert = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
                    $stmtInsert = mysqli_prepare($deneme, $sqlInsert);
                    if ($stmtInsert) {
                        mysqli_stmt_bind_param($stmtInsert, "sss", $name, $email, $password);
                        if (mysqli_stmt_execute($stmtInsert)) {
                            echo mail_sign($name, $email, "furkanizci_10@icloud.com");
                            header("Refresh:1; ../pages/login.php");
                            echo " <div>
 <img class='w-full h-screen object-cover ' src='../src/assets/imgs/welcome-up.jpg' alt='welcomeUpPage'>
</div>";
                            echo "<script>alert('Kayıt başarılı!');</script>";
                        } else {
                            echo " <div>
 <img class='w-full h-screen object-cover ' src='../src/assets/imgs/try-again.jpg' alt='tryAgainPage'>
</div>";
                            echo "Kayıt eklenemedi: " . mysqli_error($deneme);
                            header("Refresh:2; ../pages/login.php");
                        }
                    } else {
                        echo " <div>
 <img class='w-full h-screen object-cover ' src='../src/assets/imgs/try-again.jpg' alt='tryAgainPage'>
</div>";
                        echo "Hazırlanan ifade oluşturulamadı: " . mysqli_error($deneme);
                        header("Refresh:2; ../pages/login.php");
                    }
                }
            } else {
                echo " <div>
 <img class='w-full h-screen object-cover ' src='../src/assets/imgs/try-again.jpg' alt='tryAgainPage'>
</div>";
                echo "Sorgu çalıştırılamadı: " . mysqli_error($deneme);
                header("Refresh:2; ../pages/login.php");
            }
        }
    }
}
?>

</body>
</html>
