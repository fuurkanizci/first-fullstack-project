<link rel="shortcut icon" href="../assets/icos/favicon.ico" type="image/x-icon">

<?php
include '../db/db.php';
echo "<link rel='stylesheet' href='./node_modules/tailwindcss/tailwind.css'>";
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Güvenlik için ID'yi int çeviriyoruz

    $silme_sorgu = "DELETE FROM news WHERE id = ?";
    $stmt = $deneme->prepare($silme_sorgu);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Haber başarıyla silindi.";
        header ("Refresh:2; ../pages/haberler.php");
        exit();
    } else {
        echo "Silme işlemi başarısız: " . $deneme->error;
    }

    $stmt->close();
}

$deneme->close();
?>
