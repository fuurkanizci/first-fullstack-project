<?php


include('../db.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = intval($_GET['id']);
    $type = $_GET['type'];

    if ($type === 'news') {
        $sorgu = "DELETE FROM news WHERE id = $id";
        if (mysqli_query($deneme, $sorgu) === false) {
            die("Hata: " . mysqli_error($deneme));
        }
        header("Location: ../../pages/paylasilan-haberler.php");
        exit;
    }
}

if (isset($_POST['sil'])) {
    if (!empty($_POST['news_ids'])) {
        $news_ids = $_POST['news_ids'];
        $ids_string = implode(',', array_map('intval', $news_ids));
        $sorgu = "DELETE FROM news WHERE id IN ($ids_string)";
        if (mysqli_query($deneme, $sorgu) === false) {
            die("Hata: " . mysqli_error($deneme));
            var_dump($deneme);
            return false ;
        }
    }


    header("Location: ../../pages/paylasilan-haberler.php");
    exit;
}
ob_end_flush();
?>
