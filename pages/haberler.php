<?php
session_start();
include('../db/db.php');

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$sesUser = $_SESSION['user']['id'];
$userName = $_SESSION['user']['name'];

$sorgu = "SELECT * FROM news";
$data = $deneme->query($sorgu);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Haberler</title>

    <link rel="stylesheet" href="../plugins/fontawesome-free-6.6.0-web/css/fontawesome.css">
    <link rel="stylesheet" href="../plugins/fontawesome-free-6.6.0-web/css/solid.min.css">
     <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../plugins/node_modules/tailwindcss/tailwind.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-orange-50">

<a href='./haber-ekleme.php'>
    <img src='../src/assets/icos/plus.png'
         class='absolute top-4 right-4 border border-green-600 p-3 rounded-full hover:bg-green-500' alt='add'/>
</a>

<!-- Loading Screen -->

<!-- Navigation -->
<div class="flex flex-row justify-center items-center text-3xl justify-evenly">
    <div>
        <a class="anim text-black" href="./index.php">Anasayfa</a>
    </div>
    <div>
        <a class="anim text-black" href="./etkinlikler.php">Etkinlikler</a>
    </div>
    <div>
        <a class="anim text-black" href="./hareketlerim.php">Hareketlerim</a>
    </div>
</div>

<style>
    .selected {
        color: dodgerblue;
    }
</style>

<?php
if ($data->num_rows > 0) {
    while ($row = $data->fetch_assoc()) {
        $news_id = $row['id'];
        $news_created_date = $row['created_at'];
        $user_id = $row['user_id'];

        $likesQuery = "SELECT COUNT(*) AS likes FROM likes WHERE news_id = $news_id AND type = 'like'";
        $likesResult = mysqli_query($deneme, $likesQuery);
        $likesCount = mysqli_fetch_assoc($likesResult)['likes'];

        $typeQuery = "SELECT type FROM likes WHERE news_id = $news_id AND user_id = $sesUser";
        $typeResult = mysqli_query($deneme, $typeQuery);
        $type = (mysqli_num_rows($typeResult) > 0) ? mysqli_fetch_assoc($typeResult)['type'] : 0;

        $userQuery = "SELECT name FROM users WHERE id = $user_id";
        $userResult = mysqli_query($deneme, $userQuery);
        $userCount = mysqli_fetch_assoc($userResult);

        $commentQuery = "SELECT id, comment, created_at FROM comments WHERE news_id = $news_id";
        $commentResult = mysqli_query($deneme, $commentQuery);

        echo '
        <div>
            <section class="bg-white p-2 md:p-6 rounded-2xl border border-gray-300 max-w-xl mx-auto mt-[15vh] ">
                <details open class="border-b border-gray-300">
                    <summary class="outline-none list-none py-6 text-lg font-bold cursor-pointer relative flex justify-between rounded-lg select-none hover:after:opacity-75 focus-visible:ring-4 focus-visible:ring-gray-100">
                        <div style="font-weight: bold; font-size: 20px;">' . htmlspecialchars($row["baslik"]) . '</div>
                    </summary>
                    <article class="animate-slide-in">
                        <div style="font-weight: bold; font-size: 20px;">Paylaşan: ' . htmlspecialchars($userCount["name"]) . '</div>
                        <div class="my-4">
                            <p>' . htmlspecialchars($row["haber"]) . '</p>
                            <div class="text-gray-500 text-sm">Gönderi Tarihi: ' . htmlspecialchars($row["created_at"]) . '</div>
                        </div> 
                        <div class="flex flex-row gap-3">
                            <a href="./comments.php?id=' . $row["id"] . '" class="pr-2 anim-comment">
                                <i class="fa-regular fa-comment"></i>
                            </a>
                            <button class="like ' . (($type == "like") ? "selected" : "") . '" 
                                data-new-id="' . $news_id . '"
                                onclick="like(this, ' . $row["id"] . ')">
                                <i class="fa-regular anim-like fa-thumbs-up"></i>
                                <span class="likes_count" data-count="' . $likesCount . '">' . $likesCount . '</span>
                            </button>
                        </div>
                    </article>
                </details>

                <details class="border-b border-gray-300">
                    <summary class="outline-none list-none py-6 text-lg font-bold cursor-pointer relative flex justify-between rounded-lg select-none hover:after:opacity-75 focus-visible:ring-4 focus-visible:ring-gray-100">
                        Yorumları görmek için
                    </summary>
                    <article class="animate-slide-in">';

        while ($commentRow = mysqli_fetch_assoc($commentResult)) {
            echo '
                <div class="my-4">
                
                         <div class="text-gray-400 text-md">Yorum Yapan: ' . htmlspecialchars($userCount["name"]) .' </div>
                    <p>' . htmlspecialchars($commentRow["comment"]) . '</p>
                    <div class="text-gray-500 text-sm">Yorum Tarihi: ' . htmlspecialchars($commentRow["created_at"]) . '</div>
                    <div id="comments">
                        <div class="comment" id="comment' . $commentRow["id"] . '">
                            <button class="text-blue-600" onclick="showReplyForm(' . $commentRow["id"] . ')">Cevapla</button>
                            <form action="../db/replies-db.php" method="post" class="reply-form max-w-md mx-auto mt-4" style="display:none;" id="replyForm-' . $commentRow["id"] . '">
                                <div>
                                    <textarea name="reply_comment" id="reply_comment-' . $commentRow["id"] . '" placeholder="Yanıtınızı yazın..." class="w-full border border-gray-300 rounded-lg p-2"></textarea>
                                    <input type="hidden" name="comment_id" value="' . $commentRow["id"] . '">
                                    <button name="submit" type="submit" value="submit" id="submit-' . $commentRow["id"] . '"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Paylaş
                                    </button>
                                </div>
                            </form>';

            $replyQuery = "SELECT id, reply_comment, created_at FROM replies WHERE comment_id = " . $commentRow["id"];
            $replyResult = mysqli_query($deneme, $replyQuery);

            while ($replyRow = mysqli_fetch_assoc($replyResult)) {
                echo '
                    <div class="my-1 ml-4">
                         <div class="text-gray-400 text-md">Cevaplayan: ' . htmlspecialchars($userCount["name"]) .' </div>
                   
                        <p class="text-black-600 text-sm">' . htmlspecialchars($replyRow["reply_comment"]) . '</p>
                        <div class="text-gray-400 text-xs">Cevap Tarihi: ' . htmlspecialchars($replyRow["created_at"]) . '</div>
                    </div>';
            }

            echo '
                        </div>
                    </div>
                </div>';
        }

        echo '
                    </article>
                </details>
            </section>
        </div>';
    }
}

?>

<script>
    function like(element, newsId) {

        window.addEventListener("load", () => {
        const loader = document.querySelector(".loader");
        loader.classList.add("loader--hidden");
        loader.addEventListener("transitionend", () => {
            document.body.removeChild(loader);
        });
    });


        // AJAX call to like or unlike
        $.post('../db/like-db.php', {news_id: newsId, user_id: <?php echo $sesUser; ?>}, function(response) {
            if (response.success) {
                const likesCountElement = $(element).find('.likes_count');
                const currentCount = parseInt(likesCountElement.attr('data-count'));
                const newCount = response.liked ? currentCount + 1 : currentCount - 1;
                likesCountElement.text(newCount).attr('data-count', newCount);
                $(element).toggleClass('selected');
            }
        }, 'json');
    }
    function like(caller, news_id) {
        const isLiked = caller.classList.contains('selected');
        const userId = <?php echo $sesUser; ?>;
        const data = new URLSearchParams();
        data.append('news_id', news_id);
        data.append('user_id', userId);
        data.append('type', isLiked ? 'unlk' : 'like');

        fetch('../db/likes-news-db.php', {
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
    function showReplyForm(commentId) {
        $('#replyForm-' + commentId).toggle();
    }
</script>

</body>
</html>
