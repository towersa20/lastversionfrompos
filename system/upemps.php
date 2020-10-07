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
$up=mysql_query("update emp set name='$_POST[a]',tell='$_POST[b]',adres='$_POST[c]',
nid='$_POST[d]',job='$_POST[e]',work='$_POST[f]',sal='$_POST[g]'  where eid='$_GET[eid]'");
if($up)
{
echo "<script> alert ('تم تعديل بيانات الموظف');</script>";
echo "<meta http-equiv='refresh' content='0;url=vemp.php'>";
}
else
{
echo "<script> alert ('لم يتم تعديل الموظف');</script>";
echo "<meta http-equiv='refresh' content='0;url=vemp.php'>";

}}

else
{
include("dbcon/dbcon.php");
$d=mysql_query("select*from emp where eid='$_GET[eid]'");
$row=mysql_fetch_array($d);
?>

 <div class="app-content content container-fluid">
<br>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <table style="width:100%; " align="center" class="table table-bordered table-hover ">
    <tr>
      <td colspan="8">تعديــل سجـل موظـــف <i class="fa fa-user"></i></td>
    </tr>
    <tr>
      <td>الاسم الكامل </td>
      <td colspan="3"><input type="text" style="border: 0px;" name="a" class="form-control big-shadow" value="<?php echo $row['name'];?>" required autocomplete="off"></td>
      <td>رقم الهاتف </td>
      <td><input type="text" name="b" style="border: 0px;" class="form-control big-shadow" value="<?php echo $row['tell'];?>" required autocomplete="off"></td>
      <td>العنوان</td>
      <td><input type="text" style="border: 0px;" name="c" value="<?php echo $row['adres'];?>" class="form-control big-shadow" required autocomplete="off"></td>
    </tr>
    <tr>
      <td>رقم الهويــــة </td>
      <td><input type="text" name="d" style="border: 0px;" value="<?php echo $row['nid'];?>" class="form-control big-shadow" required autocomplete="off"></td>
      <td>الوظيفة</td>
      <td><input type="text" name="e" style="border: 0px;" value="<?php echo $row['job'];?>" class="form-control big-shadow" required autocomplete="off"></td>
      <td>الــــــــــــــدوام</td>
      <td><input type="text" name="f" style="border: 0px;" value="<?php echo $row['work'];?>" class="form-control big-shadow" required autocomplete="off"></td>
      <td>المرتب</td>
      <td><input type="text" name="g" style="border: 0px;" value="<?php echo $row['sal'];?>" class="form-control big-shadow" required autocomplete="off"></td>
    </tr>
</table>
  <table style="width:100%; " align="center" class="table table-borderd table-hover ">
	<tr>
	<td style="width:70%;"></td>
    <td style="width:15%;"><button type="submit" name="ok" class="btn btn-raised gradient-pomegranate white" style="width: 170px;"> تعديــــل <i class="fa fa-edit"></i></button></td>
    <td style="width:15%;"><a href="index.php"><button type="button" class="btn big-shadow" style="width: 170px;"> النظام <i class="fa fa-home"></i></button></a></td></tr>
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

