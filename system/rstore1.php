<?php
// ملف التصميم
include('header.php');?>

<script>
  // دالة ضبط الطابعة
function printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><title>تقرير المخزن</title><body border="3" dir="rtl" onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();
// newWin.window.close();

  setTimeout(function(){newWin.close();},1);
}
//نهاية دالة ضبط الطابعة
</script>


<?php
// الشرط الاول لعرض التقرير اليومي
if(isset($_POST['ok1']))
{ ?>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">


<!-- ترويسة التقرير اليومي!-->

<table style="width:98%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width: 25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width: 25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center">التاريخ <?php echo date('y-m-d h:i:s');?></td>
            <td align="center">تقرير المخزن العام ليوم  <?php echo $_POST['date'];?></td>
            <td align="center"> تقارير المخزن </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<!-- نهاية الترويسة !-->

<br>

<!-- جدول عرض التقرير اليومي للمخزن !-->

<table style="width:98%;" border="1" align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">
  <tr>
    <td nowrap style="width:15%; "><strong>المخــزن</strong></td>
    <td nowrap style="width:15%; "><strong>الباركود</strong></td>
    <td nowrap style="width:20%; "><strong>الصنف</strong></td>
    <td nowrap style="width:10%; "><strong>الوحدة</strong></td>
    <td nowrap style="width:10%; "><strong>الكمية</strong></td>
    <td nowrap style="width:10%; "><strong>السعر</strong></td>
    <td nowrap style="width:10%; "><strong>الاجمالي</strong></td>
    <td nowrap style="width:10%; "><strong>تاريخ التخزين</strong></td>
	</tr>
  <?php
  // كود عرض بيانات المخزن
  include('dbcon/dbcon.php');
  $sql=mysql_query("select * from storing where date='$_POST[date]'  ");
  $row=mysql_fetch_array($sql);
   do { ?>
  <tr >
    <td nowrap><?php echo $row['store'];?></td>
    <td nowrap><?php echo $row['barco'];?></td>
    <td nowrap><?php echo $row['name'];?></td>
    <td nowrap><?php echo $row['unit'];?></td>
    <td nowrap><?php echo $row['qunt'];?></td>
    <td nowrap><?php echo $row['price'];?></td>
    <td nowrap><?php echo $row['price']*$row['qunt'];?></td>
    <td nowrap><?php echo $row['date'];?></td>
	</tr>
  <?php } while($row=mysql_fetch_array($sql));?>
  <tr >
    <td nowrap><strong>العدد</strong></td>
    <td nowrap><?php include('dbcon/dbcon.php');
    // كود عرض المجموع 
	$sql=mysql_query("select count(sid) from storing where date='$_POST[date]'  ");
	$row=mysql_fetch_array($sql);
	echo $row['count(sid)'];?></td>
    <td nowrap>&nbsp;</td>
    <td nowrap>&nbsp;</td> 
       <td nowrap><?php include('dbcon/dbcon.php');
    // كود عرض المجموع 
	$sql=mysql_query("select sum(qunt) from storing where date='$_POST[date]'  ");
	$row=mysql_fetch_array($sql);
  echo $row['sum(qunt)'];?></td> 
    <td nowrap><?php include('dbcon/dbcon.php');
    // كود عرض المجموع 
	$sql=mysql_query("select sum(price) from storing where date='$_POST[date]'  ");
	$row=mysql_fetch_array($sql);
	echo $row['sum(price)'];?></td>
	
	
	    <td nowrap><?php include('dbcon/dbcon.php');
    // كود عرض المجموع 
	$sql=mysql_query("select sum(price*qunt) from storing where date='$_POST[date]'  ");
	$row=mysql_fetch_array($sql);
	echo $row['sum(price*qunt)'];?></td>
    <td nowrap>&nbsp;</td>
  </tr>
</table>
<!-- نهاية جدول عرض التقرير اليومي للمخزن !-->

<br>

<!-- جدول طباعة اسم المستخدم في التقرير !-->

<table style="width:98%;" border="1"  align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">
<tr><td style="width:12%; "><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>

<!-- نهاية جدول عرض بيانات المستخدم بالتقرير !-->


<!-- جدول تزييل التقرير !-->

  <br>
<table dir="rtl" align="center" border="1" style="width:98%;" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 15%;">الموقع الإلكتروني</td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 15%;">البريد الإلكتروني</td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 12%;">رقم الهاتـــف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
		<td  style="width: 15%;">العنـــــــــــــوان</td>
            <td colspan="4"><?php echo $query['adres'];?></td>
            <td  align="left"  ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
</td>
        </tr>
		</table>
    <?php } while ($query=mysql_fetch_array($link));?>

<!-- نهاية جدول زيل التقرير !-->

</div>
<!-- ازرار الطباعة !-->

<table style="width:98%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%; font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> طباعة <i class=" fas fa-print "></i></button></a></td>
<td style="width:15%;"><a href="storing.php"><button class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> المخزن <i class=" fas fa-store-alt "></i></button></a></td>
<td style="width:15%;"><a href="vstore.php"><button class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> الإستعلام <i class=" fas fa-search "></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> النظام <i class=" fas fa-home "></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table>
<!-- نهاية ازرار الطباعة !-->

</center><?php } ?>
<?php
// الشرط الثاني عرض التقرير اليومي لمخزن
if(isset($_POST['ok2']))
{ ?>
<center>
  
  <!-- تريوسة التقرير الخاص بعرض التقرير اليومي لمخزن !-->

<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<br>
<table style="width:98%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width: 25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width: 25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center">التاريخ <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"> التقرير اليومي لمخزن <?php echo $_POST['store'];?> ليوم <?php echo $_POST['date'];?></td>
            <td align="center"> تقارير المخزن </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<br>

<!-- حدول عرض التقرير اليومي لمخزن !-->


<table dir="rtl" style="width:98%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
  <tr>
        <td nowrap style="width:15%; "><strong>المخــزن</strong></td>
    <td nowrap style="width:15%; "><strong>الباركود</strong></td>
    <td nowrap style="width:20%; "><strong>الصنف</strong></td>
    <td nowrap style="width:10%; "><strong>الوحدة</strong></td>
    <td nowrap style="width:10%; "><strong>الكمية</strong></td>
    <td nowrap style="width:10%; "><strong>السعر</strong></td>
    <td nowrap style="width:10%; "><strong>الاجمالي</strong></td>
    <td nowrap style="width:10%; "><strong>تاريخ التخزين</strong></td>
</tr>
  <?php include('dbcon/dbcon.php');
  // كود عرض تقرير المخزن ليوم
  $sql=mysql_query("select * from storing where date='$_POST[date]'   and store='$_POST[store]'");
  $row=mysql_fetch_array($sql);
   do { ?>
  <tr >
    
    <td nowrap><?php echo $row['store'];?></td>
    <td nowrap><?php echo $row['barco'];?></td>
    <td nowrap><?php echo $row['name'];?></td>
    <td nowrap><?php echo $row['unit'];?></td>
    <td nowrap><?php echo $row['qunt'];?></td>
    <td nowrap><?php echo $row['price'];?></td>
    <td nowrap><?php echo $row['price']*$row['qunt'];?></td>
    <td nowrap><?php echo $row['date'];?></td>
	</tr>
  <?php } while($row=mysql_fetch_array($sql));?>
  <tr>
    <td nowrap><strong>العدد</strong></td>
    <td nowrap><?php
    // كود عرض المجموع
    include('dbcon/dbcon.php');
	$sql=mysql_query("select count(sid) from storing where date='$_POST[date]'   and store='$_POST[store]'");
	$row=mysql_fetch_array($sql);
	echo $row['count(sid)'];?></td>
    <td nowrap>&nbsp;</td>
    <td nowrap>&nbsp;</td>
    <td nowrap><?php include('dbcon/dbcon.php');
    // كود عرض المجموع 
	$sql=mysql_query("select sum(qunt) from storing where date='$_POST[date]'  and store='$_POST[store]'");
	$row=mysql_fetch_array($sql);
  echo $row['sum(qunt)'];?></td> 
    <td nowrap><?php include('dbcon/dbcon.php');
    // كود عرض المجموع 
	$sql=mysql_query("select sum(price) from storing where date='$_POST[date]'  and store='$_POST[store]' ");
	$row=mysql_fetch_array($sql);
	echo $row['sum(price)'];?></td>
	
	
	    <td nowrap><?php include('dbcon/dbcon.php');
    // كود عرض المجموع 
	$sql=mysql_query("select sum(price*qunt) from storing where date='$_POST[date]'  and store='$_POST[store]' ");
	$row=mysql_fetch_array($sql);
	echo $row['sum(price*qunt)'];?></td>
	
	
	
	
    <td nowrap>&nbsp;</td>
  </tr>
</table>
<br>

<!-- جدول طباعة اسم المستخدم في التقرير !-->

<table style="width:98%;" border="1"  align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">
<tr><td style="width:12%; "><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>

<!-- نهاية جدول عرض بيانات المستخدم بالتقرير !-->


<!-- جدول تزييل التقرير !-->

  <br>
<table dir="rtl" align="center" border="1" style="width:98%;" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 15%;">الموقع الإلكتروني</td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 15%;">البريد الإلكتروني</td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 12%;">رقم الهاتـــف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
		<td  style="width: 15%;">العنـــــــــــــوان</td>
            <td colspan="4"><?php echo $query['adres'];?></td>
            <td  align="left"  ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
</td>
        </tr>
		</table>
    <?php } while ($query=mysql_fetch_array($link));?>

<!-- نهاية جدول زيل التقرير !-->

</div>
<!-- ازرار الطباعة !-->

<table style="width:98%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%; font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> طباعة <i class=" fas fa-print "></i></button></a></td>
<td style="width:15%;"><a href="storing.php"><button class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> المخزن <i class=" fas fa-store-alt "></i></button></a></td>
<td style="width:15%;"><a href="vstore.php"><button class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> الإستعلام <i class=" fas fa-search "></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> النظام <i class=" fas fa-home "></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table>
<!-- نهاية ازرار الطباعة !-->
</center>

<?php } ?>

<?php
// شرط عرض التقرير
if(isset($_POST['ok3']))
{ ?>
<center>
  <!-- تريوسة التقرير !-->

<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<table style="width:98%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width: 25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width: 25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center">التاريخ <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"> <strong>التقرير اليومي لمخزن <?php echo $_POST['store'];?> لصنف  <?php echo $_POST['item'];?> ليوم <?php echo $_POST['date'];?></strong></td>
            <td align="center"> تقارير المخزن </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<!-- نهاية ترويسة الملف !-->


<br>
<!-- جدول عرض التقرير اليومي لصنف بالمخزن !-->

<table style="width:98%;" border="1" align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">

  <tr>
    <td nowrap style="width:15%; "><strong>المخــزن</strong></td>
    <td nowrap style="width:15%; "><strong>الباركود</strong></td>
    <td nowrap style="width:20%; "><strong>الصنف</strong></td>
    <td nowrap style="width:10%; "><strong>الوحدة</strong></td>
    <td nowrap style="width:10%; "><strong>الكمية</strong></td>
    <td nowrap style="width:10%; "><strong>السعر</strong></td>
    <td nowrap style="width:10%; "><strong>الاجمالي</strong></td>
    <td nowrap style="width:10%; "><strong>تاريخ التخزين</strong></td>
  </tr>
  <?php include('dbcon/dbcon.php');
  // كود عرض التقرير اليومي لصنف بالمخزن
  $sql=mysql_query("select * from storing where date='$_POST[date]'  
  and store='$_POST[store]' and name='$_POST[item]'");
  $row=mysql_fetch_array($sql);
   do { ?>
  <tr >
    
    <td nowrap><?php echo $row['store'];?></td>
    <td nowrap><?php echo $row['barco'];?></td>
    <td nowrap><?php echo $row['name'];?></td>
    <td nowrap><?php echo $row['unit'];?></td>
    <td nowrap><?php echo $row['qunt'];?></td>
    <td nowrap><?php echo $row['price'];?></td>
    <td nowrap><?php echo $row['price']*$row['qunt'];?></td>
    <td nowrap><?php echo $row['date'];?></td>
	 </tr>
  <?php } while($row=mysql_fetch_array($sql));?>
  <tr>
    <td nowrap><strong>العدد</strong></td>
    <td nowrap><?php include('dbcon/dbcon.php');
    // عرض اجمالي التقرير
	$sql=mysql_query("select count(sid) from storing where date='$_POST[date]'   and store='$_POST[store]' and name='$_POST[item]'");
	$row=mysql_fetch_array($sql);
	echo $row['count(sid)'];?></td>
    <td nowrap>&nbsp;</td>
    <td nowrap>&nbsp;</td>
    <td nowrap><?php include('dbcon/dbcon.php');
    // كود عرض المجموع 
	$sql=mysql_query("select sum(qunt) from storing where date='$_POST[date]'  and store='$_POST[store]' and name='$_POST[item]'");
	$row=mysql_fetch_array($sql);
  echo $row['sum(qunt)'];?></td> 
    <td nowrap><?php include('dbcon/dbcon.php');
    // كود عرض المجموع 
	$sql=mysql_query("select sum(price) from storing where date='$_POST[date]'  and store='$_POST[store]' and name='$_POST[item]'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(price)'];?></td>
	
	
	    <td nowrap><?php include('dbcon/dbcon.php');
    // كود عرض المجموع 
	$sql=mysql_query("select sum(price*qunt) from storing where date='$_POST[date]'  and store='$_POST[store]' and name='$_POST[item]'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(price*qunt)'];?></td>
	
	
    <td nowrap>&nbsp;</td>
  </tr>
</table>
<!-- نهاية عرض التقرير !-->

<br>
<!-- جدول طباعة اسم المستخدم في التقرير !-->

<table style="width:98%;" border="1"  align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">
<tr><td style="width:12%; "><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>

<!-- نهاية جدول عرض بيانات المستخدم بالتقرير !-->


<!-- جدول تزييل التقرير !-->

  <br>
<table dir="rtl" align="center" border="1" style="width:98%;" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 15%;">الموقع الإلكتروني</td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 15%;">البريد الإلكتروني</td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 12%;">رقم الهاتـــف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
		<td  style="width: 15%;">العنـــــــــــــوان</td>
            <td colspan="4"><?php echo $query['adres'];?></td>
            <td  align="left"  ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
</td>
        </tr>
		</table>
    <?php } while ($query=mysql_fetch_array($link));?>

<!-- نهاية جدول زيل التقرير !-->

</div>
<!-- ازرار الطباعة !-->

<table style="width:98%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%; font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> طباعة <i class="fas fa-print"></i></button></a></td>
<td style="width:15%;"><a href="storing.php"><button class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> المخزن <i class=" fas fa-store-alt "></i></button></a></td>
<td style="width:15%;"><a href="vstore.php"><button class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> الإستعلام <i class=" fas fa-search "></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> النظام <i class=" fas fa-home "></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table>
<!-- نهاية ازرار الطباعة !-->
</center>
<?php } ?>

</html>
