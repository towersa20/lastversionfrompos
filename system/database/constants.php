<?php
$dbs=mysql_connect("localhost","root","");
mysql_select_db("infos",$dbs);
mysql_query('SET character_set_results=UTF8');
mysql_query('SET name=UTF8');
mysql_query('SET character_set_client=UTF8');
mysql_query('SET character_set_connection=UTF8');
mysql_query('SET character_set_results=UTF8');
mysql_query('SET collation_set_connection=UTF8_general_ci');
?>

<?php
  header ('Content-Type: text/html; charset=UTF-8');
    ini_set('default_charset','UTF-8');


define("HOST","localhost");
define("USER","root");
define("PASS","");
define("DB","infos");
define("DOMAIN","http://127.0.0.1/pos/System");

/* check connection 
$mysqli = new mysqli("localhost", "root", "", "infos");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

printf("Initial character set: %s\n", $mysqli->character_set_name());

/* change character set to utf8 
if (!$mysqli->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
    exit();
} else {
    printf("Current character set: %s\n", $mysqli->character_set_name());
}

$mysqli->close();*/
?>