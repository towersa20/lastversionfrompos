<?php include('header.php');?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>تعديل</title>
<style type="text/css">
<!--
.style2 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
</head>
<?php
if(isset($_POST["ok"]))
{
include("dbcon/config.php");
//$up=mysql_query("update info set formatid='$_POST[b]', item='$_POST[a]', qunt='$_POST[c]', price='$_POST[d]', type='$_POST[e]', cust='$_POST[f]' where id='$_GET[epoid]'");

else
{
include("dbcon/config.php");
$d=mysql_query("select*from info where id='$_GET[epoid]'");
$row=mysql_fetch_array($d);
?>

 <div class="app-content content container-fluid">
<br>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <table style="width:100%; " align="center" class="table table-bordered table-hover">
    <tr>
      <td colspan="8">تعديــل فاتورة مبيعات</td>
    </tr>
    <tr>
      <td>إسم الصنف</td>
      <td colspan="7"><input type="text" name="cust" style="border: 0px;" class="form-control " required id="search" placeholder="اختر الصنف" list="searchrt" autocomplete="off">
	<datalist id="searchrt">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select * from products");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['pid'];?>" ><?php echo $res['product_name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>
    </tr>
							
    <tr>
      <td style="width:10%; ">رقم الفاتورة</td>
      <td><input type="text" name="b" class="form-control" style="border:0px;" value="<?php echo $row['formatid'];?>" required autocomplete="off"></td>
      <td>الكمية</td>
      <td><input type="number" name="c" class="form-control" style="border:0px;" value="<?php echo $row['qunt'];?>" required autocomplete="off"></td>
      <td>السعر</td>
      <td><input type="number" name="d" class="form-control" style="border:0px;" value="<?php echo $row['price'];?>" required autocomplete="off"></td>
      <td>الدفع</td>
      <td> <select name="e" class="form-control" style="border: 0px; height: 35px;" id="payment_type" required/>
            <option value="نقدا">نقــــــدا</option>
            <option value="شبكة">شبكــة</option>
            </select></td>
    </tr>
    <tr>
      <td>إسم العميـل</td>
      <td><input type="text" name="f" class="form-control" style="border:0px;" value="<?php echo $row['cust'];?>" required autocomplete="off"></td>
    <td>المستخدم</td>
      <td><input type="text" name="g" readonly="" class="form-control" style="border:0px;" value="<?php echo $row['user'];?>" required autocomplete="off"></td>
      <td>التاريخ</td>
      <td><input type="date" name="h" class="form-control" style="border:0px;" value="<?php echo $row['date'];?>" required autocomplete="off"></td>
      <td style="width:7%;">الوقت</td>
      <td><input type="text" name="h" class="form-control" style="border:0px;" value="<?php echo $row['dateitem'];?>" required autocomplete="off"></td>
    </tr>
	</table>
	  <table style="width:100%; " align="center" class="table table-borderd table-hover">

	<tr>
	<td style="width:20%;"></td>
	<td style="width:20%;"></td>
	<td style="width:20%;"></td>
    <td style="width:20%;"><button type="submit" name="ok" class="btn btn-success" style="width:100%;"> تعديــــل <i class="fa fa-edit"></i></button></td>
    <td style="width:20%;"><button type="reset" class="btn btn-warning" style="width:100%;"> الغــــــاء <i class="fa fa-home"></i></button></tr>
</tr>
  </table>
</form></div>
</body>
</html>
<?php
}}?> 
<br>
<br>
<br>
<br>

<?php if(isset($_POST['ok1']))
{
include("dbcon/dbcon.php");
$x1=$_POST['c'];
$x2=$_POST['d'];
$x3=$x1*$x2;
$up=mysql_query("update sales set name='$_POST[a]', barco='$_POST[b]', qunt='$_POST[c]', price='$_POST[d]', total='$x3', date='$_POST[f]', code='$_POST[g]' where sid='$_GET[esid]'");
if($up)
{
echo "<script> alert ('تم تعديل فاتورة المبيعات');</script>";
echo "<meta http-equiv='refresh' content='0;url=print2.php?&&f2=$_POST[g]'>";
}
else
{
echo "<script> alert ('لم يتم تعديل فاتورة المبيعات');</script>";
echo "<meta http-equiv='refresh' content='0;url=vsales.php'>";
}
}?>
<?php if(isset($_POST['ok2']))
{
include("dbcon/dbcon.php");
$x1=$_POST['c'];
$x2=$_POST['d'];
$x3=$x1*$x2;
$up=mysql_query("update sales set name='$_POST[a]', barco='$_POST[b]', qunt='$_POST[c]', price='$_POST[d]', total='$x3', date='$_POST[f]', code='$_POST[g]' where sid='$_GET[esid]'");
if($up)
{
echo "<script> alert ('تم تعديل فاتورة المبيعات');</script>";
echo "<meta http-equiv='refresh' target='_blank' content='0;url=print2.php?&&f=$_POST[g]'>";

}
else
{
echo "<script> alert ('لم يتم تعديل فاتورة المبيعات');</script>";
echo "<meta http-equiv='refresh' content='0;url=vsales.php'>";
}
}?>