<?php
include '../db/db.php';
echo "<link rel='stylesheet' href='./node_modules/tailwindcss/tailwind.css'>
    <link rel='stylesheet' href='./login.css'>";
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Güvenlik için ID'yi int çeviriyoruz

    // Silme sorgusu
    $silme_sorgu = "DELETE FROM news WHERE id = ?";
    $stmt = $deneme->prepare($silme_sorgu);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Haber başarıyla silindi.";
        echo "<a href='../pages/haberler.php'>Geri Dönünüz</a>";
        exit();
    } else {
        echo "Silme işlemi başarısız: " . $deneme->error;
    }

    $stmt->close();
}

// Veritabanı bağlantısını kapatma
$deneme->close();
?>
