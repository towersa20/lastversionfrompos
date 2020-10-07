<?php include('header.php');?>

<script>
function printDiv() 
{
  var divToPrint=document.getElementById('DivIdToPrint');
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<html><title>تقرير المدفوعات</title><body border="3" dir="rtl" onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
// newWin.window.close();
  setTimeout(function(){newWin.close();},1);
}</script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>المدفوعات</title>
</head>
  <body style="font-family: 'Droid Arabic Kufi';" data-open="click" data-menu="vertical-menu">

<?php if(isset($_POST['ok1']))
{ ?>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<br>
<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
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
    <td align="center"><strong>تقرير مدفوعات الموردين ليوم <?php echo $_POST['date'];?> </strong></td>
            <td align="center"> تقارير المصروفاتات </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<br>

<?php include('dbcon/dbcon.php');
$sql=mysql_query("select * from payment where date='$_POST[date]'");
$row=mysql_fetch_array($sql);
?>
<table dir="rtl" border="1" style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
<tr >
<td style="width:20%;">رقم الفاتورة</td>
<td style="width:20%;">المورد</td>
<td style="width:10%;">المطلوب</td>
<td style="width:15%;">المدفوع</td>
<td style="width:15%;">المتبقي</td>
<td style="width:20%;">ألتاريخ</td>
</tr>
<?php 
$total = 0;
$pay = 0 ;
$ex = 0 ;
do { 
$total = $total + $row['total'];
$pay = $pay + $row['pay'];
$ex = $ex + $row['ex'];
  ?>
<tr>
<td><?php echo $row['codes'];?></td>
<td><?php echo $row['cust'];?></td>
<td><?php echo $row['total'];?></td>
<td><?php echo $row['pay'];?></td>
<td><?php echo $row['ex'];?></td>
<td><?php echo $row['date'];?></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
<tr>
<td>المجموع</td>

<td><?php include('dbcon/dbcon.php'); $sql=mysql_query("select count(pxid) from payment where date='$_POST[date]'"); $row=mysql_fetch_array($sql); echo $row['count(pxid)'];?></td>

<td><?php echo $total ;?></td>

<td><?php echo $pay;?></td>

<td><?php echo $ex ; ?></td>
<td></td>
</tr>
</table>

<?php } ?>
<?php if(isset($_POST['ok2']))
{ ?>
<center>
<table dir="rtl" border="1"  style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
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
    <td align="center"><strong>تقرير مدفوعات المورد <?php echo $_POST['name'];?></strong></td>
            <td align="center"> تقارير المصروفاتات </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<?php include('dbcon/dbcon.php');
$sql=mysql_query("select * from payment where cust='$_POST[name]'");
$row=mysql_fetch_array($sql);
?>
<table dir="rtl" border="1"  style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
<tr >
<td style="width:20%;">رقم الفاتورة</td>
<td style="width:20%;">المورد</td>
<td style="width:10%;">المطلوب</td>
<td style="width:15%;">المدفوع</td>
<td style="width:15%;">المتبقي</td>
<td style="width:20%;">ألتاريخ</td>
</tr>
<?php 
$total = 0;
$pay = 0 ;
$ex = 0 ;
do { 
$total = $total + $row['total'];
$pay = $pay + $row['pay'];
$ex = $ex + $row['ex'];
  ?>
<tr>
<td><?php echo $row['codes'];?></td>
<td><?php echo $row['cust'];?></td>
<td><?php echo $row['total'];?></td>
<td><?php echo $row['pay'];?></td>
<td><?php echo $row['ex'];?></td>
<td><?php echo $row['date'];?></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
<tr>
<tr>
<td>المجموع</td>
<td><?php include('dbcon/dbcon.php'); $sql=mysql_query("select count(pxid) from payment where cust='$_POST[name]'"); $row=mysql_fetch_array($sql); 
echo $row['count(pxid)'];?></td>
<td><?php echo $total; ?></td>
<td><?php echo $pay; ?></td>
<td><?php echo $ex; ?></td>
<td></td>
</tr>
</table>
<br>
<?php } ?>
<?php if(isset($_POST['ok3']))
{ ?>

<center>
<table dir="rtl" border="1"  style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
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
    <td align="center"><strong>تقرير مدفوعات المورد <?php echo $_POST['name'];?> بتاريخ <?php echo $_POST['date'];?></strong></td>
            <td align="center"> تقارير المصروفاتات </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<?php include('dbcon/dbcon.php');
$sql=mysql_query("select * from payment where cust='$_POST[name]' and date='$_POST[date]'");
$row=mysql_fetch_array($sql);
?>
<table dir="rtl" border="1"  style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
<tr >
<td style="width:20%;">رقم الفاتورة</td>
<td style="width:20%;">المورد</td>
<td style="width:10%;">المطلوب</td>
<td style="width:15%;">المدفوع</td>
<td style="width:15%;">المتبقي</td>
<td style="width:20%;">ألتاريخ</td>
</tr>
<?php 
$total = 0;
$pay = 0 ;
$ex = 0 ;
do { 
$total = $total + $row['total'];
$pay = $pay + $row['pay'];
$ex = $ex + $row['ex'];
  ?>
<tr>
<td><?php echo $row['codes'];?></td>
<td><?php echo $row['cust'];?></td>
<td><?php echo $row['total'];?></td>
<td><?php echo $row['pay'];?></td>
<td><?php echo $row['ex'];?></td>
<td><?php echo $row['date'];?></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
<tr>
<tr>
<td>المجموع</td>
<td><?php include('dbcon/dbcon.php'); $sql=mysql_query("select count(pxid) from payment where cust='$_POST[name]'and date='$_POST[date]' "); $row=mysql_fetch_array($sql); 
echo $row['count(pxid)'];?></td>
<td><?php echo $total; ?></td>
<td><?php echo $pay; ?></td>
<td><?php echo $ex; ?></td><td></td>
</tr>
</table>
<table dir="rtl" border="1" style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
<tr>
<td style="width:8%;"><strong>المبلغ</strong> </td>
<td  style="width:17%;"><?php echo $pay;?></td>
<td style="width:8%;"><strong>المدفوع</strong></td>
<td  style="width:17%;"><?php include('dbcon/dbcon.php'); $sql=mysql_query("select pay from payment where cust='$_POST[name]' and date='$_POST[date]'"); $row=mysql_fetch_array($sql); echo $info=$row['pay'];?></td>
<td style="width:8%;"><strong>المتبقي</strong></td>
<td  style="width:17%;"><?php echo $sud=$pay-$info;?></td>
<td style="width:8%;"><strong>الحالة</strong></td>
<td  style="width:17%;"><?php if($sud<=0)
{
echo "أكمل السداد";
}
else
{
echo "لم يكم السداد";
}?></td>
</tr>
</table><br>
<?php } ?>

<?php if(isset($_POST['ok4']))
{ ?>
<center>
<br>
<center>
<table dir="rtl" border="1"  style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
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
    <td align="center"><strong>تقرير مدفوعات المورد <?php echo $_POST['name'];?> لصنف <?php echo $_POST['item'];?> بتاريخ <?php echo $_POST['date'];?></strong></td>
            <td align="center"> تقارير المصروفاتات </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<?php include('dbcon/dbcon.php');
$sql=mysql_query("select * from payment where cust='$_POST[name]' and date='$_POST[date]' and item='$_POST[item]'");
$row=mysql_fetch_array($sql);
?>
<table dir="rtl" border="1"  style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
<tr >
<td style="width:20%;">رقم الفاتورة</td>
<td style="width:20%;">المورد</td>
<td style="width:20%;">المطلوب</td>
<td style="width:20%;">المدفوع</td>
<td style="width:20%;">المتبقي</td>
</tr>
<?php 
$total = 0;
$pay = 0 ;
$ex = 0 ;
do { 
$total = $total + $row['total'];
$pay = $pay + $row['pay'];
$ex = $ex + $row['ex'];
  ?>
<tr>
<td><?php echo $row['codes'];?></td>
<td><?php echo $row['cust'];?></td>
<td><?php echo $row['total'];?></td>
<td><?php echo $row['pay'];?></td>
<td><?php echo $row['ex'];?></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
<tr>
<tr>
<td>المجموع</td>
<td><?php include('dbcon/dbcon.php'); $sql=mysql_query("select count(pxid) from payment where cust='$_POST[name]'and date='$_POST[date]' and item='$_POST[item]'"); $row=mysql_fetch_array($sql); echo $row['count(pxid)'];?></td>
      <td></td>
      <td></td>
      <td></td>
<td><?php include('dbcon/dbcon.php'); $sql=mysql_query("select sum(qunt) from payment where cust='$_POST[name]' and date='$_POST[date]' and item='$_POST[item]'"); $row=mysql_fetch_array($sql); echo $row['sum(qunt)'];?></td>
<td><?php include('dbcon/dbcon.php'); $sql=mysql_query("select sum(price) from payment where cust='$_POST[name]' and date='$_POST[date]' and item='$_POST[item]'"); $row=mysql_fetch_array($sql); echo $row['sum(price)'];?></td>
<td><?php include('dbcon/dbcon.php'); $sql=mysql_query("select sum(qunt*price) from payment where cust='$_POST[name]' and date='$_POST[date]' and item='$_POST[item]'"); $row=mysql_fetch_array($sql); echo $pay=$row['sum(qunt*price)'];?></td>
</tr>
</table>
<table dir="rtl" border="1" style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
<tr>
<td style="width:8%;"><strong>المبلغ</strong> </td>
<td  style="width:17%;"><?php echo $pay;?></td>
<td style="width:8%;"><strong>المدفوع</strong></td>
<td  style="width:17%;"><?php include('dbcon/dbcon.php'); $sql=mysql_query("select pay from payment where cust='$_POST[name]' and date='$_POST[date]' and item='$_POST[item]'"); $row=mysql_fetch_array($sql); echo $info=$row['pay'];?></td>
<td style="width:8%;"><strong>المتبقي</strong></td>
<td  style="width:17%;"><?php echo $sud=$pay-$info;?></td>
<td style="width:8%;"><strong>الحالة</strong></td>
<td  style="width:17%;"><?php if($sud<=0)
{
echo "أكمل السداد";
}
else
{
echo "لم يكم السداد";
}?></td>
</tr>
</table><br>
<br>
<?php } ?>
<br>
<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 12%;">الموقع الإلكتروني</td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 12%;">البريد الإلكتروني</td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;">رقم الهاتـــف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left"  ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                <img src="icon/qr.png"  width="25" height="25" alt=""></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table></center>
</div>
<table style="width:98%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-raised gradient-pomegranate white" id='btn'  style="width: 100%;"  onclick="printDiv(); javascript:window.close()"> طباعة <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="record.php"><button class="btn big-shadow" style="width: 100%;"> الموردين <i class="fa ft-airplay"></i></button></a></td>
<td style="width:15%;"><a href="vpayment.php"><button class="btn btn-raised gradient-pomegranate white" style="width: 100%;"> الإستعلام <i class="fa ft-search"></i></button></a></td>
<td style="width:15%;"><a href="repcust2.php"><button class="btn big-shadow" style="width: 100%;"> التقارير <i class="fa ft-paperclip"></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn btn-raised gradient-pomegranate white" style="width: 100%;"> النظام <i class="fa fa-home"></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table>
</center>
</body>
</html>
