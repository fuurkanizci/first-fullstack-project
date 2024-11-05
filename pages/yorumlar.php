<?php include('../db/db.php'); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yorumlarım</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../plugins/fontawesome-free-6.6.0-web/css/fontawesome.css">
    <link rel="stylesheet" href="../plugins/fontawesome-free-6.6.0-web/css/solid.min.css">
    <link rel="stylesheet" href="../src/components/loading/loading.css">
    <link rel="stylesheet" href="../pages/style.css ">
    <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
</head>

<body class="bg-orange-50">


<div id="loading" class="loader loader-index"></div>
<nav class="relative px-4 py-4 flex justify-between items-center">
    <div class="lg:hidden">
        <button id="navbar-burger" class="navbar-burger flex items-start text-[#f0a500] p-3">
            <svg class="block h-6 w-6 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
    </div>
    <ul id="navbar-menu" class=" burger-width justify-center hidden absolute mt-6 top-1/2 left-1/2 gap-12 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
        <li><a class="text-3xl text-black hover:text-[#f0a500]" href="./index.php">Ana Sayfa</a></li>
        <li><a class="text-3xl text-black hover:text-[#f0a500]" href="./hareketlerim.php">Hareketlerim</a></li>
        <li><a class="text-3xl text-black hover:text-[#f0a500]" href="./paylasilan-haberler.php">Paylaşılan Haberler</a></li>
        <li><a class="text-3xl text-black hover:text-[#f0a500]" href="./paylasilan-etkinlikler.php">Paylaşılan Etkinlikler</a></li>
        <li><a class="text-3xl text-black hover:text-[#f0a500]" href="./begeniler.php">Beğenilerim</a></li>
        <li>
            <a id="logOutButton" class="p-2 text-3xl border-none hover:border-[red] rounded-full hover:text-[#ff0000] hover:bg-[#FF000028]">
                <i class="fa-solid fa-right-from-bracket"></i>
            </a>
        </li>
    </ul>
</nav>

<div class="navbar-menu relative z-50 hidden">
    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
    <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-orange-50 border-r overflow-y-auto">
        <div class="flex items-center mb-8">
            <button id="navbar-close" class="navbar-close">
                <svg class="h-6 w-6 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div>
            <ul>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded" href="./index.php">Ana Sayfa</a></li>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded" href="./hareketlerim.php">Hareketlerim</a></li>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded" href="./paylasilan-haberler.php">Paylaşılan Haberler</a></li>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded" href="./paylasilan-etkinlikler.php">Paylaşılan Etkinlikler</a></li>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded" href="./begeniler.php">Beğenilerim</a></li>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-red-200 hover:text-[red] rounded" href="../db/logout.php">Çıkış</a></li>
            </ul>
        </div>
    </nav>
</div>

<form class="mt-12" id="silForm" method="post" action="../db/crud/delete-comments.php">
    <?php
    $userId = $_SESSION['user']['id'];
    $sorgu = "SELECT * FROM comments WHERE user_id = ?";
    $stmt = $deneme->prepare($sorgu);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $data = $stmt->get_result();

    if ($data->num_rows > 0) {
        while ($row = $data->fetch_assoc()) {
            $eventId = $row['events_id'] ?? null;
            $newsId = $row['news_id'] ?? null;

            if ($eventId) {
                $eventShow = "SELECT * FROM events WHERE id = ?";
                $stmtEvent = $deneme->prepare($eventShow);
                $stmtEvent->bind_param('i', $eventId);
                $stmtEvent->execute();
                $events = $stmtEvent->get_result()->fetch_assoc();

                echo "<div class='px-[30rem] text-black'>
                    <div>Etkinlik: " . htmlspecialchars($events['kategori']) . "</div>
                    <div>Yorum: " . htmlspecialchars($row['comment']) . "</div>
                    <input type='checkbox' class='comments-checkbox' name='comments_ids[]' value='" . htmlspecialchars($row['id']) . "'>
                    <div class='mt-5'>
                        <a href='../db/crud/delete-comments.php?id=" . $row['id'] . "&type=comments' class='p-2  rounded-2xl text-red-600 mr-5 hover:bg-[#ff0000ab] hover:text-black'>Sil</a>
                        <a href='./comment-update-form.php?id=" . $row['id'] . "' class='p-2 rounded-2xl text-green-600 mr-5 hover:bg-[#11a411b0] hover:text-black'>Güncelle</a>
                    </div>
                    <hr class='mt-4'>
                </div>";
            }

            if ($newsId) {
                $newsShow = "SELECT * FROM news WHERE id = ?";
                $stmtNews = $deneme->prepare($newsShow);
                $stmtNews->bind_param('i', $newsId);
                $stmtNews->execute();
                $news = $stmtNews->get_result()->fetch_assoc();

                echo "<div class='px-[30rem] text-black'>
                    <div>Haber: " . htmlspecialchars($news['haber']) . "</div>
                    <div>Yorum: " . htmlspecialchars($row['comment']) . "</div>
                    <input type='checkbox' class='comments-checkbox' name='comments_ids[]' value='" . htmlspecialchars($row['id']) . "'>
                    <div class='mt-5'>
                        <a href='../db/crud/delete-comments.php?id=" . $row['id'] . "&type=comments' class='p-2 rounded-2xl text-red-600 mr-5 hover:bg-[#ff0000ab] hover:text-black'>Sil</a>
                        <a href='./comment-update-form.php?id=" . $row['id'] . "' class='p-2 rounded-2xl text-green-600 mr-5 hover:bg-[#11a411b0] hover:text-black'>Güncelle</a>
                    </div>
                    <hr class='mt-4'>
                </div>";
            }
        }
    }

    $stmt->close();
    ?><div class="flex flex-row justify-center  ">
    <button id="topluYorumSilme" type="submit" name="silYorum" class="p-2  rounded-2xl text-red-600 bg-red-100 hover:bg-red-200"
            disabled>Seçili Yorumları Sil
    </button>
    </div>
</form>
<p class='my-4 text-7xl text-black flex justify-center items-center text-center'>YANITLAR</p>
<hr class='mt-4'>
<form id="silReplyForm" method="post" action="../db/crud/delete-reply.php">
    <?php
    $sorguReply = "SELECT * FROM replies WHERE user_id = ?";
    $stmtReply = $deneme->prepare($sorguReply);
    $stmtReply->bind_param('i', $userId);
    $stmtReply->execute();
    $dataReply = $stmtReply->get_result();

    while ($rowReply = $dataReply->fetch_assoc()) {
        $commentId = $rowReply['comment_id'];
        $commentShow = "SELECT * FROM comments WHERE id = ?";
        $stmtComment = $deneme->prepare($commentShow);
        $stmtComment->bind_param('i', $commentId);
        $stmtComment->execute();
        $comments = $stmtComment->get_result()->fetch_assoc();

        echo "<div class='px-[30rem] text-black'>
            <div class='mt-4'>Yorumun Kendisi: " . htmlspecialchars($comments['comment']) . "</div>
            <div>Yanıt: " . htmlspecialchars($rowReply['reply_comment']) . "</div>
            <input type='checkbox' class='reply-checkbox' name='reply_ids[]' value='" . htmlspecialchars($rowReply['id']) . "'>
            <div class='mt-5'>
                <a href='../db/crud/delete-reply.php?id=" . $rowReply['id'] . "&type=reply' class='p-2 rounded-2xl text-red-600 mr-5 hover:bg-[#ff0000ab] hover:text-black'>Sil</a>
                <a href='./reply-update-form.php?id=" . $rowReply['id'] . "' class='p-2 rounded-2xl text-green-600 mr-5 hover:bg-[#11a411b0] hover:text-black mb-3'>Güncelle</a>
            </div>
            <hr class='mt-4'>
        </div>";
    }

    $stmtReply->close();
    ?><div class="flex flex-row justify-center">
    <button id="topluYanitSilme" type="submit" name="silReply"
            class="p-2  rounded-2xl text-red-600 bg-red-100 hover:bg-red-200" disabled>Seçili Yanıtları Sil
    </button></div>

</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../plugins/js/jquery.timeago.js"></script>
<script>
    $(document).ready(function () {
        $('#loading').fadeOut(500);
    });
    document.querySelectorAll('.comments-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', checkCommentCheckboxes);
    });

    function checkCommentCheckboxes() {
        const checkboxes = document.querySelectorAll('.comments-checkbox');
        const button = document.getElementById('topluYorumSilme');
        const isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
        button.disabled = !isChecked;
        console.log('yorum ceckbox durumu:', Array.from(checkboxes).map(checkbox => checkbox.checked));
    }

    document.querySelectorAll('.reply-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', checkReplyCheckboxes);
    });

    function checkReplyCheckboxes() {
        const checkboxes = document.querySelectorAll('.reply-checkbox');
        const button = document.getElementById('topluYanitSilme');
        const isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
        button.disabled = !isChecked;
        console.log('Yanıt checkbox durumu:', Array.from(checkboxes).map(checkbox => checkbox.checked));
    }

    document.getElementById("silForm").onsubmit = function (event) {
        const checkboxes = document.querySelectorAll('.comments-checkbox');
        const isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
        if (!isChecked) {
            alert('Seçili yorum yok. Lütfen silmek için en az bir yorum seçin.');
            event.preventDefault();
        } else {
            return confirm('Seçili yorumları silmek istediğinize emin misiniz?');
        }
    };

    document.getElementById("silReplyForm").onsubmit = function (event) {
        const checkboxes = document.querySelectorAll('.reply-checkbox');
        const isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
        if (!isChecked) {
            alert('Seçili yanıt yok. Lütfen silmek için en az bir yanıt seçin.');
        } else {
            return confirm('Seçili yanıtları silmek istediğinize emin misiniz?');
        }
    };

    document.addEventListener('DOMContentLoaded', () => {
        checkCommentCheckboxes();
        checkReplyCheckboxes();
    });





    document.addEventListener('DOMContentLoaded', function () {
        const burger = document.querySelector('.navbar-burger');
        const menu = document.querySelector('.navbar-menu');

        if (burger && menu) {
            burger.addEventListener('click', function () {
                menu.classList.toggle('hidden');
            });
        }

        const closeButtons = document.querySelectorAll('.navbar-close, .navbar-backdrop');
        closeButtons.forEach(close => {
            close.addEventListener('click', function () {
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

    <?php
    $footer='../src/components/footer.php';
    include $footer;

    ?>
</body>
</html>
