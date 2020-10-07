
<?php 
if(isset($_GET['min']))
{
include('dbcon/dbcon.php');
$sql=mysql_query("select * from storing where barco='$_GET[min]'");
$row=mysql_fetch_array($sql);
 $bg=$row['qunt']+1;



$ups=mysql_query("update storing set qunt='$bg' where barco='$_GET[min]'");


$sq=mysql_query("select * from  sales where product ='$_GET[min]' and transaction_id='$_GET[transaction_id]' ");
$rw=mysql_fetch_array($sq);
$qty=$rw['qty'];

$qx=$qty-1;
include('dbcon/dbcon.php');
$upd=mysql_query("update sales set qty='$qx' where  product ='$_GET[min]' and transaction_id='$_GET[transaction_id]'");
echo "<meta http-equiv='refresh' content='0;url=posss.php'>";
}
?>