<?php include('header.php');?>

<script>
function printDiv() 
{
  var divToPrint=document.getElementById('DivIdToPrint');
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<html><title>تقرير الضريبة</title><body border="3" dir="rtl" onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
// newWin.window.close();
  setTimeout(function(){newWin.close();},1);
}</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>تقرير الضريبة</title>
</head>
  <body style="font-family: 'Droid Arabic Kufi', serif;" data-open="click" data-menu="vertical-menu">
<?php if(isset($_POST['ok1']))
{ ?>
<center>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">

<table style="width:100%;  font-size: 13px;" border="1"  align="center" class="table table-bordered table-hover">
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
            <td align="center"><strong>تقرير الضريبة ليوم <?php echo $_POST['date'];?> </strong></td>
            <td align="center"> <strong>تقارير الضريبة</strong> </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>

<br>
<?php include('dbcon/dbcon.php');
$sql=mysql_query("select * from sales where date='$_POST[date]' and tell='1'");
$row=mysql_fetch_array($sql);?>
<table style="width:50%; font-size: 13px;" border="1"  align="right" class="table table-bordered table-hover"  dir="rtl">
<tr><td colspan="7"  style="background-color:#FFFFCC;"><strong>ضريبة المبيعات</strong></td></tr>
    <tr align="center">
      <td nowrap style="width:12%;"><strong>الفاتورة</strong></td>
      <td nowrap style="width:12%;"><strong>الصنف</strong></td>
      <td nowrap style="width:7%;"><strong>الكمية</strong></td>
      <td nowrap style="width:7%;"><strong>السعر</strong></td>
      <td nowrap style="width:7%;"><strong>الإجمالي</strong></td>
      <td nowrap style="width:7%;"><strong>الضريبه</strong></td>
      <td nowrap style="width:7%;"><strong>الوقت</strong></td>
    </tr>
		  <?php do { ?>

    <tr>	
      <td nowrap nowrap><?php echo $row['invoice'];?></td>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['qty'];?></td>
      <td><?php echo $row['price'];?></td>
      <td><?php  $x1=$row['qty']*$row['price'];
        $x1 = sprintf("%01.2f", $x1);  echo $x1;
        ?></td>
      <td><?php  $z1=$row['price']*$row['qty']*$tax/100;
        $z1 = sprintf("%01.2f", $z1);  echo $z1;
        ?></td>
	  <td nowrap><?php echo $row['date'];?></td>
   </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
	<td colspan="2"><strong>المجموع</strong></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select count(product) from sales where date ='$_POST[date]' and tell = '1' ");
	$row=mysql_fetch_array($sql);
	echo $row['count(product)'];
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price) from sales where date ='$_POST[date]' and tell = '1' ");
	$row=mysql_fetch_array($sql);
   $var4=$row['sum(price)'];
  $var4 = sprintf("%01.2f", $var4);  echo $var4;

	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price*qty) from sales where date ='$_POST[date]' and tell = '1' ");
	$row=mysql_fetch_array($sql);
	 $var3=$row['sum(price*qty)'];   $var3 = sprintf("%01.2f", $var3);  echo $var3;

	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qty*price) from sales where date ='$_POST[date]' and tell = '1' ");
	$row=mysql_fetch_array($sql);
   $xxx1=round($row['sum(qty*price)']*$tax/100,2);
  $xxx1 = sprintf("%01.2f", $xxx1);  echo $xxx1;

	?></td>

	
	

	</tr>
  </table>
  
  
<?php include('dbcon/dbcon.php');
$sql=mysql_query("select * from share where date='$_POST[date]'");
$row=mysql_fetch_array($sql);?>
<table style="width:50%;  font-size: 13px;" border="1"  align="right" class="table table-bordered table-hover"  dir="rtl">
<tr><td colspan="7" style="background-color:#FF9999;"><strong>ضريبة المشتريات</strong></td></tr>
    <tr align="center">
      <td nowrap style="width:12%;"><strong>الفاتورة</strong></td>
      <td nowrap style="width:12%;"><strong>الصنف</strong></td>
      <td nowrap style="width:7%;"><strong>الكمية</strong></td>
      <td nowrap style="width:7%;"><strong>السعر</strong></td>
      <td nowrap style="width:7%;"><strong>الإجمالي</strong></td>
      <td nowrap style="width:7%;"><strong> الضريبه</strong></td>
      <td nowrap style="width:7%;"><strong>الوقت</strong></td>
    </tr>
		  <?php do { ?>

    <tr>	
     <td nowrap><?php echo $row['formid'];?></td>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['qunt'];?></td>
      <td><?php echo $row['price'];?></td>
      <td><?php  $x1=$row['qunt']*$row['price'];   $x1 = sprintf("%01.2f", $x1);  echo $x1;?></td>
      <td><?php  $z1=$row['price']*$row['qunt']*$tax/100;   $z1 = sprintf("%01.2f", $z1);  echo $z1;?></td>
	  <td nowrap><?php echo $row['date'];?></td>
   </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
	<td><strong>المجموع</strong></td>
	<td><strong></strong></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select count(barco) from share where date ='$_POST[date]'  ");
	$row=mysql_fetch_array($sql);
	echo $row['count(barco)'];
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price) from share where date ='$_POST[date]'  ");
	$row=mysql_fetch_array($sql);
   $var2=$row['sum(price)'];
  $var2 = sprintf("%01.2f", $var2);  echo $var2;

	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price*qunt) from share where date ='$_POST[date]'  ");
	$row=mysql_fetch_array($sql);
   $var1=$row['sum(price*qunt)'];
  $var1 = sprintf("%01.2f", $var1);  echo $var1;

	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qunt*price) from share where date ='$_POST[date]' ");
	$row=mysql_fetch_array($sql);
   $xxx2=round($row['sum(qunt*price)']*$tax/100,2);
   $xxx2 = sprintf("%01.2f", $xxx2);  echo $xxx2;

	?></td>

	
	

	</tr>
  </table>
<table style="width:30%;  font-size: 13px;" border="1"   align="center" class="table table-bordered table-hover"  dir=">
<tr>
<td colspan="3" style="background-color:#FFCCCC;" align="right"><strong>تفاصيل ضريبة المبيعات والمشتريات</strong></td></tr>
<tr>
<td><strong>المبيعات</strong></td>
<td><strong>المشتريات</strong></td>
<td><strong>الضريبة</strong></td>
</tr>
<tr>
<td><?php  $su3=$xxx1;
  $su3 = sprintf("%01.2f", $su3);  echo $su3;
  ?></td>
<td><?php  $su2=$xxx2;
  $su2 = sprintf("%01.2f", $su2);  echo $su2;
  ?></td>
<td><?php  $su1=$xxx1-$xxx2;
  $su1 = sprintf("%01.2f", $su1);  echo $su1;
  ?></td>
</tr>
  </table>
<br>
<table style="width:98%;" border="1"   align="center" class="table table-bordered table-hover"  dir="rtl">
    <tr><td style="width:12%; "><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>
<table dir="rtl" style="width:98%;"  border="1" align="center" class="table table-bordered table-hover">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 15%;">الموقع الإلكتروني</td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 15%;">البريد الإلكتروني</td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;">رقم الهاتـف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left" ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
               </td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
</div>
<table style="width:98%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"></td>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%;  font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> طباعة <i class="fa  fa-print"></i></button></a></td>
<td style="width:15%;"><a href="move.php"><button class="btn btn-primary" style="width: 100%;  font-family: 'Droid Arabic Kufi';"> المشتريات <i class="fa fa-shopping-bag"></i></button></a></td>
<td style="width:15%;"><a href="vshare.php"><button class="btn btn-primary" style="width: 100%;  font-family: 'Droid Arabic Kufi';"> الإستعلام <i class="fa fa-search"></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn btn-primary" style="width: 100%;  font-family: 'Droid Arabic Kufi';"> النظام <i class="fa fa-home"></i></button></a></td>

</tr></table></center>


<?php } ?>

<?php if(isset($_POST['ok2']))
{ ?>
<center>

<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<table dir="rtl" style="width:100%;  font-size: 13px;"  border="1" align="center" class="table table-bordered table-hover">
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
            <td align="center">تقرير الضريبة لصنف <?php echo $_POST['item'];?> بتاريخ <?php echo $_POST['date'];?></td>
            <td align="center"> تقارير المشتريات </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<br>

<br>
<?php include('dbcon/dbcon.php');
$sql=mysql_query("select * from sales where date='$_POST[date]' and name='$_POST[item]'");
$row=mysql_fetch_array($sql);?>
<table style="width:50%;  font-size: 13px;" border="1"  align="right" class="table table-bordered table-hover"  dir="rtl">
<tr><td colspan="8"  style="background-color:#FFFFCC;"><strong>ضريبة المبيعات</strong></td></tr>
    <tr align="center">
    <td nowrap style="width:12%;"><strong>الفاتورة</strong></td>
    <td nowrap style="width:12%;"><strong>الصنف</strong></td>
      <td nowrap style="width:7%;"><strong>الوحدة</strong></td>
      <td nowrap style="width:7%;"><strong>الكمية</strong></td>
      <td nowrap style="width:7%;"><strong>السعر</strong></td>
      <td nowrap style="width:7%;"><strong>الإجمالي</strong></td>
      <td nowrap style="width:7%;"><strong>شامل الضريبة</strong></td>
      <td nowrap style="width:7%;"><strong>الوقت</strong></td>
    </tr>
		  <?php do { ?>

    <tr>	
    <td nowrap><?php echo $row['invoice'];?></td>

      <td><?php echo $row['name'];?></td>
      <td nowrap><?php echo $row['category'];?></td>
      <td><?php echo $row['qty'];?></td>
      <td><?php  $br=$row['price'];       $br = sprintf("%01.2f", $br);  echo $br;?></td>
      <td><?php $x1=$row['qty']*$row['price'];
        $x1 = sprintf("%01.2f", $x1);  echo $x1;
        ?></td>
      <td><?php echo $z1=round($row['price']*$row['qty']*$tax/100+$x1,2);?></td>
	  <td nowrap><?php echo $row['date'];?></td>
   </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
	<td><strong>المجموع</strong></td>
  <td></td>
  <td></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select count(qty) from sales where date ='$_POST[date]' and tell = '1' and name='$_POST[item]'");
	$row=mysql_fetch_array($sql);
	echo $row['count(qty)'];
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price) from sales where date ='$_POST[date]' and tell = '1' and name='$_POST[item]'");
	$row=mysql_fetch_array($sql);
  $add=$row['sum(price)'];
  $add = sprintf("%01.2f", $add);  echo $add;

	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price*qty) from sales where date ='$_POST[date]' and tell = '1'  and name='$_POST[item]'");
	$row=mysql_fetch_array($sql);
   $xzz=$row['sum(price*qty)'];
  $xzz = sprintf("%01.2f", $xzz);  echo $xzz;

	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qty*price) from sales where date ='$_POST[date]' and tell = '1' and name='$_POST[item]'");
	$row=mysql_fetch_array($sql);
   $xxx1=round($row['sum(qty*price)']*$tax/100+$row['sum(qty*price)'],2);
  $xxx1 = sprintf("%01.2f", $xxx1);  echo $xxx1;

	?></td>

	
	

	</tr>
  </table>
  
  
<?php include('dbcon/dbcon.php');
$sql=mysql_query("select * from share where date='$_POST[date]' and name='$_POST[item]'");
$row=mysql_fetch_array($sql);?>
<table style="width:50%;  font-size: 13px;" border="1"  align="right" class="table table-bordered table-hover"  dir="rtl">
<tr><td colspan="8" style="background-color:#FF9999;"><strong>ضريبة المشتريات</strong></td></tr>
    <tr align="center">
    <td nowrap style="width:12%;"><strong>الفاتورة</strong></td>
    <td nowrap style="width:12%;"><strong>الصنف</strong></td>
      <td nowrap style="width:7%;"><strong>الوحدة</strong></td>
      <td nowrap style="width:7%;"><strong>الكمية</strong></td>
      <td nowrap style="width:7%;"><strong>السعر</strong></td>
      <td nowrap style="width:7%;"><strong>الإجمالي</strong></td>
      <td nowrap style="width:7%;"><strong>شامل الضريبة</strong></td>
      <td nowrap style="width:7%;"><strong>الوقت</strong></td>
    </tr>
		  <?php do { ?>

    <tr>	
    <td><?php echo $row['formid'];?></td>
    <td><?php echo $row['name'];?></td>
      <td nowrap><?php echo $row['unit'];?></td>
      <td><?php echo $row['qunt'];?></td>
      <td><?php $x2=$row['price'];         $x2 = sprintf("%01.2f", $x2);  echo $x2;?></td>
      <td><?php  $x1=$row['qunt']*$row['price'];
        $x1 = sprintf("%01.2f", $x1);  echo $x1;
        ?></td>
      <td><?php  $z1=$row['price']*$row['qunt']*$tax/100+$x1;
        $z1 = sprintf("%01.2f", $z1);  echo $z1;
        ?></td>
	  <td nowrap><?php echo $row['date'];?></td>
   </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
	<td><strong>المجموع</strong></td>
	<td></td>	<td></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select count(barco) from share where date ='$_POST[date]' and name='$_POST[item]'");
	$row=mysql_fetch_array($sql);
	echo $row['count(barco)'];
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price) from share where date ='$_POST[date]' and name='$_POST[item]'");
	$row=mysql_fetch_array($sql);
   $q1=$row['sum(price)'];
  $q1 = sprintf("%01.2f", $q1);  echo $q1;

	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price*qunt) from share where date ='$_POST[date]' and name='$_POST[item]'");
	$row=mysql_fetch_array($sql);
  $add1=$row['sum(price*qunt)'];
  $add1 = sprintf("%01.2f", $add1);  echo $add1;

	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qunt*price) from share where date ='$_POST[date]'  and name='$_POST[item]'");
	$row=mysql_fetch_array($sql);
   $xxx2=$row['sum(qunt*price)']*$tax/100+$row['sum(qunt*price)'];
   $xxx2 = sprintf("%01.2f", $xxx2);  echo $xxx2;

	?></td>

	
	

	</tr>
  </table>
<table style="width:30%;  font-size: 13px;" border="1"   align="center" class="table table-bordered table-hover"  dir=">
<tr>
<td colspan="3" style="background-color:#FFCCCC;" align="right"><strong>تفاصيل ضريبة المبيعات والمشتريات</strong></td></tr>
<tr>
<td><strong>المبيعات</strong></td>
<td><strong>المشتريات</strong></td>
<td><strong>الضريبة</strong></td>
</tr>
<tr>
<td><?php echo round($xxx1,2);?></td>
<td><?php echo round($xxx2,2);?></td>
<td><?php echo round($xxx1-$xxx2,2);?></td>
</tr>
  </table>
<br>
<br>
<table style="width:100%;" border="1"   align="center" class="table table-bordered table-hover"  dir="rtl">
    <tr><td style="width:12%; "><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>
<table dir="rtl" style="width:100%;"  border="1" align="center" class="table table-bordered table-hover">
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
                <img src="icon/qr.png"  width="25" height="25" alt="></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
</div>
<table style="width:98%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%;"  onclick="printDiv(); javascript:window.close()"> طباعة <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="move.php"><button class="btn btn-primary" style="width: 100%;"> المشتريات <i class="fa ft-airplay"></i></button></a></td>
<td style="width:15%;"><a href="vshare.php"><button class="btn btn-primary" style="width: 100%;"> الإستعلام <i class="fa ft-search"></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn btn-primary" style="width: 100%;"> النظام <i class="fa fa-home"></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table></center>

<br>
<?php } ?>




<?php if(isset($_POST['ok3']))
{ ?>
<center>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">

<table dir="rtl" style="width:99%;  font-size: 13px;"   border="1" align="center" class="table table-bordered table-hover">
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
            <td align="center"><strong>تقرير المشتريــات ليوم <?php echo $_POST['date'];?> لصنف <?php echo $_POST['item'];?></strong></td>
            <td align="center"> تقارير المشتريات </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>

<?php include('dbcon/dbcon.php');
$sql=mysql_query("select * from share where date='$_POST[date]' and name='$_POST[item]'");
$row=mysql_fetch_array($sql);?>
<table style="width:99%;  font-size: 13px;" border="1" bordercolor="#CCCCCC"   align="center" class="table table-bordered table-hover"  dir="rtl">

    <tr align="center">
      <td nowrap style="width:8%;"><strong>الباركود</strong></td>
      <td nowrap style="width:12%;"><strong>الصنف</strong></td>
      <td nowrap style="width:7%;"><strong>الوحدة</strong></td>
      <td nowrap style="width:7%;"><strong>الكمية</strong></td>
      <td nowrap style="width:7%;"><strong>شراء</strong></td>
      <td nowrap style="width:7%;"><strong>الإجمالي</strong></td>
      <td nowrap style="width:7%;"><strong>شامل الضريبة</strong></td>
      <td nowrap style="width:7%;"><strong>البيع</strong></td>
      <td nowrap style="width:8%;"><strong>الإجمالي</strong></td>
      <td nowrap style="width:7%;"><strong>شامل الضريبة</strong></td>
      <td nowrap style="width:7%;"><strong>الربح المتوقع</strong></td>
      <td nowrap style="width:7%;"><strong>التاريخ</strong></td>
    </tr>
		  <?php do { ?>

    <tr>	
      <td nowrap><?php echo $row['formid'];?></td>
      <td><?php echo $row['name'];?></td>
      <td nowrap><?php echo $row['unit'];?></td>
      <td><?php echo $row['qty'];?></td>
      <td><?php echo $row['price'];?></td>
      <td><?php echo $x1=round($row['qty']*$row['price'],2);?></td>
      <td><?php echo $z1=round($row['price']*$row['qty']*$tax/100+$x1,2);?></td>
      <td><?php echo round($row['sales'],2);?></td>
      <td><?php echo $x2=round($row['qty']*$row['sales'],2);?></td>
      <td><?php echo $z2=round($row['qty']*$row['sales']*$tax/100+$x2,2);?></td>
	  <td><?php echo $z2-$z1;?></td>
	  <td nowrap><?php echo $row['date'];?></td>
   </tr>
   	<?php } while ($row=mysql_fetch_array($sql));?>
		<tr>
	<td><strong>المجموع</strong></td>
	<td></td>
	<td></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select count(pid) from share where date ='$_POST[date]'  and name='$_POST[item]' and tell ='1'");
	$row=mysql_fetch_array($sql);
	echo $row['count(pid)'];
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price) from share where date ='$_POST[date]' and name='$_POST[item]' and tell ='1'");
	$row=mysql_fetch_array($sql);
	echo round($row['sum(price)'],2);
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price*qty) from share where date ='$_POST[date]' and name='$_POST[item]' and tell ='1'");
	$row=mysql_fetch_array($sql);
	echo round($row['sum(price*qty)'],2);
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qty*price) from share where date ='$_POST[date]' and name='$_POST[item]' and tell ='1'");
	$row=mysql_fetch_array($sql);
	echo $xx1=round($row['sum(qty*price)']*$tax/100+$row['sum(qty*price)'],2);
	?></td>

	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(sales) from share where date ='$_POST[date]'  and name='$_POST[item]' and tell ='1'");
	$row=mysql_fetch_array($sql);
	echo round($row['sum(sales)'],2);
	?></td>
	
	
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qty*sales) from share where date ='$_POST[date]'  and name='$_POST[item]' and tell ='1'");
	$row=mysql_fetch_array($sql);
	echo round($row['sum(qty*sales)'],2);
	?></td>
	
	
	
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qty*sales) from share where date ='$_POST[date]'  and name='$_POST[item]' and tell ='1'");
	$row=mysql_fetch_array($sql);
	echo $xx2=round($row['sum(qty*sales)']*$tax/100+$row['sum(qty*sales)'],2);
	?></td>
	<td><?php echo round($xx2-$xx1,2);?></td>
	<td></td>
	</tr>
  </table>
  


<br>
<table style="width:99%;  font-size: 13px;" border="1"  align="center" class="table table-bordered table-hover"  dir="rtl">
    <tr><td style="width:12%; "><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>
<table dir="rtl" style="width:99%;"  border="1" align="center" class="table table-bordered table-hover">
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
                <img src="icon/qr.png"  width="25" height="25" alt="></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
</div>
<table style="width:98%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%;"  onclick="printDiv(); javascript:window.close()"> طباعة <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="move.php"><button class="btn btn-primary" style="width: 100%;"> المشتريات <i class="fa ft-airplay"></i></button></a></td>
<td style="width:15%;"><a href="vshare.php"><button class="btn btn-primary" style="width: 100%;"> الإستعلام <i class="fa ft-search"></i></button></a></td>
<td style="width:15%;"><a href="shselect1.php"><button class="btn btn-primary" style="width: 100%;"> التقارير <i class="fa ft-paperclip"></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn btn-primary" style="width: 100%;"> النظام <i class="fa fa-home"></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table></center>

<br><?php } ?>


<?php if(isset($_POST['ok4']))
{ ?>
<center>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">

<table dir="rtl" style="width:99%;  font-size: 13px;" border="1"  align="center" class="table table-bordered table-hover">
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
            <td align="center"><strong>تقرير المشتريــات ليوم <?php echo $_POST['date'];?> لصنف <?php echo $_POST['item'];?> من المورد <?php echo $_POST['cust'];?></strong></td>
            <td align="center"> تقارير المشتريات </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<br>

<?php include('dbcon/dbcon.php');
$sql=mysql_query("select * from share where date='$_POST[date]' and name='$_POST[item]' and customer='$_POST[cust]' order by unit desc");
$row=mysql_fetch_array($sql);?>
<table style="width:99%;  font-size: 13px;" border="1"  align="center" class="table table-bordered table-hover"  dir="rtl">

    <tr align="center">
      <td nowrap style="width:8%;"><strong>الباركود</strong></td>
      <td nowrap style="width:12%;"><strong>الصنف</strong></td>
      <td nowrap style="width:7%;"><strong>الوحدة</strong></td>
      <td nowrap style="width:7%;"><strong>الكمية</strong></td>
      <td nowrap style="width:7%;"><strong>شراء</strong></td>
      <td nowrap style="width:7%;"><strong>الإجمالي</strong></td>
      <td nowrap style="width:7%;"><strong>شامل الضريبة</strong></td>
      <td nowrap style="width:7%;"><strong>البيع</strong></td>
      <td nowrap style="width:8%;"><strong>الإجمالي</strong></td>
      <td nowrap style="width:7%;"><strong>شامل الضريبة</strong></td>
      <td nowrap style="width:7%;"><strong>الربح المتوقع</strong></td>
      <td nowrap style="width:7%;"><strong>التاريخ</strong></td>
    </tr>
		  <?php do { ?>

    <tr>	
      <td nowrap><?php echo $row['formid'];?></td>
      <td><?php echo $row['name'];?></td>
      <td nowrap><?php echo $row['unit'];?></td>
      <td><?php echo $row['qty'];?></td>
      <td><?php echo $row['price'];?></td>
      <td><?php echo $x1=round($row['qty']*$row['price'],2);?></td>
      <td><?php echo $z1=round($row['price']*$row['qty']*$tax/100+$x1,2);?></td>
      <td><?php echo round($row['sales'],2);?></td>
      <td><?php echo $x2=round($row['qty']*$row['sales'],2);?></td>
      <td><?php echo $z2=round($row['qty']*$row['sales']*$tax/100+$x2,2);?></td>
	  <td><?php echo round($z2-$z1,2);?></td>
	  <td nowrap><?php echo $row['date'];?></td>
   </tr>
		<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
	<td><strong>المجموع</strong></td>
	<td></td>
	<td></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select count(pid) from share where date ='$_POST[date]'   and name='$_POST[item]' and customer='$_POST[cust]'");
	$row=mysql_fetch_array($sql);
	echo $row['count(pid)'];
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(price) from share where date ='$_POST[date]'    and name='$_POST[item]' and customer='$_POST[cust]'");
	$row=mysql_fetch_array($sql);
	echo round($row['sum(price)'],2);
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qty*price) from share where date ='$_POST[date]'  and name='$_POST[item]' and customer='$_POST[cust]'");
	$row=mysql_fetch_array($sql);
	echo round($row['sum(qty*price)'],2);
	?></td>
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qty*price) from share where date ='$_POST[date]'  and name='$_POST[item]' and customer='$_POST[cust]'");
	$row=mysql_fetch_array($sql);
	echo $xx1=round($row['sum(qty*price)']*$tax/100+$row['sum(qty*price)'],2);
	?></td>

	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(sales) from share where date ='$_POST[date]'  and name='$_POST[item]' and customer='$_POST[cust]'");
	$row=mysql_fetch_array($sql);
	echo round($row['sum(sales)'],2);
	?></td>
	
	
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qty*sales) from share where date ='$_POST[date]'  and name='$_POST[item]' and customer='$_POST[cust]'");
	$row=mysql_fetch_array($sql);
	echo round($row['sum(qty*sales)'],2);
	?></td>
	
	
	<td><?php include('dbcon/dbcon.php');
	$sql=mysql_query("select sum(qty*sales) from share where date ='$_POST[date]'  and name='$_POST[item]' and customer='$_POST[cust]'");
	$row=mysql_fetch_array($sql);
	echo $xx2=round($row['sum(qty*sales)']*$tax/100+$row['sum(qty*sales)'],2);
	?></td>
	<td><?php echo round($xx2-$xx1,2);?></td>
	<td></td>
	</tr>
  </table>

<br>
<table style="width:99%;  font-size: 13px;" border="1"  align="center" class="table table-bordered table-hover"  dir="rtl">
    <tr><td style="width:12%; "><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>
<table dir="rtl" style="width:99%;"  border="1" align="center" class="table table-bordered table-hover">
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
                <img src="icon/qr.png"  width="25" height="25" alt="></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
</div>
<table style="width:98%;  font-size: 13px;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%;"  onclick="printDiv(); javascript:window.close()"> طباعة <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="move.php"><button class="btn btn-primary" style="width: 100%;"> المشتريات <i class="fa ft-airplay"></i></button></a></td>
<td style="width:15%;"><a href="vshare.php"><button class="btn btn-primary" style="width: 100%;"> الإستعلام <i class="fa ft-search"></i></button></a></td>
<td style="width:15%;"><a href="shselect1.php"><button class="btn btn-primary" style="width: 100%;"> التقارير <i class="fa ft-paperclip"></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn btn-primary" style="width: 100%;"> النظام <i class="fa fa-home"></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table></center>
<?php } ?>



</body>
</html>
