<?php
// Hata raporlamayı aç
error_reporting(E_ALL);
ini_set('display_errors', 1);

include ("db.php");

if(isset($_POST['submit'])) {
    // Dosyanın yüklenip yüklenmediğini kontrol edin
    if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
        echo "File upload failed with error code: " . $_FILES['file']['error'];
        exit;
    }

    $filename = $_FILES['file']['name'];
    $tempname = $_FILES['file']['tmp_name'];
    $folder = $_SERVER['DOCUMENT_ROOT'] . "/first-fullstack-project/assets/videos/" . $filename;

    // Dosyayı yüklemeye çalış
    if (move_uploaded_file($tempname, $folder)) {
        // Veritabanına ekleme
        $sql = "INSERT INTO `video` (`name`) VALUES ('$filename')";

        if (mysqli_query($conn, $sql)) {
            echo "Data inserted";
        } else {
            echo "Data not inserted. Error: " . mysqli_error($conn);
        }
    } else {
        echo "Failed to move uploaded file.";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file" id="file">
    <input type="submit" name="submit" value="submit">
</form>
