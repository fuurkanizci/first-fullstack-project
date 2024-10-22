<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../plugins/node_modules/tailwindcss/tailwind.css">
    <link rel="stylesheet" href="style.css">
    <title> Etkinlikler </title>
    <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <script src="../plugins/js/jquery.timeago.js"></script>
    <link rel="stylesheet" href="../plugins/fontawesome-free-6.6.0-web/css/fontawesome.css">
    <link rel="stylesheet" href="../plugins/fontawesome-free-6.6.0-web/css/solid.min.css">
    <link rel="stylesheet" href="../src/components/loading/loading.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body class="bg-orange-50">
<div class="flex flex-row justify-center items-center text-3xl justify-evenly">
    <div ><a class="anim text-black" href="./haberler.php">Haberler</a>
    </div>
    <div ><a class="anim text-black" href="./index.php">Anasayfa</a>
    </div>
</div><a class='' href='./etkinlik-ekleme.php' ><img src='../src/assets/icos/plus.png' class='absolute top-4 right-4 border border-green-500 p-3 rounded-full hover:bg-green-500' alt='add'/></a>




<div id="loading"  class="loader loader-index"></div>


<?php
include('../db/db.php');
$header='../src/components/header.php';
$sorgu = "SELECT * FROM events";
$data = $deneme->query($sorgu);
if (isset($_POST['like'])) {
    $events_id = $deneme->real_escape_string($_POST['events_id']);
    $type = $deneme->real_escape_string($_POST['type']);

    $sql = $deneme->query("SELECT id FROM likes WHERE events_id='$events_id' && user_id='".$_SESSION['user']."'");
    if ($sql->num_rows > 0) {
        $status = "updated";
        $deneme->query("UPDATE likes SET type='$type' WHERE events_id='$events_id' && user_id='".$_SESSION['user']."'");
    } else {
        $status = "inserted";
        $deneme->query("INSERT INTO likes (type,events_id, user_id) VALUES ('$type', '$events_id', '".$_SESSION['user']."')");
    }

    exit(json_encode(array('status' => $status)));
}


if (isset($_POST['getLikes'])) {
    $likes = [];
    $sql = $deneme->query("SELECT events_,d, type,  FROM likes");
    while($data = $sql->fetch_assoc())
        $likes[] = array("events_id" => $data['events_id'], "type" => $data['type']);

    exit(json_encode($likes));
}




if ($data->num_rows > 0) {
    while ($row = $data->fetch_assoc()) {
        echo "
<div style='padding: 0px 95px;'>   
    <div style='font-weight: bold; font-size: 20px;'>" . $row['baslik'] . "</div>
    <div style='height: 10px;'></div>
    <div>" . $row['icerik'] . "</div>
    <div style='height: 10px;'></div>
    <div class='flex flex-row gap-3 pb-2'>
        <a href='./comments.php?id=" . $row['id'] . "' class='pr-2 anim-comment'>
            <i class='fa-regular fa-comment'></i>
        </a>
        
            <i class='fa-regular anim-like fa-thumbs-up' onclick='like(this, " . $row['id'] . ")'></i>
        
    </div>
    <hr class='border-1 color-black'>
</div>";




    }


}




?>


<script>
    window.addEventListener("load", () => {
        const loader = document.querySelector(".loader");
        loader.classList.add("loader--hidden");
        loader.addEventListener("transitionend", () => {
            document.body.removeChild(loader);
        });
    });
</script>
<script>
    function like(caller, events_id, type) {


        $.ajax({
            url: './etkinlikler.php',
            method: 'POST',
            data: {
                like: 1,
                events_id: events_id,
                type: type
            },
            success: function(response) {
               // caller.style.cssText = "color: blue !important";
            }
        });
    }

    function getLikes() {
        $.ajax({
            url: './etkinlikler.php',
            method: 'POST',
            dataType: 'json',
            data: {
                getUserLike: 1
            }, success: function (response) {
                for (var i=0; i < response.length; i++) {
                    $('i[onclick="like(this,'+response[i].events_id+', \''+response[i].type+'\')"]').each(function () {
                            $(this).css('color', 'blue');
                    });
                }
            }
        });
    }

</script>


</body>
</html>