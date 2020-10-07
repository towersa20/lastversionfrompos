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
$up=mysql_query("update salary set name='$_POST[a]',sal1='$_POST[b]',haf='$_POST[c]',badil='$_POST[d]',dis='$_POST[e]',insu='$_POST[f]',state='$_POST[g]',date='$_POST[h]',month='$_POST[i]',year='$_POST[j]' where salid='$_GET[salid]'");
if($up)
{
echo "<script> alert ('تم تعديل بيانات المرتب');</script>";
echo "<meta http-equiv='refresh' content='0;url=vsal.php'>";
}
else
{
echo "<script> alert ('لم يتم تعديل المرتب');</script>";
echo "<meta http-equiv='refresh' content='0;url=vsal.php'>";

}}

else
{
include("dbcon/config.php");
$d=mysql_query("select*from salary where salid='$_GET[salid]'");
$row=mysql_fetch_array($d);
?>
 <div class="app-content content container-fluid">
<br>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <table style="width:100%; " align="center" class="table table-bordered table-hover">
    <tr>
      <td colspan="8"><strong>تعديــل مرتب موظف</strong> <i class="fa fa-user"></i></td>
    </tr>
    <tr>
      <td>الموظـف</td>
      <td colspan="7"><input type="text" name="a" class="form-control big-shadow" style="border:0px;" value="<?php echo $row['name'];?>" required autocomplete="off"></td>
    </tr>
							
    <tr>
      <td>المرتـــــب</td>
      <td><input type="number" name="b" class="form-control big-shadow" style="border:0px;" value="<?php echo $row['sal1'];?>" required autocomplete="off"></td>
      <td>الحافز</td>
      <td><input type="number" name="c" class="form-control big-shadow" style="border:0px;" value="<?php echo $row['haf'];?>" required autocomplete="off"></td>
      <td>البديل</td>
      <td><input type="number" name="d" class="form-control big-shadow" style="border:0px;" value="<?php echo $row['badil'];?>" required autocomplete="off"></td>
      <td>الخصومات</td>
      <td><input type="number" name="e" class="form-control big-shadow" style="border:0px;" style="border:0px;" value="<?php echo $row['dis'];?>" required autocomplete="off"></td>
    </tr>
    <tr>
      <td>التأميــــن</td>
      <td><input type="number" name="f" class="form-control big-shadow" style="border:0px;" value="<?php echo $row['insu'];?>" required autocomplete="off"></td>
      <td>الحالة</td>
      <td><select name="g" class="form-control big-shadow"  style="border:0px; height:35px;"  required>
        <option value="1">صرف</option>
        <option value="0">لم يصرف</option>
      </select></td>
      <td>التاريخ</td>
      <td><input type="date" name="h" class="form-control big-shadow"  style="border:0px;"  value="<?php echo $row['date'];?>" required autocomplete="off"></td>
      <td>الشهـــــر</td>
      <td><input type="text" name="i" class="form-control big-shadow"  style="border:0px;"  value="<?php echo $row['month'];?>" required autocomplete="off">
	  
	  <input type="hidden"  name="j" class="form-control big-shadow"  style="border:0px;"  value="<?php echo $row['year'];?>" required autocomplete="off"></td>
    </tr>
</table>
  <table style="width:100%; " align="center" class="table table-borderd table-hover">
	<tr>
	<td style="width:70%;" colspan="6"></td>
    <td style="width:15%;"><button type="submit" name="ok" class="btn btn-raised gradient-pomegranate white"  style="width: 170px;"> تعديل <i class="fa fa-check"></i></button></td>
   <td style="width:15%;"><a href="index.php"><button type="button" class="btn big-shadow" style="width: 170px;"> النظـام <i class="fa fa-home"></i></button></a></td>
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

