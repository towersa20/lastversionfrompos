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
$up=mysql_query("update payment set cust='$_POST[a]',item='$_POST[b]',unit='$_POST[c]',qunt='$_POST[d]',price='$_POST[e]',pay='$_POST[f]',
date='$_POST[g]',costst='$_POST[h]' where pxid='$_GET[pxid]'");
if($up)
{
echo "<script> alert ('تم تعديل الصنف');</script>";
echo "<meta http-equiv='refresh' content='0;url=custompayment.php'>";
}
else
{
echo "<script> alert ('لم يتم تعديل الصنف');</script>";
echo "<meta http-equiv='refresh' content='0;url=custompayment.php'>";

}}

else
{
include("dbcon/dbcon.php");
$d=mysql_query("select*from payment where pxid='$_GET[pxid]'");
$row=mysql_fetch_array($d);
?>

 <div class="app-content content container-fluid">
<br>
<form name="form1" method="post" action="">
 <table style="width:98%; " align="center" class="table table-bordered table-hover  ">
    <tr>
      <td colspan="8"><strong>تعديل فاتورة سداد لمورد</strong> <i class="fa ft-layers"></i> </td>
    </tr>
    <tr>
      <td nowrap>المورد</td>
      <td nowrap colspan="7" ><input type="text" min="0"  style="border: 0px;" value="<?php echo $row['cust'];?>" name="a" class="form-control big-shadow" required autocomplete="off"></td>
    </tr>
    <tr>
      <td nowrap>الصنف</td>
      <td nowrap><input type="text" min="0"  style="border: 0px;" value="<?php echo $row['item'];?>" name="b" class="form-control big-shadow" required autocomplete="off"></td>
        <td nowrap>الوحدة </td>
        <td nowrap><input type="text" min="0"  style="border: 0px;" value="<?php echo $row['unit'];?>" name="c" class="form-control big-shadow" required autocomplete="off"></td>
        <td nowrap>السعر</td>
      <td nowrap><input type="number" min="0"  style="border: 0px;" value="<?php echo $row['price'];?>"  name="e" class="form-control big-shadow" required autocomplete="off"></td>
        <td nowrap>الكمية</td>
      <td nowrap><input type="number" min="0"  style="border: 0px;" value="<?php echo $row['qunt'];?>"  name="d" class="form-control big-shadow" required autocomplete="off"></td>
     </tr>
    <tr>
      <td nowrap>الدفع</td>
      <td nowrap><input type="number" min="0"  style="border: 0px;" value="<?php echo $row['pay'];?>" name="f" class="form-control big-shadow" required autocomplete="off"></td>
        <td nowrap>المدفوع </td>
        <td nowrap><input type="text" min="0"  style="border: 0px;" value="<?php echo $row['costst'];?>" name="h" class="form-control big-shadow" required autocomplete="off"></td>
        <td nowrap>التاريخ</td>
      <td nowrap><input type="date" min="0"  style="border: 0px;" value="<?php echo $row['date'];?>"  name="j" class="form-control big-shadow" required autocomplete="off"></td>
      <td nowrap>الفاتورة</td>
      <td><input type="text"   style="border: 0px;" value="<?php echo $row['codes'];?>" class="form-control big-shadow" required autocomplete="off"></td>
     </tr>
    </table>
    <table style="width:98%; " align="center" class="table table-borderd table-hover  animated flipInX">
    <tr>
      <td style="width: 16.6%;" nowrap>&nbsp;</td>
      <td style="width: 16.6%;" nowrap>&nbsp;</td>
      <td style="width: 16.6%;" nowrap>&nbsp;</td>
      <td style="width: 16.6%;" nowrap>&nbsp;</td>
    <td style="width: 16.6%;"><button type="submit" name="ok" class="btn btn-raised gradient-pomegranate white" style="width: 100%;"> تعديـــل  <i class="fa fa-edit"></i></button></td>
        <td style="width: 16.6%;"><a href="index.php"> <button type="button" class="btn big-shadow" style="width: 100%;"> النظام <i class="fa fa-home"></i></button></a></td></tr>
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

