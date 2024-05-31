<?php
//require 'db/connect.php';
#Kết nối database
require 'db/config.php';
require 'db/database.php';

#Kết nối thư viện
require 'lib/validation.php';
require 'lib/data.php';
require 'lib/url.php';

?>
<?php
db_connect($config);
$mod = !empty($_GET['mod']) ? $_GET['mod'] : 'home';
$act = !empty($_GET['act']) ? $_GET['act'] : 'main';
$path = "modules/$mod/{$act}.php";

if (file_exists($path)) {
    require ($path);
} else {
    require 'inc/404.php';
}
?>
