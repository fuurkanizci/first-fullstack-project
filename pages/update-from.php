<!doctype html>
<html lang="en">
<head>

    <link rel="shortcut icon" href="../assets/icos/favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Haber Güncelleme Formuna Hoşgeldiniz</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./node_modules/tailwindcss/tailwind.css">
    <link rel="stylesheet" href="../loading/loading.css">
</head>


<!-- Spinner -->
<div id="loading"  class="loader loader-index"></div>
<script>
    window.addEventListener("load", () => {
        const loader = document.querySelector(".loader");
        loader.classList.add("loader--hidden");
        loader.addEventListener("transitionend", () => {
            document.body.removeChild(loader);
        });
    });
</script>
<body class="bg-gray-800">
<?php
include('../db/db.php');
$id = $_GET['id'];

// Hazırlıklı ifade kullanarak sorguyu oluştur
$sorgu = "SELECT id, baslik, haber, kategori FROM news WHERE id = ?";
$stmt = $deneme->prepare($sorgu);
$stmt->bind_param('i', $id); // ID değerini bağla
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc(); // Sonucu al

// Eğer veri varsa formu doldur
if ($row) {
    ?>

    <p class="text-3xl justify-center flex dark:text-gray-400">Haber Güncelleme <br> Formuna Hoşgeldiniz</p>
    <form action="../db/update-news.php" method="post" class="mt-4 max-w-md mx-auto">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>"> <!-- ID'yi gizli bir input olarak ekliyoruz -->

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="haber_basligi" id="haber_basligi"
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required value="<?php echo $row['baslik']; ?>"/>
            <label for="haber_basligi"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Haber
                Başlığı</label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="haber_konusu" id="haber_konusu"
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required value="<?php echo $row['kategori']; ?>"/>
            <label for="haber_konusu"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Haber
                Konusu</label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="haber" id="haber"
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required value="<?php echo $row['haber']; ?>"/>
            <label for="haber"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Haber</label>
        </div>

        <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Güncelle
        </button>
    </form>

    <?php
} else {
    echo "<p>Veri bulunamadı.</p>";
}
?>

</body>
</html>
