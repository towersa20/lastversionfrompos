<?php include('header.php');?>
<?php if(isset($_POST['ok1']))
{ ?>
<script>
function printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><title>حركة Store</title><body border="3" dir="rtl" onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();
// newWin.window.close();

  setTimeout(function(){newWin.close();},1);
}</script>

<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<table style="width:100%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width: 15%;"><?php echo '<img src="file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?></strong><br><br><strong style="font-size:25px; "><?php echo $query['en'];?></strong></td>
        <td align="center" style="width: 15%;"><?php echo '<img src="file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td nowrap="" style="width: 22%;" align="center">Date   20<?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>Movement details Store From <?php echo $_POST['date1'];?> To <?php echo $_POST['date2'];?></strong></td>
            <td nowrap="" style="width: 22%;" align="center">Store </td>
        </tr>
		<tr>
		

    <?php } while ($query=mysql_fetch_array($link));?>
</table><br>
  <table style="width:100%;" border="1" align="center" class="table table-bordered table-hover">
<?php 
include('dbcon/dbcon.php');
$date1=$_POST['date1'];
$date2=$_POST['date2'];
$sql=mysql_query("select * from mstor where date between '$date1' and '$date2' and  tell ='$_SESSION[tell]'  order by date asc");
$row=mysql_fetch_array($sql);
?>
<tr align="center">
<td style="width:8%; ">Barcode</td>
<td style="width:20%; ">Product</td>
<td style="width:10%; ">Unit</td>
<td style="width:10%; ">Quntity</td>
<td style="width:10%; ">Price</td>
<td style="width:10%; ">Store</td>
<td style="width:10%; ">Date</td>
<td style="width:10%; ">Store</td>
<td style="width:10%; ">User</td>
</tr>
<?php do { ?>
<tr>
<td nowrap><?php echo $row['barco'];?></td>
<td nowrap><?php echo $row['name'];?></td>
<td nowrap><?php echo $row['unit'];?></td>
<td nowrap><?php echo $row['qunt'];?></td>
<td nowrap><?php echo $row['price'];?></td>
<td nowrap><?php echo $row['store'];?></td>
<td nowrap><?php echo $row['date'];?></td>
<td nowrap><?php echo $row['datetime'];?></td>
<td nowrap><?php echo $row['user'];?></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
<tr>
<td colspan="2">Total</td>
<td><?php include('dbcon/dbcon.php');
$sql=mysql_query("select count(barco) from  mstor where date between '$date1' and '$date2' and  tell ='$_SESSION[tell]'  order by date asc");
$row=mysql_fetch_array($sql);
echo $row['count(barco)'];?></td>
<td><?php include('dbcon/dbcon.php');
$sql=mysql_query("select sum(qunt) from  mstor where  date between '$date1' and '$date2' and  tell ='$_SESSION[tell]'   order by date asc");
$row=mysql_fetch_array($sql);
echo $row['sum(qunt)'];?></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
</table>
<br>
<table style="width:100%;" border="1"  align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">
    <tr><td style="width:13%; "><strong>User</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>
<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
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
<table class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn  btn-primary" id='btn'  style="width: 100%;font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> Print <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="storing.php"><button class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> Store <i class=" fas fa-store-alt "></i></button></a></td>
<td style="width:15%;"><a href="rselect1.php"><button class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> Report <i class=" fas fa-file-alt "></i></button></a></td>
<td style="width:15%;"><a href="vshare.php"><button class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> Query <i class=" fas fa-search "></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> Home <i class=" fas fa-home "></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table>
<?php } ?>















<?php if(isset($_POST['ok2']))
{ ?>
<script>
function printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body border="3" dir="rtl" onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();
 //newWin.window.close();

  setTimeout(function(){newWin.close();},1);
}</script>

<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<table style="width:100%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width: 15%;"><?php echo '<img src="file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?></strong><br><br><strong style="font-size:25px; "><?php echo $query['en'];?></strong></td>
        <td align="center" style="width: 15%;"><?php echo '<img src="file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td nowrap="" style="width: 22%;" align="center">Date   20<?php echo date('y-m-d h:i:s');?></td>
            <td align="center" dir="LTR"><strong>Movement details Store<?php echo $_POST['store'];?> From Day<?php echo $_POST['date1'];?> To <?php echo $_POST['date2'];?> </strong></td>
            <td nowrap="" style="width: 22%;" align="center"> Store </td>
        </tr>
		<tr>
		

    <?php } while ($query=mysql_fetch_array($link));?>
</table><br>
  <table style="width:100%;" border="1" align="center" class="table table-bordered table-hover">
<?php 
include('dbcon/dbcon.php');
$date1=$_POST['date1'];
$date2=$_POST['date2'];
$sql=mysql_query("select * from mstor where date between '$date1' and '$date2' and  tell ='$_SESSION[tell]'  and store='$_POST[store]' order by date asc");
$row=mysql_fetch_array($sql);
?>
<tr align="center">
<td style="width:8%; ">Barcode</td>
<td style="width:20%; ">Product</td>
<td style="width:10%; ">Unit</td>
<td style="width:10%; ">Quntity</td>
<td style="width:10%; ">Price</td>
<td style="width:10%; ">Store</td>
<td style="width:10%; ">Date</td>
<td style="width:10%; ">Store</td>
<td style="width:10%; ">User</td>
</tr>
<?php do { ?>
<tr>
<td nowrap><?php echo $row['barco'];?></td>
<td nowrap><?php echo $row['name'];?></td>
<td nowrap><?php echo $row['unit'];?></td>
<td nowrap><?php echo $row['qunt'];?></td>
<td nowrap><?php echo $row['price'];?></td>
<td nowrap><?php echo $row['store'];?></td>
<td nowrap><?php echo $row['date'];?></td>
<td nowrap><?php echo $row['datetime'];?></td>
<td nowrap><?php echo $row['user'];?></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
<tr>
<td colspan="2">Total</td>
<td><?php include('dbcon/dbcon.php');
$sql=mysql_query("select count(barco) from  mstor where date between '$date1' and '$date2' and  tell ='$_SESSION[tell]'  and store='$_POST[store]' order by date asc");
$row=mysql_fetch_array($sql);
echo $row['count(barco)'];?></td>
<td><?php include('dbcon/dbcon.php');
$sql=mysql_query("select sum(qunt) from  mstor where  date between '$date1' and '$date2' and  tell ='$_SESSION[tell]'  and store='$_POST[store]'  order by date asc");
$row=mysql_fetch_array($sql);
echo $row['sum(qunt)'];?></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
</table>
<br>
<table style="width:100%;" border="1"  align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">
    <tr><td style="width:13%; "><strong>User</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>
<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
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
<table class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn  btn-primary" id='btn'  style="width: 100%;font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> Print <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="storing.php"><button class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> Store <i class=" fas fa-store-alt "></i></button></a></td>
<td style="width:15%;"><a href="rselect1.php"><button class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> Report <i class=" fas fa-file-alt "></i></button></a></td>
<td style="width:15%;"><a href="vshare.php"><button class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> Query <i class=" fas fa-search "></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> Home <i class=" fas fa-home "></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table>
<?php } ?>






















<?php if(isset($_POST['ok3']))
{ ?>
<script>
function printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><title>حركة Store</title><body border="3" dir="rtl" onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();
 //newWin.window.close();

  setTimeout(function(){newWin.close();},1);
}</script>

<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<table style="width:100%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width: 15%;"><?php echo '<img src="file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?></strong><br><br><strong style="font-size:25px; "><?php echo $query['en'];?></strong></td>
        <td align="center" style="width: 15%;"><?php echo '<img src="file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td nowrap="" style="width: 22%;" align="center">Date   20<?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>Movement details Store<?php echo $_POST['store'];?> From Day<?php echo $_POST['date1'];?> To <?php echo $_POST['date2'];?> </strong></td>
            <td nowrap="" style="width: 22%;" align="center"> Store </td>
        </tr>
		<tr>
		

    <?php } while ($query=mysql_fetch_array($link));?>
</table><br>
  <table style="width:100%;" border="1" align="center" class="table table-bordered table-hover">
<?php 
include('dbcon/dbcon.php');
$date1=$_POST['date1'];
$date2=$_POST['date2'];
$sql=mysql_query("select * from mstor where date between '$date1' and '$date2' and  tell ='$_SESSION[tell]'  and store='$_POST[store]' and  name='$_POST[name]' order by date asc");
$row=mysql_fetch_array($sql);
?>
<tr align="center">
<td style="width:8%; ">Barcode</td>
<td style="width:20%; ">Product</td>
<td style="width:10%; ">Unit</td>
<td style="width:10%; ">Quntity</td>
<td style="width:10%; ">Price</td>
<td style="width:10%; ">Store</td>
<td style="width:10%; ">Date</td>
<td style="width:10%; ">Store</td>
<td style="width:10%; ">User</td>
</tr>
<?php do { ?>
<tr>
<td nowrap><?php echo $row['barco'];?></td>
<td nowrap><?php echo $row['name'];?></td>
<td nowrap><?php echo $row['unit'];?></td>
<td nowrap><?php echo $row['qunt'];?></td>
<td nowrap><?php echo $row['price'];?></td>
<td nowrap><?php echo $row['store'];?></td>
<td nowrap><?php echo $row['date'];?></td>
<td nowrap><?php echo $row['datetime'];?></td>
<td nowrap><?php echo $row['user'];?></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
<tr>
<td colspan="2">Total</td>
<td><?php include('dbcon/dbcon.php');
$sql=mysql_query("select count(barco) from  mstor where date between '$date1' and '$date2' and  tell ='$_SESSION[tell]'  and  store='$_POST[store]' and  name='$_POST[name]' order by date asc");
$row=mysql_fetch_array($sql);
echo $row['count(barco)'];?></td>
<td><?php include('dbcon/dbcon.php');
$sql=mysql_query("select sum(qunt) from  mstor where  date between '$date1' and '$date2' and  tell ='$_SESSION[tell]'  and store='$_POST[store]' and  name='$_POST[name]' order by date asc");
$row=mysql_fetch_array($sql);
echo $row['sum(qunt)'];?></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
</table>
<br>
<table style="width:100%;" border="1"  align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">
    <tr><td style="width:13%; "><strong>User</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>
<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
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
<table class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn  btn-primary" id='btn'  style="width: 100%;font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> Print <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="storing.php"><button class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> Store <i class=" fas fa-store-alt "></i></button></a></td>
<td style="width:15%;"><a href="rselect1.php"><button class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> Report <i class=" fas fa-file-alt "></i></button></a></td>
<td style="width:15%;"><a href="vshare.php"><button class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> Query <i class=" fas fa-search "></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> Home <i class=" fas fa-home "></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table>
<?php } ?>


























<?php if(isset($_POST['ok4']))
{ ?>
<script>
function printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><title>حركة Store</title><body border="3" dir="rtl" onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();
 newWin.window.close();

  setTimeout(function(){newWin.close();},1);
}</script>

<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<table style="width:100%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width: 25%;"><?php echo '<img src="file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?></strong><br><br><strong style="font-size:25px; "><?php echo $query['en'];?></strong></td>
        <td align="center" style="width: 25%;"><?php echo '<img src="file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td nowrap="" style="width: 22%;" align="center">Date   20<?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>تفاصيل Class movement Store<?php echo $_POST['store'];?> لصنف <?php echo $_POST['item'];?> بDate <?php echo $_POST['date'];?></strong></td>
            <td nowrap="" style="width: 22%;" align="center">Store </td>
        </tr>
		<tr>
		

    <?php } while ($query=mysql_fetch_array($link));?>
</table><br>
  <table style="width:100%;" border="1" align="center" class="table table-bordered table-hover">
<?php 
include('dbcon/dbcon.php');
$date=$_POST['date'];
$sql=mysql_query("select * from mstor where name='$_POST[item]' and store ='$_POST[store]' and datetime like '%$date%' order by date asc");
$row=mysql_fetch_array($sql);
?>
<tr align="center">
<td style="width:8%; ">Barcode</td>
<td style="width:20%; ">Product</td>
<td style="width:10%; ">Unit</td>
<td style="width:10%; ">Quntity</td>
<td style="width:10%; ">Price</td>
<td style="width:10%; ">Store</td>
<td style="width:10%; ">Date</td>
<td style="width:10%; ">Store</td>
<td style="width:10%; ">User</td>
</tr>
<?php do { ?>
<tr>
<td nowrap><?php echo $row['barco'];?></td>
<td nowrap><?php echo $row['name'];?></td>
<td nowrap><?php echo $row['unit'];?></td>
<td nowrap><?php echo $row['qunt'];?></td>
<td nowrap><?php echo $row['price'];?></td>
<td nowrap><?php echo $row['store'];?></td>
<td nowrap><?php echo $row['date'];?></td>
<td nowrap><?php echo $row['datetime'];?></td>
<td nowrap><?php echo $row['user'];?></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
<tr>
<td colspan="2">Total</td>
<td><?php include('dbcon/dbcon.php');
$sql=mysql_query("select count(barco) from  mstor where name='$_POST[item]' and store ='$_POST[store]' and  datetime like '%$date%' order by date asc");
$row=mysql_fetch_array($sql);
echo $row['count(barco)'];?></td>
<td><?php include('dbcon/dbcon.php');
$sql=mysql_query("select sum(qunt) from  mstor where name='$_POST[item]' and store ='$_POST[store]' and  datetime like '%$date%' order by date asc");
$row=mysql_fetch_array($sql);
echo $row['sum(qunt)'];?></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
</table>
<table style="width:100%;" border="1"  align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">
    <tr><td style="width:13%; "><strong>User</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>
<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
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
<table class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn  btn-primary" id='btn'  style="width: 100%;font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> Print <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="storing.php"><button class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> Store <i class=" fas fa-store-alt "></i></button></a></td>
<td style="width:15%;"><a href="rselect1.php"><button class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> Report <i class=" fas fa-file-alt "></i></button></a></td>
<td style="width:15%;"><a href="vshare.php"><button class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> Query <i class=" fas fa-search "></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> Home <i class=" fas fa-home "></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table>
<?php } ?>