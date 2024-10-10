
<?php
echo "<link rel='shortcut icon' href='../assets/icos/favicon.ico' type='image/x-icon'>";
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "proje-1-haberler";
$deneme = new mysqli($servername, $username, "", $db_name, 3307);
if($deneme->connect_error){
    die("Connection failed".$deneme->connect_error);
}
echo "";

?>