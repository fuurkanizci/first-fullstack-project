<?php
include '../db/db.php';
echo "<link rel='stylesheet' href='./node_modules/tailwindcss/tailwind.css'>";

parse_str(file_get_contents("php://input"), $_PUT);

// Bağlantıyı kontrol et
try {
    $deneme->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Örnek bir sorgu çalıştırarak bağlantıyı kontrol et
    $stmt = $deneme->query("SELECT 1"); // Basit bir sorgu
    if ($stmt) {
        echo "Bağlandı.<br>";
    }
} catch (PDOException $e) {
    die("Bağlantı hatası: " . $e->getMessage() . "<br>");
}

// PUT isteği kontrolü
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // PUT verilerini kontrol et
    if (isset($_PUT['id'], $_PUT['baslik'], $_PUT['icerik'], $_PUT['kategori'])) {
        $code = $_PUT['id'];
        $name = $_PUT['baslik'];
        $description = $_PUT['icerik'];
        $duration = $_PUT['kategori'];

        // Güncelleme sorgusu
        $sql = "UPDATE news SET baslik = :baslik, icerik = :icerik, kategori = :kategori WHERE id = :id";
        $stmt = $deneme->prepare($sql);

        // Parametreleri bağla
        $stmt->bindParam(':id', $code);
        $stmt->bindParam(':baslik', $name);
        $stmt->bindParam(':icerik', $description);
        $stmt->bindParam(':kategori', $duration);

        // Sorguyu çalıştır ve güncelleme sonucunu kontrol et
        if ($stmt->execute()) {
            echo "Etkinlik başarıyla güncellendi.";
            header("Refresh:2; ../pages/etkinlikler.php");
            exit();
        } else {
            echo "Güncelleme işlemi başarısız: " . implode(", ", $stmt->errorInfo());
        }
    } else {
        echo "PUT isteğinde eksik veri var.";
    }
}
?>
