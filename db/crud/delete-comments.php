<?php
include('../db.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = intval($_GET['id']);
    $type = $_GET['type'];
    if ($type === 'comments') {
        $sorgu = "DELETE FROM comments WHERE id = $id";
        if (mysqli_query($deneme, $sorgu) === false) {
            die("Hata: " . mysqli_error($deneme));
        }
        header("Location: ../../pages/yorumlar.php");
        exit;
    }
}
if (isset($_POST['silYorum'])) {
    if (!empty($_POST['comments_ids'])) {
        $comments_ids = $_POST['comments_ids'];
        $ids_string = implode(',', array_map('intval', $comments_ids));
        $sorgu = "DELETE FROM comments WHERE id IN ($ids_string)";
        if (mysqli_query($deneme, $sorgu) === false) {
            die("Hata: " . mysqli_error($deneme));

        }
    }
    header("Location: ../../pages/yorumlar.php");
    exit;
}
ob_end_flush();
?>
