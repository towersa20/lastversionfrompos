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
$up=mysql_query("update job set name='$_POST[a]' where jid='$_GET[jid]'");
if($up)
{
echo "<script> alert ('تم تعديل بيانات الوظيفة');</script>";
echo "<meta http-equiv='refresh' content='0;url=job.php'>";
}
else
{
echo "<script> alert ('لم يتم تعديل الوظيفة');</script>";
echo "<meta http-equiv='refresh' content='0;url=job.php'>";

}}

else
{
include("dbcon/dbcon.php");
$d=mysql_query("select*from job where jid='$_GET[jid]'");
$row=mysql_fetch_array($d);
?>

 <div class="app-content content container-fluid">
<br>
<form name="form1" method="post" action="" enctype="multipart/form-data">
	  <table style="width:100%; " align="center" class="table table-bordered table-hover animated " >

    <tr>
      <td colspan="6" class=""><strong>تعديــل أسم الوظيفة</strong> <i class="fa ft-layers"></i></td>
    </tr>
    <tr>
      <td nowrap style="width:8%; ">الوظيفـة</td>
      <td colspan="3"><input type="text" name="a" value="<?php echo $row['name'];?>" style="border:0px;" class="form-control big-shadow" required autocomplete="off">      </td>
    </tr>
	</table>
	  <table style="width:100%; " align="center" class="table table-borderd table-hover animated flipInX" >
    <tr>
      <td colspan="2" style="width:70%;">&nbsp;</td>
      <td style="width:15%;"><button  type="submit" name="ok" class="btn btn btn-raised gradient-pomegranate white" style="width:100%;"> تعديل <i class="fa fa-check"></i></button></td>
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

