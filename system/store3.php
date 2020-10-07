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

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>المخزن</title>
</head>
  <body style="font-family: 'Droid Arabic Kufi';" data-open="click" data-menu="vertical-menu">
<?php if(isset($_POST['ok1']))
{ ?>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<center>
<br>
<table style="width:98%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center">التاريخ <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>تقرير التخزين السنوي <?php echo $_POST['year'];?></strong></td>
            <td align="center"> تقارير المخزن </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<br>
<table  style="width:98%;" border="1" align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">
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
  $year=$_POST['year'];
  $sql=mysql_query("select * from storing where date like '%$year%_'");
  $row=mysql_fetch_array($sql);
   do { ?>
  <tr>
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
  <tr bordercolor="#CC9900">
    <td nowrap><strong>العدد</strong></td>
    <td nowrap><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select count(sid) from storing where date like '%$year%_'");
	$row=mysql_fetch_array($sql);
	echo $row['count(sid)'];?></td>
    <td nowrap>&nbsp;</td>
    <td nowrap>&nbsp;</td>
    <td nowrap><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qunt) from storing where date like '%$year%_'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(qunt)'];?></td>
	
	
	    <td nowrap><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price) from storing where date like '%$year%_'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(price)'];?></td>
	
	
    <td nowrap><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qunt*price) from storing where date like '%$year%_'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(qunt*price)'];?></td>
    <td nowrap>&nbsp;</td>
  </tr>
</table>
<br>


<table style="width:98%;" border="1"  align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">
    <tr><td style="width:12%; "><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>
<table dir="rtl" style="width:98%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 15%;">الموقع الإلكتروني</td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 15%;">البريد الإلكتروني</td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;">الهاتـــف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left"  ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                <img src="icon/qr.png"  width="25" height="25" alt=""></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
</div>
<table style="width:98%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%; font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> طباعة <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="storing.php"><button class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> المخزن <i class=" fas fa-store-alt "></i></button></a></td>
<td style="width:15%;"><a href="vstore.php"><button class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> الإستعلام <i class=" fas fa-search "></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> النظام <i class=" fas fa-home "></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table>

<?php } ?>
<?php if(isset($_POST['ok2']))
{ ?>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<br>
<table style="width:98%;" align="center"  border="1" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center">التاريخ <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>تقرير المخزن <?php echo $_POST['store'];?> للعام <?php echo $_POST['year'];?></strong></td>
            <td align="center"> تقارير المخزن </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<br>
<table  style="width:98%;" border="1" align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">
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
  $year=$_POST['year'];
  $sql=mysql_query("select * from storing where date like '%$year%_' and store='$_POST[store]'");
  $row=mysql_fetch_array($sql);
   do { ?>
  <tr>
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
  <tr bordercolor="#CC9900">
    <td nowrap><strong>العدد</strong></td>
    <td nowrap><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select count(sid) from storing where date like '%$year%_' and store='$_POST[store]'");
	$row=mysql_fetch_array($sql);
	echo $row['count(sid)'];?></td>
    <td nowrap>&nbsp;</td>
    <td nowrap>&nbsp;</td>
    <td nowrap><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qunt) from storing where date like '%$year%_' and store='$_POST[store]'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(qunt)'];?></td>

    <td nowrap><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price) from storing where date like '%$year%_' and store='$_POST[store]'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(price)'];?></td>


    <td nowrap><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qunt*price) from storing where date like '%$year%_' and store='$_POST[store]'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(qunt*price)'];?></td>
    <td nowrap>&nbsp;</td>
  </tr>
</table>

<br>
<table style="width:98%;" border="1"  align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">
    <tr><td style="width:12%; "><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>
<table dir="rtl" border="1" style="width:98%;" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 15%;">الموقع الإلكتروني</td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 15%;">البريد الإلكتروني</td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;">الهاتـــف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left"  ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                <img src="icon/qr.png"  width="25" height="25" alt=""></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
</div>
<table style="width:98%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%; font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> طباعة <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="storing.php"><button class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> المخزن <i class=" fas fa-store-alt "></i></button></a></td>
<td style="width:15%;"><a href="vstore.php"><button class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> الإستعلام <i class=" fas fa-search "></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> النظام <i class=" fas fa-home "></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table>
</center>
<?php } ?>

<?php if(isset($_POST['ok3']))
{ ?>
<center>

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
            <td align="center"><strong>التقرير السنــوي لمخزن <?php echo $_POST['store'];?> لصنف <?php echo $_POST['item'];?> للعام <?php echo $_POST['year'];?>م</strong></td>
            <td align="center"> تقارير المخزن </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<br>
<table  style="width:98%;" border="1" align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">
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
  $year=$_POST['year'];
  $sql=mysql_query("select * from storing where date like '%$year%_' and store='$_POST[store]' and name='$_POST[item]'");
  $row=mysql_fetch_array($sql);
   do { ?>
  <tr>
       <td nowrap><?php echo $row['store'];?></td>
    <td nowrap><?php echo $row['barco'];?></td>
    <td nowrap><?php echo $row['name'];?></td>
    <td nowrap><?php echo $row['unit'];?></td>
    <td nowrap><?php echo $row['qunt'];?></td>
    <td nowrap><?php echo $row['price'];?></td>
    <td nowrap><?php echo $row['price']*$row['price'];?></td>
    <td nowrap><?php echo $row['date'];?></td>
	</tr>
  <?php } while($row=mysql_fetch_array($sql));?>
  <tr>
    <td nowrap><strong>العدد</strong></td>
    <td nowrap><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select count(sid) from storing where date like '%$year%_' and store='$_POST[store]' and name='$_POST[item]'");
	$row=mysql_fetch_array($sql);
	echo $row['count(sid)'];?></td>
    <td nowrap>&nbsp;</td>
    <td nowrap>&nbsp;</td>
    <td nowrap><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qunt) from storing where date like '%$year%_' and store='$_POST[store]' and name='$_POST[item]'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(qunt)'];?></td>
	
	
	    <td nowrap><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price) from storing where date like '%$year%_' and store='$_POST[store]' and name='$_POST[item]'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(price)'];?></td>
	
	
      <td nowrap><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qunt*price) from storing where date like '%$year%_' and store='$_POST[store]' and name='$_POST[item]'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(qunt*price)'];?></td>
    <td nowrap>&nbsp;</td>
  </tr>
</table>

<br>
<table style="width:98%;" border="1"  align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">
    <tr><td style="width:13%; "><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>
<table dir="rtl" style="width:98%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
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
            <td  align="left"  ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                <img src="icon/qr.png"  width="25" height="25" alt=""></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
</div>
<table style="width:98%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%; font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> طباعة <i class="fas ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="storing.php"><button class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> المخزن <i class=" fas fa-store-alt "></i></button></a></td>
<td style="width:15%;"><a href="vstore.php"><button class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> الإستعلام <i class=" fas fa-search "></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> النظام <i class=" fas fa-home "></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table>
</center>
<?php } ?>

</body>
</html>
