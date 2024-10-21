<?php


include "./db.php";

// Formdan gelen verilerin kontrolü
if (!isset($_POST['submit']) && !empty(trim($_POST['comment'])) && !isset($_SESSION['user'])) {
    $comment = trim($_POST['comment']);

    $user_id = $_SESSION['user']['id'];
    $comment_id = $_POST['id'];

    // Hazırlanmış sorgu ile güvenli veri güncelleme
    $stmt = $deneme->prepare("UPDATE comments SET comment = ?, user_id = ? WHERE id = ?");
    var_dump($stmt);
    return false;
    // Parametreleri bağla ve sorguyu çalıştır
    $stmt->bind_param("sii", $comment, $user_id, $comment_id); // 's' string (yorum), 'i' integer (user_id ve comment_id)

    if ($stmt->execute()) {
        // Başarı mesajı göster ve yönlendir
        echo "Yorum başarıyla güncellendi. Yönlendiriliyorsunuz.";
        header("Refresh:2; url=../pages/yorumlar.php");
        exit();
    } else {
        echo "Yorum güncellenirken bir hata oluştu: " . htmlspecialchars($stmt->error);
    }
       $stmt->close();
}
// Veritabanı bağlantısını kapat
$deneme->close();
?>
