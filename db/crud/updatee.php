<?php
include '../db/db.php';
echo "<link rel='stylesheet' href='./node_modules/tailwindcss/tailwind.css'> <link rel='shortcut icon' href='../assets/icos/favicon.ico' type='image/x-icon'>";

parse_str(file_get_contents("php://input"), $_PUT);

try {
    $deneme->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $deneme->query("SELECT 1"); // Basit bir sorgu
    if ($stmt) {
        echo "Bağlandı.<br>";
    }
} catch (PDOException $e) {
    die("Bağlantı hatası: " . $e->getMessage() . "<br>");
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {

    if (isset($_PUT['id'], $_PUT['baslik'], $_PUT['icerik'], $_PUT['kategori'])) {
        $code = $_PUT['id'];
        $name = $_PUT['baslik'];
        $description = $_PUT['icerik'];
        $duration = $_PUT['kategori'];

        $sql = "UPDATE events SET baslik = :baslik, icerik = :icerik, kategori = :kategori WHERE id = :id";
        $stmt = $deneme->prepare($sql);

        $stmt->bindParam(':id', $code);
        $stmt->bindParam(':baslik', $name);
        $stmt->bindParam(':icerik', $description);
        $stmt->bindParam(':kategori', $duration);

        if ($stmt->execute()) {
            echo "Etkinlik başarıyla güncellendi.";
            header("Refresh:2; ../pages/paylasilan-etkinlikler.php");
            exit();
        } else {
            echo "Güncelleme işlemi başarısız: " . implode(", ", $stmt->errorInfo());
        }
    } else {
        echo "PUT isteğinde eksik veri var.";
    }
}
?>
