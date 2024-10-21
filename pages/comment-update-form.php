<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yorum Güncelleme Formu</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800">
<?php
session_start(); // Oturumun başlatılması
include '../db/db.php'; // Veritabanı bağlantısı
$comment_id = $_GET['id']; // Güncellenecek yorumun ID'si

// Yorumun alınması
$stmt = $deneme->prepare("SELECT id, comment FROM comments WHERE id = ?");
$stmt->bind_param("i", $comment_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    ?>
    <form action="../db/comment-update-db.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div>
            <label for="comment">Yorum:</label>
            <textarea name="comment" id="comment" required><?php echo htmlspecialchars($row['comment']); ?></textarea>
        </div>
        <button type="submit" name="submit" >Güncelle</button>
    </form>
    <?php
} else {
    echo "<p>Bu ID ile eşleşen yorum bulunamadı.</p>";
}
$stmt->close();
$deneme->close();
?>
</body>
</html>
