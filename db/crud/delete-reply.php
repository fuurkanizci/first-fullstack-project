<?php


include('../db.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = intval($_GET['id']);
    $type = $_GET['type'];

    if ($type === 'reply') {
        $sorgu = "DELETE FROM replies WHERE id = $id";
        if (mysqli_query($deneme, $sorgu) === false) {
            die("Hata: " . mysqli_error($deneme));
        }
        header("Location: ../../pages/yorumlar.php");
        exit;
    }
}

if (isset($_POST['silReply'])) {
    if (!empty($_POST['reply_ids'])) {
        $reply_ids = $_POST['reply_ids'];
        $ids_string = implode(',', array_map('intval', $reply_ids));
        $sorgu = "DELETE FROM replies WHERE id IN ($ids_string)";
        if (mysqli_query($deneme, $sorgu) === false) {
            die("Hata: " . mysqli_error($deneme));
            var_dump($deneme);
            return false ;
        }
    }
    header("Location: ../../pages/yorumlar.php");
    exit;
}
ob_end_flush();
?>
