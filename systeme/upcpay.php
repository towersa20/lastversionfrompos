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

$a=$_POST['a']; //اسم المورد
$b=$_POST['b']; // المبلغ المطلوب
$c=$_POST['c']; // المبلغ المدفوع
$d=$_POST['d']; // المبلغ المتبقي
$e=$_POST['e']; // رقم الفاتورة
$f=$_POST['f']; // التاريخ

$up=mysql_query("UPDATE `payment` SET `cust` = '$a', `total` = '$b', `pay` = '$c' , `date` = '$f' , `ex` = '$d'   WHERE `payment`.`codes` = '$e'");
if($up)
{
echo "<script> alert ('تم تعديل المبلغ المدفوع');</script>";
echo "<meta http-equiv='refresh' content='0;url=vpayment.php'>";
}
else
{
echo "<script> alert ('لم يتم تعديل المبلغ المدفوع');</script>";
echo "<meta http-equiv='refresh' content='0;url=vpayment.php'>";

}}

else
{
include("dbcon/dbcon.php");
$d=mysql_query("select*from payment where pxid='$_GET[pxid]'");
$row=mysql_fetch_array($d);
?>

<br>
<!--///////////////////////////////////New Form////////////////////////////-->
<form name="form1" method="post" action="upcpay.php" enctype="multipart/form-data">

<table style="width:100%; font-size:14px; font-family: 'Droid Arabic Kufi'; " align="center" class="table table-bordered table-hover">
<tr>
<td colspan="10">Pay suppliers' dues <i  class="fa fa-user"></i></td>
</tr>


<tr>

<td>Supplier</td>

<td colspan="3"><input type="text" name="a" class="form-control" value="<?php echo $row['cust'];?>" required autocomplete="off"></td>


<td nowrap style="width: 7%;"> amount required</td>

<td colspan="3">
     <input type="text" name="b"  class="form-control big-shadow " required id="search" placeholder="المبلغ المطلوب" autocomplete="off" value="<?php echo $row['total'];?>">
</td>
   
</tr>


<tr> 

<td nowrap style="width: 7%;">amount paid </td>

<td colspan="3">
     <input type="text" name="c"  class="form-control big-shadow " required id="search" placeholder="المبلغ المدفوع" autocomplete="off" value="<?php echo $row['pay'];?>">
</td>

<td nowrap style="width: 7%;"> Remaining amount </td>

<td colspan="3">
     <input type="text" name="d"  class="form-control big-shadow " required id="search" placeholder="المبلغ المتبقي" autocomplete="off" value="<?php echo $row['ex'];?>">
</td>

</tr>


<tr> 

<td nowrap style="width: 7%;">invoice number </td>

<td colspan="3">
     <input type="text" name="e"  class="form-control big-shadow " required id="search" placeholder="رقم الفاتورة" autocomplete="off" value="<?php echo $row['codes'];?>">
</td>

<td nowrap style="width: 7%;"> Date </td>

<td><input name="f"  class="form-control" type="date" size="12" value="20<?php echo date('y-m-d');?>" required  />
</td>

</tr>
</table>

  <table style="width:100%; " align="center" class="table table-borderd table-hover  " >
    <tr>
      <td colspan="2" style="width:70%;">&nbsp;</td>
      <td style="width:15%;"><button  type="submit" name="ok" class="btn btn-primary" style="width:100%; font-family: 'Droid Arabic Kufi';"> Edit <i class="fa fa-check"></i></button></td>
      <td style="width:15%;"><a href="index.php"><button type="button" class="btn btn-danger" style="width:100%; font-family: 'Droid Arabic Kufi';"> Home <i class="fa fa-home"></i></button></a></td>
    </tr>
  </table>
</form>

<!--<form name="form1" method="post" action="" enctype="multipart/form-data">
    <table style="width:100%;" align="center" class="table table-bordered table-hover ">
    <tr>
      <td colspan="6">تعديــل فاتورة سداد لمورد <i class="fa ft-layers"></i></td>
    </tr>
    <tr>
      <td style="width:8%;"> المورد</td>
      <td colspan="3"><input type="text" name="a" class="form-control" value="<?php echo $row['cust'];?>" required autocomplete="off"></td>
      <td style="width:8%;"> الصنف</td>
      <td><input type="text" name="b" class="form-control" value="<?php echo $row['item'];?>" required autocomplete="off"></td>
      <td style="width:8%;"> الوحدة</td>
      <td><input type="text" name="c" class="form-control" value="<?php echo $row['unit'];?>" required autocomplete="off"></td>
    </tr>

    
    <tr>
      <td style="width:8%;"> الكميه</td>
      <td colspan="3"><input type="text" name="d" class="form-control" value="<?php echo $row['qunt'];?>" required autocomplete="off"></td>
      <td style="width:8%;"> المبلغ</td>
      <td><input type="text" name="e" class="form-control" value="<?php echo $row['price'];?>" required autocomplete="off"></td>
      <td style="width:8%;"> الاجمالي</td>
      <td><input type="text" name="f" class="form-control" value="<?php echo $row['total'];?>" required autocomplete="off"></td>
    </tr>

    <tr>
      <td style="width:8%;"> المدفوع</td>
      <td colspan="3"><input type="text" name="g" class="form-control" value="<?php echo $row['pay'];?>" required autocomplete="off"></td>
      <td style="width:8%;"> السداد</td>
      <td><input type="text" name="h" class="form-control" value="<?php echo $row['costst'];?>" required autocomplete="off"></td>
      <td style="width:8%;"> الفاتورة</td>
      <td><input type="text" name="i" class="form-control" value="<?php echo $row['codes'];?>" required autocomplete="off"></td>
      </tr>

    </table>
  <table style="width:100%; " align="center" class="table table-borderd table-hover  " >
    <tr>
      <td colspan="2" style="width:70%;">&nbsp;</td>
      <td style="width:15%;"><button  type="submit" name="ok" class="btn btn-primary" style="width:100%; font-family: 'Droid Arabic Kufi';"> تعديل <i class="fa fa-check"></i></button></td>
      <td style="width:15%;"><a href="index.php"><button type="button" class="btn btn-danger" style="width:100%; font-family: 'Droid Arabic Kufi';"> النظام <i class="fa fa-home"></i></button></a></td>
    </tr>
  </table>
</form></div>-->
</body>
</html>
<?php
}?> 
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
$up=mysql_query("update payment set cust='$_POST[a]', item='$_POST[b]', allco='$_POST[c]', pay='$_POST[d]', dates='$x3' where pxid='$_GET[pxid]'");
if($up)
{
echo "<script> alert ('تم تعديل السداد');</script>";
echo "<meta http-equiv='refresh' target='_blank' content='0;url=vpayment.php'>";

}
else
{
echo "<script> alert ('لم يتم تعديل السداد');</script>";
echo "<meta http-equiv='refresh' content='0;url=vpayment.php'>";
}
}?>