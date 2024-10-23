<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="../plugins/fontawesome-free-6.6.0-web/css/fontawesome.css">
    <link rel="stylesheet" href="../plugins/fontawesome-free-6.6.0-web/css/solid.min.css">
    <link rel="stylesheet" href="../src/components/loading/loading.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Etkinlikler</title>
    <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
</head>
<body class="bg-orange-50">
<div class="flex flex-row justify-center items-center text-3xl justify-evenly">
    <div><a class="anim text-black" href="./haberler.php">Haberler</a></div>
    <div><a class="anim text-black" href="./index.php">Anasayfa</a></div>
</div>
<a href='./etkinlik-ekleme.php'>
    <img src='../src/assets/icos/plus.png' class='absolute top-4 right-4 border border-green-500 p-3 rounded-full hover:bg-green-500' alt='add'/>
</a>

<div id="loading" class="loader loader-index"></div>

<style>
    .selected {
        color: dodgerblue;

    }
</style>

<?php
include('../db/db.php');



$sesUser = $_SESSION['user']['id'];


$sorgu = "SELECT * FROM events";
$data = $deneme->query($sorgu);


if ($data->num_rows > 0) {
    while ($row = $data->fetch_assoc()) {
        $events_id = $row['id'];


        $likesQuery = "SELECT COUNT(*) AS likes FROM likes WHERE events_id = $events_id AND type = 'like'";
        $likesResult = mysqli_query($deneme, $likesQuery);
        $likesCount = mysqli_fetch_assoc($likesResult)['likes'];


        $typeQuery = "SELECT type FROM likes WHERE events_id = $events_id AND user_id = $sesUser";
        $typeResult = mysqli_query($deneme, $typeQuery);
        $type = (mysqli_num_rows($typeResult) > 0) ? mysqli_fetch_assoc($typeResult)['type'] : 0; // Beğeni yapılmamış


        echo "
        <div style='padding: 0px 95px;'>   
            <div style='font-weight: bold; font-size: 20px;'>" . htmlspecialchars($row['baslik']) . "</div>
            <div style='height: 10px;'></div>
            <div>" . htmlspecialchars($row['icerik']) . "</div>
            <div style='height: 10px;'></div>
            <div class='flex flex-row gap-3 pb-2'>
                <a href='./comments.php?id=" . $row['id'] . "' class='pr-2 anim-comment'>
                    <i class='fa-regular fa-comment'></i>
                </a>
                <button class='like  " . (($type == 'like') ? 'selected' : '') . "' 
                   data-event-id='" . $events_id . "'
                   onclick='like(this, " . $row['id'] . ")'>
                <i class='fa-regular anim-like fa-thumbs-up'></i>
                <span class='likes_count' data-count='" . $likesCount . "'>" . $likesCount . "</span>
                </button>
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

    function like(caller, events_id) {
        const isLiked = caller.classList.contains('selected');
        const userId = <?php echo $sesUser; ?>;

        const data = new URLSearchParams();
        data.append('events_id', events_id);
        data.append('user_id', userId);
        data.append('type', isLiked ? 'unlk' : 'like');

        fetch('../db/likes-events-db.php', {
            method: 'POST',
            body: data
        })
            .then(response => response.text())
            .then(response => {
                const likesCountElem = caller.querySelector('.likes_count');
                let likesCount = parseInt(likesCountElem.getAttribute('data-count'));

                if (response === 'changetolike') {
                    if (!isLiked) {
                        likesCount++;
                        caller.classList.add("selected");
                    } else {
                        likesCount--;
                        caller.classList.remove("selected");
                    }
                }

                likesCountElem.setAttribute('data-count', likesCount);
                likesCountElem.textContent = likesCount;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }



</script>


</body>
</html>
