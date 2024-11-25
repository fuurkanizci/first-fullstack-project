

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../plugins/node_modules/tailwindcss/tailwind.css">
    <link rel="stylesheet" href="../../pages/style.css">
    <link rel="stylesheet" href="../plugins/fontawesome-free-6.6.0-web/css/fontawesome.css">
    <link rel="stylesheet" href="../plugins/fontawesome-free-6.6.0-web/css/solid.min.css">
</head>
<body>
<nav class="relative px-4 mt-7 flex justify-between items-center ">
    <div class="lg:hidden">
        <button class="navbar-burger flex items-start text-[#f0a500] p-3">
            <svg class="block h-6 w-6 fill-current " viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Mobile menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
    </div>
    <ul class="hidden relative justify-center top-1/2 left-1/2   !w-full  gap-12 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-[85%] lg:space-x-6">
        <li><a class="text-3xl text-white  hover:text-[#f0a500]" href="./index.php">Ana Sayfa</a></li>
        <li><a class="text-3xl text-white  hover:text-[#f0a500]" href="./haberler.php">Haberler</a></li>
        <li><a class="text-3xl text-white  hover:text-[#f0a500]" href="./etkinlikler.php">Etkinlikler</a></li>
        <li><a class="text-3xl text-white  hover:text-[#f0a500]" href="./hareketlerim.php">Hareketlerim</a></li>
        <a id="logOutButton" class="  p-2  text-3xl border-none hover:border-[red] rounded-full hover:text-[#ff0000] hover:bg-[#FF000028]">
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>
    </ul>



</nav>
<div class="navbar-menu fixed z-50 hidden">
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
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded" href="./haberler.php">Haberler</a></li>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded" href="./etkinlikler.php">Etkinlikler</a></li>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-[#f0a500] rounded" href="./hareketlerim.php">Hareketlerim</a></li>
                <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-red-200 hover:text-[red] rounded" href="../db/logout.php">Çıkış</a></li>
            </ul>
        </div>
    </nav>
</div>

<script>
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
