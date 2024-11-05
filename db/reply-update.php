<?php      include('../db/db.php');  ?>

<!doctype html>
<html lang="en">
<head>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../plugins/node_modules/tailwindcss/tailwind.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='shortcut icon' href='../src/assets/icos/favicon.ico' type='image/x-icon'>
    <title>Yanıt Düzenleme</title>
</head>
<body class="text-gray">

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $id = $deneme->real_escape_string($_POST['id']);
    $reply = $deneme->real_escape_string($_POST['yanıt']);

    $sql = "UPDATE replies SET reply_comment='$reply' WHERE id='$id'";

    if ($deneme->query($sql) === TRUE) {
        header("Location: ../pages/yorumlar.php");
        echo "Yanıt başarıyla güncellendi.";
    } else {
        echo "Hata: " . $sql . "<br>" . $deneme->error;
    }
}

$deneme->close();
?>


</body>
</html>

