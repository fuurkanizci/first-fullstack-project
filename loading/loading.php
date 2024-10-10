<!doctype html>
<html lang="en">
<head>
    <link rel='shortcut icon' href='../assets/icos/favicon.ico' type='image/x-icon'>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="loading.css">
</head>
<body>
<div id="loading" class="loader loader-index"></div>
<script> window.addEventListener("load", () => {
        const loader = document.querySelector(".loader");

        loader.classList.add("loader--hidden");

        loader.addEventListener("transitionend", () => {
            document.body.removeChild(loader);
        });
    });
</script>
</body>
</html>