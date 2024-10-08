<?php
include '../db/db.php';
echo "<link rel='stylesheet' href='./node_modules/tailwindcss/tailwind.css'>";

// Ham veriyi al
$input = file_get_contents("php://input");

// Verinin JSON olduğunu varsayarak diziye dönüştür
$_PUT = json_decode($input, true);

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

// PUT isteği ile gelen verileri kontrol et
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
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
            echo "Güncelleme işlemi başarısız: " . $deneme->error;
        }
    } else {
        echo "PUT isteğinde eksik veri.";
    }
}
?>
