<?php
include('../db/db.php'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yanıt Güncelleme Formu</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800">
<?php
$reply_id = $_GET['id'];


$stmt = $deneme->prepare("SELECT id, reply_comment FROM replies WHERE id = ?");
$stmt->bind_param("i", $reply_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    ?>
    <p class="text-3xl justify-center flex dark:text-gray-400">Yanıt Güncelleme <br> Formuna Hoşgeldiniz</p>
    <form action="../db/reply-update.php" method="post" class="mt-4 max-w-md mx-auto ">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="yanıt" id="yanıt"
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required value="<?php echo $row['reply_comment']; ?>"/>
            <label for="yanıt"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Yanıt</label>
        </div>

        <button type="submit" name="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Güncelle
        </button>
    </form>
    <?php
} else {
    echo "<p>Bu ID ile eşleşen yanıt bulunamadı.</p>";
}
$stmt->close();
$deneme->close();
?>
<div class="absolute z-50 w-full bottom-0 left-0 bg-transparent text-[white]">
    <?php
    $footer='../src/components/footer.php';
    include $footer;

    ?>
</div>
</body>
</html>
