<?php


include('../db.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = intval($_GET['id']);
    $type = $_GET['type'];

    if ($type === 'event') {
        $sorgu = "DELETE FROM events WHERE id = $id";
        if (mysqli_query($deneme, $sorgu) === false) {
            die("Hata: " . mysqli_error($deneme));
        }
        header("Location: ../../pages/paylasilan-etkinlikler.php");
        exit;
    }
}

if (isset($_POST['sil'])) {
    if (!empty($_POST['events_ids'])) {
        $events_ids = $_POST['events_ids'];
        $ids_string = implode(',', array_map('intval', $events_ids));
        $sorgu = "DELETE FROM events WHERE id IN ($ids_string)";
        if (mysqli_query($deneme, $sorgu) === false) {
            die("Hata: " . mysqli_error($deneme));
            var_dump($deneme);
            return false ;
        }
    }
    header("Location: ../../pages/paylasilan-etkinlikler.php");
    exit;
}
ob_end_flush();
?>
