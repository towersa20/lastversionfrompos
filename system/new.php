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

<?php if(isset($_POST['ok']))
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
            <td align="center"><strong>تقرير المشتريــات  <?php echo $_POST['search'];?> </strong></td>
            <td align="center"> <strong>تقارير المشتريات</strong> </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<!-- نهاية ترويسة التقرير!-->


<br>
<!-- بداية كود عرض التقرير اليومي للمشتريات!-->

<?php include('dbcon/dbcon.php');
$sql=mysql_query("select * from share where date like '%search%' or formid like '%search%' or name like '%search%'  ");
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
      <td><?php echo $row['price'];?></td>
      <td><?php echo $x1=$row['qunt']*$row['price'];?></td>
      <td><?php echo $z1=$row['price']*$row['qunt']*$tax/100+$x1;?></td>
      <td><?php echo $row['sales'];?></td>
      <td><?php echo $x2=$row['qunt']*$row['sales'];?></td>
      <td><?php echo $z2=$row['qunt']*$row['sales'];?></td>
   </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
    
    <!-- عرض تقرير اجمالي المبالغ اليومية للمشتريات!-->

    <td><strong>المجموع</strong></td>
    <td><strong></strong></td>
	<td><?php include('dbcon/dbcon.php');
    // عرض مجموع الاصناف
	$sql=mysql_query("select count(pid) from share where date like '%search%' or formid like '%search%' or name like '%search%' ");
	$row=mysql_fetch_array($sql);
	echo $row['count(pid)'];
	?></td>
  
	<td><?php include('dbcon/dbcon.php');
  // عرض مجمو المبالغ
	$sql=mysql_query("select sum(price) from share where date like '%search%' or formid like '%search%' or name like '%search%' ");
	$row=mysql_fetch_array($sql);
	echo $row['sum(price)'];
	?></td>
  
	<td  style="color:red; background-color:#C8C8F3;"><?php include('dbcon/dbcon.php');
  // عرض اجمالي السعر * الكمية
	$sql=mysql_query("select sum(price*qunt) from share where date like '%search%' or formid like '%search%' or name like '%search%' ");
	$row=mysql_fetch_array($sql);
	echo $row['sum(price*qunt)'];
	?></td>
  
  
	<td><?php include('dbcon/dbcon.php');
  // عرض اجمالي السعر في الكمية شامل الضريبة
	$sql=mysql_query("select sum(qunt*price) from share where date like '%search%' or formid like '%search%' or name like '%search%' ");
	$row=mysql_fetch_array($sql);
	echo $xxx1=$row['sum(qunt*price)']*$tax/100+$row['sum(qunt*price)'];
	?></td>

	<td><?php include('dbcon/dbcon.php');
  // عرض اجمالي المبيعات
	$sql=mysql_query("select sum(sales) from share where date like '%search%' or formid like '%search%' or name like '%search%' ");
	$row=mysql_fetch_array($sql);
	echo $row['sum(sales)'];
	?></td>
	
	
	<td  style="color:red; background-color:#C8C8F3;"><?php include('dbcon/dbcon.php');
  // عرض اجمالي السعر البيع * الكمية 
	$sql=mysql_query("select sum(qunt*sales) from share where date like '%search%' or formid like '%search%' or name like '%search%' ");
	$row=mysql_fetch_array($sql);
	echo $row['sum(qunt*sales)'];
	?></td>
	
	
	
	<td><strong><?php include('dbcon/dbcon.php');
  // عرض صافي سعر البيع شامل الضريبة
	$sql=mysql_query("select sum(qunt*sales) from share where date like '%search%' or formid like '%search%' or name like '%search%' ");
	$row=mysql_fetch_array($sql);
	echo $xxx2=$row['sum(qunt*sales)'];
	?></strong></td>
	

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

