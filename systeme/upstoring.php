<?php
// تعديل بيانات المخزن
// تصميم الشاشة
include('header.php');?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>تعديل</title>

</head>
<?php
if(isset($_POST["ok"]))
{
 // كود التعديل علي بيانات المخزن
include("dbcon/dbcon.php");
$up=mysql_query("update storing set barco='$_POST[barco]',name='$_POST[a]',unit='$_POST[unit]',qunt='$_POST[c]',price='$_POST[cx]',date='$_POST[e]',store='$_POST[f]' where sid='$_GET[xsid]'");
$up=mysql_query("update products set product_price='$_POST[cx]'  where pid='$_POST[barco]' and unit='$_POST[unit]'");
if($up)
{
echo "<script> alert ('تم تعديل الصنف بالمخزن');</script>";
echo "<meta http-equiv='refresh' content='0;url=storing.php'>";
}
else
{
echo "<script> alert ('لم يتم تعديل الصنف بالمخزن');</script>";
echo "<meta http-equiv='refresh' content='0;url=storing.php'>";

}}

else
{
 // كود عرض بيانات المخزن المختارة
include("dbcon/dbcon.php");
$d=mysql_query("select*from storing where sid='$_GET[xsid]'");
$row=mysql_fetch_array($d);
?>

<!-- بداية فورم التعديل-->


 <div class="app-content content container-fluid">
<br>
<form name="form1" method="post" action="">
  <table style="width:100%; " align="center" class="table table-bordered table-hover">
    <tr>
      <td colspan="8">Edit Item  <i class="fab fa-accusoft"></i> </td>
    </tr>
	    <tr>
		<td>Barcode</td>
		<td><input type="text" min="1" max="100000000000000000" value="<?php echo $row['barco'];?>"  name="barco" autocomplete="off" class="form-control big-shadow" required ></td>
      <td nowrap style="width: 7%;">Product </td>
      <td colspan="3"><input type="text"  name="a" class="form-control big-shadow "  value="<?php echo $row['name'];?>"  required id="search" placeholder="اختر الصنــف" list="searchrt" autocomplete="off">
	</td>
<td>Unit</td>
<td><input type="text"  name="unit" class="form-control big-shadow " required id="search" placeholder="اختر الوحـــــدة" list="searchunit" autocomplete="off">
	<datalist id="searchunit">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select * from unitz");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>
    </tr>
      <tr>
	    <td style="width:8%;">Quntity  </td>
      <td style="width:17%;"><input type="number" name="c" min="1" value="<?php echo $row['qunt'];?>"  class="form-control big-shadow" required autocomplete="off"></td>
	    <td style="width:8%;">Price</td>
      <td style="width:17%;"><input type="text" name="cx" min="1"  value="<?php echo $row['price'];?>" class="form-control big-shadow" required autocomplete="off"></td>
    

      <td style="width: 8%;" nowrap>Store</td>
      <td colspan="3"  style="width:17%;"><select  name="f"  class="selectpicker" data-live-search="true" data-style="btn-primary">
	  <?php include("dbcon/dbcon.php");
	  $sq=mysql_query("select * from store");
	  $ro=mysql_fetch_array($sq);
	  ?>
	  <?php do { ?>
	  <option value="<?php echo $ro['name'];?>" class="form-control big-shadow  btn-black"><?php echo $ro['name'];?></option>
	  	  <?php }while($ro=mysql_fetch_array($sq));?>

      </select>
	  <input type="hidden"  value="20<?php echo date('y-m-d');?>" name="e" class="form-control big-shadow  "  autocomplete="off"></td>
    </tr>
  </table>
    <table style="width:100%; " align="center" class="table table-borderd table-hover">

    <tr>
        <td style="width:18%">&nbsp;</td>
        <td style="width:18%">&nbsp;</td>
        <td style="width:18%">&nbsp;</td>
        <td style="width:15%"><button type="submit" name="ok" class="btn btn-primary" style="width: 100%;  font-family: 'Droid Arabic Kufi';"> Edit  <i class="fa fa-th-large"></i></button></td>
        <td style="width:15%"><a href="index.php"><button type="button" class="btn btn-danger" style="width: 100%;  font-family: 'Droid Arabic Kufi';"> Home <i class="fa fa-home"></i></button></a></td>
        <td style="width:15%"><a href="store.php"><button type="button" class="btn btn-info" style="width: 100%;  font-family: 'Droid Arabic Kufi';"> Store <i class="fa fa-th-large"></i></button></a></td>
    </tr>
  </table>
</form>

</div>
</body>
</html>
<?php
}?>

<!-- نهاية فورم تعديل بيانات المخزن -->

<br>
<br>
<br>
<br>

