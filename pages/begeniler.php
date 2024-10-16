<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beğeniler</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../plugins/node_modules/tailwindcss/tailwind.css">
    <link rel="stylesheet" href="../pages/style.css">
    <link rel="stylesheet" href="../src/components/loading/loading.css">
    <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
</head>
<body>
<?php
include "../db/db.php";
include "../db/data.php";

$cfg='../src/components/new-page-config.php';
?>
<?php
include('../db/db.php');
$header='../src/components/header.php';
$sorgu = "SELECT id, content, content_type, users_name, date_time FROM likes";
$data = $deneme->query($sorgu);

if ($data->num_rows > 0) {
    while ($row = $data->fetch_assoc()) {
        echo "<div style='padding: 0px 95px;'>
<div class='flex flex-row justify-between'>    
        <div style='font-weight: bold; font-size: 20px;'>"  . $row['content'] . "</div>
        <a href = '../db/likes.php?id=" . $row['id'] . "' class='p-2 border border-0   rounded-2xl text-red-600 mr-5 hover:bg-[#ffff00ab]  hover:text-black' ><img src='../src/assets/icos/favorite.png' alt='like'></a></div>
    <div style='height: 10px;'></div>
        <div>" . $row['content_type'] . "</div>
        <div style='height: 10px;'></div>
        
    <a href = '../db/comments.php?id=" . $row['users_name'] . "' class='p-2 border border-0   rounded-2xl ' ><img src='../src/assets/icos/comment.png' alt='comment'></a>
                <hr class='mt-4'>
      </div>";


    }


}


?>


<?php include $cfg;?>
</body>
</html>