<?php

//كود الاتصال بقاعدة البيانات 
$dbs=mysql_connect("localhost","root","");
mysql_select_db("infos",$dbs);

// كود تعريف اللغة العربيه
mysql_query('SET character_set_results=UTF8');
mysql_query('SET name=UTF8');
mysql_query('SET character_set_client=UTF8');
mysql_query('SET character_set_connection=UTF8');
mysql_query('SET character_set_results=UTF8');
mysql_query('SET collation_set_connection=UTF8_general_ci');
// نهاية كود الاتصال
?>