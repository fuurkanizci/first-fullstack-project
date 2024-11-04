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
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <link rel="stylesheet" href="../src/components/loading/loading.css">
</head>
<body class="bg-orange-50">

<a href='./haber-ekleme.php'>
    <img src='../src/assets/icos/plus.png'
         class='absolute top-4 right-4 border border-green-600 p-3 rounded-full hover:bg-green-500' alt='add'/>
</a>

<!-- Loading Screen -->

<div id="loading" class="loader loader-index"></div>
<!-- Navigation -->

<nav class="relative px-4 py-4 flex justify-between items-center ">
    <div class="lg:hidden">
        <button class="navbar-burger flex items-start text-[#f0a500] p-3">
            <svg class="block h-6 w-6 fill-current " viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Mobile menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
    </div>
    <ul class="hidden absolute  mt-6 top-1/2 left-1/2  gap-12 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
        <li><a class="text-3xl text-black  hover:text-[#f0a500]" href="./index.php">Ana Sayfa</a></li>
        <li><a class="text-3xl text-black  hover:text-[#f0a500]" href="./etkinlikler.php">Etkinlikler</a></li>
        <li><a class="text-3xl text-black  hover:text-[#f0a500]" href="./hareketlerim.php">Hareketlerim</a></li>
        <a id="logOutButton" class="  p-2 border-none hover:border-[red] rounded-full hover:text-[#ff0000] hover:bg-[#FF000028]">
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>
    </ul>



</nav>
<div class="navbar-menu relative z-50 hidden">
    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
    <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-orange-50 border-r overflow-y-auto">
        <div class="flex items-center mb-8">
            <button class="navbar-close">
                <svg class="h-6 w-6 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div>
            <ul>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded" href="./index.php">Ana Sayfa</a></li>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded" href="./etkinlikler.php">Etkinlikler</a></li>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded" href="./hareketlerim.php">Hareketlerim</a></li>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded" href="../db/logout.php">Çıkış</a></li>
            </ul>
        </div>
    </nav>
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

        $commentQuery = "SELECT comments.id, comments.comment, comments.created_at, comments.user_id, users.name AS commenter_name 
                         FROM comments 
                         INNER JOIN users ON comments.user_id = users.id 
                         WHERE comments.news_id = $news_id";
        $commentResult = mysqli_query($deneme, $commentQuery);

        while ($commentRow = mysqli_fetch_assoc($commentResult)) {
            echo '
                <div class="my-4">
                    <div class="text-gray-400 text-md">Yorum Yapan: ' . htmlspecialchars($commentRow["commenter_name"]) . '</div>
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

            $replyQuery = "SELECT replies.id, replies.reply_comment, replies.created_at, users.name AS replier_name 
                           FROM replies 
                           INNER JOIN users ON replies.user_id = users.id 
                           WHERE replies.comment_id = " . $commentRow["id"];
            $replyResult = mysqli_query($deneme, $replyQuery);

            while ($replyRow = mysqli_fetch_assoc($replyResult)) {
                echo '
                    <div class="my-1 ml-4">
                        <div class="text-gray-400 text-md">Cevaplayan: ' . htmlspecialchars($replyRow["replier_name"]) . '</div>
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
    window.addEventListener("load", () => {
        const loader = document.querySelector(".loader");
        loader.classList.add("loader--hidden");
        loader.addEventListener("transitionend", () => {
            document.body.removeChild(loader);
        });
    });

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
        const replyForm = document.getElementById(`replyForm-${commentId}`);
        replyForm.style.display = replyForm.style.display === "none" ? "block" : "none";
    }
    document.addEventListener('DOMContentLoaded', function() {
        // Hamburger menüyü açma kapama işlemleri
        const burger = document.querySelector('.navbar-burger');
        const menu = document.querySelector('.navbar-menu');

        if (burger && menu) {
            burger.addEventListener('click', function() {
                menu.classList.toggle('hidden');
            });
        }

        const closeButtons = document.querySelectorAll('.navbar-close, .navbar-backdrop');
        closeButtons.forEach(close => {
            close.addEventListener('click', function() {
                menu.classList.add('hidden');
            });
        });

        document.getElementById("logOutButton").addEventListener("click", function () {
            if (confirm('Çıkmak İstediğine Emin Misin ?')) {
                window.location.href = "../db/logout.php";
            }
            return false;
        });
    });
</script>

</body>
</html>
