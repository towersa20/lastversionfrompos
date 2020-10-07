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
include("dbcon/dbcon.php");
$up=mysql_query("update doc set fromid='$_POST[a]',type='$_POST[b]',date='$_POST[c]',recive='$_POST[d]',chg='$_POST[e]',cost='$_POST[f]',byan='$_POST[g]' where did='$_GET[did]'");
if($up)
{
echo "<script> alert ('تم تعديل السند');</script>";
echo "<meta http-equiv='refresh' content='0;url=vdoc.php'>";
}
else
{
echo "<script> alert ('لم يتم تعديل السند');</script>";
echo "<meta http-equiv='refresh' content='0;url=vdoc.php'>";

}}

else
{
include("dbcon/dbcon.php");
$d=mysql_query("select*from doc where did='$_GET[did]'");
$row=mysql_fetch_array($d);
?>

 <div class="app-content content container-fluid">
<br>
<form name="form1" method="post" action="">
<table style="width:100%;" align="center" class="table table-bordered table-hover">
<tr>
<td colspan="8">نافذة إدارة السندات <i class="fa icon-cursor"></i></td>
</tr>
<tr>
<td>رقم السند</td>
<td><input type="text" name="a" style="border:0px;"  value="<?php echo $row['fromid'];?>" class="form-control big-shadow" required autocomplete="off"></td>
<td>نوع السند</td>
<td><select class="form-control big-shadow" style="border:0px; height:37px;" name="b" required>
<option value="صرف">سند صـرف</option>
<option value="قبض">سند قبض</option>
</select></td>
<td>التاريخ</td>
<td><input type="date" name="c" style="border:0px;" class="form-control big-shadow" value="<?php echo $row['date'];?>"  required autocomplete="off"></td>
<td>المستلم</td>
<td><input type="text" name="d" style="border:0px;" class="form-control big-shadow"   value="<?php echo $row['recive'];?>" required autocomplete="off"></td>
</tr>
<tr>
<td>الجهـــــــــــة</td>
<td colspan="5"><input type="text" name="e" style="border:0px;"  value="<?php echo $row['chg'];?>" class="form-control big-shadow" required autocomplete="off"></td>
<td>المبلـــــــغ</td>
<td><input type="number" min="0" name="f"  style="border:0px;"  value="<?php echo $row['cost'];?>" class="form-control big-shadow" required autocomplete="off"></td>
</tr>
<tr>
<td>بيان السند</td>
<td colspan="7"><input type="text" name="g" style="border:0px;" value="<?php echo $row['byan'];?>" class="form-control big-shadow" required autocomplete="off"></td>
</tr>
</table>
<table style="width:100%;" align="center" class="table table-borderd table-hover">
<tr>
      <td colspan="2" style="width:40%;">&nbsp;</td>
      <td style="width:15%;"><button  type="submit" name="ok" class="btn btn-raised gradient-pomegranate white" style="width:100%;"> تعديـل <i class="fa fa-check"></i></button></td>
      <td style="width:15%;"><a href="vdoc.php"><button type="button" class="btn big-shadow" style="width:100%;"> بحث <i class="fa fa-search"></i></button></a></td>
      <td style="width:15%;"><a href="docselect.php"><button type="button" class="btn btn-raised gradient-pomegranate white" style="width:100%;"> التقارير <i class="fa fa-home"></i></button></a></td>
      <td style="width:15%;"><a href="index.php"><button type="button" class="btn big-shadow" style="width:100%;"> النظام <i class="fa fa-home"></i></button></a></td>
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

