<link rel="shortcut icon" href="../../src/assets/icos/favicon.ico" type="image/x-icon">

<?php
include '../db.php';
echo "<link rel='stylesheet' href='../../plugins/node_modules/tailwindcss/tailwind.css'>";
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $silme_sorgu = "DELETE FROM likes WHERE id = ?";
    $stmt = $deneme->prepare($silme_sorgu);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Beğeni başarıyla silindi.";
        header ("Location: ../../pages/begeniler.php");
        exit();
    } else {
        echo "Silme işlemi başarısız: " . $deneme->error;
    }

    $stmt->close();
}

$deneme->close();
?>
