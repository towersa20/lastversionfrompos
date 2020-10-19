<?php include('header.php');?>

<script>
// دالة تنسيق الطباعة

function printDiv() 
{
  var divToPrint=document.getElementById('DivIdToPrint');
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<html><title>تقرير المبيعات</title><body border="3" dir="rtl" onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
 //newWin.window.close();
  setTimeout(function(){newWin.close();},1);
}
//نهاية دالة تنسيق الطباعة

</script>

  <body style="font-family: 'Droid Arabic Kufi', serif;" data-open="click" data-menu="vertical-menu">


  <!-- بداية عرض التقرير الاول -->

<?php if(isset($_POST['ok1']))
{ ?>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">

<center>
  
    <!-- بداية ترويسة التقرير -->

<table style="width:100%;" border="1" align="center" class="table table-bordered table-hover ">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center"> <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>تقرير المبيعات العام <?php echo $_POST['year'];?> </strong></td>
            <td align="center">  تقرير المبيعات </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
  <!-- نهاية عرض ترويسة التقرير -->




  <!-- بداية عرض سجل تقرير المبيعات السنوي -->

<br>
<?php include('dbcon/config.php');
// كود عرض تقرير المبيعات السنوي
$sql=mysql_query("select * from sales where date like '%$_POST[year]%' and tell = '1'   ");
$row=mysql_fetch_array($sql);?>





<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover">

    <tr align="center" >
    
    <td nowrap style="width:10%;"><strong>الفاتورة</strong></td>
    <td nowrap style="width:10%;"><strong>الصنــف</strong></td>
      <td nowrap style="width:10%;"><strong>الوحدة</strong></td>
      <td nowrap style="width:6%;"><strong>الكمية</strong></td>
      <td nowrap style="width:6%;"><strong>السعر</strong></td>
      <td nowrap style="width:6%;"><strong> الضريبة</strong></td>
      <td nowrap style="width:6%;"><strong>الأجمالي</strong></td>
      <td nowrap style="width:6%;"><strong>شامل الضريبه</strong></td>
      <td nowrap style="width:6%;"><strong> حذف</strong></td>

    </tr>
		  <?php do { ?>

    <tr>	
    <td><?php echo $row['invoice'];?></td>
    <td><?php echo $row['name'];?></td>
      <td><?php echo $row['category'];?></td>
      <td><?php echo $br=$row['qty']; ?></td>
      <td><?php $br=$row['price']; $br = sprintf("%01.2f", $br);  echo $br;?></td>
      <td><?php $brx= $row['qty']*$row['price']*$row['vat']/100; $brx = sprintf("%01.2f", $brx);  echo $brx;?></td>
      <td><?php $br=$row['qty']*$row['price']; $br = sprintf("%01.2f", $br);  echo $br;?></td>
      <td><?php $br=$row['qty']*$row['price']+$brx; $br = sprintf("%01.2f", $br);  echo $br;?></td>

      <td align="center"><a href="delete.php?action=sales&&idsales=<?php echo $row['transaction_id'];?>" onClick="return confirm('هل تريد حذف <?php echo $row['invoice'];?>');">
        <button class="btn btn-primary" style="width: 100px; font-family: 'Droid Arabic Kufi';"> حذف <i class="fa fa-times"></i></button></a></td>
        </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
  <td><strong>المجموع</strong></td>
  <td></td>
	<td><?php include('dbcon/config.php');
  // عرض مجموع العمليات
	$sql=mysql_query("select count(transaction_id) from sales where  date like '%$_POST[year]%' and tell = '1'   ");
	$row=mysql_fetch_array($sql);
	echo $row['count(transaction_id)'];	?></td>
  
  
	<td><?php include('dbcon/config.php');
  // عرض مجموع الكميات
	$sql=mysql_query("select sum(qty) from sales where  date like '%$_POST[year]%' and tell = '1'   ");
	$row=mysql_fetch_array($sql);
	echo $row['sum(qty)'];?></td>
  
	<td><?php include('dbcon/config.php');
  // عرض مجموع المبيعات
	$sql=mysql_query("select sum(price) from sales where date like '%$_POST[year]%'  and tell = '1'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(price)'];?></td>
  
	<td><?php include('dbcon/config.php');
  // عرض مجموع المبيعات * الكمية
	$sql=mysql_query("select sum(qty*price),vat from sales where  date like '%$_POST[year]%' and tell = '1'   ");
	$row=mysql_fetch_array($sql);
	 $sum=$row['sum(qty*price)']*$row['vat']/100; $sum = sprintf("%01.2f", $sum);  echo $sum;  ?></td>
  
 
	<td><?php include('dbcon/config.php');
  // عرض مجموع المبيعات * الكمية
	$sql=mysql_query("select sum(price*qty) from sales where  date like '%$_POST[year]%' and tell = '1'   ");
	$row=mysql_fetch_array($sql);
	 $sum=$row['sum(price*qty)']; $sum = sprintf("%01.2f", $sum);  echo $sum;  ?></td>
  

	<td><?php include('dbcon/config.php');
  // عرض مجموع المبيعات * الكمية شامل الضريبة
	$sql=mysql_query("select sum(price*qty),vat from sales where  date like '%$_POST[year]%' and tell = '1'   ");
	$row=mysql_fetch_array($sql);
   $br=$row['sum(price*qty)']*$row['vat']/100+$sum; $br = sprintf("%01.2f", $br);  echo $br;  ?></td>

  	</tr>
  </table>
  <!-- نهاية عرض التقرير الاول -->

<br>
<?php } ?>



  <!-- بداية عرض التقرير الثاني -->



<?php if(isset($_POST['ok2']))
{ ?>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">

<center>
  
  
    <!-- بداية ترويسة التقرير -->

<table style="width:100%;" border="1" align="center" class="table table-bordered table-hover ">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center"> <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>تقرير مبيعات الموظف <?php echo $_POST['name'];?> للعام <?php echo $_POST['year'];?> </strong></td>
            <td align="center">  تقرير المبيعات </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
  <!-- نهاية عرض ترويسة التقرير -->





<br>
<?php include('dbcon/config.php');
// كود عرض التقرير السنوي لصنف 
$sql=mysql_query("select * from sales where  date like '%$_POST[year]%' and tell = '1'    and name='$_POST[name]'");
$row=mysql_fetch_array($sql);?>



<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover">

    <tr align="center" >
    <td nowrap style="width:10%;"><strong>الفاتورة</strong></td>
    <td nowrap style="width:10%;"><strong>الصنــف</strong></td>
      <td nowrap style="width:10%;"><strong>الوحدة</strong></td>
      <td nowrap style="width:6%;"><strong>الكمية</strong></td>
      <td nowrap style="width:6%;"><strong>السعر</strong></td>
      <td nowrap style="width:6%;"><strong> الضريبة</strong></td>
      <td nowrap style="width:6%;"><strong>الأجمالي</strong></td>
      <td nowrap style="width:6%;"><strong>شامل الضريبه</strong></td>
   </tr>
		  <?php do { ?>

    <tr>	
    <td><?php echo $row['invoice'];?></td>
    <td><?php echo $row['name'];?></td>
      <td><?php echo $row['category'];?></td>
      <td><?php echo $br=$row['qty']; ?></td>
      <td><?php $br=$row['price']; $br = sprintf("%01.2f", $br);  echo $br;?></td>
      <td><?php $brx= $row['qty']*$row['price']*$row['vat']/100; $brx = sprintf("%01.2f", $brx);  echo $brx;?></td>
      <td><?php $br=$row['qty']*$row['price']; $br = sprintf("%01.2f", $br);  echo $br;?></td>
      <td><?php $br=$row['qty']*$row['price']; $br = sprintf("%01.2f", $br);  echo $br;?></td>
        </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
  <td><strong>المجموع</strong></td>
	<td></td>
  <td></td>
  

  

	<td><?php include('dbcon/config.php');
  //عرض اجمالي الخصم
	$sql=mysql_query("select count(qty) from sales where  date like '%$_POST[year]%' and tell = '1'    and name='$_POST[name]'");
	$row=mysql_fetch_array($sql);
	echo $row['count(qty)'];?></td>


<td><?php include('dbcon/config.php');
  //عرض اجمالي الخصم
	$sql=mysql_query("select sum(price) from sales where  date like '%$_POST[year]%' and tell = '1'    and name='$_POST[name]'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(price)'];?></td>

<td><?php include('dbcon/config.php');
  // عرض اجمالي المبيعات
	$sql=mysql_query("select sum(price*qty*vat) from sales where  date like '%$_POST[year]%' and tell = '1'    and name='$_POST[name]'");
	$row=mysql_fetch_array($sql);
  $br=$row['sum(price*qty*vat)']/100;
  $br = sprintf("%01.2f", $br);  echo $br?></td>
  

  
  <td><?php include('dbcon/config.php');
  // عرض اجمالي المبيعات
	$sql=mysql_query("select sum(price*qty) from sales where  date like '%$_POST[year]%' and tell = '1'    and name='$_POST[name]'");
	$row=mysql_fetch_array($sql);
   $br=$row['sum(price*qty)'];
  $br = sprintf("%01.2f", $br);  echo $br?></td>
  

	<td><?php include('dbcon/config.php');
  //عرض اجمالي المبيعات شامل الضريبة
	$sql=mysql_query("select sum(price*qty),vat from sales where  date like '%$_POST[year]%' and tell = '1'    and name='$_POST[name]'");
	$row=mysql_fetch_array($sql);
   $brs=$row['sum(price*qty)'];
  $brs = sprintf("%01.2f", $brs);  echo $brs;

  ?></td>
 	</tr>
  </table>

  <!-- نهاية عرض التقرير الثاني -->

<br>
<?php } ?>



  <!-- بداية عرض التقرير الثالث -->

<?php if(isset($_POST['ok3']))
{ ?>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">

<center>
    <!-- بداية عرض ترويسة التقرير -->

<table style="width:100%;" border="1" align="center" class="table table-bordered table-hover ">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width: 15%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width: 15%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center"> <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>تقرير مبيعات الموظف <?php echo $_POST['user'];?> للعام <?php echo $_POST['year'];?> </strong></td>
            <td align="center">  تقرير المبيعات </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
  <!-- نهاية عرض ترويسة التقرير -->

<br>

<br>


<?php include('dbcon/dbcon.php');
// كود عرض التقرير السنوي لمستخدم
$sql=mysql_query("select * from sales where  date like '%$_POST[year]%' and tell = '1' and user='$_POST[user]'");
$row=mysql_fetch_array($sql);?>




<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover">

<tr align="center" >
    <td nowrap style="width:10%;"><strong>الفاتورة</strong></td>
    <td nowrap style="width:10%;"><strong>الصنــف</strong></td>
      <td nowrap style="width:10%;"><strong>الوحدة</strong></td>
      <td nowrap style="width:6%;"><strong>الكمية</strong></td>
      <td nowrap style="width:6%;"><strong>السعر</strong></td>
      <td nowrap style="width:6%;"><strong> الضريبة</strong></td>
      <td nowrap style="width:6%;"><strong>الأجمالي</strong></td>
   </tr>
		  <?php do { ?>

    <tr>	
    <td><?php echo $row['invoice'];?></td>
    <td><?php echo $row['name'];?></td>
      <td><?php echo $row['category'];?></td>
      <td><?php echo $row['qty']; ?></td>
      <td><?php $br=$row['price']; $br = sprintf("%01.2f", $br);  echo $br;?></td>
      <td><?php $brx= $row['qty']*$row['price']*$row['vat']/100; $brx = sprintf("%01.2f", $brx);  echo $brx;?></td>
      <td><?php $br=$row['qty']*$row['price']; $br = sprintf("%01.2f", $br);  echo $br;?></td>
        </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
  <td><strong>المجموع</strong></td>
  <td></td>
  <td></td>
  
	<td ><?php include('dbcon/config.php');
  // اجمالي الكمية المباعة 
	$sql=mysql_query("select sum(qty) from sales where date like '%$_POST[year]%' and tell = '1'   and  user='$_POST[user]'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(qty)'];?></td>
  
  
	<td><?php include('dbcon/config.php');
  // كود عرض اجمالي المبيعات
	$sql=mysql_query("select sum(price) from sales where date like '%$_POST[year]%' and tell = '1'   and  user='$_POST[user]' ");
	$row=mysql_fetch_array($sql);
  $br= $row['sum(price)'];
  $br = sprintf("%01.2f", $br);  echo $br;?></td>
  
	<td><?php include('dbcon/config.php');
  // كود عرض اجمالي الخصم
	$sql=mysql_query("select sum(price*qty*vat) from sales where  date like '%$_POST[year]%' and tell = '1'    and  user='$_POST[user]'");
	$row=mysql_fetch_array($sql);
  $br= $row['sum(price*qty*vat)']/100;
  $br = sprintf("%01.2f", $br);  echo $br?></td>
  
	<td><?php include('dbcon/config.php');
  // كود عرض اجمالي السعر في الكمية
	$sql=mysql_query("select sum(price*qty) from sales where  date like '%$_POST[year]%' and tell = '1'    and  user='$_POST[user]'");
	$row=mysql_fetch_array($sql);
   $sum=$row['sum(price*qty)'];
   $sum= sprintf("%01.2f", $sum);  echo $sum;?></td>
  
   	</tr>
  </table>

<br>
  <!-- نهاية عرض التقرير الثالث -->

  

<br>
<?php } ?>



  <!-- بداية عرض التقرير الرابع -->

<?php if(isset($_POST['ok4']))
{ ?>
<center>
<body>
  
    <!-- بداية عرض ترويسة التقرير الرابع -->

<table border="5" cellspacing="5"  bordercolor="#CC9900" class="table table-border table-hover" style="width:100%; ">
  <tr>
    <td colspan="3"><img src="../icon/header.png"  class="form-control" style="height:45%; "></td>
  </tr>
  <tr align="center">
    <td style="width:25%; "><strong>20<?php echo date('y-m-d h:i:s');?></strong></td>
    <td dir="rtl"><strong>تقرير فاتورة مبيعات <?php echo $_POST['code'];?> </strong></td>
    <td style="width:25%; "><strong>المبيعـات</strong></td>
  </tr>
</table>

  <!-- نهاية عرض ترويسة التقرير -->

<br>
<?php include('dbcon/dbcon.php');
// كود عرض التقرير برقم الفاتورة
$sql=mysql_query("select * from info where code='$_POST[code]'");
$row=mysql_fetch_array($sql);?>
    <table style="width:100%; " border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
    <tr align="center" >
      <td nowrap style="width:15%;"><strong>الصنــف</strong></td>
      <td nowrap style="width:15%;"><strong>الوحدة</strong></td>
      <td nowrap style="width:8%;"><strong>الكمية</strong></td>
      <td nowrap style="width:8%;"><strong>السعر</strong></td>
      <td nowrap style="width:8%;"><strong>الإجمالي</strong></td>
      <td nowrap style="width:8%;"><strong>الدفع</strong></td>
      <td nowrap style="width:8%;"><strong>شامل الضريبه</strong></td>
    </tr>
		  <?php do { ?>

    <tr>	
      <td nowrap><?php echo $row['item'];?></td>
      <td><?php echo $row['unit'];?></td>
      <td><?php echo $row['qunt'];?></td>
      <td><?php echo $row['price'];?></td>
      <td><?php echo $row['qunt']*$row['price'];?></td>
      <td><?php echo $row['type'];?></td>
      <td><?php echo $row['pros'];?></td>
    </tr>
   	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
	<td></td>
	<td><strong>المجموع</strong></td>
	<td ><?php include('dbcon/dbcon.php');
  // كود عرض عدد العمليات
	$sql=mysql_query("select count(id) from info where code='$_POST[code]'");
	$row=mysql_fetch_array($sql);
	echo $row['count(id)'];
	?></td>
  
	<td>&nbsp;</td>
	<td ><?php include('dbcon/dbcon.php');
  // كود عرض الكمية المباعه
	$sql=mysql_query("select sum(qunt) from info where code='$_POST[code]'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(qunt)'];
	?></td>
  
	<td><?php include('dbcon/dbcon.php');
  // كود عرض اجمالي المبيعات
	$sql=mysql_query("select sum(price) from info where code='$_POST[code]'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(price)'];
	?></td>
	<td ><?php include('dbcon/dbcon.php');
  // كود عرض اجمالي المبيعات شامل الضريبة
	$sql=mysql_query("select sum(qunt*price) from info where code='$_POST[code]'");
	$row=mysql_fetch_array($sql);
	echo $br1=round($row['sum(qunt*price)'],2);
	?></td>
	</tr>
  </table>

  <!-- نهاية عرض التقرير الرابع -->

<br>
<?php } ?>


<br>


<?php
// الشرط الرابع
if(isset($_POST['ok5']))
{ ?>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<center>
<body>
     <!-- بداية ترويسة التقرير -->

<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover ">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;"><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;"><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center"> <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>تقرير أرباح المبيعات لسنة  <?php echo $_POST['year'];?> </strong></td>
            <td align="center"> تقرير المبيعات</td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<!-- نهاية ترويسة التقرير!-->
<br>

 <?php include('dbcon/config.php');
 // كود عرض تقرير سجل المبيعات برقم فاتورة
$sql=mysql_query("select * from sales where  date like '%$_POST[year]%' and tell = '1'");
$row=mysql_fetch_array($sql);?>




    <table style="width:100%; " border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
    <tr align="center" >
    <td nowrap style="width:15%;"><strong>الفاتورة</strong></td>
    <td nowrap style="width:20%;"><strong>الصنــف</strong></td>
      <td nowrap style="width:15%;"><strong>الوحدة</strong></td>
      <td nowrap style="width:10%;"><strong>الكمية</strong></td>
      <td nowrap style="width:8%;"><strong>البيع + الضريبة</strong></td>
      <td nowrap style="width:8%;"><strong>الشراء</strong></td>
      <td nowrap style="width:8%;"><strong> الضريبة</strong></td>
      <td nowrap style="width:8%;"><strong>الأجمالي</strong></td>
      <td nowrap style="width:8%;"><strong>الأربــاح</strong></td>
    </tr>
		  <?php do { ?>

    <tr>	
   <?php $xx=$row['product'];?>
   <td><?php echo $row['invoice'];?></td>
    <td><?php echo $row['name'];?></td>
      <td><?php echo $row['category'];?></td>
      <td><?php echo $row['qty'];?></td>
      <td><?php  $r1=$row['price']; $r1 = sprintf("%01.2f", $r1);  echo $r1;?></td>
      <td><?php  $r2=$row['discount']; $br2= sprintf("%01.2f", $r2);  echo $r2;?></td>
      <td><?php  $br=$row['qty']*$row['price']*$row['vat']/100; $br = sprintf("%01.2f", $br);  echo $br;?></td>
      <td><?php $br2=$row['qty']*$row['price']; $br2= sprintf("%01.2f", $br2);  echo $br2;?></td>
      <td><?php $brs =$r1-$r2; $brs = sprintf("%01.2f", $brs);  echo $brs;?></td>
 
        </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
  <td><strong>المجموع</strong></td>
  <td></td>
	<td ><?php include('dbcon/config.php');
  // كود مجموع العمليات
	$sql=mysql_query("select count(transaction_id) from sales where  date like '%$_POST[year]%' and tell = '1'");	$row=mysql_fetch_array($sql);	echo $row['count(transaction_id)'];	?></td>
  
  <td ><?php include('dbcon/config.php');  // كود مجموع الكميات
	$sql=mysql_query("select sum(qty) from sales where  date like '%$_POST[year]%' and tell = '1'");	$row=mysql_fetch_array($sql);	echo $row['sum(qty)'];?></td>
   
  
   <td><?php include('dbcon/config.php');
  // كود مجموع المبيعات 
  $sql=mysql_query("select sum(price) from sales where  date like '%$_POST[year]%' and tell = '1'");	$row=mysql_fetch_array($sql);	echo $add=$row['sum(price)'];?></td>
  
  <td><?php include('dbcon/config.php');
  // كود مجموع المبيعات 
	$sql=mysql_query("select sum(discount) from sales where  date like '%$_POST[year]%' and tell = '1'");	$row=mysql_fetch_array($sql);	echo $add=$row['sum(discount)'];?></td>
  

  <td><?php include('dbcon/config.php');
  // كود مجموع المبيعات 
  $sql=mysql_query("select sum(qty*price),vat from sales where  date like '%$_POST[year]%' and tell = '1'");
    $row=mysql_fetch_array($sql);	 $add=$row['sum(qty*price)']*$row['vat']/100;
    
  $add= sprintf("%01.2f", $add);  echo $add;?></td>
  

	<td><?php include('dbcon/config.php');
 // كود مجموع المبيعات * الكمية 
 $sql=mysql_query("select sum(price*qty) from sales where  date like '%$_POST[year]%' and tell = '1'");	$row=mysql_fetch_array($sql);	
  $sum=$row['sum(price*qty)'];
  
  $sum= sprintf("%01.2f", $sum);  echo $sum;?> </td>
  

  <td><?php include('dbcon/config.php');
 // كود مجموع المبيعات * الكمية 
 $sql=mysql_query("select sum(price*qty-discount*qty) from sales where  date like '%$_POST[year]%' and tell = '1'");	$row=mysql_fetch_array($sql);	
  $sum=$row['sum(price*qty-discount*qty)'];
  $sum= sprintf("%01.2f", $sum);  echo $sum;?> </td>
  

   
</tr>
  </table>

<br>
<?php } ?>


<br>

  <!-- جدول عرض بيانات زيل الصفحة-->

<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 12%;">الموقع</td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 12%;">البريد</td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;"> الهاتـف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left"  ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                </td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
  <!-- نهاية جدول عرض زيل الصفحة -->



  <!-- بداية جدول ازرار الطباعة والتنقل -->

</div>
<table style="width:98%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%;"  onclick="printDiv(); javascript:window.close()"> طباعة <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="exe.php"><button class="btn btn-primary" style="width: 100%;"> المبيعات <i class="fa ft-airplay"></i></button></a></td>
<td style="width:15%;"><a href="vsales.php"><button class="btn btn-primary" style="width: 100%;"> الإستعلام <i class="fa ft-search"></i></button></a></td>
<td style="width:15%;"><a href="salr3.php"><button class="btn btn-primary" style="width: 100%;"> التقارير <i class="fa ft-paperclip"></i></button></a></td>

</tr></table>
</center>

  <!-- نهاية ازار الطباعة والتنقل -->
