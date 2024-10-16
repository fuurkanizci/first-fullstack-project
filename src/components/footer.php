

<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
include('../../db/db.php');
include('../../db/data.php');
?>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="../../plugins/node_modules/tailwindcss/tailwind.css">
<footer class="text-white p-5 text-left fixed bottom-0 w-full">
    <div class="flex justify-around max-w-full m-auto ">

        <p class="absolute left-[45%] bottom-2 text-[#f0a500]"><a class="anim" href="https://www.instagram.com/furkanizci10/profilecard/?igsh=MTc2aXpoY2psYngzZA=="><?= $designed ?></a></p>
    </div>

</footer>