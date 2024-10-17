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

// Yorum formu
if ($kategori === 'haber') {
    echo '<p class="text-3xl justify-center flex dark:text-gray-400">Haber ile ilgili <br>Yorumunuzu aşağıya yazabilirsiniz.</p>
        <form action="../db/create-comments.php" method="post" class="mt-4 max-w-md mx-auto justify-center items-center w-full">
            <input type="hidden" name="id" value="' . htmlspecialchars($rowHaber['id']) . '">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="haber" id="haber"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required value="' . htmlspecialchars($rowHaber['haber']) . '"/>
                <label for="haber"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Haber</label>
            </div>    
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="yorum" id="yorum"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required/>
                <label 
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Yorum</label>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Gönder</button>
        </form>';
} elseif ($kategori === 'etkinlik') {
    echo '<p class="text-3xl justify-center flex dark:text-gray-400">Etkinlik ile ilgili <br> Yorumunuzu aşağıya yazabilirsiniz.</p>
        <form action="../db/create-comments.php" method="post" class="mt-4 max-w-md mx-auto">
            <input type="hidden" name="id" value="' . htmlspecialchars($rowEtkinlik['id']) . '">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="icerik" id="icerik"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required value="' . htmlspecialchars($rowEtkinlik['icerik']) . '"/>
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
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Gönder</button>
        </form>';
} else {
    echo "<p>Veri bulunamadı.</p>";
}

$stmt->close();
$deneme->close();
?>

</body>
</html>
