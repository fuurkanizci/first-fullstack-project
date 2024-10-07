<?php
include '../db/db.php';
echo "<link rel='stylesheet' href='./node_modules/tailwindcss/tailwind.css'>
    <link rel='stylesheet' href='./login.css'>";

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
    echo "Bağlantı hatası: " . $e->getMessage() . "<br>";
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
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
        echo "Program güncellendi.";
        echo "<a href='../pages/etkinlikler.php'>Geri Dönünüz</a>";
    } else {
        echo "Güncelleme işlemi başarısız.";
    }
}
?>
