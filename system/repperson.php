<?php include('header.php');?>

<script>
function printDiv() 
{
  var divToPrint=document.getElementById('DivIdToPrint');
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<html><title>تقرير </title><body border="3" dir="rtl" onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
// newWin.window.close();
  setTimeout(function(){newWin.close();},1);
}</script>

<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<br>
<table style="width:100%;font-size:14px;" border="1" align="center" class="table table-bordered">
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
            <td align="center"><strong>تقرير العملاء الشامل</strong></td>
            <td align="center"> تقارير العملاء </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<br>


     <table style="width:100%;font-size:14px;" border="1" align="center" class="table table-bordered table-hover">
         <?php
include('dbcon/dbcon.php');
$sql=mysql_query("select * from person");
$row=mysql_fetch_array($sql);
?>
<tr align="center">
<td style="width: 40%;">الأسم الكامل</td>
<td nowrap style="width: 10%;">رقم الهاتف</td>
<td nowrap style="width: 10%;">نوع العيل</td>
<td nowrap style="width: 10%;">رقم الحساب</td>
<td nowrap style="width: 20%;">البنــــك</td>
<td nowrap style="width: 20%;">تاريخ التسجيل</td>
</tr>
<?php do { ?>
<tr>
<td nowrap><?php echo $row['name'];?></td>
<td nowrap><?php echo $row['phone'];?></td>
<td nowrap><?php echo $row['type'];?></td>
<td nowrap><?php echo $row['acount'];?></td>
<td nowrap><?php echo $row['bank'];?></td>
<td nowrap><?php echo $row['date'];?></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
<tr>
<td>العدد</td>
<td><?php 
include("dbcon/dbcon.php");
$sql=mysql_query("select count(prid)from person");
$row=mysql_fetch_array($sql);
echo $row['count(prid)'];?></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
</table>

<table style="width:100%; font-size:14px;" border="1"  align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">
    <tr><td style="width:12%; "><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>
<table dir="rtl" style="width:100%; font-size:14px;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
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
<table style="width:100%;" align="center" class="table table-borderd">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%;"  onclick="printDiv(); javascript:window.close()"> طباعة <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="customer.php"><button class="btn btn-primary" style="width: 100%;"> العملاء <i class="fa ft-airplay"></i></button></a></td>
<td style="width:15%;"><a href="vcustom.php"><button class="btn btn-primary" style="width: 100%;"> الإستعلام <i class="fa ft-search"></i></button></a></td>
<td style="width:15%;"><a href="custom_search.php"><button class="btn btn-primary" style="width: 100%;"> المشتريات <i class="fa fa-qrcode"></i></button></a></td>
<td style="width:15%;"><a href="cash.php"><button class="btn btn-primary" style="width: 100%;"> التقارير <i class="ft-pie-chart"></i></button></a></td>
<td style="width:15%;"><a href="crecord.php"><button class="btn btn-primary" style="width: 100%;"> رجوع <i class="fa fa-undo"></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table>

</center>
