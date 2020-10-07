<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 
//1
if(isset($_GET['id']))
{
 echo $id=$_GET['id'];
	include('../dbcon/dbcon.php');
$del=mysql_query("delete from systematical where id ='$_GET[id]'");
if($del)
{
echo "<script> alert ('تم حذف التصديق');</script>";
echo "<meta http-equiv='refresh' content='0;url=info.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف التصديق');</script>";
echo "<meta http-equiv='refresh' content='0;url=info.php'>";
}}
?>

