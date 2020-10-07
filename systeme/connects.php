<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
/* ملف الاتصال بقاعدة البيانات */
$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '';
$db_database	= 'infos'; 

/* تعريف الاتصال بقاعدة البيانات */

$db = new PDO('mysql:host='.$db_host.';charset=utf8;dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

?>