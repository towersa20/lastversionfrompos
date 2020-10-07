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
$up=mysql_query("update nation set name='$_POST[a]' where nid='$_GET[nid]'");
if($up)
{
echo "<script> alert ('تم تعديل بيانات الدولة');</script>";
echo "<meta http-equiv='refresh' content='0;url=nation.php'>";
}
else
{
echo "<script> alert ('لم يتم تعديل الدولة');</script>";
echo "<meta http-equiv='refresh' content='0;url=nation.php'>";

}}

else
{
include("dbcon/dbcon.php");
$d=mysql_query("select*from nation where nid='$_GET[nid]'");
$row=mysql_fetch_array($d);
?>

<body style="background-image:url(icon/about-bg.jpg); background-repeat:no-repeat; ">			
 <div class="app-content content container-fluid">
<br>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <table style="width:100%; " align="center" class="table table-borderd table-hover">
    <tr>
      <td colspan="4" class=""><strong>تعديــل أسم الدولة</strong> </td>
    </tr>
    <tr>
      <td nowrap style="width:8%; ">إسم الدولة</td>
      <td colspan="4"><input type="text" style="border: 0px;" name="a" value="<?php echo $row['name'];?>" id="projectinput1" class="form-control" required autocomplete="off">      </td>
    </tr>
    <tr>

        <td colspan="3" style="width: 75%;">&nbsp;</td>
      <td align="left"><button type="submit" name="ok" class="btn btn-primary" style="width: 120px;"> تعديــــل <i class="fa fa-edit"></i></button></td>
      <td align="left"><button type="reset" class="btn btn-warning mr-1 " style="width: 120px;"> الغــــــــاء <i class="fa fa-refresh"></i></button></td>
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

