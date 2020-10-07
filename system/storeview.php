<?php
// نافذة حركة المخزن
include('header.php');?>


<script>
// دالة الطباعة
function printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body border="3" dir="rtl" onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();
// newWin.window.close();

  setTimeout(function(){newWin.close();},1);
}
//نهاية دالة الطباعة
</script>



<!-- تعريف الخطوط -->
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<link rel="stylesheet" type="text/css" href="font/mystyle.css">
<link rel="stylesheet" type="text/css" href="font/font_face.css">
<link rel="stylesheet" type="text/css" href="font/animate.min.css">
<link rel="stylesheet" type="text/css" href="font/animate.css">
<!-- نهاية تعريف -->




<!-- ترويسة الملف -->

<table style="width:98%;"  border="1" cellspacing="5" bordercolor="#CCCCCC"  align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width: 15%;" ><?php echo '<img src="file/' .$query['imge']. '"width="80" height="80"> '; ?></td>
        <td style="font-size: 17px;" align="center"><strong><?php echo $query['ar'];?></strong><br><br><strong style="font-size:20px; "><?php echo $query['en'];?></strong></td>
        <td align="center" style="width: 15%;" ><?php echo '<img src="file/' .$query['imge']. '"width="80" height="80"> '; ?></td>
        </tr>
        <tr>
            <td nowrap="" style="width: 22%;" align="center">تاريخ   20<?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>تفاصيل حركة صنف <?php echo $_GET['info'];?></strong></td>
            <td nowrap="" style="width: 22%;" align="center">حركة صنف </td>
        </tr>
		<tr>
		

    <?php } while ($query=mysql_fetch_array($link));?>
</table><br>

<!-- نهاية ترويسة الملف -->





<!-- جدول عرض حركة المخزن -->

  <table style="width:98%;"  border="1" cellspacing="5" bordercolor="#CCCCCC"  align="center" class="table table-bordered table-hover">
<?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select * from mstor where barco='$_GET[barco]' order by date asc");
$row=mysql_fetch_array($sql);
?>
<tr align="center">
<td style="width:8%; ">الباركود</td>
<td style="width:20%; ">إسم الصــنف</td>
<td style="width:10%; ">الوحده</td>
<td style="width:10%; ">الكمية</td>
<td style="width:10%; ">السعر</td>
<td style="width:10%; ">المخزن</td>
<td style="width:10%; ">التاريخ</td>
<td style="width:10%; ">التخزين</td>
<td style="width:10%; ">المستخدم</td>
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
<td colspan="2">المجموع</td>
<td><?php include('dbcon/dbcon.php');
$sql=mysql_query("select count(barco) from storing where barco ='$_GET[barco]'");
$row=mysql_fetch_array($sql);
echo $row['count(barco)'];?></td>
<td><?php include('dbcon/dbcon.php');
$sql=mysql_query("select sum(qunt) from storing where barco ='$_GET[barco]'");
$row=mysql_fetch_array($sql);
echo $row['sum(qunt)'];?></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
</table>
  
  <!-- نهاية جدول حركة المخزن -->


<!-- جدول طباعة اسم المستخدم -->

<table style="width:98%;" border="1" cellspacing="5" bordercolor="#CCCCCC"  align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">
    <tr><td style="width:13%; "><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>

<!-- نهاية جدول طباعة اسم المستخدم -->




<!-- جدول طباعة زيل الصفحة -->

<br>
<table dir="rtl" style="width:98%;" border="1" cellspacing="5" bordercolor="#CCCCCC" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td nowrap style="width: 16%;">الموقع الإلكتروني</td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td nowrap style="width: 15%;">البريد الإلكتروني</td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;"> الهاتـــف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left"  ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                <img src="icon/qr.png"  width="25" height="25" alt=""></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
<!-- نهاية جدول زيل الصفحة -->



<!-- ازار طباعة التقرير -->

</div>
<table style="width:98%;" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn  btn-primary" id='btn'  style="width: 100%;font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> طباعة <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="storing.php"><button class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> المخزن <i class=" fas fa-store-alt "></i></button></a></td>
<td style="width:15%;"><a href="rselect1.php"><button class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> التقارير <i class=" fas fa-file-alt "></i></button></a></td>
<td style="width:15%;"><a href="vshare.php"><button class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> الإستعلام <i class=" fas fa-search "></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> النظام <i class=" fas fa-home "></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table>
<!-- نهاية ازرار طباعة التقرير -->



<!-- نهاية الملف -->

