<link rel="shortcut icon" href="../../src/assets/icos/favicon.ico" type="image/x-icon">

<?php
include '../db.php';
echo "<link rel='stylesheet' href='../../plugins/node_modules/tailwindcss/tailwind.css'>";
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $silme_sorgu = "DELETE FROM comments WHERE id = ?";
    $stmt = $deneme->prepare($silme_sorgu);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Yorum başarıyla silindi.";
        header ("Refresh:2; ../../pages/yorumlar.php");
        exit();
    } else {
        echo "Silme işlemi başarısız: " . $deneme->error;
    }

    $stmt->close();
}

$deneme->close();
?>
