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


<!--فورم عرض تقارير المشتريات الدورية!-->
 
 
 <!--عنوان الصفحة!-->

<title>تقرير المشتريات</title>

</head>

<!-- جسم التقرير!-->

  <body style="font-family: 'Droid Arabic Kufi', serif; font-size:14px;" data-open="click" data-menu="vertical-menu">
    
    
    <!-- الشرط الأول لعرض التقرير!-->
    
    
<?php if(isset($_POST['ok1']))
{ ?>
<center>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi'; font-size:14px;" dir="rtl">

<table style="width:99%;" border="1" align="center" class="table table-bordered table-hover">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 15px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td style="font-size:15px;" align="center">التاريخ <?php echo date('y-m-d h:i:s');?></td>
            <td style="font-size:15px;" align="center"><strong>تقرير المشتريــات من <?php echo $_POST['date1'];?> الي <?php echo $_POST['date2'];?></strong></td>
            <td align="center" style="font-size:12px;"> <strong>تقارير المشتريات</strong> </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<!-- نهاية ترويسة التقرير!-->

<br>
<?php include('dbcon/dbcon.php');
// كود عرض التقرير الدوري للمشتريات
$sql=mysql_query("select * from share where date between '$_POST[date1]' and '$_POST[date2]'   order by unit desc");
$row=mysql_fetch_array($sql);?>



<table dir="rtl" style="width:99%; font-size:14px;" border="1" align="center" class="table table-bordered table-hover">

    <tr align="center">
    <td nowrap style="width:15%;"><strong>رقم الفاتورة</strong></td>
    <td nowrap style="width:15%;"><strong>الباركود</strong></td>
    <td nowrap style="width:20%;"><strong>الصنف</strong></td>
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
      <td><?php $br=$row['price']; 
  $br = sprintf("%01.2f", $br);  echo $br;?></td>
      <td><?php  $x1=$row['qunt']*$row['price'];    $x1 = sprintf("%01.2f", $x1);  echo $x1;?></td>
      <td><?php  $z1=$row['price']*$row['qunt']*$tax/100+$x1;   $z1 = sprintf("%01.2f", $z1);  echo $z1;?></td>
      <td><?php echo $row['sales'];?></td>
      <td><?php  $x2=$row['qunt']*$row['sales'];         $x2 = sprintf("%01.2f", $x2);  echo $x2;?></td>
      <td><?php  $z2=$row['qunt']*$row['sales'];         $z2 = sprintf("%01.2f", $z2);  echo $z2;?></td>

   </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
    <td><strong>المجموع</strong></td>
    <td></td>

	<td><strong></strong></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select count(pid) from share where date between '$_POST[date1]' and '$_POST[date2]'  ");
	$row=mysql_fetch_array($sql);
	echo $row['count(pid)'];
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price) from share where date between '$_POST[date1]' and '$_POST[date2]' ");
	$row=mysql_fetch_array($sql);
     $br=$row['sum(price)'];
    
  $br = sprintf("%01.2f", $br);  echo $br;
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price*qunt) from share where date between '$_POST[date1]' and '$_POST[date2]' ");
	$row=mysql_fetch_array($sql);
	echo $br=$row['sum(price*qunt)'];
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qunt*price) from share where date between '$_POST[date1]' and '$_POST[date2]' ");
	$row=mysql_fetch_array($sql);
     $xx2=$row['sum(qunt*price)']*$tax/100+$row['sum(qunt*price)'];
    
  $xx2 = sprintf("%01.2f", $xx2);  echo $xx2;
	?></td>

	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(sales) from share where date between '$_POST[date1]' and '$_POST[date2]' ");
	$row=mysql_fetch_array($sql);
     $br=$row['sum(sales)'];
    
  $br = sprintf("%01.2f", $br);  echo $br;
	?></td>
	
	
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qunt*sales) from share where date between '$_POST[date1]' and '$_POST[date2]' ");
	$row=mysql_fetch_array($sql);
     $br=$row['sum(qunt*sales)'];
    
  $br = sprintf("%01.2f", $br);  echo $br;
	?></td>
	
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qunt*sales) from share where date between '$_POST[date1]' and '$_POST[date2]' ");
	$row=mysql_fetch_array($sql);
     $xx1=$row['sum(qunt*sales)'];
    
  $xx1 = sprintf("%01.2f", $xx1);  echo $xx1;
	?></td>
	</tr>
  </table>


<br>
<!-- طباعة اسم المستخدم!-->

<table style="width:98%; font-size:14px;" border="1"   align="center" class="table table-bordered table-hover"  dir="rtl">
    <tr><td style="width:15%; "><strong> المستخدم</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>

<!-- الفوتر الخاص بالتقرير!-->

<table dir="rtl" style="width:98%; font-size:14px;"  border="1" align="center" class="table table-bordered table-hover">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 15%;">الموقع </td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 15%;">البريد </td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;"> الهاتــف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
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

<table style="width:98%; font-size:12px;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%; font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> طباعة <i class=" fas fa-print "></i></button></a></td>
<td style="width:15%;"><a href="move.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> المشتريات <i class=" fas fa-shopping-basket "></i></button></a></td>
<td style="width:15%;"><a href="vshare.php"><button class="btn btn-primary" style="width: 100% ;font-family: 'Droid Arabic Kufi';"> الإستعلام <i class=" fas fa-search "></i></button></a></td>
<td style="width:15%;"><a href="shselect2.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> التقارير <i class=" far fa-file "></i></button></a></td>

</tr></table></center>

<!-- نهاية كود التقرير الدوري!-->

<br>
<?php } ?>

<?php if(isset($_POST['ok2']))
{ ?>
<center>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">


<!-- بداية ترويسة التقرير!-->

<table dir="rtl" style="width:99%;" border="1" align="center" class="table table-bordered table-hover">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td  style="font-size: 12px;" align="center" style="width: 25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 14px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td  style="font-size: 12px;" align="center" style="width: 25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td  style="font-size: 12px;" align="center"> <?php echo date('y-m-d h:i:s');?></td>
            <td style="font-size: 12px;" align="center"><strong>تقرير المشتريــات  من المورد <?php echo $_POST['cust'];?> من  <?php echo $_POST['date1'];?> الي  <?php echo $_POST['date2'];?></strong></td>
            <td  style="font-size: 12px;" align="center"><strong> تقارير المشتريات</strong> </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<!-- نهاية ترويسة التقرير!-->



<br>

<?php include('dbcon/dbcon.php');
// كود عرض التقرير الدوري لعميل
$sql=mysql_query("select * from share where date between '$_POST[date1]' and '$_POST[date2]'
and customer='$_POST[cust]'  order by unit desc");
$row=mysql_fetch_array($sql);?>


<table dir="rtl" style="width:99%; font-size: 14px;" border="1" align="center" class="table table-bordered table-hover">

    <tr align="center">
    <td nowrap style="width:15%;"><strong>رقم الفاتورة</strong></td>
    <td nowrap style="width:15%;"><strong>الباركود</strong></td>
    <td nowrap style="width:20%;"><strong>الصنف</strong></td>
    <td nowrap style="width:7%;"><strong>الكمية</strong></td>
    <td nowrap style="width:7%;"><strong>شراء</strong></td>
    <td nowrap style="width:7%;"><strong>الإجمالي</strong></td>
    <td nowrap style="width:7%;"><strong>شامل الضريبة</strong></td>
    <td nowrap style="width:7%;"><strong>التاريخ</strong></td>
    </tr>
		  <?php do { ?>

    <tr>	
    <td><?php echo $row['formid'];?></td>
    <td><?php echo $row['barco'];?></td>
    <td><?php echo $row['name'];?></td>
      <td><?php echo $row['qunt'];?></td>
      <td><?php $br=$row['price']; 
  $br = sprintf("%01.2f", $br);  echo $br;?></td>
      <td><?php  $x1=$row['qunt']*$row['price']; 
  $x1 = sprintf("%01.2f", $x1);  echo $x1;?></td>
      <td><?php  $z1=$row['price']*$row['qunt']*$tax/100+$x1; 
  $x1 = sprintf("%01.2f", $x1);  echo $x1;?></td>
      <td><?php echo $row['date'];?></td>

   </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
	<td><strong>المجموع</strong></td>
	<td><strong></strong></td>
	<td><strong></strong></td>
	<td ><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select count(pid) from share where date between '$_POST[date1]' and '$_POST[date2]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
	echo $row['count(pid)'];
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price) from share where date between '$_POST[date1]' and '$_POST[date2]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
     $br=$row['sum(price)'];
    
  $br = sprintf("%01.2f", $br);  echo $br;
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price*qunt) from share where date between '$_POST[date1]' and '$_POST[date2]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
     $br=$row['sum(price*qunt)'];
    
  $br = sprintf("%01.2f", $br);  echo $br;
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qunt*price) from share where date between '$_POST[date1]' and '$_POST[date2]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
     $xx2=round($row['sum(qunt*price)'],2);
    
  $xx2 = sprintf("%01.2f", $xx2);  echo $xx2;
	?></td>

	</tr>
  </table>
  
<br>
<!-- طباعة اسم المستخدم!-->

<table style="width:98%;" border="1"   align="center" class="table table-bordered table-hover"  dir="rtl">
    <tr><td style="width:12%; "><strong>المستخدم</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>

<!-- الفوتر الخاص بالتقرير!-->

<table dir="rtl" style="width:98%;font-size:12px;"  border="1" align="center" class="table table-bordered table-hover">
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
<td style="width:15%;"><a href="shselect2.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> التقارير <i class=" far fa-file "></i></button></a></td>
</tr></table></center>

<!-- نهاية كود التقرير الدوري!-->

<?php } ?>




<?php if(isset($_POST['ok3']))
{ ?>
<center>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<br>
<table dir="rtl" style="width:99%;" border="1" align="center" class="table table-bordered table-hover">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width: 25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width: 25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center"> <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>تقرير المشتريــات من <?php echo $_POST['date1'];?> الي <?php echo $_POST['date2'];?> للصنف <?php echo $_POST['item'];?></strong></td>
            <td align="center"><strong> تقارير المشتريات</strong> </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<!-- نهاية ترويسة التقرير!-->





<br>
<?php include('dbcon/dbcon.php');
// التقرير الدوري لمشتريات صنف
$sql=mysql_query("select * from share where date between '$_POST[date1]' and '$_POST[date2]'
and name='$_POST[item]' ");
$row=mysql_fetch_array($sql);?>


<table dir="rtl" style="width:99%;" border="1" align="center" class="table table-bordered table-hover">

    <tr align="center">
    <td nowrap style="width:15%;"><strong>رقم الفاتورة</strong></td>

    <td nowrap style="width:15%;"><strong>الباركود</strong></td>
    <td nowrap style="width:20%;"><strong>الصنف</strong></td>
      <td nowrap style="width:7%;"><strong>الكمية</strong></td>
      <td nowrap style="width:7%;"><strong>شراء</strong></td>
      <td nowrap style="width:7%;"><strong>الإجمالي</strong></td>
      <td nowrap style="width:7%;"><strong>شامل الضريبة</strong></td>
      <td nowrap style="width:7%;"><strong>التاريخ</strong></td>

    </tr>
		  <?php do { ?>

    <tr>	
    <td><?php echo $row['formid'];?></td>
    <td><?php echo $row['barco'];?></td>
    <td><?php echo $row['name'];?></td>
      <td><?php echo $row['qunt'];?></td>
      <td><?php $br=$row['price'];
      
  $br = sprintf("%01.2f", $br);  echo $br;?></td>
      <td><?php  $x1=$row['qunt']*$row['price'];
      
  $x1 = sprintf("%01.2f", $x1);  echo $x1;?></td>
      <td><?php  $z1=$row['price']*$row['qunt']*$tax/100+$x1;
        $z1 = sprintf("%01.2f", $z1);  echo $z1;?></td>
      <td><?php echo $row['date'];?></td>
   </tr>

	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
    <td><strong>المجموع</strong></td>
    <td><strong></strong></td>
    <td><strong></strong></td>
	<td ><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select count(pid) from share where date between '$_POST[date1]' and '$_POST[date2]' and name='$_POST[item]' ");
	$row=mysql_fetch_array($sql);
	echo round($row['count(pid)'],2);
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price) from share where date between '$_POST[date1]' and '$_POST[date2]' and name='$_POST[item]' ");
	$row=mysql_fetch_array($sql);
     $br=$row['sum(price)'];
     $br = sprintf("%01.2f", $br);  echo $br;
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qunt*price) from share where date between '$_POST[date1]' and '$_POST[date2]' and name='$_POST[item]' ");
	$row=mysql_fetch_array($sql);
     $br=$row['sum(qunt*price)'];
     $br = sprintf("%01.2f", $br);  echo $br;
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qunt*price) from share where date between '$_POST[date1]' and '$_POST[date2]' and name='$_POST[item]' ");
	$row=mysql_fetch_array($sql);
    $xx2=$row['sum(qunt*price)']*$tax/100+$row['sum(qunt*price)'];
    $xx2 = sprintf("%01.2f", $xx2);  echo $xx2;
	?></td>


	</tr>
  </table>


<br>
<!-- طباعة اسم المستخدم!-->

<table style="width:98%;" border="1"   align="center" class="table table-bordered table-hover"  dir="rtl">
    <tr><td style="width:12%; "><strong>المستخدم</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
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
<td style="width:15%;"><a href="shselect2.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> التقارير <i class=" far fa-file "></i></button></a></td>

</tr></table></center>

<!-- نهاية كود التقرير الدوري!-->

<br>
<?php } ?>


<?php if(isset($_POST['ok4']))
{ ?>
<center>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<br>
<table dir="rtl" style="width:99%; font-size:15px;" border="1" align="center" class="table table-bordered table-hover">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td  style=" font-size:15px;" align="center"> <?php echo date('y-m-d h:i:s');?></td>
    <td style=" font-size:15px;" align="center"><strong>تقرير المشتريــات من<?php echo $_POST['date1'];?> الي <?php echo $_POST['date2'];?> لصنف <?php echo $_POST['item'];?> من المورد <?php echo $_POST['cust'];?></strong></td>
            <td  style=" font-size:15px;" align="center"><strong> تقارير المشتريات</strong> </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<!-- نهاية ترويسة التقرير!-->





<br>
<?php include('dbcon/dbcon.php');
// التقرير الدوري لمشتريات صنف من مورد
$sql=mysql_query("select * from share where date between '$_POST[date1]' and '$_POST[date2]'
and name='$_POST[item]' and customer='$_POST[cust]' ");
$row=mysql_fetch_array($sql);?>


<table dir="rtl" style="width:99%; font-size:15px;" border="1" align="center" class="table table-bordered table-hover">

    <tr align="center">   
    <td nowrap style="width:15%;"><strong>رقم الفاتورة</strong></td>
    <td nowrap style="width:15%;"><strong>الباركود</strong></td>
    <td nowrap style="width:20%;"><strong>الصنف</strong></td>
    <td nowrap style="width:7%;"><strong>الكمية</strong></td>
    <td nowrap style="width:7%;"><strong>شراء</strong></td>
    <td nowrap style="width:7%;"><strong>الإجمالي</strong></td>
    <td nowrap style="width:7%;"><strong>شامل الضريبة</strong></td>
    <td nowrap style="width:7%;"><strong>التاريخ</strong></td>
    </tr>
		  <?php do { ?>

    <tr>
        	
    <td><?php echo $row['formid'];?></td>
    <td><?php echo $row['barco'];?></td>
    <td><?php echo $row['name'];?></td>
      <td><?php echo $row['qunt'];?></td>
      <td><?php $br=$row['price']; 
  $br = sprintf("%01.2f", $br);  echo $br;?></td>
      <td><?php  $x1=$row['qunt']*$row['price']; 
  $x1 = sprintf("%01.2f", $x1);  echo $x1;?></td>
      <td><?php  $z1=$row['price']*$row['qunt']*$tax/100+$x1;
        $z1 = sprintf("%01.2f", $z1);  echo $z1;?></td>
      <td><?php echo $row['date'];?></td>
   </tr>

   <?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
    <td><strong>المجموع</strong></td>
    <td><strong></strong></td>

    <td><strong></strong></td>
	<td ><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select count(pid) from share where date between '$_POST[date1]' and '$_POST[date2]' and name='$_POST[item]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
	echo round($row['count(pid)'],2);
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price) from share where date between '$_POST[date1]' and '$_POST[date2]' and name='$_POST[item]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
    $br=$row['sum(price)'];
    $br = sprintf("%01.2f", $br);  echo $br;
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price*qunt) from share where date between '$_POST[date1]' and '$_POST[date2]' and name='$_POST[item]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
    $xx0=$row['sum(price*qunt)'];  
    $xx0 = sprintf("%01.2f", $xx0);  echo $xx0;	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qunt*price) from share where date between '$_POST[date1]' and '$_POST[date2]' and name='$_POST[item]' and customer='$_POST[cust]' ");
	$row=mysql_fetch_array($sql);
     $xx2=$row['sum(qunt*price)']*$tax/100+$row['sum(qunt*price)'];
     $xx2 = sprintf("%01.2f", $xx2);  echo $xx2;	?></td>

	
	</tr>
  </table>

<br>
<!-- طباعة اسم المستخدم!-->

<table style="width:98%; font-size:15px;" border="1"   align="center" class="table table-bordered table-hover"  dir="rtl">
    <tr><td style="width:12%; "><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>

<!-- الفوتر الخاص بالتقرير!-->

<table dir="rtl" style="width:98%; font-size:15px;"  border="1" align="center" class="table table-bordered table-hover">
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
<td style="width:15%;"><a href="shselect2.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> التقارير <i class=" far fa-file "></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> النظام <i class=" fas fa-home "></i></button></a></td><td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table></center>

<!-- نهاية كود التقرير الدوري!-->
<br>
<?php } ?>

</body>
</html>
