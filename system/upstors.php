<?php include('header.php');?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>تعديل</title>

</head>
<?php
if(isset($_POST["ok"]))
{
include("dbcon/dbcon.php");
$up=mysql_query("update storing set barco='$_POST[barco]',name='$_POST[a]',unit='$_POST[unit]',qunt='$_POST[c]',price='$_POST[cx]',date='$_POST[e]',store='$_POST[f]' where sid='$_GET[xsid]'");
$up=mysql_query("update products set product_price='$_POST[cx]'  where pid='$_POST[barco]' and unit='$_POST[unit]'");
if($up)
{
echo "<script> alert ('تم تعديل الصنف بالمخزن');</script>";
echo "<meta http-equiv='refresh' content='0;url=vstore.php'>";
}
else
{
echo "<script> alert ('لم يتم تعديل الصنف بالمخزن');</script>";
echo "<meta http-equiv='refresh' content='0;url=vstore.php'>";

}}

else
{
include("dbcon/dbcon.php");
$d=mysql_query("select*from storing where sid='$_GET[xsid]'");
$row=mysql_fetch_array($d);
?>

 <div class="app-content content container-fluid">
<br>
<form name="form1" method="post" action="">
  <table style="width:100%; " align="center" class="table table-bordered table-hover">
    <tr>
      <td colspan="8"><strong>تخزين صنـف جديد </strong>  <i class="fa fa-th-large"></i> </td>
    </tr>
	    <tr>
		<td>باركــــــــــــــود</td>
		<td><input type="text" min="1" max="100000000000000000" value="<?php echo $row['barco'];?>"  name="barco" autocomplete="off" class="form-control big-shadow" required ></td>
      <td nowrap style="width: 7%;">إسم الصنــف </td>
      <td colspan="3"><input type="text"  name="a" class="form-control big-shadow "  value="<?php echo $row['name'];?>"  required id="search" placeholder="اختر الصنــف" list="searchrt" autocomplete="off">
	</td>
<td>الوحــــــــــــده</td>
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
	    <td style="width:8%;">الكميــــــــــــة  </td>
      <td style="width:17%;"><input type="number" name="c" min="1" value="<?php echo $row['qunt'];?>"  class="form-control big-shadow" required autocomplete="off"></td>
	    <td style="width:8%;">الســـــــــــــــعر</td>
      <td style="width:17%;"><input type="text" name="cx" min="1"  value="<?php echo $row['price'];?>" class="form-control big-shadow" required autocomplete="off"></td>
    

      <td style="width: 8%;" nowrap>إسم المخزن</td>
      <td colspan="3"  style="width:17%;"><select  name="f"  style="border:0px; height: 38px;" required class="form-control big-shadow ">
	  <?php include("dbcon/dbcon.php");
	  $sq=mysql_query("select * from store");
	  $ro=mysql_fetch_array($sq);
	  ?>
	  <?php do { ?>
	  <option value="<?php echo $ro['name'];?>" style="color:#FFFFFF; " class="form-control big-shadow  btn-black"><?php echo $ro['name'];?></option>
	  	  <?php }while($ro=mysql_fetch_array($sq));?>

      </select>
	  <input type="hidden"   value="20<?php echo date('y-m-d');?>" name="e" class="form-control big-shadow  "  autocomplete="off"></td>
    </tr>
  </table>
    <table style="width:100%; " align="center" class="table table-borderd table-hover">

    <tr>
        <td style="width:18%">&nbsp;</td>
        <td style="width:18%">&nbsp;</td>
        <td style="width:18%">&nbsp;</td>
        <td style="width:15%"><button type="submit" name="ok" class="btn btn-primary" style="width: 100%;"> تعديل  <i class="fa fa-th-large"></i></button></td>
        <td style="width:15%"><a href="index.php"><button type="button" class="btn btn-danger" style="width: 100%;"> النظام <i class="fa fa-home"></i></button></a></td>
        <td style="width:15%"><a href="store.php"><button type="button" class="btn btn-success" style="width: 100%;"> تسجيل مخزن <i class="fa fa-th-large"></i></button></a></td>
    </tr>
  </table>
</form>

</div>
</body>
</html>
<?php
}?> 
<br>
<br>
<br>
<br>

