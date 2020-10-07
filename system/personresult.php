<?php include('header.php');?>

<script>
function printDiv() 
{
  var divToPrint=document.getElementById('DivIdToPrint');
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<html><title>تقرير العملاء</title><body border="1" dir="rtl" onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
// newWin.window.close();
  setTimeout(function(){newWin.close();},1);
}</script>



<center>
<link rel="stylesheet" type="text/css" href="font/mystyle.css">
<link rel="stylesheet" type="text/css" href="font/font_face.css">
<link rel="stylesheet" type="text/css" href="font/animate.min.css">
<link rel="stylesheet" type="text/css" href="font/animate.css">
<div id='DivIdToPrint' style="width:99%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<table style="width:100%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;"><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;"><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td nowrap>الوقت <?php echo date('y-m-d h:i:s');?></td>
            <td colspan="2" align="center"><strong>تقرير مشتريات العميل <?php echo $_POST['xname'];?></strong></td>
          
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<br>

<table align="center" border="1" class="table table-bordered table-hover" style="width:100%; ">
<?php include('dbcon/dbcon.php');
$sql=mysql_query("select*from info where cust='$_POST[xname]' or formatid ='$_POST[xname]'");
$row=mysql_fetch_array($sql);?>
<tr>
<td>الفاتورة</td>
<td style="width:15%;">إسم الصنـف</td>
<td style="width:10%;">الوحدة</td>
<td style="width:7%;">الكميـــة</td>
<td style="width:7%;">السعــــر</td>
<td style="width:7%;">المبلغ</td>
<td style="width:7%;">الضريبة</td>
<td style="width:7%;">الإجمالي</td>
<td style="width:7%;">السداد</td>
<td style="width:15%;">الوقت</td>
</tr>
<?php do {?> 
<tr>
<td nowrap><?php echo $row['formatid'];?></td>
<td nowrap><?php echo $row['item'];?></td>
<td><?php echo $row['unit'];?></td>
<td><?php echo $row['qunt'];?></td>
<td><?php echo $row['price'];?></td>
<td><?php echo $row['qunt']*$row['price'];?></td>
<td><?php echo $x1=$row['qunt']*$row['price']*5/100;?></td>
<td><?php echo $row['qunt']*$row['price']+$x1;?></td>
<td><?php echo $row['type'];?></td>
<td><?php echo $row['dateitem'];?></td>
</tr>
<?php }while($row=mysql_fetch_array($sql));?>
<tr>
<td><strong>العدد</strong></td>
<td ><?php 
include("dbcon/dbcon.php");
$sql=mysql_query("select count(id)from info where cust='$_POST[xname]'  or formatid ='$_POST[xname]'");
$row=mysql_fetch_array($sql);
echo $row['count(id)'];?></td>
<td></td>
<td><?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select count(qunt) from info where cust='$_POST[xname]'  or formatid ='$_POST[xname]'");
$row=mysql_fetch_array($sql);
echo $row['count(qunt)'];?></td>
<td><?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select sum(price) from info where cust='$_POST[xname]'  or formatid ='$_POST[xname]'");
$row=mysql_fetch_array($sql);
echo $row['sum(price)'];?></td>

<td><?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select sum(price*qunt) from info where cust='$_POST[xname]'  or formatid ='$_POST[xname]'");
$row=mysql_fetch_array($sql);
echo $row['sum(price*qunt)'];?></td>
<td><?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select sum(price*qunt) from info where cust='$_POST[xname]'  or formatid ='$_POST[xname]'");
$row=mysql_fetch_array($sql);
echo $x11=$row['sum(price*qunt)']*5/100;?></td>
<td><?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select sum(price*qunt)from info where cust='$_POST[xname]'  or formatid ='$_POST[xname]'");
$row=mysql_fetch_array($sql);
echo $x11=$row['sum(price*qunt)'];?></td>

<td></td>
<td></td>
</tr>
</table>

<table style="width:100%;" border="1"  align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">
    <tr><td style="width:14%;" nowrap><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
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
            <td style="width: 10%;">الهاتـــف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left"><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                <img src="icon/qr.png" width="25" height="25" alt=""></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
</div>
<table style="width:100%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%;"  onclick="printDiv(); javascript:window.close()"> طباعة <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="login-exec.php"><button class="btn btn-primary" style="width: 100%;"> المبيعات <i class="fa ft-airplay"></i></button></a></td>
<td style="width:15%;"><a href="vsal.php"><button class="btn btn-primary" style="width: 100%;"> الإستعلام <i class="fa ft-search"></i></button></a></td>
<td style="width:15%;"><a href="salr1.php"><button class="btn btn-primary" style="width: 100%;"> التقارير <i class="fa ft-paperclip"></i></button></a></td>
<td style="width:15%;"><a href="crecord.php"><button class="btn btn-primary" style="width: 100%;"> رجوع <i class="fa fa-undo"></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table>

</center>
