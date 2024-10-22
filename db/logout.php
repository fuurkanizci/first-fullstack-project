<!doctype html>
<html lang="en">
<head>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../plugins/node_modules/tailwindcss/tailwind.css">
    <meta charset="UTF-8">
    <meta name="viewport"
    <link rel="shortcut icon" href="../src/assets/icos/favicon.ico" type="image/x-icon">
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Çıkış</title>
</head>
<body>
<?php


include 'db.php';

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

header("Location: ../pages/login.php");
exit;

?>
</body>
</html>
