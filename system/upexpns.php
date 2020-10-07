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
$up=mysql_query("update expn set etype='$_POST[a]',cost='$_POST[b]',date='$_POST[c]',year='$_POST[f]',byan='$_POST[e]',user='$_POST[d]' where exid='$_GET[exid]'");
if($up)
{
echo "<script> alert ('تم تعديل بيانات المنصـرف');</script>";
echo "<meta http-equiv='refresh' content='0;url=vexpn.php'>";
}
else
{
echo "<script> alert ('لم يتم تعديل المصروف');</script>";
echo "<meta http-equiv='refresh' content='0;url=vexpn.php'>";

}}

else
{
include("dbcon/config.php");
$d=mysql_query("select*from expn where exid='$_GET[exid]'");
$row=mysql_fetch_array($d);
?>

 <div class="app-content content container-fluid">
<br>
<form name="form1" method="post" action="">

    <table style="width:100%; " border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
        <tr>
      <td colspan="6"><strong>تعديـــل بيانات المصروف </strong> <i class="fa ft-activity"></i></td>
    </tr>
    <tr>
      <td style="width:6%;">المصروف</td>
	  <td colspan="5"><input type="text" name="a" style="border:0px; " value="<?php echo $row['etype'];?>" class="form-control big-shadow" required id="search" placeholder="اختر المصروف-" list="searchrt" autocomplete="off">
	<datalist id="searchrt">
            <?php include('dbcon/config.php');
		$brima=mysql_query("select * from exp");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>
    </tr>
        <tr>
      <td style="width:6%;"> المبلــــــــغ</td>
            <td><input type="number" name="b" style="border:0px; " class="form-control big-shadow" value="<?php echo $row['cost'];?>" required autocomplete="off"></td>
      <td>التاريــــــــخ</td>
      <td><input type="date" name="c" style="border:0px; " class="form-control big-shadow" value="<?php echo $row['date'];?>" required autocomplete="off"></td>
            <td>المستخـــــدم</td>
            <td><input type="text" name="d" style="border:0px;" class="form-control big-shadow" value="<?php echo $row['user'];?>" required autocomplete="off"></td>
            <input type="hidden" name="f" value="20<?php echo date('y');?>">
    </tr>
    <tr>
        <td>البيـــــــــان</td>
        <td colspan="5"><textarea name="e" rows="3" style="border:0px;"  class="form-control big-shadow" required autocomplete="off"><?php echo $row['byan'];?></textarea></td>
    </tr>
    </table>
        <table style="width:100%; " align="center" dir="rtl"  class="table table-borderd table-hover animated flipInX">
        <tr>
            <td  style=" width:65%; " >&nbsp;</td>

      <td style="width:15%;"><button  type="submit" name="ok" class="btn btn-raised gradient-pomegranate white" style="width:100%;"> تعديل <i class="fa fa-check"></i></button></td>
      <td style="width:15%;"><a href="index.php"><button type="button" class="btn big-shadow" style="width:100%;"> النظام <i class="fa fa-home"></i></button></a></td>
        </tr>
  </table>
</form></div>
</body>
</html>
<?php
}?> 
<br>
<br>
<br>
<br>

