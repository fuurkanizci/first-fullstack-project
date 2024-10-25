<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beğeniler</title>
    <script src="../plugins/js/jquery.timeago.js"></script>
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

$headerAct='../src/components/act-files-header.php';
include $headerAct;
$cfg='../src/components/new-page-config.php';
$userId = $_SESSION['user']['id'];
$footer='../src/components/footer.php';
$sorgu = "SELECT * FROM likes where user_id='$userId'";
$data = $deneme->query($sorgu);

if ($data->num_rows > 0) {
    while ($row = $data->fetch_assoc()) {
        echo "<div style='padding: 0px 95px;' class='px-[30rem] text-black'>
        <div >" .'Haber No:' . $row['news_id'] . "</div>
         <div style='height: 10px;'></div>
        <div>Etkinlik No:" . $row['events_id'] . "</div>
      
            
        
        <a href = '../db/crud/delete-comments.php?id=" . $row['id'] . "' class='p-2 border border-0   rounded-2xl text-red-600 mr-5 hover:bg-[#ff0000ab]  hover:text-black' >Sil</a>
                <hr class='mt-4'>
      </div>";


    }


}

 include $footer;?>



<?php include $cfg;?>
</body>
</html>