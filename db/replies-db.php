<?php
// Veritabanı bağlantısını dahil ediyoruz
include('db.php');

// POST verilerini alıyoruz
$commentId = $_POST['commentId'] ?? null;
$replyText = $_POST['replyText'] ?? null;
$userId = $_SESSION['user']['id'] ?? null; // Kullanıcı ID'sini session üzerinden alıyoruz

if ($commentId && $replyText && $userId) {
    // SQL sorgusunu hazırlıyoruz
    $stmt = $deneme->prepare("INSERT INTO replies (comment_id, user_id, reply_text, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("iis", $commentId, $userId, $replyComment);

    // Sorguyu çalıştırıyoruz
    if ($stmt->execute()) {
        echo "Yanıt başarıyla kaydedildi!";
    } else {
        echo "Yanıt kaydedilirken bir hata oluştu: " . $stmt->error;
    }

    // Bağlantıyı kapatıyoruz
    $stmt->close();
} else {
    echo "Geçersiz veri.";
}
?>
