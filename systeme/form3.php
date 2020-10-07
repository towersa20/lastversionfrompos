<?php include('header.php');?>

<script>
function printDiv() 
{
  var divToPrint=document.getElementById('DivIdToPrint');
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<html><title>تقرير المصروفات</title><body border="3" dir="rtl" onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
// newWin.window.close();
  setTimeout(function(){newWin.close();},1);
}</script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>المصروفات</title>
</head>
  <body style="font-family: 'Droid Arabic Kufi';" data-open="click" data-menu="vertical-menu">
<?php if(isset($_POST['ok1']))
{ ?>
<center>
<div id='DivIdToPrint' style="width:100%; font-size:13px; font-family: 'Droid Arabic Kufi';" dir="rtl">
<table style="width:100%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center">التاريخ <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>مصروفاتات  <?php echo $_POST['a'];?></strong></td>
            <td align="center"> <strong>المصروفاتات</strong> </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
    <table style="width:100%; font-size:13px; " border="1" align="center" class="table table-bordered table-hover">
    <tr>
    <td colspan="6"><strong>بيان منصــرفات</strong></td>

  </tr>
  <tr>
    <td style="width: 10%;"><strong>المصروف</strong></td>
    <td colspan="5"><?php echo $_POST['a'];?></td>
  </tr>
  <tr>
    <td  style="width:7%; "><strong>التاريـــــــــخ</strong></td>
    <td  style="width:13%; "><?php echo $_POST['c'];?></td>
    <td style="width:8%; "><strong>المبلغ</strong></td>
    <td style="width: 15%;"><?php echo $_POST['b'];?> ريال </td>
    <td nowrap style="width: 10%;"><strong>المبلغ بالحروف </strong></td>
    <td><?php include('tech/I18N/Arabic.php'); $obj = new I18N_Arabic('Numbers'); $xm=$_POST['b']; echo $obj->int2str($_POST['b']); ?> ريال </td></tr>
  <tr>
    <td><strong>بيان الصـرف</strong></td>
    <td colspan="5" rowspan="4"><?php echo $_POST['e'];?></td>
  </tr><Br>
</table>

<table style="width:100%;" border="1"  align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">
    <tr><td style="width:12%; "><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
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
            <td  align="left"  ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                <img src="icon/qr.png"  width="25" height="25" alt=""></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
</div>
<table style="width:100%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"></td>
<td style="width:15%;"><a href="#"><button class="btn big-shadow" id='btn'  style="width: 100%;"  onclick="printDiv(); javascript:window.close()"> طباعة <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="expn.php"><button class="btn btn-raised gradient-pomegranate white" style="width: 100%;"> جديد <i class="fa ft-airplay"></i></button></a></td>
<td style="width:15%;"><a href="vexpn.php"><button class="btn big-shadow" style="width: 100%;"> الإستعلام <i class="fa ft-search"></i></button></a></td>
<td style="width:15%;"><a href="rexpn1.php"><button class="btn btn-raised gradient-pomegranate white" style="width: 100%;"> التقارير <i class="fa ft-paperclip"></i></button></a></td>
<td style="width:15%;"><a href="expns.php"><button class="btn big-shadow" style="width: 100%;"> النظام <i class="fa fa-home"></i></button></a></td>
<td style="width:15%;"></td>
</tr></table>

</center>


<?php } ?>
<?php 
if(isset($_POST['ok1']))
{
include('dbcon/dbcon.php');
$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
$d=$_POST['d'];
$e=$_POST['e'];
$f=$_POST['f'];
$year=$_POST['year'];
$add=mysql_query("insert into expn values('','$a','$b','$e',now(),now(),'$year','$_SESSION[uname]')");
if($add)
{
echo "<script> alert('تم حفظ المصروف');</script>";
}
else
{
echo "<script> alert('لم يتم حفظ المصروف');</script>";
}
}
?>