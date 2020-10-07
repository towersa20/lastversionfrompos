<?php include('header.php');?>

<script>
// دالة تنسيق الPrint

function printDiv() 
{
  var divToPrint=document.getElementById('DivIdToPrint');
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<html><title>Sales Report</title><body border="3" dir="rtl" onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
 //newWin.window.close();
  setTimeout(function(){newWin.close();},1);
}
//نهاية دالة تنسيق الPrint

</script>

  <body style="font-family: 'Droid Arabic Kufi', serif;" data-open="click" data-menu="vertical-menu">


  <!-- بداية عرض Report الاول -->

<?php
// بداية الشرط الأول
if(isset($_POST['ok1']))
{ ?>


<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<center>

    <!-- بداية ترويسة Report -->

<table style="width:100%;" border="1" align="center" class="table table-bordered table-hover">
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
            <td align="center"><strong>Sales Report From <?php echo $_POST['date1'];?> From <?php echo $_POST['date2'];?> </strong></td>
            <td align="center"> Sales Report </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
	</table>
<!-- نهاية ترويسة الملف -->

  <br>
<?php include('dbcon/dbcon.php');
 // كود عرض Sales Report الدورية
$sql=mysql_query("select * from sales where date between '$_POST[date1]' and '$_POST[date2]'  and tell = '1'");
$row=mysql_fetch_array($sql);?>




<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover">

    <tr align="center" >
    <td nowrap style="width:10%;"><strong>Bill No</strong></td>
    <td nowrap style="width:10%;"><strong>Product</strong></td>
      <td nowrap style="width:10%;"><strong>Unit</strong></td>
      <td nowrap style="width:6%;"><strong>Quntity</strong></td>
      <td nowrap style="width:6%;"><strong>Price</strong></td>
      <td nowrap style="width:6%;"><strong> Tax</strong></td>
      <td nowrap style="width:6%;"><strong>Total</strong></td>
      <td nowrap style="width:6%;"><strong>Total + Tax</strong></td>
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

        </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
  <td><strong>Total</strong></td>
  <td></td>
  <td></td>

	<td ><?php include('dbcon/dbcon.php');
  // كود عرض مجموع العلميات
	$sql=mysql_query("select count(transaction_id) from sales where date between '$_POST[date1]' and '$_POST[date2]'  and tell = '1'   ");
	$row=mysql_fetch_array($sql);
	echo $row['count(transaction_id)'];	?></td>
 
 
 

 
	<td><?php include('dbcon/dbcon.php');
  // كود عرض اجمFrom Sales
	$sql=mysql_query("select sum(price) from sales where date between '$_POST[date1]' and '$_POST[date2]'  and tell = '1'   ");
	$row=mysql_fetch_array($sql);
   $brs=$row['sum(price)'];   $brs = sprintf("%01.2f", $brs);  echo $brs;?></td>
  
	<td><?php include('dbcon/config.php');
  // عرض مجموع Sales * Quntity
	$sql=mysql_query("select sum(qty*price),vat from sales where date between '$_POST[date1]' and '$_POST[date2]'  and tell = '1'  ");
	$row=mysql_fetch_array($sql);
	 $sum=$row['sum(qty*price)']*$row['vat']/100; $sum = sprintf("%01.2f", $sum);  echo $sum;  ?></td>
  
 

  
	<td><?php include('dbcon/dbcon.php');
  // كود عرض اجمFrom Sales * Quntity 
	$sql=mysql_query("select sum(price*qty) from sales where date between '$_POST[date1]' and '$_POST[date2]'  and tell = '1' ");
	$row=mysql_fetch_array($sql);
   $sum= $row['sum(price*qty)'];
  $sum = sprintf("%01.2f", $sum);  echo $sum;

?></td>
  

	<td><?php include('dbcon/dbcon.php');
  // كود عرض اجمFrom Sales * Quntity شامل Tax
	$sql=mysql_query("select sum(price*qty),vat from sales where date between '$_POST[date1]' and '$_POST[date2]'  and tell = '1' ");
	$row=mysql_fetch_array($sql);
  $brs=$row['sum(price*qty)'];
  $brs = sprintf("%01.2f", $brs);  echo $brs;

?></td>

  	</tr>
  </table>

<?php
// نهاية الشرط الثاني
} ?>


<?php
// بداية الشرط الثاني
if(isset($_POST['ok2']))
{ ?>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">

<center>

    <!-- بداية ترويسة Report -->


<table  style="width:100%;" border="1" align="center" class="table table-bordered table-hover">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width: 25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width: 25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center"> <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>Sales Report <?php $rs=mysql_query("select*from products where pid='$_POST[name]'");
                      $rv=mysql_fetch_array($rs);
                      echo $_POST['name'];?> From Date  <?php echo $_POST['date1'];?> From <?php echo $_POST['date2'];?> </strong></td>
            <td align="center"> Sales Report </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<!-- نهاية الترويسة-->


<?php include('dbcon/dbcon.php');
// كود عرض Report الدوري
$sql=mysql_query("select * from sales where date between '$_POST[date1]' and '$_POST[date2]'  and tell = '1'and name='$_POST[name]'");
$row=mysql_fetch_array($sql);?>







<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover">

<tr align="center" >
    
    <td nowrap style="width:10%;"><strong>Bill No</strong></td>
    <td nowrap style="width:10%;"><strong>Product</strong></td>
      <td nowrap style="width:10%;"><strong>Unit</strong></td>
      <td nowrap style="width:6%;"><strong>Quntity</strong></td>
      <td nowrap style="width:6%;"><strong>Price</strong></td>
      <td nowrap style="width:6%;"><strong> Tax</strong></td>
      <td nowrap style="width:6%;"><strong>Total</strong></td>
    </tr>
		  <?php do { ?>

    <tr>	
    <td><?php echo $row['invoice'];?></td>
    <td><?php echo $row['name'];?></td>
      <td><?php echo $row['category'];?></td>
      <td><?php echo $br=$row['qty'];?></td>
      <td><?php $br=$row['price']; $br = sprintf("%01.2f", $br);  echo $br;?></td>
      <td><?php $brx= $row['qty']*$row['price']*$row['vat']/100; $brx = sprintf("%01.2f", $brx);  echo $brx;?></td>
      <td><?php $br=$row['qty']*$row['price']; $br = sprintf("%01.2f", $br);  echo $br;?></td>
        </tr>

	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
	<td><strong>Total</strong></td>
  <td></td><td></td>
	<td ><?php include('dbcon/dbcon.php');
  // كود عرض عدد عمليات Sales
	$sql=mysql_query("select count(transaction_id) from sales where date between '$_POST[date1]' and '$_POST[date2]'  and tell = '1'and name='$_POST[name]'  ");
	$row=mysql_fetch_array($sql);
	echo $row['count(transaction_id)'];	?></td>
 
 
 
 
 
	<td><?php include('dbcon/dbcon.php');
  // كود عرض اجمFrom Sales المباعة
	$sql=mysql_query("select sum(price) from sales where date between '$_POST[date1]' and '$_POST[date2]'  and tell = '1'and name='$_POST[name]'  ");
	$row=mysql_fetch_array($sql);
	echo $row['sum(price)'];?></td>
  

  
	<td><?php include('dbcon/dbcon.php');
  // كود عرض اجمFrom Sales * Quntity 
	$sql=mysql_query("select sum(price*qty),vat from sales where date between '$_POST[date1]' and '$_POST[date2]'  and tell = '1' and name='$_POST[name]' ");
	$row=mysql_fetch_array($sql);
   $brs=$row['sum(price*qty)']*$row['vat']/100;
   $brs = sprintf("%01.2f", $brs);  echo $brs;

?></td>
  
	<td><?php include('dbcon/dbcon.php');
  // كود عرض اجمFrom الخصم
	$sql=mysql_query("select sum(discount) from sales where date between '$_POST[date1]' and '$_POST[date2]'  and tell = '1' and name='$_POST[name]'  ");
	$row=mysql_fetch_array($sql);
	echo $row['sum(discount)'];?></td>
  
  	</tr>
  </table>

<?php

// نهاية الشرط الثاني
} ?>





<?php
// بداية الشرط الثالث
if(isset($_POST['ok3']))
{ ?>

<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">


<!-- بداية ترويسة Report -->
<center>
<br>
<table style="width:100%;" border="1" align="center" class="table table-bordered table-hover">
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
            <td align="center"><strong>Sales Report <?php echo $_POST['user'];?> From <?php echo $_POST['date1'];?> From <?php echo $_POST['date2'];?> </strong></td>
            <td align="center"> Sales Report </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<!--نهاية ترويسة Report-->

<br>
<?php include('dbcon/dbcon.php');
// كود عرض Sales Report الدرورية لمستخدم
$sql=mysql_query("select * from sales where date between '$_POST[date1]' and '$_POST[date2]' and tell = '1' ");
$row=mysql_fetch_array($sql);?>
<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover">

<tr align="center" >
    
    <td nowrap style="width:10%;"><strong>Bill No</strong></td>
    <td nowrap style="width:10%;"><strong>Product</strong></td>
      <td nowrap style="width:10%;"><strong>Unit</strong></td>
      <td nowrap style="width:6%;"><strong>Quntity</strong></td>
      <td nowrap style="width:6%;"><strong>Price</strong></td>
      <td nowrap style="width:6%;"><strong> Tax</strong></td>
      <td nowrap style="width:6%;"><strong>Total</strong></td>
    </tr>
		  <?php do { ?>

    <tr>	
    <td><?php echo $row['invoice'];?></td>
    <td><?php echo $row['name'];?></td>
      <td><?php echo $row['category'];?></td>
      <td><?php echo $br=$row['qty'];?></td>
      <td><?php $br=$row['price']; $br = sprintf("%01.2f", $br);  echo $br;?></td>
      <td><?php $brx= $row['qty']*$row['price']*$row['vat']/100; $brx = sprintf("%01.2f", $brx);  echo $brx;?></td>
      <td><?php $br=$row['qty']*$row['price']; $br = sprintf("%01.2f", $br);  echo $br;?></td>
        </tr>

	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
  <td><strong>Total</strong></td>
  <td></td>
  <td></td>
	<td ><?php include('dbcon/dbcon.php');
 
 // كود عرض مجموع العمليات
	$sql=mysql_query("select count(transaction_id) from sales where date between '$_POST[date1]' and '$_POST[date2]' and tell = '1' ");
	$row=mysql_fetch_array($sql);
	echo $row['count(transaction_id)'];	?></td>
 
 
 
 
	<td><?php include('dbcon/dbcon.php');
 // كود عرض اجمFrom سعر Fromبع
	$sql=mysql_query("select sum(price) from sales where date between '$_POST[date1]' and '$_POST[date2]'  and tell = '1' ");
	$row=mysql_fetch_array($sql);
   $brs=$row['sum(price)'];
   $brs = sprintf("%01.2f", $brs);  echo $brs;
?></td>


 
 
<td><?php include('dbcon/dbcon.php');
 // كود عرض اجمFrom سعر Fromبع
	$sql=mysql_query("select sum(price*qty*vat) from sales where date between '$_POST[date1]' and '$_POST[date2]'  and tell = '1' ");
	$row=mysql_fetch_array($sql);
   $brs=$row['sum(price*qty*vat)']/100;
   $brs = sprintf("%01.2f", $brs);  echo $brs;
?></td>




<td><?php include('dbcon/dbcon.php');
 // كود عرض اجمFrom سعر Fromبع
	$sql=mysql_query("select sum(price*qty) from sales where date between '$_POST[date1]' and '$_POST[date2]'  and tell = '1' ");
	$row=mysql_fetch_array($sql);
   $brs=$row['sum(price*qty)'];
   $brs = sprintf("%01.2f", $brs);  echo $brs;
?></td>

  	</tr>
  </table>


<?php
//نهاية الشرط الثالث
} ?>






<?php
// بداية الشرط الرابع
if(isset($_POST['ok4']))
{ ?>
<center>

    <!-- بداية ترويسة Report -->

<table border="5" cellspacing="5"  bordercolor="#CC9900" class="table table-border table-hover" style="width:100%; ">
  <tr>
    <td colspan="3"><img src="icon/header.png"  class="form-control" style="height:45%; "></td>
  </tr>
  <tr align="center">
    <td style="width:27%; "><strong>20<?php echo date('y-m-d h:i:s');?></strong></td>
    <td dir="rtl"><strong>Sales Report <?php echo $_POST['code'];?> </strong></td>
    <td style="width:27%; "><strong>المبيعـات</strong></td>
  </tr>
</table>
<br>
<?php include('dbcon/dbcon.php');
// كود عرض تقرير صنف برقم فاتورة
$sql=mysql_query("select * from sales where product='$_POST[code]' and tell ='1'");
$row=mysql_fetch_array($sql);?>




    <table style="width:100%; " border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
    <tr align="center" >
    <td nowrap style="width:10%;"><strong>Bill No</strong></td>

      <td nowrap style="width:15%;"><strong>Product</strong></td>
      <td nowrap style="width:15%;"><strong>Unit</strong></td>
      <td nowrap style="width:8%;"><strong>Quntity</strong></td>
      <td nowrap style="width:8%;"><strong>Price</strong></td>
      <td nowrap style="width:8%;"><strong>الإجمFrom</strong></td>
      <td nowrap style="width:8%;"><strong>الدفع</strong></td>
      <td nowrap style="width:8%;"><strong>Total + Tax</strong></td>
    </tr>
		  <?php do { ?>

    <tr>	
    <td nowrap><?php echo $row['invoice'];?></td>
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
	<td><strong>Total</strong></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select count(invoice) from  sales where product='$_POST[code]' and tell ='1'");
	$row=mysql_fetch_array($sql);
	echo $row['count(invoice)'];
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qty) from sales where product='$_POST[code]' and tell ='1'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(qty)'];
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price) from sales where product='$_POST[code]' and tell ='1'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(price)'];
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price*qunt) from sales where product='$_POST[code]' and tell='1'");
	$row=mysql_fetch_array($sql);
	echo $br1=round($row['sum(price*qunt)'],2);
	?></td>
	</tr>
  </table>

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
     <!-- بداية ترويسة Report -->

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
            <td align="center"><strong>Earnings Report Sales From  <?php echo $_POST['date1'];?> From <?php echo $_POST['date2'];?> </strong></td>
            <td align="center"> Sales Report</td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<!-- نهاية ترويسة Report!-->
<br>

 <?php include('dbcon/config.php');
 // كود عرض تقرير سجل Sales برقم فاتورة
$sql=mysql_query("select * from sales where date between '$_POST[date1]' and '$_POST[date2]'  and tell = '1' ");
$row=mysql_fetch_array($sql);?>




    <table style="width:100%; " border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
    <tr align="center" >
    <td nowrap style="width:15%;"><strong>Bill No</strong></td>
    <td nowrap style="width:20%;"><strong>Product</strong></td>
      <td nowrap style="width:15%;"><strong>Unit</strong></td>
      <td nowrap style="width:10%;"><strong>Quntity</strong></td>
      <td nowrap style="width:8%;"><strong>Sales + Tax</strong></td>
      <td nowrap style="width:8%;"><strong>price</strong></td>
      <td nowrap style="width:8%;"><strong> Tax</strong></td>
      <td nowrap style="width:8%;"><strong>earnings </strong></td>
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
      <td><?php $brs =$r1-$r2; $brs = sprintf("%01.2f", $brs);  echo $brs;?></td>
 
        </tr>
<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
  <td><strong>Total</strong></td>
  <td></td>
  <td></td>
	<td ><?php include('dbcon/config.php');
  // كود مجموع العمليات
	$sql=mysql_query("select count(transaction_id) from sales where date between '$_POST[date1]' and '$_POST[date2]' and tell = '1' ");	$row=mysql_fetch_array($sql);	echo $row['count(transaction_id)'];	?></td>



<td><?php include('dbcon/config.php');
  // كود مجموع Sales 
	$sql=mysql_query("select sum(price) from sales where date between '$_POST[date1]' and '$_POST[date2]' and tell = '1' ");	$row=mysql_fetch_array($sql);	echo $add=$row['sum(price)'];?></td>
  

  <td><?php include('dbcon/config.php');
  // كود مجموع Sales 
  $sql=mysql_query("select sum(discount) from sales where date between '$_POST[date1]' and '$_POST[date2]' and tell = '1' ");
    $row=mysql_fetch_array($sql);	$brs=$row['sum(discount)'];
    $brs = sprintf("%01.2f", $brs);  echo $brs;

?></td>
  
	<td><?php include('dbcon/config.php');
 // كود مجموع Sales * Quntity 
 $sql=mysql_query("select sum(price*qty*vat) from sales where  date between '$_POST[date1]' and '$_POST[date2]' and tell = '1' ");	$row=mysql_fetch_array($sql);
     $brs=$row['sum(price*qty*vat)']/100;
   $brs = sprintf("%01.2f", $brs);  echo $brs;

?> </td>

   

  
<td><?php include('dbcon/config.php');
 // كود مجموع Sales * Quntity 
 $sql=mysql_query("select sum(price*qty - discount*qty) from sales where  date between '$_POST[date1]' and '$_POST[date2]' and tell = '1' ");	$row=mysql_fetch_array($sql);
     $brs=$row['sum(price*qty - discount*qty)'];
   $brs = sprintf("%01.2f", $brs);  echo $brs;

?> </td>

   
 
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
            <td style="width: 12%;">الموقع </td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 12%;">البريد </td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;">رقم الهاتف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left"  ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
               </td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
  <!-- نهاية جدول عرض زيل الصفحة -->



  <!-- بداية جدول ازرار الPrint والتنقل -->

</div>
<table style="width:98%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%; font-family: 'Droid Arabic Kufi'"  onclick="printDiv(); javascript:window.close()"> Print <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="exe.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi'"> Sales <i class="fa ft-airplay"></i></button></a></td>
<td style="width:15%;"><a href="vsales.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi'"> Search <i class="fa ft-search"></i></button></a></td>
<td style="width:15%;"><a href="salr3.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi'"> Report <i class="fa ft-paperclip"></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi'"> Home <i class="fa fa-home"></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table>
</center>

  <!-- نهاية ازار الPrint والتنقل -->

  <br>
<br>
<br>
<br>
<br>