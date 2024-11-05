<?php
include('db.php');

if(isset($_POST['submit'])){
$commentId = $_POST['comment_id'];

$replyComment = $_POST['reply_comment'] ;
$userId = $_SESSION['user']['id'] ?? null;

if ($commentId && $replyComment && $userId) {

    $stmt = $deneme->prepare("INSERT INTO replies (comment_id, user_id, reply_comment, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("iis", $commentId, $userId, $replyComment);

    if ($stmt->execute()) {
        echo "Yanıt başarıyla kaydedildi!";
        header("Location: ".$_SERVER['HTTP_REFERER']);
    } else {
        echo "Yanıt kaydedilirken bir hata oluştu: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Geçersiz veri.";
}
}
?>
