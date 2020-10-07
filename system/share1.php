<?php
// ملف التصميم
include('header.php');?>

<script>
  // دالة جافا سكربت لطباعة النموذج
function printDiv() 
{
  var divToPrint=document.getElementById('DivIdToPrint');
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<html><title>تقرير المشتريات</title><body border="3" dir="rtl" onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
// newWin.window.close();
  setTimeout(function(){newWin.close();},1);
}</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<!--فورم عرض تقارير المشتريات اليومية!-->
 
 
 <!--عنوان الصفحة!-->

<title>تقرير المشتريات</title>

</head>

<!-- جسم التقرير!-->

  <body style="font-family: 'Droid Arabic Kufi', serif;" data-open="click" data-menu="vertical-menu">
    
    
    <!-- الشرط الأول لعرض التقرير!-->

<?php if(isset($_POST['ok1']))
{ ?>
<center>
  
  <!-- الdiv خاص بضبط حجم طباعة التقرير!-->

<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">


<!-- فورم نهاية فورمات استعراض التقارير!-->



<!-- إستعراض ترويسة التقرير!-->

<table style="width:99%;" border="1"  align="center" class="table table-bordered table-hover">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center"> <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>تقرير المشتريــات ليوم <?php echo $_POST['date'];?> </strong></td>
            <td align="center"> <strong>تقارير المشتريات</strong> </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<!-- نهاية ترويسة التقرير!-->


<br>
<!-- بداية كود عرض التقرير اليومي للمشتريات!-->

<?php include('dbcon/dbcon.php');
$sql=mysql_query("select * from share where date='$_POST[date]' ");
$row=mysql_fetch_array($sql);?>





<table style="width:99%;" border="1"  align="center" class="table table-bordered table-hover"  dir="rtl">

    <tr align="center">
    <td nowrap style="width:15%;"><strong>رقم الفاتورة</strong></td>
    <td nowrap style="width:25%;"><strong>الصنف</strong></td>
      <td nowrap style="width:7%;"><strong>الكمية</strong></td>
      <td nowrap style="width:7%;"><strong>شراء</strong></td>
      <td nowrap style="width:7%;"><strong>الإجمالي</strong></td>
      <td nowrap style="width:7%;"><strong>شامل الضريبة</strong></td>
      <td nowrap style="width:7%;"><strong>سعر البيع</strong></td>
      <td nowrap style="width:7%;"><strong>الإجمالي</strong></td>
      <td nowrap style="width:7%;"><strong>شامل الضريبة</strong></td>
    </tr>
		  <?php do { ?>

    <tr>	
    <td><?php echo $row['formid'];?></td>
    <td><?php echo $row['name'];?></td>
      <td><?php echo $row['qunt'];?></td>
      <td><?php  $br=$row['price']; 
  $br = sprintf("%01.2f", $br);  echo $br;?></td>
      <td><?php  $x1=$row['qunt']*$row['price'];    $x1 = sprintf("%01.2f", $x1);  echo $x1;?></td>
      <td><?php  $z1=$row['price']*$row['qunt']*$tax/100+$x1;   $z1 = sprintf("%01.2f", $z1);  echo $z1;?></td>
      <td><?php echo $row['sales'];?></td>
      <td><?php  $x2=$row['qunt']*$row['sales'];         $x2 = sprintf("%01.2f", $x2);  echo $x2;?></td>
      <td><?php  $z2=$row['qunt']*$row['sales'];         $z2 = sprintf("%01.2f", $z2);  echo $z2;?></td>
   </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
    
    <!-- عرض تقرير اجمالي المبالغ اليومية للمشتريات!-->

    <td><strong>المجموع</strong></td>
    <td><strong></strong></td>
	<td><?php include('dbcon/dbcon.php');
    // عرض مجموع الاصناف
	$sql=mysql_query("select count(pid) from share where date ='$_POST[date]' ");
	$row=mysql_fetch_array($sql);
	echo $row['count(pid)'];
	?></td>
  
	<td><?php include('dbcon/dbcon.php');
  // عرض مجمو المبالغ
	$sql=mysql_query("select sum(price) from share where date ='$_POST[date]' ");
	$row=mysql_fetch_array($sql);
  $zz1=$row['sum(price)'];
  $zz1 = sprintf("%01.2f", $zz1);  echo $zz1;

	?></td>
  
	<td  style="color:red; background-color:#C8C8F3;"><?php include('dbcon/dbcon.php');
  // عرض اجمالي السعر * الكمية
	$sql=mysql_query("select sum(price*qunt) from share where date ='$_POST[date]' ");
	$row=mysql_fetch_array($sql);
   $add=$row['sum(price*qunt)'];
   $add = sprintf("%01.2f", $add);  echo $add;

	?></td>
  
  
	<td><?php include('dbcon/dbcon.php');
  // عرض اجمالي السعر في الكمية شامل الضريبة
	$sql=mysql_query("select sum(qunt*price) from share where date ='$_POST[date]' ");
	$row=mysql_fetch_array($sql);
   $xx1=$row['sum(qunt*price)']*$tax/100+$row['sum(qunt*price)'];
  $xx1 = sprintf("%01.2f", $xx1);  echo $xx1;

	?></td>

	<td><?php include('dbcon/dbcon.php');
  // عرض اجمالي المبيعات
	$sql=mysql_query("select sum(sales) from share where date ='$_POST[date]' ");
	$row=mysql_fetch_array($sql);
   $z1=$row['sum(sales)'];
  $z1 = sprintf("%01.2f", $z1);  echo $z1;

	?></td>
	
	
	<td  style="color:red; background-color:#C8C8F3;"><?php include('dbcon/dbcon.php');
  // عرض اجمالي السعر البيع * الكمية 
	$sql=mysql_query("select sum(qunt*sales) from share where date ='$_POST[date]' ");
	$row=mysql_fetch_array($sql);
	 $xxx1=$row['sum(qunt*sales)'];   $xxx1 = sprintf("%01.2f", $xxx1);  echo $xxx1;	?></td>
	
	
	
	<td><strong><?php include('dbcon/dbcon.php');
  // عرض صافي سعر البيع شامل الضريبة
	$sql=mysql_query("select sum(qunt*sales) from share where date ='$_POST[date]' ");
	$row=mysql_fetch_array($sql);
   $xxx2=$row['sum(qunt*sales)'];      
    $xxx2 = sprintf("%01.2f", $xxx2);  echo $xxx2;	?></strong></td>
	

	</tr>
  </table>
<!-- نهاية التقرير اليومي للمشتريات!-->

<br>

<!-- طباعة اسم المستخدم!-->

<table style="width:99%;" border="1"   align="center" class="table table-bordered table-hover"  dir="rtl">
    <tr><td style="width:15%; "><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>

<!-- الفوتر الخاص بالتقرير!-->

<table dir="rtl" style="width:98%;"  border="1" align="center" class="table table-bordered table-hover">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 15%;">الموقع </td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 15%;">البريد </td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;"> الهاتـــف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left" ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                </td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
</div>

<!-- ازرار طباعة التقرير!-->

<table style="width:99%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%; font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> طباعة <i class=" fas fa-print "></i></button></a></td>
<td style="width:15%;"><a href="move.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> المشتريات <i class=" fas fa-shopping-basket "></i></button></a></td>
<td style="width:15%;"><a href="vshare.php"><button class="btn btn-primary" style="width: 100% ;font-family: 'Droid Arabic Kufi';"> الإستعلام <i class=" fas fa-search "></i></button></a></td>
<td style="width:15%;"><a href="shselect1.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> التقارير <i class=" far fa-file "></i></button></a></td>

</tr></table></center>

<!-- نهاية كود التقرير اليومي!-->

<?php } ?>




<?php
// الشرط الثاني لعرض التقرير اليومي 
if(isset($_POST['ok2']))
{ ?>
<center>

<!-- الكود ادناه لترويسة الملف!-->

<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<table dir="rtl" style="width:100%;"  border="1" align="center" class="table table-bordered table-hover">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center"><?php echo date('y-m-d h:i:s');?></td>
            <td align="center">تقرير المشتريات من المورد  <?php echo $_POST['cust'];?> بتاريخ <?php echo $_POST['date'];?></td>
            <td align="center"> تقارير المشتريات </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<!-- نهاية ترويسة التقرير!-->

<br>


<!-- الكود ادناه لعرض التقرير اليومي للمشتريات لعميل محدد!-->

<?php include('dbcon/dbcon.php');
$sql=mysql_query("select * from share where date='$_POST[date]' and customer='$_POST[cust]' ");
$row=mysql_fetch_array($sql);?>




<table dir="rtl" style="width:100%;"  border="1" align="center" class="table table-bordered table-hover">

    <tr align="center">
    <td nowrap style="width:12%;"><strong>رقم الفاتورة</strong></td>
    <td nowrap style="width:12%;"><strong>الباركود</strong></td>
    <td nowrap style="width:12%;"><strong>الصنف</strong></td>
      <td nowrap style="width:7%;"><strong>الكمية</strong></td>
      <td nowrap style="width:7%;"><strong>شراء</strong></td>
      <td nowrap style="width:7%;"><strong>الإجمالي</strong></td>
      <td nowrap style="width:7%;"><strong>شامل الضريبة</strong></td>
      <td nowrap style="width:7%;"><strong>سعر البيع</strong></td>
      <td nowrap style="width:7%;"><strong>الإجمالي</strong></td>
      <td nowrap style="width:7%;"><strong>شامل الضريبة</strong></td>
    </tr>
		  <?php do { ?>

    <tr>	
    <td><?php echo $row['formid'];?></td>
    <td><?php echo $row['barco'];?></td>
    <td><?php echo $row['name'];?></td>
      <td><?php echo $row['qunt'];?></td>
      <td><?php echo $row['price'];?></td>
      <td><?php  $x1=$row['qunt']*$row['price'];    $x1 = sprintf("%01.2f", $x1);  echo $x1;?></td>
      <td><?php  $z1=$row['price']*$row['qunt']*$tax/100+$x1;   $z1 = sprintf("%01.2f", $z1);  echo $z1;?></td>
      <td><?php echo $row['sales'];?></td>
      <td><?php  $x2=$row['qunt']*$row['sales'];         $x2 = sprintf("%01.2f", $x2);  echo $x2;?></td>
      <td><?php  $z2=$row['qunt']*$row['sales'];         $z2 = sprintf("%01.2f", $z2);  echo $z2;?></td>

   </tr>
   	<?php } while ($row=mysql_fetch_array($sql));?>


<!-- عرض اجمالي المبالغ الماليه!-->

	<tr>
	<td><strong>المجموع</strong></td>
	<td><strong></strong></td>
	<td><strong></strong></td>
	<td><?php include('dbcon/dbcon.php');
  // عرض سعر الشراء
	$sql=mysql_query("select count(pid) from share where  date='$_POST[date]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
	echo $row['count(pid)'];
	?></td>
  
	<td><?php include('dbcon/dbcon.php');
     // عرض مجموع سعر الشراء
	$sql=mysql_query("select sum(price) from share where  date='$_POST[date]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
   $br=$row['sum(price)'];
  
  $br = sprintf("%01.2f", $br);  echo $br;
	?></td>
  
	<td><?php include('dbcon/dbcon.php');
     // عرض  مجموع سعر الشراء * الكمية 
	$sql=mysql_query("select sum(price*qunt) from share where date ='$_POST[date]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
   $add=$row['sum(price*qunt)'];
  $add = sprintf("%01.2f", $add);  echo $add;	?></td>
  
	<td><?php include('dbcon/dbcon.php');
   // عرض مجموع الشراء  * الكمية شامل الضريبة
	$sql=mysql_query("select sum(qunt*price) from share where date ='$_POST[date]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
   $xx1=$row['sum(qunt*price)']*$tax/100+$row['sum(qunt*price)'];
  $xx1 = sprintf("%01.2f", $xx1);  echo $xx1;
	?></td>

	<td><?php include('dbcon/dbcon.php');
   // عرض مجموع سعر البيع
	$sql=mysql_query("select sum(sales) from share where date ='$_POST[date]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
  $zz2= $row['sum(sales)'];
  $zz2= sprintf("%01.2f", $zz2);  echo $zz2;
	?></td>
	
	
	<td><?php include('dbcon/dbcon.php');
   // عرض مجوع سعر البيع * الكمية 
	$sql=mysql_query("select sum(qunt*sales) from share where date ='$_POST[date]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
   $z2=$row['sum(qunt*sales)'];
  $z2 = sprintf("%01.2f", $z2);  echo $z2
	?></td>


  	<td><strong><?php include('dbcon/dbcon.php');
  // عرض صافي سعر البيع شامل الضريبة
	$sql=mysql_query("select sum(qunt*sales) from share where date ='$_POST[date]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
   $xxx2=$row['sum(qunt*sales)'];
  $xxx2 = sprintf("%01.2f", $xxx2);  echo $xxx2;
	?></strong></td>
	
	</tr>
  </table>
<br>

<!-- طباعة اسم المستخدم!-->

<table style="width:99%;" border="1"   align="center" class="table table-bordered table-hover"  dir="rtl">
    <tr><td style="width:15%; "><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>

<!-- زيل معلومات التقرير !-->

<table dir="rtl" style="width:100%;"  border="1" align="center" class="table table-bordered table-hover">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 15%;">الموقع </td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 15%;">البريد </td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;"> الهاتـف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left" ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                </td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>

</div>

<!-- أزار عرض التقرير!-->

<table style="width:99%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%; font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> طباعة <i class=" fas fa-print "></i></button></a></td>
<td style="width:15%;"><a href="move.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> المشتريات <i class=" fas fa-shopping-basket "></i></button></a></td>
<td style="width:15%;"><a href="vshare.php"><button class="btn btn-primary" style="width: 100% ;font-family: 'Droid Arabic Kufi';"> الإستعلام <i class=" fas fa-search "></i></button></a></td>
<td style="width:15%;"><a href="shselect1.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> التقارير <i class=" far fa-file "></i></button></a></td>

</tr></table></center>

<br>

<!-- نهاية عرض التقرير الثاني!-->

<?php } ?>




<?php
// الشرط الثالث عرض تقرير المشتريات لصنف
if(isset($_POST['ok3']))
{ ?>
<center>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">


<!-- بداية ترويسة التقرير !-->

<table dir="rtl" style="width:99%;"  border="1" align="center" class="table table-bordered table-hover">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center"> <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>تقرير المشتريــات ليوم <?php echo $_POST['date'];?> لصنف <?php echo $_POST['item'];?></strong></td>
            <td align="center"> تقارير المشتريات </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<!-- نهاية ترويسة التقرير !-->



<!-- بداية جدول عرض التقرير اليومي لمشتريات صنف !-->

<?php include('dbcon/dbcon.php');
//كود عرض التقرير اليومي لصنف
$sql=mysql_query("select * from share where date='$_POST[date]' and name='$_POST[item]' ");
$row=mysql_fetch_array($sql);?>





<table style="width:99%;" border="1" bordercolor="#CCCCCC"   align="center" class="table table-bordered table-hover"  dir="rtl">

    <tr align="center">
    <td nowrap style="width:12%;"><strong>رقم الفاتورة</strong></td>
    <td nowrap style="width:12%;"><strong>الباركود</strong></td>
    <td nowrap style="width:12%;"><strong>الصنف</strong></td>
      <td nowrap style="width:7%;"><strong>الكمية</strong></td>
      <td nowrap style="width:7%;"><strong>شراء</strong></td>
      <td nowrap style="width:7%;"><strong>الإجمالي</strong></td>
      <td nowrap style="width:7%;"><strong>شامل الضريبة</strong></td>
      <td nowrap style="width:7%;"><strong>سعر البيع</strong></td>
      <td nowrap style="width:8%;"><strong>الإجمالي</strong></td>
      <td nowrap style="width:7%;"><strong>شامل الضريبة</strong></td>
    </tr>
		  <?php do { ?>

    <tr>	
    <td><?php echo $row['formid'];?></td>

    <td><?php echo $row['barco'];?></td>
    <td><?php echo $row['name'];?></td>
      <td><?php echo $row['qunt'];?></td>
      <td><?php echo $row['price'];?></td>
      <td><?php  $x1=$row['qunt']*$row['price'];    $x1 = sprintf("%01.2f", $x1);  echo $x1;?></td>
      <td><?php  $z1=$row['price']*$row['qunt']*$tax/100+$x1;   $z1 = sprintf("%01.2f", $z1);  echo $z1;?></td>
      <td><?php echo $row['sales'];?></td>
      <td><?php  $x2=$row['qunt']*$row['sales'];         $x2 = sprintf("%01.2f", $x2);  echo $x2;?></td>
      <td><?php  $z2=$row['qunt']*$row['sales'];         $z2 = sprintf("%01.2f", $z2);  echo $z2;?></td>

   </tr>
   	<?php } while ($row=mysql_fetch_array($sql));?>
		<tr>
  <td><strong>المجموع</strong></td>
  <td><strong></strong></td>
	<td><strong></strong></td>

	<td><?php include('dbcon/dbcon.php');
  // عرض عدد العمليات
	$sql=mysql_query("select count(pid) from share where date ='$_POST[date]' and name='$_POST[item]' ");
	$row=mysql_fetch_array($sql);
	echo $row['count(pid)'];
	?></td>
	<td><?php include('dbcon/dbcon.php');
    // عرض سعر الشراء
	$sql=mysql_query("select sum(price) from share where date ='$_POST[date]' and name='$_POST[item]' ");
	$row=mysql_fetch_array($sql);
   $br=$row['sum(price)'];
  $br = sprintf("%01.2f", $br);  echo $br;	?></td>
	<td><?php include('dbcon/dbcon.php');
    // عرض سعر الشراء * الكمية 
	$sql=mysql_query("select sum(price*qunt) from share where date ='$_POST[date]' and name='$_POST[item]' ");
	$row=mysql_fetch_array($sql);
   $ad=$row['sum(price*qunt)'];
  $ad = sprintf("%01.2f", $ad);  echo $ad;  
	?></td>
	<td><?php include('dbcon/dbcon.php');
    // عرض سعر الشراء * الكمية شامل الضريبة
	$sql=mysql_query("select sum(qunt*price) from share where date ='$_POST[date]' and name='$_POST[item]' ");
	$row=mysql_fetch_array($sql);
   $xx1=round($row['sum(qunt*price)']*$tax/100+$row['sum(qunt*price)'],2);
  $xx1 = sprintf("%01.2f", $xx1);  echo $xx1;
  
	?></td>

	<td><?php include('dbcon/dbcon.php');
    // عرض سعر البيع 
	$sql=mysql_query("select sum(sales) from share where date ='$_POST[date]' and name='$_POST[item]' ");
	$row=mysql_fetch_array($sql);
   $add=$row['sum(sales)'];
  $add=sprintf("%01.2f", $add);  echo $add;?></td>
	
	
	<td><?php include('dbcon/dbcon.php');
    // عرض سعر البيع * الكمية 
	$sql=mysql_query("select sum(qunt*sales) from share where date ='$_POST[date]' and name='$_POST[item]' ");
	$row=mysql_fetch_array($sql);
   $xx1=$row['sum(qunt*sales)'];
  $xx1 = sprintf("%01.2f", $xx1);  echo $xx1;	?></td>
	
	
	
	<td><?php include('dbcon/dbcon.php');
  // عرض سعر البيع * الكمية شامل الضريبة
	$sql=mysql_query("select sum(qunt*sales) from share where date ='$_POST[date]' and name='$_POST[item]' ");
	$row=mysql_fetch_array($sql);
   $xx2=round($row['sum(qunt*sales)']);
  $xx2 = sprintf("%01.2f", $xx2);  echo $xx2;
	?></td>

	</tr>
  </table>
  

<!-- طباعة اسم المستخدم!-->

<table style="width:98%;" border="1"   align="center" class="table table-bordered table-hover"  dir="rtl">
    <tr><td style="width:15%; "><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>

<!-- الفوتر الخاص بالتقرير!-->

<table dir="rtl" style="width:98%;"  border="1" align="center" class="table table-bordered table-hover">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 15%;">الموقع </td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 15%;">البريد </td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;"> الهاتـف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left" ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                </td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
</div>

<!-- ازرار طباعة التقرير!-->

<table style="width:98%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%; font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> طباعة <i class=" fas fa-print "></i></button></a></td>
<td style="width:15%;"><a href="move.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> المشتريات <i class=" fas fa-shopping-basket "></i></button></a></td>
<td style="width:15%;"><a href="vshare.php"><button class="btn btn-primary" style="width: 100% ;font-family: 'Droid Arabic Kufi';"> الإستعلام <i class=" fas fa-search "></i></button></a></td>
<td style="width:15%;"><a href="shselect1.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> التقارير <i class=" far fa-file "></i></button></a></td>

</tr></table></center>

<!-- نهاية كود التقرير !-->

<br><?php } ?>


<!-- بداية ترويسة الملف !-->

<?php
// شرط عرض التقرير
if(isset($_POST['ok4']))
{ ?>
<center>
  
 
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">

<table dir="rtl" style="width:99%;" border="1"  align="center" class="table table-bordered table-hover">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center"> <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>  تقرير يوم <?php echo $_POST['date'];?> لصنف <?php echo $_POST['item'];?> من المورد <?php echo $_POST['cust'];?></strong></td>
            <td align="center"> تقارير المشتريات </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<br>
<!-- بداية ترويسة الملف !-->




<!-- كود بداي تقرير المشتريات اليومي من مورد لصنف!-->

<?php include('dbcon/dbcon.php');
// كود عرض تقرير المشتريات اليومي بناء علي المورد والصنف
$sql=mysql_query("select * from share where date='$_POST[date]' and name='$_POST[item]'
and customer='$_POST[cust]'  order by unit desc");
$row=mysql_fetch_array($sql);?>





<table style="width:99%;" border="1"  align="center" class="table table-bordered table-hover"  dir="rtl">

    <tr align="center">
    <td nowrap style="width:12%;"><strong>الفاتورة</strong></td>
    <td nowrap style="width:12%;"><strong>الباركود</strong></td>
    <td nowrap style="width:12%;"><strong>الصنف</strong></td>
      <td nowrap style="width:7%;"><strong>الكمية</strong></td>
      <td nowrap style="width:7%;"><strong>شراء</strong></td>
      <td nowrap style="width:7%;"><strong>الإجمالي</strong></td>
      <td nowrap style="width:7%;"><strong>شامل الضريبة</strong></td>
      <td nowrap style="width:7%;"><strong>البيع</strong></td>
      <td nowrap style="width:8%;"><strong>الإجمالي</strong></td>
      <td nowrap style="width:7%;"><strong>شامل الضريبة</strong></td>
    
    </tr>
		  <?php do { ?>

    <tr>	
    <td><?php echo $row['formid'];?></td>
    <td><?php echo $row['barco'];?></td>
    <td><?php echo $row['name'];?></td>
      <td><?php echo $row['qunt'];?></td>
      <td><?php echo $row['price'];?></td>
      <td><?php  $x1=$row['qunt']*$row['price'];    $x1 = sprintf("%01.2f", $x1);  echo $x1;?></td>
      <td><?php  $z1=$row['price']*$row['qunt']*$tax/100+$x1;   $z1 = sprintf("%01.2f", $z1);  echo $z1;?></td>
      <td><?php $br=$row['sales']; 
  $br = sprintf("%01.2f", $br);  echo $br;?></td>
      <td><?php  $x2=$row['qunt']*$row['sales'];         $x2 = sprintf("%01.2f", $x2);  echo $x2;?></td>
      <td><?php  $z2=$row['qunt']*$row['sales'];         $z2 = sprintf("%01.2f", $z2);  echo $z2;?></td>

   </tr>
		<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
	<td><strong>المجموع</strong></td>

  <td></td>
  <td></td>
	<td><?php include('dbcon/dbcon.php');
  // عدد العمليات
	$sql=mysql_query("select count(pid) from share where date ='$_POST[date]'  and name='$_POST[item]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
	echo $row['count(pid)'];
	?></td>
  
	<td><?php include('dbcon/dbcon.php');
  // أجمالي سعر الشراء
	$sql=mysql_query("select sum(price) from share where date ='$_POST[date]'  and name='$_POST[item]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
    $br=$row['sum(price)'];
  
  $br = sprintf("%01.2f", $br);  echo $br;
	?></td>
  
	<td><?php include('dbcon/dbcon.php');
  //كود عرض الشراء * الكمية
	$sql=mysql_query("select sum(qunt*price) from share where date ='$_POST[date]' and name='$_POST[item]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
	  $br=$row['sum(qunt*price)'];
	
  $br = sprintf("%01.2f", $br);  echo $br;?></td>
  
	<td><?php include('dbcon/dbcon.php');
  //كود عرض الشراء * الكمية شامل الضريبة
	$sql=mysql_query("select sum(qunt*price) from share where date ='$_POST[date]' and name='$_POST[item]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
   $xx1=$row['sum(qunt*price)']*$tax/100+$row['sum(qunt*price)'];
  
  $xx1 = sprintf("%01.2f", $br);  echo $xx1;
	?></td>

	<td><?php include('dbcon/dbcon.php');
  //ااجمالي سعر البيع
	$sql=mysql_query("select sum(sales) from share where date ='$_POST[date]' and name='$_POST[item]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
  $br=$row['sum(sales)'];
  
  $br = sprintf("%01.2f", $br);  echo $br;	?></td>
	
	
	<td><?php
  // كود عرض سعر البيع * الكمية
  include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qunt*sales) from share where date ='$_POST[date]' and name='$_POST[item]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
	  $br=$row['sum(qunt*sales)'];
	
    $br = sprintf("%01.2f", $br);  echo $br;?></td>
	
	
	<td><?php include('dbcon/dbcon.php');
  
  // كود عرض سعر البيع شامل الضريبة
	$sql=mysql_query("select sum(qunt*sales) from share where date ='$_POST[date]' and name='$_POST[item]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
   $xx2=$row['sum(qunt*sales)'];
   
  $xx2 = sprintf("%01.2f", $xx2);  echo $xx2;
	?></td>

	</tr>
  </table>

<br>
<!-- طباعة اسم المستخدم!-->

<table style="width:98%;" border="1"   align="center" class="table table-bordered table-hover"  dir="rtl">
    <tr><td style="width:15%; "><strong>المستخدم</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>

<!-- الفوتر الخاص بالتقرير!-->

<table dir="rtl" style="width:98%;"  border="1" align="center" class="table table-bordered table-hover">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 15%;">الموقع </td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 15%;">البريد </td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;"> الهاتـف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left" ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                </td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
</div>

<!-- ازرار طباعة التقرير!-->

<table style="width:98%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%; font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> طباعة <i class=" fas fa-print "></i></button></a></td>
<td style="width:15%;"><a href="move.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> المشتريات <i class=" fas fa-shopping-basket "></i></button></a></td>
<td style="width:15%;"><a href="vshare.php"><button class="btn btn-primary" style="width: 100% ;font-family: 'Droid Arabic Kufi';"> الإستعلام <i class=" fas fa-search "></i></button></a></td>
<td style="width:15%;"><a href="shselect1.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> التقارير <i class=" far fa-file "></i></button></a></td>

</tr></table></center>

<!-- نهاية كود التقرير اليومي!-->
<?php } ?>



</body>
</html>
<!-- نهاية الشاشة!-->
