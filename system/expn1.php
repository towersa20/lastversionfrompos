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
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">

<center>
<table style="width:100%;" border="1"  align="center" class="table table-bordered table-hover ">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width: 20%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width: 20%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center">التاريخ <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"> <strong> تقرير المصروفات  ليوم <?php echo $_POST['date'];?></strong> </td>
            <td align="center"> تقارير المصروفات </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<br>


<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover ">
  <tr>
    <td nowrap style="width:10%; "><span class="style4">رقم السند</span></td>
    <td nowrap style="width:10%; "><span class="style4">التاريخ</span></td>
    <td nowrap style="width:20%; "><span class="style4">بند الصرف</span></td>
    <td nowrap style="width:50%; "><span class="style4">بيانات الصـرف</span></td>
    <td nowrap style="width:10%; "><span class="style4">المبلغ</span></td>
  </tr>
  <?php include('dbcon/config.php');
  $sql=mysql_query("select * from expn where date='$_POST[date]'");
  $row=mysql_fetch_array($sql);
   do { ?>
  <tr>
    <td nowrap><span class="style5"><?php echo $row['exid'];?></span></td>
    <td nowrap><span class="style5"><?php echo $row['datetime'];?></span></td>
    <td nowrap><span class="style5"><?php echo $row['etype'];?></span></td>
    <td nowrap><span class="style5"><?php echo $row['byan'];?></span></td>
    <td nowrap><span class="style5"><?php echo $row['cost'];?> ريال</span></td>
  </tr>
  <?php } while($row=mysql_fetch_array($sql));?>
  <tr>
    <td nowrap><span class="style5"><strong>مجموع المصروفات</strong></span></td>
    <td nowrap ><span class="style5">
      <?php include('dbcon/config.php');	$sql=mysql_query("select count(exid) from expn where date='$_POST[date]'"); $row=mysql_fetch_array($sql); echo $row['count(exid)'];?>
    </span> </td>
<td></td>
    <td nowrap><span class="style5"><strong>الإجمالي</strong></span></td>
    <td nowrap ><span class="style5">
      <?php include('dbcon/config.php');	$sql=mysql_query("select sum(cost) from expn where date='$_POST[date]'"); $row=mysql_fetch_array($sql); echo $row['sum(cost)'];?> 
      ريال</span></td>
  </tr>
</table>
<br>
<table style="width:100%;" align="center" class="table table-bordered table-hover" border="1"  dir="rtl">
    <tr><td style="width:12%;" nowrap="nowrap"><span class="style5"><strong>طبع بواسطة</strong></span></td>
    <td><span class="style5"><?php echo $_SESSION['uname'];?></span></td>
    </tr>
</table>
<br>
<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover ">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 12%;" nowrap="nowrap"><span class="style5">الموقع الإلكتروني</span></td>
            <td  style="width: 23%;" nowrap="nowrap"><span class="style5"><?php echo $query['site'];?></span></td>
            <td style="width: 12%;" nowrap="nowrap"><span class="style5">البريد الإلكتروني</span></td>
            <td style="width: 23%;" nowrap="nowrap"><span class="style5"><?php echo $query['email'];?></span></td>
            <td style="width: 10%;" nowrap="nowrap"><span class="style5">رقم الهاتـــف</span></td>
            <td style="width: 23%;" nowrap="nowrap"><span class="style5"><?php echo $query['phone'];?></span></td>
        </tr>
        <tr>
            <td colspan="5"><span class="style5"><?php echo $query['adres'];?></span></td>
            <td  align="left"  ><span class="style5"><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
              <img src="icon/qr.png"  width="25" height="25" alt=""></span></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>
</table>
</center>


<?php } ?>




<?php if(isset($_POST['ok2']))
{ ?>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<center>
<table style="width:100%;" border="1" align="center" class="table table-bordered table-hover ">
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
            <td align="center"> <strong> تقرير مصروفات <?php echo $_POST['exp'];?> ليوم <?php echo $_POST['date'];?></strong> </td>
            <td align="center"> تقارير المصروفات </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<br>

<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover ">
  <tr >
    <td nowrap style="width:10%; "><span class="style4">رقم السند</span></td>
    <td nowrap style="width:10%; "><span class="style4">التاريخ</span></td>
    <td nowrap style="width:20%; "><span class="style4">بند الصرف</span></td>
    <td nowrap style="width:50%; "><span class="style4">بيانات الصـرف</span></td>
    <td nowrap style="width:10%; "><span class="style4">المبلغ</span></td>
  </tr>
  <?php include('dbcon/config.php');
  $sql=mysql_query("select * from expn where etype='$_POST[exp]' and date='$_POST[date]'");
  $row=mysql_fetch_array($sql);
   do { ?>
  <tr>
    <td nowrap><span class="style5"><?php echo $row['exid'];?></span></td>
    <td nowrap><span class="style5"><?php echo $row['datetime'];?></span></td>
    <td nowrap><span class="style5"><?php echo $row['etype'];?></span></td>
    <td nowrap><span class="style5"><?php echo $row['byan'];?></span></td>
    <td nowrap><span class="style5"><?php echo $row['cost'];?> ريال</span></td>
  </tr>
  <?php } while($row=mysql_fetch_array($sql));?>
  <tr>
  <td nowrap><strong>مجموع المصروفات</strong></td>
  <td nowrap ><?php include('dbcon/config.php');	$sql=mysql_query("select count(exid) from expn where etype='$_POST[exp]' and date='$_POST[date]'"); $row=mysql_fetch_array($sql); echo $row['count(exid)'];?> </td>
  <td></td> 
  <td nowrap><strong>الإجمالي</strong></td>
  <td nowrap ><?php include('dbcon/config.php');	$sql=mysql_query("select sum(cost) from expn where etype='$_POST[exp]' and  date='$_POST[date]'"); $row=mysql_fetch_array($sql); echo $row['sum(cost)'];?> ريال</td>
</tr>
</table>
<br>
<table style="width:100%;" border="1" align="center" class="table table-bordered table-hover "  dir="rtl">
    <tr><td style="width:12%; "><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>
<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover ">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 13%;">الموقع الإلكتروني</td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 13%;">البريد الإلكتروني</td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;"> الهاتـــف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left"><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                <img src="icon/qr.png"  width="25" height="25" alt=""></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table></center>


<?php } ?>



<?php if(isset($_POST['ok3']))
{ ?>
<center>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">

<table style="width:100%;" border="1" align="center" class="table table-bordered table-hover ">
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
            <td align="center"> <strong> تقرير مصروفات المستخدم <?php echo $_POST['exp'];?> ليوم <?php echo $_POST['date'];?></strong> </td>
            <td align="center"> تقارير المصروفات </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<br>
<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover ">
  <tr >
    <td nowrap style="width:10%; "><span class="style4">رقم السند</span></td>
    <td nowrap style="width:10%; "><span class="style4">التاريخ</span></td>
    <td nowrap style="width:20%; "><span class="style4">بند الصرف</span></td>
    <td nowrap style="width:50%; "><span class="style4">بيانات الصـرف</span></td>
    <td nowrap style="width:10%; "><span class="style4">المبلغ</span></td>
  </tr>
  <?php include('dbcon/config.php');
  $sql=mysql_query("select * from expn where user='$_POST[exp]' and date='$_POST[date]'");
  $row=mysql_fetch_array($sql);
   do { ?>
  <tr>
    <td nowrap><span class="style5"><?php echo $row['exid'];?></span></td>
    <td nowrap><span class="style5"><?php echo $row['datetime'];?></span></td>
    <td nowrap><span class="style5"><?php echo $row['etype'];?></span></td>
    <td nowrap><span class="style5"><?php echo $row['byan'];?></span></td>
    <td nowrap><span class="style5"><?php echo $row['cost'];?> ريال</span></td>
  </tr>
  <?php } while($row=mysql_fetch_array($sql));?>
  <tr>
    <td nowrap><strong>الإجمالي</strong></td>
    <td nowrap ><?php include('dbcon/config.php');	$sql=mysql_query("select count(exid) from expn where user='$_POST[exp]' and date='$_POST[date]'"); $row=mysql_fetch_array($sql); echo $row['count(exid)'];?></td>
   <td></td> 
   <td nowrap><strong>مجموع المصروفات</strong></td>
    <td nowrap ><?php include('dbcon/config.php');	$sql=mysql_query("select sum(cost) from expn where user='$_POST[exp]' and  date='$_POST[date]'"); $row=mysql_fetch_array($sql); echo $row['sum(cost)'];?>  ريال</td>
  </tr>
</table>
<br>
<table style="width:100%;" border="1"  align="center" class="table table-bordered table-hover "  dir="rtl">
    <tr><td style="width:12%; "><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>
<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover ">
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


<?php } ?>
</div>
<table style="width:100%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-raised gradient-pomegranate white" id='btn'  style="width: 100%;"  onclick="printDiv(); javascript:window.close()"> طباعة <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="expn.php"><button class="btn big-shadow" style="width: 100%;"> المصروفات <i class="fa ft-airplay"></i></button></a></td>
<td style="width:15%;"><a href="rexpn1.php"><button class="btn btn-raised gradient-pomegranate white" style="width: 100%;"> التقارير <i class="fa ft-paperclip"></i></button></a></td>
<td style="width:15%;"><a href="vexpn.php"><button class="btn big-shadow" style="width: 100%;"> الإستعلام <i class="fa ft-search"></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn btn-raised gradient-pomegranate white" style="width: 100%;"> النظام <i class="fa fa-home"></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table>
</center>


</body>
</html>
