<?php
include '../db/db.php';
echo "<link rel='stylesheet' href='./node_modules/tailwindcss/tailwind.css'>";
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Güvenlik için ID'yi int çeviriyoruz

    // Silme sorgusu
    $silme_sorgu = "DELETE FROM events WHERE id = ?";
    $stmt = $deneme->prepare($silme_sorgu);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Etkinlik başarıyla silindi.";
        header ("Refresh:2; ../pages/etkinlikler.php");
        exit();
    } else {
        echo "Silme işlemi başarısız: " . $deneme->error;
    }

    $stmt->close();
}

// Veritabanı bağlantısını kapatma
$deneme->close();
?>
