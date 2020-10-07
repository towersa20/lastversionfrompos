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

<?php if(isset($_POST['ok1']))
{ ?>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">

<center>
  
    <!-- بداية ترويسة Report -->

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
            <td align="center"><strong>Sales Report العام <?php echo $_POST['year'];?> </strong></td>
            <td align="center">  Sales Report </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
  <!-- نهاية عرض ترويسة Report -->




  <!-- بداية عرض سجل Sales Report السنوي -->

<br>
<?php include('dbcon/config.php');
// كود عرض Sales Report السنوي
$sql=mysql_query("select * from sales where date like '%$_POST[year]%' and tell = '1'   ");
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
  // عرض مجموع Sales
	$sql=mysql_query("select sum(price) from sales where date like '%$_POST[year]%'  and tell = '1'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(price)'];?></td>
  
	<td><?php include('dbcon/config.php');
  // عرض مجموع Sales * Quntity
	$sql=mysql_query("select sum(qty*price),vat from sales where  date like '%$_POST[year]%' and tell = '1'   ");
	$row=mysql_fetch_array($sql);
	 $sum=$row['sum(qty*price)']*$row['vat']/100; $sum = sprintf("%01.2f", $sum);  echo $sum;  ?></td>
  
 
	<td><?php include('dbcon/config.php');
  // عرض مجموع Sales * Quntity
	$sql=mysql_query("select sum(price*qty) from sales where  date like '%$_POST[year]%' and tell = '1'   ");
	$row=mysql_fetch_array($sql);
	 $sum=$row['sum(price*qty)']; $sum = sprintf("%01.2f", $sum);  echo $sum;  ?></td>
  

	<td><?php include('dbcon/config.php');
  // عرض مجموع Sales * Quntity شامل Tax
	$sql=mysql_query("select sum(price*qty),vat from sales where  date like '%$_POST[year]%' and tell = '1'   ");
	$row=mysql_fetch_array($sql);
   $br=$row['sum(price*qty)']*$row['vat']/100+$sum; $br = sprintf("%01.2f", $br);  echo $br;  ?></td>

  	</tr>
  </table>
  <!-- نهاية عرض Report الاول -->

<br>
<?php } ?>



  <!-- بداية عرض Report الثاني -->



<?php if(isset($_POST['ok2']))
{ ?>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">

<center>
  
  
    <!-- بداية ترويسة Report -->

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
            <td align="center"><strong>Sales Report <?php echo $_POST['name'];?> General <?php echo $_POST['year'];?> </strong></td>
            <td align="center">  Sales Report </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
  <!-- نهاية عرض ترويسة Report -->





<br>
<?php include('dbcon/config.php');
// كود عرض Report السنوي لصنف 
$sql=mysql_query("select * from sales where  date like '%$_POST[year]%' and tell = '1'    and name='$_POST[name]'");
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
      <td><?php $br=$row['qty']*$row['price']; $br = sprintf("%01.2f", $br);  echo $br;?></td>
        </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
  <td><strong>Total</strong></td>
	<td></td>
  <td></td>
  

  

	<td><?php include('dbcon/config.php');
  //عرض اجمFrom الخصم
	$sql=mysql_query("select count(qty) from sales where  date like '%$_POST[year]%' and tell = '1'    and name='$_POST[name]'");
	$row=mysql_fetch_array($sql);
	echo $row['count(qty)'];?></td>


<td><?php include('dbcon/config.php');
  //عرض اجمFrom الخصم
	$sql=mysql_query("select sum(price) from sales where  date like '%$_POST[year]%' and tell = '1'    and name='$_POST[name]'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(price)'];?></td>

<td><?php include('dbcon/config.php');
  // عرض اجمFrom Sales
	$sql=mysql_query("select sum(price*qty*vat) from sales where  date like '%$_POST[year]%' and tell = '1'    and name='$_POST[name]'");
	$row=mysql_fetch_array($sql);
  $br=$row['sum(price*qty*vat)']/100;
  $br = sprintf("%01.2f", $br);  echo $br?></td>
  

  
  <td><?php include('dbcon/config.php');
  // عرض اجمFrom Sales
	$sql=mysql_query("select sum(price*qty) from sales where  date like '%$_POST[year]%' and tell = '1'    and name='$_POST[name]'");
	$row=mysql_fetch_array($sql);
   $br=$row['sum(price*qty)'];
  $br = sprintf("%01.2f", $br);  echo $br?></td>
  

	<td><?php include('dbcon/config.php');
  //عرض اجمFrom Sales شامل Tax
	$sql=mysql_query("select sum(price*qty),vat from sales where  date like '%$_POST[year]%' and tell = '1'    and name='$_POST[name]'");
	$row=mysql_fetch_array($sql);
   $brs=$row['sum(price*qty)'];
  $brs = sprintf("%01.2f", $brs);  echo $brs;

  ?></td>
 	</tr>
  </table>

  <!-- نهاية عرض Report الثاني -->

<br>
<?php } ?>



  <!-- بداية عرض Report الثالث -->

<?php if(isset($_POST['ok3']))
{ ?>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">

<center>
    <!-- بداية عرض ترويسة Report -->

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
            <td align="center"><strong>Sales Report <?php echo $_POST['user'];?> General <?php echo $_POST['year'];?> </strong></td>
            <td align="center">  Sales Report </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
  <!-- نهاية عرض ترويسة Report -->

<br>

<br>


<?php include('dbcon/dbcon.php');
// كود عرض Report السنوي لمستخدم
$sql=mysql_query("select * from sales where  date like '%$_POST[year]%' and tell = '1' and user='$_POST[user]'");
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
      <td><?php echo $row['qty']; ?></td>
      <td><?php $br=$row['price']; $br = sprintf("%01.2f", $br);  echo $br;?></td>
      <td><?php $brx= $row['qty']*$row['price']*$row['vat']/100; $brx = sprintf("%01.2f", $brx);  echo $brx;?></td>
      <td><?php $br=$row['qty']*$row['price']; $br = sprintf("%01.2f", $br);  echo $br;?></td>
        </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
  <td><strong>Total</strong></td>
  <td></td>
  <td></td>
  
	<td ><?php include('dbcon/config.php');
  // اجمFrom Quntity المباعة 
	$sql=mysql_query("select sum(qty) from sales where date like '%$_POST[year]%' and tell = '1'   and  user='$_POST[user]'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(qty)'];?></td>
  
  
	<td><?php include('dbcon/config.php');
  // كود عرض اجمFrom Sales
	$sql=mysql_query("select sum(price) from sales where date like '%$_POST[year]%' and tell = '1'   and  user='$_POST[user]' ");
	$row=mysql_fetch_array($sql);
  $br= $row['sum(price)'];
  $br = sprintf("%01.2f", $br);  echo $br;?></td>
  
	<td><?php include('dbcon/config.php');
  // كود عرض اجمFrom الخصم
	$sql=mysql_query("select sum(price*qty*vat) from sales where  date like '%$_POST[year]%' and tell = '1'    and  user='$_POST[user]'");
	$row=mysql_fetch_array($sql);
  $br= $row['sum(price*qty*vat)']/100;
  $br = sprintf("%01.2f", $br);  echo $br?></td>
  
	<td><?php include('dbcon/config.php');
  // كود عرض اجمFrom Price في Quntity
	$sql=mysql_query("select sum(price*qty) from sales where  date like '%$_POST[year]%' and tell = '1'    and  user='$_POST[user]'");
	$row=mysql_fetch_array($sql);
   $sum=$row['sum(price*qty)'];
   $sum= sprintf("%01.2f", $sum);  echo $sum;?></td>
  
   	</tr>
  </table>

<br>
  <!-- نهاية عرض Report الثالث -->

  

<br>
<?php } ?>



  <!-- بداية عرض Report الرابع -->

<?php if(isset($_POST['ok4']))
{ ?>
<center>
<body>
  
    <!-- بداية عرض ترويسة Report الرابع -->

<table border="5" cellspacing="5"  bordercolor="#CC9900" class="table table-border table-hover" style="width:100%; ">
  <tr>
    <td colspan="3"><img src="../icon/header.png"  class="form-control" style="height:45%; "></td>
  </tr>
  <tr align="center">
    <td style="width:25%; "><strong>20<?php echo date('y-m-d h:i:s');?></strong></td>
    <td dir="rtl"><strong>Sales Report <?php echo $_POST['code'];?> </strong></td>
    <td style="width:25%; "><strong>المبيعـات</strong></td>
  </tr>
</table>

  <!-- نهاية عرض ترويسة Report -->

<br>
<?php include('dbcon/dbcon.php');
// كود عرض Report برقم Bill No
$sql=mysql_query("select * from info where code='$_POST[code]'");
$row=mysql_fetch_array($sql);?>
    <table style="width:100%; " border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
    <tr align="center" >
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
	<td><strong>Total</strong></td>
	<td ><?php include('dbcon/dbcon.php');
  // كود عرض عدد العمليات
	$sql=mysql_query("select count(id) from info where code='$_POST[code]'");
	$row=mysql_fetch_array($sql);
	echo $row['count(id)'];
	?></td>
  
	<td>&nbsp;</td>
	<td ><?php include('dbcon/dbcon.php');
  // كود عرض Quntity المباعه
	$sql=mysql_query("select sum(qunt) from info where code='$_POST[code]'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(qunt)'];
	?></td>
  
	<td><?php include('dbcon/dbcon.php');
  // كود عرض اجمFrom Sales
	$sql=mysql_query("select sum(price) from info where code='$_POST[code]'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(price)'];
	?></td>
	<td ><?php include('dbcon/dbcon.php');
  // كود عرض اجمFrom Sales شامل Tax
	$sql=mysql_query("select sum(qunt*price) from info where code='$_POST[code]'");
	$row=mysql_fetch_array($sql);
	echo $br1=round($row['sum(qunt*price)'],2);
	?></td>
	</tr>
  </table>

  <!-- نهاية عرض Report الرابع -->

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
            <td align="center"><strong>Earnings Report Sales لسنة  <?php echo $_POST['year'];?> </strong></td>
            <td align="center"> Sales Report</td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<!-- نهاية ترويسة Report!-->
<br>

 <?php include('dbcon/config.php');
 // كود عرض تقرير سجل Sales برقم فاتورة
$sql=mysql_query("select * from sales where  date like '%$_POST[year]%' and tell = '1'");
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
      <td nowrap style="width:8%;"><strong>Total</strong></td>
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
      <td><?php $br2=$row['qty']*$row['price']; $br2= sprintf("%01.2f", $br2);  echo $br2;?></td>
      <td><?php $brs =$r1-$r2; $brs = sprintf("%01.2f", $brs);  echo $brs;?></td>
 
        </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
  <td><strong>Total</strong></td>
  <td></td>
	<td ><?php include('dbcon/config.php');
  // كود مجموع العمليات
	$sql=mysql_query("select count(transaction_id) from sales where  date like '%$_POST[year]%' and tell = '1'");	$row=mysql_fetch_array($sql);	echo $row['count(transaction_id)'];	?></td>
  
  <td ><?php include('dbcon/config.php');  // كود مجموع الكميات
	$sql=mysql_query("select sum(qty) from sales where  date like '%$_POST[year]%' and tell = '1'");	$row=mysql_fetch_array($sql);	echo $row['sum(qty)'];?></td>
   
  
   <td><?php include('dbcon/config.php');
  // كود مجموع Sales 
  $sql=mysql_query("select sum(price) from sales where  date like '%$_POST[year]%' and tell = '1'");	$row=mysql_fetch_array($sql);	echo $add=$row['sum(price)'];?></td>
  
  <td><?php include('dbcon/config.php');
  // كود مجموع Sales 
	$sql=mysql_query("select sum(discount) from sales where  date like '%$_POST[year]%' and tell = '1'");	$row=mysql_fetch_array($sql);	echo $add=$row['sum(discount)'];?></td>
  

  <td><?php include('dbcon/config.php');
  // كود مجموع Sales 
  $sql=mysql_query("select sum(qty*price),vat from sales where  date like '%$_POST[year]%' and tell = '1'");
    $row=mysql_fetch_array($sql);	 $add=$row['sum(qty*price)']*$row['vat']/100;
    
  $add= sprintf("%01.2f", $add);  echo $add;?></td>
  

	<td><?php include('dbcon/config.php');
 // كود مجموع Sales * Quntity 
 $sql=mysql_query("select sum(price*qty) from sales where  date like '%$_POST[year]%' and tell = '1'");	$row=mysql_fetch_array($sql);	
  $sum=$row['sum(price*qty)'];
  
  $sum= sprintf("%01.2f", $sum);  echo $sum;?> </td>
  

  <td><?php include('dbcon/config.php');
 // كود مجموع Sales * Quntity 
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



  <!-- بداية جدول ازرار الPrint والتنقل -->

</div>
<table style="width:98%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%;"  onclick="printDiv(); javascript:window.close()"> Print <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="exe.php"><button class="btn btn-primary" style="width: 100%;"> Sales <i class="fa ft-airplay"></i></button></a></td>
<td style="width:15%;"><a href="vsales.php"><button class="btn btn-primary" style="width: 100%;"> Search <i class="fa ft-search"></i></button></a></td>
<td style="width:15%;"><a href="salr3.php"><button class="btn btn-primary" style="width: 100%;"> Report <i class="fa ft-paperclip"></i></button></a></td>

</tr></table>
</center>

  <!-- نهاية ازار الPrint والتنقل -->
