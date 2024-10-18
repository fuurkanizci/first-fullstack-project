<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yorumlar Yapma Formu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../plugins/node_modules/tailwindcss/tailwind.css">
    <link rel="stylesheet" href="../pages/style.css">
    <link rel="stylesheet" href="../src/components/loading/loading.css">
    <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="bg-gray-800">

<?php
include('../db/db.php');

$id = $_GET['id'];
$kategori = null;

$sorguHaber = "SELECT id, baslik, haber, kategori FROM news WHERE id = ?";
$stmt = $deneme->prepare($sorguHaber);

$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$rowHaber = $result->fetch_assoc();

if (!$rowHaber) {
    $sorguEtkinlik = "SELECT id, baslik, icerik, kategori FROM events WHERE id = ?";
    $stmt = $deneme->prepare($sorguEtkinlik);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowEtkinlik = $result->fetch_assoc();

    if ($rowEtkinlik) {
        $kategori = 'etkinlik';
    }
} else {
    $kategori = 'haber';
}
/*
if (isset($_POST['addNewsComment'])) {
    $comment = $deneme->real_escape_string($_POST['comment']);
    $deneme->query("INSERT INTO comments (user_id, comment, created_at) VALUES ('".$_SESSION[user_id]."', $comment', ',NOW())");
    exit('başarı');
}*/


// Yorum formu
if ($kategori === 'haber') {
    echo '<p class="text-3xl justify-center flex dark:text-gray-400">Haber ile ilgili <br>Yorumunuzu aşağıya yazabilirsiniz.</p>
        <form action="../db/create-comments.php" method="post" class="mt-4 max-w-md mx-auto justify-center items-center w-full">
            <input type="hidden" name="id" value="' . htmlspecialchars($rowHaber['id']) . '">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="type" id="type"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required value="haber"/>
                <label for="haber"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Haber</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="yorum" id="yorum"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required/>
                <label for="yorum"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Yorum</label>
            </div>
            <button type="submit" id= "addNewsComment" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Gönder</button>
        </form>';
} elseif ($kategori === 'etkinlik') {
    echo '<p class="text-3xl justify-center flex dark:text-gray-400">Etkinlik ile ilgili <br> Yorumunuzu aşağıya yazabilirsiniz.</p>
        <form action="../db/create-comments.php" method="post" class="mt-4 max-w-md mx-auto">
            <input type="hidden" name="id" value="' . htmlspecialchars($rowEtkinlik['id']) . '">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="type" id="type"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required value="etkinlik"/>
                <label for="icerik"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Etkinlik</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="yorum" id="yorum"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required/>
                <label for="yorum"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Yorum</label>
            </div>
            <button type="submit" id="addEventsComment " class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Gönder</button>
        </form>';
} else {

    echo "<p>Veri bulunamadı.</p>";
}

$stmt->close();
$deneme->close();
?>
<!--<script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>-->
<!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
<!--    <script type="text/javascript">-->
<!--    $(document).ready(function () {-->
<!--        $("#addNewsComment").on('click', function () {-->
<!---->
<!---->
<!--            var comment = $("#yorumNews").val();-->
<!---->
<!--            if (comment.length > 5) {-->
<!--                $.ajax({-->
<!--                    url: 'comments.php',-->
<!--                    method: 'POST',-->
<!--                    dataType: 'text',-->
<!--                    data: {-->
<!--                        addNewsComment: 1,-->
<!--                        comment: comment-->
<!--                    }, success: function (response) {-->
<!--                        console.log(response);-->
<!--                    }-->
<!--                });-->
<!--            } else-->
<!--                alert('girişleri kontrolet')-->
<!--        });-->
<!--    });-->
<!--</script>-->

</body>
</html>









<!---->
<!---->
<!---->
<?php
//// Veritabanı bağlantısını dahil et
//include('../db/db.php');
//
//// Get ile gelen id'yi al (haber ya da etkinlik id'si)
//$id = $_GET['id'] ?? null;
//$kategori = $_GET['kategori'] ?? null;
//
//if (!$id || !$kategori) {
//    echo "Geçersiz veri. Lütfen tekrar deneyin.";
//    exit;
//}
//
//// Kullanıcı oturum kontrolü
//session_start();
//$user_id = $_SESSION['user_id'] ?? null;
//
//// Kategoriye göre haber veya etkinlik yorumlarını listele
//if ($kategori === 'haber') {
//    // Haberle ilgili yorumları çek
//    $sorguYorumlar = "SELECT c.comment, u.username, c.created_at
//                      FROM comments c
//                      JOIN users u ON c.user_id = u.id
//                      WHERE c.news_id = ?";
//    $stmt = $deneme->prepare($sorguYorumlar);
//    $stmt->bind_param('i', $id);
//    $stmt->execute();
//    $result = $stmt->get_result();
//    $yorumlar = $result->fetch_all(MYSQLI_ASSOC);
//
//    // Haber bilgilerini getir
//    $sorguHaber = "SELECT * FROM news WHERE id = ?";
//    $stmt = $deneme->prepare($sorguHaber);
//    $stmt->bind_param('i', $id);
//    $stmt->execute();
//    $haber = $stmt->get_result()->fetch_assoc();
//} elseif ($kategori === 'etkinlik') {
//    // Etkinlikle ilgili yorumları çek
//    $sorguYorumlar = "SELECT c.comment, u.username, c.created_at
//                      FROM comments c
//                      JOIN users u ON c.user_id = u.id
//                      WHERE c.event_id = ?";
//    $stmt = $deneme->prepare($sorguYorumlar);
//    $stmt->bind_param('i', $id);
//    $stmt->execute();
//    $result = $stmt->get_result();
//    $yorumlar = $result->fetch_all(MYSQLI_ASSOC);
//
//    // Etkinlik bilgilerini getir
//    $sorguEtkinlik = "SELECT * FROM events WHERE id = ?";
//    $stmt = $deneme->prepare($sorguEtkinlik);
//    $stmt->bind_param('i', $id);
//    $stmt->execute();
//    $etkinlik = $stmt->get_result()->fetch_assoc();
//} else {
//    echo "Geçersiz kategori.";
//    exit;
//}
//
//// Yorumları listele
//?>
<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>Yorumlar</title>-->
<!--</head>-->
<!--<body>-->
<!---->
<?php //if ($kategori === 'haber'): ?>
<!--    <h1>--><?php //echo htmlspecialchars($haber['baslik']); ?><!-- - Haber Yorumları</h1>-->
<!--    <p>--><?php //echo htmlspecialchars($haber['haber']); ?><!--</p>-->
<?php //elseif ($kategori === 'etkinlik'): ?>
<!--    <h1>--><?php //echo htmlspecialchars($etkinlik['baslik']); ?><!-- - Etkinlik Yorumları</h1>-->
<!--    <p>--><?php //echo htmlspecialchars($etkinlik['icerik']); ?><!--</p>-->
<?php //endif; ?>
<!---->
<!--<h2>Yorumlar</h2>-->
<?php //if (count($yorumlar) > 0): ?>
<!--    <ul>-->
<!--        --><?php //foreach ($yorumlar as $yorum): ?>
<!--            <li>-->
<!--                <strong>--><?php //echo htmlspecialchars($yorum['username']); ?><!--</strong>:-->
<!--                --><?php //echo htmlspecialchars($yorum['comment']); ?>
<!--                <em>(--><?php //echo htmlspecialchars($yorum['created_at']); ?><!--)</em>-->
<!--            </li>-->
<!--        --><?php //endforeach; ?>
<!--    </ul>-->
<?php //else: ?>
<!--    <p>Henüz yorum yapılmamış.</p>-->
<?php //endif; ?>
<!---->
<!--<!-- Yorum yapma formu -->-->
<?php //if ($user_id): ?>
<!--    <h3>Yorum Yap</h3>-->
<!--    <form action="../db/create-comments.php" method="post">-->
<!--        <input type="hidden" name="id" value="--><?php //echo htmlspecialchars($id); ?><!--">-->
<!--        <input type="hidden" name="kategori" value="--><?php //echo htmlspecialchars($kategori); ?><!--">-->
<!--        <textarea name="yorum" placeholder="Yorumunuzu buraya yazın..." required></textarea>-->
<!--        <button type="submit">Yorum Yap</button>-->
<!--    </form>-->
<?php //else: ?>
<!--    <p>Yorum yapabilmek için giriş yapmanız gerekmektedir.</p>-->
<?php //endif; ?>
<!---->
<!--</body>-->
<!--</html>-->
<!---->
<?php
//$stmt->close();
//$deneme->close();
//?>
