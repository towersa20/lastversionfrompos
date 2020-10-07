<?php
// استدعاء قاعدة البيانات
include("dbcon/dbcon.php");
//عرض بيانات Bill No المخزن بشاشة المبيعات
$nx=mysql_query("select * from vat");
$mx=mysql_fetch_array($nx);  $tax=$mx['tax'];
//نهاية الكود
?><?php
// ملف التصميم
include('header.php');?>

<script>
  // دالة جافا سكربت لPrint النموذج
function printDiv() 
{
  var divToPrint=document.getElementById('DivIdToPrint');
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<html><title>Report purchases</title><body border="3" dir="rtl" onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
// newWin.window.close();
  setTimeout(function(){newWin.close();},1);
}</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<!--فورم عرض  Purchases Report  السنوية!-->
 
 
 <!--عنوان الصفحة!-->

<title>Report purchases</title>

</head>

<!-- جسم الReport!-->

  <body style="font-family: 'Droid Arabic Kufi', serif; font-size:12px;" data-open="click" data-menu="vertical-menu">
    
    
    <!-- الشرط الأول لعرض الReport!-->
    
    
<?php if(isset($_POST['ok1']))
{ ?>
<center>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi'; font-size:12px;" dir="rtl">


<!-- بداية ترويسة الReport!-->
<br>
<table style="width:99%; font-size:12px;" border="1" align="center" class="table table-bordered table-hover ">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width: 25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="100" height="90"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width: 25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="100" height="90"> '; ?></td>
        </tr>
        <tr>
            <td align="center"> <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>General report for purchases <?php echo $_POST['date'];?></strong></td>
            <td align="center">  Purchases Report  </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<!-- نهاية ترويسة الReport!-->
<br>

<?php include('dbcon/dbcon.php');
// كود عرض الReport السنوي
$sql=mysql_query("select * from share where date like '%$_POST[date]%'   order by name desc");
$row=mysql_fetch_array($sql);?>



<table dir="rtl" style="width:99%; font-size:14px;" border="1" align="center" class="table table-bordered table-hover ">

    <tr align="center">
      <td nowrap style="width:8%;"><strong>Bill No</strong></td>
      <td nowrap style="width:12%;"><strong>Product</strong></td>
      <td nowrap style="width:7%;"><strong>Unit</strong></td>
      <td nowrap style="width:7%;"><strong>Qunitaty</strong></td>
      <td nowrap style="width:7%;"><strong>Price</strong></td>
      <td nowrap style="width:7%;"><strong>Total</strong></td>
      <td nowrap style="width:7%;"><strong>Tax + price</strong></td>
      <td nowrap style="width:7%;"><strong>Sales</strong></td>
      <td nowrap style="width:7%;"><strong>Tax + price</strong></td>
      <td nowrap style="width:7%;"><strong>earnings </strong></td>
      <td nowrap style="width:7%;"><strong>Date</strong></td>
    </tr>
		  <?php do { ?>

    <tr>	
    <td nowrap><?php echo $row['formid'];?></td>
      <td><?php echo $row['name'];?></td>
      <td nowrap><?php echo $row['unit'];?></td>
      <td><?php echo $row['qunt'];?></td>
      <td><?php  $br=$row['price'];
      
  $br = sprintf("%01.2f", $br);  echo $br;?></td>
      <td><?php  $x1=$row['qunt']*$row['price']; 
      
  $x1 = sprintf("%01.2f", $x1);  echo $x1;?></td>
      <td><?php  $z1=$row['price']*$row['qunt']*$tax/100+$x1; 
  $z1 = sprintf("%01.2f", $z1);  echo $z1;?></td> 
      <td><?php $br=$row['sales']; 
  $br = sprintf("%01.2f", $br);  echo $br;?></td>
      <td><?php  $x2=$row['qunt']*$row['sales']; 
  $x2 = sprintf("%01.2f", $x2);  echo $x2;?></td>
      <td><?php  $br=$x2-$z1; 
  $br = sprintf("%01.2f", $br);  echo $br;?></td>
	  <td nowrap><?php echo $row['date'];?></td>
   </tr>

	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
	<td><strong>Total</strong></td>
	<td></td>
	<td></td>
	<td ><?php include('dbcon/dbcon.php');
  // كود عرض عدد العمليات
	$sql=mysql_query("select count(pid) from share where date like '%$_POST[date]%'  ");
	$row=mysql_fetch_array($sql);
	echo $row['count(pid)'];
	?></td>
  
  
	<td><?php include('dbcon/dbcon.php');
  // كود مجموع purchases
	$sql=mysql_query("select sum(price) from share where date like '%$_POST[date]%'  ");
	$row=mysql_fetch_array($sql);
  $br=$row['sum(price)'];
  
  $br = sprintf("%01.2f", $br);  echo $br;
	?></td>
  
	<td><?php include('dbcon/dbcon.php');
  // كود عرض الPrice * Qunitaty
	$sql=mysql_query("select sum(qunt*price) from share where date like '%$_POST[date]%'  ");
	$row=mysql_fetch_array($sql);
  $br=$row['sum(qunt*price)'];
  
  $br = sprintf("%01.2f", $br);  echo $br;
	?></td>
  
	<td><?php include('dbcon/dbcon.php');
  // كود عرض الPrice * Qunitaty Tax + price
	$sql=mysql_query("select sum(qunt*price) from share where date like '%$_POST[date]%'  ");
	$row=mysql_fetch_array($sql);
   $xx2=$row['sum(qunt*price)']*$tax/100+$row['sum(qunt*price)'];
   
  $xx2 = sprintf("%01.2f", $xx2);  echo $xx2;
	?></td>

	<td><?php include('dbcon/dbcon.php');
  // كود عرض Sales 
	$sql=mysql_query("select sum(sales) from share where date like '%$_POST[date]%'  ");
	$row=mysql_fetch_array($sql);
   $br=$row['sum(sales)'];
  
  $br = sprintf("%01.2f", $br);  echo $br;
	?></td>
	
	
	<td><?php include('dbcon/dbcon.php');
    // كود عرض Sales * Qunitaty
	$sql=mysql_query("select sum(qunt*sales) from share where date like '%$_POST[date]%'  ");
	$row=mysql_fetch_array($sql);
   $xx3=$row['sum(qunt*sales)'];
   
  $xx3 = sprintf("%01.2f", $xx3);  echo $xx3;
	?></td>


	
  <td><?php  $br=$xx3-$xx2;
  
  $br = sprintf("%01.2f", $br);  echo $br;?></td>
	<td></td>
	
	</tr>
  </table>
<br>
<br>
<!-- Print اسم User!-->

<table style="width:98%; font-size:12px;" border="1"   align="center" class="table table-bordered table-hover"  dir="rtl">
    <tr><td style="width:12%; "><strong>User</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>

<!-- الفوتر الخاص بالReport!-->

<table dir="rtl" style="width:98%; font-size:12px;"  border="1" align="center" class="table table-bordered table-hover">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 15%;">الموقع الإلكتروني</td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 15%;">البريد الإلكتروني</td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;">رقم الهاتـــف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left" ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                <img src="icon/qr.png"  width="25" height="25" alt=""></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
</div>

<!-- ازرار Print الReport!-->

<table style="width:98%; font-size:12px;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%; font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> Print <i class=" fas fa-print "></i></button></a></td>
<td style="width:15%;"><a href="move.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> purchases <i class=" fas fa-shopping-basket "></i></button></a></td>
<td style="width:15%;"><a href="vshare.php"><button class="btn btn-primary" style="width: 100% ;font-family: 'Droid Arabic Kufi';"> Search <i class=" fas fa-search "></i></button></a></td>
<td style="width:15%;"><a href="shselect3.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> Report <i class=" far fa-file "></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> Home <i class=" fas fa-home "></i></button></a></td><td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table></center>

<!-- نهاية كود الReport السنوي!-->
<?php } ?>

<?php if(isset($_POST['ok2']))
{ ?>
<center>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi'; font-size:12px;" dir="rtl">

<br>
<!-- بداية ترويسة الReport!-->

<table style="width:99%; font-size:12px;" align="center" border="1" class="table table-bordered table-hover ">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center">Date <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>General report for purchases <?php echo $_POST['date'];?> from Supplier <?php echo $_POST['cust'];?></strong></td>
            <td align="center">  Purchases Report  </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<!-- نهاية ترويسة الReport!-->

<br>
<?php include('dbcon/dbcon.php');
//كود عرض الReport السنوي لمورد
$sql=mysql_query("select * from share where date like '%$_POST[date]%'   and  customer='$_POST[cust]' order by name desc");
$row=mysql_fetch_array($sql);?>


<table dir="rtl" style="width:99%; font-size:14px;" border="1" align="center" class="table table-bordered table-hover ">

    <tr align="center">
      <td nowrap style="width:8%;"><strong>Bill No</strong></td>
      <td nowrap style="width:12%;"><strong>Product</strong></td>
      <td nowrap style="width:7%;"><strong>Unit</strong></td>
      <td nowrap style="width:7%;"><strong>Qunitaty</strong></td>
      <td nowrap style="width:7%;"><strong>Price</strong></td>
      <td nowrap style="width:7%;"><strong>Total</strong></td>
      <td nowrap style="width:7%;"><strong>Tax + price</strong></td>
      <td nowrap style="width:7%;"><strong>Date</strong></td>
    </tr>
		  <?php do { ?>

    <tr>	
      <td nowrap><?php echo $row['formid'];?></td>
      <td><?php echo $row['name'];?></td>
      <td nowrap><?php echo $row['unit'];?></td>
      <td><?php echo $row['qunt'];?></td>
      <td><?php  $brs=$row['price']; 
  $brs = sprintf("%01.2f", $brs);  echo $brs;?></td>
      <td><?php  $x1=$row['qunt']*$row['price']; $x1 = sprintf("%01.2f", $x1);  echo $x1;?></td>
      <td><?php $br=$row['price']*$row['qunt']*$tax/100+$x1;   $br = sprintf("%01.2f", $br);  echo $br;?></td>

	  <td nowrap><?php echo $row['date'];?></td>
   </tr>

	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
	<td><strong>Total</strong></td>
	<td></td>
	<td></td>
	<td ><?php include('dbcon/dbcon.php');
  // كود عرض عدد العمليات
	$sql=mysql_query("select count(pid) from share where date like '%$_POST[date]%'  and  customer='$_POST[cust]'   ");
	$row=mysql_fetch_array($sql);
	echo $row['count(pid)'];
	?></td>
  
  
	<td><?php include('dbcon/dbcon.php');
  // كود مجموع purchases
	$sql=mysql_query("select sum(price) from share where date like '%$_POST[date]%'  and  customer='$_POST[cust]'  ");
	$row=mysql_fetch_array($sql);
   $br=$row['sum(price)'];
   
  $br = sprintf("%01.2f", $br);  echo $br;
	?></td>
  
	<td><?php include('dbcon/dbcon.php');
  // كود عرض الPrice * Qunitaty
	$sql=mysql_query("select sum(qunt*price) from share where date like '%$_POST[date]%'  and  customer='$_POST[cust]'  ");
	$row=mysql_fetch_array($sql);
   $br=$row['sum(qunt*price)'];
  
  $br = sprintf("%01.2f", $br);  echo $br;
	?></td>
  
	<td><?php include('dbcon/dbcon.php');
  // كود عرض الPrice * Qunitaty Tax + price
	$sql=mysql_query("select sum(qunt*price) from share where date like '%$_POST[date]%'  and  customer='$_POST[cust]'  ");
	$row=mysql_fetch_array($sql);
   $xx2=$row['sum(qunt*price)']*$tax/100+$row['sum(qunt*price)'];
   
  $xx2 = sprintf("%01.2f", $xx2);  echo $xx2;
	?></td>

	
	</tr>
  </table>
<br>
<!-- Print اسم User!-->

<table style="width:98%; font-size:12px;" border="1"   align="center" class="table table-bordered table-hover"  dir="rtl">
    <tr><td style="width:12%; "><strong>User</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>

<!-- الفوتر الخاص بالReport!-->

<table dir="rtl" style="width:98%; font-size:12px;"  border="1" align="center" class="table table-bordered table-hover">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 15%;">الموقع الإلكتروني</td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 15%;">البريد الإلكتروني</td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;">رقم الهاتـــف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left" ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                <img src="icon/qr.png"  width="25" height="25" alt=""></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
</div>

<!-- ازرار Print الReport!-->

<table style="width:98%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%; font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> Print <i class=" fas fa-print "></i></button></a></td>
<td style="width:15%;"><a href="move.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> purchases <i class=" fas fa-shopping-basket "></i></button></a></td>
<td style="width:15%;"><a href="vshare.php"><button class="btn btn-primary" style="width: 100% ;font-family: 'Droid Arabic Kufi';"> Search <i class=" fas fa-search "></i></button></a></td>
<td style="width:15%;"><a href="shselect3.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> Report <i class=" far fa-file "></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> Home <i class=" fas fa-home "></i></button></a></td><td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table></center>

<!-- نهاية كود الReport السنوي!-->

<?php } ?>




<?php
// شرط عرض الReport
if(isset($_POST['ok3']))
{ ?>
<center>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">

<br>

<!-- بداية ترويسة الReport !-->
<table style="width:99%; font-size:13px;" border="1" align="center" class="table table-bordered table-hover ">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center">Date <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>General report for purchases <?php echo $_POST['date'];?> For Product <?php echo $_POST['name'];?></strong></td>
            <td align="center">  Purchases Report  </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<!-- نهاية ترويسة الReport!-->




<br>
<?php include('dbcon/dbcon.php');
// عرض الReport  السنوي لمشتريات صنف
$sql=mysql_query("select * from share where date like '%$_POST[date]%' and  name='$_POST[name]'");
$row=mysql_fetch_array($sql);?>





<table dir="rtl" style="width:99%; font-size:14px;" border="1" align="center" class="table table-bordered table-hover ">

    <tr align="center">
      <td nowrap style="width:8%;"><strong>Bill No</strong></td>
      <td nowrap style="width:12%;"><strong>Product</strong></td>
      <td nowrap style="width:7%;"><strong>Unit</strong></td>
      <td nowrap style="width:7%;"><strong>Qunitaty</strong></td>
      <td nowrap style="width:7%;"><strong>Price</strong></td>
      <td nowrap style="width:7%;"><strong>Total</strong></td>
      <td nowrap style="width:7%;"><strong>Tax + price</strong></td>
        <td nowrap style="width:7%;"><strong>Date</strong></td>
    </tr>
		  <?php do { ?>

    <tr>	
      <td nowrap><?php echo $row['formid'];?></td>
      <td><?php echo $row['name'];?></td>
      <td nowrap><?php echo $row['unit'];?></td>
      <td><?php echo $row['qunt'];?></td>
      <td><?php  $brs=$row['price'];  $brs = sprintf("%01.2f", $brs);  echo $brs;?></td>
      <td><?php  $x1=$row['qunt']*$row['price'];  $x1 = sprintf("%01.2f", $x1);  echo $x1;?></td>
      <td><?php  $z1=$row['price']*$row['qunt']*$tax/100+$x1;  $z1 = sprintf("%01.2f", $z1);  echo $z1;?></td>
    <td nowrap><?php echo $row['date'];?></td>
   </tr>

	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
	<td><strong>Total</strong></td>
	<td></td>
	<td></td>
	<td ><?php include('dbcon/dbcon.php');
  // كود عرض عدد العمليات
	$sql=mysql_query("select count(pid) from share where date like '%$_POST[date]%'  and  name='$_POST[name]'");
	$row=mysql_fetch_array($sql);
	echo $row['count(pid)'];
	?></td>
  
  
	<td><?php include('dbcon/dbcon.php');
  // كود مجموع purchases
	$sql=mysql_query("select sum(price) from share where date like '%$_POST[date]%'  and  name='$_POST[name]' ");
	$row=mysql_fetch_array($sql);
  $brss=$row['sum(price)'];
  $brss = sprintf("%01.2f", $brss);  echo $brss;
	?></td>
  
	<td><?php include('dbcon/dbcon.php');
  // كود عرض الPrice * Qunitaty
	$sql=mysql_query("select sum(qunt*price) from share where date like '%$_POST[date]%'  and  name='$_POST[name]' ");
	$row=mysql_fetch_array($sql);
  $br=$row['sum(qunt*price)'];
  $br = sprintf("%01.2f", $br);  echo $br;
	?></td>
  
	<td><?php include('dbcon/dbcon.php');
  // كود عرض الPrice * Qunitaty Tax + price
	$sql=mysql_query("select sum(qunt*price) from share where date like '%$_POST[date]%' and  name='$_POST[name]' ");
	$row=mysql_fetch_array($sql);
   $brs=$row['sum(qunt*price)']*$tax/100+$row['sum(qunt*price)'];
  $brs = sprintf("%01.2f", $brs);  echo $brs;
	?></td>


	
	</tr>
  </table<br>

<!-- الفوتر الخاص بالReport!-->

<table dir="rtl" style="width:98%; font-size:13px;"  border="1" align="center" class="table table-bordered table-hover">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 15%;">الموقع الإلكتروني</td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 15%;">البريد الإلكتروني</td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;">رقم الهاتـــف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left" ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                <img src="icon/qr.png"  width="25" height="25" alt=""></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
</div>

<!-- ازرار Print الReport!-->

<table style="width:98%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%; font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> Print <i class=" fas fa-print "></i></button></a></td>
<td style="width:15%;"><a href="move.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> purchases <i class=" fas fa-shopping-basket "></i></button></a></td>
<td style="width:15%;"><a href="vshare.php"><button class="btn btn-primary" style="width: 100% ;font-family: 'Droid Arabic Kufi';"> Search <i class=" fas fa-search "></i></button></a></td>
<td style="width:15%;"><a href="shselect3.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> Report <i class=" far fa-file "></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> Home <i class=" fas fa-home "></i></button></a></td><td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table></center>

<!-- نهاية كود الReport السنوي!-->

<?php } ?>


<?php if(isset($_POST['ok4']))
{ ?>
<center>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<br>

<!--بداية ترويسة الملف -->
<table style="width:99%;" align="center" border="1" class="table table-bordered table-hover ">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width: 15%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width: 15%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center">Date <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>General report for purchases <?php echo $_POST['date'];?> For Product <?php echo $_POST['item'];?> from Supplier <?php echo $_POST['cust'];?></strong></td>
            <td align="center">  Purchases Report  </td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<br>
<!--نهاية ترويسة الملف -->


<?php include('dbcon/dbcon.php');
// كود عرض الReport السنوي
$sql=mysql_query("select * from share where date like '%$_POST[date]%'  and name='$_POST[item]' and customer='$_POST[cust]' ");
$row=mysql_fetch_array($sql);?>



<table dir="rtl" style="width:99%; font-size:14px;" border="1" align="center" class="table table-bordered table-hover ">

    <tr align="center">
      <td nowrap style="width:8%;"><strong>Bill No</strong></td>
      <td nowrap style="width:12%;"><strong>Product</strong></td>
      <td nowrap style="width:7%;"><strong>Unit</strong></td>
      <td nowrap style="width:7%;"><strong>Qunitaty</strong></td>
      <td nowrap style="width:7%;"><strong>Price</strong></td>
      <td nowrap style="width:7%;"><strong>Total</strong></td>
      <td nowrap style="width:7%;"><strong>Tax + price</strong></td>
      <td nowrap style="width:7%;"><strong>Date</strong></td>
    </tr>
		  <?php do { ?>

    <tr>	
      <td nowrap><?php echo $row['formid'];?></td>
      <td><?php echo $row['name'];?></td>
      <td nowrap><?php echo $row['unit'];?></td>
      <td><?php echo $row['qunt'];?></td>
      <td><?php $br=$row['price'];
      $br = sprintf("%01.2f", $br);  echo $br;   ?></td>
      <td><?php  $x1=$row['qunt']*$row['price']; $x1 = sprintf("%01.2f", $x1);  echo $x1;?></td>
      <td><?php  $z1=$row['price']*$row['qunt']*$tax/100+$x1; $z1 = sprintf("%01.2f", $z1);  echo $z1; ?></td>
   
	  <td nowrap><?php echo $row['date'];?></td>
   </tr>

	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
	<td><strong>Total</strong></td>
	<td></td>
	<td></td>
	<td ><?php include('dbcon/dbcon.php');
  // كود عرض عدد العمليات
	$sql=mysql_query("select count(pid) from share where date like '%$_POST[date]%'  and  name='$_POST[item]' and customer='$_POST[cust]'");
	$row=mysql_fetch_array($sql);
	echo $row['count(pid)'];
	?></td>
  
  
	<td><?php include('dbcon/dbcon.php');
  // كود مجموع purchases
	$sql=mysql_query("select sum(price) from share where date like '%$_POST[date]%'  and  name='$_POST[item]' and customer='$_POST[cust]'");
	$row=mysql_fetch_array($sql);
   $su1=$row['sum(price)'];
  $su1 = sprintf("%01.2f", $su1);  echo $su1;

	?></td>
  
	<td><?php include('dbcon/dbcon.php');
  // كود عرض الPrice * Qunitaty
	$sql=mysql_query("select sum(qunt*price) from share where date like '%$_POST[date]%'  and  name='$_POST[item]' and customer='$_POST[cust]'");
	$row=mysql_fetch_array($sql);
   $sum=$row['sum(qunt*price)'];
  
  $sum = sprintf("%01.2f", $sum);  echo $sum;
	?></td>
  	<td><?php include('dbcon/dbcon.php');
  // كود عرض الPrice * Qunitaty Tax + price
	$sql=mysql_query("select sum(qunt*price) from share where date like '%$_POST[date]%'  and  name='$_POST[item]' and customer='$_POST[cust]'");
	$row=mysql_fetch_array($sql);
   $xx2=$row['sum(qunt*price)']*$tax/100+$row['sum(qunt*price)'];
  $xx2 = sprintf("%01.2f", $xx2);  echo $xx2;

	?></td>	</tr>
  </table>
  
<br>

<br>
<!-- Print اسم User!-->

<table style="width:98%;" border="1"   align="center" class="table table-bordered table-hover"  dir="rtl">
    <tr><td style="width:12%; "><strong>User</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>

<!-- الفوتر الخاص بالReport!-->

<table dir="rtl" style="width:98%;"  border="1" align="center" class="table table-bordered table-hover">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 15%;">الموقع الإلكتروني</td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 15%;">البريد الإلكتروني</td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;">رقم الهاتـــف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left" ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                <img src="icon/qr.png"  width="25" height="25" alt=""></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
</div>

<!-- ازرار Print الReport!-->

<table style="width:98%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%; font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> Print <i class=" fas fa-print "></i></button></a></td>
<td style="width:15%;"><a href="move.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> purchases <i class=" fas fa-shopping-basket "></i></button></a></td>
<td style="width:15%;"><a href="vshare.php"><button class="btn btn-primary" style="width: 100% ;font-family: 'Droid Arabic Kufi';"> Search <i class=" fas fa-search "></i></button></a></td>
<td style="width:15%;"><a href="shselect3.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> Report <i class=" far fa-file "></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> Home <i class=" fas fa-home "></i></button></a></td><td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table></center>

<!-- نهاية كود الReport السنوي!-->

<?php } ?>







</body>
</html>

