
<?php
echo "<link rel='shortcut icon' href='../src/assets/icos/favicon.ico' type='image/x-icon'>";
$servername = "127.0.0.1";
$username = "root";
$password = "";
$db_name = "proje-1-haberler";
$deneme = new mysqli($servername, $username, "", $db_name, 3306);
if($deneme->connect_error){
    die("Connection failed".$deneme->connect_error);
}
echo "";

?>