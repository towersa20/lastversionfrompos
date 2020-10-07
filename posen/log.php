<?php
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php include("dbcon/dbcon.php");
if($_POST['username'])
{
$up=mysql_query("update user set lastlog=now() where username = '$_POST[username]'");
$sql=mysql_query("select * from users where username='$_POST[username]' && password='$_POST[password]' ");
$row=mysql_fetch_array($sql);
$_SESSION["id"]=$row["id"];
$_SESSION["uname"]=$row["name"];
$_SESSION["level"]=$row["level"];
switch($row["level"])
{
case 1:
echo "<meta http-equiv='refresh' content='0;url=index.php'>";
break;
case 2:
echo "<meta http-equiv='refresh' content='0;url=index.php'>";
break;
case 3:
echo "<meta http-equiv='refresh' content='0;url=index.php'>";
break;
case 4:
echo "<meta http-equiv='refresh' content='0;url=index.php'>";
break;
default :
echo"<script>alert('أدخلت بيانات خاطئة الرجاء ادخال المعلومات الصحيحة');</script>";
require("login.php");
}
}
?>

<?php  /*
if(isset($_POST['ok']))
{
include("dbcon/dbcon.php");
$in=mysql_query("insert into logfile values('','$_SESSION[uname]',now(),'قام بالدخول الي النظام','0',now())");

}*/?>