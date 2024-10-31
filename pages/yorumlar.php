
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../plugins/node_modules/tailwindcss/tailwind.css">
    <link rel="stylesheet" href="style.css">
    <title> Yorumlarım </title>

    <script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../src/components/loading/loading.css">
</head>

<body class="bg-orange-50 ">

<div class="flex flex-row justify-center items-center text-3xl justify-evenly">
    <div class="anim-head"><a class=" " href="./index.php">Anasayfa</a>
    </div>
    <div class="anim-head"><a class=" " href="./hareketlerim.php">Hareketlerim</a>
    </div>
    <div class="anim-head"><a class=" " href="./paylasilan-etkinlikler.php">Paylaşılan Etkinlikler</a>
    </div>
    <div class="anim-head"><a class=" " href="./paylasilan-haberler.php">Paylaşılan Haberler</a>
    </div>
    <div class="anim-head"><a class=" " href="./begeniler.php">Beğenilerim</a>
    </div>

</div>



<?php
include('../db/db.php');
$userId=$_SESSION['user']['id'];
?>
<form id="silForm" method="post" action="../db/crud/delete-comments.php">

<?php
$sorgu = "SELECT * FROM comments where user_id=$userId";
$data = $deneme->query($sorgu);

if ($data->num_rows > 0) {
    while ($row = $data->fetch_assoc()) {
        if ($row['events_id'] != null) {
            $eventId = $row['events_id'];
            $eventShow = "SELECT * FROM events WHERE id=$eventId";
            $dataEventShow = $deneme->query($eventShow);
            $events = $dataEventShow->fetch_assoc();
            echo "<div style='padding: 0px 95px;' class='px-[30rem] text-black'>

         <div style='height: 10px;'></div>
        <div>Etkinlik: " . $events['kategori'] . "</div>
        <div style='height: 10px;'></div>
        <div>Yorum:" . $row['comment'] . "</div>
            
                    <input type='checkbox' class='comment-checkbox' name='comments_ids[]' value='" . htmlspecialchars($row['id']) . "' onchange='checkCheckboxes()'>
        <div class='mt-5'>
        <a href = '../db/crud/delete-comments.php?id=" . $row['id'] . "&type=comments' class='p-2 border border-0   rounded-2xl text-red-600 mr-5 hover:bg-[#ff0000ab]  hover:text-black' >Sil</a>
                <a href ='./comment-update-form.php?id=" . $row ['id'] . "'class='p-2 border border-0   rounded-2xl text-green-600 mr-5 hover:bg-[#11a411b0]  hover:text-black mb-3 ' >Güncelle</a></div> 
                <hr class='mt-4'>
      </div>";
        }
        if ($row['news_id'] != null){
            $newsId=$row['news_id'];
            $newsShow = "SELECT * FROM news WHERE id=$newsId";
            $dataNewsShow = $deneme->query($newsShow);
            $news = $dataNewsShow->fetch_assoc();

            echo "<div style='padding: 0px 95px;' class='px-[30rem] text-black'>

         <div style='height: 10px;'></div>
        <div>Haber: " . $news['haber'] . "</div>
        <div style='height: 10px;'></div>
        <div>Yorum:" . $row['comment'] . "</div>
            
                    <input type='checkbox' class='comment-checkbox' name='comments_ids[]' value='" . htmlspecialchars($row['id']) . "' onchange='checkCheckboxes()'>
        <div class='mt-5'>
        <a href = '../db/crud/delete-comments.php?id=" . $row['id'] . "&type=comments' class='p-2 border border-0   rounded-2xl text-red-600 mr-5 hover:bg-[#ff0000ab]  hover:text-black' >Sil</a>
                <a href ='./comment-update-form.php?id=" . $row ['id'] . "'class='p-2 border border-0   rounded-2xl text-green-600 mr-5 hover:bg-[#11a411b0]  hover:text-black mb-3 ' >Güncelle</a></div>
                <hr class='mt-4'>
      </div>";
        }


    }

    ?>
    <button id='topluYorumSilme' type='submit' name='sil' class='mt-4 p-2 bg-red-600 text-white rounded' disabled>Seçili Yorumları Sil</button>
</form>


    <p class='my-4 text-7xl text-black flex justify-center items-center text-center'> YANITLAR </p> <hr class='mt-4'>

<form id="silReplyForm" method="post" action="../db/crud/delete-reply.php">
    <?php
    $sorguRepyl="SELECT * FROM replies where user_id=$userId";
    $dataReply = $deneme->query($sorguRepyl);


    while ($rowReply = $dataReply->fetch_assoc()) {
        $commentId=$rowReply['comment_id'];
        $commentShow = "SELECT * FROM comments WHERE id=$commentId";
        $dataCommentShow = $deneme->query($commentShow);
        $comments = $dataCommentShow->fetch_assoc();


        echo "<div style='padding: 0px 95px;' class='px-[30rem] text-black'>
           <input type='text' class='hidden' style='display:none' value='" . $rowReply['id'] . "'>
        <div class='mt-4'> Yorumun Kendisi: "  . htmlspecialchars($comments['comment']) . "</div>
        <div style='height: 10px;'></div>
        <div> Yanıt: " . $rowReply['reply_comment'] . "</div>

                    <input type='checkbox' class='reply-checkbox' name='reply_ids[]' value='" . htmlspecialchars($rowReply['id']) . "' onchange='checkReplyCheckboxes()'>
<div class='mt-5'>
        <a href = '../db/crud/delete-reply.php?id=" . $rowReply['id'] . "&type=reply' class='p-2 border border-0   rounded-2xl text-red-600 mr-5 hover:bg-[#ff0000ab]  hover:text-black' >Sil</a>
                <a href ='./reply-update-form.php?id=" . $rowReply ['id'] . "' class='p-2 border border-0   rounded-2xl text-green-600 mr-5 hover:bg-[#11a411b0]  hover:text-black mb-3 ' >Güncelle</a></div>
                <hr class='mt-4'>
      </div>";


    }


}
?>

<button id='topluYanıtSilme' type='submit' name='silReply' class='mt-4 p-2 bg-red-600 text-white rounded' disabled>Seçili Yanıtları Sil</button>
</form>



<script>
    window.addCommentListener("load", () => {
        const loader = document.querySelector(".loader");
        loader.classList.add("loader--hidden");
        loader.addCommentListener("transitionend", () => {
            document.body.removeChild(loader);
        });
    });





    function checkCheckboxes() {
        const checkboxes = document.querySelectorAll('.comment-checkbox');
        const button = document.getElementById('topluYorumSilme');
        let isChecked = false;

        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                isChecked = true;
            }
        });

        button.disabled = !isChecked;
    }
    document.getElementById("silForm").onsubmit = function(comment) {
        const checkboxes = document.querySelectorAll('.comment-checkbox');
        let isChecked = false;

        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                isChecked = true;
            }
        });

        if (!isChecked) {
            alert('Seçili yorum yok. Lütfen silmek için en az bir yorum seçin.');
            comment.preventDefault();
        } else {
            // Kullanıcıdan onay al
            return confirm('Seçili yorumları silmek istediğinize emin misiniz?');
        }
    };







    function checkReplyCheckboxes() {
        const checkboxes = document.querySelectorAll('.reply-checkbox');
        const button = document.getElementById('topluYanıtSilme');
        let isChecked = false;

        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                isChecked = true;
            }
        });

        button.disabled = !isChecked;
    }
    document.getElementById("silReplyForm").onsubmit = function(reply) {
        const checkboxes = document.querySelectorAll('.reply-checkbox');
        let isChecked = false;

        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                isChecked = true;
            }
        });

        if (!isChecked) {
            alert('Seçili yorum yok. Lütfen silmek için en az bir yorum seçin.');
            reply.preventDefault();
        } else {
            // Kullanıcıdan onay al
            return confirm('Seçili yorumları silmek istediğinize emin misiniz?');
        }
    };
</script>
</body></html>